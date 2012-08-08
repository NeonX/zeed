<?php

/**
 * DBConnection.class.php
 * Last Modify: May 2012
 * By Narong Rammanee
 */
// Include database configuration
require_once $_SERVER['DOCUMENT_ROOT'] . '/zeed/includes/dbconfig.inc.php';

class DBConnection {

    /**
     * Stores a database object
     * 
     * @var object A database object
     */
    public $db;

    /**
     * __construct — Initialization connect to database. 
     * 
     * @param object $dbo a database object
     * @return No value is returned.
     */
    public function __construct($dbo = null) {
        // Checks for a DB object or creates one if one isn't found
        if (is_object($dbo)) {
            $this->db = $dbo;
        } else {
            // Constants are defined in /sys/config/db-cred.inc.php
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;

            try {
                // connect to postgres object databse
                $this->db = new PDO($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            } catch (PDOException $e) {
                // if can't connect display error message
                echo 'Connection failed: <pre>' . $e->getMessage();
            }
        }
    }

    /**
     * __destruct — Database close connection
     * 
     * @return No value is returned.
     */
    public function __destruct() {
        // database disconnect
        if (!empty($this->db))
            $this->db = null;
    }

}
