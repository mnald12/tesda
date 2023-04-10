<?php

include '../connection.php';

$qst = mysqli_real_escape_string($conn, $_POST['qst']);
$ans = mysqli_real_escape_string($conn, $_POST['ans']);
$insert="INSERT Into faq (question, answer) VALUES ('$qst', '$ans')";
$res=mysqli_query($conn, $insert);

header('location: ../faq.php');

?>