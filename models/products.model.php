<?php

require_once "connection.php";

class GetModel {

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

}