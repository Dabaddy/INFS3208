<?php
	session_start();

	include ("config.php");
	include ("db.php");
	
	date_default_timezone_set('Australia/Brisbane');
	
	$query = "SELECT * FROM categories";
	
	$categories = $db->query($query);
	
	
	
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>BlogCMS</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="css/blog.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            <a class="blog-header-logo text-dark" href="index.php">Home</a>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="userhome.php">Tumble</a>
          </div>
        </div>
      </header>
	</div>

<!-- Fetch categories headers from database and display them in header -->	
      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
		  
		  <?php if ($categories->num_rows > 0) { 
		  while($row = $categories->fetch_assoc()){
		  ?>	 
<!-- Echo the ID so post with the same categoryID get displayed on same page -->		  
		  <a class="nav-scroller-item" href="index.php?category=<?php echo $row['category_id']; ?>"><?php echo $row['text']; ?></a>
		  <?php }}?>
		  
        </nav>
      </div>
<!-- NOT COMPLETE, want the search bar to stretch across the whole width -->
	    <div class="form-group row">
			<form method="get" action="results.php" class="form-inline">	
			<div class="col-sm-10">
				<input type="text" name="Search" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Search...">
			</div>
		</div>	