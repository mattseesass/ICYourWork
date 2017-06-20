<?php
session_start();
require "inc/dbh.inc.php";
?>


<a href="Home.php">Go to homepage</a>
<form method="POST">
	<select name="sel">
		<option value="1">Select from latest to first</option>
		<option value="2">Select from First to lastest</option>
		<option value="3">Show vacancies only for Healthcare</option>
		<option value="4">Show vacancies only for Economy</option>
		<option value="5">Show vacancies only for Green</option>
		<option value="6">Show vacancies only for Technology</option>
	</select>
	<input type="submit" name="btn_search">
</form>
<?php

if (isset($_SESSION['message'])) {
	echo $_SESSION['message'];
}
if (isset($_SESSION['uid'])) {
	echo "<a href='inc/logout.inc.php'>logout </a>";
	if (isset($_POST['btn_search'])) {
				$value = $_POST['sel'];
	switch ($value) {
		case 1:
			$sql = "SELECT * FROM vacatures WHERE uid != '".$_SESSION['uid']."'  ORDER BY id DESC";	
			break;
		case 2:
			$sql = "SELECT * FROM vacatures WHERE uid != '".$_SESSION['uid']."' ORDER BY id ASC";
			break;
		case 3;
			$sql = "SELECT * FROM vacatures WHERE Category=1 ORDER BY uid DESC";
		break;	
		case 4:
			$sql = "SELECT * FROM vacatures WHERE Category=2 ORDER BY uid DESC";
		break;
		case 5:
			$sql = "SELECT * FROM vacatures WHERE Category=3 ORDER BY uid DESC";
		break;
		case 6:
			$sql = "SELECT * FROM vacatures WHERE Category=4 ORDER BY uid DESC";
		break;
	}
	}
	else
	{
	$sql = "SELECT * FROM vacatures WHERE uid != '".$_SESSION['uid']."'  ORDER BY id DESC";		
	}
	$result = mysqli_query($conn, $sql);
	if (!$row = mysqli_num_rows($result) > 0) {
		echo "No vacancies found";
	}
	else 
	{
	foreach ($result as $key => $row){		
		$vid = $row['id'];
		$cat = $row['Category'];

	?>
<div>
<?php
?>
<h1><?php echo $row['Name']; ?></h1>
<?php

		?>
<img src="Uploads/<?php echo $row['picture']; ?>">
<p><b>Comment: </b><?php echo $row['Comment']; ?></p>
<small><b>Requirement: </b><?php echo $row['Requirement']?></small>
<?php
$id = $row['uid'];
$sql = "SELECT * FROM profileimg WHERE userid='$id' AND status=0";
		$result = mysqli_query($conn, $sql);
		if (!$row = mysqli_fetch_assoc($result)) 
		{
			$sql = "SELECT * FROM gebruiker WHERE id ='$id'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			echo "<br>";
			echo "Posted by: ".$row['voornaam']." ".$row['achternaam'];
			echo "<img src='uploads/default.png' width='50' height='50'><hr>";
			?>
			<br>
			<?php
			
		}
		else 
		{

			$sql = "SELECT * FROM gebruiker WHERE id='$id'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
				echo "<br>";
				echo "Posted by: ".$row['voornaam']." ".$row['achternaam'];
				echo "<img src='uploads/profile".$id.".jpg' width='50' height='50'>";
			?>
			<br>
			<?php
			
		}
		if (isset($_SESSION['uid'])) {
			echo "<form method='POST' action='inc/apply.inc.php'>
			<input type='submit' name='submit' value='Apply now'>
			<input type='hidden' name='id' value='".$row['id']."'>
			<input type='hidden' name='vid' value='".$vid."'>
			</form></div>";
		}
	} 
	}	
}
else{
	if (isset($_POST['btn_search'])) {
		$value = $_POST['sel'];
switch ($value) {
		case 1:
			$sql = "SELECT * FROM vacatures ORDER BY id DESC";	
			break;
		case 2:
			$sql = "SELECT * FROM vacatures ORDER BY id ASC";
			break;
		case 3;
			$sql = "SELECT * FROM vacatures WHERE Category=1 ORDER BY uid DESC";
		break;	
		case 4:
			$sql = "SELECT * FROM vacatures WHERE Category=2 ORDER BY uid DESC";
		break;
		case 5:
			$sql = "SELECT * FROM vacatures WHERE Category=3 ORDER BY uid DESC";
		break;
		case 6:
			$sql = "SELECT * FROM vacatures WHERE Category=4 ORDER BY uid DESC";
		break;
	}
}else
	$sql = "SELECT * FROM vacatures WHERE uid != '".$_SESSION['uid']."'  ORDER BY id DESC";	
}
	$result = mysqli_query($conn, $sql);
	foreach ($result as $key => $row) {
		?>
		<div>
		<h1><?php echo $row['Name']; ?></h1>
		<img src="Uploads/<?php echo $row['picture']; ?>">
<p><b>Comment: </b><?php echo $row['Comment']; ?></p>
<small><b>Requirement: </b><?php echo $row['Requirement']?></small>
<br>
<p><a href="home.php">login here</a> to apply on this vacancies</p>
</div>
<?php
$id = $row['uid'];
$sql = "SELECT * FROM profileimg WHERE userid='$id' AND status=0";
		$result = mysqli_query($conn, $sql);
		if (!$row = mysqli_fetch_assoc($result)) 
		{
			$sql = "SELECT * FROM gebruiker WHERE id ='$id'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			echo "<br>";
			echo "Posted by: ".$row['voornaam']." ".$row['achternaam'];
			echo "<img src='uploads/default.png' width='50' height='50'>";
			?>
			hr
			<br>

			<?php
			
		}
		else 
		{
			$sql = "SELECT * FROM gebruiker WHERE id='$id'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
				echo "<br>";
				echo "Posted by: ".$row['voornaam']." ".$row['achternaam'];
				echo "<img src='uploads/profile".$id.".jpg' width='50' height='50'>";
			?>
			<hr>
			<br>
			<?php
			
		}
	}
	?>

	<?php
	if (isset($_SESSION['uid'])) {	?>
		<h1>These are your vacancies</h1>
		<?php
$sql = "SELECT * FROM vacatures WHERE uid='".$_SESSION['uid']."' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
foreach ($result as $key => $row) { ?>
<div>
<h1><?php echo $row['Name']; ?></h1>
<img src="Uploads/<?php echo $row['picture']; ?>">
<p><b>Comment: </b><?php echo $row['Comment']; ?></p>
<small><b>Requirement: </b><?php echo $row['Requirement']?></small>
<?php
$sql = "SELECT * FROM profileimg WHERE userid='".$_SESSION['uid']."' AND status=0";
		$result = mysqli_query($conn, $sql);
		if (!$row = mysqli_fetch_assoc($result)) 
		{
			$sql = "SELECT * FROM gebruiker WHERE id='$id'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			echo "<br>";
			echo "Posted by: ".$row['voornaam']." ".$row['achternaam'];
			echo "<img src='uploads/default.png' width='50' height='50'>";
			?>
			<br>
			<hr>
			<?php
			
		}
		else 
		{
			$sql = "SELECT * FROM vacatures WHERE uid='".$_SESSION['uid']."' ";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			$cat = $row['Category'];
				echo "<br>";
				echo "Posted by: "."You";
				echo "<br>";
				echo "<img src='uploads/profile".$_SESSION['uid'].".jpg' width='50' height='50'><br>";
				echo "<form method='POST' action='".deletecomments()."'> 
					<input type='submit' name='del_btn' value='delete'>
					<small>you can't rollback this process</small>
					<input type='hidden' name='vid' value='".$row['id']."'>
					<input type='hidden' name='uid' value='".$row['uid']."'>
					</form>";

			}
}
}
function deletecomments()
{
	require "inc/dbh.inc.php";
	if (isset($_POST['del_btn'])) {
		$uid = $_POST['uid'];
		$id = $_POST['vid'];
		$sql = "DELETE FROM vacatures WHERE id='$id' AND uid='$uid'";
		mysqli_query($conn, $sql);
		header("Location: vacature.php");
	}
}
?>

