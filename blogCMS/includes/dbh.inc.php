<?php
 
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "blogcms";	

$db = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(!$db) {
	die("Connection Failed: ".mysqli_connect_error());
}