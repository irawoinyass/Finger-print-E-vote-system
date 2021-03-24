<?php 
include('../DB/db.php');

if (isset($_POST['id'])) {

	$id = $_POST['id'];

	$delete = mysqli_query($db, "DELETE FROM `course` WHERE `id` = '$id' ");

	if ($delete) {
		echo 'success';
	}else{

		echo 'Error, Please Try Again';
	}
	
}







?>