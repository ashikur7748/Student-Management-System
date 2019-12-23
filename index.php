
<?php
	require_once 'admin/config.php';
    require_once 'admin/login.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/style.css">
	<title>School Management System</title>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col">
		<!--Nav area start-->
		
			<nav class="navbar navbar-light bg-">
			  <a class="navbar-brand" href="index.php">
			    <img src="Images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="Logo">
			  </a>

			  <a class="pull-right btn btn-success text-white" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">LOGIN</a>

					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">

					        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
					           <span class="btn btn-danger" aria-hidden="true">&times;</span>
					        </button>

					    <div class="modal-body">
					        <form action="index.php" method="POST">
								 <h2 class=" text-secondary text-center">Login Form</h2>
								  <div class="form-group">
								    <label for="exampleInputEmail1" class="text-muted">Username</label>
								    <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Username" value="<?php if(isset($username)){echo $username;}?>">
								  </div>
								  <div class="form-group">
								    <label for="exampleInputPassword1" class="text-muted">Password</label>
								    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" value="<?php if(isset($password)){echo $password;}?>">
								  </div>
								  <div class="form-group">
							          <input type="submit" name="login" value="Login" class="btn btn-success float-right mb-2">
							      </div>
							</form>
						        <div class="mt-2">
									<small>Don't have account? <a href="admin/registration.php">Register here</a></small>
								</div>
								<?php if(isset($username_error)){ echo '<div class="alert alert-danger text-center font-weight-bold mt-4">'.$username_error.'<i class="fas fa-exclamation-circle ml-1"></i>'.'</div>';}?>
								<?php if(isset($password_error)){ echo '<div class="alert alert-danger text-center font-weight-bold mt-4">'.$password_error.'<i class="fas fa-exclamation-circle ml-1"></i>'.'</div>';}?>
					    </div>
					    </div>
					  </div>
					</div>

			</nav>
		   <!--Nav area end-->

		   <div>
		   	<h1 class="display-4 text-center text-muted font-weight-bold animated fadeInLeft">Student Management System</h1>
		   </div>

		   <div class="row mt-5"> 
		   	<div class="col-sm-12 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
		   		<div class="animated zoomIn">
		   		<form action="" method="POST">
		   			<table class=" table table-bordered">
		   				<tr>
		   					<td colspan="2" class="text-center font-weight-bold text-muted"><label for="dept">Student Information</label></td>
		   				</tr>
		   				<tr>
		   					<td><label for="dept" class="text-muted">Department</label></td>
		   					<td>
		   						<select name="dept" id="dept" class="form-control">
		   							<option selected="">Choose</option>
		   							<option value="CSE">CSE</option>
		   							<option value="EEE">EEE</option>
		   							<option value="TEX">TEX</option>
		   							<option value="CE">CE</option>
		   							<option value="LAW">LAW</option>
		   						</select>
		   					</td>
		   				</tr>
		   				<tr>
		   					<td><label for="roll" class="text-muted">Roll No</label></td>
		   					<td>
		   						<input class="form-control" type="text" name="roll" placeholder="Roll" id="roll">
		   					</td>
		   				</tr>
		   				<tr>
		   					<td colspan="2" class="text-center">
		   						<input type="submit" name="submit" value="Show Info" class="btn btn-light btn-block text-muted">
		   					</td>

		   				</tr>
		   			</table>
		   		</form>
		   	</div>
		   	</div>
		   </div>
		</div>
	</div>
</div>

<div class="container mt-5 pt-5">
	<div class="row">
		<div class="col">
			<div class="text-center">
				<small class="text-muted">&copy; 2019-<?php echo date('Y');?> Ashikur all right reserved</small>
			</div>
		</div>
	</div>
</div>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>	

	
</body>
</html>