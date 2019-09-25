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
	$c_id = $_POST['c_id'];
	$uid = $_POST['user_id'];
	$date = $_POST['date'];
	$message = $_POST['message'];
	
	echo "<form method='POST' action='".editComments($db)."'>
		<br></br>
		<input type='hidden' name='c_id' value='".$_POST['c_id']."'>
		<input type='hidden' name='user_id' value='".$_POST['user_id']."'>
		<input type='hidden' name='date' value='".$_POST['date']."'>
		<textarea name='message'>".$_POST['message']."</textarea>
		<br></br>
		<button name='editSubmit' type='submit'>Edit</button>
	</form>";
?>


</body>

</html>