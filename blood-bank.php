
<?php
include_once("includes/header.php");
include_once("includes/sql.php");

$conexion = db_connect();

if (isset($_POST['submit'])) {
    $dt = $_POST['donatetype'];
    $bt = $_POST['bloodtype'];
    $og = $_POST['organ'];
    $details = $_POST['details'];
    $uid = $_SESSION['user_id'];
    if ($dt == 'b' && $bt != '0' || $dt == 'o' && $og != '0') {
        if ($dt == 'o') {
            $sqldnt = "INSERT INTO `donations`( `user_id`, `user_name`,`user_loc`,`blood_group`, `organ`,`details`) VALUES ('$uid',(select first_name from user where user.user_id ='$uid'),(select Address from user where user.user_id ='$uid'),'$bt','$og','$details')";
            $conexion->query($sqldnt);
        } else {
            $sqldnt2 = "INSERT INTO `donations`( `user_id`,`user_name`,`user_loc`, `blood_group`, `organ`,`details`) VALUES ('$uid',(select first_name from user where user.user_id ='$uid'),(select Address from user where user.user_id ='$uid'),'$bt','no organ','$details')";
            $conexion->query($sqldnt2);
        }
    }
}
?>
<script>
    function showDiv(elem) {
        if (elem.value == 'o') {
            //alert('ok');
            document.getElementById('toggle').style.display = "block";
        }else{
            document.getElementById('toggle').style.display = "none";
        }

    }

   
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
            <div class="col-lg-12 col-md-12">

                <div class="service-area">
                    <!-- Start Service Title -->
                    <div class="section-heading">
                        <h2>Blood/Organ Donations </h2>
                        <div class="line"></div>
                    </div>              
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                        <div class="whyChoose-left">
                            <div class="whychoose-slider">
                                <div class="whychoose-singleslide">
                                    <img src="images/choose-us-img1.jpg" alt="img">
                                </div>
                                <div class="whychoose-singleslide">
                                    <img src="images/choose-us-img2.jpg" alt="img">
                                </div>
                                <div class="whychoose-singleslide">
                                    <img src="images/choose-us-img3.jpg" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12">
                        <?php if (!loggedin()) { ?>
                            <?php
                            require_once("includes/functions.php");



                            if (isset($_POST['username']) && isset($_POST['password'])) {
                                $LUsername = sql_escape($_POST['username']);
                                $LPassword = sql_escape($_POST['password']);

                                if (!empty($LUsername) && !empty($LPassword)) {
                                    $hashPassword = md5($LPassword);
                                    $sql = "SELECT * FROM user WHERE email = '{$LUsername}' ";
                                    $result = $conexion->query($sql);
                                    $resultSet[] = null;
                                    if ($result->num_rows > 0) {

                                        $resultSet = $result->fetch_assoc();
                                    }

                                    if (!empty($resultSet)) {
                                        $filteredID = sql_escape($resultSet['email']);
                                        $filteredPW = sql_escape($resultSet['password']);
                                        if ((($filteredID == $LUsername)) && ($filteredPW == $hashPassword)) {

                                            $_SESSION['email'] = $filteredID;
                                            $_SESSION['user_id'] = $resultSet['user_id'];
                                            $_SESSION['first_name'] = $resultSet['first_name'];
                                            $_SESSION['last_name'] = $resultSet['last_name'];
                                            $_SESSION['name_with_initials'] = $resultSet['name_with_initials'];
                                            $_SESSION['user_type'] = $resultSet['user_type'];
                                            $_SESSION['is_active'] = $resultSet['is_active'];

                                            echo '<meta http-equiv="refresh" content="0">';
                                        } else {
                                            echo "<div>";
                                            echo " <h2 style='text-align: center;top: 355px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>Wrong Password</font></h2>";
                                            echo "</div>";
                                        }
                                    } else {
                                        echo "<div>";
                                        echo " <h2 style='text-align: center;top: 362px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>User Not Found</font></h2>";
                                        echo "</div>";
                                    }
                                }
                            }
                            ?>
                            <!--=========== END HEADER SECTION ================-->

                            <div class="col-md-12">
                                <div class="col-md-offset-1" style="height: 400px;"> 

                                    <div class="whyChoose-right">
                                        <legend>Please login to view/donate.</legend>
                                        <br>
                                        <form id="loginForm" action="" method="post" style="margin:auto">
                                            <div class="row">
                                                <div class="col-md-8 col-sm-8">
                                                    <label class="control-label">Email<span class="required">*</span>
                                                    </label>
                                                    <input type="text" name="username" id="username" class="wp-form-control wpcf7-text" placeholder="Your email address">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-8">
                                                    <label class="control-label">Password <span class="required">*</span>
                                                    </label>
                                                    <input type="password" name="password" id="password" class="wp-form-control wpcf7-text" placeholder="Your password">

                                                    <div class="col-md-6"> <a href="#"><u>Forgot password?</u>  </a></div>
                                                    <div class="col-md-6" > New user?  <a href="register.php"><u>SignUp</u> </a></div>
                                                </div>

                                            </div>

                                            <button class="wpcf7-submit button--itzel" type="submit"><i class="button__icon fa fa-share"></i><span>Sign In</span></button>
                                        </form>

                                    </div>
                                </div>

                            </div>

                        <?php } else { ?>
                            <!-- Select Basic -->
                            <div class="whyChoose-right">
                                <form action="" method="post" id="donation">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="selectbasic">What would you like to donate</label>
                                        <div class="col-md-4">
                                            <select id="donatetype" name="donatetype" class="form-control" onchange="showDiv(this)">
                                                <option value="b">Blood</option>
                                                <option value="o">Organs</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <!-- Select Basic -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="selectbasic">Blood group</label>
                                        <div class="col-md-4">
                                            <select id="bloodtype" name="bloodtype" class="form-control" >
                                                <option value="0">Select your blood group</option>
                                                <option value="op">O+</option>
                                                <option value="on">O-</option>
                                                <option value="ap">A+</option>
                                                <option value="an">A-</option>
                                                <option value="bp">B+</option>
                                                <option value="bn">B-</option>
                                                <option value="abp">AB+</option>
                                                <option value="abn">AB-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div id="toggle" style="display: none;">
                                        <!-- Select Multiple -->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="selectmultiple">Select Multiple</label>
                                            <div class="col-md-4">
                                                <select id="organ" name="organ" class="form-control">
                                                    <option value="0">Select the organ</option>
                                                    <?php
                                                    $sql2 = "select * from organs";
                                                    $result = $conexion->query($sql2);
                                                    while ($row = $result->fetch_array()) {
                                                        echo '<option value="' . $row['organ_id'] . '">' . $row['name'] . '</option>';
                                                    }
                                                    ?>


                                                </select>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>

                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="textarea">Details</label>
                                        <div class="col-md-4">                     
                                            <textarea class="form-control" id="details" name="details"></textarea>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <br>
                                    <div class="form-group">

                                        <div class="col-md-4 col-md-offset-4">
                                            <button id="send" type="submit" value="Submit" name="submit" class="btn btn-primary">Send Donation</button>
                                        </div>
                                        <br><br>
                                        <div class="col-md-4 col-md-offset-4">
                                            Please confirm your donation within 3 days by an email.
                                        </div>
                                    </div>


                                <?php } ?>
                            </form>
                            <div class="clearfix"></div><br>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="singlebutton">View Donations</label>
                                <div class="col-md-4">
                                    <button id="donatebtn" onclick="location.href = 'donations.php';" name="donatebtn" class="btn btn-primary donatebtn">View</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
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
