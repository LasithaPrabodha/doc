<?php
require_once("../includes/sql.php");
$conexion = db_connect();

?>
<div class=" row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip"  class="well top-block" href="totusers.php">
            <i class="glyphicon glyphicon-user blue"></i>

            <div>Total Users</div>
            <div><?php
                $sql = "SELECT count(*) as count FROM user";
                $result = $conexion->query($sql);

                $total = $result->fetch_array();
                echo $total['count'];
                ?></div>
            <span class="notification"><?php
                $sqlt = "SELECT count(*) as count FROM user where is_active='2'";
                $resultt = $conexion->query($sqlt);

                $tt = $resultt->fetch_array();
                echo $tt['count'];
                ?></span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip"  class="well top-block" href="docs.php">
            <i class="glyphicon glyphicon-user red"></i>

            <div>Doctors</div>
            <div><?php
                $sql2 = "SELECT count(*) as count FROM user where user_type='D'";
                $result2 = $conexion->query($sql2);

                $doc = $result2->fetch_array();
                echo $doc['count'];
                ?></div>
            <span class="notification green"><?php
                $sql22 = "SELECT count(*) as count FROM user where user_type='D' and is_active='2'";
                $result22 = $conexion->query($sql22);

                $doc2 = $result22->fetch_array();
                echo $doc2['count'];
                ?></span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="genp.php">
            <i class="glyphicon glyphicon-user yellow"></i>

            <div>General Physicians</div>
            <div><?php
                $sql3 = "SELECT count(*) as count FROM user where user_type='G'";
                $result3 = $conexion->query($sql3);

                $medicalc = $result3->fetch_array();
                echo $medicalc['count'];
                ?></div>
            <span class="notification yellow"><?php
                $sql33 = "SELECT count(*) as count FROM user where user_type='G' and is_active='2'";
                $result33 = $conexion->query($sql33);

                $medicalc2 = $result33->fetch_array();
                echo $medicalc2['count'];
                ?></span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="users_patients.php">
            <i class="glyphicon glyphicon-user green"></i>

            <div>Users/Patients</div>
            <div><?php
                $sql4 = "SELECT count(*) as count FROM user where user_type='P'";
                $result4 = $conexion->query($sql4);

                $p = $result4->fetch_array();
                echo $p['count'];
                ?></div>
            <span class="notification red"><?php
                $sql44 = "SELECT count(*) as count FROM user where user_type='P' and is_active='2'";
                $result44 = $conexion->query($sql44);

                $p2 = $result44->fetch_array();
                echo $p2['count'];
                ?></span>
        </a>
    </div>
</div>