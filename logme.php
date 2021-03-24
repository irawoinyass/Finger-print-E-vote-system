<?php

if (isset($_GET['id'])) {
$id = $_GET['id'];


	if ($id == 'No match found. (No enrolled members matched against the submitted biometric data.)') {
		header("location: index.php?error=No match found, Try Again");
	}else{

include('DB/db.php');

		$validate = mysqli_query($db, "SELECT * FROM `voters` WHERE `voter_student_id`='$id'  ");

		$num_row = mysqli_num_rows($validate);

		if ($num_row < 1) {
			
			header("location: index.php?error=No match found, Try Again");
		}else{

			session_start();

			while ($row = mysqli_fetch_assoc($validate)) {
				
				$_SESSION["voter_id"] = $row["id"];

				
				header("location: dashboard.php");
			}

		}
		
	





	}



}



?>