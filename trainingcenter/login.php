<?php
    
    session_start();

	include '../connection.php';

	$username 	= $conn->real_escape_string($_POST['username']);
	$password	= sha1($conn->real_escape_string($_POST['password']));
	
		$query = "SELECT * FROM training_centers WHERE username = '$username' AND password = '$password'";
		$result = $conn->query($query);
		
		if($result->num_rows){
            $row = $result->fetch_assoc();
			$_SESSION['tcid'] = $row['id'];
			$_SESSION['tcusername'] = $row['username'];
			
			$_SESSION['tmessage'] = 'You have successfully logged in to Tesda Sorsogon Management System!';
			$_SESSION['tsuccess'] = 'success';

            header('location: ../trainingcenter/dashboard.php');

		}else{
			$_SESSION['tmessage'] = 'Username or password is incorrect!';
			$_SESSION['tsuccess'] = 'danger';
            header('location: ../trainingcenter/index.php');
		}

?>