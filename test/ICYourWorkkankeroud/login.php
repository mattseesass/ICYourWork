<?php
	
	session_start();

	// Include the database connection
	include 'core/database/connect.php';

	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

	$result = mysqli_query($conn, $sql);

	if (!$row = mysqli_fetch_assoc($result)) {
		echo "Your username or password is incorrect!";
	} else {
		$_SESSION['id'] = $row['id'];
	}

	header("Location: welcome.php");
?>