<!DOCTYPE html>
<html lang="en">
    <?php
    include_once 'header.php';
    include_once '../includes/functions.php';

    if (!loggedinadmin()) {
        die("<script>location.href = 'login.php'</script>");
    }
    if (isset($_GET['mcid'])) {
        $no = $_GET['mcid'];
        pay($no);
    }

    if (isset($_GET['id']) && isset($_GET['paydc']) && isset($_GET['doc_id'])) {
        $no = $_GET['id'];
        $amount = $_GET['paydc'];
        $doc_id = $_GET['doc_id'];
        paydc($no, $amount, $doc_id);
    }

    function pay($no) {
        require_once("../includes/sql.php");

        $conexion = db_connect();
        $sqql = "select fee from fees where type='mc'";
        $result = $conexion->query($sqql);
        $mSal = $result->fetch_array();
        
        $sql = "insert into mc_payments(mc_id, amount) values('$no','$mSal[0]')";
        $conexion->query($sql) or die("oopsy, error when tryin to delete ");
        $message = 'Rs. ' . $mSal[0] . ' has been paid to Medical Consultant ' . $no;
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

    function paydc($no, $amount, $doc_id) {
        require_once("../includes/sql.php");

        $conexion = db_connect();
//        $sql = "insert into doc_payments(doc_id, amount) values('$no','$amount')";
//        $result = $conexion->query($sql) or die("oopsy, error when tryin to delete ");

        $sql = "update doc_pay set appoi_no='0', tot_amnt='0' where doc_id='$no'";
        $sql1 = "insert into doc_salary(doc_id, amount) values('$doc_id','$amount')";
        $conexion->query($sql) or die("oopsy, error when tryin to delete ");
        $conexion->query($sql1) or die("oopsy, error when tryin to delete ");
        $message = 'Rs. ' . $amount . ' has been paid to Doctor ' . $no;
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    ?>
    <script>


        function pay(id)
        {

            if (confirm("Are you sure you want to pay to this employee?") == true)
                window.location = "payments.php?mcid=" + id;
            return false;
        }


        function setcfee(type) {
            if (type == 'c') {
                var x = document.getElementById("cfee").value;
            } else {
                var x = document.getElementById("msal").value;
            }
            $.ajax({
                cache: false,
                type: 'POST',
                url: 'cfee.php',
                data: {cfee: x, t: type},
                success: function (data)
                {
                    alert(data);
                }
            });
        }
    </script>
    <body>


        <?php include 'topBar.php';
        ?>
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
                                <a href="#">Payments</a>
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

                            <!-- topbar starts -->

                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-user"></i>Payments</h2>

                                    <div class="box-icon">
                                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                        <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <h3>Appointments</h3>
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" id="tablePayDoc">
                                        <thead>
                                            <tr>
                                                <th>Appointment ID</th>
                                                <th>User ID</th>
                                                <th>Doctor ID</th>
                                                <th>User telephone no</th>
                                                <th>Time slot</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once("../includes/sql.php");
                                            $conexion = db_connect();

                                            $sql = "SELECT appoinments.*, doctor.user_id as doc_user_id, patient_payments.amount FROM `appoinments` join `doctor` on appoinments.doctor_id=doctor.doctor_id join `patient_payments` on appoinments.appoinment_id=patient_payments.appoinment_id";
                                            $result = $conexion->query($sql);

                                            while ($row = $result->fetch_array()) {
                                                $time_slot = $row['time_slot'];
                                                $times = ['12 - 01 AM', '01 - 02 AM', '02 - 03 AM', '03 - 04 AM', '04 - 05 AM', '05 - 06 AM', '06 - 07 AM', '07 - 08 AM', '08 - 09 AM', '09 - 10 AM', '10 - 11 AM', '11 - 12 AM', '12 - 01 PM', '01 - 02 PM', '02 - 03 PM', '03 - 04 PM', '04 - 05 PM', '05 - 06 PM', '06 - 07 PM', '07 - 08 PM', '08 - 09 PM', '09 - 10 PM', '10 - 11 PM', '11 - 12 AM'];
                                                $ts = $times[$time_slot[1]] . " " . substr($time_slot, 3);
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['appoinment_id']; ?> </td>
                                                    <td><a target="_blank" href="http://localhost/doc/profile.php?id=<?php echo $row['user_id']; ?>"><?php echo $row['user_id']; ?></td>
                                                    <td><a target="_blank" href="http://localhost/doc/profile.php?id=<?php echo $row['doc_user_id']; ?>"><?php echo $row['doctor_id']; ?></td>
                                                    <td><?php echo $row['telephone_no']; ?></td>
                                                    <td><?php echo $ts; ?></td>
                                                    <td><?php echo $row['amount']; ?></td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="box-content">
                                    <h3>Doctor fee for Doctor</h3>
                                    <br>


                                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                                        <thead>
                                            <tr>
                                                <th>Doctor ID</th>
                                                <th>Doctor name</th>
                                                <th>Total number of appointments</th>
                                                <th>Doctor fee</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once("../includes/sql.php");
                                            $conexion = db_connect();

                                            $sql = "SELECT doc_pay.*, doctor.user_id FROM doc_pay join doctor on doc_pay.doc_id = doctor.doctor_id";
                                            $result = $conexion->query($sql);
                                            $count = 0;
                                            while ($row = $result->fetch_array()) {
                                                ?>
                                                <tr id='somerow<?PHP
                                                echo $count;
                                                ?>'>
                                                    <td><a target="_blank" href="http://localhost/doc/profile.php?id=<?php echo $row['user_id']; ?>"><?php echo $row['doc_id']; ?> </td>

                                                    <td><?php echo $row['doc_name']; ?></td>
                                                    <td><?php echo $row['appoi_no']; ?></td>
                                                    <td><?php echo $row['tot_amnt']; ?></td>


                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="box-content">
                                    <h3>Channeling fee from patients</h3>
                                    <br>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="textinput">Channeling fee</label>  
                                        <div class="col-md-4">
                                            <input id="cfee" name="cfee" type="text" class="form-control input-md" value="<?PHP
                                            include_once("../includes/sql.php");
                                            $conexion = db_connect();
                                            $sqql = "select fee from fees where type='channelling'";
                                            $result = $conexion->query($sqql);
                                            $rows = $result->fetch_array();
                                            echo $rows[0];
                                            ?>">
                                            <span class="help-block">in Rs.</span>  
                                        </div>
                                        <a class="btn btn-default" href="#" onclick="return setcfee('c')" >
                                            <i class="glyphicon glyphicon-ok-sign icon-white"></i>
                                            Set
                                        </a>
                                    </div>
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                                        <thead>
                                            <tr>
                                                <th>Payment ID</th>
                                                <th>User ID</th>
                                                <th>Appointment ID</th>
                                                <th>Doctor ID</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once("../includes/sql.php");
                                            $conexion = db_connect();

                                            $sql = "SELECT patient_payments.*, doctor.user_id FROM patient_payments join doctor on patient_payments.doctor_id = doctor.doctor_id";
                                            $result = $conexion->query($sql);
                                            $count = 0;
                                            while ($row = $result->fetch_array()) {
                                                ?>
                                                <tr id='somerow<?PHP
                                                echo $count;
                                                ?>'>
                                                    <td><?php echo $row['p_payment_id']; ?> </td>
                                                    <td><?php echo $row['user_id']; ?> </td>
                                                    <td><?php echo $row['appoinment_id']; ?> </td>
                                                    <td><a target="_blank" href="http://localhost/doc/profile.php?id=<?php echo $row['user_id']; ?>"><?php echo $row['doctor_id']; ?></a> </td>
                                                    <td><?php echo $row['amount']; ?></td>
                                                    <td><?php echo $row['date']; ?></td>


                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="box-content">
                                    <h3>Medical Consultant salary</h3>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="textinput">Medical Consultant salary</label>  
                                        <div class="col-md-4">
                                            <input id="msal" name="msal" type="text" class="form-control input-md" value="<?PHP
                                            include_once("../includes/sql.php");
                                            $conexion = db_connect();
                                            $sqql = "select fee from fees where type='mc'";
                                            $result = $conexion->query($sqql);
                                            $mSal = $result->fetch_array();
                                            echo $mSal[0];
                                            ?>">
                                            <span class="help-block">in Rs.</span>  
                                        </div>
                                        <a class="btn btn-default" href="#" onclick="return setcfee('mc')" >
                                            <i class="glyphicon glyphicon-ok-sign icon-white"></i>
                                            Set
                                        </a>
                                    </div>
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Medical Consultant ID</th>
                                                <th>Medical Consultant name</th>
                                                <th>Last paid date</th>
                                                <th>This month salary</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once("../includes/sql.php");
                                            $conexion = db_connect();

                                            $sql = "SELECT medical_c.user_id, medical_c.mc_id, user.first_name, user.last_name FROM `medical_c` join user on medical_c.user_id=user.user_id";
                                            $result = $conexion->query($sql);


                                            while ($row = $result->fetch_array()) {
                                                ?>
                                                <tr>
                                                    <td><a target="_blank" href="http://localhost/doc/profile.php?id=<?php echo $row['user_id']; ?>"><?php echo $row['user_id']; ?></a></td>

                                                    <td><?php echo $row['mc_id']; ?></td>
                                                    <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                                                    <td><?php
                                                        $g = $row['mc_id'];
                                                        $sql2 = "SELECT amount, date_added FROM mc_payments WHERE date_added IN (SELECT MAX( date_added ) FROM mc_payments WHERE mc_id =" . $g . " GROUP BY mc_id) ORDER BY mc_id ASC";
                                                        $result2 = $conexion->query($sql2);
                                                        while ($row2 = $result2->fetch_array()) {
                                                            echo $row2['date_added'];
                                                        }
                                                        ?></td>

                                                    <td>
                                                        <a class="btn btn-default" href="#" onclick="return pay(<?php echo $row['mc_id']; ?>)" >
                                                            <i class="glyphicon glyphicon-ok-sign icon-white"></i>
                                                            Pay
                                                        </a>
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
