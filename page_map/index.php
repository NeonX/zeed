<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/zeed/includes/init.inc.php';

    $module   = isset($_GET['module']) ? $_GET['module'] : null; 
    $pagename = isset($_GET['page']) ? $module . '/' . $_GET['page'] . '.php' : "index.php";

    $t = new Template();
    $body = "../page/" . $pagename;

    $t->render($body);