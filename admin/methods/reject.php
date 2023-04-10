<?php

include '../connection.php';
require '../mailer/vendor/autoload.php';

$id = mysqli_real_escape_string($conn, $_POST['id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$msg = mysqli_real_escape_string($conn, $_POST['msg']);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'tesdasorsogon.po@gmail.com';
$mail->Password   = 'yffgqsxjygzntdnz';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port       = 465;

$mail->setFrom('tesdasorsogon.po@gmail.com', 'TESDA SORSOGON');
$mail->addAddress("$email", "$name");

$mail->isHTML(true);
$mail->Subject = 'Reject Requirements!';
$mail->Body    = "$msg";
$mail->AltBody = "$msg";

$mail->send();

$update = "UPDATE certificates SET status = 'Rejected' Where id = '$id' ";
$result = $conn->query($update);

header('location: ../requirements.php');