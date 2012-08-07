<?php
require_once dirname(__FILE__) . '/DBConnection.class.php';
 
class ComModel extends DBConnection
{
    public $post;
    public $prefix = 'tbm_';
    public $colId  = '_id';
    /**
     * 
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    } // End constructor

    public function getAll($table, $columns, $page, $limit, $sidx, $sord)
    {
        $result = new stdClass();

        $sql = "SELECT *, '' AS action FROM {$this->prefix}{$table} WHERE 1=1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $count = $stmt->rowCount();

        $total_pages = ($count > 0) ? ceil($count / $limit) : 0;

        if ($page > $total_pages) {
            $page = $total_pages;
        }

        $start = $limit * $page - $limit; // do not put $limit*($page - 1)

        if($sidx) {
            $sql .= " ORDER BY ".$sidx;
            $sql .= strtoupper($sord) == 'ASC' ? ' ASC' : ' DESC';
        }

        $sql .= " LIMIT  :start, :limit;";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $stmt->bindValue(':start', (int) $start, PDO::PARAM_INT);

        $stmt->execute();

        $result->page    = $page;
        $result->total   =  $total_pages;
        $result->records = $count;

        $i = 0;
        $data = array();
        $columns = explode(',', $columns);

        while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
            foreach ($columns as $key => $value) {
                if ($value != 'action' && $value != 'deleteflag') {
                    $data[$key] = $row->$value;
                } else if ($value == 'deleteflag') {
                    $data[$key] = $row->$value ? '<span class="red">Unuse</span>' : '<span class="green">Used</span>';
                } else {
                    $data[$key] = self::setActionIcon('view', '../page/images/icons/form-16x16.png', $table, $row->$columns[0]) . 
                        self::setActionIcon('edit', '../page/images/icons/form-edit-16x16.png', $table, $row->$columns[0]);
                }
            }

            $result->rows[$i]['id'] = $row->$columns[0];
            $result->rows[$i]['cell'] = $data;

            $i++;
        }

        $result->columns = $columns;
        $result->stmt = $stmt;
        return json_encode($result);
    }

    public function setActionIcon($mode, $src, $cls, $id)
    {
        $anchor  = '<a href="#customForm" class="' . $cls . '">';
        $anchor .= '<img type="image" class="list-icon-view" src="' . $src . '"';
        $anchor .= ' title="' . $mode . '" alt="view" value="' . $id . '"">';
        $anchor .= '</a>';

        return $anchor;
    }

    public function getDataById($table, $id)
    {
        $result = new stdClass();

        $id     = (int) $id;
        $colId  = $table . $this->colId;
        $fTable = $this->prefix . $table;

        $sql = "SELECT * FROM {$fTable} WHERE {$colId} = :id";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        switch ($table) {
            case 'goodsprice':
                $fk = array(
                    'goodstype' => array('goodstype_id', 'goodstype_eng'),
                    'unit'      => array('unitid', 'unitcode'),
                    'currency'  => array('currencyid', 'currcode')
                );

                $result->goodstype = self::getChildAllById('tbm_goodstype', $fk['goodstype'], $this->id);
                $result->unit = self::getChildAllById('tbm_unit', $fk['unit'], $id);
                $result->currency = self::getChildAllById('tbm_currency', $fk['currency'], $this->id);
            break;
            case 'goods':
                $columns = array(
                    'goodstype' => array('goodstype_id', 'goodstype_eng')
                );

                $result->goodstype = self::getChildAllById('goodstype', $fk['goodstype'], $this->id);
            break;
        }

        $result->params = array(
            'table' => $table,
            'id'    => $id
        );
        $result->stmt = $stmt;

        return json_encode($result);
    }

    public function getChildAllById ($table, $columns, $id)
    {
        $result = new stdClass();

        $fTable = $this->prefix . $table;

        $sql = "SELECT {$columns[0]}, {$columns[1]} FROM {$fTable} WHERE 1=1";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function save($post)
    {
        $result = new stdClass();
        $mode   = isset($post['mode']) ? $post['mode'] : null;
        $table  = isset($post['table']) ? $post['table'] : null;
        $colId  = $table . $this->colId;
        $id     = isset($post[$colId]) ? (int) $post[$colId] : null;
        $fTable = $this->prefix . $table;

        $postKey = array_keys($post);

        foreach (range(0,2) as $val) {
            array_pop($postKey);
        }

        $params = array();
        switch ($table) {
            case 'unit':
            case 'currency':
            case 'goodstype':
            case 'goods':
            case 'goodsprice':
                if ($mode == 'insert') {
                    $addCols = array('create_by', 'create_date');
                    $colArr  = array_merge($postKey, $addCols);
                    $columns = join(',', $colArr);

                    $colLength = count($colArr);
                    foreach($colArr as $key => $value) {
                        $paramArr[] = '?';
                    }

                    $params = join(',', $paramArr);
                } else if ($mode == 'update') {
                    $addCols = array('lastupdate_by', 'lastupdate_date');
                    $colArr  = array_merge($postKey, $addCols);
                    $columns = join(',', $colArr);

                    $colLength = count($colArr);
                    foreach($colArr as $key => $value) {
                        $paramArr[] = $value . ' = ' . '?';
                    }

                    $params = join(',', $paramArr);
                }
            break;
        }

        $sql = array(
            'insert' => "INSERT INTO {$fTable} ({$columns}) VALUES ({$params})",
            'update' => "UPDATE {$fTable} SET {$params} WHERE {$colId} = ?",
            'delete' => "UPDATE {$fTable} SET deleteflag = ? WHERE {$colId} = ?"
        );

        $stmt = $this->db->prepare($sql[$mode]);
        $tmp = array();
        switch ($mode) {
            case 'insert':
            case 'update':
                if ($mode == 'insert') {
                    foreach ($colArr as $key => $value) {
                        $index = $key + 1;
                        $stmt->bindValue($index, isset($post[$value]) ? trim($post[$value]) : null);
                        
                        $tmp[$key] = $post[$value];
                        
                    }

                    $stmt->bindValue($index, isset($post[$value]) ? trim($post[$value]) : null);
                } else {
                    foreach ($colArr as $key => $value) {
                        $index = $key + 1;
                        $stmt->bindValue($index, isset($post[$value]) ? trim($post[$value]) : null);
                    }

                    $stmt->bindValue($colLength + 1, $id, PDO::PARAM_INT);
                }

                $stmt->execute();
            break;

            case 'delete':
                $stmt->bindValue(1, $post['deleteflag'] ? 1 : 0);
                $stmt->bindValue(2, $id, PDO::PARAM_INT);
                $stmt->execute();

                $result->id = $id;
                $result->deleteflag = $post['deleteflag'] ? 1 : 0;
            break;

            default:
                $result->error_msg = 'CASE NOT FOUND!!!';
                $result->success = true;
        }
        $result->tmp = $tmp;
        $result->stmt = $stmt;
        $result->mode = $mode;
        $result->row_count = $stmt->rowCount();

        return json_encode($result);
    }

    /**
     * __destruct
     * 
     * @return No value is returned.
     */
    public function __destruct() 
    {
        parent::__destruct();
    }
}
