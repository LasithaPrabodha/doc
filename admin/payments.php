<!DOCTYPE html>
<html lang="en">
    <?php
    include_once 'header.php';
    include_once '../includes/functions.php';

    if (!loggedinadmin()) {
        die("<script>location.href = 'login.php'</script>");
    }
    if (isset($_GET['id']) && isset($_GET['pay'])) {
        $no = $_GET['id'];
        $amount = $_GET['pay'];
        pay($no, $amount);
    }

    if (isset($_GET['id']) && isset($_GET['paydc'])) {
        $no = $_GET['id'];
        $amount = $_GET['paydc'];
        paydc($no, $amount);
    }
    
    function pay($no, $amount) {
        require_once("../includes/sql.php");

        $conexion = db_connect();
        $sql = "insert into gp_payments(gp_id, amount) values('$no','$amount')";
        $result = $conexion->query($sql) or die("oopsy, error when tryin to delete ");
         $message='Rs. '.$amount.' has been paid to Medical Consultant '.$no;
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

    function paydc($no, $amount) {
        require_once("../includes/sql.php");

        $conexion = db_connect();
        $sql = "insert into doc_payments(doc_id, amount) values('$no','$amount')";
        $result = $conexion->query($sql) or die("oopsy, error when tryin to delete ");
        
        $sql = "update doc_pay set appoin_no='0', tot_amnt='0' where doc_id='$no'";
        $result = $conexion->query($sql) or die("oopsy, error when tryin to delete ");
        $message='Rs. '.$amount.' has been paid to Doctor '.$no;
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    ?>
    <script>
        function pay(id)
        {
            var amount = $('#textinput').val();
            if (confirm("Are you sure you want to pay to this employee?") == true)
                window.location = "payments.php?id=" + id + "&pay=" + amount;
            return false;
        }

        function paydc(id)
        {
            var Row = document.getElementById("somerow");
            var Cells = Row.getElementsByTagName("td");
            var amount =Cells[3].innerText;
            
            if (confirm("Are you sure you want to pay to this employee?") == true)
                window.location = "payments.php?id=" + id + "&paydc=" + amount;
            return false;
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
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                                        <thead>
                                            <tr>
                                                <th>Appointment ID</th>
                                                <th>User ID</th>
                                                <th></th>
                                                <th>Doctor ID</th>
                                                <th></th>
                                                <th>Telephone no</th>
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
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['appoinment_id']; ?> </td>
                                                    <td><?php echo $row['user_id']; ?></td>
                                                    <td>  <a class="btn btn-info" href="../profile.php?id=<?php echo $row['user_id']; ?>" target="_blank">
                                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                                            View User
                                                        </a>
                                                    </td>
                                                    <td><?php echo $row['doctor_id']; ?></td>
                                                    <td>  <a class="btn btn-info" href="../profile.php?id=<?php echo $row['doc_user_id']; ?>" target="_blank">
                                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                                            View Doctor
                                                        </a>
                                                    </td>
                                                    <td><?php echo $row['telephone_no']; ?></td>
                                                    <td><?php echo $row['time_slot']; ?></td>
                                                    <td><?php echo $row['amount']; ?></td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="box-content">
                                    <h3>Channeling fee for Doctor</h3>
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                                        <thead>
                                            <tr>
                                                <th>Doctor ID</th>
                                                <th></th>
                                                <th>Doctor name</th>
                                                <th>Total number of appointments</th>
                                                <th>Doctor fee</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once("../includes/sql.php");
                                            $conexion = db_connect();

                                            $sql = "SELECT * FROM `doc_pay`";
                                            $result = $conexion->query($sql);

                                            while ($row = $result->fetch_array()) {
                                                ?>
                                                <tr id='somerow'>
                                                    <td><?php echo $row['doc_id']; ?> </td>
                                                    <td>  <a class="btn btn-info" href="../profile.php?id=<?php echo $row['user_id']; ?>" target="_blank">
                                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                                            View User
                                                        </a>
                                                    </td>
                                                    <td><?php echo $row['doc_name']; ?></td>
                                                    <td><?php echo $row['appoi_no']; ?></td>
                                                    <td><?php echo $row['tot_amnt']; ?></td>
                                                    <td><a class="btn btn-default" href="#" onclick="return paydc(<?php echo $row['doc_id']; ?>)" >
                                                            <i class="glyphicon glyphicon-ok-sign icon-white"></i>
                                                            Pay
                                                        </a></td>


                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="box-content">
                                    <h3>Medical Consultant salary</h3>
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th></th>
                                                <th>Medical Consultant ID</th>
                                                <th>Medical Consultant name</th>
                                                <th>Last paid date</th>
                                                <th>Last paid amount</th>
                                                <th>This month salary</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once("../includes/sql.php");
                                            $conexion = db_connect();

                                            $sql = "SELECT g_physiciant.user_id, g_physiciant.gp_id, user.first_name, user.last_name FROM `g_physiciant` join user on g_physiciant.user_id=user.user_id";
                                            $result = $conexion->query($sql);


                                            while ($row = $result->fetch_array()) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['user_id']; ?> </td>
                                                    <td>  <a class="btn btn-info" href="../profile.php?id=<?php echo $row['user_id']; ?>" target="_blank">
                                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                                            View User
                                                        </a>
                                                    </td>
                                                    <td><?php echo $row['gp_id']; ?></td>
                                                    <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                                                    <td><?php
                                                        $g = $row['gp_id'];
                                                        $sql2 = "SELECT amount, date_added FROM gp_payments WHERE date_added IN (SELECT MAX( date_added ) FROM gp_payments WHERE gp_id =" . $g . " GROUP BY gp_id) ORDER BY gp_id ASC";
                                                        $result2 = $conexion->query($sql2);
                                                        while ($row2 = $result2->fetch_array()) {
                                                            echo $row2['date_added'];
                                                            echo '</td><td>';
                                                            echo $row2['amount'];
                                                        }
                                                        ?></td>
                                                    <td><input id="textinput" name="textinput" type="number" placeholder="Salary" class="form-control input-md"></td>
                                                    <td>
                                                        <a class="btn btn-default" href="#" onclick="return pay(<?php echo $row['gp_id']; ?>)" >
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
