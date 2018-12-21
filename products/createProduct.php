<?php 

include('../header.php'); 
if(!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 1 && $_SESSION['user_role'] != 2) {
	header('location:../index.php'); exit;
}

?>

<div class="row align-items-center vertical-align-container">
	<div class="col"></div>
	<div class="col-lg-6 align-self-center">
		<h2 class="text-center form-heading">Add a new product</h2>
		<div class="alert alert-success d-none">Product created successfully!</div>
		<div class="alert alert-danger d-none"></div>
		<form id="user-form" action="creatingProduct.php" method="POST">
			<div class="form-group">
				<input type="text" class="form-control" id="title" name="title" placeholder="Enter product title">
			</div>
			<div class="form-group">
				<textarea class="form-control" rows="5" id="desc" name="desc" maxlength="250" placeholder="Enter product desc (Max 250 characters)"></textarea>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="price" name="price" placeholder="Enter price">
			</div>
			<div class="form-group text-center">
				<button type="submit" class="btn btn-primary col-lg-3">Submit</button>
			</div>
		</form>
	</div>
	<div class="col"></div>
</div>

<?php include('../footer.php'); ?>