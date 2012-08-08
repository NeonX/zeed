<?php

/**
 * FileTransfer.class.php
 * Last Modify: Jul 2012
 * By Narong Rammanee
 */
require_once dirname(__FILE__) . '/DBConnection.class.php';

class FileTransfer extends DBConnection {

    private $q_id;
    private $is_map;
    private $type;
    private $temp;
    private $name;
    private $size;
    private $attach_dir;
    private $filetypes;
    private $filename;
    private $encodeFilename;
    private $decodeFilename;

    public function __construct($attach_dir = null, $dbo = null) {
        parent::__construct();

        $this->attach_dir = $attach_dir;

        $this->filetypes = array(
            'image/pjpeg' => '.jpg',
            'image/jpeg' => '.jpg',
            'image/x-png' => '.png',
            'image/png' => '.png',
            'image/gif' => '.gif',
            'application/pdf' => '.pdf',
            'application/vnd.ms-excel' => '.xls',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => '.xlsx',
            'application/vnd.ms-powerpoint' => '.ppt',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation' => '.pptx',
            'application/msword' => '.doc',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => '.docx'
        );
    }

    public function doUpload($file = null, $post = null) {
        $this->q_id = isset($post['q_id']) ? $post['q_id'] : null;
        $this->is_map = isset($post['is_map']) ? $post['is_map'] : null;

        $this->type = $file['uploadfile']['type'];
        $this->temp = $file['uploadfile']['tmp_name'];
        $this->name = $file['uploadfile']['name'];
        $this->size = $file['uploadfile']['size'];

        $this->decodeFilename = urldecode(urlencode($this->name));

        $data = array();
        if (array_key_exists($this->type, $this->filetypes)) {
            $this->filename = $this->q_id . '_lams_' . time() . $this->filetypes[$this->type];
            $this->path = $this->attach_dir . $this->filename;
            if (move_uploaded_file($this->temp, $this->path)) {
                self::insertAttachFile();
                $data['success'] = true;
                $data['success'] = $_SESSION["uname"];
            } else {
                $data['errormsg'] = 'ไม่สามารถอัพโหลดไฟล์ได้';
                $data['success'] = false;
            }
        } else {
            $data['success'] = false;
            $data['mime_type'] = $this->type;
        }

        return json_encode($data);
    }

    public function insertAttachFile() {
        $strSQL = "
            INSERT INTO attach_file (
                q_id,
                origin_file_name,
                new_file_name,
                attach_file_size,
                attach_file_date,
                attach_file_by,
                is_map
            ) VALUES (
                :q_id,
                :origin_file_name,
                :new_file_name,
                :attach_file_size,
                now(),
                :attach_file_by,
                :is_map
            )";

        $sth = $this->db->prepare($strSQL);

        try {
            $data = array(
                ':q_id' => $this->q_id,
                ':origin_file_name' => $this->decodeFilename,
                ':new_file_name' => $this->filename,
                ':attach_file_size' => $this->size,
                ':attach_file_by' => $_SESSION["uname"],
                ':is_map' => $this->is_map
            );

            $sth->execute($data);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function doDownload($origin_file_name, $new_file_name) {
        if (!file_exists($this->attach_dir . $new_file_name)) {
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

    public function __destruct() {
        parent::__destruct();
    }

}