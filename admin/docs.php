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

    if (isset($_POST['submit'])) {

        $userid = sql_escape($_POST['userid']);
        $email = sql_escape($_POST['email']);
        $password = md5(sql_escape($_POST['password']));
        $email2 = sql_escape($_POST['email2']);
        $password2 = md5(sql_escape($_POST['password2']));
        $fname = sql_escape($_POST['fname']);
        $lname = sql_escape($_POST['lname']);
        $cno = sql_escape($_POST['cno']);
        $cf = sql_escape($_POST['cf']);
        $sp = sql_escape($_POST['sp']);
        $bank = sql_escape($_POST['bank']);
        $accno = sql_escape($_POST['accno']);
        $add = sql_escape($_POST['add']);
        $cadd = sql_escape($_POST['cadd']);
        $re = emailcheck($email);
        $us = usercheck($email);

        if ($email != $email2) {
            echo "<div>";
            echo " <h3 style='text-align: center;top: 315px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>Emails do not match</font></h3>";
            echo "</div>";
        } else if ($password != $password2) {
            echo "<div>";
            echo " <h3 style='text-align: center;top: 365px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>Passwords do not match</font></h3>";
            echo "</div>";
        } elseif ($re == 'e1' || $us == $userid) {
            $insert = "UPDATE `user` SET `first_name`='$fname',`last_name`='$lname',`email`='$email',`password`='$password',`contact_number`='$cno',`Address`='$add' WHERE user_id='$userid'";
            registerd($insert);
            $doctor = "UPDATE `doctor` SET `specialization`='$sp',`account_no`='$accno',`bank`='$bank',`address`='$cadd' WHERE `user_id`='$userid'";
            registerd($doctor);
            $seelctDcId="select doctor_id from doctor where user_id='$userid'";
            $result=  fetchOne($seelctDcId);
            $charges = "UPDATE `doctor_charges` SET `channeling_fee`='$cf' WHERE doctor_id='$result[0]'";
            registerd($charges);
            $seelctDchrgesId="select charges_id from doctor_charges where user_id='$result[0]'";
            $result3=  fetchOne($seelctDcId);
            $ch_id = $result3[0];
            $dc_id = $result[0];
            update_cid($ch_id, $dc_id);
            $message='User id: '.$userid.' has been updated.';
            echo "<script type='text/javascript'>alert('$message');</script>";
//            echo "<div>";
//            echo " <h5 style='text-align: center;top: 210px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>" . $result3[1] . "</font></h5>";
//            echo "</div>";
        } else {
            echo "<div>";
            echo " <h4 style='text-align: center;top: 305px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>Email is already registered</font></h4>";
            echo "</div>";
        }
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
                window.location = "docs.php?del=" + id;
            return false;
        }

        function acptqry(id)
        {
            if (confirm("Are you sure you want to accept this user?") == true)
                window.location = "docs.php?acpt=" + id;
            return false;
        }

        function actvqry(id)
        {
            if (confirm("Are you sure you want to active this user?") == true)
                window.location = "docs.php?actv=" + id;
            return false;
        }

        function inac(id)
        {
            if (confirm("Are you sure you want to inactive this user?") == true)
                window.location = "docs.php?inac=" + id;
            return false;
        }



    </script>

    <style type="text/css">


    </style>
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


                    <div class="row">
                        <div class="box col-md-12">

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                 aria-hidden="true">

                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                            <h3>Settings</h3>
                                        </div>
                                        <div class="modal-body">
                                            <p>Here settings can be configured...</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                                            <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Doctor Details</h4>
                                        </div>
                                        <div class="modal-body edit-content">

                                        </div>
                                        <div class="modal-footer">

                                            <a href="#" class="btn" data-dismiss="modal">Nah.</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- topbar starts -->
                            <?php include 'users.php'; ?>
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-user"></i> Doctors</h2>

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

                                            $sql = "SELECT * FROM user where user_type='D'";
                                            $result2 = $conexion->query($sql);

                                            while ($row = $result2->fetch_array()) {

                                                $user_id = $row['user_id'];
                                                $first_name = $row['first_name'];
                                                $last_name = $row['last_name'];
                                                $name_with_initials = $row['name_with_initials'];
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
                                                        echo 'Doctor';
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
                                                        <a class="btn btn-info"  data-toggle="modal" id="<?PHP echo $user_id; ?>" data-target="#edit-modal">
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
                                                        <?php }
                                                        ?>

                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <script>
                            $('#edit-modal').on('show.bs.modal', function (e) {

                                var $modal = $(this);
                                essay_id = event.target.id;
                                console.log(essay_id);
//
                                $.ajax({
                                    cache: false,
                                    type: 'POST',
                                    url: 'backend.php',
                                    data: 'EID=' + essay_id,
                                    success: function (data)
                                    {
                                        $modal.find('.edit-content').html(data);
                                    }
                                });

                            })
                        </script>


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
