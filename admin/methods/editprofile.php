<?php

include '../connection.php';

$name = mysqli_real_escape_string($conn, $_POST['fullName']);
$pos = mysqli_real_escape_string($conn, $_POST['position']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$number = mysqli_real_escape_string($conn, $_POST['phone']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

$uquery = "SELECT * FROM user";
$uresult = $conn->query($uquery);
$uinfo = $uresult->fetch_assoc();

if($_FILES["profileImage"] !== null){

    $extension=array("jpeg","jpg","png","gif","jfif");
    $file_name=$_FILES["profileImage"]["name"];
    $file_tmp=$_FILES["profileImage"]["tmp_name"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(in_array($ext,$extension)) {
        if(!file_exists("../../images/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["profileImage"]["tmp_name"],"../../images/".$file_name);
            $update = "UPDATE user SET avatar = '$file_name' ";
            $result = $conn->query($update);
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["profileImage"]["tmp_name"],"../../images/".$newFileName);
            $update = "UPDATE user SET avatar = '$newFileName' ";
            $result = $conn->query($update);
        }
    }

}

if($name !== $uinfo['name']){
    $update = "UPDATE user SET name = '$name' ";
    $result = $conn->query($update);
}

if($pos !== $uinfo['position']){
    $update = "UPDATE user SET position = '$pos' ";
    $result = $conn->query($update);
}

if($address !== $uinfo['address']){
    $update = "UPDATE user SET address = '$address' ";
    $result = $conn->query($update);
}

if($number !== $uinfo['number']){
    $update = "UPDATE user SET number = '$number' ";
    $result = $conn->query($update);
}

if($email !== $uinfo['email']){
    $update = "UPDATE user SET email = '$email' ";
    $result = $conn->query($update);
}

header('location: ../profile.php');

?>