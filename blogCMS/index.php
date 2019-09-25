<html>
	<head>
	
	<link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/blog.css" rel="stylesheet">
	</head>
	<body>
<?php 
include("includes/header.php");


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
				<h1 class = "blog-post-title"><a href="index.php?category=<?php echo $rows['category_id'] ?>"><?php echo $rows['title']; ?></a></h1>
				<p class = "blog-post-meta"><?php echo $rows['date']; ?>, by <a href="#"><?php echo $rows['username']; ?></a></a></p>
				<p class="mb-0">
				
<!-- Only displays the first 300 charecters of the body --> 				
				<?php $body = $rows['body']; 
					echo substr($body, 0, 20) . "...";		
				
				?>

				</p>
				<br>
				<br>
				<!-- Trigger the modal with a button -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Read More</button>

				<!-- Modal -->
				<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="blog-post-title"><?php echo $rows['title']; ?></h4>
					</div>
					<div class="modal-body">
						<p><?php echo $rows['date']; ?>, by <?php echo $rows['username']; ?></p>
					</div>
					<div class="modal-body">
						<p><?php echo $rows['body'];?></p>
					</div>
					<br>
					<br>
					<div class="modal-footer">
					
					
					
					
					
					</div>

					<div class="modal-footer">
					<?php echo "<form method='POST' action='".setComments($db)."'>
						<br></br>
						<input type='hidden' name='uid' value='Anon'>
						<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
						<textarea name='message'> </textarea>
						<br></br>
						<button name='commentSubmit' type='submit1'>Comment</button>
					</form>";
					?>
					
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
					</div>
				</div>
			
			
				</div>
			</div>
			
			

		<?php } }
			else {
				echo '<div>ggjhghjgjh</div>';
			}?>
		
		
	    </div>
<<<<<<< HEAD
		</body>  
=======

		<?php include("includes/footer.php");?>
		
>>>>>>> 09948ddb6e6edca9c174db101ea3e66ca59c2faa
	</main>
</html>