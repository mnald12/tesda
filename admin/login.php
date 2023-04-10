<?php
    
    session_start();

	include '../connection.php';

	$username 	= $conn->real_escape_string($_POST['username']);
	$password	= sha1($conn->real_escape_string($_POST['password']));

		$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
		$result = $conn->query($query);
		
		if($result->num_rows){
            
			while ($row = $result->fetch_assoc()) {
				$_SESSION['id'] = $row['id'];
				$_SESSION['username'] = $row['username'];
			}

			$_SESSION['message'] = 'You have successfully logged in to Tesda Sorsogon Management System!';
			$_SESSION['success'] = 'success';

            header('location: ../admin/dashboard.php');

		}else{
			$_SESSION['message'] = 'Username or password is incorrect!';
			$_SESSION['success'] = 'danger';
            header('location: ../admin/index.php');
		}

?>