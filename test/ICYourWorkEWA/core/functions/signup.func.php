<?php

session_start();

include '../database/connect.php'; // connection with the database

	if (isset($_POST['register_btn'])) { 
		$voornaam = mysql_real_escape_string($_POST['voornaam']);
		$achternaam = mysql_real_escape_string($_POST['achternaam']);
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);
		$password2 = mysql_real_escape_string($_POST['password2']);

		if (empty($voornaam)) {
			header("location: register.php");
					$_SESSION['message'] = "The passwords are incorrect";
					header("location: register.php");
		exit();
	}
		if (empty($achternaam)) {
			header("location: register.php");
					$_SESSION['message'] = "The passwords are incorrect";
		exit();
	}
		if (empty($email)) {
			header("location: register.php");
			$_SESSION['message'] = "The passwords are incorrect";
			exit();
		}
		if (empty($password)) {
		header("location: register.php");
		$_SESSION['message'] = "The passwords are incorrect";
		exit();
}
		if (empty($password2)) {
			
					$_SESSION['message'] = "The passwords are incorrect";
		exit();
	}
		
		else{
				if ($password == $password2) {
			$password = md5($password);
			$sql = "INSERT INTO gebruiker(voornaam, achternaam, email, password) VALUES('$voornaam','$achternaam', '$email', '$password')"; 
			mysqli_query($db, $sql);
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['name'] = $voornaam." ".$achternaam;		
			header("location: home.php");
		}
	}
}

