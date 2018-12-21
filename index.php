<?php 
include('connect.php');
include('header.php');

if(isset($_SESSION['user_id'])) header("location:home.php");

$error_msg = "";

if($_SERVER['REQUEST_METHOD'] == "POST") {
	
	$email = $_POST['email'];
	$password = md5($_POST['pswd']);
	
	$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
	$result = $mysqli->query($query);
	
	if($result->num_rows == 1) {
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['user_role'] = $row['role'];
		header("location:home.php");
	} else {
		$error_msg = "Invalid username/password";
	}
}
?>

	<div class="text-center login-container">
		<div class="col-lg-5 col-xl-4 login-area">
			<form method="POST">
				<?php if($error_msg != "") { ?>
					<div class="alert alert-danger">
						<?php echo $error_msg; ?>
					</div>
				<?php } ?>
				<div class="form-group">
					<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
				</div>
				<button type="submit" class="btn btn-primary col-12">Login</button>
			</form>
		</div>
	</div>
	
<?php include('footer.php'); ?>