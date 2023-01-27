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
    
    $name = Flight::request()->data->name;
    $category = Flight::request()->data->category;
    $material = Flight::request()->data->material;
    $price = Flight::request()->data->price;
    $stock = Flight::request()->data->stock;

    $data = array(
        "name_product" => $name,
        "category_product" => $category,
        "material_product" => $material,
        "price_product" => $price,
        "stock_product" => $stock,
    );

    //echo json_encode($data); return;
    //echo $data['name']; return;

    $table = explode('/', $_SERVER['REQUEST_URI'])[3];
    $response = new ProductsController;
    $response->PostData($table, $data);
    
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
