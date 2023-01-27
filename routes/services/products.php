<?php


require_once 'controllers/products.controller.php';

/*================================================
Asigno el nombre de la tabla
 ================================================*/
$table = explode('/', $_SERVER['REQUEST_URI'])[3];
//print_r(); return;


/*================================================
GET
 ================================================*/
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    if (!isset($id)) {
        $response = new GetController;
        $response->getData($table);
    } else {        
        $response = new GetController;
        $response->getDataId($table, $id);
    }
}




