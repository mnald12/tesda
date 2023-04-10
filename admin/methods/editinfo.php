<?php

include '../connection.php';

$ititle = mysqli_real_escape_string($conn, $_POST['i-title']);
$desc = mysqli_real_escape_string($conn, $_POST['desc']);
$atitle = mysqli_real_escape_string($conn, $_POST['a-title']);
$text = mysqli_real_escape_string($conn, $_POST['text']);
$mission = mysqli_real_escape_string($conn, $_POST['mission']);
$vission = mysqli_real_escape_string($conn, $_POST['vission']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$number = mysqli_real_escape_string($conn, $_POST['number']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

$query = "SELECT * FROM tesda_info";
$result = $conn->query($query);
$tinfo = $result->fetch_assoc();

$query2 = "SELECT * FROM tesda_about";
$result2 = $conn->query($query2);
$tabout = $result2->fetch_assoc();

if($_FILES["h-image"] !== null){

    $extension=array("jpeg","jpg","png","gif","jfif");
    $file_name=$_FILES["h-image"]["name"];
    $file_tmp=$_FILES["h-image"]["tmp_name"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(in_array($ext,$extension)) {
        if(!file_exists("../../images/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["h-image"]["tmp_name"],"../../images/".$file_name);
            $update = "UPDATE tesda_info SET image = '$file_name' ";
            $result = $conn->query($update);
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["h-image"]["tmp_name"],"../../images/".$newFileName);
            $update = "UPDATE tesda_info SET image = '$newFileName' ";
            $result = $conn->query($update);
        }
    }

}

if($_FILES["a-image"] !== null){

    $extension=array("jpeg","jpg","png","gif","jfif");
    $file_name=$_FILES["a-image"]["name"];
    $file_tmp=$_FILES["a-image"]["tmp_name"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(in_array($ext,$extension)) {
        if(!file_exists("../../images/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["a-image"]["tmp_name"],"../../images/".$file_name);
            $update = "UPDATE tesda_about SET image = '$file_name' ";
            $result = $conn->query($update);
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["a-image"]["tmp_name"],"../../images/".$newFileName);
            $update = "UPDATE tesda_about SET image = '$newFileName' ";
            $result = $conn->query($update);
        }
    }

}

if($ititle !== $tinfo['title']){
    $update = "UPDATE tesda_info SET title = '$ititle' ";
    $result = $conn->query($update);
}

if($desc !== $tinfo['description']){
    $update = "UPDATE tesda_info SET description = '$desc' ";
    $result = $conn->query($update);
}

if($atitle !== $tabout['title']){
    $update = "UPDATE tesda_about SET title = '$atitle' ";
    $result = $conn->query($update);
}

if($text !== $tabout['about_text']){
    $update = "UPDATE tesda_about SET about_text = '$text' ";
    $result = $conn->query($update);
}

if($mission !== $tabout['mission']){
    $update = "UPDATE tesda_about SET mission = '$mission' ";
    $result = $conn->query($update);
}

if($vission !== $tabout['vission']){
    $update = "UPDATE tesda_about SET vission = '$vission' ";
    $result = $conn->query($update);
}

if($address !== $tinfo['address']){
    $update = "UPDATE tesda_info SET address = '$address' ";
    $result = $conn->query($update);
}

if($number !== $tinfo['number']){
    $update = "UPDATE tesda_info SET number = '$number' ";
    $result = $conn->query($update);
}

if($email !== $tinfo['email']){
    $update = "UPDATE tesda_info SET email = '$email' ";
    $result = $conn->query($update);
}

header('location: ../info.php');

?>