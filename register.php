<?php
require_once("includes/functions.php");


if (loggedin()) {
    header('Location:index.php');
}

if (isset($_POST['submit1'])) {

    $email = sql_escape($_POST['email']);
    $password = md5(sql_escape($_POST['password']));
    $email2 = sql_escape($_POST['email2']);
    $password2 = md5(sql_escape($_POST['password2']));
    $fname = sql_escape($_POST['fname']);
    $lname = sql_escape($_POST['lname']);
    $sex = sql_escape($_POST['sex']);
    $cno = sql_escape($_POST['cno']);
    $add = sql_escape($_POST['add']);
    $dob = sql_escape($_POST['year']) . '-' . sql_escape($_POST['month']) . '-' . sql_escape($_POST['day']);

    if ($email != $email2) {
        echo "<div>";
        echo " <h3 style='text-align: center;top: 315px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>Emails do not match</font></h3>";
        echo "</div>";
    } else if ($password != $password2) {
        echo "<div>";
        echo " <h3 style='text-align: center;top: 365px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>Passwords do not match</font></h3>";
        echo "</div>";
    } else {
        $insert = "INSERT INTO `user`(`first_name`, `last_name`, `email`, `gender`, `user_type`, `is_active`, `password`, `contact_number`,`Address`,`dob`) VALUES ('$fname', '$lname','$email','$sex', 'P', '1', '$password', '$cno','$add','$dob')";
        $result = register($insert);
        echo "<div>";
        echo " <h5 style='text-align: center;top: 210px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>" . $result[1] . "</font></h5>";
        echo "</div>";
    }
} elseif (isset($_POST['submit2'])) {
    $email = sql_escape($_POST['email']);
    $password = md5(sql_escape($_POST['password']));
    $email2 = sql_escape($_POST['email2']);
    $password2 = md5(sql_escape($_POST['password2']));
    $fname = sql_escape($_POST['fname']);
    $lname = sql_escape($_POST['lname']);
    $sex = sql_escape($_POST['sex']);
    $cno = sql_escape($_POST['cno']);
    $cf = sql_escape($_POST['cf']);
    $sp = sql_escape($_POST['sp']);
    $bank = sql_escape($_POST['bank']);
    $accno = sql_escape($_POST['accno']);
    $aat = sql_escape($_POST['aat']);
    $add = sql_escape($_POST['add']);
    $cadd = sql_escape($_POST['cadd']);
    $dob = sql_escape($_POST['year']) . '-' . sql_escape($_POST['month']) . '-' . sql_escape($_POST['day']);

    if ($email != $email2) {
        echo "<div>";
        echo " <h3 style='text-align: center;top: 315px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>Emails do not match</font></h3>";
        echo "</div>";
    } else if ($password != $password2) {
        echo "<div>";
        echo " <h3 style='text-align: center;top: 365px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>Passwords do not match</font></h3>";
        echo "</div>";
    } else {
        $insert = "INSERT INTO `user`(`first_name`, `last_name`, `email`, `gender`, `user_type`, `is_active`, `password`, `contact_number`, `Address`, `dob`) VALUES ('$fname', '$lname','$email','$sex', 'D', '2', '$password', '$cno','$add','$dob')";
        $result = register($insert);
        $doctor = "INSERT INTO `doctor`(`user_id`, `specialization`, `allocated_appointment_time`, `account_no`, `bank`,`address`) VALUES ('$result[0]', '$sp', '$aat', '$accno','$bank','$cadd')";
        $result2 = registerd($doctor);
        $name = $fname . " " . $lname;
        $insert2 = "INSERT INTO `doc_pay`(`doc_id`, `doc_name`, `user_id`) VALUES ('$result2[0]', '$name', '$result[0]')";
        docpay($insert2);
        $charges = "INSERT INTO `doctor_charges`( `doctor_id`, `channeling_fee`) VALUES ('$result2[0]', '$cf')";
        $result3 = registerd($charges);
        $ch_id = $result3[0];
        $dc_id = $result2[0];
        update_cid($ch_id, $dc_id);
        echo "<div>";
        echo " <h5 style='text-align: center;top: 210px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>" . $result3[1] . "</font></h5>";
        echo "</div>";
    }
} elseif (isset($_POST['submit3'])) {
    $email = sql_escape($_POST['email']);
    $password = md5(sql_escape($_POST['password']));
    $email2 = sql_escape($_POST['email2']);
    $password2 = md5(sql_escape($_POST['password2']));
    $fname = sql_escape($_POST['fname']);
    $lname = sql_escape($_POST['lname']);
    $sex = sql_escape($_POST['sex']);
    $cno = sql_escape($_POST['cno']);
    $quali = sql_escape($_POST['quali']);
    $add = sql_escape($_POST['add']);
    $bank = sql_escape($_POST['bank']);
    $accno = sql_escape($_POST['accno']);
    $dob = sql_escape($_POST['year']) . '-' . sql_escape($_POST['month']) . '-' . sql_escape($_POST['day']);

    if ($email != $email2) {
        echo "<div>";
        echo " <h3 style='text-align: center;top: 315px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>Emails do not match</font></h3>";
        echo "</div>";
    } else if ($password != $password2) {
        echo "<div>";
        echo " <h3 style='text-align: center;top: 365px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>Passwords do not match</font></h3>";
        echo "</div>";
    } else {
        $insert = "INSERT INTO `user`(`first_name`, `last_name`, `email`, `gender`, `user_type`, `is_active`, `password`, `contact_number`, `Address`,`dob`) VALUES ('$fname', '$lname','$email','$sex', 'G', '2', '$password', '$cno', '$add','$dob')";
        $result = register($insert);
        $medcon = "INSERT INTO `g_physiciant`( `user_id`, `qualifications`, `acc_no`, `bank`) VALUES ('$result[0]', '$quali','$accno','$bank')";
        $result2 = registerc($medcon);

        echo "<div>";
        echo " <h5 style='text-align: center;top: 210px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>" . $result2[1] . "</font></h5>";
        echo "</div>";
    }
}
require_once("includes/header.php");
//require_once("includes/header2.php");
?>
<!--=========== END HEADER SECTION ================-->

<section id="blogArchive">      
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="blog-breadcrumbs-area">
                <div class="container">
                    <div class="blog-breadcrumbs-left">
                        <h2>Register</h2>
                    </div>
                    <div class="blog-breadcrumbs-right">
                        <ol class="breadcrumb">
                            <li>You are here</li>
                            <li><a href="#">Home</a></li>                  
                            <li class="active">Register</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>        
    </div>      
</section>


<div class="col-md-12">
    <div id="buttons">
        <ul class="nav nav-pills">
            <li class="active"><a data-toggle="pill" href="#home">Patient</a></li>
            <li><a data-toggle="pill" href="#menu1">Doctor</a></li>
            <li><a data-toggle="pill" href="#menu2">Medical Consult</a></li>
        </ul>
    </div>
    <div class='tab-content'>
        <div id="home" class="tab-pane fade in active">
            <form id="loginForm" action="" method="post" style="margin:auto; margin-top: 40px">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Email<span class="required">*</span>
                            </label>
                            <input type="email" name="email" id="email" class="wp-form-control wpcf7-text" placeholder="Your email address" required>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <label class="control-label">Confirm Email<span class="required">*</span>
                            </label>
                            <input type="email" name="email2" id="email2" class="wp-form-control wpcf7-text" placeholder="Confirm your email address" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Password <span class="required">*</span>
                            </label>
                            <input type="password" name="password" id="password" class="wp-form-control wpcf7-text" placeholder="Your password" required>

                        </div>
                        <div class="col-md-4 col-sm-4">
                            <label class="control-label">Confirm Password<span class="required">*</span>
                            </label>
                            <input type="password" name="password2" id="password2" class="wp-form-control wpcf7-text" placeholder="Confirm your password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">First Name<span class="required">*</span>
                            </label>
                            <input type="text" name="fname" id="fname" class="wp-form-control wpcf7-text" placeholder="Your First Name" required>
                        </div>
                        <div class="col-md-4 col-sm-4 ">
                            <label class="control-label">Last Name<span class="required">*</span>
                            </label>
                            <input type="text" name="lname" id="lname" class="wp-form-control wpcf7-text" placeholder="Your last name" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4 col-sm4 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Contact Number<span class="required">*</span>
                            </label>
                            <input type="number" name="cno" id="cno" class="wp-form-control wpcf7-text" placeholder="Your Contact number" pattern=".{10,}"   required title="10 numbers " required>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <label class="control-label">Address<span class="required">*</span>
                            </label>
                            <input type="text" name="add" id="add" class="wp-form-control wpcf7-text" placeholder="Your Address" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">

                            <label class="control-label">Date of birth<span class="required">*</span>
                            </label>
                            <div class="controls ">
                                <div class="col-md-4 col-sm-4">
                                    <select id="month" name="month" data-rel="chosen" required="" class="form-control ">
                                        <option value="m">Month</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>

                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <select id="day" name="day" data-rel="chosen" required="" class="form-control">
                                        <option value="m">Day</option>
                                        <?php for ($x = 1; $x < 32; $x++) { ?>
                                            <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                        <?php } ?>


                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <select id="year" name="year" data-rel="chosen" required="" class="form-control">
                                        <option value="y">Year</option>
                                        <?php
                                        $y = date("Y");
                                        $yy = $y - 18;
                                        for ($x = $yy; $x > 1896; $x--) {
                                            ?>
                                            <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 ">
                            <label class="control-label">Sex<span class="required">*</span>
                            </label>
                            <div class="control-group">
                                <div class="controls">
                                    <select id="sex" name="sex" data-rel="chosen" required="" class="form-control">
                                        <option value="m">Male</option>
                                        <option value="f">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-10 col-sm-10 col-md-offset-6 col-sm-offset-2">
                    <input type="submit" value="Submit" name="submit1">
                </div>
            </form>
        </div>
        <div id="menu1" class="tab-pane fade">
            <form id="loginForm" action="" method="post" style="margin:auto; margin-top: 40px">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Email<span class="required">*</span>
                            </label>
                            <input type="email" name="email" id="email" class="wp-form-control wpcf7-text" placeholder="Your email address" required>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <label class="control-label">Confirm Email<span class="required">*</span>
                            </label>
                            <input type="email" name="email2" id="email2" class="wp-form-control wpcf7-text" placeholder="Confirm your email address" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Password <span class="required">*</span>
                            </label>
                            <input type="password" name="password" id="password" class="wp-form-control wpcf7-text" placeholder="Your password" required>

                        </div>
                        <div class="col-md-4 col-sm-4">
                            <label class="control-label">Confirm Password<span class="required">*</span>
                            </label>
                            <input type="password" name="password2" id="password2" class="wp-form-control wpcf7-text" placeholder="Confirm your password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">First Name<span class="required">*</span>
                            </label>
                            <input type="text" name="fname" id="fname" class="wp-form-control wpcf7-text" placeholder="Your First Name" required>
                        </div>
                        <div class="col-md-4 col-sm-4 ">
                            <label class="control-label">Last Name<span class="required">*</span>
                            </label>
                            <input type="text" name="lname" id="lname" class="wp-form-control wpcf7-text" placeholder="Your last name" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Specialization<span class="required">*</span>
                            </label>
                            <select id="sp" name="sp" class="form-control">
                                <option value="Any">Any</option>
                                <option value="Heart surgeon">Heart surgeon</option>
                                <option value="Dermatologist">Dermatologist</option>
                                <option value="Psychiatrist">Psychiatrist</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-4 ">
                            <label class="control-label">Channeling fee<span class="required">*</span>
                            </label>
                            <input type="text" name="cf" id="cf" class="wp-form-control wpcf7-text" placeholder="Your Channeling fee for one hour" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Bank<span class="required">*</span>
                            </label>
                            <input type="text" name="bank" id="bank" class="wp-form-control wpcf7-text" placeholder="Your Bank name with branch" required>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <label class="control-label">Account no.<span class="required">*</span>
                            </label>
                            <input type="text" name="accno" id="accno" class="wp-form-control wpcf7-text" placeholder="Your Account no." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm4 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Contact Number<span class="required">*</span>
                            </label>
                            <input type="number" name="cno" id="cno" class="wp-form-control wpcf7-text" placeholder="Your Contact number" pattern=".{10,}"   required title="10 numbers " required>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <label class="control-label">Allocated appointment time<span class="required">*</span>
                            </label>
                            <input type="text" name="aat" id="aat" class="wp-form-control wpcf7-text" placeholder="Your appointment time to be allocated in hours" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4 col-sm-4  col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Address<span class="required">*</span>
                            </label>
                            <input type="text" name="add" id="add" class="wp-form-control wpcf7-text" placeholder="Your Address" required>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <label class="control-label">Clinic Address<span class="required">*</span>
                            </label>
                            <input type="text" name="cadd" id="cadd" class="wp-form-control wpcf7-text" placeholder="Your Clinic Address" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">

                            <label class="control-label">Date of birth<span class="required">*</span>
                            </label>
                            <div class="controls ">
                                <div class="col-md-4 col-sm-4">
                                    <select id="month" name="month" data-rel="chosen" required="" class="form-control ">
                                        <option value="m">Month</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>

                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <select id="day" name="day" data-rel="chosen" required="" class="form-control">
                                        <option value="m">Day</option>
                                        <?php for ($x = 1; $x < 32; $x++) { ?>
                                            <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                        <?php } ?>


                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <select id="year" name="year" data-rel="chosen" required="" class="form-control">
                                        <option value="y">Year</option>
                                        <?php
                                        $y = date("Y");
                                        $yy = $y - 18;
                                        for ($x = $yy; $x > 1896; $x--) {
                                            ?>
                                            <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 ">
                            <label class="control-label">Sex<span class="required">*</span>
                            </label>
                            <div class="control-group">
                                <div class="controls">
                                    <select id="sex" name="sex" data-rel="chosen" required="" class="form-control">
                                        <option value="m">Male</option>
                                        <option value="f">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-10 col-sm-10 col-md-offset-6 col-sm-offset-2">
                    <input type="submit" value="Submit" name="submit2">
                </div>
            </form>
        </div>
        <div id="menu2" class="tab-pane fade">
            <form id="loginForm" action="" method="post" style="margin:auto; margin-top: 40px">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Email<span class="required">*</span>
                            </label>
                            <input type="email" name="email" id="email" class="wp-form-control wpcf7-text" placeholder="Your email address" required>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <label class="control-label">Confirm Email<span class="required">*</span>
                            </label>
                            <input type="email" name="email2" id="email2" class="wp-form-control wpcf7-text" placeholder="Confirm your email address" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Password <span class="required">*</span>
                            </label>
                            <input type="password" name="password" id="password" class="wp-form-control wpcf7-text" placeholder="Your password" required>

                        </div>
                        <div class="col-md-4 col-sm-4">
                            <label class="control-label">Confirm Password<span class="required">*</span>
                            </label>
                            <input type="password" name="password2" id="password2" class="wp-form-control wpcf7-text" placeholder="Confirm your password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">First Name<span class="required">*</span>
                            </label>
                            <input type="text" name="fname" id="fname" class="wp-form-control wpcf7-text" placeholder="Your First Name" required>
                        </div>
                        <div class="col-md-4 col-sm-4 ">
                            <label class="control-label">Last Name<span class="required">*</span>
                            </label>
                            <input type="text" name="lname" id="lname" class="wp-form-control wpcf7-text" placeholder="Your last name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Address<span class="required">*</span>
                            </label>
                            <input type="text" name="add" id="add" class="wp-form-control wpcf7-text" placeholder="Your Address" required>
                        </div>
                        <div class="col-md-4 col-sm4 ">
                            <label class="control-label">Contact Number<span class="required">*</span>
                            </label>
                            <input type="number" name="cno" id="cno" class="wp-form-control wpcf7-text" placeholder="Your Contact number" pattern=".{10,}"   required title="10 numbers " required>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Bank<span class="required">*</span>
                            </label>
                            <input type="text" name="bank" id="bank" class="wp-form-control wpcf7-text" placeholder="Your bank name with branch" required>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <label class="control-label">Account no.<span class="required">*</span>
                            </label>
                            <input type="text" name="accno" id="accno" class="wp-form-control wpcf7-text" placeholder="Your account no" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Qualifications<span class="required">*</span>
                            </label>
                            <input type="text" name="quali" id="quali" class="wp-form-control wpcf7-text" placeholder="Your Qualifications (seperate with a comma)" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">

                            <label class="control-label">Date of birth<span class="required">*</span>
                            </label>
                            <div class="controls ">
                                <div class="col-md-4 col-sm-4">
                                    <select id="month" name="month" data-rel="chosen" required="" class="form-control ">
                                        <option value="m">Month</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>

                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <select id="day" name="day" data-rel="chosen" required="" class="form-control">
                                        <option value="m">Day</option>
                                        <?php for ($x = 1; $x < 32; $x++) { ?>
                                            <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                        <?php } ?>


                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <select id="year" name="year" data-rel="chosen" required="" class="form-control">
                                        <option value="y">Year</option>
                                        <?php
                                        $y = date("Y");
                                        $yy = $y - 18;
                                        for ($x = $yy; $x > 1896; $x--) {
                                            ?>
                                            <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 ">
                            <label class="control-label">Sex<span class="required">*</span>
                            </label>
                            <div class="control-group">
                                <div class="controls">
                                    <select id="sex" name="sex" data-rel="chosen" required="" class="form-control">
                                        <option value="m">Male</option>
                                        <option value="f">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="col-md-10 col-sm-10 col-md-offset-6 col-sm-offset-2">
                    <input type="submit" value="Submit" name="submit3">
                </div>
            </form>
        </div>
    </div>
</div>

</div>

<?php include 'includes/footer.php'; ?>