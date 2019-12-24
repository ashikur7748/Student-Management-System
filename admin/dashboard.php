<?php
require_once 'config.php';
?>
				<h2 class="text-primary"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard <small class="text-muted">Statistics Overview</small></h2>
				<div>
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</li>
					  </ol>
					</nav>
				</div>
<?php
$count_student = mysqli_query($link, "SELECT * FROM `add_student`");
$total_student = mysqli_num_rows($count_student);

$count_users = mysqli_query($link, "SELECT * FROM `user_information`");
$total_users = mysqli_num_rows($count_users);

?>
				<div class="row pb-4">
					<div class="col-sm-4">
						<div class="card bg-primary">
							<div class="card-header">
								<div class="row">
									<div class="col-sm-3">
										<i class="fas fa-user-graduate fa-5x text-white"></i>
									</div>

									<div class="col-sm-9">
										<div class="text-white float-right" style="font-size: 45px;">
											<?=$total_student;?>
										</div>
										
										<div class="clearfix"></div>

										<div class="float-right text-white">
											Total Students
										</div>

									</div>
								</div>
							</div>

							<a href="admin.php?page=all-student" style="background-color:  #fdfefe; text-decoration: none; font-size: 14px;">
								<div class="card-footer">
								   <span class="">View all student</span>
								   <span class="float-right"><i class="far fa-arrow-alt-circle-right"></i></span>
							    </div>
							</a>

						</div>
					</div>
					
					<div class="col-sm-4">
						<div class="card bg-primary">
							<div class="card-header">
								<div class="row">
									<div class="col-sm-3">
										<i class="fas fa-users fa-5x text-white"></i>
									</div>

									<div class="col-sm-9">
										<div class="text-white float-right" style="font-size: 45px;">
											<?=$total_users;?>
										</div>
										
										<div class="clearfix"></div>

										<div class="float-right text-white">
											Total Users
										</div>

									</div>
								</div>
							</div>

							<a href="admin.php?page=all-users" style="background-color:  #fdfefe; text-decoration: none; font-size: 14px;">
								<div class="card-footer">
								   <span class="">View all users</span>
								   <span class="float-right"><i class="far fa-arrow-alt-circle-right"></i></span>
							    </div>
							</a>

						</div>
					</div>



				</div>
				<hr>
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
						<tr>
							<th>ID <a href="" class="float-right"><i class="fas fa-long-arrow-alt-down"></i><i class="fas fa-long-arrow-alt-up"></i></a></th>
							<th>Name <a href="" class="float-right"><i class="fas fa-long-arrow-alt-down"></i><i class="fas fa-long-arrow-alt-up"></i></a></th>
							<th>Roll <a href="" class="float-right"><i class="fas fa-long-arrow-alt-down"></i><i class="fas fa-long-arrow-alt-up"></i></a></th>
							<th>Class <a href="" class="float-right"><i class="fas fa-long-arrow-alt-down"></i><i class="fas fa-long-arrow-alt-up"></i></a></th>
							<th>Contact <a href="" class="float-right"><i class="fas fa-long-arrow-alt-down"></i><i class="fas fa-long-arrow-alt-up"></i></a></th>
							<th>City <a href="" class="float-right"><i class="fas fa-long-arrow-alt-down"></i><i class="fas fa-long-arrow-alt-up"></i></a></th>
							<th class="text-center">Photo </th>
						</tr>

						<?php
							$i=1;
							$show_query = mysqli_query($link,"SELECT * FROM `add_student`");

							while($row = mysqli_fetch_assoc($show_query)){?>

						<tr>
							<td><?=$i;?></td>
							<td><?=ucwords($row['name']);?></td>
							<td><?=$row['roll'];?></td>
							<td><?=$row['class'];?></td>
							<td><?=$row['contact'];?></td>
							<td><?=$row['city'];?></td>
							<td class="text-center">
								<img width="80px" height="80px" src="student_photo/<?= $row['photo'];?>" alt="">
							</td>
							
						</tr>

							<?php
							 $i++;} ?>

						
					</table>
			