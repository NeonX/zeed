<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . '/zeed/includes/init.inc.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $action = isset($_GET['action']) ? $_GET['action'] : null;
    }

    $attach_dir = './images_upload';

    $ft = new FileTransfer($attach_dir);
 
    switch ($action) {
        case 'upload':
            $file = isset($_FILES) ? $_FILES : array();
            echo $ft->doUpload($file);
            break;

//         case 'tmp':
//             $file = isset($_FILES) ? $_FILES : array();
//             echo $ft->doUpload($file, $action);
//             break;
        case 'download':
//             $origin_file_name = isset($_GET['origin_file_name']) ? $_GET['origin_file_name'] : null;
//             $new_file_name = isset($_GET['new_file_name']) ? $_GET['new_file_name'] : null;
// 
//             echo $ft->doDownload($origin_file_name, $new_file_name);
        break;
    }

