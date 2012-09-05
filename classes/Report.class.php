<?php

require_once dirname(__FILE__) . '/DBConnection.class.php';

class Report extends DBConnection {

    public $post;
    public $prefix = 'tbm_';
    public $colId = '_id';

    /**
     * 
     * Constructor
     */
    public function __construct() {
        parent::__construct();
    }

    public function getAll($table, $columns=null) {
        $result = new stdClass();

        $fTable = $this->prefix . $table;

        $strColumns = join(',', $columns);

        $sql = "SELECT {$strColumns} FROM {$fTable} ORDER BY {$table}{$this->colId}";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * __destruct
     * 
     * @return No value is returned.
     */
    public function __destruct() {
        parent::__destruct();
    }

}
