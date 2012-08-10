<?php

header('Content-type: application/json');

require_once $_SERVER['DOCUMENT_ROOT'] . '/zeed/includes/init.inc.php';

$table = isset($_GET['table']) ? $_GET['table'] : null;

$id = isset($_GET['id']) ? $_GET['id'] : null;

$model = new ComModel();

echo $model->getDataById($table, $id);