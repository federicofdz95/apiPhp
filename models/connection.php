<?php

use IMAP\Connection as IMAPConnection;

    class Connection {

        /*=======================================
        Informacion de la Base de Datos
        =======================================*/
        static public function infoDatabase() {

            $infoDB = array (
                "host" => "sql870.main-hosting.eu",
                "database" => "u915046860_deltafdz",
                "user" => "u915046860_federico",
                "pass" => "Cuchito.22"
            );

            return $infoDB;
        }

        /*=======================================
        Informacion de la Base de Datos
        =======================================*/
        static public function connect() {

            try {
                
                $link = new PDO (
                    "mysql:host=". Connection::infoDatabase()["host"] .";dbname=". Connection::infoDatabase()["database"],
                    Connection::infoDatabase()["user"],
                    Connection::infoDatabase()["pass"]
                );

            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }

            return $link;

        }


    }