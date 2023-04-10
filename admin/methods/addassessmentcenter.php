<?php

include '../connection.php';

$center = mysqli_real_escape_string($conn, $_POST['center']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$number = mysqli_real_escape_string($conn, $_POST['number']);
$qualifications = mysqli_real_escape_string($conn, $_POST['qualifications']);

$insert="INSERT Into assessment_centers (center, address, email, contact_number, qualifications) VALUES ('$center', '$address', '$email', '$number', '$qualifications')";
$res=mysqli_query($conn, $insert);

header('location: ../assessment.php');

?>