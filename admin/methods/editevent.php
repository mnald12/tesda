<?php

include '../connection.php';

$id = mysqli_real_escape_string($conn, $_POST['id']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$contents = mysqli_real_escape_string($conn, $_POST['contents']);

$query = "SELECT * FROM events where id = '$id' ";
$result = $conn->query($query);
$evs = $result->fetch_assoc();

if($_FILES["e-image"] !== null){

    $extension=array("jpeg","jpg","png","gif","jfif");
    $file_name=$_FILES["e-image"]["name"];
    $file_tmp=$_FILES["e-image"]["tmp_name"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(in_array($ext,$extension)) {
        if(!file_exists("../../images/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["e-image"]["tmp_name"],"../../images/".$file_name);
            $update = "UPDATE events SET image = '$file_name' where id = '$id' ";
            $result = $conn->query($update);
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["e-image"]["tmp_name"],"../../images/".$newFileName);
            $update = "UPDATE events SET image = '$newFileName' where id = '$id' ";
            $result = $conn->query($update);
        }
    }

}

if($title !== $evs['title']){
    $update = "UPDATE events SET title = '$title' where id = '$id' ";
    $result = $conn->query($update);
}

if($contents !== $evs['contents']){
    $update = "UPDATE events SET contents = '$contents' where id = '$id' ";
    $result = $conn->query($update);
}

header('location: ../events.php');

?>