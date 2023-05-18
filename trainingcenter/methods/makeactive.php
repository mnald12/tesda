<?php

include '../connection.php';

$id = mysqli_real_escape_string($conn, $_POST['id']);

$update = "UPDATE announcements SET status = 'Active' where id = '$id' ";
$result = $conn->query($update);

header('location: ../archive.php');

?>