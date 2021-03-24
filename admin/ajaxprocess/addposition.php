<?php
include('../DB/db.php');

if (isset($_POST['title'])) {

	 
	$title = $_POST['title'];
	$election_id = $_POST['election_id'];


	$check = mysqli_query($db, "SELECT * FROM `position` WHERE `position_name` = '$title' AND `election_id` = '$election_id' ");
	$nums = mysqli_num_rows($check);


	if ($nums > 0) {
		echo 'Title has been taken';
	}else{



		$add = mysqli_query($db, "INSERT INTO `position`(`id`, `position_name`, `position_status`,`election_id`) VALUES ('','$title','active','$election_id')");

	if ($add) {

	

	echo 'success';
	}else{

		echo 'Error, Please Try Again.';
	}



	}
	

	
	

	
	
}





?>