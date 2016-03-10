<?php require_once("includes/functions.php"); ?>

<!DOCTYPE html>
<html lang="en">
    <head>

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
        <!--datatables-->
        
        <link href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/responsive/2.0.2/css/responsive.bootstrap.min.css" rel="stylesheet">
        
        
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

      <!-- BEGIN MENU -->
      <div class="menu_area">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">  
          <div class="container">
            <div class="navbar-header">
              <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- LOGO -->              
              <!-- TEXT BASED LOGO -->
              <a class="navbar-brand" href="index.php"><i class="fa fa-heartbeat"></i><span>Medinova</span></a>
              <!-- IMG BASED LOGO  -->
              <!--  <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>   -->                    
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="doctors.php">Doctors</a></li>
                <li><a href="blood-bank.php">Blood Bank </a></li>
                  <li><a href="about-us.php">About Us</a></li>
                <!--                <li class="dropdown">-->
    <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Blood Bank <span class="fa fa-angle-down"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="medical-counseling.html">Medical Counseling</a></li>
                    <li><a href="medical-research.html">Medical Research</a></li>
                    <li><a href="blood-bank.html"></a></li>
                  </ul>
                </li>-->
<!--                <li><a href="gallery.html">Gallery</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">News <span class="fa fa-angle-down"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="blog-archive.html">Blog Archive</a></li>
                    <li><a href="blog-archive-with-left-sidebar.html">Blog Archive with Left Sidebar</a></li>
                    <li><a href="blog-archive-with-right-sidebar.html">Blog Archive with Right Sidebar</a></li>
                    <li><a href="blog-single.html">Blog Single</a></li>
                    <li><a href="blog-single-with-left-sidebar.html">Blog Single with Left Sidebar</a></li>
                    <li><a href="blog-single-with-right-sidebar.html">Blog Single with Right Sidebar</a></li>           
                  </ul>
                </li>-->
<!--                <li class="dropdown">-->
<!--                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Page <span class="fa fa-angle-down"></span></a>-->
<!--                  <ul class="dropdown-menu" role="menu">-->
<!--                    <li><a href="404.php">404 Page</a></li>-->
<!--                    <li><a href="#">Link Two</a></li>-->
<!--                    <li><a href="#">Link Three</a></li>               -->
<!--                  </ul>-->
<!--                </li>               -->
                <li><a href="contact.php">Contact Us</a></li>
                  <?PHP
                  if(loggedin()){ ?>
                <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <?PHP echo $_SESSION['email']; ?> <span class="fa fa-angle-down"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="signout.php">Sign out</a></li>
                  </ul>
                </li>

                  <?php }else{ ?>
                  <li><a href="signin.php">Sign In/Sign Up</a></li>
                  <?PHP } ?>


              </ul>
            </div><!--/.nav-collapse -->
          </div>     
        </nav>  
      </div>
      <!-- END MENU -->    
