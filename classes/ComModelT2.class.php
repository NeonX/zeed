<?php
require_once dirname(__FILE__) . '/DBConnection.class.php';
 
class ComModelT2 extends DBConnection
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

    public function getDataById($table, $columns, $id)
    {
        $result = new stdClass();

        $id     = (int) $id;
        $colId  = $table . $this->colId;
        $fTable = $this->prefix . $table;

        $sql = "SELECT MAX({$colId}) last_row FROM {$fTable}";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $result->last_row = $stmt->fetch(PDO::FETCH_OBJ)->last_row;

        $sql = "SELECT * FROM {$fTable} WHERE goods_id = :id";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        $result->record = $stmt->fetchAll(PDO::FETCH_OBJ);

        switch ($table) {
            case 'goodsprice':
            case 'goodsunit':
                $fk = array(
                    'goodstype_id' => array('goodstype_id', 'goodstype_eng', 'goodstype_th'),
                    'unit_id'      => array('unit_id', 'unitcode', 'unitnameeng'),
                    'currency_id'  => array('currency_id', 'currabbveng')
                );

                $result->goodstype = self::getChildAllById('goodstype', $fk['goodstype_id'], $id);
                $result->unit = self::getChildAllById('unit', $fk['unit_id'], $id);
                $result->currency = self::getChildAllById('currency', $fk['currency_id'], $id);
            break;
            case 'goods':
                $fk = array(
                    'goodstype_id' => array('goodstype_id', 'goodstype_eng', 'goodstype_th')
                );

                $result->goodstype = self::getChildAllById('goodstype', $fk['goodstype_id'], $id);
            break;
        }

        $result->params = array(
            'table' => $table,
            'id'  => $id,
        );

        $result->stmt = $stmt;

        return json_encode($result);
    }

    public function getDataSubGridAllById($table, $columns, $id, $page, $limit, $sidx, $sor) {
        $result = new stdClass();

        $sql = "SELECT *, '' AS action FROM {$this->prefix}{$table} WHERE 1=1 AND goods_id = {$id}";

        $stmt = $this->db->prepare($sql);

        $result->fstmt = $stmt;

        $stmt->execute();

        $count = $stmt->rowCount();

        $total_pages = ($count > 0) ? ceil($count / $limit) : 0;

        if ($page > $total_pages) {
            $page = $total_pages;
        }

        $start = $limit * $page - $limit; // do not put $limit*($page - 1)

        if ($sidx) {
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

        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
            foreach ($columns as $key => $value) {
                $data[$key] = $row->$value;
            }

            $result->rows[$i]['id'] = $row->$columns[0];
            $result->rows[$i]['cell'] = $data;

            $i++;
        }

        switch ($table) {
            case 'goodsprice':
            case 'goodsunit':
                $fk = array(
                    'goodstype_id' => array('goodstype_id', 'goodstype_eng', 'goodstype_th'),
                    'unit_id'      => array('unit_id', 'unitcode', 'unitnameeng'),
                    'currency_id'  => array('currency_id', 'currabbveng')
                );

                $result->goodstype = self::getChildAllById('goodstype', $fk['goodstype_id'], $id);
                $result->unit = self::getChildAllById('unit', $fk['unit_id'], $id);
                $result->currency = self::getChildAllById('currency', $fk['currency_id'], $id);
            break;
        }

        $result->columns = $columns;
        $result->stmt = $stmt;
        return json_encode($result);
    }
    
    public function setActionIcon($mode, $table, $src, $cls, $id)
    {
//          src='../page/images/icons/record-edit-16x16.gif' onclick=\"jQuery('#list-" + self.table.sub + "').editRow('"+cl+"');\"  />
        $anchor .= '<input type="image" src="' . $src . '"';
        $anchor .= 'onclick="jQuery(\'#list-' . $table . '\').jqGrid(\'' . $mode . '\', ' . $id. ');"';
        $anchor .= ' style="width:16px" title="' . $mode . '" alt="view" value="' . $id . '">';

        return $anchor;
    }

    public function getChildAllById ($table, $columns, $id)
    {
        $result = new stdClass();

        $columns = join(',', $columns);

        $fTable = $this->prefix . $table;

        $sql = "SELECT {$columns} FROM {$fTable} WHERE 1=1";

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
        $oper   = isset($post['oper']) ? 'update' : null;
        $mode   = !empty($mode) ? $mode : $oper;
        $table  = isset($post['table']) ? $post['table'] : null;
        $colId  = $table . $this->colId;
        $id     = isset($post['id']) ? (int) $post['id'] : null;
        $fTable = $this->prefix . $table;

        $postKey = array_keys($post);

        foreach (range(0,3) as $val) {
            array_pop($postKey);
        }

        $paramsArr = array();
        if ($mode == 'insert') {
            array_push($postKey, 'create_by');
            array_push($postKey, 'create_date');
            $columns = join(',', $postKey);
            $colLength = count($postKey);
            foreach($postKey as $key => $value) {
                $paramsArr[] = '?';
            }

            $params = join(',', $paramsArr);
        } else if ($mode == 'update') {
            array_push($postKey, 'lastupdate_by');
            array_push($postKey, 'lastupdate_date');
            $colLength = count($postKey);
            foreach($postKey as $key => $value) {
                $paramsArr[] = $value . ' = ' . '?';
            }
            $params = join(',', $paramsArr);
        }

        $sql = array(
            'insert' => "INSERT INTO {$fTable} ({$columns}) VALUES ({$params})",
            'update' => "UPDATE {$fTable} SET {$params} WHERE {$colId} = ?",
            'delete' => "UPDATE {$fTable} SET deleteflag = ? WHERE {$colId} = ?"
        );

        $stmt = $this->db->prepare($sql[$mode]);
        $myparams = array();
 
        switch ($mode) {
            case 'insert':
            case 'update':
                if ($mode == 'insert') {
                    foreach ($postKey as $key => $value) {
                        $index = $key + 1;
                        if ($value == 'create_by') {
                            $stmt->bindValue($index, 1);
                            $myparams['insert'][$index] = 1;
                        } else if ($value == 'create_date') {
                            $stmt->bindValue($index, date('Y-m-d'));
                            $myparams['insert'][$index] = date('Y-m-d');
                        } else {
                            $stmt->bindValue($index, isset($post[$value]) ? trim($post[$value]) : null);
                            $myparams['insert'][$index] =  trim($post[$value]);
                        }
                    }
                } else {
                    foreach ($postKey as $key => $value) {
                        $index = $key + 1;
                        if ($value == 'effective_date') {
                            $stmt->bindValue($index, isset($post[$value]) ? $post[$value] : null);
                            $myparams['update'][$index] = $post[$value];
                        } else if ($value == 'lastupdate_date') {
                            $stmt->bindValue($index, date('Y-m-d'));
                            $myparams['update'][$index] = date('Y-m-d');
                        } else if ($value == 'lastupdate_by') {
                            $stmt->bindValue($index, 1);
                            $myparams['update'][$index] = 1;
                        } else {
                            $stmt->bindValue($index, isset($post[$value]) ? (int) $post[$value] : null, PDO::PARAM_INT);
                            $myparams['update'][$index] = (int) $post[$value];
                        }
                    }
                    $myparams['update'][$colLength + 1] = $id;
                    $stmt->bindValue($colLength + 1, $id, PDO::PARAM_INT);
                }

                $stmt->execute();
            break;

            case 'delete':
                $id = isset($post['id']) ? (int) $post['id'] : null;
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

        $result->myparams = $myparams;
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
