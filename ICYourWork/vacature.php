<?php
session_start();
require "core/database/connect.php";
if (isset($_SESSION['uid'])) {
	echo "<div class='logout'><a href='core/includes/logout.inc.php'>logout </a></div>";
	}
	?>
	<h1></h1>
<div class="search">	
<link rel="stylesheet" type="text/css" href="css/vacature.css">
<a href="profile.php">Go to homepage</a>
<form method="POST" class="form">
	<select name="sel" class="sel">
		<option value="1">Select from latest to first</option>
		<option value="2">Select from First to lastest</option>
		<option value="3">Show vacancies only for Healthcare</option>
		<option value="4">Show vacancies only for Economy</option>
		<option value="5">Show vacancies only for Green</option>
		<option value="6">Show vacancies only for Technology</option>
	</select>
	<input type="submit" name="btn_search" value="start query" class="query_btn">
</form>

</div>
<?php

if (isset($_SESSION['uid'])) {
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
		echo "<div class='error'>No vacancies found</div>";
	}
	else 
	{
	foreach ($result as $key => $row){		
		$vid = $row['id'];
		$cat = $row['Category'];

	?>
<?php
?>
<div class='vacature'>
<div class='items'>
<h1><?php echo $row['Name']; ?></h1>
<?php

		?>
<img src="core/img/Uploads/<?php echo $row['picture']; ?>">
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
			echo "<img src='core/img/uploads/default.png' width='50' height='50'>";
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
				echo "<img src='core/img/uploads/profile".$id.".jpg' width='50' height='50'>";
			?>
			<br>
			<?php
			
		}
		if (isset($_SESSION['uid'])) {
			echo "<form method='POST' action='core/includes/apply.inc.php'>
			<input type='submit' class='btn_apply' name='submit' value='Apply now'>
			<input type='hidden' name='id' value='".$row['id']."'>
			<input type='hidden' name='vid' value='".$vid."'>
			</form></div></div>";
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

<?php
$sql = "SELECT * FROM profileimg WHERE userid='$id' AND status=0";
		$result = mysqli_query($conn, $sql);
		if (!$row = mysqli_fetch_assoc($result)) 
		{
			$sql = "SELECT * FROM gebruiker WHERE id ='$id'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
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
				echo "<img src='uploads/profile".$id.".jpg' class='img' width='50' height='50'></div>";
			?>
			<br>
			<?php
			
		}
	}
	?>

	<?php
	if (isset($_SESSION['uid'])) {	?>
			<div class="h1">
		<h1>These are your vacancies</h1>
			</div>
			
		<?php
$sql = "SELECT * FROM vacatures WHERE uid='".$_SESSION['uid']."' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
foreach ($result as $key => $row) { ?>
<div class='vacature'><div class="items">
<h1><?php echo $row['Name']; ?></h1>
<img src="core/img/Uploads/<?php echo $row['picture']; ?>">
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
			echo "<img src='core/img/uploads/default.png' width='50' class='img'  height='50'>";
			?>
			<br>
			<?php
			
		}
		else 
		{
			$sql = "SELECT * FROM vacatures WHERE uid='".$_SESSION['uid']."'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			$cat = $row['Category'];
				echo "<br>";
				echo "Posted by: "."You";
				echo "<br>";
				echo "<img src='core/img/uploads/profile".$_SESSION['uid'].".jpg' width='50' height='50'><br>";
				echo "<form method='POST' action='".deletecomments()."'> 
					<input type='submit' class='btn_delete' name='del_btn' value='delete'>
					<small>you can't rollback this process</small>
					<input type='hidden' name='vid' value='".$row['id']."'>
					<input type='hidden' name='uid' value='".$row['uid']."'>
					</form></div></div>";
			}
}
}else
{
	$_SESSION['message'] = "Log in to see content";
	header("Location: index.php");
}
function deletecomments()
{
	require "core/database/connect.php";
	if (isset($_POST['del_btn'])) {
		$uid = $_POST['uid'];
		$id = $_POST['vid'];
		$sql = "DELETE FROM vacatures WHERE id='$id' AND uid='$uid'";
		mysqli_query($conn, $sql);
		header("Location: vacature.php");
	}
}
?>

