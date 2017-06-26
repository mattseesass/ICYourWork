<?php
if (isset($_SESSION['uid'])) {
if ($id > 0) {
		?>
		<div class="vac_create">
		<form method="POST" action="core/includes/process_vacature.inc.php">
		<tr>
		<td><input type="text" name="title" class='titl' placeholder="Title"></td>
		</tr>
		<br>
			<tr>
			<td><textarea name="comment" 
			class='comment' placeholder="type description in here" maxlength="1000" autofocus></textarea></td>
			</tr>
			<br>
			<tr>
			<td><input type="text" name="requirement" placeholder="Requirements"
			class='need'></td>
			</tr>
			<select name="sel" class='select'>
			<label>Select preferred category </label>
			<option value="0">select a category -</option>
		<option value="1">Healthcare</option>
		<option value="2">Economy</option>
		<option value="3">Green</option>
		<option value="4">Technology</option>
			</select>
			<br>
			<tr>
				<input type="submit" name="btn_submit" value="submit vacancy" class="submit">
			</tr>
		</form>
		</div>
		<?php
	}
	?>
	<?php
}else {
	echo "error";
}