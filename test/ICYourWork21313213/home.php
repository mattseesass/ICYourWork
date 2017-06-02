<?php
session_start();
?>

<h1>Hello to the homepage</h1>
<?php
if (isset($_SESSION['message'])) {
	echo "<div class='error_msg'>".$_SESSION['message']."</div>";
	unset($_SESSION['message']);
}
if (isset($_POST['submit'])) {
	move_uploaded_file($_FILES['files']['tmp_name'],"picture/".$_FILES['file']['name']);
}
	$db = mysqli_connect("localhost", "root", "usbw", "icyourwork");
	$sql = "SELECT * FROM gebruiker";
?>
<div><h4> <?php echo "Welcome back ".$_SESSION['name'];?> </table></h4></div>
<a href="logout.php">logout</a>
<form method="post" action="home.php">
<tr>
	<td>
		<input type="file" name="upload">
		<input type="submit" name="submit">
	</td>
</tr>
<div>Date joined: <?php echo $_SESSION['timestamp']; ?></div>
</form>
