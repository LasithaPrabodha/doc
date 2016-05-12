<!DOCTYPE html>
<html lang="en">
    <?php
    include_once 'header.php';
    include_once '../includes/functions.php';

    if (!loggedinadmin()) {
        die("<script>location.href = 'login.php'</script>");
    }
    if (isset($_GET['del'])) {
        $no = $_GET['del'];
        delete($no);
    } elseif (isset($_GET['acpt'])) {
        $no = $_GET['acpt'];
        accept($no);
    } elseif (isset($_GET['actv'])) {
        $no = $_GET['actv'];
        active($no);
    } elseif (isset($_GET['inac'])) {
        $no = $_GET['inac'];
        inactive($no);
    }

    function delete($no) {
        require_once("../includes/sql.php");

        $conexion = db_connect();
        $sql = "DELETE FROM user WHERE user_id='" . $no . "'";
        $result = $conexion->query($sql) or die("oopsy, error when tryin to delete ");
    }

    function accept($no) {
        require_once("../includes/sql.php");

        $conexion = db_connect();
        $sql = "UPDATE `user` SET `is_active` = '1' WHERE `user_id` = " . $no;
        $result = $conexion->query($sql) or die("oopsy, error when tryin to delete ");
    }

    function active($no) {
        require_once("../includes/sql.php");

        $conexion = db_connect();
        $sql = "UPDATE `user` SET `is_active` = '1' WHERE `user_id` = " . $no;
        $result = $conexion->query($sql) or die("oopsy, error when tryin to delete ");
    }

    function inactive($no) {
        require_once("../includes/sql.php");

        $conexion = db_connect();
        $sql = "UPDATE `user` SET `is_active` = '0' WHERE `user_id` = " . $no;
        $result = $conexion->query($sql) or die("oopsy, error when tryin to delete ");
    }
    ?>

    <script>
        function Deleteqry(id)
        {
            if (confirm("Are you sure you want to delete this user?") == true)
                window.location = "totusers.php?del=" + id;
            return false;
        }

        function acptqry(id)
        {
            if (confirm("Are you sure you want to accept this user?") == true)
                window.location = "totusers.php?acpt=" + id;
            return false;
        }

        function actvqry(id)
        {
            if (confirm("Are you sure you want to active this user?") == true)
                window.location = "totusers.php?actv=" + id;
            return false;
        }

        function inac(id)
        {
            if (confirm("Are you sure you want to inactive this user?") == true)
                window.location = "totusers.php?inac=" + id;
            return false;
        }




    </script>
    <body>


        <?php include 'topBar.php'; ?>
        <div class="ch-container">
            <div class="row">

                <?php include 'leftMenu.php'; ?>

                <noscript>
                <div class="alert alert-block col-md-12">
                    <h4 class="alert-heading">Warning!</h4>

                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                        enabled to use this site.</p>
                </div>
                </noscript>

                <div id="content" class="col-lg-10 col-sm-10">
                    <!-- content starts -->
                    <div>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">Dashboard</a>
                            </li>
                        </ul>
                    </div>
                    <?php include 'users.php'; ?>

                    <div class="row">
                        <div class="box col-md-12">

                            

                            <!-- table starts -->

                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-user"></i> Total Users</h2>

                                    <div class="box-icon">
                                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                        <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">

                                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Date registered</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once("../includes/sql.php");
                                            $conexion = db_connect();

                                            $sql = "SELECT * FROM user";
                                            $result = $conexion->query($sql);

                                            while ($row = $result->fetch_array()) {

                                                $user_id = $row['user_id'];
                                                $first_name = $row['first_name'];
                                                $last_name = $row['last_name'];
                                                $email = $row['email'];
                                                $profile_img = $row['profile_img'];
                                                $gender = $row['gender'];
                                                $user_type = $row['user_type'];
                                                $is_active = $row['is_active'];
                                                $contact_number = $row['contact_number'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $first_name . ' ' . $last_name; ?> </td>
                                                    <td class="center">2012/01/01</td>
                                                    <td class="center"><?php
                                                        if ($user_type == 'D')
                                                            echo 'Doctor';
                                                        elseif ($user_type == 'P')
                                                            echo 'Patient';
                                                        elseif ($user_type == 'G')
                                                            echo 'Medical Consult';
                                                        else 
                                                            echo 'Admin';
                                                        ?></td>
                                                    <td class="center">
                                                        <?php
                                                        if ($is_active == '1')
                                                            echo '<span class="label-success label label-default">Active</span>';
                                                        if ($is_active == '0')
                                                            echo '<span class="label-success label label-danger">Inactive</span>';
                                                        if ($is_active == '2')
                                                            echo '<span class="label-warning label label-default">Pending</span>';
                                                        ?>
                                                    </td>
                                                    <td class="center">


                                                        <!--                                                    <a class="btn btn-success" href="#">
                                                                                                                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                                                                                View
                                                                                                            </a>-->
                                                        <a class="btn btn-info" href="../profile.php?id=<?php echo $user_id; ?>"  target="_blank">
                                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                                            View
                                                        </a>
                                                        <a class="btn btn-danger" href="#" onclick="return Deleteqry(<?php echo $user_id; ?>)" >
                                                            <i class="glyphicon glyphicon-trash icon-white"></i>
                                                            Delete
                                                        </a>
                                                        <?php if ($is_active == '1') { ?>  
                                                            <a class="btn btn-default" href="#" onclick="return inac(<?php echo $user_id; ?>)" >
                                                                <i class="glyphicon glyphicon-trash icon-white"></i>
                                                                Inactivate
                                                            </a>
                                                        <?php } elseif ($is_active == '2') { ?>  
                                                            <a class="btn btn-default" href="#" onclick="return acptqry(<?php echo $user_id; ?>)" >
                                                                <i class="glyphicon glyphicon-ok icon-white"></i>
                                                                Approve
                                                            </a>
                                                        <?php } elseif ($is_active == '0') { ?>
                                                            <a class="btn btn-default" href="#" onclick="return actvqry(<?php echo $user_id; ?>)" >
                                                                <i class="glyphicon glyphicon-ok icon-white"></i>
                                                                Make active
                                                            </a>
                                                        <?php } ?>

                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>




                    </div><!--/row--><!--/.fluid-container-->


                    <!-- external javascript -->

                    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

                    <!-- library for cookie management -->
                    <script src="js/jquery.cookie.js"></script>
                    <!-- calender plugin -->
                    <script src='bower_components/moment/min/moment.min.js'></script>
                    <script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
                    <!-- data table plugin -->
                    <script src='js/jquery.dataTables.min.js'></script>

                    <!-- select or dropdown enhancer -->
                    <script src="bower_components/chosen/chosen.jquery.min.js"></script>
                    <!-- plugin for gallery image view -->
                    <script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
                    <!-- notification plugin -->
                    <script src="js/jquery.noty.js"></script>
                    <!-- library for making tables responsive -->
                    <script src="bower_components/responsive-tables/responsive-tables.js"></script>
                    <!-- tour plugin -->
                    <script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
                    <!-- star rating plugin -->
                    <script src="js/jquery.raty.min.js"></script>
                    <!-- for iOS style toggle switch -->
                    <script src="js/jquery.iphone.toggle.js"></script>
                    <!-- autogrowing textarea plugin -->
                    <script src="js/jquery.autogrow-textarea.js"></script>
                    <!-- multiple file upload plugin -->
                    <script src="js/jquery.uploadify-3.1.min.js"></script>
                    <!-- history.js for cross-browser state change on ajax -->
                    <script src="js/jquery.history.js"></script>
                    <!-- application script for Charisma demo -->
                    <script src="js/charisma.js"></script>


                    </body>
                    </html>
