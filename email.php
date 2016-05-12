<?php

require 'PHPMailer/PHPMailerAutoload.php';

if (isset($_POST['email'])) {
    $subject = strip_tags($_POST['subject']);
    $email = strip_tags($_POST['email']);
    $message = strip_tags($_POST['message']);
}
$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'ahasedeyyona@gmail.com';
$mail->Password = 'ahase123';
$mail->SMTPSecure = 'tls';

$mail->From = 'flightres@gmail.com';
$mail->FromName = 'Admin';
$mail->addAddress($email, 'lasitha');

$mail->addReplyTo($email, 'lasitha');

$mail->WordWrap = 50;
$mail->isHTML(true);

$mail->Subject = $subject;
$mail->Body = $message;

if (!$mail->send()) {
    echo '<script>alert("Message could not be sent. Mailer Error: ' . $mail->ErrorInfo.')</script>';
    exit;
}

echo '<script>alert("Your appointment has been cancelled.")</script>';
