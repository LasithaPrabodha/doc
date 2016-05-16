<?php
require '../includes/sql.php';

$con = db_connect();

if (isset($_POST['DID'])) {
    $editId = $_POST['DID'];

    $sql = 'SELECT user.user_id, user.first_name, user.last_name, user.dob, user.email, user.contact_number, user.Address, doctor.specialization, '
            . 'doctor.account_no, doctor.quali, doctor.bank, doctor.address as clinic_add, doctor_charges.channeling_fee  FROM `user` '
            . 'join doctor on user.user_id=doctor.user_id join doctor_charges on doctor.doctor_id=doctor_charges.doctor_id where user.user_id=' . $editId;
    $resultSet = $con->query($sql);
    while ($result = $resultSet->fetch_array()) {
        $us = $result['user_id'];
        $quali = $result['quali'];
        $first_name = $result['first_name'];
        $last_name = $result['last_name'];
        $dob = $result['dob'];
        $email = $result['email'];
        $contact_number = $result['contact_number'];
        $Address = $result['Address'];
        $specialization = $result['specialization'];
        $account_no = $result['account_no'];
        $bank = $result['bank'];
        $clinic_add = $result['clinic_add'];
        $channeling_fee = $result['channeling_fee'];
    }
    ?>

    <form id="editForm" action="" method="post" style="margin:auto;" class="form-horizontal">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                    <label class="control-label">Email<span class="required">*</span>
                    </label>
                    <input type="email"disabled="" name="email" id="email" class="form-control" placeholder="Email address" required value="<?php echo $email; ?>">
                </div>
                <div class="col-md-4 col-sm-4">
                    <label class="control-label">New Email<span class="required">*</span>
                    </label>
                    <input type="email" name="email2" id="email2" class="form-control" placeholder="Confirm email address" value="">
                </div>
            </div>
            <div class="row">

                <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                    <label class="control-label">Password <span class="required">*</span>
                    </label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="password">

                </div>
                <div class="col-md-4 col-sm-4">
                    <label class="control-label">Confirm Password<span class="required">*</span>
                    </label>
                    <input type="password" name="password2" id="password2" class="form-control" placeholder="Confirm password" >
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                    <label class="control-label">First Name<span class="required">*</span>
                    </label>
                    <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" value="<?php echo $first_name; ?>" required>
                </div>
                <div class="col-md-4 col-sm-4 ">
                    <label class="control-label">Last Name<span class="required">*</span>
                    </label>
                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Last name" value="<?php echo $last_name; ?>" required>
                </div>
            </div>
            <div class="row">

                <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                    <label class="control-label">Specialization<span class="required">*</span>
                    </label>
                    <select id="sp" name="sp" class="form-control">
                       
                        <option value="Any" <?PHP if ($specialization == 'Any') { echo 'selected'; }?> >Any</option>
                        <option value="Heart surgeon" <?PHP if ($specialization == 'Heart surgeon') { echo 'selected'; } ?>>Heart surgeon</option>
                        <option value="Dermatologist" <?PHP if ($specialization == 'Dermatologist') { echo 'selected';}?>>Dermatologist</option>
                        <option value="Psychiatrist" <?PHP if ($specialization == 'Psychiatrist') { echo 'selected';}?>>Psychiatrist</option>';
                        

                    </select>
                </div>
                <div class="col-md-4 col-sm-4 ">
                    <label class="control-label">Channeling fee<span class="required">*</span>
                    </label>
                    <input type="text" name="cf" id="cf" class="form-control" placeholder="Channeling fee for one appointment" value="<?php echo $channeling_fee; ?>" required>
                </div>
            </div>
            <div class="row">

                <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                    <label class="control-label">Bank<span class="required">*</span>
                    </label>
                    <input type="text" name="bank" id="bank" class="form-control" placeholder="Bank name with branch" value="<?php echo $bank; ?>" required>
                </div>
                <div class="col-md-4 col-sm-4">
                    <label class="control-label">Account no.<span class="required">*</span>
                    </label>
                    <input type="text" name="accno" id="accno" class="form-control" placeholder="Account no." value="<?php echo $account_no; ?>" required>
                </div>
            </div>
            <div class="row">

                <div class="col-md-8 col-sm-8  col-md-offset-2 col-sm-offset-2">
                    <label class="control-label">Address<span class="required">*</span>
                    </label>
                    <input type="text" name="add" id="add" class="form-control" placeholder="Address" value="<?php echo $Address; ?>" required>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4 col-sm4 col-md-offset-2 col-sm-offset-2">
                    <label class="control-label">Contact Number<span class="required">*</span>
                    </label>
                    <input type="number" name="cno" id="cno" class="form-control" placeholder="Contact number" pattern=".{10,}"  value="<?php echo $contact_number; ?>" required title="10 numbers " required>
                </div>


                <div class="col-md-4 col-sm-4">
                    <label class="control-label">Clinic Address<span class="required">*</span>
                    </label>
                    <input type="text" name="cadd" id="cadd" class="form-control" value="<?php echo $clinic_add; ?>" placeholder="Clinic Address" required>
                </div>
            </div>
            <div class="row">

                <div class="col-md-8 col-sm-8  col-md-offset-2 col-sm-offset-2">
                    <label class="control-label">Qualifications<span class="required">*</span>
                    </label>
                    <input type="text" name="quali" id="quali" class="form-control" placeholder="Qualifications" value="<?php echo $quali; ?>" required>
                </div>

            </div>
            <input type="hidden" name="userid" value="<?php echo $us; ?>">

        </div>
        <div class="col-md-10 col-sm-10 col-md-offset-6 col-sm-offset-2">
            <input type="submit" value="Submit" name="submit">
        </div>
    </form>
    <?PHP
} elseif (isset($_POST['MID'])) {
    $editId = $_POST['MID'];

    $sql = 'SELECT user.user_id, user.first_name, user.last_name, user.dob, user.email, user.contact_number, user.Address, medical_c.qualifications, medical_c.acc_no, medical_c.bank 
FROM `user` join medical_c on user.user_id=medical_c.user_id 
where user.user_id=' . $editId;
    $resultSet = $con->query($sql);
    while ($result = $resultSet->fetch_array()) {
        $us = $result['user_id'];
        $quali = $result['qualifications'];
        $first_name = $result['first_name'];
        $last_name = $result['last_name'];
        $dob = $result['dob'];
        $email = $result['email'];
        $contact_number = $result['contact_number'];
        $Address = $result['Address'];
        $account_no = $result['acc_no'];
        $bank = $result['bank'];
    }
    ?>

    <form id="editForm" action="" method="post" style="margin:auto;" class="form-horizontal">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                    <label class="control-label">Email<span class="required">*</span>
                    </label>
                    <input type="email"disabled="" name="email" id="email" class="form-control" placeholder="Email address" required value="<?php echo $email; ?>">
                </div>
                <div class="col-md-4 col-sm-4">
                    <label class="control-label">New Email<span class="required">*</span>
                    </label>
                    <input type="email" name="email2" id="email2" class="form-control" placeholder="New Email address" value="">
                </div>
            </div>
            <div class="row">

                <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                    <label class="control-label">Password <span class="required">*</span>
                    </label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">

                </div>
                <div class="col-md-4 col-sm-4">
                    <label class="control-label">Confirm Password<span class="required">*</span>
                    </label>
                    <input type="password" name="password2" id="password2" class="form-control" placeholder="Confirm password" >
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                    <label class="control-label">First Name<span class="required">*</span>
                    </label>
                    <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" value="<?php echo $first_name; ?>" required>
                </div>
                <div class="col-md-4 col-sm-4 ">
                    <label class="control-label">Last Name<span class="required">*</span>
                    </label>
                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Last name" value="<?php echo $last_name; ?>" required>
                </div>
            </div>

            <div class="row">

                <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                    <label class="control-label">Bank<span class="required">*</span>
                    </label>
                    <input type="text" name="bank" id="bank" class="form-control" placeholder="Bank name with branch" value="<?php echo $bank; ?>" required>
                </div>
                <div class="col-md-4 col-sm-4">
                    <label class="control-label">Account no.<span class="required">*</span>
                    </label>
                    <input type="text" name="accno" id="accno" class="form-control" placeholder="Account no." value="<?php echo $account_no; ?>" required>
                </div>
            </div>
            <div class="row">

                <div class="col-md-8 col-sm-8  col-md-offset-2 col-sm-offset-2">
                    <label class="control-label">Address<span class="required">*</span>
                    </label>
                    <input type="text" name="add" id="add" class="form-control" placeholder="Address" value="<?php echo $Address; ?>" required>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4 col-sm4 col-md-offset-2 col-sm-offset-2">
                    <label class="control-label">Contact Number<span class="required">*</span>
                    </label>
                    <input type="number" name="cno" id="cno" class="form-control" placeholder="Contact number" pattern=".{10,}"  value="<?php echo $contact_number; ?>" required title="10 numbers " required>
                </div>


            </div>
            <div class="row">

                <div class="col-md-8 col-sm-8  col-md-offset-2 col-sm-offset-2">
                    <label class="control-label">Qualifications<span class="required">*</span>
                    </label>
                    <input type="text" name="quali" id="quali" class="form-control" placeholder="Qualifications" value="<?php echo $quali; ?>" required>
                </div>

            </div>
            <input type="hidden" name="userid" value="<?php echo $us; ?>">

        </div>
        <div class="col-md-10 col-sm-10 col-md-offset-6 col-sm-offset-2">
            <input type="submit" value="Submit" name="submit">
        </div>
    </form>
<?PHP }
?>

