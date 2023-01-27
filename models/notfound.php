<?php

$json = array(

    'status' => 404,
    'result' => 'Not found'
);

echo json_encode($json, http_response_code($json["status"]));
