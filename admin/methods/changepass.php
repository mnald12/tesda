<?php

include '../connection.php';

$uname = mysqli_real_escape_string($conn, $_POST['uname']);
$pwd = sha1($conn->real_escape_string($_POST['pwd']));
$npwd = sha1($conn->real_escape_string($_POST['npwd']));

$uquery = "SELECT * FROM user";
$uresult = $conn->query($uquery);
$uinfo = $uresult->fetch_assoc();

if($pwd === $uinfo['password']){

    $uhaschanged = false;
    $pwdhaschanged = false;

    if($uname !== $uinfo['username']){
        $update = "UPDATE user SET username = '$uname' ";
        $result = $conn->query($update);
        $uhaschanged = true;
    }
    
    if($npwd !== $uinfo['password']){
        $update = "UPDATE user SET password = '$npwd' ";
        $result = $conn->query($update);
        $pwdhaschanged = true;
    }

    if($uhaschanged === true && $pwdhaschanged === true){
        session_start();
        $_SESSION['message'] = 'username & password successfully changed!';
        header('location: ../profile.php');
    }
    else if($uhaschanged === true && $pwdhaschanged === false){
        session_start();
        $_SESSION['message'] = 'username successfully changed!';
        header('location: ../profile.php');
    }
    else if($uhaschanged === false && $pwdhaschanged === true){
        session_start();
        $_SESSION['message'] = 'password successfully changed!';

        header('location: ../profile.php');
    }
    else{
        session_start();
        $_SESSION['message'] = 'no changes!';

        header('location: ../profile.php');
    }

}

else{
    session_start();
    $_SESSION['message'] = 'wrong password!';
    header('location: ../profile.php');
}

?>