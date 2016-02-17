<?php
/**
 * Created by PhpStorm.
 * User: Amjadz
 * Date: 2/7/2016
 * Time: 4:04 PM
 */

//PDO
function db_connect() {
    $dbh;
    try {
        $dbh = new PDO("mysql:host=localhost;dbname=doc_db", "root", "");
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec("SET NAMES 'utf8'");
        $dbh->exec("SET time_zone = '+5:30'");
    } catch (PDOException $e) {
        print ("Could not connect to server\n");
        $date_time = date('Y-m-d H:i:s');
        error_log($date_time . " " . $e->getMessage());
        print ("getMessage(): " . $e->getMessage() . "\n");
        exit();
    }

    return ($dbh);
}


$dbs = get_connection();

$res = mysql_query("select * from doctor");

echo $dbh;