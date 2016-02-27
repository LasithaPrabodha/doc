
<?php include_once("includes/header.php"); ?>
<?php
include_once("includes/sql.php");

//if(!loggedin())
//{
?>
<!--  <script type="text/javascript">
window.location.href = 'signin.php';
</script>-->
//
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
        if (isset($_POST['submit1'])) {



            $fname = $_POST['first_name'];
            $lname = $_POST['last_name'];
            $contact = $_POST['contact_no'];
            $initials = $_POST['initials'];

            if ((!empty($fname)) && (!empty($lname)) && (!empty($contact)) && (!empty($initials))) {


//profile picture upload>>>>>>>>>>>>>
                $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES["profile_img"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 1) {
                   
                    $target_image = str_replace(" ", "_", "$target_file");
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
                //if user doesn't enter first name or last name
                echo "<div class='alert alert-danger'>First name and Last name cannot be empty.</div>";
            }
        }
        ?>
    </div>
    <div class="row">
        <?php
        $conexion = db_connect();

        $sql = "SELECT * FROM user where email = 'a@g.com'";
        $result = $conexion->query($sql);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_array()) {


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
        <div class="col-md-3"   style="background-color: rgba(210, 210, 210, 0.09);  min-height: 553px" >
            <div class="col-md-offset-1 col-md-10" ><h3 class="text-center"><?php echo $name_with_initials; ?></h3></div>
            <div class="col-md-offset-1 col-md-10" style="padding-bottom: 25px; border-bottom: 1px solid #ddd; align-content:center; ">
                <image style="width:80%;height: 80%; margin-left: 20px;" src="<?php if (isset($profile_img) && (!empty($profile_img))) {
                        echo $profile_img;
                    } else {
                        echo "images/default_prof.jpg";
                    }?>"/>
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

            <div class="col-md-offset-1 col-md-10 center" ><button class='btn btn-success col-md-12' data-toggle="modal" data-target="#editModal">Edit Profile</button></div>

            <div class="clearfix"></div>
        </div>

        <div class="col-md-9" style=" border-left: 1px solid #ddd; min-height: 553px">
            <div class="col-md-10"><h1><?php
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
            <div class="col-md-12" style="margin-top: 10px;">
                <div class="bhoechie-tab-menu">
                    <ul class="nav nav-tabs profile-nav">
                        <li role="presentation" class="active"><a href="#">Profile</a></li>
                        <li role="presentation"><a href="">Appoinments</a></li> 
                        <li role="presentation"><a href="#">Classes</a></li>

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
                                <td class="normal"><?php echo $name_with_initials;?></td>
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
                                <td class="normal"><?php if ($user_type == 'A') {
                            echo 'Admin';
                        } elseif ($user_type == 'D') {
                            echo 'Doctor';
                        } elseif ($user_type == 'P') {
                            echo 'Patient';
                        } elseif ($user_type == 'G') {
                            echo 'General Pysicient';
                        }?></td>
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









                </div>
                <div class="bhoechie-tab-content hide">
                    <br>









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
                        <input type="submit" class="btn btn-success" value="Submit" name="submit1">

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


    </script>
