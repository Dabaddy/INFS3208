<?php

session_start();

//Extra security to stop injections//
if(isset($_POST['submit1'])) {
	
	include_once 'dbh.inc.php';
	
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	
	//Error Handlers
	//Check for empty feilds
	if (empty($username) || empty($password)) {
		header("Location: ../login.php?Login=empty1");
		exit();
	}else{
		$sql = "SELECT * FROM user WHERE username='$username'";
		$result = mysqli_query($db, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../login.php?Login=error2");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hashedPwdCheck = password_verify($password, $row['password']);
				if ($hashedPwdCheck == false) {
					header("Location: ../login.php?Login=PasswordIncorrect");
					exit();					
				} elseif ($hashedPwdCheck == true) {
					//Login the user here
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['user_firstname'] = $row['user_firstname'];
					$_SESSION['user_lastname'] = $row['user_firstname'];
					$_SESSION['email'] = $row['user_email'];
					$_SESSION['username'] = $row['username'];
					header("Location: ../index.php?Login=Success");
					exit();
				}
			}
		}
	}
}else{
	header("Location: ../index.php?Login=error1");
	exit();
}



