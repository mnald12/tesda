<?php

include 'connection.php';

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$message = mysqli_real_escape_string($conn, $_POST['msg']);
$date = date("F d, Y");
$insert="INSERT Into messages (name, email, message, date) VALUES ('$name', '$email', '$message', '$date')";
$res=mysqli_query($conn, $insert);

session_start();
$_SESSION['sentMessage'] = 'Your message has been sent. Thank you!';

header('location: contacts.php#contact');

?>
