<?php

include('../connect.php');

$id = $_POST['id'];

$query = "DELETE FROM products WHERE id=$id";

if($mysqli->query($query) == true) {
	echo json_encode(["success"=> true]); exit;
}

echo json_encode(["success"=> false]); exit;

?>