<?php

header('Content-type: application/json');

require_once $_SERVER['DOCUMENT_ROOT'] . '/zeed/includes/init.inc.php';

$table = isset($_GET['table']) ? $_GET['table'] : null;
$columns = isset($_GET['columns']) ? $_GET['columns'] : null;
;
$model = new ComModel();


if ($table) {
    $page = isset($_GET['page']) ? $_GET['page'] : 1;      // get the requested page
    $limit = isset($_GET['rows']) ? $_GET['rows'] : false;  // get how many rows we want to have into the grid
    $sidx = isset($_GET['sidx']) ? $_GET['sidx'] : false;  // get index row - i.e. user click to sort
    $sord = isset($_GET['sord']) ? $_GET['sord'] : 'ASC';  // get the direction

    echo $model->getAll($table, $columns, $page, $limit, $sidx, $sord);
}