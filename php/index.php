<?php
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
echo "Connected successfully";
?>