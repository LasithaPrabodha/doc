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
     <title>Medinova : Doctors</title>

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
     <?php include("header.php");?>
    <!--=========== END HEADER SECTION ================-->        
    <section id="blogArchive">      
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="blog-breadcrumbs-area">
            <div class="container">
              <div class="blog-breadcrumbs-left">
                <h2>Doctors</h2>
              </div>
              <div class="blog-breadcrumbs-right">
                <ol class="breadcrumb">
                  <li>You are here</li>
                  <li><a href="#">Home</a></li>                  
                  <li class="active">Doctors</li>
                </ol>
              </div>
            </div>
          </div>
        </div>        
      </div>      
    </section>
    <!--=========== BEGIN find doctors SECTION ================-->
    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="service-area">
                        <form class="form-horizontal">
                            <fieldset>

                                <!-- Form Name -->
                                <legend>Search Doctors</legend>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="name">Doctor's Name</label>
                                    <div class="col-md-5">
                                        <input id="name" name="name" placeholder="name" class="form-control input-md" type="text">

                                    </div>
                                </div>

                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="speciality">Speciality</label>
                                    <div class="col-md-5">
                                        <select id="speciality" name="speciality" class="form-control">
                                            <option value="0">Any</option>
                                            <option value="1">Heart surgeon</option>
                                            <option value="2">Dermatologist</option>
                                            <option value="3">Psychiatrist</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="searchdoc"></label>
                                    <div class="col-md-4">
                                        <button id="searchdoc" name="searchdoc" class="btn btn-primary">Search Doctors</button>
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=========== End find doctors SECTION ================-->
    <!--=========== BEGAIN Doctors SECTION ================-->
    <section id="meetDoctors">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="meetDoctors-area">
                        <!-- Start Service Title -->
                        <div class="section-heading">
                            <h2>Meet Our Doctors</h2>
                            <div class="line"></div>
                        </div>
                        <div class="doctors-area">
                            <ul class="doctors-nav">
                                <li>
                                    <div class="single-doctor">
                                        <a class="tdoctor" href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                                            <figure>
                                                <img src="images/doctor-1.jpg" />
                                                <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
                                                <figcaption>
                                                    <h2>Dr. Yvonne Cadiline</h2>
                                                    <p>Pediatric Clinic</p>
                                                    <button>View</button>
                                                </figcaption>
                                            </figure>
                                        </a>
                                        <div class="single-doctor-social">
                                            <a href="#"><span class="fa fa-facebook"></span></a>
                                            <a href="#"><span class="fa fa-twitter"></span></a>
                                            <a href="#"><span class="fa fa-google-plus"></span></a>
                                            <a href="#"><span class="fa fa-linkedin"></span></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-doctor">
                                        <div class="single-doctor">
                                            <a class="tdoctor" href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                                                <figure>
                                                    <img src="images/doctor-2.jpg" />
                                                    <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
                                                    <figcaption>
                                                        <h2>DR. Jack Johnson</h2>
                                                        <p>Rehabilitation Therapy</p>
                                                        <button>View</button>
                                                    </figcaption>
                                                </figure>
                                            </a>
                                            <div class="single-doctor-social">
                                                <a href="#"><span class="fa fa-facebook"></span></a>
                                                <a href="#"><span class="fa fa-twitter"></span></a>
                                                <a href="#"><span class="fa fa-google-plus"></span></a>
                                                <a href="#"><span class="fa fa-linkedin"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-doctor">
                                        <div class="single-doctor">
                                            <a class="tdoctor" href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                                                <figure>
                                                    <img src="images/doctor-3.jpg" />
                                                    <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
                                                    <figcaption>
                                                        <h2>Dr. Vanessa Smouic</h2>
                                                        <p>Cardiac Clinic</p>
                                                        <button>View</button>
                                                    </figcaption>
                                                </figure>
                                            </a>
                                            <div class="single-doctor-social">
                                                <a href="#"><span class="fa fa-facebook"></span></a>
                                                <a href="#"><span class="fa fa-twitter"></span></a>
                                                <a href="#"><span class="fa fa-google-plus"></span></a>
                                                <a href="#"><span class="fa fa-linkedin"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-doctor">
                                        <div class="single-doctor">
                                            <a class="tdoctor" href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                                                <figure>
                                                    <img src="images/doctor-5.jpg" />
                                                    <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
                                                    <figcaption>
                                                        <h2>Dr. David Gresshoff</h2>
                                                        <p>Laryngological Clinic</p>
                                                        <button>View</button>
                                                    </figcaption>
                                                </figure>
                                            </a>
                                            <div class="single-doctor-social">
                                                <a href="#"><span class="fa fa-facebook"></span></a>
                                                <a href="#"><span class="fa fa-twitter"></span></a>
                                                <a href="#"><span class="fa fa-google-plus"></span></a>
                                                <a href="#"><span class="fa fa-linkedin"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-doctor">
                                        <a class="tdoctor" href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                                            <figure>
                                                <img src="images/doctor-1.jpg" />
                                                <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
                                                <figcaption>
                                                    <h2>Dr. Yvonne Cadiline</h2>
                                                    <p>Pediatric Clinic</p>
                                                    <button>View</button>
                                                </figcaption>
                                            </figure>
                                        </a>
                                        <div class="single-doctor-social">
                                            <a href="#"><span class="fa fa-facebook"></span></a>
                                            <a href="#"><span class="fa fa-twitter"></span></a>
                                            <a href="#"><span class="fa fa-google-plus"></span></a>
                                            <a href="#"><span class="fa fa-linkedin"></span></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-doctor">
                                        <div class="single-doctor">
                                            <a class="tdoctor" href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                                                <figure>
                                                    <img src="images/doctor-2.jpg" />
                                                    <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
                                                    <figcaption>
                                                        <h2>DR. Jack Johnson</h2>
                                                        <p>Rehabilitation Therapy</p>
                                                        <button>View</button>
                                                    </figcaption>
                                                </figure>
                                            </a>
                                            <div class="single-doctor-social">
                                                <a href="#"><span class="fa fa-facebook"></span></a>
                                                <a href="#"><span class="fa fa-twitter"></span></a>
                                                <a href="#"><span class="fa fa-google-plus"></span></a>
                                                <a href="#"><span class="fa fa-linkedin"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-doctor">
                                        <div class="single-doctor">
                                            <a class="tdoctor" href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                                                <figure>
                                                    <img src="images/doctor-3.jpg" />
                                                    <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
                                                    <figcaption>
                                                        <h2>Dr. Vanessa Smouic</h2>
                                                        <p>Cardiac Clinic</p>
                                                        <button>View</button>
                                                    </figcaption>
                                                </figure>
                                            </a>
                                            <div class="single-doctor-social">
                                                <a href="#"><span class="fa fa-facebook"></span></a>
                                                <a href="#"><span class="fa fa-twitter"></span></a>
                                                <a href="#"><span class="fa fa-google-plus"></span></a>
                                                <a href="#"><span class="fa fa-linkedin"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-doctor">
                                        <div class="single-doctor">
                                            <a class="tdoctor" href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                                                <figure>
                                                    <img src="images/doctor-5.jpg" />
                                                    <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
                                                    <figcaption>
                                                        <h2>Dr. David Gresshoff</h2>
                                                        <p>Laryngological Clinic</p>
                                                        <button>View</button>
                                                    </figcaption>
                                                </figure>
                                            </a>
                                            <div class="single-doctor-social">
                                                <a href="#"><span class="fa fa-facebook"></span></a>
                                                <a href="#"><span class="fa fa-twitter"></span></a>
                                                <a href="#"><span class="fa fa-google-plus"></span></a>
                                                <a href="#"><span class="fa fa-linkedin"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========== End Doctors SECTION ================-->

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