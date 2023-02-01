<?php

require_once "connection.php";

class MenuModel {

    static public function getData($table) {
        
        $sql = "SELECT * FROM $table";
        
        try {
            $stmt = Connection::connect()->prepare($sql);
            $stmt -> execute();
            return $stmt -> fetchAll(PDO::FETCH_CLASS);

        } catch (PDOException $e) {            
            
            return null;
        }
    }


    static public function getDataId($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id_product=$id";
        
        try {
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
        $name_product = $data['name_product'];
        $category_product = $data['category_product'];
        $material_product = $data['material_product'];
        $price_product = $data['price_product'];
        $stock_product = $data['stock_product'];

        $sql = "INSERT INTO $table (name_product,category_product,material_product,price_product,stock_product)";
        $sql .= "VALUES ('$name_product', '$category_product','$material_product','$price_product','$stock_product')";
        
        try {
            $stmt = Connection::connect()->prepare($sql);
            $stmt->execute();
            $count = $stmt->rowCount();
            return $count;

        } catch (PDOException $e) {
            //include 'models/notfound.php';
            return null;
        }
    }

    static public function PutData($table, $data)
    {
        $id_product = $data['id_product'];
        $name_product = $data['name_product'];

        $sql = "UPDATE $table ";
        $sql .= "SET name_product='$name_product' ";
        $sql .= "WHERE id_product=$id_product";

        try {           
            $stmt = Connection::connect()->prepare($sql);
            $stmt->execute();
            $count = $stmt->rowCount();
            return $count;

        } catch (PDOException $e) {
            //include 'models/notfound.php';
            return null;
        }
    }


    static public function DeleteData($table, $id_product)
    {
        try {

            $sql = "DELETE FROM $table WHERE id_product=$id_product";
            $stmt = Connection::connect()->prepare($sql);
            $stmt->execute();
            $count = $stmt->rowCount();
            return $count;

        } catch (PDOException $e) {

            //include 'models/notfound.php';
            return null;
        }
    }

}