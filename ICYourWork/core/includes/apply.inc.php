<?php
session_start();
require "../database/connect.php";
?>

<link rel="stylesheet" type="text/css" href="../../css/apply.css">
 <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../css/dropdown.css">
    <link rel="stylesheet" href="assets/css/font-awesome/css/font-awesome.min.css">


<?php
if (isset($_POST['submit'])) {
	$uid = $_POST['id'];
	$vid = $_POST['vid'];
	$apid = $_SESSION['uid'];

	$sql = "SELECT * FROM gebruiker WHERE id='$apid'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$name = $row['voornaam']." ".$row['achternaam'];
	$email = $row['email'];
	echo"<div class='container'><h1>Write your CV here</h1><form method='POST' action='applicant.inc.php' class='form'>
			<input type='hidden' name='vid' value='".$vid."'>
			<input type='hidden' name='apid' value='".$apid."'>
			<input type='hidden' name='uid' value='".$uid."'>	
			<textarea name='CV' class='area' autofocus maxlength=1000></textarea>
					<div class='direction'>
				 <div class='form-group'>
              <input type='password' name='password' id='password' placeholder='Password'>
            </div></div>
			<small class='mine'> write your cv with a maximum of 1000 characters </small>
			<input type='submit' name='submit2' class='submit' value='submit CV'>
			</form></div>";
}
?>