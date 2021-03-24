<?php
include('../DB/db.php');

if (isset($_POST['api_url'])) {

	 
	$api_url = $_POST['api_url'];
    $appkey = $_POST['appkey'];
    $secretkey = $_POST['secretkey'];
    $customerkey = $_POST['customerkey'];
    $enginekey = $_POST['enginekey'];
	


$update = mysqli_query($db, "UPDATE `admin` SET `api_url`='$api_url',`appkey`='$appkey',`secretkey`='$secretkey',`customerkey`='$customerkey',`enginekey`='$enginekey' WHERE `id` = 1");

	if ($update) {
echo 'success';
	}else{

		echo 'Error, Please Try Again.';
	}


	



	
	

	
	

	
	
}





?>