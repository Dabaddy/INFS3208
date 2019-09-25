<?php


$sql = "SELECT * FROM comment WHERE post_id= ? AND c_id > ?";
 
$db = new mysqli("localhost", "root", "", "blogCMS");
if ($db->connect_error) {
	die('Could not connect: '.$db->connect_error);
}
$stmt = $db->prepare($sql);
$stmt->bind_param("ii", $postId, $cId);
$stmt->execute();
$result = $stmt->get_result();
$comments = array();
while ($row = $result->fetch_array()) {
	$comment = array();
	$comment['id'] = $row['c_id'];
	$comment['messasge'] = $row['message'];
	$comment['time'] = $row['date'];
	array_push($comments, $comment);
}
echo json_encode($comments);
