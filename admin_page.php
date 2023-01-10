
<?php
@include 'config.php';

session_start();
if(!isset($_SESSION['admin_name'])) {
	header('location:login_form.php');
}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>admin Page</title>
	<!-- custom css file link -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<div class="container">
		<div class="content">
			<h3>hi, <span>admin</span></h3>
			<h1>welcome <span><?php echo $_SESSION['admin_name']  ?></span></h1>
			<p>This is The admin Page</p>
			<a href="admin" class="btn">Login</a>
			<a href="register_form.php" class="btn">Register</a>
			<a href="logout.php" class="btn">Logout</a>
			
		</div>
		
	</div>

</body>
</html>