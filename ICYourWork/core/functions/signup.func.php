<?php

require '../includes/sessionstart.inc.php'; // Starts the session

require '../database/connect.php'; // Connection with the database
	if (isset($_POST['register_btn'])) { 
		$first = $_POST['first'];
		$last = $_POST['last'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
if (empty($first)) {
	header("Location: ../../index.php");exit();
}
if (empty($last)) {
	header("Location: ../../index.php");exit();
}
if (empty($email)) {
		header("Location: ../../index.php");exit();
}
if (empty($password)) {
	header("Location: ../../index.php");exit();

}
if (empty($password2)) {
header("Location: ../../index.php");exit();
}
else{
		if (isset($_POST['email'])) 
		{
			$sql = "SELECT * FROM gebruiker WHERE email ='$email'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0)
			{
				header("Location: ../../register.php?id=".$_SESSION['role']."");
				$_SESSION['denied'] = "This email address is already in use.";
			}
			else
			{
				if ($password == $password2) 
				{
					$password = md5($password);
					$sql = "INSERT INTO gebruiker(voornaam, achternaam, email, password, Accountid) VALUES('$first','$last', '$email', '$password','".$_SESSION['role']."')"; 
					mysqli_query($conn, $sql);		

					$_SESSION['succes'] = "<strong>Success!</strong> Your <em>Account</em> has been created!.";
					$_SESSION['name'] = $firstname." ".$lastname;

					$idsql =  "SELECT * FROM gebruiker WHERE email='$email' AND password='$password'";
					$result = mysqli_query($conn, $idsql);
					$row = mysqli_fetch_assoc($result);
					
					$id = $row['user_id'];
					$sql = "UPDATE users SET Accountid = '".$_SESSION['role']."' WHERE id='$id'";
						mysqli_query($conn, $sql);
					echo $row['work_id'];
					$sql = "SELECT * FROM gebruiker WHERE email='$email' AND password='$password'";
					$result = mysqli_query($conn,$sql);
					$row = mysqli_fetch_assoc($result);
					$userid = $row['id'];
					$sql = "INSERT INTO profileimg(userid, status) VALUES('$userid', 1)";
					mysqli_query($conn, $sql);
					$_SESSION['uid'] = $row['id'];
					$_SESSION['name'] = $row['voornaam']." ".$row['achternaam'];
					$_SESSION['join'] = $row['join-date'];
					$_SESSION['admin'] = $row['voornaam'];
					$_SESSION['level'] = $row['Accountid'];
					$_SESSION['uid'] = $row['id'];
					$_SESSION['email'] = $email;
					$_SESSION['first'] = $row['voornaam'];
					$_SESSION['last'] = $row['achternaam'];	
					header("Location: ../../profile.php");
				}
			}
		}
}
}