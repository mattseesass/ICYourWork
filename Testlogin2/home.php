	<?php
	require "inc/dbh.inc.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>

	<?php 
	if (isset($_SESSION['error'])){
	echo $_SESSION['error'];
	unset($_SESSION['error']);
	}
	else{
		echo "Profile-Page";
		} ?>
	</title>
</head>
<body>
<?php
if (isset($_SESSION['message'])) {
		echo "<div>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	} ?>
<a href="vacature.php">Go to vacancies page</a>
Want to see users? <a href="profiles.php">click here!!</a>
<br>
<br>
<br>
<br>
<?php
if (empty($_SESSION['Name'])) {
	$_SESSION['message'] = "Login to see content";
	echo $_SESSION['message'];
	session_unset($_SESSION['message']);
	if (isset($_SESSION['message'])) {
echo $_SESSION['message'];
session_unset($_SESSION['message']);
}
?>
<form action="inc/login.php" method="POST">
	<tr>
		<td>
			email:
		</td>
		<td>
			<input type="text" name="email">
		</td>
	</tr>
	<tr>
		<td>
			password
		</td>
		<td><input type="password" name="password"></td>
	</tr>
	<tr>
	<td>
	<input type="submit" name="login_btn" value="login">	
	</td>
	</tr>
</form>
<form method="POST">
<tr>
<td><input type="submit" name="btn_zoekende" value="werkzoekende"></td>
</tr>
<input type="submit" name="btn_werkgever" value="werkgever">
</form>
<?php

}
if (isset($_POST['btn_werkgever'])) { 
	?>
<form method="POST" action="inc/process_company.inc.php">
	<tr>
	<td>Company name: </td>
	<td><input type="text" name="Company"></td>
	</tr>
	<br>
	<tr>
	<td>Company email: </td>
	<td><input type="email" name="email"></td>
	</tr>
	<br>
	<tr>
	<td>Password: </td>
	<td><input type="password" name="password"></td>
	</tr>
	<br>
	<tr>
	<td>re-enter password: </td>
	<td><input type="password" name="password2"></td>
	</tr>
	<br>
	<tr><td>submit</td>
	<td><input type="submit" name="btn_submit_werkgevende"></td></tr>
</form>	
<?php
} 
if (isset($_POST['btn_zoekende'])) {
?>
<form method="POST" action="inc/process_werkzoekende.inc.php">
	<tr>
	<td>Voornaam</td>
	<td><input type="text" name="first"></td>
	</tr>
	<br>
	<tr>
	<td>Achternaam</td>
	<td><input type="text" name="last"></td>
	</tr>
	<br>
	<tr>
	<td>E-mail</td>
	<td><input type="email" name="email"></td>
	</tr>
	<br>
	<tr>
	<td>Password</td>
	<td><input type="password" name="password"></td>
	</tr>
	<br>
	<tr>
	<td>re-enter password</td>
	<td><input type="password" name="password2"></td>
	</tr>
	<br>
	<tr><td>Submit</td>
	<td><input type="submit" name="btn_submit_werkzoekende"></td></tr>
</form>
<?php
}
?>

<br>

<?php
if (isset($_SESSION['Name']))
{
	$id = $_SESSION['uid'];
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
	if(!$row = mysqli_fetch_assoc($result)) 
		{
			echo "Something went wrong";
		}
		if (isset($_SESSION['Name'])) {
	echo "<div>".$_SESSION['Name']."</div>";

}else
{
	header("Location: home.php");
}

		?>
		<form method="POST" action="inc/delete.inc.php">
			<input type="submit" name="delete_btn" value="delete profile picture">
		</form>
	<form action="inc/upload.inc.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file"><input type="submit" name="submit" value="upload">
	<small>.jpg is the allowed file type with a maximum of 5mb</small>

	<br>
	<?php 
		if (isset($_SESSION['error'])) {
			echo $_SESSION['error'];
			unset($_SESSION['error']);
		}
		if (isset($_SESSION['message'])) {
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		}
		echo "<br>";
	?>
	</form>
	<?php

	if ($id > 1) {
		?>
		<form method="POST" action="inc/process_vacature.inc.php">
		<tr>
		<td><input type="text" name="title" placeholder="Title"></td>
		</tr>
		<br>
			<tr>
			<td><textarea name="comment" placeholder="type description in here"></textarea></td>
			</tr>
			<br>
			<tr>
			<td><input type="text" name="requirement" placeholder="Requirements"></td>
			</tr>
			<select name="sel">
			<label>Select preferred category </label>
			<option value="0">select a category -</option>
		<option value="1">Healthcare</option>
		<option value="2">Economy</option>
		<option value="3">Green</option>
		<option value="4">Technology</option>
			</select>
			<br>
			<tr>
				<input type="submit" name="btn_submit">
			</tr>
		</form>
		<br>
		<?php
	}
	?>
	<br>
 		<form action="inc/logout.inc.php" method="POST">
	<button type="submit" name="submitlogout">Logout as user</button>
	</form>

	<?php
	if (isset($_SESSION['level'])) {
	if ($_SESSION['level'] == 2) {
		echo "Welcome back admin"." ".$_SESSION['admin']."<br>";
	}
	if ($_SESSION['level'] == 1) {
		echo "Account type:"." "."Normal user"."<br>";
	}
	}else
	{
		echo "Welcome back to your profile!!"."<br>";
	}
if (isset($_SESSION['join'])) {
echo "Joined on: ".$_SESSION['join'];
}else
{
	echo "Display of join-date will be displayed next time you log in :) sorry for this problem";
}?>
<form method="POST">
	<input type="submit" name="btn_options" value="Set profile settings">
</form>
<?php 
if (isset($_POST['btn_options'])){
echo "Set profile settings in this form";
?>
<form method="POST" action="inc/change.inc.php">
<tr>
<td>First name:</td>
<td>
<input type="text" name="first" value="<?php echo $_SESSION['First'];?>">
</td>
<br>
</tr>
<tr>
<td>
	Last name: 
</td>
	<td>
		<input type="text" name="last" value="<?php echo $_SESSION['last'];?>">
	</td>
</tr>
<br>
<tr>
	<td>
	E-mail
	</td>
	<td>
	<input type="email" name="email" value="<?php echo $_SESSION['email'];?>">
	</td>
</tr>
<br>
<tr>
<td>
Change Password: 	
</td>
<input type="password" name="new_pw">
</tr>
<br>
<tr>
	<td>Old password:</td>
	<td><input type="password" name="password"></td>
</tr>
	

	<input type="submit" name="save" value="Saves">
</form>
<?php
}	
if (isset($_POST['save'])) 
{
	unset($_POST['btn_options']);
}
$sql = "SELECT * FROM gebruiker WHERE id='$id'";
$result = mysqli_query($conn, $sql);
echo "<br>
	<form method='POST' action='".deleteaccount()."'> 
			<input type='submit' name='btn_send' value='delete you account'>
			<small>when doing this there is no turning back</small> 
			<input type='hidden' name='id' value='".$_SESSION['uid']."'
			</form>";
}
?>

<?php
if (isset($_SESSION['uid'])) {
$sql = "SELECT * FROM applicants WHERE uid='".$_SESSION['uid']."'";
$result = mysqli_query($conn, $sql);
?>
<div>
<strong>Applicants on your vacancies</strong>
<br>
<?php
if (mysqli_num_rows($result) > 0) {
	echo "These are the current applicants: "."<br> <hr>";
	foreach ($result as $key => $row) {
		
		$sql2 = "SELECT * FROM gebruiker WHERE id='".$row['apid']."'";
		$result2 = mysqli_query($conn, $sql2);
		$row2 = mysqli_fetch_assoc($result2);
		echo "Name of the applicant: "." ".$row2['voornaam']." ".$row2['achternaam'];
		echo "<br>";
		echo "User's email: "." ".$row['email'];
		echo "<br>";
		echo "User wrote this: "." ".$row['CV'];
		echo "<br>";
		echo "<a href='inc/cv.inc.php?id=1&uid=".$row2['id']."&aid=".$row['id']."'>Accept Offer</a>";
		echo " ";
		echo "<a href='inc/cv.inc.php?id=2&uid=".$row2['id']."&aid=".$row['id']."'>Decline Offer</a>";
		
		
		echo "<hr>";
	
}

}else
{
	echo "No current applicants";
}
}

?>
</div>
</body>
</html>
<?php
function deleteaccount(){
	if (isset($_POST['btn_send'])) {
	 echo "<form method='POST' action='inc/deleteaccount.inc.php'> 
			<input type='password' name='password'>
		<input type='submit' name='submit'>
		</form>";
	 		}
}
?>