
<?php
require_once 'config.php';

if (isset($_POST['add'])) {
	$name = $_POST['name'];
	$roll = $_POST['roll'];
	$city = $_POST['city'];
	$contact = $_POST['contact'];
	$class = $_POST['class'];

	if (isset($_FILES['photo']['name'])) {
		$photo = $_FILES['photo']['name'];
		$photo_break = explode('.', $photo);
		$photo_ex = end($photo_break);
		$photo_new_name = $name.'.'.$photo_ex;
	}
	
	$insert_query = "INSERT INTO `add_student`(`name`, `roll`, `class`, `city`, `contact`, `photo`)
	 VALUES ('$name', '$roll', '$city', '$contact', '$class', '$photo')";
	 $query_run = mysqli_query($link, $insert_query);
	 if ($query_run) {
	 	move_uploaded_file($_FILES['photo']['tmp_name'], 'student_photo/'.$photo_new_name);
	 	    $insert_success = "Data Save Successfully";
	 }else{
	 	 $insert_error = "Data Not Save";
	 }
	
}
?>


<h2 class="text-primary"><i class="fas fa-user-plus mr-2"></i>Add Student <small class="text-muted">Add New Student</small></h2>
				<div>
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					  	<li class="nav-item mr-3"><a href="admin.php?page=dashboard"><i class="fas fa-tachometer-alt mr-1"></i>Dashboard</a></li>
					    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-plus mr-1"></i>add student</li>
					  </ol>
					</nav>
				</div>


				<div class="row mb-5">
					<div class="col-sm-6">
						
						<?php if(isset($insert_success)){ echo '<div class="alert alert-success text-center font-weight-bold">'.$insert_success.'</div>';}?>
			           <?php if(isset($insert_error)){ echo '<div class="alert alert-success text-center font-weight-bold">'.$insert_error.'</div>';}?>

						<form action="" method="post" enctype="multipart/form-data">
							<div class="form-group">
							    <label for="name">Student Name</label>
							    <input type="text" class="form-control" id="name" name="name" placeholder="Full name" required="">
							</div>

							<div class="form-group">
							    <label for="roll">Student Roll</label>
							    <input type="text" class="form-control" id="roll" name="roll" placeholder="Roll" pattern="[0-9]{6}">
							</div>

							<div class="form-group">
							    <label for="class">Class</label>
							    <select name="class" class="form-control" id="class">
									  <option value="One">One</option>
									  <option value="Two">Two</option>
									  <option value="Three">Three</option>
									  <option value="Four">Four</option>
									  <option value="Five">Five</option>
									  <option value="Six">Six</option>
									  <option value="Seven">Seven</option>
									  <option value="Eight">Eight</option>
									  <option value="Nine">Nine</option>
									  <option value="Ten">Ten</option>
									  
								</select>
							</div>

							<div class="form-group">
							    <label for="city">City</label>
							    <input type="text" class="form-control" id="city" name="city" placeholder="City" required="">
							</div>

							<div class="form-group">
							    <label for="contact">Contact</label>
							    <input type="text" class="form-control" id="contact" name="contact" placeholder="01********" pattern="01[7|5|6|8|9|4|3][0-9]{8}" >
							</div>

							<div class="form-group">
							    <label for="photo">Photo</label>
							    <input type="file" class="form-control-file" name="photo" id="photo" required="">
							</div>

							<input type="submit" value="Add Student" name="add" class="btn btn-success">
						</form>
					</div>
				</div>