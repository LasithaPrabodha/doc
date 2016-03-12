<?php

if(!isset($_SESSION)){
    session_start();
    $current_page = $_SERVER['SCRIPT_NAME'];
//	$httpreferer = $_SERVER['HTTP_REFERER'];
}

require_once("sql.php");

$conexion = db_connect();

//change status

header('Content-Type: application/json');

if(isset($_POST['status'])){
    $status=$_POST['status'];
    $id=$_POST['id'];
    $sql = "UPDATE doctor SET availability='$status' WHERE user_id='$id'";

                            if ($result = $conexion->query($sql)) {
                                $aResult['result']= "<div class='alert alert-success'>Status updated successfully.</div>";
                            } else {
                                 $aResult['result']= "<div class='alert alert-danger'>Error while updating status.</div>";
                            }
    
    echo json_encode($aResult);
}

if(isset($_POST['radioval'])){
    
    
    $_SESSION['radioval'] = $_POST['radioval'];
    echo json_encode($_SESSION['radioval']);
}
    
    

 
    

    



