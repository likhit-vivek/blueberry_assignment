<?php 

include('header.php'); 
if(!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 1) header('location:index.php');

?>

<div class="row align-items-center vertical-align-container">
	<div class="col"></div>
	<div class="col-lg-6 align-self-center">
		<h2 class="text-center form-heading">Add a new user</h2>
		<div class="alert alert-success d-none">User created successfully!</div>
		<div class="alert alert-danger d-none"></div>
		<form id="user-form" action="creatingUser.php" method="POST">
			<div class="form-group">
				<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name">
			</div>
			<div class="form-group">
				<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
			</div>
			<div class="form-group">
				<select class="form-control" id="role" name="role">
					<option value="" selected disabled hidden>Choose a role for the user</option>
					<option value="1">Admin</option>
					<option value="2">Editor</option>
					<option value="3">Viewer</option>
				</select>
			</div>
			<div class="form-group text-center">
				<button type="submit" class="btn btn-primary col-lg-3">Submit</button>
			</div>
		</form>
	</div>
	<div class="col"></div>
</div>

<?php include('footer.php'); ?>