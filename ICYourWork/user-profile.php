<?php
session_start();
require "core/database/connect.php";

?>
<a href="profile.php" class="join-button">Homepage</a><br>
<a href="profiles.php" class="join-button">Back to all profiles</a>
<br>	
 <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dropdown.css">
        <link rel="stylesheet" href="css/vacature.css">
<?php
echo "<div class='user'>";
if ($_POST['submit']) {
	$id = $_POST['userid'];
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
			$result = mysqli_query($conn, $sql);
			$user = array();
			while($row = mysqli_fetch_assoc($result))
			{
				$user = $row;
			}
			echo $user['voornaam']." ".$user['achternaam'];
			echo "<br>".$user['email'];
			echo "</div>";
			echo "<h1 class='h1'> vacatures </h1>";
			$sql= "SELECT * FROM vacatures WHERE uid='$id'";
			$result = mysqli_query($conn, $sql);
			foreach ($result as $key => $row) {
						echo "<div class='vat'>";
				echo $row['Name'];
				echo "<img src='core/img/Uploads/".$row['picture']."' width='100' height='100'>";
				echo "<br>";
				echo $row['Requirement'];	
				echo "</div>";
			}
			
}

?>