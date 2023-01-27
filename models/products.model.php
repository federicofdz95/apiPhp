<?php

require_once "connection.php";

class ProductModel {

    static public function getData($table) {
        
        try {

            $sql = "SELECT * FROM $table";
            $stmt = Connection::connect()->prepare($sql);
            $stmt -> execute();
            return $stmt -> fetchAll(PDO::FETCH_CLASS);

        } catch (PDOException $e) {
            
            //include 'models/notfound.php';
            return null;

        }
    }


    static public function getDataId($table, $id)
    {
        try {

            $sql = "SELECT * FROM $table WHERE id_product=$id";
            $stmt = Connection::connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $e) {

            //include 'models/notfound.php';
            return null;
        }
    }

    static public function PostData($table, $data)
    {
        try {

            $name_product = $data['name_product'];
            $category_product = $data['category_product'];
            $material_product = $data['namematerial_product_product'];
            $price_product = $data['price_product'];
            $stock_product = $data['stock_product'];

            $sql = "INSERT INTO MyGuests (name_product,category_product,material_product,price_product,stock_product)";

            $sql .= "VALUES ('$name_product', '$category_product','$material_product','$price_product','$stock_product')";
            //ACA 27/01/2022
            $stmt = Connection::connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (PDOException $e) {

            //include 'models/notfound.php';
            return null;
        }
    }

}