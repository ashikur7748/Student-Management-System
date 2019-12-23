
<?php
	require_once 'config.php';
	session_start();

// User registration validation

	if (isset($_POST['register'])) {

			$username         = validate($_POST['username']);
			$email            = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
			$phone            = validate($_POST['phone']);
			$password         = validate($_POST['password']);
		    $confirm_password = validate($_POST['confirm_password']);

		if (isset( $_POST['gender'] )) {
			$gender = $_POST['gender'];
		}
				// Create image file name 
				$image = $_FILES['image'] ['name'];
				$image_break = explode('.', $image);
				$image_ex = end($image_break);
				$image_name = $username.'.'.$image_ex;

		$inputError = array();
		
		if (empty($username)) {
			$inputError['username'] = "The username field is required";
		}

		if (empty($email)) {
			$inputError['email'] = "The email field is required";
		}

		if (empty($phone)) {
			$inputError['phone'] = "The phone field is required";
		}
		if (empty($password)) {
			$inputError['password'] = "The password field is required";
		}

		if (empty($confirm_password)) {
			$inputError['confirm_password'] = "The confirm_password field is required";
		}

		
		if(count($inputError)==0){
		   $emailcheck = mysqli_query($link, "SELECT * FROM `user_information` WHERE `email`= '$email'");
		   	if (mysqli_num_rows($emailcheck) == 0) {
		   		$usernamecheck = mysqli_query($link, "SELECT * FROM `user_information` WHERE `username`= '$username'");
		   		if (mysqli_num_rows($usernamecheck) == 0) {
		   			if (strlen($username)>7) {
		   				if (strlen($password)>7) {
		   					if ($password == $confirm_password) {
		   						$data_insert = "INSERT INTO `user_information`(`username`, `email`, `phone`, `password`, `confirm_password`, `gender`, `image`) VALUES ('$username','$email','$phone','$password','$confirm_password','$gender','$image')";
		   						$data_insert_result = mysqli_query($link,$data_insert);
		   						if ($data_insert_result) {
		   							move_uploaded_file($_FILES['image'] ['tmp_name'], 'upload/'.$image_name);
		   							$_SESSION['data_insert_success'] = "Data Save Successfully";
		   							header('Location: registration.php');
		   						}else{
		   							$_SESSION['data_insert_error'] = "Data Not Save";
		   						}
		   					}else{
		   						$password_not_match = "Password is not match";
		   					}
		   				}else{
		   					$passwordlenth = "Password more than 8 caracters";
		   				}
		   			}else{ 
		   				$usernamelenth = "Username more than 8 caracters";
		   				}
		   		 	
		   		 }else{ 
		   		 	$usernameError = "This username is already exits";
		   		 	} 
		   	}else{
		   		$emailError = "This email is already exits";
		   		}
	    }

	}

	// form validation function

		function validate($data){
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
		
	// User registration validation end
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

<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3 bg-light px-5 py-3 animated fadeInDow">
			<div>
			<h3 class="text-center text-info mb-4 font-weight-bold">User Registration</h3>
			<?php if(isset($_SESSION['data_insert_success'])){ echo '<div class="alert alert-success text-center font-weight-bold">'.$_SESSION['data_insert_success'].'</div>'; unset($_SESSION['data_insert_success']);}?>
			
			<?php if(isset($_SESSION['data_insert_error'])){ echo '<div class="alert alert-danger text-center font-weight-bold">'.$_SESSION['data_insert_error'].'</div>'; unset($_SESSION['data_insert_error']);}?>
			<form action="" method="POST" enctype="multipart/form-data">
				
			  <div class="form-group">
			  	<?php if(isset($inputError['username'])){ echo '<div class="text-danger">'.$inputError['username'].'<i class="fas fa-exclamation-circle ml-1"></i>'.'</div>' ;}?>
			  	<?php if(isset($usernameError)){ echo '<div class="text-danger">'.$usernameError.'<i class="fas fa-exclamation-circle ml-1"></i>'.'</div>' ;}?>
			  	<?php if(isset($usernamelenth)){ echo '<div class="text-danger">'.$usernamelenth.'<i class="fas fa-exclamation-circle ml-1"></i>'.'</div>' ;}?>
			    <input type="text" class="form-control" id="exampleInputEmail1" name="username" value="<?php if(isset($username)){echo $username;}?>" placeholder="Username">
			  </div>
				
			  <div class="form-group">
			  	<?php if(isset($inputError['email'])){ echo '<div class="text-danger">'.$inputError['email'].'<i class="fas fa-exclamation-circle ml-1"></i>'.'</div>';}?>
			  	<?php if(isset($emailError)){ echo '<div class="text-danger">'.$emailError.'<i class="fas fa-exclamation-circle ml-1"></i>'.'</div>';}?>
			    <input type="text" class="form-control" id="exampleInputEmail1" name="email" value="<?php if(isset($email)){echo $email;}?>" placeholder="Email">
			  </div>

			  <div class="form-group">
			  	<?php if(isset($inputError['phone'])){ echo '<div class="text-danger">'.$inputError['phone'].'<i class="fas fa-exclamation-circle ml-1"></i>'.'</div>';}?>
			    <input type="text" class="form-control" id="exampleInputEmail1" name="phone" value="<?php if(isset($phone)){echo $phone;}?>" placeholder="Phone">
			  </div>

			  <div class="form-group">
			  	<?php if(isset($inputError['password'])){ echo '<div class="text-danger">'.$inputError['password'].'<i class="fas fa-exclamation-circle ml-1"></i>'.'</div>';}?>
			  	<?php if(isset($passwordlenth)){ echo '<div class="text-danger">'.$passwordlenth.'<i class="fas fa-exclamation-circle ml-1"></i>'.'</div>';}?>
			    <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?php if(isset($password)){echo $password;}?>" placeholder="Password">
			  </div>
			  
			  <div class="form-group">
			  	<?php if(isset($inputError['confirm_password'])){ echo '<div class="text-danger">'.$inputError['confirm_password'].'<i class="fas fa-exclamation-circle ml-1"></i>'.'</div>';}?>
			  	<?php if(isset($password_not_match)){ echo '<div class="text-danger">'.$password_not_match.'<i class="fas fa-exclamation-circle ml-1"></i>'.'</div>';}?>
			    <input type="password" class="form-control" id="exampleInputPassword1" name="confirm_password" value="<?php if(isset($confirm_password)){echo $confirm_password;}?>" placeholder="Confirm Password">
			  </div>

			  <label>Gender</label>
			  <div class="form-check">
				  <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Male">
				  <label class="form-check-label mr-5" for="exampleRadios1"> Male </label>
				  <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Female">
				  <label class="form-check-label" for="exampleRadios2">Female</label>
				</div>
				
			  <div class="form-group mt-2">
			    <label for="exampleFormControlFile1">Image upload</label>
			    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
			  </div>

			  <input type="submit" name="register" value="Register" class="btn btn-success btn-block">
            </form>
        </div>
            <div class="text-muted mt-3">
            	<small>If you have a accout then <a href="../index.php">Login Here</a></small>
            </div>
		</div>
	</div>
</div>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>	
</body>
</html>