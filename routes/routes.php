<?php

    require 'vendor/autoload.php';

    Flight::route('/', function () {
        echo 'hello world!';
    });

    Flight::start();

    $routesArray = explode("/", $_SERVER['REQUEST_URI']);
    $routesArray = array_filter($routesArray);

    $select = $_GET['select'] ?? "*";

    if (empty($routesArray[2])) {
        $table = "";
    } else {
        $table = explode("?", $routesArray[2])[0];
    }


    /*    
    echo '<pre>';
    print_r($routesArray[2]);
    echo '</pre>';
    */
    

    if (count($routesArray) == 0) {

        $json = array(

            'status' => 404,
            'result' => 'error'
        );

        echo json_encode($json, http_response_code($json["status"]));

        return;
    }


    if(count($routesArray) >= 1 && isset($_SERVER["REQUEST_METHOD"])) {

        // GET
        if($_SERVER["REQUEST_METHOD"] == "GET") {
            
            include 'services/get.php';

        }

        // POST
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            include 'services/post.php';                       

        }

        //PUT
        if($_SERVER["REQUEST_METHOD"] == "PUT") {

            $json = array(

                'status' => 200,
                'result' => 'Solicitud PUT'
            );

            echo json_encode($json, http_response_code($json["status"]));
            

        }

        // DELETE

        if($_SERVER["REQUEST_METHOD"] == "DELETE") {

            $json = array(

                'status' => 200,
                'result' => 'Solicitud DELETE'
            );

            echo json_encode($json, http_response_code($json["status"]));
            

        }
        

    } else {
        echo 'Error';
    }