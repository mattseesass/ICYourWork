<?php

session_start();

include '../database/connect.php'; // connection with the database

	if (isset($_POST['register_btn'])) { 
		$firstname = mysql_real_escape_string($_POST['firstname']);
		$lastname = mysql_real_escape_string($_POST['lastname']);
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);
		$cpassword = mysql_real_escape_string($_POST['cpassword']);

		if ($password == $cpassword) 
			{
				$password = md5($password);
				$sql = "INSERT INTO users(user_firstname, user_lastname, user_email, user_password) VALUES('$firstname','$lastname', '$email', '$password')"; 
				mysqli_query($conn, $sql);
				$_SESSION['message'] = "You are now logged in";
				$_SESSION['name'] = $firstname." ".$lastname;		
				header("location: ../../home.php");
			}
	}

