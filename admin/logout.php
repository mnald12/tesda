<?php
session_start();

unset($_SESSION['id']);
unset($_SESSION['username']);
session_destroy();

session_start();

$_SESSION['message'] = "You have been logged out!";
$_SESSION['success'] = 'danger';

header('location: ../admin/index.php');

?>