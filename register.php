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
    $dob = sql_escape($_POST['day']) . "/" . sql_escape($_POST['month']) . '/' . sql_escape($_POST['year']);

    if ($email != $email2) {
        echo "<div>";
        echo " <h3 style='text-align: center;top: 315px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>Emails do not match</font></h3>";
        echo "</div>";
    } else if ($password != $password2) {
        echo "<div>";
        echo " <h3 style='text-align: center;top: 365px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>Passwords do not match</font></h3>";
        echo "</div>";
    } else {
        $insert="INSERT INTO `user`(`first_name`, `last_name`, `email`, `gender`, `user_type`, `is_active`, `password`, `contact_number`) VALUES ('$fname', '$lname','$email','$sex', 'p', '1', '$password', '$cno')";
        $result = register($insert);
          echo "<div>";
        echo " <h5 style='text-align: center;top: 210px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>".$result[1]."</font></h5>";
        echo "</div>";
    }
}elseif (isset($_POST['submit2'])) {
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
    $dob = sql_escape($_POST['day']) . "/" . sql_escape($_POST['month']) . '/' . sql_escape($_POST['year']);

    if ($email != $email2) {
        echo "<div>";
        echo " <h3 style='text-align: center;top: 315px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>Emails do not match</font></h3>";
        echo "</div>";
    } else if ($password != $password2) {
        echo "<div>";
        echo " <h3 style='text-align: center;top: 365px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>Passwords do not match</font></h3>";
        echo "</div>";
    } else {
        $insert="INSERT INTO `user`(`first_name`, `last_name`, `email`, `gender`, `user_type`, `is_active`, `password`, `contact_number`) VALUES ('$fname', '$lname','$email','$sex', 'p', '1', '$password', '$cno')";
        $result = register($insert);
        $doctor = "INSERT INTO `doctor`(`user_id`, `specialization`, `allocated_appointment_time`, `account_no`, `bank`) VALUES ('$result[0]', '$sp', '$aat', '$accno','$bank')";
        $result2 = registerd($doctor);
        $charges="INSERT INTO `doctor_charges`( `doctor_id`, `channeling_fee`) VALUES ('$result2[0]', '$cf')";
        $result3 = registerd($charges);
        $ch_id=$result3[0];
        $dc_id=$result2[0];
        update_cid($ch_id, $dc_id);
          echo "<div>";
        echo " <h5 style='text-align: center;top: 210px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>".$result3[1]."</font></h5>";
        echo "</div>";
    }
}elseif (isset($_POST['submit3'])) {
     $email = sql_escape($_POST['email']);
    $password = md5(sql_escape($_POST['password']));
    $email2 = sql_escape($_POST['email2']);
    $password2 = md5(sql_escape($_POST['password2']));
    $fname = sql_escape($_POST['fname']);
    $lname = sql_escape($_POST['lname']);
    $sex = sql_escape($_POST['sex']);
    $cno = sql_escape($_POST['cno']);
    $quali=sql_escape($_POST['quali']);
    
    $bank = sql_escape($_POST['bank']);
    $accno = sql_escape($_POST['accno']);
    $dob = sql_escape($_POST['day']) . "/" . sql_escape($_POST['month']) . '/' . sql_escape($_POST['year']);

    if ($email != $email2) {
        echo "<div>";
        echo " <h3 style='text-align: center;top: 315px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>Emails do not match</font></h3>";
        echo "</div>";
    } else if ($password != $password2) {
        echo "<div>";
        echo " <h3 style='text-align: center;top: 365px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>Passwords do not match</font></h3>";
        echo "</div>";
    } else {
        $insert="INSERT INTO `user`(`first_name`, `last_name`, `email`, `gender`, `user_type`, `is_active`, `password`, `contact_number`) VALUES ('$fname', '$lname','$email','$sex', 'p', '1', '$password', '$cno')";
        $result = register($insert);
        $medcon = "INSERT INTO `g_physiciant`( `user_id`, `qualifications`, `acc_no`, `bank`) VALUES ('$result[0]', '$quali','$accno','$bank')";
        $result2 = registerc($medcon);
        
          echo "<div>";
        echo " <h5 style='text-align: center;top: 210px;position: absolute;left: 0;margin: auto;width: 100%;'><font color=red>".$result2[1]."</font></h5>";
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
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Email<span class="required">*</span>
                            </label>
                            <input type="email" name="email" id="email" class="wp-form-control wpcf7-text" placeholder="Your email address" required>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Password <span class="required">*</span>
                            </label>
                            <input type="password" name="password" id="password" class="wp-form-control wpcf7-text" placeholder="Your password" required>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">First Name<span class="required">*</span>
                            </label>
                            <input type="text" name="fname" id="fname" class="wp-form-control wpcf7-text" placeholder="Your First Name" required>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Contact Number<span class="required">*</span>
                            </label>
                            <input type="text" name="cno" id="cno" class="wp-form-control wpcf7-text" placeholder="Your Contact number" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-10 col-sm-10">
                            <label class="control-label">Confirm Email<span class="required">*</span>
                            </label>
                            <input type="email" name="email2" id="email2" class="wp-form-control wpcf7-text" placeholder="Confirm your email address" required>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-10 col-sm-10">
                            <label class="control-label">Confirm Password<span class="required">*</span>
                            </label>
                            <input type="password" name="password2" id="password2" class="wp-form-control wpcf7-text" placeholder="Confirm your password" required>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-10 col-sm-10 ">
                            <label class="control-label">Last Name<span class="required">*</span>
                            </label>
                            <input type="text" name="lname" id="lname" class="wp-form-control wpcf7-text" placeholder="Your last name" required>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 ">

                            <label class="control-label">Date of birth<span class="required">*</span>
                            </label>
                            <div class="controls">

                                <select id="month" name="month" data-rel="chosen" required="">
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
                                <select id="day" name="day" data-rel="chosen" required="">
                                    <option value="m">Day</option>
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
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>


                                </select>
                                <select id="year" name="year" data-rel="chosen" required="">


                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                    <option value="1970">1970</option>
                                    <option value="1969">1969</option>
                                    <option value="1968">1968</option>
                                    <option value="1967">1967</option>
                                    <option value="1966">1966</option>
                                    <option value="1965">1965</option>
                                    <option value="1964">1964</option>
                                    <option value="1963">1963</option>
                                    <option value="1962">1962</option>
                                    <option value="1961">1961</option>
                                    <option value="1960">1960</option>
                                    <option value="1959">1959</option>
                                    <option value="1958">1958</option>
                                    <option value="1957">1957</option>
                                    <option value="1956">1956</option>
                                    <option value="1955">1955</option>
                                    <option value="1954">1954</option>
                                    <option value="1953">1953</option>
                                    <option value="1952">1952</option>
                                    <option value="1951">1951</option>
                                    <option value="1950">1950</option>
                                    <option value="1949">1949</option>
                                    <option value="1948">1948</option>
                                    <option value="1947">1947</option>
                                    <option value="1946">1946</option>
                                    <option value="1945">1945</option>
                                    <option value="1944">1944</option>
                                    <option value="1943">1943</option>
                                    <option value="1942">1942</option>
                                    <option value="1941">1941</option>
                                    <option value="1940">1940</option>
                                    <option value="1939">1939</option>
                                    <option value="1938">1938</option>
                                    <option value="1937">1937</option>
                                    <option value="1936">1936</option>
                                    <option value="1935">1935</option>
                                    <option value="1934">1934</option>
                                    <option value="1933">1933</option>
                                    <option value="1932">1932</option>
                                    <option value="1931">1931</option>
                                    <option value="1930">1930</option>
                                    <option value="1929">1929</option>
                                    <option value="1928">1928</option>
                                    <option value="1927">1927</option>
                                    <option value="1926">1926</option>
                                    <option value="1925">1925</option>
                                    <option value="1924">1924</option>
                                    <option value="1923">1923</option>
                                    <option value="1922">1922</option>
                                    <option value="1921">1921</option>
                                    <option value="1920">1920</option>
                                    <option value="1919">1919</option>
                                    <option value="1918">1918</option>
                                    <option value="1917">1917</option>
                                    <option value="1916">1916</option>
                                    <option value="1915">1915</option>
                                    <option value="1914">1914</option>
                                    <option value="1913">1913</option>
                                    <option value="1912">1912</option>
                                    <option value="1911">1911</option>
                                    <option value="1910">1910</option>
                                    <option value="1909">1909</option>
                                    <option value="1908">1908</option>
                                    <option value="1907">1907</option>
                                    <option value="1906">1906</option>
                                    <option value="1905">1905</option>
                                    <option value="1904">1904</option>
                                    <option value="1903">1903</option>
                                    <option value="1902">1902</option>
                                    <option value="1901">1901</option>
                                    <option value="1900">1900</option>
                                    <option value="1899">1899</option>
                                    <option value="1898">1898</option>
                                    <option value="1897">1897</option>
                                    <option value="1896">1896</option>
                                    <option value="1895">1895</option>
                                    <option value="1894">1894</option>
                                    <option value="1893">1893</option>
                                    <option value="1892">1892</option>
                                    <option value="1891">1891</option>
                                    <option value="1890">1890</option>
                                    <option value="1889">1889</option>
                                    <option value="1888">1888</option>
                                    <option value="1887">1887</option>
                                    <option value="1886">1886</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 ">
                            <label class="control-label">Sex<span class="required">*</span>
                            </label>
                            <div class="control-group">
                                <div class="controls">
                                    <select id="sex" name="sex" data-rel="chosen" required="">
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
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Email<span class="required">*</span>
                            </label>
                            <input type="email" name="email" id="email" class="wp-form-control wpcf7-text" placeholder="Your email address" required>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Password <span class="required">*</span>
                            </label>
                            <input type="password" name="password" id="password" class="wp-form-control wpcf7-text" placeholder="Your password" required>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">First Name<span class="required">*</span>
                            </label>
                            <input type="text" name="fname" id="fname" class="wp-form-control wpcf7-text" placeholder="Your First Name" required>
                        </div>

                    </div>
                    
                    <div class="row">

                        <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Specialization<span class="required">*</span>
                            </label>
                            <input type="text" name="sp" id="sp" class="wp-form-control wpcf7-text" placeholder="Your Contact number" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Bank<span class="required">*</span>
                            </label>
                            <input type="text" name="bank" id="bank" class="wp-form-control wpcf7-text" placeholder="Your Contact number" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Contact Number<span class="required">*</span>
                            </label>
                            <input type="text" name="cno" id="cno" class="wp-form-control wpcf7-text" placeholder="Your Contact number" required>
                        </div>
                    </div>
                     <div class="row">

                        <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Channeling fee<span class="required">*</span>
                            </label>
                            <input type="text" name="cf" id="cf" class="wp-form-control wpcf7-text" placeholder="Your Contact number" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-10 col-sm-10">
                            <label class="control-label">Confirm Email<span class="required">*</span>
                            </label>
                            <input type="email" name="email2" id="email2" class="wp-form-control wpcf7-text" placeholder="Confirm your email address" required>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-10 col-sm-10">
                            <label class="control-label">Confirm Password<span class="required">*</span>
                            </label>
                            <input type="password" name="password2" id="password2" class="wp-form-control wpcf7-text" placeholder="Confirm your password" required>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-10 col-sm-10 ">
                            <label class="control-label">Last Name<span class="required">*</span>
                            </label>
                            <input type="text" name="lname" id="lname" class="wp-form-control wpcf7-text" placeholder="Your last name" required>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-10 col-sm-10">
                            <label class="control-label">Allocated appointment time<span class="required">*</span>
                            </label>
                            <input type="text" name="aat" id="aat" class="wp-form-control wpcf7-text" placeholder="Your Contact number" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-10 col-sm-10">
                            <label class="control-label">Account no.<span class="required">*</span>
                            </label>
                            <input type="text" name="accno" id="accno" class="wp-form-control wpcf7-text" placeholder="Your Contact number" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 ">

                            <label class="control-label">Date of birth<span class="required">*</span>
                            </label>
                            <div class="controls">

                                <select id="month" name="month" data-rel="chosen" required="">
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
                                <select id="day" name="day" data-rel="chosen" required="">
                                    <option value="m">Day</option>
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
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>


                                </select>
                                <select id="year" name="year" data-rel="chosen" required="">


                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                    <option value="1970">1970</option>
                                    <option value="1969">1969</option>
                                    <option value="1968">1968</option>
                                    <option value="1967">1967</option>
                                    <option value="1966">1966</option>
                                    <option value="1965">1965</option>
                                    <option value="1964">1964</option>
                                    <option value="1963">1963</option>
                                    <option value="1962">1962</option>
                                    <option value="1961">1961</option>
                                    <option value="1960">1960</option>
                                    <option value="1959">1959</option>
                                    <option value="1958">1958</option>
                                    <option value="1957">1957</option>
                                    <option value="1956">1956</option>
                                    <option value="1955">1955</option>
                                    <option value="1954">1954</option>
                                    <option value="1953">1953</option>
                                    <option value="1952">1952</option>
                                    <option value="1951">1951</option>
                                    <option value="1950">1950</option>
                                    <option value="1949">1949</option>
                                    <option value="1948">1948</option>
                                    <option value="1947">1947</option>
                                    <option value="1946">1946</option>
                                    <option value="1945">1945</option>
                                    <option value="1944">1944</option>
                                    <option value="1943">1943</option>
                                    <option value="1942">1942</option>
                                    <option value="1941">1941</option>
                                    <option value="1940">1940</option>
                                    <option value="1939">1939</option>
                                    <option value="1938">1938</option>
                                    <option value="1937">1937</option>
                                    <option value="1936">1936</option>
                                    <option value="1935">1935</option>
                                    <option value="1934">1934</option>
                                    <option value="1933">1933</option>
                                    <option value="1932">1932</option>
                                    <option value="1931">1931</option>
                                    <option value="1930">1930</option>
                                    <option value="1929">1929</option>
                                    <option value="1928">1928</option>
                                    <option value="1927">1927</option>
                                    <option value="1926">1926</option>
                                    <option value="1925">1925</option>
                                    <option value="1924">1924</option>
                                    <option value="1923">1923</option>
                                    <option value="1922">1922</option>
                                    <option value="1921">1921</option>
                                    <option value="1920">1920</option>
                                    <option value="1919">1919</option>
                                    <option value="1918">1918</option>
                                    <option value="1917">1917</option>
                                    <option value="1916">1916</option>
                                    <option value="1915">1915</option>
                                    <option value="1914">1914</option>
                                    <option value="1913">1913</option>
                                    <option value="1912">1912</option>
                                    <option value="1911">1911</option>
                                    <option value="1910">1910</option>
                                    <option value="1909">1909</option>
                                    <option value="1908">1908</option>
                                    <option value="1907">1907</option>
                                    <option value="1906">1906</option>
                                    <option value="1905">1905</option>
                                    <option value="1904">1904</option>
                                    <option value="1903">1903</option>
                                    <option value="1902">1902</option>
                                    <option value="1901">1901</option>
                                    <option value="1900">1900</option>
                                    <option value="1899">1899</option>
                                    <option value="1898">1898</option>
                                    <option value="1897">1897</option>
                                    <option value="1896">1896</option>
                                    <option value="1895">1895</option>
                                    <option value="1894">1894</option>
                                    <option value="1893">1893</option>
                                    <option value="1892">1892</option>
                                    <option value="1891">1891</option>
                                    <option value="1890">1890</option>
                                    <option value="1889">1889</option>
                                    <option value="1888">1888</option>
                                    <option value="1887">1887</option>
                                    <option value="1886">1886</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 ">
                            <label class="control-label">Sex<span class="required">*</span>
                            </label>
                            <div class="control-group">
                                <div class="controls">
                                    <select id="sex" name="sex" data-rel="chosen" required="">
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
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Email<span class="required">*</span>
                            </label>
                            <input type="email" name="email" id="email" class="wp-form-control wpcf7-text" placeholder="Your email address" required>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Password <span class="required">*</span>
                            </label>
                            <input type="password" name="password" id="password" class="wp-form-control wpcf7-text" placeholder="Your password" required>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">First Name<span class="required">*</span>
                            </label>
                            <input type="text" name="fname" id="fname" class="wp-form-control wpcf7-text" placeholder="Your First Name" required>
                        </div>

                    </div>
                    
                    <div class="row">

                        <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Qualifications<span class="required">*</span>
                            </label>
                            <input type="text" name="quali" id="quali" class="wp-form-control wpcf7-text" placeholder="Your Contact number" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Bank<span class="required">*</span>
                            </label>
                            <input type="text" name="bank" id="bank" class="wp-form-control wpcf7-text" placeholder="Your Contact number" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2">
                            <label class="control-label">Account no.<span class="required">*</span>
                            </label>
                            <input type="text" name="accno" id="accno" class="wp-form-control wpcf7-text" placeholder="Your Contact number" required>
                        </div>
                    </div>
                     
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-10 col-sm-10">
                            <label class="control-label">Confirm Email<span class="required">*</span>
                            </label>
                            <input type="email" name="email2" id="email2" class="wp-form-control wpcf7-text" placeholder="Confirm your email address" required>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-10 col-sm-10">
                            <label class="control-label">Confirm Password<span class="required">*</span>
                            </label>
                            <input type="password" name="password2" id="password2" class="wp-form-control wpcf7-text" placeholder="Confirm your password" required>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-10 col-sm-10 ">
                            <label class="control-label">Last Name<span class="required">*</span>
                            </label>
                            <input type="text" name="lname" id="lname" class="wp-form-control wpcf7-text" placeholder="Your last name" required>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-10 col-sm-10 ">
                            <label class="control-label">Contact Number<span class="required">*</span>
                            </label>
                            <input type="text" name="cno" id="cno" class="wp-form-control wpcf7-text" placeholder="Your Contact number" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 col-sm-4 ">

                            <label class="control-label">Date of birth<span class="required">*</span>
                            </label>
                            <div class="controls">

                                <select id="month" name="month" data-rel="chosen" required="">
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
                                <select id="day" name="day" data-rel="chosen" required="">
                                    <option value="m">Day</option>
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
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>


                                </select>
                                <select id="year" name="year" data-rel="chosen" required="">


                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                    <option value="1970">1970</option>
                                    <option value="1969">1969</option>
                                    <option value="1968">1968</option>
                                    <option value="1967">1967</option>
                                    <option value="1966">1966</option>
                                    <option value="1965">1965</option>
                                    <option value="1964">1964</option>
                                    <option value="1963">1963</option>
                                    <option value="1962">1962</option>
                                    <option value="1961">1961</option>
                                    <option value="1960">1960</option>
                                    <option value="1959">1959</option>
                                    <option value="1958">1958</option>
                                    <option value="1957">1957</option>
                                    <option value="1956">1956</option>
                                    <option value="1955">1955</option>
                                    <option value="1954">1954</option>
                                    <option value="1953">1953</option>
                                    <option value="1952">1952</option>
                                    <option value="1951">1951</option>
                                    <option value="1950">1950</option>
                                    <option value="1949">1949</option>
                                    <option value="1948">1948</option>
                                    <option value="1947">1947</option>
                                    <option value="1946">1946</option>
                                    <option value="1945">1945</option>
                                    <option value="1944">1944</option>
                                    <option value="1943">1943</option>
                                    <option value="1942">1942</option>
                                    <option value="1941">1941</option>
                                    <option value="1940">1940</option>
                                    <option value="1939">1939</option>
                                    <option value="1938">1938</option>
                                    <option value="1937">1937</option>
                                    <option value="1936">1936</option>
                                    <option value="1935">1935</option>
                                    <option value="1934">1934</option>
                                    <option value="1933">1933</option>
                                    <option value="1932">1932</option>
                                    <option value="1931">1931</option>
                                    <option value="1930">1930</option>
                                    <option value="1929">1929</option>
                                    <option value="1928">1928</option>
                                    <option value="1927">1927</option>
                                    <option value="1926">1926</option>
                                    <option value="1925">1925</option>
                                    <option value="1924">1924</option>
                                    <option value="1923">1923</option>
                                    <option value="1922">1922</option>
                                    <option value="1921">1921</option>
                                    <option value="1920">1920</option>
                                    <option value="1919">1919</option>
                                    <option value="1918">1918</option>
                                    <option value="1917">1917</option>
                                    <option value="1916">1916</option>
                                    <option value="1915">1915</option>
                                    <option value="1914">1914</option>
                                    <option value="1913">1913</option>
                                    <option value="1912">1912</option>
                                    <option value="1911">1911</option>
                                    <option value="1910">1910</option>
                                    <option value="1909">1909</option>
                                    <option value="1908">1908</option>
                                    <option value="1907">1907</option>
                                    <option value="1906">1906</option>
                                    <option value="1905">1905</option>
                                    <option value="1904">1904</option>
                                    <option value="1903">1903</option>
                                    <option value="1902">1902</option>
                                    <option value="1901">1901</option>
                                    <option value="1900">1900</option>
                                    <option value="1899">1899</option>
                                    <option value="1898">1898</option>
                                    <option value="1897">1897</option>
                                    <option value="1896">1896</option>
                                    <option value="1895">1895</option>
                                    <option value="1894">1894</option>
                                    <option value="1893">1893</option>
                                    <option value="1892">1892</option>
                                    <option value="1891">1891</option>
                                    <option value="1890">1890</option>
                                    <option value="1889">1889</option>
                                    <option value="1888">1888</option>
                                    <option value="1887">1887</option>
                                    <option value="1886">1886</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 ">
                            <label class="control-label">Sex<span class="required">*</span>
                            </label>
                            <div class="control-group">
                                <div class="controls">
                                    <select id="sex" name="sex" data-rel="chosen" required="">
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