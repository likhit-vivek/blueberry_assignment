<?php 
include('connect.php');
include('header.php'); 
if(!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 1 && $_SESSION['user_role'] != 2) {
	header('location:index.php'); exit;
}

if(!isset($_GET['id'])) {
	echo "<h2>Please select a product to update</h2>"; exit;
}

$id = $_GET['id'];

$query = "SELECT * FROM products WHERE id=$id";
$result = $mysqli->query($query);

if($result->num_rows == 1) {
	while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>

		<div class="row align-items-center vertical-align-container">
			<div class="col"></div>
			<div class="col-lg-6 align-self-center">
				<h2 class="text-center form-heading">Update <?php echo $row['title']; ?></h2>
				<div class="alert alert-success d-none">Product updated successfully!</div>
				<div class="alert alert-danger d-none"></div>
				<form id="user-form" action="updatingProduct.php" method="POST">
					<input type="hidden" class="form-control" name="productId" value="<?php echo $row['id']; ?>">
					<div class="form-group">
						<input type="text" class="form-control" id="title" name="title" placeholder="Enter product title" value="<?php echo $row['title']; ?>">
					</div>
					<div class="form-group">
						<textarea class="form-control" rows="5" id="desc" name="desc" maxlength="250" placeholder="Enter product desc (Max 250 characters)"><?php echo $row['description']; ?></textarea>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="price" name="price" placeholder="Enter price" value="<?php echo $row['price']; ?>">
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary col-lg-3">Update</button>
					</div>
				</form>
			</div>
			<div class="col"></div>
		</div>

<?php }
}
include('footer.php'); 
?>