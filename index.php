<?php

require 'flight/Flight.php';
require_once 'controllers/products.controller.php';

/*================================================
PRODUCTS
================================================*/
if (Flight::request()->method == 'GET') {

    Flight::route('/api/products', function () {
        $table = explode('/', $_SERVER['REQUEST_URI'])[3];
        $response = new ProductsController;
        $response->getData($table);
    });

    Flight::route('/api/products/@id', function ($id) {
        $table = explode('/', $_SERVER['REQUEST_URI'])[3];
        $response = new ProductsController;
        $response->getDataId($table, $id);
    });
}

Flight::route('POST /api/products', function () {
    
    $name_product = Flight::request()->data->name_product;
    $category_product = Flight::request()->data->category_product;
    $material_product = Flight::request()->data->material_product;
    $price_product = Flight::request()->data->price_product;
    $stock_product = Flight::request()->data->stock_product;

    $data = array(
        "name_product" => $name_product,
        "category_product" => $category_product,
        "material_product" => $material_product,
        "price_product" => $price_product,
        "stock_product" => $stock_product,
    );

    //echo json_encode($data); return;
    //echo $data['name']; return;

    $table = explode('/', $_SERVER['REQUEST_URI'])[3];
    $response = new ProductsController;
    $response->PostData($table, $data);
    
});


Flight::route('PUT /api/products', function () {

    $id_product = Flight::request()->data->id_product;
    $name_product = Flight::request()->data->name_product;
    //echo $id_product; return;
    $data = array(
        "id_product" => $id_product,        
        "name_product" => $name_product
    );

    $table = explode('/', $_SERVER['REQUEST_URI'])[3];
    $response = new ProductsController;
    $response->PutData($table, $data);
});


Flight::route('DELETE /api/products', function () {

    $id_product = Flight::request()->data->id_product;

    //echo $id_product; return;

    $table = explode('/', $_SERVER['REQUEST_URI'])[3];
    $response = new ProductsController;
    $response->DeleteData($table, $id_product);
});


/*================================================
USERS
================================================*/
Flight::route('/api/users', function () {
    include 'routes/services/get.php';
});


/*================================================
NOT FOUND
================================================*/
Flight::map('notFound', function () {
    include 'models/notfound.php';
});


Flight::start();
