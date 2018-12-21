<?php
include('connect.php');
include('header.php');

if(!isset($_SESSION['user_id'])) header('location:index.php');

$query = "SELECT * FROM products";
$result = $mysqli->query($query);

if($result->num_rows > 0) {
?>

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
		<tr class="d-flex">
			<td class="col-lg-2"><?php echo $row['id']; ?></td>
			<td class="col-lg-2"><?php echo $row['title']; ?></td>
			<td class="col-lg-4"><?php echo $row['description']; ?></td>
			<td class="col-lg-2"><?php echo $row['price']; ?></td>
			<td class="col-lg-2">
				<a type="button" class="btn btn-success btn-action" href="viewProduct.php?id=<?php echo $row['id']; ?>"><i class="fas fa-eye fa-fw"></i></a>
				<a type="button" class="btn btn-primary btn-action" href="editProduct.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit fa-fw"></i></a>
				<a type="button" class="btn btn-danger btn-action" href="deleteProduct.php?id=<?php echo $row['id']; ?>"><i class="fas fa-times fa-fw"></i></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<?php } ?>

<?php include('footer.php'); ?>