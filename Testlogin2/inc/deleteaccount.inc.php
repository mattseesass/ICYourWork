	<?php
	require "dbh.inc.php";
	session_start();
		 if (isset($_POST['submit'])) 
	{
	$password = $_POST['password'];
	echo $password;
	if (isset($_SESSION['uid'])) {
			$id = $_SESSION['uid'];
	}
	else
	{
		header("Location: ../home.php");
	}

	echo "<br>";
	echo $id;

	$sql = "SELECT * FROM gebruiker WHERE id='$id'";

	$result = mysqli_query($conn, $sql);
	if (!$row = mysqli_fetch_assoc($result)) {
	}
	else
	{
		$password = md5($password);
		if ($password == $row['password']) {
			$sql = "DELETE FROM gebruiker WHERE id='$id'";
			mysqli_query($conn, $sql);
			$sessid = $_SESSION['uid'];
			$filename = "../Uploads/profile".$sessid."*";
			$fileinfo = glob($filename);
			$fileext = explode(".", $fileinfo[0]);
			$fileactualext = $fileext[1];
			$file = "../Uploads/profile".$sessid.".jpg";
			if (!unlink($file)) {
			echo "File was not deleted!";
			}else {
			echo "File was deleted";
			}
			$sql = "DELETE FROM profileimg WHERE userid='$id'";
			mysqli_query($conn, $sql);
			$sql = "DELETE FROM vacatures WHERE uid='$id'";
			mysqli_query($conn, $sql);
			unset($_SESSION['uid']);
			unset($_SESSION['name']);
			$_SESSION['message'] = "Account succesful deleted, we hope you will return soon :P";
			 header("Location: logout.inc.php");
		}
		else
		{
			$_SESSION['message'] = "Password was incorrect and the account was not deleted";
			header("Location: ../home.php");
		}
	
	}
}
?>