
<?php
require_once 'config.php';
?>


<h2 class="text-primary"><i class="fas fa-users mr-2"></i>All Users<small class="text-muted">All Users</small></h2>
				<div>
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					  	<li class="nav-item mr-3"><a href="admin.php?page=dashboard"><i class="fas fa-tachometer-alt mr-1"></i>Dashboard</a></li>
					  	<li class="nav-item mr-3"> <a href="admin.php?page=all-student"><i class="fas fa-user-graduate mr-1"></i>all students</a></li>
					    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-users mr-1"></i>all users</li>
					  </ol>
					</nav>
				</div>

<div class="mt-4">
					<h3 class="text-muted">New Student</h3>
					<div class="row mb-2">
						<div class="col-sm-2">
							<form class="form-inline text-muted" action="" method="post">
								<label for="Show">Show</label>
								<select class="form-control form-control-sm ml-2" id="Show">
								  <option>10</option>
								  <option>20</option>
								  <option>30</option>
								  <option>40</option>
								</select>
							</form>
						</div>
						<div class="col-sm-10">
							<form class="form-inline float-right">
						      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
						    </form>
						</div>
					</div>

					<table class="table table-bordered text-muted">
						<tr class="text-center">
							<th>ID</th>
							<th>Username</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Gender</th>
							<th>Image</th>
						</tr>

						<?php
							$i=1;
							$show_query = mysqli_query($link,"SELECT * FROM `user_information`");

							while($row = mysqli_fetch_assoc($show_query)){?>

						<tr class="text-center">
							<td><?=$i;?></td>
							<td><?=$row['username'];?></td>
							<td><?=$row['email'];?></td>
							<td><?=$row['phone'];?></td>
							<td><?=$row['gender'];?></td>
							<td>
								<img width="80px" height="80px" src="user_photo/<?php echo $row['image'];?>" alt="image"/>
							</td>
						</tr>

							<?php
							$i++; } ?>

						
					</table>
			