<?php 

include('DB/db.php');


	$me = mysqli_query($db, "SELECT * FROM `admin` WHERE `id` = 1 ");

	while ($row = mysqli_fetch_assoc($me)) {
		
    $api_url = $row['api_url'];
    $appkey = $row['appkey'];
    $secretkey = $row['secretkey'];
    $customerkey = $row['customerkey'];
    $enginekey = $row['enginekey'];
	}



define('CloudABIS_API_URL', $api_url);
define('CloudABISAppKey', $appkey);
define('CloudABISSecretKey', $secretkey);
define('CloudABISCustomerKey', $customerkey);
define('ENGINE_NAME', $enginekey);


// define('CloudABIS_API_URL', 'https://fpsvr101.cloudabis.com/v1/');
// define('CloudABISAppKey', 'b1acb72945d947cb9997ddb1c31fb1d0');
// define('CloudABISSecretKey', 'Qmncx1KqEI3HonS1ci+HRNllYuY=');
// define('CloudABISCustomerKey', '42354F9AFE0546B9A6EE0F756410BC75');
// define('ENGINE_NAME', 'FPFF02');




// define('TEMPLATE_FORMAT', 'ISO');


