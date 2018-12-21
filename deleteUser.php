<?php

include('connect.php');

$userId = $_POST['userId'];
$role = $_POST['role'];

if($userId == $_SESSION['user_id']) return json_encode({"success": false});

$query = "DELETE FROM users WHERE id=$userId";

if($mysqli->query($query) == true) return json_encode({"success": true});

return json_encode({"success": false});

?>