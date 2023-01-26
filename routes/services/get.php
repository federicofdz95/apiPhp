<?php


require_once 'controllers/get.controller.php';

$table = explode("?", $routesArray[2])[0];


$response = new GetController;
$response -> getData($table, $select);


