<?php
session_start();
	$db = mysqli_connect("localhost", "root", "", "icyourwork");
	if (isset($_POST['login_btn'])) {
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);

		$password = md5($password); //this is to encrypt password from db and use it
		$sql = "SELECT * FROM gebruiker WHERE email ='$email' AND password ='$password'";
		$result = mysqli_query($db, $sql);
		
		if (!$row = $result->fetch_assoc()) {
			$_SESSION['message'] = "Your username/password is incorrect";
		}
		else
		{
			$_SESSION['name'] = $row['voornaam']." ".$row['achternaam'];
			$_SESSION['id'] = $row['achternaam'];
			$_SESSION['timestamp'] = $row['join-date'];
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['email'] = $email;
			$_SESSION['voornaam'] = $voornaam;		
			$_SESSION['achternaam'] =  $achternaam;
			header("location: home.php");
		}
	}

?>
<!DOCTYPE html>	
<html>
<head>
	<title>Register login and logout user php</title>
</head>
<body>

	<div class="header">
	<h1>Register, login and logout user</h1>
</div>
<?php
if (isset($_SESSION['message'])) {
	echo "<div class='error_msg'>".$_SESSION['message']."</div>";
	unset($_SESSION['message']);
}
?>
<form method="post" action="login.php">
	<table>
		<tr>
			<td>E-mail:</td>
			<td><input type="text" name="email" class="textInput"></td>
		</tr>
		<tr>
			<td>password:</td>
			<td><input type="password" name="password" class="textInput"></td>
		</tr>
		<tr>
			<td><input type="submit" name="login_btn" value="register"></td>
			</tr>
			<tr>
				<td><label>no account yet?</label></td>
				<td><a href="register.php">click here</a></td>
			</tr>
	</table>
</form>
</body>
</html>