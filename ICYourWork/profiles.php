<?php
session_start();
require "core/database/connect.php";
?>
<!DOCTYPE html>
	<html>
	<head>
<title></title>
</head>
 <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dropdown.css">
        <link rel="stylesheet" href="css/vacature.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/font-awesome/css/font-awesome.min.css">
<body>
<a href="profile.php" class="join-button"> to profile page</a>

<?php
if(isset($_SESSION['uid']))
{
$sql = "SELECT * FROM gebruiker WHERE id !='".$_SESSION['uid']."'ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

foreach ($result as $key => $row) { 
echo "<div class='user'>";
$id = $row['id']; 
$sql = "SELECT * FROM profileimg WHERE userid='$id' AND status=0";
$result = mysqli_query($conn, $sql);

	if (!$row = mysqli_fetch_assoc($result)) 
	{
		echo "<img src='core/img/uploads/default.png' width='100' height='100' border='3'>";
	}
	else 
		{
			echo "<img src='core/img/uploads/profile".$row['userid'].".jpg' width='100' height='100' border='3'> <br>";
		}
		$sql = "SELECT * FROM gebruiker WHERE id='$id'";
		echo "<br>";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		echo $row['voornaam']." ".$row['achternaam'];
		echo "<br>";
		echo "<form method='POST' action='user-profile.php'>
			<input type='submit' class='btn' name='submit' value='check profile'>
			<input type='hidden' name='userid' value=".$row['id'].">
				</form>";
		echo "Joined on"." ".$row['join-date'];	
echo "</div>";
echo "<hr>";
}
}else{
$sql = "SELECT * FROM gebruiker ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

foreach ($result as $key => $row) { 
echo "<div class='user'>";
$id = $row['id']; 
$sql = "SELECT * FROM profileimg WHERE userid='$id' AND status=0";
$result = mysqli_query($conn, $sql);

	if (!$row = mysqli_fetch_assoc($result)) 
	{
		echo "<img src='core/img/Uploads/default.png' width='100' height='100' border='3'>";
	}
	else 
		{
			echo "<img src='core/img/Uploads/profile".$row['userid'].".jpg' width='100' height='100' border='3'> <br>";
		}
		$sql = "SELECT * FROM gebruiker WHERE id='$id'";
		echo "<br>";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		echo $row['voornaam']." ".$row['achternaam'];
		echo "<br>";
		echo "<form method='POST' action='user-profile.php'>
			<input type='submit' class='btn'  name='submit' value='check profile'>
			<input type='hidden' name='userid' value=".$row['id'].">
				</form>";
		echo "Joined on"." ".$row['join-date'];	
echo "</div>";
echo "<hr>";
}
}
?>
</body>