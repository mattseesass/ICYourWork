
<div class="container-settings">
<form method="POST" action="core/includes/change.inc.php">
<tr>
<td>First:</td>
<td>
<input type="text" name="first" class='first' value="<?php echo $_SESSION['first'];?>">
</td>
<br>
</tr>
<tr>
<td>
	Last: 
</td>
	<td>
		<input type="text" name="last" class='first' value="<?php echo $_SESSION['last'];?>">
	</td>
</tr>
<br>
<tr>
	<td>
	E-mail
	</td>
	<td>
	<input type="email" name="email" class='first' value="<?php echo $_SESSION['email'];?>">
	</td>
</tr>
<br>
<tr>
<td>
Change Password: 	
</td>
<input type="password" class='first' name="new_pw">
</tr>
<br>
<tr>
	<td>Old password:</td>
	<td><input type="password" class='first' name="password"></td>
</tr>
<br><tr>
	<input type="submit" name="save" class="submit" value="Save">
</tr>
</form>
<br>
<br>
	<form action="core/includes/logout.inc.php" method="POST">
	<button type="submit"  class='submit' name="submitlogout">Logout as user</button>
	</form>
	<form method="POST" action="core/includes/delete.inc.php">
			<input type="submit" class="submit" name="delete_btn" value="delete profile picture">
		</form>
	<form action="core/includes/upload.inc.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file" class="submit"><input type="submit" name="submit" value="upload">
	<small>.jpg is the allowed file type with a maximum of 5mb</small>
</div>
