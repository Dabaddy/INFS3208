<?php

//Extra security to stop injections//
if(isset($_POST['submit'])) {
	
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
	
	$first = mysqli_real_escape_string($db, $_POST['first']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	
	//Error Handlers
	//Check for empty feilds
	if (empty($first) || empty($email) || empty($username) || empty($password)) {
		header("Location: ../signup.php?Signup=empty");
		exit();
	}else{
		//check if input charecters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first)) {
			header("Location: ../signup.php?signup=invalid");
			exit();
		}else{
			//check if email if valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=invalidEmail");
				exit();
			}else{
				//check if the username is taken by another user
				$sql = "SELECT * FROM user WHERE username='$username'";
				$result = mysqli_query($db, $sql);
				$resultCheck = mysqli_num_rows($result);
				
				if ($resultCheck > 0) {
					header("Location: ../signup.php?Signup=UsernameTaken");
					exit();
				}else{
					//hashing the password
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					//insert the user into the database
					$sql = "INSERT INTO user (user_firstname, user_lastname, user_email, 
						username, password) VALUES ('$first', '$email', 
						'$username', '$hashedPwd');";
					mysqli_query($db, $sql);
					header("Location: ../login.php?Signup=Success");
					exit();
				}
			}
		}
	}
//Should include checks so that users cannot have username Admin	
}else{
	header("Location: ../home.html");
	exit();
}