<?php
session_start();
$Company = $_POST['Company'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
if (empty($Company)) {
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
$db = mysqli_connect("localhost","root", "", "icyourwork");
$sql = "INSERT INTO company(name, email, password,Userlevel) VALUES('$Company','$email','$password','1')";
mysqli_query($db, $sql);

}
}
?>