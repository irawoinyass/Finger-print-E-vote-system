<?php
include('../DB/db.php');

if (isset($_POST['name'])) {

	 
$name = $_POST['name'];
$election_title = $_POST['election_title'];
$course_title = $_POST['course_title'];
$position_title = $_POST['position_title'];
$level = $_POST['level'];
$student_id = $_POST['student_id'];
$college = $_POST['college'];

		

		


	// $check = mysqli_query($db, "SELECT * FROM `candidates` WHERE `student_id` = '$student_id'");
	// $nums = mysqli_num_rows($check);


	// if ($nums > 0) {
	// 	echo 'Title has been taken';
	// }else{



		$add = mysqli_query($db, "INSERT INTO `candidates`(`id`, `name`, `election_title`, `position_title`,`course_title`,`college`, `level`, `student_id`, `total_vote`) VALUES ('','$name',$election_title,'$position_title','$course_title','$college','$level',$student_id,'0')");

	if ($add) {

	

	echo 'success';
	}else{

		echo 'Error, Please Try Again.';
	}



	//}
	

	
	

	
	
}





?>