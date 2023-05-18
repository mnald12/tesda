<?php

include '../connection.php';
require '../mailer/vendor/autoload.php';

$id = mysqli_real_escape_string($conn, $_POST['id']);
$tc = mysqli_real_escape_string($conn, $_POST['tc']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$msg = mysqli_real_escape_string($conn, $_POST['msg']);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'tesdaposorsogon@gmail.com';
$mail->Password   = 'jjlepjmflqyfcosv';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port       = 465;

$mail->setFrom('tesdaposorsogon@gmail.com', "$tc");
$mail->addAddress("$email", "$name");

$body = str_replace ('\r\n' , '<br>' , $msg);

$mail->isHTML(true);
$mail->Subject = 'Approved Application!';
$mail->Body    = $body;
$mail->AltBody = $body;

$mail->send();

$update = "UPDATE applications SET status = 'Approved' Where id = '$id' ";
$result = $conn->query($update);

header('location: ../applications.php');