<?php
session_start();
require "dbh.inc.php";
if (isset($_POST['btn_submit'])) {
$title = $_POST['title'];
	$comment = $_POST['comment'];
	$required = $_POST['requirement'];
	$id = $_SESSION['uid'];	
	$sel = $_POST['sel'];
	if (empty($title)) {
		header("Location: ../home.php");
		$_SESSION['message'] = "Vacature was not send because some parts were not chosen";
	}
	if (empty($comment)) {
		header("Location: ../home.php");
		$_SESSION['message'] = "Vacature was not send because some parts were not chosen";
	}
	if (empty($required)) {
		header("Location: ../home.php");
		$_SESSION['message'] = "Vacature was not send because some parts were not chosen";
	}
	if (empty($id)) {
		header("Location: ../home.php");
		$_SESSION['message'] = "Vacature was not send because some parts were not chosen";
	}
	else
	{
	echo $id;
	echo "<br>";
	echo $title;
	echo "<br>";
	echo $comment;
	echo "<br>";
	echo $required;
	switch ($sel) {
		case 0:
			$_SESSION['message'] = "No sector was chosen";
			header("Location: ../home.php");
			break;
		case 1:
		$sql = "INSERT INTO vacatures(Name, Comment, Requirement,picture, uid, Category) VALUES('$title','$comment','$required','default.png','$id','$sel')";
		echo $sql;
			mysqli_query($conn, $sql);
			header("Location: ../vacature.php");
			break;
			case 2:
		$sql = "INSERT INTO vacatures(Name, Comment, Requirement,picture, uid, Category) VALUES('$title','$comment','$required','default.png','$id','$sel')";	
		echo $sql;		
			mysqli_query($conn, $sql);
			header("Location: ../vacature.php");
			break;
			case 3:
		$sql = "INSERT INTO vacatures(Name, Comment, Requirement,picture, uid, Category) VALUES('$title','$comment','$required','default.png','$id','$sel')";	
		echo $sql;		
			mysqli_query($conn, $sql);
			header("Location: ../vacature.php");
			break;
			case 4:
		$sql = "INSERT INTO vacatures(Name, Comment, Requirement,picture, uid, Category) VALUES('$title','$comment','$required','default.png','$id','$sel')";	
		echo $sql;
			mysqli_query($conn, $sql);
			header("Location: ../vacature.php");
			break;
	}
	

}
}
?>