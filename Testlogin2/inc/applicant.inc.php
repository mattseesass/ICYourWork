<?php
session_start();
require "dbh.inc.php";
if (isset($_SESSION['Name'])) {
 if (isset($_POST['submit2'])) {
 	$uid = $_POST['uid'];
	$vid = $_POST['vid'];
	$apid = $_POST['apid'];
 	$cv = $_POST['CV'];
 	$password = $_POST['password'];
 	if (empty($apid)) {
 		exit();
 		$_SESSION['message'] = "Your account does not exist in our database, contact one of our employers or create an account";
 		header("Location: ../home.php");
 	}
 	if (empty($cv)) {
 		exit();
 		$_SESSION['message'] = "Your account does not exist in our database, contact one of our employers or create an account";
 		header("Location: ../home.php");
	}
 	if (empty($password)) {
		exit();
		$_SESSION['message'] = "Your account does not exist in our database, contact one of our employers or create an account";
 		header("Location: ../home.php");
 	}
 	else{
 	$sql = "SELECT * FROM gebruiker	WHERE id='$apid'";
 	$result = mysqli_query($conn, $sql);
 	if (!$row = mysqli_fetch_assoc($result)) {
 		$_SESSION['message'] = "Your account does not exist in our database, contact one of our employers or create an account";
 		header("Location: ../home.php");
		
 	}else 	{
 		$password = md5($password);
 		if ($password == $row['password']) {
 			$sql = "INSERT INTO applicants(uid,vid,apid,Name,CV,email) VALUES('$uid','$vid','$apid','".$_SESSION['Name']."','$cv','".$_SESSION['email']."')";
 			mysqli_query($conn, $sql);
 			echo $uid;
			echo "<hr>";
			echo $vid;
			echo "<hr>";
			echo $apid;
			echo "<hr>";
			$_SESSION['message'] = "The message has been sent to the employee, good luck!! :)";
			header("Location: ../home.php");
 		}else
 		{
 			$_SESSION['message'] = "CV has not been sent because wrong password was entered.";
 			header("Location = ../home.php");
 		}
 	}
 }

 }
}
else
{
	$_SESSION['message'] = "It appears you have not been logged in this is neccesary to create a cv";
	header("Location: ../home.php");
}
?>