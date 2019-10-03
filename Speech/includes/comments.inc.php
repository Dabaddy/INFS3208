<?php

function setComments($db) {
	if(isset($_POST['commentSubmit'])){
		$uid = $_POST['user_id'];
		$date = $_POST['date'];
		$message = $_POST['message'];
		$sql = "INSERT INTO comment (user_id, date, message) VALUES ('$uid', '$date', '$message')";
		$result = mysqli_query($db, $sql);
	}
}

function getComments($db) {
	$sql = "SELECT * FROM comment";
	$result = mysqli_query($db, $sql);
	while ($row = $result->fetch_assoc()) {
		echo "<div class='comment-box'><p>";
			echo $row['user_id']."<br>";
			echo $row['date']."<br>";
			echo nl2br($row['message'])."<br>";
		echo "</p><br>
			<form class='edit-form' method='POST' action='editcomment.php'>
				<input type='hidden' name='c_id' value='".$row['c_id']."'>
				<input type='hidden' name='user_id' value='".$row['user_id']."'>
				<input type='hidden' name='date' value='".$row['date']."'>
				<input type='hidden' name='message' value='".$row['message']."'>
				<button>edit</button>
			</form>
		</div>";
	}		
}

function editComments($db) {
	if(isset($_POST['editSubmit'])){
		$c_id = $_POST['c_id'];
		$uid = $_POST['user_id'];
		$date = $_POST['date'];
		$message = $_POST['message'];
		$sql = "UPDATE comment SET message='$message' WHERE c_id='$c_id'";
		$result = mysqli_query($db, $sql);
		header("Location: test.php");
	}
}