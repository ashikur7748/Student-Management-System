<?php
	$server   = "localhost";
	$user     = "root";
	$password = "";
	$db_name  = "sms";

	$link = mysqli_connect($server, $user, $password, $db_name);

	if(!$link){
		echo "Database Connection Error!!";
	}
?>