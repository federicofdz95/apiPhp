<?php


require_once 'controllers/get.controller.php';

/*================================================
Asigno el nombre de la tabla
 ================================================*/
$table = explode('/', $_SERVER['REQUEST_URI'])[3];
//print_r($table); return;

//echo "SELECT * FROM $table WHERE id_" . $table . " = $id"; return;

$response = new GetController;
$response -> getDataId($table,$id);


