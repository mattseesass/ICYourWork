<?php

include '../includes/sessionstart.inc.php'; // starts the session

include '../database/connect.php'; // connection with the database

	if (isset($_POST['login_btn'])) {
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['lpassword']);

		$password = md5($password); // this is to encrypt password from db and use it
		$sql = "SELECT * FROM users WHERE user_email ='$email' AND user_password ='$password'";
		$result = mysqli_query($conn, $sql);
		
		if (!$row = $result->fetch_assoc()) {
			$_SESSION['message'] = "Your username or password is incorrect";
			header("location: ../../login.php");
		}
		else
		{
			$_SESSION['name'] = $row['voornaam']." ".$row['achternaam'];
			$_SESSION['id'] = $row['achternaam'];
			$_SESSION['timestamp'] = $row['join-date'];
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['email'] = $email;
			$_SESSION['voornaam'] = $voornaam;		
			$_SESSION['achternaam'] =  $achternaam;
			header("location: ../../entry.php");
		}
	}

?>