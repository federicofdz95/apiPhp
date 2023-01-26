<?php    

    /*=======================================
    Mostrar errores
    =======================================*/

    ini_set("display_errors", 1);
    ini_set("log_errors", 1);
    ini_set("error_log", "C:/xampp/htdocs/apiRestPhp/php_error_log");

    require_once 'controllers/routes.controller.php';
    require_once 'models/connection.php';
    

    $index = new RoutesController();
    $index-> index();
