<?php
require_once("../includes/sql.php");
$fee=$_POST['cfee'];

$conexion = db_connect();

if($conexion->query("insert into channeling_fee (fee) values ('$fee')")){
    echo "Channeling fee successfully setted.";
}
