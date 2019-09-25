<?php
	include('includes/dbh.inc.php');
	date_default_timezone_set('Australia/Brisbane');
	include('includes/comments.inc.php');
	include_once('geoplugin.class.php');
	$geoplugin = new geoPlugin();
	$geoplugin->locate();
	$geoplugin->city;
	$geoplugin->countryName;
	$geoplugin->latitude;
	$geoplugin->longitude;
?>




<!DOCTYPE html>
<html>

<meta charset="UTF-8">
  <head>
  	
	<link href="css/blog.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">

    <style>
       #map {
        height: 400px;
        width: 75%;
       }
    </style>
  </head>
  
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
      <h1 class="displa	y-4 font-italic">Title of a longer featured blog post</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
      <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
    </div>
  </div>
</div>

  
  <body>
    <h3>Location: <?php echo $geoplugin->city;?>(<?php echo $geoplugin->countryName;?>)</h3>
    <div id="map"></div>
    <script>
      function initMap() {
        var location = {lat: <?php echo $geoplugin->latitude;?>, lng: <?php echo $geoplugin->longitude;?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: location
        });
        var marker = new google.maps.Marker({
          position: location,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK6m5423mkMlscF_dfW_6xTlkglZBzlE4&callback=initMap">
    </script>
	<br>
	<br>
	
	<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">View Comments</button>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Maps Comments</h4>
      </div>
	  <div class="modal-footer">
		<br>
		  <button formaction="test.php" class="btn btn-default" >Place Comment</button>
	  </div>
      <div class="modal-body">
		<?php getComments($db); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<br>
<br>

	<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">Make Post</button>
<!-- Modal -->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Whats on your mind?</h4>
      </div>
	  <div class="modal-footer">
		<br>
		  <button formaction="test.php" class="btn btn-default" >Create Post</button>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

	
  </body>
  
  <?php include("includes/footer.php");?>

</html>