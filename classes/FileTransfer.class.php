<?php
/**
 * FileTransfer.class.php
 * Last Modify: Jul 2012
 * By Narong Rammanee
 */
require_once dirname(__FILE__) . '/DBConnection.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/zeed/libs/phpthumb/ThumbLib.inc.php';

class FileTransfer extends DBConnection
{
    private $attach_dir;
    private $filename;
    private $decodeFilename;

    public function __construct($attach_dir=null)
    {
        parent::__construct();

        $this->attach_dir = $attach_dir;
    }

    public function doUpload($file=null, $action=null)
    {
        $mimes = array (
            'image/pjpeg' => '.jpg',
            'image/jpeg' => '.jpg',
            'image/x-png' => '.png',
            'image/png' => '.png',
            'image/gif' => '.gif',
        );

        $type = $file['file']['type'];
        $temp = $file['file']['tmp_name'];
        $name = $file['file']['name'];
        $size = $file['file']['size'];

        $decodeFilename = urldecode(urlencode($name));

        if (array_key_exists($type, $mimes)) {
            $this->filename = '/zeed_' . $name;
            $original_file = $this->attach_dir . '/original' . $this->filename;
            $thumb_file    =  $this->attach_dir . '/thumb' . $this->filename;

            if (move_uploaded_file($temp, $original_file)) {
                $thumb = PhpThumbFactory::create($original_file);
                $thumb->adaptiveResize(320, 250);
                $thumb->save($thumb_file);

                echo '<script language="JavaScript">
                        window.parent.uploadok("' . $thumb_file . '");
                    </script>';
            }
        }
    }

    public function doDownload($origin_file_name, $new_file_name)
    {
        if(!file_exists($this->attach_dir . $new_file_name)) {
            die('Error: File not found.');
        }

        //then send the headers to foce download the zip file
        header("Content-type: {$this->mime_type}");
        header("Content-Disposition: attachment; filename={$origin_file_name}");
        header("Pragma: no-cache");
        header("Expires: 0");
        readfile($this->attach_dir . $new_file_name);
        exit;
    }

    public function __destruct() 
    {
        parent::__destruct();
    }
}