<?php
require_once 'config.php';


	$user_p = $_SESSION['user_login'];


$p_query = mysqli_query($link, "SELECT * FROM `user_information` WHERE `username`='$user_p' ");
$p_data = mysqli_fetch_assoc($p_query);

?>


<h2 class="text-primary"><i class="fas fa-user mr-2"></i>User Profile<small class="text-muted ml-2">User Profile</small></h2>
				<div>
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					  	<li class="nav-item mr-3"><a href="admin.php?page=dashboard"><i class="fas fa-tachometer-alt mr-1"></i>Dashboard</a></li>
					  	<li class="nav-item mr-3"> <a href="admin.php?page=all-student"><i class="fas fa-user-graduate mr-1"></i>all students</a></li>
					  	<li class="nav-item mr-3"> <a href="admin.php?page=all-users"><i class="fas fa-users mr-1"></i>all Users</a></li>
					    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user mr-1"></i>User Profile</li>
					  </ol>
					</nav>
				</div>


				<div class="row">
					<div class="col-sm-6">
						<table class="table table-bordered">
							<tr>
								<td>User ID</td>
								<td><?=$p_data['id'];?></td>
							</tr>
							<tr>
								<td>Username</td>
								<td><?=$p_data['username'];?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><?=$p_data['email'];?></td>
							</tr>
							<tr>
								<td>Phone</td>
								<td><?=$p_data['phone'];?></td>
							</tr>
							<tr>
								<td>Gender</td>
								<td><?=$p_data['gender'];?></td>
							</tr>
							<tr>
								<td>Signup</td>
								<td><?=$p_data['registration_datetime'];?></td>
							</tr>
							
						</table>
						<a href="" class="btn btn-primary btn-sm">Edit Profile</a>
					</div>

					<div class="col-sm-6">
						<img class="rounded" width="200px" height="200px" src="user_photo/<?=$p_data['image'];?>" alt="">
						<form action="" enctype="multipart/form-data" method="post">
							<label for="profile">Profile picture</label><br>
							<input type="file" name="profile" id="profile"><br><br>
							<input type="submit" value="Update" name="update" class="btn btn-primary btn-sm">
						</form>
					</div>
				</div>