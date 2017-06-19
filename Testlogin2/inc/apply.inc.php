<?php
session_start();
require "dbh.inc.php";
if (isset($_POST['submit'])) {
	$uid = $_POST['id'];
	$vid = $_POST['vid'];
	$apid = $_SESSION['uid'];

	$sql = "SELECT * FROM gebruiker WHERE id='$apid'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$name = $row['voornaam']." ".$row['achternaam'];
	$email = $row['email'];
	echo $email;
	echo $name;
	echo "<form method='POST' action='applicant.inc.php'>
			<input type='hidden' name='vid' value='".$vid."'>
			<input type='hidden' name='apid' value='".$apid."'>
			<input type='hidden' name='uid' value='".$uid."'>	
			<textarea name='CV'></textarea>
			<input type='password' name='password'>
			<small> write your cv with a maximum of 1000 characters </small>
			<input type = 'submit' name='submit2' value='submit CV'>
			</form>";
}
