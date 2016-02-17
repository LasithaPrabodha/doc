<?php

/**
 * Created by PhpStorm.
 * User: Amjadz
 * Date: 2/7/2016
 * Time: 4:04 PM
 */


function db_connect(){
        //Datos para la conexiÃ³n con el servidor
        $server   = "localhost";
        $db   = "doc_res";
        $username    = "root";
        $password = "";
        //Creando la conexiÃ³n, nuevo objeto mysqli
        $connection = new mysqli($server,$username,$password,$db);
        //Si sucede algÃºn error la funciÃ³n muere e imprimir el error
        if($connection->connect_error){
            die("Error in connection: ".$connection->connect_errno.
                                      "-".$connection->connect_error);
        }
        //Si nada sucede retornamos la conexiÃ³n
        return $connection;
    }