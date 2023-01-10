<?php

@include 'config.php';
session_start();

if(isset($_POST['submit'])){


$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = md5($_POST['password']);


$select = "SELECT * FROM user_form WHERE email = '$email' && password ='$pass'";

$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0) {

$row = mysqli_fetch_array($result);

if($row['user_type'] == 'admin') {

	$_SESSION['admin_name'] = $row['name'];
	header('location:admin_page.php');

} elseif($row['user_type'] == 'user') {

	$_SESSION['user_name'] = $row['name'];
	header('location:user_page.php');
}

} else {
	$error[] = 'Incorrect email or password';
}

};

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login Page</title>
	<!-- custom css file link -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<div class="form-container">
		<form action="" method="POST">
			<h3>login Now</h3>
			<?php 
			if(isset($error)) {
				foreach($error as $error) {
					echo '<span class="error-msg">'.$error. '</span>';
				};
			};
			
			?>
			<input type="email" name="email" required placeholder="Enter your email">
			<input type="password" name="password" required placeholder="Enter your password">
			<input type="submit" name="submit" value="login now" class="form-btn">
			<p>don't have an account?<a href="register_form.php">register Now</a></p>
			
		</form>
		
	</div>

</body>
</html>