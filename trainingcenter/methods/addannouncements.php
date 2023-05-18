<?php

include '../connection.php';

$tcid = mysqli_real_escape_string($conn, $_POST['tcid']);
$tc = mysqli_real_escape_string($conn, $_POST['tc']);
$avatar = mysqli_real_escape_string($conn, $_POST['avatar']);
$qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
$scholarship = mysqli_real_escape_string($conn, $_POST['scholarship']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$date = date("F d, Y");
if($_FILES['file']['name'] == ""){
    $insert="INSERT Into announcements (tcid, qualification, scholarship, training_center, avatar, description, image, date, status) VALUES ('$tcid', '$qualification', '$scholarship', '$tc', '$avatar', '$description', '', '$date', 'Active')";
    $res=mysqli_query($conn, $insert);
}
else{
    $extension=array("jpeg","jpg","png","gif","jfif");
    $file_name=$_FILES["file"]["name"];
    $file_tmp=$_FILES["file"]["tmp_name"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);

    if(in_array($ext,$extension)) {
        if(!file_exists("../../images/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["file"]["tmp_name"],"../../images/".$file_name);
            $insert="INSERT Into announcements (tcid, qualification, scholarship, training_center, avatar, description, image, date, status) VALUES ('$tcid', '$qualification', '$scholarship', '$tc', '$avatar', '$description', '$file_name', '$date', 'Active')";
            $res=mysqli_query($conn, $insert);
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["file"]["tmp_name"],"../../images/".$newFileName);
            $insert="INSERT Into announcements (tcid, qualification, scholarship, training_center, avatar, description, image, date, status) VALUES ('$tcid', '$qualification', '$scholarship', '$tc', '$avatar', '$description', '$newFileName', '$date', 'Active')";
            $res=mysqli_query($conn, $insert);
        }
    }
}

header('location: ../newannouncements.php');

?>