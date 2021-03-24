<?php
include('../DB/db.php');

if (isset($_POST['edit_name'])) {

	 
	$name = $_POST['edit_name'];
$course_title = $_POST['edit_course_title'];
$level = $_POST['edit_level'];
$student_id = $_POST['edit_student_id'];
$voter_id = $_POST['voter_id'];



$update = mysqli_query($db, "UPDATE `voters` SET `voter_name`='$name',`voter_course`='$course_title',`voter_level`='$level',`voter_student_id`='$student_id' WHERE `id` = '$voter_id' ");

	if ($update) {
echo 'success';
	}else{

		echo 'Error, Please Try Again.';
	}


	



	
	

	
	

	
	
}





?>