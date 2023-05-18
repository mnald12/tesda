<?php

include '../connection.php';

$id = mysqli_real_escape_string($conn, $_POST['id']);
$uname = mysqli_real_escape_string($conn, $_POST['uname']);
$tc = mysqli_real_escape_string($conn, $_POST['tc']);
$desc = mysqli_real_escape_string($conn, $_POST['desc']);
$qualifications = mysqli_real_escape_string($conn, $_POST['qualifications']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$number = mysqli_real_escape_string($conn, $_POST['number']);
$facebook = mysqli_real_escape_string($conn, $_POST['facebook']);

$query = "SELECT * FROM training_centers";
$result = $conn->query($query);
$training = $result->fetch_assoc();

if($_FILES["logo"]['name'] !== ""){

    $extension=array("jpeg","jpg","png","gif","jfif");
    $file_name=$_FILES["logo"]["name"];
    $file_tmp=$_FILES["logo"]["tmp_name"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(in_array($ext,$extension)) {
        if(!file_exists("../../images/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["logo"]["tmp_name"],"../../images/".$file_name);
            $update = "UPDATE training_centers SET avatar = '$file_name' Where id = '$id' ";
            $result = $conn->query($update);
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["logo"]["tmp_name"],"../../images/".$newFileName);
            $update = "UPDATE training_centers SET avatar = '$newFileName' Where id = '$id' ";
            $result = $conn->query($update);
        }
    }

}

if($_FILES["bgd"]['name'] !== ""){

    $extension=array("jpeg","jpg","png","gif","jfif");
    $file_name=$_FILES["bgd"]["name"];
    $file_tmp=$_FILES["bgd"]["tmp_name"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(in_array($ext,$extension)) {
        if(!file_exists("../../images/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["bgd"]["tmp_name"],"../../images/".$file_name);
            $update = "UPDATE training_centers SET background = '$file_name' Where id = '$id' ";
            $result = $conn->query($update);
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["bgd"]["tmp_name"],"../../images/".$newFileName);
            $update = "UPDATE training_centers SET background = '$newFileName' Where id = '$id' ";
            $result = $conn->query($update);
        }
    }

}

if($uname !== $training['username']){
    $update = "UPDATE training_centers SET username = '$uname' Where id = '$id' ";
    $result = $conn->query($update);
}

if($tc !== $training['center']){
    $update = "UPDATE training_centers SET center = '$tc' Where id = '$id' ";
    $result = $conn->query($update);
}

if($desc !== $tabout['description']){
    $update = "UPDATE training_centers SET description = '$desc' Where id = '$id' ";
    $result = $conn->query($update);
}

if($qualifications !== $tabout['qualifications']){
    $update = "UPDATE training_centers SET qualifications = '$qualifications' Where id = '$id' ";
    $result = $conn->query($update);
}

if($address !== $tabout['address']){
    $update = "UPDATE training_centers SET address = '$address' Where id = '$id' ";
    $result = $conn->query($update);
}

if($email !== $tabout['email']){
    $update = "UPDATE training_centers SET email = '$email' Where id = '$id' ";
    $result = $conn->query($update);
}

if($number !== $training['contact_number']){
    $update = "UPDATE training_centers SET contact_number = '$number' Where id = '$id' ";
    $result = $conn->query($update);
}

if($facebook !== $training['facebook']){
    $update = "UPDATE training_centers SET facebook = '$facebook' Where id = '$id' ";
    $result = $conn->query($update);
}

header('location: ../info.php');

?>