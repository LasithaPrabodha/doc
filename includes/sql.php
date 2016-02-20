<?php

/**
 * Created by PhpStorm.
 * User: Amjadz
 * Date: 2/7/2016
 * Time: 4:04 PM
 */


function db_connect(){

        $server   = "localhost";
        $db   = "doc_res";
        $username    = "root";
        $password = "";

        $connection = new mysqli($server,$username,$password,$db);

        if($connection->connect_error){
            die("Error in connection: ".$connection->connect_errno.
                                      "-".$connection->connect_error);
        }

        return $connection;
    }