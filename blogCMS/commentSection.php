comment_id
user_id
date
body

<?php 
	include("includes/header.php");
//gets the current time for location	
	date_default_timezone_set('Australia/Brisbane');







?>



<?php
echo "<form>
	<input type='hidden' name='user_id' value='Anonymous'>
	<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
	<textarea name='message'></textarea>
	<br>
	<button name='submit' type='submit'>Comment</button>
	

</form>";

?>