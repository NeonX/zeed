<?php

// Define host name
define("PROTOCOL", 'http://');

// Define host name
define("HOST_NAME", $_SERVER['HTTP_HOST']);

// Define project name
define("PROJ_NAME", '/zeed');

// Document root
define("DOC_ROOT", $_SERVER['DOCUMENT_ROOT']);

// Automatically called in case you are trying to use a class.
function __autoload($classname) 
{
    $filename = DOC_ROOT . PROJ_NAME . '/classes/' . $classname . '.class.php';

    if(file_exists($filename)) {
        require_once $filename;
    } else {
        throw new Exception('Unable to load ' . $filename);
    }
}
