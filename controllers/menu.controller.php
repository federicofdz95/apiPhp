<?php

require_once 'models/menu.model.php';

class MenuController {

    static public function getData($table) {

        $response = MenuModel::getData($table);
        
        $return = new MenuController();
        $return -> fncResponse($response);
    }

    static public function getDataId($table,$id)
    {

        $response = MenuModel::getDataId($table, $id);
        //echo $response; return;
        $return = new MenuController();
        $return->fncResponse($response);
    }

    static public function PostData($table, $data)
    {

        $response = MenuModel::PostData($table, $data);
        //echo $response; return;
        $return = new MenuController();
        $return->fncResponsePostPutDelete($response);
    }


    static public function PutData($table, $data)
    {
        $response = MenuModel::PutData($table, $data);
        //echo $response;return;
        $return = new MenuController();
        $return->fncResponsePostPutDelete($response);
    }


    static public function DeleteData($table, $id_product)
    {
        $response = MenuModel::DeleteData($table, $id_product);
        //echo $response;return;
        $return = new MenuController();
        $return->fncResponsePostPutDelete($response);
    }


    public function fncResponse($response) {

        if (!empty($response)) {
            $json = array(

                'status' => 200,
                'count' => count($response),
                'data' => $response
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


    public function fncResponsePostPutDelete($response)
    {
        
        if (!empty($response) or $response==0) {
            $json = array(

                'status' => 200,                
                'result' => "$response"
            );

            echo json_encode($json, http_response_code($json["status"]));
        } else {
            $json = array(

                'status' => 404,
                'result' => 'Error'
            );

            echo json_encode($json, http_response_code($json["status"]));
        }
    }

    
}