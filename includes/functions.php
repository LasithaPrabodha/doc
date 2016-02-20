<?php

if(!isset($_SESSION)){
    session_start();
    $current_page = $_SERVER['SCRIPT_NAME'];
//	$httpreferer = $_SERVER['HTTP_REFERER'];
}

require_once("sql.php");

$conexion = db_connect();

//convert URL parameteres  to variables

if(isset($_GET))
{
    foreach ($_GET as $key => $value) {
        if(!empty($value)){
            ${$key} = trim($value);
        }
    }
}
function loggedin(){
    if(isset($_SESSION['email']) && !empty($_SESSION['email']))
    {
        return true;
    }else{
        return false;
    }
}

function getuser($field)
{
    $conexion = db_connect();
    $sqlStr ="SELECT $field FROM user WHERE user_id='".$_SESSION['user_id']."'";
    if($resultSet = $conexion->executeQuery($sqlStr)){
        if($query_result = mysql_result($resultSet, 0, $field)){
            return $query_result;
        }else{ echo "e1";}
    }else{ echo "e2";}
}

//prepare for sql interaction

function sql_escape($value)
{
    if (PHP_VERSION < 6) {
        $value = get_magic_quotes_gpc() ? stripcslashes($value) : trim($value);
    }
    if(function_exists("mysql_real_escape_string")){
        $value = mysql_real_escape_string($value);
    }else{
        $value = mysql_escape_string($value);
    }
    return $value;
}

// populate single record

function fetchOne($sql){

    $conexion = db_connect();
    $rs = $conexion->query($sql);
    if ($rs->num_rows > 0) {
        $out = $rs->fetch_array($rs);
    }
    return !empty($out) ? $out : null;
}

// populate multiple record

function fetchAll($sql){
    $conexion = db_connect();
    $rs = $conexion->query($sql) or die("Database single query error.<br/>".mysql_error());
    while ($rows =mysql_fetch_assoc($rs)) {
        $out[]=$rows;
    }
    return !empty($out) ? $out : null;
}
