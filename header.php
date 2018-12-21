<!DOCTYPE HTML>
<html>

<head>
    <title>Blueberry Products</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="custom.js"></script>
</head>

<?php 
error_reporting(0);
session_start();
?>

<body>
	<div class="header">
		<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
			<a class="navbar-brand" href="home.php">
				Blueberry
			</a>
			
			<?php if(isset($_SESSION['user_id'])) { ?>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="home.php">Products</a>
				</li>
				<?php if($_SESSION['user_role'] == 1) { ?>
				<li class="nav-item">
					<a class="nav-link" href="users.php">Users</a>
				</li>
				<?php } ?>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Sign out</a>
				</li>
			</ul>
			<?php } ?>
		</nav>
	</div>
	<div class="container main">