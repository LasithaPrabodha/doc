
<?php
include_once("includes/header.php");
include_once("includes/sql.php");

$conexion = db_connect();

if (isset($_POST['submit'])) {
    $dt = $_POST['donatetype'];
    $bt = $_POST['bloodtype'];
    $og = $_POST['organ'];
    if ($og == '1') {
        $og = 'Kidney';
    } else if ($og == '2') {
        $og = 'Liver Tissues';
    }
    $details = $_POST['details'];
    $uid = $_SESSION['user_id'];

    $sql = "SELECT donation_id FROM donations WHERE user_id = '$uid' AND organ='$og' ";
    $result = $conexion->query($sql);
    $resultSet[] = null;
    if ($result->num_rows > 0) {
        echo '<script>alert("You have already decided to donate this organ/blood");</script>';
    } else if ($dt == 'b' && $bt != '0' || $dt == 'o' && $og != '0') {
        if ($dt == 'o') {
            $sqldnt = "INSERT INTO `donations`( `user_id`, `user_name`,`user_loc`,`blood_group`, `organ`,`details`) VALUES ('$uid',(select first_name from user where user.user_id ='$uid'),(select Address from user where user.user_id ='$uid'),'$bt','$og','$details')";
            $conexion->query($sqldnt);
        } else {
            $sqldnt2 = "INSERT INTO `donations`( `user_id`,`user_name`,`user_loc`, `blood_group`, `organ`,`details`) VALUES ('$uid',(select first_name from user where user.user_id ='$uid'),(select Address from user where user.user_id ='$uid'),'$bt','blood','$details')";
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
        } else {
            document.getElementById('toggle').style.display = "none";
        }

    }
    $(document).ready(function () {
        $('#send').click(function (e) {
            var input = new Array();
            $('#donation input, #donation select').each(function (index) {
                input[index] = $(this);
                //                        alert('Type: ' + input.attr('type') + '      Name: ' + input.attr('name') + '     Value: ' + input.val());
            });
            var flag;
            flag = true;
            if (input[0].val() == '0') {
                alert('Select your donation.');
                input[0].addClass("red-border");
                flag = false;
            } else {
                input[0].removeClass("red-border");
            }
            if (input[0].val() == 'o') {
                if (input[1].val() == '0') {
                    alert('Select your blood group.');
                    input[1].addClass("red-border");
                    flag = false;
                } else {
                    input[1].removeClass("red-border");
                }

                if (input[2].val() == '0') {
                    alert('Select your organ.');
                    input[2].addClass("red-border");
                    flag = false;
                } else {
                    input[2].removeClass("red-border");
                }

            } else if (input[0].val() == 'b') {
                if (input[1].val() == '0') {
                    alert('Select your blood group.');
                    input[1].addClass("red-border");

                    flag = false;
                } else {
                    input[1].removeClass("red-border");

                }
            }


            if (flag == false) {
                e.preventDefault();
            }

        });
    });

</script>
<style>
    .red-border{
        border: 1px solid red;
    }
</style>
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
                        
                        <?php if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='G'){?>
                            <div class="form-group">
                                    <label class="col-md-4 control-label" for="singlebutton">View Donations</label>
                                    <div class="col-md-4">
                                        <button id="donatebtn" onclick="location.href = 'donations.php';" name="donatebtn" class="btn btn-primary donatebtn">View</button>
                                    </div>
                                </div>
                        <?PHP }else if (!loggedin()) { ?>
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
                                                <option value="0">Select your donation</option>
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
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div id="toggle" style="display: none;">
                                        <!-- Select Multiple -->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="selectmultiple">Organ</label>
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
                                </form>
                                <div class="clearfix"></div><br>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="singlebutton">View Donations</label>
                                    <div class="col-md-4">
                                        <button id="donatebtn" onclick="location.href = 'donations.php';" name="donatebtn" class="btn btn-primary donatebtn">View</button>
                                    </div>
                                </div>

                            <?php } ?>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--=========== END Why Choose Us SECTION ================-->


<?php include_once 'includes/footer.php'; ?>
