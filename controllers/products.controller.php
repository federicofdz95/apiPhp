<?php

require_once 'models/products.model.php';

class ProductsController {

    static public function getData($table) {

        $response = ProductModel::getData($table);
        
        $return = new ProductsController();
        $return -> fncResponse($response);
    }

    static public function getDataId($table,$id)
    {

        $response = ProductModel::getDataId($table, $id);

        $return = new ProductsController();
        $return->fncResponse($response);
    }

    static public function PostData($table, $data)
    {

        $response = ProductModel::PostData($table, $data);

        $return = new ProductsController();
        $return->fncResponse($response);
    }

    public function fncResponse($response) {

        if (!empty($response)) {
            $json = array(

                'status' => 200,
                'count' => count($response),
                'result' => $response
            );

            echo json_encode($json, http_response_code($json["status"]));
        } else {
            $json = array(

                'status' => 404,
                'result' => 'Not found'
            );

            echo json_encode($json, http_response_code($json["status"]));
        }
        
    }

}