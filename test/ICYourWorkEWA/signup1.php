<?php
	include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

<?php
if (isset($_SESSION['message'])) {
	echo "<div class='error_msg'>".$_SESSION['message']."</div>";
	unset($_SESSION['message']);
}
?>

<form action="core/functions/signup.func.php" method="POST">
	<table>
		<tr>
			<td>voornaam:</td>
			<td><input type="text" name="first" placeholder="Voornaam"</td>
		</tr>
		<tr>
			<td>achternaam:</td>
			<td><input type="text" name="last" placeholder="Achternaam"</td>
		</tr>
		<tr>
			<td>e-mail:</td>
			<td><input type="email" name="email" placeholder="Emailadres"</td>
		</tr>
		<tr>
			<td>password:</td>
			<td><input type="password" name="password" placeholder="Wachtwoord"</td>
		</tr>
		<tr>
			<td>confirm password:</td>
			<td><input type="password" name="password2" placeholder="Wachtwoord nogmaals"</td>
			</tr>
			<tr>
			<td><input type="submit" name="register_btn" value="register"></td>
			</tr>
			<tr>
				<td>Already have an account?</td>
				<td><a href="login.php">Login here</a></td>
			</tr>
	</table>
</form>

</body>
</html>