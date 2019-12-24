
<?php
require_once 'config.php';
?>


<h2 class="text-primary"><i class="fas fa-user-graduate mr-2"></i>All Student <small class="text-muted">All Students</small></h2>
				<div>
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					  	<li class="nav-item mr-3"><a href="admin.php?page=dashboard"><i class="fas fa-tachometer-alt mr-1"></i>Dashboard</a></li>
					    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-graduate mr-1"></i>all students</li>
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
						<tr>
							<th>ID <a href="" class="float-right"><i class="fas fa-long-arrow-alt-down"></i><i class="fas fa-long-arrow-alt-up"></i></a></th>
							<th>Name <a href="" class="float-right"><i class="fas fa-long-arrow-alt-down"></i><i class="fas fa-long-arrow-alt-up"></i></a></th>
							<th>Roll <a href="" class="float-right"><i class="fas fa-long-arrow-alt-down"></i><i class="fas fa-long-arrow-alt-up"></i></a></th>
							<th>Class <a href="" class="float-right"><i class="fas fa-long-arrow-alt-down"></i><i class="fas fa-long-arrow-alt-up"></i></a></th>
							<th>Contact <a href="" class="float-right"><i class="fas fa-long-arrow-alt-down"></i><i class="fas fa-long-arrow-alt-up"></i></a></th>
							<th>City <a href="" class="float-right"><i class="fas fa-long-arrow-alt-down"></i><i class="fas fa-long-arrow-alt-up"></i></a></th>
							<th class="text-center">Photo </th>
							<th class="text-center">Action</th>
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
								<img width="80px" height="80px" src="student_photo/<?php echo $row['photo'];?>" alt=""/>
							</td>
							<td class="text-center">
								<a href="admin.php?page=update-student&id=<?=base64_encode($row['id']);?>" class="btn btn-sm btn-warning mr-1"><i class="far fa-edit mr-1"></i>Edit</a>

								<a href="delete.php?id=<?=base64_encode($row['id']);?>" class="btn btn-sm btn-danger"><i class="far fa-trash-alt mr-1"></i>Delete</a>
							</td>
							
						</tr>

							<?php
							$i++; } ?>

						
					</table>
			