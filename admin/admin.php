<?php
session_start();
if (!$_SESSION['user_login']) {
	header('Location: ../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/style.css">
	<title>School Management System</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand" href="#"><img src="../Images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="Logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav ml-auto ">
      <li class="nav-item active">
        <a class="nav-link text-white" href="#">Welcome<i class="fas fa-user-circle mx-1"></i>Ashikur<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#"><i class="fas fa-user-plus mr-1 "></i>Add user</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#"><i class="fas fa-user mr-1"></i>Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="logout.php"><i class="fas fa-power-off mr-1 text-danger"></i>Logout</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid bg-light">
	<div class="row pt-4">
	    <div class="col-md-3">
			<div class="list-group">
			  <a href="admin.php?page=dashboard" class="list-group-item list-group-item-action active">
			    <i class="fas fa-tachometer-alt mr-2"></i>Dhashboard
			  </a>
			  <a href="admin.php?page=add-student" class="list-group-item list-group-item-action"><i class="fas fa-user-plus mr-2 "></i>Add Student</a>
			  <a href="admin.php?page=update-student" class="list-group-item list-group-item-action"><i class="fas fa-edit mr-2"></i>Update Student</a>
			  <a href="admin.php?page=all-student" class="list-group-item list-group-item-action"><i class="fas fa-user-graduate mr-2"></i>All Student</a>
			  <a href="admin.php?page=all-users" class="list-group-item list-group-item-action"><i class="fas fa-users mr-2"></i>All Users</a>
			</div>
	    </div>
	

		<div class="col-md-9">
			<div class="content">
			   <?php

			   if (isset($_GET['page'])) {
			   	 $page = $_GET['page'].'.php';
			   }else{
			   	$page = "dashboard.php";
			   }

			   if (file_exists($page)) {
			   	require_once $page;
			   }
			   
			   ?>
		    </div>
			</div>
		</div>


		<!-- ##### Footer Area  ### --->
	<div class="row">
		<div class="col-sm-12 col-md-12 bg-secondary">
			<div class="text-center text-white py-3">
				<small class="">&copy; 2019-<?php echo date('Y');?> Ashikur all right reserved</small>
			</div>
		</div>
	</div>
	</div>

</div>
</body>
</html>