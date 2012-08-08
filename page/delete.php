<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/zeed/includes/init.inc.php';

$post = isset($_POST) ? $_POST : null;

$model = new ComModel();

echo $model->delete($post);