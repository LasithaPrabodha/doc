
<?php include_once("includes/header.php"); ?>
<?php
include_once("includes/sql.php");

$conexion = db_connect();
$message = "";
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
        $message = "<div class='alert alert-success'>Feedback Sent successfully.</div>";
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
                        <h2>Feedback</h2>
                    </div>
                    <div class="blog-breadcrumbs-right">
                        <ol class="breadcrumb">
                            <li>You are here</li>
                            <li><a href="#">Home</a></li>                  
                            <li class="active">Feedback</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>        
    </div>      
</section>    
<?php echo $message ?>
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-md-offset-2">
                <div class="contact-form">
                    <div class="section-heading">
                        <h2>Feedbacks</h2>
                        <div class="line"></div>
                    </div>
                    <div class="clearfix"></div>
                    <p>Fill out all required Field to send a Message. Please don't spam,Thank you!</p>
                    <div class="clearfix"></div>
                    <form class="submitphoto_form" action="" method="post">
                        <?php if (!loggedin()) { ?>
                            <input type="text" class="wp-form-control wpcf7-text" placeholder="Your name" id="name" name="name">
                            <input type="mail" class="wp-form-control wpcf7-email" placeholder="Email address" id="email" name="email">          
                        <?php } ?>
                        <input type="text" class="wp-form-control wpcf7-text" placeholder="Subject" id="subject" name="subject" required="">
                        <div class="clearfix"></div>
                        <textarea class="wp-form-control wpcf7-textarea" cols="30" rows="10" placeholder="What would you like to tell us" id="content" name="content" required=""></textarea>
                        <button class="wpcf7-submit button--itzel" type="submit" name="submit"><i class="button__icon fa fa-envelope"></i><span>Send Feedbacks</span></button>                
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
<?php include_once 'includes/footer.php'; ?>
