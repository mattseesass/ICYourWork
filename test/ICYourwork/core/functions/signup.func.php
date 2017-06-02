<?php

session_start();

include '../database/connect.php'; // connection with the database

	if (isset($_POST['register_btn'])) { 
		$firstname = mysql_real_escape_string($_POST['firstname']);
		$lastname = mysql_real_escape_string($_POST['lastname']);
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);
		$password2 = mysql_real_escape_string($_POST['password2']);

		if (empty($firstname)) {
			header("location: ../../index.php#0");
			$_SESSION['message'] = "The passwords are incorrect";
		exit();
		}

		if (empty($lastname)) {
			header("location: ../../index.php#0");
			$_SESSION['message'] = "The passwords are incorrect";
			exit();
		}

		if (empty($email)) {
			header("location: ../../index.php#0");
			$_SESSION['message'] = "The passwords are incorrect";
			exit();
		}

		if (empty($password)) {
			header("location: ../../index.php#0");
			$_SESSION['message'] = "The passwords are incorrect";
			exit();
		}

		if (empty($password2)) {
			header("location: ../../index.php#0");
			$_SESSION['message'] = "The passwords are incorrect";
			exit();
		}
		
		else {
			if ($password == $password2) 
				{
					$password = md5($password);
					$sql = "INSERT INTO users(first_name, last_name, email, password) VALUES('$firstname','$lastname', '$email', '$password')"; 
					mysqli_query($conn, $sql);
					$_SESSION['message'] = "You are now logged in";
					$_SESSION['name'] = $firstname." ".$lastname;		
					header("location: ../../index.php");
				}
	}
}

