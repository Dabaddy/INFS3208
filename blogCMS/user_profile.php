<html>
	<head>
	<link href="css/blog.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
	</head>
<?php 
include("includes/header3.php");


//Check if there is a category in the url, if not 
	if(isset($_GET['category'])){
		$category = mysqli_real_escape_string($db, $_GET['category']);
		echo "<h2>Category: " . $category . "</h2>";
		$query = "SELECT * FROM posts WHERE category_id='$category'";
		echo '<div>HIHIHI</div>';
	}else{
		$query = "SELECT * FROM posts";
	}	
	
	
	$posts = $db->query($query);


?>


	<div>
      <div class="jumbotron p-3 p-md-5 text-white rounded bg-grey">
        <div class="col-lg-10 px-0">
        <h1 class="display-5 text-center">Profile</h1>
		<div class="jumbotron p-3 p-md-5 mx-md-5 text-white rounded bg-dark">
		<img class="float-left" src="img/ham.png"/>
		<h2 class="display-5 text-center">username</h2>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
			  <li class="nav-item active">
				<a class="nav-link" href="#">Blog <span class="sr-only">(current)</span></a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">About</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Images</a>
			  </li>
			</div>
		</nav>
		<div class="lead my-3 bg-dark">
			<p>Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>	  
		</div>
		</div>
      </div>
    </div>

	
	
    <main role="main" class="container">

	</main>
</html>