<!--
c_id
user_id
message
date
-->

<?php
	include('includes/dbh.inc.php');
	date_default_timezone_set('Australia/Brisbane');
	include('includes/comments.inc.php');
?>

<!DOCTYPE html>
<html>
<head>
	<link href="css/blog.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
</head>
<meta charset="UTF-8">
<title> </title>

<body>


<?php
	echo "<form method='POST' action='".setComments($db)."'>
		<br></br>
		<input type='hidden' name='user_id' value='anon'>
		<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
		<textarea name='message'></textarea>
		<br></br>
		<button name='commentSubmit' type='submit'>Comment</button>
	</form>";
	
	getComments($db);

?>


</body>

</html>
