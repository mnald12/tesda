<?php
session_start();

unset($_SESSION['username']);
unset($_SESSION['role']);
$_SESSION['message'] = "You have been logged out!";
$_SESSION['success'] = 'danger';

session_destroy();

header('location: ../admin/index.php');

?>