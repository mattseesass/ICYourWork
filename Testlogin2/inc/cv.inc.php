<?php
require "dbh.inc.php";
session_start();
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	echo $_GET['uid'];
	$uid = $_GET['uid'];
	$aid= $_GET['aid'];
	if($id == 1) {
		$sql = "SELECT * FROM applicants WHERE id='$aid'";
		$result = mysqli_query($conn, $sql);

		if(!$row = mysqli_num_rows($result) > 0)
		{
			$_SESSION['message'] = "User was not found in our database and the user comments are deleted";
			header("Location: ../home.php");
		}
		else
		{
				$email	= $row['email'];
				  mail($email, "Good News!", "Your CV has been accepted by the company and contact between you and the company should be taken soon use write to this e-mail to create contact with the company: ".$_SESSION['email']."", "From: no-reply@ICYourWork.com");
				 $sql = "DELETE FROM applicants WHERE id='$aid' AND  apid='$uid'";
				 mysqli_query($conn, $sql);
				  $_SESSION['message'] = "Succesfully completed the process";
				 header("Location: ../home.php");
		}
	

	}
	else
	{
		$sql = "SELECT * FROM applicants WHERE id='$aid'";
		$result = mysqli_query($conn, $sql);
		if (!$row = mysqli_num_rows($result) > 0) {
			$_SESSION['message'] = "User was not found in our database and the user comments have been deleted";
			header("Location: ../home.php");

		}
		else{
			echo $row['email'];
		 	mail($row['email'], "Cv has been declined", "The company did not agree with your CV and has been declined", "From: no-reply@ICYourWork.com");
			$_SESSION['message'] = "Succesfully completed the process";
	  $sql = "DELETE FROM applicants WHERE id='$aid' AND  apid='$uid'";
      $_SESSION['message'] = "Succesfully completed the process";
	  mysqli_query($conn, $sql);
	  header("Location: ../home.php");
	}
	}
}



?>