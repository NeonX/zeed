<?php

header("Content-type: application/xhtml+xml;charset=utf-8");
$datax = file_get_contents("sample_data.xml");

echo $datax;
?>