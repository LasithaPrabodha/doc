<?php

require_once("../includes/sql.php");
if ($_POST['t'] == 'c') {
    $fee = $_POST['cfee'];

    $conexion = db_connect();

    if ($conexion->query("update fees set fee='$fee' where type ='channelling'")) {
        echo "Channeling fee successfully changed.";
    }
}  else {
     $fee = $_POST['cfee'];

    $conexion = db_connect();

    if ($conexion->query("update fees set fee='$fee' where type ='mc'")) {
        echo "Medical Consultant salary successfully changed.";
    }
}