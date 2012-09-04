<?php

header('Content-type: application/json');

require_once $_SERVER['DOCUMENT_ROOT'] . '/zeed/includes/init.inc.php';

$action = isset($_GET['action']) ? $_GET['action'] : null;
$post = isset($_POST) ? $_POST : null;

$model = new ComModel();

echo $model->save($post);