<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../mailer/vendor/phpmailer/src/Exception.php';
require '../mailer/vendor/phpmailer/src/PHPMailer.php';
require '../mailer/vendor/phpmailer/src/SMTP.php';

$mail = new PHPMailer();

$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'sicadmark12@gmail.com';
$mail->Password   = 'jmthhqqxzqqjfmrl';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port       = 465;

//Recipients
$mail->setFrom('sicadmark12@gmail.com', 'Mailer');
$mail->addAddress('markronaldsicad@gmail.com', 'Joe User');

//Content
$mail->isHTML(true);
$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();

//header to viewer.php