<?php

include '../connection.php';

$id = mysqli_real_escape_string($conn, $_POST['id']);

$update = "UPDATE events SET status = 'Archived' where id = '$id' ";
$result = $conn->query($update);

header('location: ../events.php');

?>