
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
                                    <label class="col-md-4 control-label" for="speciality">Specialization</label>
                                    <div class="col-md-5">
                                        <select id="speciality" name="speciality" class="form-control">
                                            <option value="0">Any</option>
                                            <option value="Heart surgeon">Heart surgeon</option>
                                            <option value="Dermatologist">Dermatologist</option>
                                            <option value="Psychiatrist">Psychiatrist</option>
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

    <?php if(isset($_GET)) {

        if (isset($_GET['name']) && isset($_GET['speciality'] )) {
            if ($_GET['name'] == "" && $_GET['speciality'] == "0") {
                ?>
                <div class="col-lg-12 col-md-12">
                    <div class="section-heading">
                        <h4 style="color: #d80000">Please Enter doctor's name and/or select a specialization</h4>

                    </div>
                </div>
            <?php
            } else {

                $name = "'%" . $_GET['name'] . "%'";
                $spec = "'%" .$_GET['speciality']. "%'";
                if ($_GET['speciality'] == "0") {
                    $spec = "'%%'";
                }


                $sql = "SELECT CONCAT(user.first_name, ' ', user.last_name) AS name,specialization,profile_img,doctor.doctor_id FROM `doctor`,`user` WHERE doctor.user_id = user.user_id  AND user.user_type = 'D' AND availability = '1' AND CONCAT(user.first_name, ' ', user.last_name) like " . $name . " AND specialization like " . $spec;
                $rs = $conexion->query($sql);
                $rows = $rs->fetch_all();
                if (!empty($rows)) {
                    ?>
                    <section id="searchDoctors">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="section-heading">
                                        <h2>We Found these available Doctors for you!</h2>

                                        <div class="line"></div>
                                    </div>
                                    <div class="doctors-area">
                                        <ul class="doctors-nav">
                                            <?php
                                            foreach ($rows as $row) {
                                                ?>
                                                <li>
                                                    <div class="single-doctor">
                                                        <a class="tdoctor" href="#"
                                                           data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                                                            <figure>
                                                                <img src="<?php echo $row[2] ?>"/>
                                                                <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                                                                    <path d="M 180,160 0,218 0,0 180,0 z"/>
                                                                </svg>
                                                                <figcaption>
                                                                    <h2><?php echo "Dr." . $row[0] ?></h2>

                                                                    <p><?php echo $row[1] ?></p>
                                                                    <button onclick="document.location.href='profile.php?id=<?php echo $row[3]; ?>'">View</button>
                                                                </figcaption>
                                                            </figure>
                                                        </a>

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
                } else {
                    ?>
                    <div class="col-lg-12 col-md-12">
                        <div class="section-heading">
                            <h4 style="color: #d80000">Sorry! we Couldn't find any matching doctors</h4>

                        </div>
                    </div>
                <?php
                }
            }
        }
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
                                $sql = "SELECT CONCAT(user.first_name, ' ', user.last_name) AS name,specialization,profile_img,doctor.doctor_id FROM doctor,user WHERE doctor.user_id = user.user_id AND user.user_type = 'D' ";
                                $rs  = $conexion->query($sql);
                                $rows = $rs->fetch_all();

                                foreach($rows as $row){ ?>
                                    <li>
                                    <div class="single-doctor">
                                        <a class="tdoctor" href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                                            <figure>
                                                <img src="<?php echo $row[2] ?>" />
                                                <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
                                                <figcaption>
                                                    <h2><?php echo "Dr.". $row[0] ?></h2>
                                                    <p><?php echo $row[1] ?></p>
                                                    <button onclick="document.location.href='profile.php?id=<?php echo $row[3]; ?>'">View</button>
                                                </figcaption>
                                            </figure>
                                        </a>
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
