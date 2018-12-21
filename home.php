<?php
include('connect.php');
include('header.php');

if(!isset($_SESSION['user_id'])) {
	header('location:index.php'); exit;
}

$query = "SELECT * FROM products";
$result = $mysqli->query($query);

if($result->num_rows > 0) {
	if($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 2) {
?>

<div class="create-button text-right">
	<a href="createProduct.php" type="button" class="btn btn-primary"><i class="fas fa-plus fa-fw"></i></a>
</div>
<?php } ?>
<div class="alert alert-success d-none">Product deleted successfully!</div>
<div class="alert alert-danger d-none">Delete operation failed!!</div>
<table class="table table-responsive-md table-hover">
	<thead>
		<tr class="d-flex">
			<th class="col-lg-2">Product ID</th>
			<th class="col-lg-2">Title</th>
			<th class="col-lg-4">Description</th>
			<th class="col-lg-2">Price</th>
			<th class="col-lg-2">Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
		<tr class="d-flex" id="<?php echo $row['id']; ?>">
			<td class="col-lg-2"><?php echo $row['id']; ?></td>
			<td class="col-lg-2"><?php echo $row['title']; ?></td>
			<td class="col-lg-4"><?php echo $row['description']; ?></td>
			<td class="col-lg-2"><?php echo $row['price']; ?></td>
			<td class="col-lg-2">
				<a type="button" class="btn btn-success btn-action" href="viewProduct.php?id=<?php echo $row['id']; ?>"><i class="fas fa-eye fa-fw"></i></a>  
				<?php if($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 2) { ?>
				<a type="button" class="btn btn-primary btn-action" href="updateProduct.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit fa-fw"></i></a>
				<?php } if($_SESSION['user_role'] == 1) { ?>
				<a type="button" class="btn btn-danger btn-action" onclick="deleteProduct(<?php echo $row['id'];?>)"><i class="fas fa-times fa-fw"></i></a>
				<?php } ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<?php } ?>

<?php include('footer.php'); ?>