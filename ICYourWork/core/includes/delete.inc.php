<?php
session_start();
require_once "../database/connect.php";
$sessid = $_SESSION['uid'];

$filename = "../Uploads/profile".$sessid."*";
$fileinfo = glob($filename);
$fileext = explode(".", $fileinfo[0]);
$fileactualext = $fileext[1];
print_r($fileactualext);
$file = "../img/Uploads/profile".$sessid.".jpg";
if (!unlink($file)) {
	echo "File was not deleted!";
}else {
	echo "File was deleted";
}

$sql = "UPDATE profileimg SET status=1 WHERE userid='$sessid'";
mysqli_query($conn, $sql);
 header("Location: ../../profile.php");
?>