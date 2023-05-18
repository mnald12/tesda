<?php

include '../connection.php';

$id = mysqli_real_escape_string($conn, $_POST['id']);
$description = mysqli_real_escape_string($conn, $_POST['description']);

$query = "SELECT * FROM announcements where id = '$id' ";
$result = $conn->query($query);
$announcements = $result->fetch_assoc();

if($_FILES["image"] !== null){

    $extension=array("jpeg","jpg","png","gif","jfif");
    $file_name=$_FILES["image"]["name"];
    $file_tmp=$_FILES["image"]["tmp_name"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(in_array($ext,$extension)) {
        if(!file_exists("../../images/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["image"]["tmp_name"],"../../images/".$file_name);
            $update = "UPDATE announcements SET image = '$file_name' where id = '$id' ";
            $result = $conn->query($update);
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["image"]["tmp_name"],"../../images/".$newFileName);
            $update = "UPDATE announcements SET image = '$newFileName' where id = '$id' ";
            $result = $conn->query($update);
        }
    }

}

if($description !== $announcements['description']){
    $update = "UPDATE announcements SET description = '$description' where id = '$id' ";
    $result = $conn->query($update);
}

header('location: ../announcements.php');

?>