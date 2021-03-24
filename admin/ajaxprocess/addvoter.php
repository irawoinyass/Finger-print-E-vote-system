<?php
include('../DB/db.php');

if (isset($_POST['name'])) {

	 
$name = $_POST['name'];
$course_title = $_POST['course_title'];
$level = $_POST['level'];
$student_id = $_POST['student_id'];
$college = $_POST['college'];


		

$add = mysqli_query($db, "INSERT INTO `voters`(`id`, `voter_name`,`voter_college`, `voter_course`, `voter_level`, `voter_student_id`) VALUES ('','$name','$college','$course_title','$level','$student_id')");

	if ($add) {

	echo json_encode('success');
	}else{

		echo json_encode('Error, Please Try Again.');
	}



	//}
	

	
	

	
	
}





?>