<?php
include '../connection.php';
$id = mysqli_real_escape_string($conn, $_POST['id']);

$query = "DELETE FROM certificates WHERE id = '$id'";
$result = $conn->query($query);

header('location: ../requirements.php');

?>