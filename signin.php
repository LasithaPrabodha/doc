<!DOCTYPE html>
<html lang="en">
    <head>
        <!--=============================================== 
        Template Design By WpFreeware Team.
        Author URI : http://www.wpfreeware.com/
        ====================================================-->

        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>WpF Medinova : Service</title>

        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>

        <!-- CSS
        ================================================== -->       
        <!-- Bootstrap css file-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Font awesome css file-->
        <link href="css/font-awesome.min.css" rel="stylesheet">       
        <!-- Default Theme css file -->
        <link id="switcher" href="css/themes/blue-theme.css" rel="stylesheet">    
        <!-- Slick slider css file -->
        <link href="css/slick.css" rel="stylesheet"> 

        <!-- Main structure css file -->
        <link href="style.css" rel="stylesheet">

        <!-- Google fonts -->
        <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>  
        <link href='http://fonts.googleapis.com/css?family=Habibi' rel='stylesheet' type='text/css'>   
        <link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative:900' rel='stylesheet' type='text/css'>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]--> 
    </head>
    <body> 
        <!-- BEGAIN PRELOADER -->
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- END PRELOADER -->

        <!-- SCROLL TOP BUTTON -->
        <a class="scrollToTop" href="#"><i class="fa fa-heartbeat"></i></a>
        <!-- END SCROLL TOP BUTTON -->

        <!--=========== BEGIN HEADER SECTION ================-->
        <?php include("header.php"); ?>
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
            <div class="col-md-offset-4" style="height: 500px;"> 

                <div class='outer-div'>
                    <div class='middle-div'>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <label class="control-label">Email<span class="required">*</span>
                                </label>
                                <input type="text" class="wp-form-control wpcf7-text" placeholder="Your email address">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <label class="control-label">Password <span class="required">*</span>
                                </label>
                                <input type="text" class="wp-form-control wpcf7-text" placeholder="Your password">

                                <div class="col-md-offset-2"> <a href="#">Forgot password?</a></div>
                            </div>

                        </div>
                        <button class="wpcf7-submit button--itzel" type="submit"><i class="button__icon fa fa-share"></i><span>Sign In</span></button>
                    </div>
                </div>
            </div>

        </div>

        <?php include 'footer.php'; ?>

        <!-- jQuery Library  -->
        <script src="js/jquery.js"></script>    
        <!-- Bootstrap default js -->
        <script src="js/bootstrap.min.js"></script>
        <!-- slick slider -->
        <script src="js/slick.min.js"></script>    
        <script type="text/javascript" src="js/modernizr.custom.79639.js"></script>      
        <!-- counter -->
        <script src="js/waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <!-- Doctors hover effect -->
        <script src="js/snap.svg-min.js"></script>
        <script src="js/hovers.js"></script>

        <!-- Custom JS -->
        <script src="js/custom.js"></script>

    </body>
</html>