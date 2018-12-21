<?php
include('../connect.php');
include('../header.php');
include('../constants.php');

if(!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 1) header('location:../index.php');

$query = "SELECT * FROM users";
$result = $mysqli->query($query);

if($result->num_rows > 0) {
?>

<div class="create-button text-right">
	<a href="createUser.php" type="button" class="btn btn-primary"><i class="fas fa-user-plus fa-fw"></i></a>
</div>
<div class="alert alert-success d-none">User deleted successfully!</div>
<div class="alert alert-danger d-none">Delete operation failed!!</div>
<table class="table table-responsive-md table-hover">
	<thead>
		<tr class="d-flex">
			<th class="col-lg-2">User ID</th>
			<th class="col-lg-3">Name</th>
			<th class="col-lg-3">Email</th>
			<th class="col-lg-2">Role</th>
			<th class="col-lg-2">Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
		<tr class="d-flex" id="<?php echo $row['id']; ?>">
			<td class="col-lg-2"><?php echo $row['id']; ?></td>
			<td class="col-lg-3"><?php echo $row['firstname']." ".$row['lastname']; ?></td>
			<td class="col-lg-3"><?php echo $row['email']; ?></td>
			<td class="col-lg-2"><?php echo $roles[$row['role']]; ?></td>
			<td class="col-lg-2">
				<a type="button" class="btn btn-danger btn-action" onclick="deleteUser(<?php echo $row['id'];?>)"><i class="fas fa-times fa-fw"></i></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<?php } ?>

<?php include('../footer.php'); ?>