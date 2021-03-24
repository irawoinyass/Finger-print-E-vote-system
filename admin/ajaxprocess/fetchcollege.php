<?php

include('../DB/db.php');


$data = array();

	if (isset($_POST['search_course'])) {
		
		$search_course = $_POST['search_course'];

		if ($search_course == '') {
	$courses = mysqli_query($db, "SELECT * FROM `college` ORDER BY `id` DESC");	
	// while($row = mysqli_fetch_assoc($students)){

 //       $data[] = $row;
 //   }	
		}else{

$courses = mysqli_query($db, "SELECT * FROM `college` WHERE (`college_name` LIKE '%".$search_course."%') ORDER BY `id` DESC");	
		}
		$no = 1;
		//echo  json_encode($data);
		foreach ($courses as $course) {
			# code...
		
		?>

		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $course['college_name']; ?></td>
			<td><button class="btn btn-danger btn-sm" id="delete_course" data-id="<?php echo $course['id'];?>" >delete</button></td>
		</tr>

		<?php

		$no++;
		}

	}









?>