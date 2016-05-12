<?php

require_once("includes/functions.php");


if(loggedin()){
    header('Location:index.php');
}

$message ="";

if(isset($_POST['username']) && isset($_POST['password']))
{
    $LUsername = sql_escape($_POST['username']);
    $LPassword = sql_escape($_POST['password']);

    if(!empty($LUsername) && !empty($LPassword))
    {
        $hashPassword =md5($LPassword);
        $conexion = db_connect();
        $sql = "SELECT * FROM user WHERE email = '{$LUsername}' ";
        $result = $conexion->query($sql);
        $resultSet[] = null;
        if ($result->num_rows > 0) {

            $resultSet = $result->fetch_assoc();
            $filteredID = sql_escape($resultSet['email']);
            $filteredPW = sql_escape($resultSet['password']);
            if($resultSet['is_active'] == 0 || $resultSet['is_active'] == 2){
                $message = '<div class="alert alert-danger">  <strong></strong>User Has Not Been Activated.</div>';

            }else if((($filteredID == $LUsername)) && ($filteredPW == $hashPassword))
            {

                $_SESSION['email']=$filteredID;
                $_SESSION['user_id']=$resultSet['user_id'];
                $_SESSION['first_name'] = $resultSet['first_name'];
                $_SESSION['last_name'] = $resultSet['last_name'];
                $_SESSION['user_type'] = $resultSet['user_type'];
                $_SESSION['is_active'] = $resultSet['is_active'];
                $_SESSION['tpno'] = $resultSet['contact_number'];

                header("Location:profile.php");
            }else{
                $message = '<div class="alert alert-danger">  <strong></strong>Wrong username or Password!</div>';
            }
        }else{
            $message = '<div class="alert alert-danger">  <strong></strong>User Not found!</div>';
        }
    }
}
require_once("includes/header.php");
?>
<!--=========== END HEADER SECTION ================-->

        <section id="blogArchive">      
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="blog-breadcrumbs-area">
                        <div class="container">
                            <div class="blog-breadcrumbs-left">
                                <h2>Sign In</h2>
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
            <?php echo $message; ?>
            <div class="col-md-offset-4" style="height: 500px;"> 

                <div class='outer-div'>
                    <div class='middle-div'>
                        <form id="loginForm" action="" method="post" style="margin:auto">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label">Email<span class="required">*</span>
                                    </label>
                                    <input type="text" name="username" id="username" class="wp-form-control wpcf7-text" placeholder="Your email address">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
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

        </div>

<?php include 'includes/footer.php'; ?>