
<?php
require_once 'config.php';

	$id = base64_decode($_GET['id']);
	$data_select = mysqli_query($link, "SELECT * FROM `add_student` WHERE `id`= '$id' ");
	$data_row = mysqli_fetch_assoc($data_select);

if (isset($_POST['update'])) {
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

	$data_query = mysqli_query($link, "UPDATE `add_student` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`contact`='$contact',`photo`='$photo_new_name' WHERE  id='$id' ");
	if ($data_query) {
		move_uploaded_file($_FILES['photo']['tmp_name'], 'student_photo/'.$photo_new_name);
		header('Location: admin.php?page=all-student');
	}

	}
?>



<h2 class="text-primary"><i class="fas fa-edit mr-2"></i>Updaate Student<small class="text-muted ml-2">Update Student</small></h2>
				<div>
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					  	<li class="nav-item mr-3"><a href="admin.php?page=dashboard"><i class="fas fa-tachometer-alt mr-1"></i>Dashboard</a></li>
					  	<li class="nav-item mr-3"><a href="admin.php?page=all-student"><i class="fas fa-user-graduate mr-1"></i>All Student</a></li>
					    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-edit mr-1"></i>Update student</li>
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
							    <input type="text" class="form-control" id="name" name="name" placeholder="Full name" value="<?=$data_row['name']?>">
							</div>

							<div class="form-group">
							    <label for="roll">Student Roll</label>
							    <input type="text" class="form-control" id="roll" name="roll" placeholder="Roll" pattern="[0-9]{6}" value="<?=$data_row['roll']?>">
							</div>

							<div class="form-group">
							    <label for="class">Class</label>
							    <select name="class" class="form-control" id="class" >
							    	<option value="">Select</option>
									  <option <?=$data_row['class'] == 'One'? 'selected' : '';?> value="One">One</option>
									  <option value="Two">Two</option>
									  <option value="Three">Three</option>
									  <option value="Four">Four</option>
									  <option value="Five">Five</option>
									  <option value="Six">Six</option>
									  <option value="Seven">Seven</option>
									  <option value="Eight">Eight</option>
									  <option value="Nine">Nine</option>
									  <option <?php echo $data_row['class'] == 'Ten'? 'selected' : '';?> value="Ten">Ten</option>
									  
								</select>
							</div>

							<div class="form-group">
							    <label for="city">City</label>
							    <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?=$data_row['city']?>">
							</div>

							<div class="form-group">
							    <label for="contact">Contact</label>
							    <input type="text" class="form-control" id="contact" name="contact" placeholder="01********" pattern="01[7|5|6|8|9|4|3][0-9]{8}"  value="<?=$data_row['contact']?>">
							</div>

							<div class="form-group">
							    <label for="photo">Photo</label>
							    <input type="file" class="form-control-file" name="photo" id="photo">
							</div>

							<input type="submit" value="Update Student" name="update" class="btn btn-success float-right">
						</form>
					</div>
				</div>