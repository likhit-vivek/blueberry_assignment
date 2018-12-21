<?php include('header.php'); ?>

<div class="row align-items-center vertical-align-container">
	<div class="col"></div>
	<div class="col-lg-6 align-self-center">
		<h2 class="text-center form-heading">Add a new user</h2>
		<div class="alert alert-success d-none">User created successfully!</div>
		<div class="alert alert-danger d-none"></div>
		<form id="user-form" action="creatingUser.php" method="POST">
			<div class="form-group">
				<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name" value="viewer1">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name" value="blueberry">
			</div>
			<div class="form-group">
				<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="viewer1@blueberry.com">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password" value="viewer1">
			</div>
			<div class="form-group">
				<select class="form-control" id="role" name="role">
					<option value="" disabled hidden>Choose a role for the user</option>
					<option value="1">Admin</option>
					<option value="2">Editor</option>
					<option value="3" selected>Viewer</option>
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