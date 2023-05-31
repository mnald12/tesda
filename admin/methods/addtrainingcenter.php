<?php

include '../connection.php';

$uname = mysqli_real_escape_string($conn, $_POST['uname']);
$pwd = sha1(mysqli_real_escape_string($conn, $_POST['pwd']));
$center = mysqli_real_escape_string($conn, $_POST['center']);
$desc = 'We are here to empower, make people and communities productive through excellent training programs and services.';
$address = mysqli_real_escape_string($conn, $_POST['address']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$number = mysqli_real_escape_string($conn, $_POST['number']);
$facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
$qualifications = mysqli_real_escape_string($conn, $_POST['qualifications']);

$insert="INSERT Into training_centers (username, password, center, description, address, email, contact_number, facebook, avatar, background, qualifications) VALUES ('$uname', '$pwd', '$center', '$desc', '$address', '$email', '$number', '$facebook', 'logo.png', 'center.jpg', '$qualifications')";
$res=mysqli_query($conn, $insert);

header('location: ../training.php');

?>