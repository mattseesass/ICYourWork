<?php

require '../includes/sessionstart.inc.php'; // Starts the session

require '../database/connect.php'; // Connection with the database

	if (isset($_POST['register_btn'])) { 
		$firstname = mysql_real_escape_string($_POST['firstname']);
		$lastname = mysql_real_escape_string($_POST['lastname']);
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);
		$cpassword = mysql_real_escape_string($_POST['cpassword']);

		if (isset($_POST['email'])) 
		{
			$sql = "SELECT * FROM users WHERE user_email ='$email'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0)
			{
				header("Location: ../../register.php?id=".$_SESSION['role']."");
				$_SESSION['denied'] = "This email address is already in use.";
			}
			else
			{
				if ($password == $cpassword) 
				{
					$password = md5($password);
					$sql = "INSERT INTO users(user_firstname, user_lastname, user_email, user_password) VALUES('$firstname','$lastname', '$email', '$password')"; 
					mysqli_query($conn, $sql);		

					$_SESSION['succes'] = "<strong>Success!</strong> Your <em>Account</em> has been created!.";
					$_SESSION['name'] = $firstname." ".$lastname;

					$idsql =  "SELECT * FROM users WHERE user_email='$email' AND user_password='$password'";
					$result = mysqli_query($conn, $idsql);
					$row = mysqli_fetch_assoc($result);
					
					$id = $row['user_id'];
					$sql = "UPDATE users SET work_id = '".$_SESSION['role']."' WHERE user_id='$id'";
						mysqli_query($conn, $sql);
					echo $row['work_id'];

					header("Location: ../../profile.php");
				}
			}
		}

	}