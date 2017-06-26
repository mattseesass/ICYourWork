<?php

include '../includes/sessionstart.inc.php'; // Starts the session

include '../database/connect.php'; // Connection with the database

	if (isset($_POST['login_btn'])) {
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['lpassword']);

		$password = md5($password); // this is to encrypt password from db and use it
		$sql = "SELECT * FROM gebruiker WHERE email ='$email' AND password ='$password'";
		$result = mysqli_query($conn, $sql);
		
		if (!$row = $result->fetch_assoc()) {
			$_SESSION['denied'] = "Your email or password is incorrect";
			header("location: ../../login.php");
		}
		else
		{
			$_SESSION['name'] = $row['voornaam']." ".$row['achternaam'];
			$_SESSION['uid'] = $row['id'];
			$_SESSION['timestamp'] = $row['join-date'];
			$_SESSION['succes'] = "You are now logged in";
			$_SESSION['email'] = $email;
			$_SESSION['first'] = $row['voornaam'];
			$_SESSION['last'] = $row['achternaam'];
			header("location: ../../profile.php");
		}
	}

?>