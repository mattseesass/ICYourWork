<?php
session_start();
require "dbh.inc.php";
if (isset($_POST['btn_submit'])) {
	$title = $_POST['title'];
	$comment = $_POST['comment'];
	$required = $_POST['requirement'];
	$id = $_SESSION['uid'];
	echo $id;
	echo "<br>";
	echo $title;
	echo "<br>";
	echo $comment;
	echo "<br>";
	echo $required;
	$sql = "INSERT INTO vacatures(Name, Comment, Requirement,picture, uid) VALUES('$title','$comment','$required','default.png','$id')";
	mysqli_query($conn, $sql);
	header("Location: ../vacature.php");
}
?>