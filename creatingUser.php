<?php

include('connect.php');

if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['pwd']) || empty($_POST['role'])) {
	echo json_encode(["success"=> false, "msg"=> "Please enter all values"]); exit;
}

$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$email = $_POST['email'];
$password = md5($_POST['pwd']);
$role = $_POST['role'];

$query = "SELECT * FROM users where email='$email'";
$result = $mysqli->query($query);

if($result->num_rows > 0) {
	echo json_encode(["success"=> false, "msg"=> "Email already exists"]); exit;
}

$query = "INSERT INTO users (firstname, lastname, email, password, role) VALUES ('$first_name', '$last_name', '$email', '$password', $role)";

if($mysqli->query($query) == true) {
	echo json_encode(["success"=> true, "msg"=> "successful"]); exit;
}

echo json_encode(["success"=> false, "msg"=> "Unable to create user. Try again."]); exit;

?>