<?php
session_start();
require "inc/dbh.inc.php";
?>
<!DOCTYPE html>
	<html>
	<head>
<title></title>
</head>
<body>
<a href="home.php"> to profile page</a>
<br>
<br>
<br>
<br>
<?php
if(isset($_SESSION['uid']))
{
$sql = "SELECT * FROM gebruiker WHERE id !='".$_SESSION['uid']."'ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

foreach ($result as $key => $row) { 
echo "<div>";
$id = $row['id']; 
$sql = "SELECT * FROM profileimg WHERE userid='$id' AND status=0";
$result = mysqli_query($conn, $sql);

	if (!$row = mysqli_fetch_assoc($result)) 
	{
		echo "<img src='uploads/default.png' width='100' height='100' border='3'>";
	}
	else 
		{
			echo "<img src='uploads/profile".$row['userid'].".jpg' width='100' height='100' border='3'> <br>";
		}
		$sql = "SELECT * FROM gebruiker WHERE id='$id'";
		echo "<br>";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		echo $row['voornaam']." ".$row['achternaam'];
		echo "<br>";
		echo "<form method='POST' action='user-profile.php'>
			<input type='submit' name='submit' value='check profile'>
			<input type='hidden' name='userid' value=".$row['id'].">
				</form>";
		echo "Joined on"." ".$row['join-date'];	
echo "</div>";
echo "<hr>";
}
}else
$sql = "SELECT * FROM gebruiker ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

foreach ($result as $key => $row) { 
echo "<div>";
$id = $row['id']; 
$sql = "SELECT * FROM profileimg WHERE userid='$id' AND status=0";
$result = mysqli_query($conn, $sql);

	if (!$row = mysqli_fetch_assoc($result)) 
	{
		echo "<img src='uploads/default.png' width='100' height='100' border='3'>";
	}
	else 
		{
			echo "<img src='uploads/profile".$row['userid'].".jpg' width='100' height='100' border='3'> <br>";
		}
		$sql = "SELECT * FROM gebruiker WHERE id='$id'";
		echo "<br>";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		echo $row['voornaam']." ".$row['achternaam'];
		echo "<br>";
		echo "<form method='POST' action='user-profile.php'>
			<input type='submit' name='submit' value='check profile'>
			<input type='hidden' name='userid' value=".$row['id'].">
				</form>";
		echo "Joined on"." ".$row['join-date'];	
echo "</div>";
echo "<hr>";
}
?>
</body>