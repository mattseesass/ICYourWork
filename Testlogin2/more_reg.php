<?php
require "inc/dbh.inc.php";
session_start();

$sql = "SELECT * FROM gebruiker";
$result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) > 0) 
    {
	while ($row = mysqli_fetch_assoc($result)) 
  {
	$id = $row['id'];
	$sqlimg = "SELECT * FROM profileimg WHERE userid = '$id'";
	$resulting = mysqli_query($conn, $sqlimg);
	while ($rowimg = mysqli_fetch_assoc($resulting)) 
 { 
 ?>
	<div>
 <?php
 if ($rowimg['status'] == 0) 
 {
	echo "<img src='uploads/profile".$id.".jpg'>";
 }
 else
 {
	echo "<img src='uploads/default.png'>";
 } 
 echo $row['voornaam'];
 ?>
			
 </div>
 <?php
  		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
if (isset($_SESSION['message'])) {
echo $_SESSION['message'];
session_unset($_SESSION['message']);
}
?>
<form method="POST">
<tr>
<td><input type="submit" name="btn_zoekende" value="werkzoekende"></td>
</tr>
<input type="submit" name="btn_werkgever" value="werkgever">
</form>
<?php 
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
?>
<br>
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
</body>
</html>
