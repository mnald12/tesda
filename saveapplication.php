<?php

include 'connection.php';

$tcid = mysqli_real_escape_string($conn, $_POST['tcid']);
$q = mysqli_real_escape_string($conn, $_POST['q']);
$ss = mysqli_real_escape_string($conn, $_POST['ss']);

$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
$middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
$street = mysqli_real_escape_string($conn, $_POST['street']);
$brgy = mysqli_real_escape_string($conn, $_POST['brgy']);
$district = mysqli_real_escape_string($conn, $_POST['district']);
$city = mysqli_real_escape_string($conn, $_POST['city']);
$province = mysqli_real_escape_string($conn, $_POST['province']);
$region = mysqli_real_escape_string($conn, $_POST['region']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$number = mysqli_real_escape_string($conn, $_POST['number']);
$nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
$sex = mysqli_real_escape_string($conn, $_POST['sex']);
$civil = mysqli_real_escape_string($conn, $_POST['civil']);
$employment_status = mysqli_real_escape_string($conn, $_POST['employment_status']);
$month_of_birth = mysqli_real_escape_string($conn, $_POST['month_of_birth']);
$day_of_birth = mysqli_real_escape_string($conn, $_POST['day_of_birth']);
$year_of_birth = mysqli_real_escape_string($conn, $_POST['year_of_birth']);
$age = mysqli_real_escape_string($conn, $_POST['age']);
$bplace_city = mysqli_real_escape_string($conn, $_POST['bplace_city']);
$bplace_province = mysqli_real_escape_string($conn, $_POST['bplace_province']);
$bplace_region = mysqli_real_escape_string($conn, $_POST['bplace_region']);
$attainment = mysqli_real_escape_string($conn, $_POST['attainment']);
$parent_name = mysqli_real_escape_string($conn, $_POST['parent_name']);
$parent_address = mysqli_real_escape_string($conn, $_POST['parent_address']);
$classification = mysqli_real_escape_string($conn, $_POST['classification']);
$date = date("F d, Y");
$insert="INSERT Into applications (tcid, qualification, last_name, first_name, middle_name, street, barangay, district, city, province, region, email, contact_number, nationality, sex, civil_status, employment_status, month_of_birth, day_of_birth, year_of_birth, age, birthplace_city, birthplace_province, birthplace_region, educational_attainment, parent_name, parent_address, classification, scholar_type, date, status)
VALUES ('$tcid', '$q', '$last_name', '$first_name', '$middle_name', '$street', '$brgy', '$district', '$city', '$province', '$region', '$email', '$number', '$nationality', '$sex', '$civil', '$employment_status', '$month_of_birth', '$day_of_birth', '$year_of_birth', '$age', '$bplace_city', '$bplace_province', '$bplace_region', '$attainment', '$parent_name', '$parent_address', '$classification', '$ss', '$date', 'Pending')";
$res=mysqli_query($conn, $insert);

session_start();
$_SESSION['app-message'] = 'Your application has been sent. Thank you!';

header("location: registration.php?tcid=$tcid&q=$q&ss=$ss");

?>
