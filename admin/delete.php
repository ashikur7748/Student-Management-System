<?php
require_once 'config.php';
	$id = base64_decode($_GET['id']);
	$result = mysqli_query($link, "DELETE FROM `add_student` WHERE `id`= '$id'");
	if ($result) {
		header('Location: admin.php?page=all-student');
	}
?>