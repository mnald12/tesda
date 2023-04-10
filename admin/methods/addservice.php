<?php

include '../connection.php';

$title = mysqli_real_escape_string($conn, $_POST['title']);
$req = mysqli_real_escape_string($conn, $_POST['req']);
$insert="INSERT Into services (title, requirements) VALUES ('$title', '$req')";
$res=mysqli_query($conn, $insert);

header('location: ../services.php');

?>