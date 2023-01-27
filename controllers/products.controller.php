<?php

require_once 'models/products.model.php';

class GetController {

    static public function getData($table) {

        $response = GetModel::getData($table);
        
        $return = new GetController();
        $return -> fncResponse($response);
    }

    static public function getDataId($table,$id)
    {

        $response = GetModel::getDataId($table, $id);

        $return = new GetController();
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