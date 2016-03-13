<?php

if (!isset($_SESSION)) {
    session_start();
    $current_page = $_SERVER['SCRIPT_NAME'];
//	$httpreferer = $_SERVER['HTTP_REFERER'];
}

require_once("sql.php");

$conexion = db_connect();

//convert URL parameteres  to variables

if (isset($_GET)) {
    foreach ($_GET as $key => $value) {
        if (!empty($value)) {
            ${$key} = trim($value);
        }
    }
}

function loggedin() {
    if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
        return true;
    } else {
        return false;
    }
}

function loggedinadmin() {
    if (isset($_SESSION['email']) && !empty($_SESSION['email']) && isset($_SESSION['user_type']) && !empty($_SESSION['user_type']) && $_SESSION['user_type']=='A') {
        return true;
    } else {
        return false;
    }
}

function getuser($field) {
    $conexion = db_connect();
    $sqlStr = "SELECT $field FROM user WHERE user_id='" . $_SESSION['user_id'] . "'";
    if ($resultSet = $conexion->executeQuery($sqlStr)) {
        if ($query_result = mysql_result($resultSet, 0, $field)) {
            return $query_result;
        } else {
            echo "e1";
        }
    } else {
        echo "e2";
    }
}

function register($str) {
    $conexion = db_connect();

    if ($conexion->query($str) == true) {
        $result = array($conexion->insert_id, "A patient registered!");
        return $result;
    } else {
        echo "e2";
    }
}

function registerd($str) {
    $conexion = db_connect();

    if ($conexion->query($str) == true) {
        $result = array($conexion->insert_id, "A doctor registered!");
        return $result;
    } else {
        echo "e2";
    }
}

function registerc($str) {
    $conexion = db_connect();

    if ($conexion->query($str) == true) {
        $result = array($conexion->insert_id, "A Medical Consultant registered!");
        return $result;
    } else {
        echo "e2";
    }
}

function update_cid($ch_id, $dc_id) {
    $conexion = db_connect();
    $st = "UPDATE `doctor` SET`charges_id`='$ch_id' WHERE doctor_id='$dc_id'";
    if ($conexion->query($st) == true) {

        return "Done";
    } else {
        echo "e2";
    }
}

//prepare for sql interaction

function sql_escape($value) {
    if (PHP_VERSION < 6) {
        $value = get_magic_quotes_gpc() ? stripcslashes($value) : trim($value);
    }
    if (function_exists("mysql_real_escape_string")) {
        $value = mysql_real_escape_string($value);
    } else {
        $value = mysql_escape_string($value);
    }
    return $value;
}
function docpay($str) {
    $conexion = db_connect();

    if ($conexion->query($str) == true) {
        $result = array($conexion->insert_id, "A Doctor payment registered!");
        return $result;
    } else {
        echo "e2";
    }
}

// populate single record

function fetchOne($sql) {

    $conexion = db_connect();
    $rs = $conexion->query($sql);
    if ($rs->num_rows > 0) {
        $out = $rs->fetch_array($rs);
    }
    return !empty($out) ? $out : null;
}

// populate multiple record

function fetchAll($sql) {
    $conexion = db_connect();
    $rs = mysql_query($sql, $conexion) or die("Database single query error.<br/>" . mysql_error());
    while ($rows = mysql_fetch_assoc($rs)) {
        $out[] = $rows;
    }
    return !empty($out) ? $out : null;
}

function feedbacks() {



    if (loggedin()) {
        $name = $_SESSION['first_name'] . " " . $_SESSION['last_name'];
        $email = $_SESSION['email'];
    } else {
        $name = $_POST['name'];
        $email = $_POST['email'];
    }
    $subject = $_POST['subject'];
    $content = $_POST['content'];



    $sql = "INSERT INTO `feedbacks`(`name`, `email`, `subject`, `content`) VALUES ('$name', '$email', '$subject', '$content')";
    if ($conexion->query($sql)) {
        
    }
}
