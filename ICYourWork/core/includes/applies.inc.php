<?php

if (isset($_SESSION['uid'])) {
$sql = "SELECT * FROM applicants WHERE uid='".$_SESSION['uid']."'";
$result = mysqli_query($conn, $sql);
?>
<strong>Applicants on your vacancies: </strong>
<br>
<?php
if (!$row = mysqli_num_rows($result) > 0) {
	echo "<h1>No current applicants</h1>";
}
else{	
	foreach ($result as $key => $row) {
		
		$sql2 = "SELECT * FROM gebruiker WHERE id='".$row['apid']."'";
		$result2 = mysqli_query($conn, $sql2);
		$row2 = mysqli_fetch_assoc($result2);
		echo "<div class='applies'>";
		echo "Name of the applicant: "." ".$row2['voornaam']." ".$row2['achternaam'];
		echo "<br>";
		echo "User's email: "." ".$row['email'];
		echo "<br>";
		echo "User wrote this: "." ".$row['CV'];
		echo "<br>";
		echo "<a href='core/includes/cv.inc.php?id=1&uid=".$row2['id']."&aid=".$row['id']."'>Accept Offer</a>";
		echo " ";
		echo "<a href='core/includes/cv.inc.php?id=2&uid=".$row2['id']."&aid=".$row['id']."'>Decline Offer</a>";
		
		echo "</div>";
		echo "<hr>";
	
}	

}
}else
{
	echo "not logged in";
}