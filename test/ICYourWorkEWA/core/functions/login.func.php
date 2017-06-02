<?php

session_start();

include '../database/connect.php';

$email = $_POST['email'];
$pwd = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' AND password='$pwd'";

$result = mysqli_query($conn, $sql);

if (!$row = mysqli_fetch_assoc($result)) {
	echo "Je gebruikersnaam of wachtwoord is incorrect";
} else {
	$_SESSION['email'] = $row['email'];
}

header ("Location: ../../index.php");