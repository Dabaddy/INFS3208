<html>
	<head>
	<link href="css/blog.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
	</head>
<?php include("includes/header3.php");

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
      <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
          <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
          <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
      </div>
    </div>

    <main role="main" class="container">
		<div>
<!-- Grabs all variables of a post and references them to a variable 'rows' -->		
		<?php if($posts->num_rows > 0) {
			while($rows = $posts->fetch_assoc()){
		?>
<!-- Grab & Display Title, Date, Author & Body of the post -->
<!-- Title of post links to a new page where you are able to read the whole post & with comment functionality -->		
			<div class = "blog-post">
				<h1 class = "blog-post-title"><a href="login.php" ><?php echo $rows['title']; ?></a></h1>
				<p class = "blog-post-meta"><?php echo $rows['date']; ?>, by <?php echo $rows['username']; ?></p>
				<p class="mb-0">
				
<!-- Only displays the first 300 charecters of the body --> 				
				<?php $body = $rows['body']; 
					echo substr($body, 0, 300) . "...";				
				?>
				
				<a href="login.php" class="btn btn-primary">Read More</a>
				</p>
			</div>
			
			
			

 

		<?php } }
			else {
				echo '<div>ggjhghjgjh</div>';
			}?>
		
		<?php include("includes/footer.php");?>
	    </div>
	</main>
</html>
