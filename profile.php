
<?php include("includes/header.php"); ?>
<?php include("includes/sql.php"); ?>
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
            <div class="col-md-offset-1 col-md-10" ><h3 class="text-center"><?php echo $name_with_initials;?></h3></div>
            <div class="col-md-offset-1 col-md-10" style="padding-bottom: 25px; border-bottom: 1px solid #ddd; align-content:center; ">
                <image style="width:90%;height: 90%;" src="images/default_prof.jpg"/>
            </div>
            <div class="col-md-offset-1 col-md-10 text-center" style='padding-top: 10px;'><h3><span style="color:#FF4800;"><?php echo $first_name; ?></span></h3></div>
            <div class="col-md-offset-1 col-md-10 text-center" style='padding-top: 0px;'><h4><span style="color:rgb(77, 80, 89);"><?php
        if($user_type == 'A'){
            echo 'ADMIN';
        }elseif ($user_type == 'D') {
            echo 'DOCTOR';
        } elseif ($user_type == 'P') {
            echo 'PATIENT';
        } elseif ($user_type == 'G') {
            echo 'GENERAL PYSICIANT';
        }
        ?></span></h4></div>

            <div class="col-md-offset-1 col-md-10 center" ><a href=" ?"><button class='btn btn-success col-md-12'>Edit Profile</button></a></div>

            <div class="clearfix"></div>
        </div>
        <div class="col-md-9" style=" border-left: 1px solid #ddd; min-height: 553px">
            <div class="col-md-10"><h1><?php
        if($user_type == 'A'){
            echo 'Admin Profile';
        }elseif ($user_type == 'D') {
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
                                <td class="normal">Arun Thomas</td>
                                <td class="subheadng">&nbsp;  </td>
                                <td class="normal">&nbsp; </td>   
                            </tr>

                            <tr>
                                <td class="subheadng">User Name</td>
                                <td class="normal">ArunThms</td>
                                <td class="subheadng">&nbsp;  </td>
                                <td class="normal">&nbsp; </td>   
                            </tr>
                            <tr>

                                <td class="subheadng">User Role</td>
                                <td class="normal">System Administrator</td>
                                <td class="subheadng">&nbsp;  </td>
                                <td class="normal">&nbsp; </td>   
                            </tr>
                            <tr>
                                <td class="subheadng">Email</td>
                                <td class="normal">A@g.com</td>
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
        </script>