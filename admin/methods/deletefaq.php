<?php
include '../connection.php';
$id = mysqli_real_escape_string($conn, $_POST['id']);

$query = "DELETE FROM faq WHERE id = '$id'";
$result = $conn->query($query);

header('location: ../faq.php');

?>