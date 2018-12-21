<?php

include('../connect.php');
session_start();

$userId = $_POST['userId'];

if($userId == $_SESSION['user_id']) {
	echo json_encode(["success"=> false]); exit;
}

$query = "DELETE FROM users WHERE id=$userId";

if($mysqli->query($query) == true) {
	echo json_encode(["success"=> true]); exit;
}

echo json_encode(["success"=> false]); exit;

?>