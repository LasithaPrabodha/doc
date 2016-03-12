<!DOCTYPE html>
<html lang="en">
    <?php
    include_once 'header.php';
    include_once '../includes/functions.php';
    
    if(!loggedinadmin()){
        die("<script>location.href = 'login.php'</script>");
    }
    ?>


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
                            <a href="#">Donations</a>
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
                                <h2><i class="glyphicon glyphicon-user"></i>Donations</h2>

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
                                            <th>Donation ID</th>
                                            <th>User ID</th>
                                            <th>User name</th>
                                            <th>User's Address</th>
                                            <th>Blood Group</th>
                                            <th>Organ</th>
                                            <th>Details</th>
                                            <th>Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include_once("../includes/sql.php");
                                        $conexion = db_connect();

                                        $sql = "SELECT * FROM donations";
                                        $result = $conexion->query($sql);

                                        while ($row = $result->fetch_array()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['donation_id']; ?> </td>
                                                <td><?php echo $row['user_id']; ?></td>
                                                <td><?php echo $row['user_name']; ?></td>
                                                <td><?php echo $row['user_loc']; ?></td>
                                                <td><?php echo $row['blood_group']; ?></td>
                                                <td><?php echo $row['organ']; ?></td>
                                                <td><?php echo $row['details']; ?></td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td><a class="btn btn-info" href="../profile.php?id=<?php echo $row['user_id']; ?>" target="_blank">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        View Donor
                                                    </a></td>
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
