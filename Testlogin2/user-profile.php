<?php
session_start();
require 'inc/dbh.inc.php';
?>
<a href="home.php">Homepage</a><br>
<a href="profiles.php">Back to all profiles</a>
<br>	

<?php
if ($_POST['submit']) {
	$id = $_POST['userid'];
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
			$result = mysqli_query($conn, $sql);
			$user = array();
			while($row = mysqli_fetch_assoc($result))
			{
				$user = $row;
			}
			echo $user['voornaam']." ".$user['achternaam'];
			echo "<br>".$user['email'];
			echo "<h1> vacatures </h1>";
			$sql= "SELECT * FROM vacatures WHERE uid='$id'";
			$result = mysqli_query($conn, $sql);
			foreach ($result as $key => $row) {
				echo "<br><div width='500' height='500' border='3'>";
				echo $row['Name'];
				echo "<br>";
				echo "<img src='Uploads/".$row['picture']."'><br>";
				echo $row['Comment']."<br>";
				echo $row['Requirement'];
			echo "</div>";	
			}
			
}

?>