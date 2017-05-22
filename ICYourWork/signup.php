<?php

	session_start();

	// Include the database connection
	include 'core/database/connect.php';

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "INSERT INTO users (first_name, last_name, email, password) 
	VALUES ('$firstname', '$lastname', '$email', '$password')";

	$result = mysqli_query($conn, $sql);

	// header("Location: welcome.php");
?>