<?php
session_start();
require "dbh.inc.php";
$pw = $_POST['password'];
$email = $_POST['email'];
$pw = md5($pw);

$sql = "SELECT * FROM gebruiker WHERE password='$pw' AND email='$email'";
$result = $conn->query($sql);
if (!$row = $result->fetch_assoc()) {
$_SESSION['message'] = "Your E-mail/Password combination is invalid";
header("Location: ../home.php");
}else
{
	$_SESSION['Name'] = $row['voornaam']." ".$row['achternaam'];
	$_SESSION['First'] = $row['voornaam'];
	$_SESSION['email'] = $row['email'];
	$_SESSION['last'] = $row['achternaam'];
	$_SESSION['join'] = $row['join-date'];
	$_SESSION['admin'] = $row['voornaam'];
	$_SESSION['level'] = $row['Accountid'];
	$_SESSION['uid'] = $row['id'];
	header("Location: ../home.php");
}
?>