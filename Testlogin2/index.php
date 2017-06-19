<?php
header("Location: home.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>PenisBoyz</title>
</head>
<body>
<form action="inc/upload.inc.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file">
	<input type="submit" name="submit" value="upload">
</form>
</body>
</html>