<?php

include('connect.php');

if(empty($_POST['productId'] || $_POST['title']) || empty($_POST['desc']) || empty($_POST['price'])) {
	echo json_encode(["success"=> false, "msg"=> "Please enter all values"]); exit;
}

$id = $_POST['productId'];
$title = $_POST['title'];
$description = $_POST['desc'];
$price = $_POST['price'];

$query = "SELECT * FROM products where title='$title'";
$result = $mysqli->query($query);

if($result->num_rows > 0 && $result->fetch_array(MYSQLI_ASSOC)['id'] != $id) {
	echo json_encode(["success"=> false, "msg"=> "Product name already exists"]); exit;
}

$query = "UPDATE products SET title='$title', description='$description', price=$price WHERE id=$id";

if($mysqli->query($query) == true) {
	echo json_encode(["success"=> true, "msg"=> "successful"]); exit;
}

echo json_encode(["success"=> false, "msg"=> "Unable to create user. Try again."]); exit;

?>