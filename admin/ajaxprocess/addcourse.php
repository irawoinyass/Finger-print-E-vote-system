<?php
include('../DB/db.php');

if (isset($_POST['title'])) {

	 
	$title = $_POST['title'];


	$check = mysqli_query($db, "SELECT * FROM `course` WHERE `course_name` = '$title'");
	$nums = mysqli_num_rows($check);


	if ($nums > 0) {
		echo 'Title has been taken';
	}else{



		$add = mysqli_query($db, "INSERT INTO `course`(`id`, `course_name`) VALUES ('','$title')");

	if ($add) {

	

	echo 'success';
	}else{

		echo 'Error, Please Try Again.';
	}



	}
	

	
	

	
	
}





?>