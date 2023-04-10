<?php

include '../connection.php';

$id = mysqli_real_escape_string($conn, $_POST['id']);
$center = mysqli_real_escape_string($conn, $_POST['center']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$number = mysqli_real_escape_string($conn, $_POST['number']);
$qualifications = mysqli_real_escape_string($conn, $_POST['qualifications']);

$query = "SELECT * FROM training_centers where id = '$id' ";
$result = $conn->query($query);
$tc = $result->fetch_assoc();

if($center !== $tc['center']){
    $update = "UPDATE training_centers SET center = '$center' where id = '$id' ";
    $result = $conn->query($update);
}

if($address !== $tc['address']){
    $update = "UPDATE training_centers SET address = '$address' where id = '$id' ";
    $result = $conn->query($update);
}

if($email !== $tc['email']){
    $update = "UPDATE training_centers SET email = '$email' where id = '$id' ";
    $result = $conn->query($update);
}

if($number !== $tc['contact_number']){
    $update = "UPDATE training_centers SET contact_number = '$number' where id = '$id' ";
    $result = $conn->query($update);
}

if($qualifications !== $tc['qualifications']){
    $update = "UPDATE training_centers SET qualifications = '$qualifications' where id = '$id' ";
    $result = $conn->query($update);
}

header('location: ../training.php');

?>