<?php
include '../connection.php';
$id = mysqli_real_escape_string($conn, $_POST['id']);

$query = "DELETE FROM assessment_centers WHERE id = '$id'";
$result = $conn->query($query);

header('location: ../assessment.php');

?>