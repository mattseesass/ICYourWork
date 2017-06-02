<?php
if (isset($_SESSION['message'])) {
	echo "<div class='error_msg'>".$_SESSION['message']."</div>";
	unset($_SESSION['message']);
}
?>

<!DOCTYPE html>
<html lang="eng">
<head>
	<title>Register - ICYourWork</title>
		<link href="https://bootswatch.com/yeti/bootstrap.min.css" rel="stylesheet">

</head>

<body>
	<div class="main-page">

		<header>Hallo</header>

		<div class="page-content">
			<form id="register-form" action="core/functions/signup.func.php" method="POST">
				<input type="text" name="firstname" placeholder="Firstname">
				<input type="text" name="lastname" placeholder="Lastname">
				<input type="text" name="email" placeholder="Email address ">
				<input type="password" name="password" id="password" placeholder="Password">
				<input type="password" name="cpassword" placeholder="Confirm Password">

				<input type="submit" name="register_btn" value="Register">

			</form>
		</div>
	
		<footer>2017</footer>

	</div>
</body>

	  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
	  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
	  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>
	  <script src="core/js/validation.js"></script>

</html>