<?php
include('connect.php');
include('header.php');

if(!isset($_GET['id'])) {
	echo "<h2>Please select a product to view</h2>"; exit;
}

$productId = $_GET['id'];

$query = "SELECT * FROM products WHERE id=$productId";
$result = $mysqli->query($query);

if($result->num_rows == 1) {
	while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
		
		<div class="row align-items-center vertical-align-container">
			<div class="col"></div>
			<div class="col-lg-6 self-align-center">
				<h2><?php echo $row['title']; ?></h2>
				<div><?php echo $row['description']; ?></div>
				<div><b>Priced at Rs. <?php echo $row['price']; ?></b></div>
			</div>
			<div class="col"></div>
		</div>
	<?php }
}

include('footer.php');

?>