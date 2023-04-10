<?php

include '../connection.php';

$extension=array("jpeg","jpg","png","gif","jfif");
$file_name=$_FILES["file"]["name"];
$file_tmp=$_FILES["file"]["tmp_name"];
$ext=pathinfo($file_name,PATHINFO_EXTENSION);
if(in_array($ext,$extension)) {
    if(!file_exists("../../images/".$file_name)) {
        move_uploaded_file($file_tmp=$_FILES["file"]["tmp_name"],"../../images/".$file_name);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $contents = mysqli_real_escape_string($conn, $_POST['contents']);
        $insert="INSERT Into events (title, image, contents, status) VALUES ('$title', '$file_name', '$contents', 'Active')";
        $res=mysqli_query($conn, $insert);
    }
    else {
        $filename=basename($file_name,$ext);
        $newFileName=$filename.time().".".$ext;
        move_uploaded_file($file_tmp=$_FILES["file"]["tmp_name"],"../../images/".$newFileName);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $contents = mysqli_real_escape_string($conn, $_POST['contents']);
        $insert="INSERT Into events (title, image, contents, status) VALUES ('$title', '$newFileName', '$contents', 'Active')";
        $res=mysqli_query($conn, $insert);
    }
}

header('location: ../events.php');

?>