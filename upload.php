<?php

include 'connection.php';

$ntoup = [];

$error=array();
$extension=array("jpeg","jpg","png","gif");
foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
    $file_name=$_FILES["files"]["name"][$key];
    $file_tmp=$_FILES["files"]["tmp_name"][$key];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);

    if(in_array($ext,$extension)) {
        if(!file_exists("uploads/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"uploads/".$file_name);
            array_push($ntoup, $file_name);
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"uploads/".$newFileName);
            array_push($ntoup, $newFileName);
        }
    }
    else {
        array_push($error,"$file_name, ");
    }
}

$imgs = implode(",",$ntoup);

$title = mysqli_real_escape_string($conn, $_POST['title']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$date = date("Y-m-d");
$status = 'Pending';

$insert="INSERT Into certificates (name, email, req_for, files, date, status) VALUES ('$name', '$email', '$title', '$imgs', '$date', '$status')";
$basicresult=mysqli_query($conn, $insert);

session_start();
$_SESSION['req_message'] = 'Your requirements has been uploaded. Thank you for using our service!';

header("Location: ./index.php#services");

?>