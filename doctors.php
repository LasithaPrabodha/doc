
   <?php include_once("includes/header.php");?>
   <?php include_once("includes/sql.php");







   ?>

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
                        <form class="form-horizontal" method="get" action="">
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

    <?php if(isset($_GET)){
        if(isset($_GET['name']) || isset($_GET['speciality'])){

            $name = "'%".$_GET['name']."%'";
            $spec = $_GET['speciality'];
            if($_GET['speciality'] == "0"){
                $spec = "'%%'";
            }


            $sql = "SELECT CONCAT(user.first_name, ' ', user.last_name) AS name,specialization FROM `doctor`,`user` WHERE doctor.user_id = user.user_id AND CONCAT(user.first_name, ' ', user.last_name) like ".$name." AND specialization like ".$spec;
            $rs  = $conexion->query($sql);
            $rows = $rs->fetch_all();
            ?>
            <section id="searchDoctors">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="section-heading">
                                    <h2>We Found these Doctors for you!</h2>
                                    <div class="line"></div>
                                </div>
                                    <div class="doctors-area">
                                        <ul class="doctors-nav">
                                            <?php
                                            foreach($rows as $row){ ?>
                                                <li>
                                                    <div class="single-doctor">
                                                        <a class="tdoctor" href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                                                            <figure>
                                                                <img src="images/doctor-1.jpg" />
                                                                <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
                                                                <figcaption>
                                                                    <h2><?php echo "Dr.". $row[0] ?></h2>
                                                                    <p><?php echo $row[1] ?></p>
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
                                            <?php } ?>

                                        </ul>
                                    </div>

                            </div>
                        </div>
                    </div>
        </section>

            <?php
        }

        }else{
            echo "Please select doctors name and/or specialization";

        }


    ?>

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
                                <?php
                                $sql = "SELECT first_name,last_name,specialization FROM `doctor`,`user` WHERE doctor.user_id = user.user_id ";
                                $rs  = $conexion->query($sql);
                                $rows = $rs->fetch_all();

                                foreach($rows as $row){ ?>
                                    <li>
                                    <div class="single-doctor">
                                        <a class="tdoctor" href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                                            <figure>
                                                <img src="images/doctor-1.jpg" />
                                                <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
                                                <figcaption>
                                                    <h2><?php echo "Dr.". $row[0] ?></h2>
                                                    <p><?php echo $row[1] ?></p>
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
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========== End Doctors SECTION ================-->

    <?php include 'includes/footer.php'; ?>
