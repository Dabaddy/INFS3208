<?php

session_start();

//Extra security to stop injections//
if(isset($_POST['submit1'])) {
	 
$servername = "172.45.0.18";
$username = "devuser";
$password = "password";
$dbname = "test_db";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	
	//Error Handlers
	//Check for empty feilds
	if (empty($username) || empty($password)) {
		header("Location: ../login.html?Login=empty1");
		exit();
	}else{
		$sql = "SELECT * FROM user WHERE username='$username'";
		$result = mysqli_query($db, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../login.html?Login=error2");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hashedPwdCheck = password_verify($password, $row['password']);
				if ($hashedPwdCheck == false) {
					header("Location: ../login.html?Login=PasswordIncorrect");
					exit();					
				} elseif ($hashedPwdCheck == true) {
					//Login the user here
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['username'] = $row['username'];
					header("Location: ../home.html?Login=Success");
					exit();
				}
			}
		}
	}
}else{
	header("Location: ../home.html?Login=error1");
	exit();
}



