<?php
// require_once dirname(__FILE__) . '/DBConnection.class.php';

class Template
{
    /**
     * __construct — Initialization connect to database. 
     * 
     * @param object $dbo a database object
     * @return No value is returned.
     */
    public function __construct($body=null)
    {
//         parent::__construct();
    }

    public function tHeader() 
    {
        $header = file_get_contents("../page/common/header.html");
        echo $header;

    }

    public function render($body=null) {
        self::tHeader();
        require_once $body;
        self::tFooter();
    }

    public function tFooter()
    {
        $footer = file_get_contents("../page/common/footer.html");
        echo $footer;
    }
}
