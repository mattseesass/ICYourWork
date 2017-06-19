<?php
session_destroy();
session_start();
unset($_SESSION['first']);
unset($_SESSION['Name']);
unset($_SESSION['uid']);
$_SESSION['message'] = "You have been logged out";
header("Location: ../home.php");
?>