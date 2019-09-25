<?php

$content = $_GET['message'];


$db = new mysqli("localhost", "root", "", "blogCMS");
if ($db->connect_error) {
	die('Could not connect: '.$db->connect_error);
}

$sql = "INSERT INTO comment VALUES(NULL, NULL, NOW(), ?)";
$stmt = $db->prepare($sql);
$stmt->bind_param("s", $content); //bind two strings to $sql
if($stmt-> execute()) {
	echo "success";
} else {
	echo "failure";
}	
	






