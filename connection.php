<?php
    $database = 'tesda';
    $username = 'root';
    $host = 'localhost';
    $password = '';
    $conn = new mysqli($host, $username, $password, $database);
    if($conn->connect_error){
        die("Connection Failed: ". $conn->connect_error());
    }
?>