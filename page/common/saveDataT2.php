<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/zeed/includes/init.inc.php';

$action = isset($_GET['action']) ? $_GET['action'] : null;
$post = isset($_POST) ? $_POST : null;

$model = new ComModelT2();

echo $model->save($post);