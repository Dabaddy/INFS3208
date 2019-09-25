<?php include("includes/header3.php");

?>

<!doctype html>

<html lang="en">
<head>
	<title>SignUp</title>
	<link href="css/reset.css" rel="stylesheet">
 <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
</head>

<body>
<header>
	
</header>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Tumble</h2>
		<form class="signup-form" action="includes/signup.inc.php" method="POST">
			<input type="text" name="first" placeholder="Firstname">
			<input type="text" name="last" placeholder="Lastname">
			<input type="text" name="email" placeholder="Email">
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<button type="submit" name="submit">Sign Up</button>
		</form>
	</div>
<section>



</body>



</html>


