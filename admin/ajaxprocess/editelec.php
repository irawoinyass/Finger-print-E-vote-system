<?php
include('../DB/db.php');

if (isset($_POST['edit_title']) AND isset($_POST['edit_status']) AND isset($_POST['election_id'])) {

	 
	$title = $_POST['edit_title'];
	$status = $_POST['edit_status'];
	$election_id = $_POST['election_id'];


$update = mysqli_query($db, "UPDATE `addelection` SET `election_name`='$title',`election_status`='$status' WHERE `id` = '$election_id'");

	if ($update) {
echo 'success';
	}else{

		echo 'Error, Please Try Again.';
	}


	



	
	

	
	

	
	
}





?>