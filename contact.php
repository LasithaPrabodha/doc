
<?php include_once("includes/header.php"); ?>
<?php
include_once("includes/sql.php");

$conexion = db_connect();

if (isset($_POST['submit'])) {
    if (loggedin()) {
        $name = $_SESSION['first_name'] . " " . $_SESSION['last_name'];
        $email = $_SESSION['email'];
    } else {
        $name = $_POST['name'];
        $email = $_POST['email'];
    }
    $subject = $_POST['subject'];
    $content = $_POST['content'];



    $sql = "INSERT INTO `feedbacks`(`name`, `email`, `subject`, `content`) VALUES ('$name', '$email', '$subject', '$content')";
    if ($conexion->query($sql)) {
        echo "<div>";
        echo " <h3 style='text-align: center;top: 1100px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=blue>Your feedback has been sent</font></h3>";
        echo "</div>";
    }
}
?>

<!--=========== END HEADER SECTION ================-->            
<section id="blogArchive">      
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="blog-breadcrumbs-area">
                <div class="container">
                    <div class="blog-breadcrumbs-left">
                        <h2>Feedbacks</h2>
                    </div>
                    <div class="blog-breadcrumbs-right">
                        <ol class="breadcrumb">
                            <li>You are here</li>
                            <li><a href="#">Home</a></li>                  
                            <li class="active">Feedbacks</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>        
    </div>      
</section>    
<!--=========== BEGIN Google Map SECTION ================-->
<section id="googleMap">
    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
    <div style='overflow:hidden;height:440px;width:100%;'>
        <div id='gmap_canvas' style='height:440px;width:100%;'></div>
        <style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div>
    <script type='text/javascript'>function init_map(){var myOptions = {zoom:13, center:new google.maps.LatLng(6.9270786, 79.86124300000006), mapTypeId: google.maps.MapTypeId.ROADMAP}; map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions); marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(6.9270786, 79.86124300000006)}); infowindow = new google.maps.InfoWindow({content:'<strong>DocRes</strong><br>Colombo, Sri Lanka<br>'}); google.maps.event.addListener(marker, 'click', function(){infowindow.open(map, marker); }); infowindow.open(map, marker); }google.maps.event.addDomListener(window, 'load', init_map);</script>
  <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3281.297314036103!2d-86.74954699999999!3d34.672444999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88626565a94cdb25%3A0x74c206053b6a97c9!2s305+Intergraph+Way%2C+Madison%2C+AL+35758%2C+USA!5e0!3m2!1sen!2sbd!4v1431591462160" width="100%" height="500" frameborder="0" style="border:0"></iframe>-->
</section>
<!--=========== END Google Map SECTION ================-->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-6">
                <div class="contact-form">
                    <div class="section-heading">
                        <h2>Feedbacks</h2>
                        <div class="line"></div>
                    </div>
                    <p>Fill out all required Field to send a Message. Please don't spam,Thank you!</p>
                    <form class="submitphoto_form" action="" method="post">
                        <?php if (!loggedin()) { ?>
                            <input type="text" class="wp-form-control wpcf7-text" placeholder="Your name" id="name" name="name">
                            <input type="mail" class="wp-form-control wpcf7-email" placeholder="Email address" id="email" name="email">          
                        <?php } ?>
                        <input type="text" class="wp-form-control wpcf7-text" placeholder="Subject" id="subject" name="subject" required="">
                        <textarea class="wp-form-control wpcf7-textarea" cols="30" rows="10" placeholder="What would you like to tell us" id="content" name="content" required=""></textarea>
                        <button class="wpcf7-submit button--itzel" type="submit" name="submit"><i class="button__icon fa fa-envelope"></i><span>Send Feedbacks</span></button>                
                    </form>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-6">
                <div class="contact-address">
                    <div class="section-heading">
                        <h2>Contact Information</h2>
                        <div class="line"></div>
                    </div>
                    <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>
                    <address class="contact-info">               
                        <p><span class="fa fa-home"></span>305 Intergraph Way
                            Madison, AL 35758, USA</p>
                        <p><span class="fa fa-phone"></span>1.256.730.2000</p>
                        <p><span class="fa fa-envelope"></span>info@wpfmedinova.com</p>
                    </address>
                    <h3>Social Media</h3>
                    <div class="social-share">               
                        <ul>
                            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="#"><span class="fa fa-pinterest"></span></a></li>
                            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                            <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once 'includes/footer.php'; ?>
