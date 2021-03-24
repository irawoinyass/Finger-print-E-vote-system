<?php
include('../DB/db.php');

if (isset($_POST['edit_name'])) {

	 
	$name = $_POST['edit_name'];
$election_title = $_POST['edit_election_title'];
$course_title = $_POST['edit_course_title'];
$position_title = $_POST['edit_position_title'];
$level = $_POST['edit_level'];
$student_id = $_POST['edit_student_id'];
$total_vote = $_POST['total_vote'];
$candidate_id = $_POST['candidate_id'];



$update = mysqli_query($db, "UPDATE `candidates` SET `name`='$name',`election_title`='$election_title',`position_title`='$position_title',`course_title`='$course_title',`level`='$level',`student_id`='$student_id',`total_vote`='$total_vote' WHERE `id` = '$candidate_id'");

	if ($update) {
echo 'success';
	}else{

		echo 'Error, Please Try Again.';
	}


	



	
	

	
	

	
	
}





?>