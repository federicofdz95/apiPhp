<?php

require 'flight/Flight.php';

Flight::route('/api/products', function () {
    include 'routes/services/products.php';
});

Flight::route('/api/products/@id', function ($id) {
    include 'routes/services/products.php';
});

Flight::route('/api/users', function () {
    include 'routes/services/get.php';
});

Flight::start();
