<?php
session_start();
include_once 'dbh.inc.php';
$id = $_SESSION['uid'];

if (isset($_POST['submit'])) {
	$file = $_FILES['file'];
	$filename = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$filerror = $_FILES['file']['error'];
	$filetype = $_FILES['file']['type'];

	$fileExt = explode('.', $filename);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg');

	if (in_array($fileActualExt, $allowed)) {
		if ($filerror === 0) {
			if ($fileSize < 51200000 ) {
				$filenamenew = "profile".$id.".".$fileActualExt;
				$fileDestination = '../uploads/'.$filenamenew;
				move_uploaded_file($fileTmpName, $fileDestination);
				$sql = "UPDATE profileimg SET status=0 WHERE userid='$id'";
				 mysqli_query($conn, $sql);
				 header("Location: ../home.php?succesful");
			}
			else
			{
				 header("Location: ../home.php?failed");
				$_SESSION['message'] = "Your file is too big";
				
			}
		}
		else
		{
			$_SESSION['message'] = "There was an error while uploading your file";
			 header("Location: ../home.php?failed");
		}
	}
	else
	{
		$_SESSION['message'] = "No file Selected or file type is not allowed";
		header("Location: ../home.php?failed");
	}
}
?>