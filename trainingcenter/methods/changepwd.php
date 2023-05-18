<?php

include '../connection.php';

$id = mysqli_real_escape_string($conn, $_POST['id']);
$opwd = sha1($conn->real_escape_string($_POST['opwd']));
$npwd = sha1($conn->real_escape_string($_POST['npwd']));

$uquery = "SELECT * FROM training_centers where id = '$id' ";
$uresult = $conn->query($uquery);
$uinfo = $uresult->fetch_assoc();

if($opwd === $uinfo['password']){

    $center = $uinfo['center'];

    if($npwd !== $uinfo['password']){
        $update = "UPDATE training_centers SET password = '$npwd' where id = '$id' ";
        $result = $conn->query($update);
        session_start();
        $_SESSION['change-messages'] = "password for $center successfully changed!";
        header('location: ../changepassword.php');
    }
    else{
        session_start();
        $_SESSION['change-messages'] = 'no changes!';
        header('location: ../changepassword.php');
    }
}
else{
    session_start();
    $_SESSION['change-messages'] = 'wrong password!';
    header('location: ../changepassword.php');
}

?>