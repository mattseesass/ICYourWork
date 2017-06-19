<?php
session_start();
	require "dbh.inc.php";
$name = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
if (empty($name)) {
	exit();
	header("Location: more_reg.php");
}
if (empty($last)) {
	exit();
	header("Location: more_reg.php");
}
if (empty($email)) {
	exit();
	header("Location: more_reg.php");
}
if (empty($password)) {
	exit();
	header("Location: more_reg.php");
}
if (empty($password2)) {
	exit();
	header("Location: more_reg.php");
}
else
{
	if ($password == $password2) {
		$password = md5($password);
		$db = mysqli_connect("localhost","root","","icyourwork");
		$sql = "INSERT INTO gebruiker(voornaam, achternaam, email, password, Accountid) VALUES('$name','$last','$email','$password','1')";
		mysqli_query($conn, $sql);

		$pw = $password;
		$email = $email;
		$sql = "SELECT * FROM gebruiker WHERE password='$pw' AND email='$email'";
	$result = $conn->query($sql);
	if (!$row = $result->fetch_assoc()) {
	$_SESSION['message'] = "Your E-mail/Password combination is invalid";
	header("Location: ../more_reg.php");
	}
	else
	{
		$userid = $row['id'];
		$sql = "INSERT INTO profileimg(userid, status) VALUES('$userid','1')";
		mysqli_query($conn, $sql);
	$_SESSION['uid'] = $row['id'];
	$_SESSION['Name'] = $row['voornaam']." ".$row['achternaam'];
	$_SESSION['join'] = $row['join-date'];
	$_SESSION['admin'] = $row['voornaam'];
	$_SESSION['level'] = $row['Accountid'];
	$_SESSION['uid'] = $row['id'];
	$_SESSION['email'] = $email;
	mail($email , "Thank you for joining ICYourWork.com", "More information can be found on ICYourWork.com/about.php", "From: Remcovanderlinden55@outlook.com");
	header("Location: ../home.php");
	}
	header("Location: ../home.php");
	}

}

?>