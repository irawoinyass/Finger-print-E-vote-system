<?php

include('../DB/db.php');


if (isset($_POST['election'])) {

$election = $_POST['election'];
$position = $_POST['position'];
$voter_id = $_POST['voter'];
$candidate_id = $_POST['candidate_id'];


	$check = mysqli_query($db, "SELECT * FROM `votes` WHERE `election_id` = '$election' AND `position` = '$position' AND `voter_id` = '$voter_id' ");

                 $check_vote = mysqli_num_rows($check);


if ($check_vote > 0) {
	echo json_encode("You have Voted");
}else{

$add = mysqli_query($db, "INSERT INTO `votes`(`id`, `election_id`, `position`, `voter_id`, `candidate_id`) VALUES ('','$election','$position','$voter_id','$candidate_id')");

	if ($add) {
		
		echo json_encode("success");
	}else{
echo json_encode("Error,Please Try Again.");

	}

}






}












?>