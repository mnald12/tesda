<?php
session_start();

unset($_SESSION['tcid']);
unset($_SESSION['tusername']);

session_start();

$_SESSION['tmessage'] = "You have been logged out!";
$_SESSION['tsuccess'] = 'danger';

header('location: ../trainingcenter/index.php');

?>