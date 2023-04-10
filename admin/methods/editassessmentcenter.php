<?php

include '../connection.php';

$id = mysqli_real_escape_string($conn, $_POST['id']);
$center = mysqli_real_escape_string($conn, $_POST['center']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$number = mysqli_real_escape_string($conn, $_POST['number']);
$qualifications = mysqli_real_escape_string($conn, $_POST['qualifications']);

$query = "SELECT * FROM assessment_centers where id = '$id' ";
$result = $conn->query($query);
$ac = $result->fetch_assoc();

if($center !== $ac['center']){
    $update = "UPDATE assessment_centers SET center = '$center' where id = '$id' ";
    $result = $conn->query($update);
}

if($address !== $ac['address']){
    $update = "UPDATE assessment_centers SET address = '$address' where id = '$id' ";
    $result = $conn->query($update);
}

if($email !== $ac['email']){
    $update = "UPDATE assessment_centers SET email = '$email' where id = '$id' ";
    $result = $conn->query($update);
}

if($number !== $ac['contact_number']){
    $update = "UPDATE assessment_centers SET contact_number = '$number' where id = '$id' ";
    $result = $conn->query($update);
}

if($qualifications !== $ac['qualifications']){
    $update = "UPDATE assessment_centers SET qualifications = '$qualifications' where id = '$id' ";
    $result = $conn->query($update);
}

header('location: ../assessment.php');

?>