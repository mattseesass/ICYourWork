
<?php
if (isset($_SESSION['uid']))
{
	$id = $_SESSION['uid'];
	$sql = "SELECT * FROM profileimg WHERE userid='$id' AND status=0";
	$result = mysqli_query($conn, $sql);
	if (!$row = mysqli_fetch_assoc($result)) 
	{
		echo "<img src='core/img/uploads/default.png' width='150' height='150' border='3'>";
	}
	else 
		{
			echo "<img src='core/img/uploads/profile".$row['userid'].".jpg' width='150' height='150' border='3'> <br>";
		}
	$sql = "SELECT * FROM gebruiker WHERE id='$id'";
	$result = mysqli_query($conn, $sql);
	if(!$row = mysqli_fetch_assoc($result)) 
		{
			echo "Something went wrong";
		}
// 		if (isset($_SESSION['Name'])) {
// 	echo "<div>".$_SESSION['Name']."</div>";

// }
}else
{
	echo "wrong inputs";
}