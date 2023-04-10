<?php

include '../connection.php';

$id = mysqli_real_escape_string($conn, $_POST['id']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$req = mysqli_real_escape_string($conn, $_POST['req']);

$query = "SELECT * FROM services where id = '$id' ";
$result = $conn->query($query);
$serv = $result->fetch_assoc();

if($title !== $serv['title']){
    $update = "UPDATE services SET title = '$title' where id = '$id' ";
    $result = $conn->query($update);
}

if($req !== $serv['requirements']){
    $update = "UPDATE services SET requirements = '$req' where id = '$id' ";
    $result = $conn->query($update);
}

header('location: ../services.php');

?>