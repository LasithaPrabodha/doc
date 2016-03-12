
<?php
include_once("includes/header.php");
include_once("includes/sql.php");

$conexion = db_connect();
?>
<script>
    function showDiv(elem) {
        if (elem.value == 'o') {
            //alert('ok');
            document.getElementById('toggle').style.display = "block";
        }

    }

    $('#donatebtn').click(function (e) {
        e.preventDefault();


        $('#donateModal').modal('show');
    });
</script>
<!--=========== END HEADER SECTION ================-->        
<section id="blogArchive">      
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="blog-breadcrumbs-area">
                <div class="container">
                    <div class="blog-breadcrumbs-left">
                        <h2>Donations</h2>
                    </div>
                    <div class="blog-breadcrumbs-right">
                        <ol class="breadcrumb">
                            <li>You are here</li>
                            <li><a href="#">Home</a></li>                  
                            <li class="active">Donations
                        </ol>
                    </div>
                </div>
            </div>
        </div>        
    </div>      
</section>

<!--=========== BEGAIN Why Choose Us SECTION ================-->

<section id="whychooseSection">
    <div class="container">
        <div class="row">

            <div class="box-content">

                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                        <tr>
                            <th>User name</th>
                            <th>Blood Group</th>
                            <th>Organ</th>
                            <th>Details</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM donations";
                        $result = $conexion->query($sql);

                        while ($row = $result->fetch_array()) {
                            ?>
                            <tr>
                                <td><?php echo $row['user_name']; ?></td>
                                <td><?php echo $row['blood_group']; ?></td>
                                <td><?php echo $row['organ']; ?></td>
                                <td><?php echo $row['details']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><a class="btn btn-info" href="/doc/profile.php?id=<?php echo $row['user_id']; ?>" target="_blank">
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
</section>
<!--=========== END Why Choose Us SECTION ================-->
<!--=========== BEGAIN Counter SECTION ================-->
<section id="counterSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="counter-area">
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="counter-box">
                            <div class="counter-no counter">
                                200
                            </div>
                            <div class="counter-label">Doctors</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="counter-box">
                            <div class="counter-no counter">
                                300
                            </div>
                            <div class="counter-label">Clinic Rooms</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="counter-box">
                            <div class="counter-no counter">
                                350
                            </div>
                            <div class="counter-label">Awards</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="counter-box">
                            <div class="counter-no counter">
                                450
                            </div>
                            <div class="counter-label">Happy Patients</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=========== End Counter SECTION ================-->
<section id="extraFeatures">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="departments-area">
                    <div class="section-heading">
                        <h2>Our Departments</h2>
                        <div class="line"></div>
                    </div>
                    <!-- Start Departments Accordion -->
                    <div class="panel-group custom-panel" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        Pediatric Clinic <span class="fa fa-minus"></span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        Dental Implants<span class="fa fa-plus"></span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <img class="img-center" src="images/choose-us-img3.jpg" alt="img">
                                    <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        Laryngological Clinic  <span class="fa fa-plus"></span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                        Laryngological Clinic<span class="fa fa-plus"></span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <img class="img-center" src="images/choose-us-img3.jpg" alt="img">
                                    <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                        Rehabilitation Therapy Clinic <span class="fa fa-plus"></span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="how-works-area">
                    <div class="section-heading">
                        <h2>How we work</h2>
                        <div class="line"></div>
                    </div>
                    <div class="how-works">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active"><a href="#experiment" data-toggle="tab">Experiment</a></li>
                            <li><a href="#monitor" data-toggle="tab">Monitor</a></li>
                            <li><a href="#clean" data-toggle="tab">Clean</a></li>
                            <li><a href="#fast" data-toggle="tab">Fast</a></li>
                            <li><a href="#support" data-toggle="tab">Support</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="experiment">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div>
                            <div class="tab-pane fade " id="monitor">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                <img class="img-center" src="images/choose-us-img2.jpg" alt="img">
                            </div>
                            <div class="tab-pane fade " id="clean">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div>
                            <div class="tab-pane fade " id="fast">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                <img class="img-center" src="images/choose-us-img1.jpg" alt="img">
                            </div>
                            <div class="tab-pane fade " id="support">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>         
    </div>
</section>
<?php include_once 'includes/footer.php'; ?>
<!-- external javascript -->

<script src="admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="admin/js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='admin/bower_components/moment/min/moment.min.js'></script>
<script src='admin/bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='admin/js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="admin/bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="admin/bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="admin/js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="admin/bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="admin/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="admin/js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="admin/js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="admin/js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="admin/js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="admin/js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="admin/js/charisma.js"></script>

