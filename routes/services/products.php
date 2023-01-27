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
        $response = new ProductsController;
        $response->getData($table);
    } else {        
        $response = new ProductsController;
        $response->getDataId($table, $id);
    }
}


/*================================================
POST
================================================*/
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!isset($id)) {
        $response = new ProductsController;
        $response->getData($table);
    } else {
        $response = new ProductsController;
        $response->getDataId($table, $id);
    }
}




