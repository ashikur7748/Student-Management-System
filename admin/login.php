
<?php
	require_once 'config.php';
	session_start();
	if (isset($_SESSION['user_login'])) {
	header('Location: admin/admin.php');
}

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	
	$username_check = mysqli_query($link, "SELECT * FROM `user_information` WHERE `username`='$username'");
	if (mysqli_num_rows($username_check)>0) {
		$row = mysqli_fetch_assoc($username_check);
		if ($row['password'] == $password) {
			$_SESSION['user_login'] = $username;
			header('Location: admin/admin.php');
			
		}else{
			$password_error = " This password is incorrect";
		}
		
	}else{
		$username_error = " This username is incorrect";
	}
}

?>