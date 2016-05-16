<?php

include_once("includes/sql.php");
if ($_SESSION['user_type'] == 'D') {
    $conexion = db_connect();
    
    $ssql = "SELECT cleared FROM doctor where user_id=" . $_SESSION['user_id'];
    $id=$_SESSION['user_id'];
    $result = $conexion->query($ssql);
    $rows = $result->fetch_array();

    if (date("l") == "Monday" && $rows[0] == '0') {
        $sqlup = "UPDATE `doc_res`.`doctor` SET `allocated_appointment_time` = '' WHERE `doctor`.`user_id` = '$id'";
        $conexion->query($sqlup);

        $sqlclr = "UPDATE `doc_res`.`doctor` SET `cleared` = '1' WHERE `doctor`.`user_id` = '$id'";
        $conexion->query($sqlclr);
    }

    if (date("l") == "Tuesday") {
        $sqlunclr = "UPDATE `doc_res`.`doctor` SET `cleared` = '0' WHERE `doctor`.`user_id` = '$id'";
        $conexion->query($sqlunclr);
    }
}

