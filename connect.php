<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'blueberry_test');

$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$server = $cleardb_url['host'];
$username = $cleardb_url['user'];
$password = $cleardb_url['pass'];
$db = substr($cleardb_url["path"], 1);

$mysqli = new mysqli($server, $username, $password, $db);

if($mysqli == false) {
	die("Could not connect. " . $mysqli->connect_error);
}

?>