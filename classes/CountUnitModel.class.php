<?php
require_once dirname(__FILE__) . '/DBConnection.class.php';
 
class CountUnitModel extends DBConnection
{
    public $post;
    /**
     * 
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    } // End constructor

    public function getAll($table, $page, $limit, $sidx, $sord)
    {
        $sql = "SELECT *, '' AS action FROM {$table} WHERE 1=1";

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

        $result->page = $page;
        $result->total =  $total_pages;
        $result->records = $count;

        $i = 0;
        while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
            $result->rows[$i]['id']   = $row->unitid;
            $result->rows[$i]['cell'] = array(
                $row->unitid,
                $row->unitcode,
                $row->unitnameeng,
                $row->unitnameth,
                $row->deleteflag,
                $row->action
            );

            $i++;
        }

        return json_encode($result);
    }
    
    public function getDataById($table, $colId, $id)
    {
        $sql = "SELECT * FROM {$table} WHERE {$colId} = :id";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id', (int) $id, PDO::PARAM_INT);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        return json_encode($result);
    }

    public function save($action, $post) {
        $sql = array(
            'insert' => "
                INSERT INTO tbm_unit (
                    unitcode,
                    unitnameeng,
                    unitnameth,
                    deleteflag,
                    unitdesc,
                    create_by,
                    create_date
                ) VALUES (
                    :unitcode,
                    :unitnameeng,
                    :unitnameth,
                    :deleteflag,
                    :unitdesc,
                    :create_by,
                    :create_date
                )
            ",
            'update' => "
                UPDATE tbm_unit SET
                    unitcode         = :unitcode,
                    unitnameeng      = :unitnameeng,
                    unitnameth       = :unitnameth,
                    deleteflag       = :deleteflag,
                    unitdesc         = :unitdesc,
                    lastupdate_by    = :lastupdate_by,
                    lastupdate_date  = :lastupdate_date
                WHERE unitid = :unitid
            ",
            'delete' => "
                UPDATE tbm_unit SET 
                    deleteflag  = :deleteflag
                WHERE unitid = :unitid
            "
        );

        $stmt = $this->db->prepare($sql[$action]);
        echo '<pre>'; print_r($post);
        if ($action = 'insert') {
            $stmt->bindValue(':unitcode', isset($post['unitcode']) ? trim($post['unitcode']) : null);
            $stmt->bindValue(':unitnameeng', isset($post['unitnameeng']) ? trim($post['unitnameeng']) : null);
            $stmt->bindValue(':unitnameth', isset($post['unitnameth']) ? trim($post['unitnameth']) : null);
            $stmt->bindValue(':deleteflag', isset($post['deleteflag']) ? $post['deleteflag'] : null);
            $stmt->bindValue(':unitdesc', isset($post['unitdesc']) ? trim($post['unitdesc']) : null);
            $stmt->bindValue(':create_by', 1);
            $stmt->bindValue(':create_date', '2012-08-02');
            $stmt->execute();
        }
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
