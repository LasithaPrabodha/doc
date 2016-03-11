
<?php
include_once("includes/header.php");
include_once("includes/sql.php");


if (!loggedin()) {

    header('Location: signin.php');
}
?>



<?php
$conexion = db_connect();
if (isset($_GET['id'])) {

    $id = $_GET['id'];
} else {
    $id = $_SESSION['user_id'];
}
$sql = "SELECT * FROM user where user_id = '$id'";
$result = $conexion->query($sql);
if ($result->num_rows > 0) {

    while ($row = $result->fetch_array()) {

        $user_id = $row['user_id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $name_with_initials = $row['name_with_initials'];
        $email = $row['email'];
        $profile_img = $row['profile_img'];
        $gender = $row['gender'];
        $user_type = $row['user_type'];
        $is_active = $row['is_active'];
        $password = $row['password'];
        $contact_number = $row['contact_number'];
    }
}
?>

<!--=========== END HEADER SECTION ================-->  


<style>
    #details-table td{
        height: 50px;
        padding: 0px 30px;
    }

    .trheding{

        font-size: 13px;
        color: #FF4800;
        font-weight: bold;
        text-transform: uppercase;
        background:  rgb(243, 243, 243) none repeat scroll 0% 0%;


    }

    .subheadng{
        font-size: 13px;
        font-weight: bold;

    }

    .cntn{

        border: 1px solid rgba(128, 128, 128, 0.12);
        border-radius: 4px;
    }

    .profile-nav > li{
        border-radius: 0px !important;
    }
    .profile-nav > li> a{
        color: #595959;
        text-decoration: none;
        background: rgb(243, 243, 243) none repeat scroll 0% 0%;
    }
    #profile-img{
        max-width: 150px;
        max-height: 150px;
    }

</style>
<section id="blogArchive">      
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="blog-breadcrumbs-area">
                <div class="container">
                    <div class="blog-breadcrumbs-left">
                        <h2></h2>
                    </div>
                    <div class="blog-breadcrumbs-right">
                        <ol class="breadcrumb">
                            <li>You are here</li>
                            <li><a href="#">Home</a></li>                  
                            <li class="active">Sign In</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>        
    </div>      
</section>

<div class="col-md-12">
    <div class="row">
        <?php

        if(isset($_POST['available'])) {

            $conexion = db_connect();

            $sql = "UPDATE doctor SET allocated_appointment_time='".implode(',', $_POST['check_box'])."' where doctor_id=1";
            if($result = $conexion->query($sql)){
                echo "<div class='alert alert-success'>Alocation times saved successfully!</div>";
            };

        }

        if (isset($_POST['submit1'])) {



            $fname = $_POST['first_name'];
            $lname = $_POST['last_name'];
            $contact = $_POST['contact_no'];
            $initials = $_POST['initials'];

            if ((!empty($fname)) && (!empty($lname)) && (!empty($contact)) && (!empty($initials))) {

                if (preg_match("/^[0-9]{10}$/", $contact)) {

//profile picture upload>>>>>>>>>>>>>
                    $target_dir = "images/";
                    $target_file = $target_dir . basename($_FILES["profile_img"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 1) {

                        $target_image = str_replace(" ", "_", "$target_file") . uniqid();
                        if (move_uploaded_file($_FILES["profile_img"]["tmp_name"], $target_image)) {

                            //if file moved to the images folder update the user table
                            $sql = "UPDATE user SET profile_img='$target_image',first_name='$fname',last_name='$lname', name_with_initials='$initials', contact_number='$contact' WHERE email='a@g.com'";

                            if ($result = $conexion->query($sql)) {
                                echo "<div class='alert alert-success'>Profile settings updated successfully.</div>";
                            } else {
                                echo "<div class='alert alert-danger'>Error while updating profile settings.</div>";
                            }
                        } else {
                            //if file not moved to the images folder 
                            echo "<div class='alert alert-danger'>Sorry, there was an error uploading your profle image.</div>";
                        }
                    }
                } else {
                    echo "<div class='alert alert-danger'>Phone number should be 10 digit number</div>";
                }
            } else {
                //if user doesn't enter first name or last name
                echo "<div class='alert alert-danger'>*All the feilds are mandatory</div>";
            }
        }
        if (isset($_POST['submit2'])) {
            $curr_pw = $_POST['currentPassword'];
            $new_pw = $_POST['newPassword'];
            $conf_pw = $_POST['confirmPassword'];
            if ((!empty($curr_pw)) && (!empty($new_pw)) && (!empty($conf_pw))) {

                $sql2 = "SELECT password FROM user where user_id = '$id'";
                $result = $conexion->query($sql2);
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_array()) {

                        $password = $row['password'];
                    }
                }
                if ($password == md5($curr_pw)) {
                    if ($new_pw == $conf_pw) {
                        $new_pw=  md5($new_pw);
                        $sql2 = "update user set password='$new_pw' where user_id = '$id'";
                        $result = $conexion->query($sql2);
                        if ($conexion->query($sql2)) {
                             echo "<div class='alert alert-success'>Password updated successfully.</div>";
                        } else {
                             echo "<div class='alert alert-danger'>Error occured</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>New password and Confirm password should be the same</div>";
                    }
                } else {

                    echo "<div class='alert alert-danger'>Incorrect Current Password</div>";
                }
            }
        } else if(!isset($_POST)){
            echo "<div class='alert alert-danger'>*All the feilds are mandatory</div>";
        }
        ?>
    </div>
    <div class="row">
        <?php
        if ($user_type == 'D') {
            $sql2 = "SELECT availability FROM doctor where user_id = '$user_id'";
            $result = $conexion->query($sql2);
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_array()) {

                    $availability = $row['availability'];
                }
            }
        }
        ?>
        <div id="alert-container"></div>
        <div class="col-md-3"   style="background-color: rgba(210, 210, 210, 0.09);  min-height: 553px" >
            <div class="col-md-offset-1 col-md-10" ><h3 class="text-center"><?php echo $name_with_initials; ?></h3></div>
            <div class="col-md-offset-1 col-md-10" style="padding-bottom: 25px; border-bottom: 1px solid #ddd; align-content:center; ">
                <image style="width:80%;height: 80%; margin-left: 20px;" src="<?php
                if (isset($profile_img) && (!empty($profile_img))) {
                    echo $profile_img;
                } else {
                    echo 'images/default_prof.jpg';
                }
                ?>"/>
            </div>
            <div class="col-md-offset-1 col-md-10 text-center" style='padding-top: 10px;'><h3><span style="color:#FF4800;"><?php echo $first_name; ?></span></h3></div>
            <div class="col-md-offset-1 col-md-10 text-center" style='padding-top: 0px;'><h4><span style="color:rgb(77, 80, 89);"><?php
                        if ($user_type == 'A') {
                            echo 'ADMIN';
                        } elseif ($user_type == 'D') {
                            echo 'DOCTOR';
                        } elseif ($user_type == 'P') {
                            echo 'PATIENT';
                        } elseif ($user_type == 'G') {
                            echo 'GENERAL PYSICIANT';
                        }
                        ?></span></h4></div>

            <div class="col-md-offset-1 col-md-10 center" ><button class='btn btn-success col-md-12' data-toggle="modal" data-target="#editModal">Profile settings</button></div>

            <div class="col-md-offset-1 col-md-10 center" style="margin-top: 3px; "><center><a href="#" class='col-md-12' data-toggle="modal" data-target="#passModal" >change password</a></center></div>

            <div class="clearfix"></div>
        </div>

        <div class="col-md-9" style=" border-left: 1px solid #ddd; min-height: 553px">
            <div class="col-md-12"><div class="col-md-8"><h1><?php
                        if ($user_type == 'A') {
                            echo 'Admin Profile';
                        } elseif ($user_type == 'D') {
                            echo 'Doctor Profile';
                        } elseif ($user_type == 'P') {
                            echo 'Patient Profile';
                        } elseif ($user_type == 'G') {
                            echo 'General Pysicient';
                        }
                        ?></h1></div>
                <div class="col-md-4">
                    <br>
                    <?php if ($user_type == 'D') { ?>
                        <form id="statusform">

                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary <?php
                                if ($availability == '1') {
                                    echo 'active';
                                }
                                ?>">
                                    <input type="radio" name="availability" id="option1" value="1"  <?php
                                    if ($availability == '1') {
                                        echo 'checked';
                                    }
                                    ?>> Available 
                                </label>
                                <label class="btn btn-primary  <?php
                                if ($availability == '0') {
                                    echo 'active';
                                }
                                ?>">
                                    <input type="radio" name="availability" id="option2" value="0"  <?php
                                    if ($availability == '0') {
                                        echo 'checked';
                                    }
                                    ?>> Unavailable
                                </label>
                                <input type="text" value="<?php echo $user_id; ?>" id="uid" hidden>

                            </div>


                        </form>
                    <?php } ?>
                </div>

            </div>
            <div class="col-md-12" style="margin-top: 10px;">
                <div class="bhoechie-tab-menu">
                    <ul class="nav nav-tabs profile-nav">
                        <li role="presentation" class="active"><a href="#">Profile</a></li>
                        <li role="presentation"><a href="">Appoinments</a></li> 
                        <li role="presentation"><a href="#">Set Available Times</a></li>

                    </ul>
                </div>
                <div class="col-md-12 bhoechie-tab-content" style="padding: 0px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="details-table" style="margin-top: 10px; margin-bottom: 10px;">
                        <tbody>
                            <tr class="trheding">
                                <td id="dtr">General</td>
                                <td id="dtr">&nbsp;</td>
                                <td id="dtr">&nbsp;</td>
                                <td id="dtr">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="subheadng">Name</td>
                                <td class="normal"><?php echo $name_with_initials; ?></td>
                                <td class="subheadng">&nbsp;  </td>
                                <td class="normal">&nbsp; </td>   
                            </tr>

                            <tr>
                                <td class="subheadng">User Name</td>
                                <td class="normal"><?php echo $email; ?></td>
                                <td class="subheadng">&nbsp;  </td>
                                <td class="normal">&nbsp; </td>   
                            </tr>
                            <tr>

                                <td class="subheadng">User Role</td>
                                <td class="normal"><?php
                                    if ($user_type == 'A') {
                                        echo 'Admin';
                                    } elseif ($user_type == 'D') {
                                        echo 'Doctor';
                                    } elseif ($user_type == 'P') {
                                        echo 'Patient';
                                    } elseif ($user_type == 'G') {
                                        echo 'General Pysicient';
                                    }
                                    ?></td>
                                <td class="subheadng">&nbsp;  </td>
                                <td class="normal">&nbsp; </td>   
                            </tr>
                            <tr>
                                <td class="subheadng">Contact No</td>
                                <td class="normal"><?php echo $contact_number; ?></td>
                                <td class="subheadng">&nbsp;  </td>
                                <td class="normal">&nbsp; </td>   
                            </tr>




                        </tbody></table>
                    <br><br>
                    <div class="clearfix"></div>
                </div>

                <div class="bhoechie-tab-content hide">
                    <br>
                    <div style="width:90%;padding-left: 50px">
                        <?php
                        if ($user_type == 'P') {
                            $conexion = db_connect();

                            $sql = "SELECT a.appoinment_id, a.patient_name , a.patient_age ,a.telephone_no,u.first_name,u.last_name FROM appoinments a , user u where a.doctor_id=u.user_id and a.user_id = '2'";
                            $result = $conexion->query($sql);
                            if ($result->num_rows > 0) {
                                ?>

                                <table id="patient_tab" class="display col-md-12" style="width:80%">
                                    <thead>
                                        <tr>
                                            <th>Appointment No</th>
                                            <th>Doctor</th>
                                            <th>Appintment Details</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $result->fetch_array()) {

                                            $appintment_id = $row['appoinment_id'];
                                            $doctor_is = "Dr " . $row['first_name'] . "" . $row['last_name'];
                                            $patient_name = $row['patient_name'];
                                            $patient_age = $row['patient_age'];
                                            $patient_tel = $row['telephone_no'];
                                            ?>
                                            <tr>
                                                <td><?php echo $appintment_id; ?></td>
                                                <td><?php echo $doctor_is; ?></td>
                                                <td><br><p style="padding-top:1px"><?php echo "Age: " . $patient_age; ?></p><p style="padding-top:1px"><?php echo "Contant No: " . $patient_tel; ?></p><br></td>
                                                <td>Pending</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <?php
                            }
                        } else if ($user_type == 'D') {

                            $conexion = db_connect();

                            $sql = "SELECT a.appoinment_id, a.patient_name , a.patient_age ,a.telephone_no,u.first_name,u.last_name FROM appoinments a , user u where a.doctor_id=u.user_id and a.doctor_id = '$id'";
                            $result = $conexion->query($sql);
                            if ($result->num_rows > 0) {
                                ?>

                                <table id="patient_tab" class="display col-md-12" style="width:80%">
                                    <thead>
                                        <tr>
                                            <th>Appointment No</th>
                                            <th>Doctor</th>
                                            <th>Appintment Details</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $result->fetch_array()) {

                                            $appintment_id = $row['appoinment_id'];
                                            $doctor_is = "Dr " . $row['first_name'] . "" . $row['last_name'];
                                            $patient_name = $row['patient_name'];
                                            $patient_age = $row['patient_age'];
                                            $patient_tel = $row['telephone_no'];
                                            ?>
                                            <tr>
                                                <td><?php echo $appintment_id; ?></td>
                                                <td><?php echo $patient_name; ?></td>
                                                <td><br><p style="padding-top:1px"><?php echo "Age: " . $patient_age; ?></p><p style="padding-top:1px"><?php echo "Contant No: " . $patient_tel; ?></p><br></td>
                                                <td>Pending</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <?php
                            }
                        }
                        ?>







                    </div>

                </div>
                <div class="col-md-12 bhoechie-tab-content hide">
                    <br>
                    <form id="loginForm" action="" method="post" style="margin:auto; margin-top: 40px">
                        <table class="table-striped" style="width:100%">
                        <tr>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                            <th>Satureday</th>
                            <th>Sunday</th>
                        </tr>

                        <?php
                        $conexion = db_connect();

                        $sql = "SELECT allocated_appointment_time FROM doctor where doctor_id=1";
                        $result = $conexion->query($sql);
                        $rows = $result->fetch_array();

                        $appDates = explode(',',$rows[0]);

                        $days =['M','T','W','L','F','S','Z'];
                        $times =['12 - 01 AM','01 - 02 AM','02 - 03 AM','03 - 04 AM','04 - 05 AM','05 - 06 AM','06 - 07 AM','07 - 08 AM','08 - 09 AM','09 - 10 AM','10 - 11 AM','11 - 12 PM','01 - 02 AM','02 - 03 AM','03 - 04 AM','04 - 05 AM','05 - 06 AM','06 - 07 AM','07 - 08 AM','08 - 09 AM','09 - 10 AM','10 - 11 AM','11 - 12 PM','01 - 02 PM','02 - 03 PM','03 - 04 PM','04 - 05 PM','05 - 06 PM','06 - 07 PM','07 - 08 PM','08 - 09 PM','09 - 10 PM','10 - 11 PM','11 - 12 AM'] ;

                        for($x = 0;$x<22;$x++){
                            echo '<tr>';
                            for($y = 0;$y<7;$y++){
                                $chk = "";
                                foreach($appDates as $val){
                                    if($val == $days[$y].($x+1)){
                                        $chk = 'checked';
                                    }
                                }

                                echo '<td><input type="checkbox" '.$chk.' name="check_box[]" value="'.$days[$y].($x+1).'">'.$times[$x].'</input></td>';

                            }

                            echo '</tr>';
                        }

                        ?>

                    </table>

                    <div class="col-md-12" style="margin: 10px 0">
                        <input type="submit" name="available" class="btn-primary btn pull-right" value="Save Available times"/>
                    </div>
                    </form>
                </div>

            </div>
        </div>

    </div>

</div>
<!-- edit profile -->
<div class="modal fade bs-modal-lg" id="editModal"  tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Edit Your Profile Details</h4>
            </div>
            <div class="modal-body">

                <div class="col-md-9 col-md-offset-1">
                    <form name="prof-settings" id="prof-settings" action="" method="post" enctype="multipart/form-data">
                        <div class="fom-group img-submit">
                            <label for="profile-img">Profile image</label>
                            <br />

                            <img src="<?php
                            if (isset($profile_img) && (!empty($profile_img))) {
                                echo $profile_img;
                            } else {
                                echo "images/default_prof.jpg";
                            }
                            ?>" id="profile-img" class="img-thumbnail profile-img" name="profile-img">
                            <span class="btn btn-default btn-file">
                                Upload new picture<input type="file" name="profile_img" id="profile_img">
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo $first_name; ?>">
                            <p class="help-block"></p>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $last_name; ?>">
                            <p class="help-block"></p>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Name With Initials</label>
                            <input type="text" name="initials" id="initials" class="form-control" value="<?php echo $name_with_initials; ?>">
                            <p class="help-block"></p>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Contact Number</label>
                            <input type="text" name="contact_no" id="contact_no" class="form-control" value="<?php echo $contact_number; ?>">
                            <p class="help-block"></p>
                        </div>
                        <input type="submit" class="btn btn-success" value="Change Settings" name="submit1">

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!--        <button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- end of edit profile -->
    <!--change password-->
    <!-- edit profile -->
    <div class="modal fade bs-modal-lg" id="passModal"  tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Change your password</h4>
                </div>
                <div class="modal-body">
                    <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
                        <div style="width:500px;">
                            <div class="form-group">
                                <label for="first_name">Current Password</label>
                                <input type="password" name="currentPassword" id="currentPassword" class="form-control" required>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group">
                                <label for="last_name">New Password</label>
                                <input type="password" name="newPassword" id="newPassword" class="form-control" required>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Confirm Password</label>
                                <input type="password" name="confirmPassword"  id="confirmPassword" class="form-control" required >
                                <p class="help-block"></p>
                            </div>
                            <input type="submit" class="btn btn-success" value="Change Password" name="submit2">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!--        <button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php include 'includes/footer.php'; ?>

    <script>
        $(document).ready(function () {
            $("div.bhoechie-tab-menu>ul>li").click(function (e) {
                e.preventDefault();
                $(this).siblings('li.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();
                $("div.bhoechie-tab-content").addClass("hide");
                $("div.bhoechie-tab-content").eq(index).removeClass("hide");
            });
            //patient table script
//            $('#patient_tab').DataTable();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profile-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profile_img").change(function () {
            readURL(this);
        });


        $(document).on('change', 'input:radio[id^="option"]', function (event) {

            var status = $('input[name=availability]:checked', '#statusform').val();
            var uid = document.getElementById("uid").value;

            $.ajax({
                type: "POST",
                url: "includes/profile_functions.php",
                data: {status: status, id: uid}, //pass txtarea input with cssrf tolcke
                dataType: "json",
                success: function (result) {
//                                alert(result['result']);
                    $("#alert-container").html(result['result']);
                    $(".alert").delay(3000).slideUp(200);
                }
            });
        });

        $(document).ready(function () {
            $('#patient_tab').DataTable();

        });


    </script>
