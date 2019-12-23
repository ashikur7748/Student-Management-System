
<?php
	//require_once 'config.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/style.css">
	<title>School Management System</title>
</head>
<body>

<div class="container">
	<div class="row mt-5">
		<div class="col-sm-12 col-md-4 offset-md-4 col-lg-4 offset-lg-4 bg-light p-4 mt-5 animated slideInDown">
		<form>
			<h2 class=" text-secondary text-center">Login Form</h2>
		  <div class="form-group">
		    <label for="exampleInputEmail1" class="text-muted">Username</label>
		    <input type="email" class="form-control" name="username" id="exampleInputEmail1" placeholder="Username">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1" class="text-muted">Password</label>
		    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
		  </div>
		  <button type="submit" name="login" class="btn btn-success float-right mb-4">Login</button>
		</form>

		<div class="mt-5">
			<small>Don't have account? <a href="registration.php">Register here</a></small>
		</div>

		</div>
	</div>
</div>

<script src="../js/bootstrap.min.js"></script>	
</body>
</html>