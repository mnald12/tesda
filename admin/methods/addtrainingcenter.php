<?php

include '../connection.php';

$uname = mysqli_real_escape_string($conn, $_POST['uname']);
$pwd = sha1(mysqli_real_escape_string($conn, $_POST['pwd']));
$center = mysqli_real_escape_string($conn, $_POST['center']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$number = mysqli_real_escape_string($conn, $_POST['number']);
$facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
$qualifications = mysqli_real_escape_string($conn, $_POST['qualifications']);

$insert="INSERT Into training_centers (username, password, center, address, email, contact_number, facebok, avatar, background, qualifications) VALUES ('$center', '$address', '$email', '$number', '', 'profile.png', 'center.jpg', '$qualifications')";
$res=mysqli_query($conn, $insert);

header('location: ../training.php');

?>