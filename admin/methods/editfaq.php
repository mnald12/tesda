<?php

include '../connection.php';

$id = mysqli_real_escape_string($conn, $_POST['id']);
$qst = mysqli_real_escape_string($conn, $_POST['qst']);
$ans = mysqli_real_escape_string($conn, $_POST['ans']);

$query = "SELECT * FROM faq where id = '$id' ";
$result = $conn->query($query);
$faq = $result->fetch_assoc();

if($qst !== $faq['question']){
    $update = "UPDATE faq SET question = '$qst' where id = '$id' ";
    $result = $conn->query($update);
}

if($ans !== $faq['answer']){
    $update = "UPDATE faq SET answer = '$ans' where id = '$id' ";
    $result = $conn->query($update);
}

header('location: ../faq.php');

?>