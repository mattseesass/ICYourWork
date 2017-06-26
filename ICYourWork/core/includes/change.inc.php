<?php
require "../database/connect.php";
session_start();
$first = $_POST['first'];
	$last = $_POST['last'];
	$email = $_POST['email'];
	$new_pw = $_POST['new_pw'];
	$old_pw = $_POST['password'];
	$id = $_SESSION['uid'];
if (empty($first)) {
	exit();
}
if (empty($last)) {
	exit();
}
if (empty($email)) {
	exit();
}

if (empty($old_pw)) {
	exit();
}
if (isset($_POST['save'])) {
	$old_pw = md5($old_pw);
$sql = "SELECT * FROM gebruiker WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if ($old_pw == $row['password']) {
	$pw = md5($new_pw);
	if (empty($new_pw)) {
}
else{
 $sql = "UPDATE gebruiker SET password='$pw' Where id='$id'";
	mysqli_query($conn, $sql);
	}
$sql = "UPDATE gebruiker SET voornaam='$first' WHERE id='$id'";
mysqli_query($conn, $sql);
$sql = "UPDATE gebruiker SET achternaam='$last' WHERE id='$id'";
mysqli_query($conn, $sql);
$sql = "UPDATE gebruiker SET email='$email' WHERE id='$id'";
mysqli_query($conn, $sql);
$_SESSION['message'] = "succesful changed user preferences";
header("Location: ../../profile.php");

$_SESSION['name'] = $first." ".$last;
$_SESSION['email'] = $email;
$_SESSION['first'] = $first;
$_SESSION['last'] = $last;

}
else{
	$_SESSION['message'] = "Wrong input given";
	header("Location: ../../profile.php");
}
}

?>