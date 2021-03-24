<?php

include('../DB/db.php');


$data = array();

	if (isset($_POST['search_position'])) {
		
		$search_position = $_POST['search_position'];

		if ($search_position == '') {
	$positions = mysqli_query($db, "SELECT * FROM `position` JOIN `addelection` ON addelection.id = position.election_id ORDER BY position.position_name ASC");	
	// while($row = mysqli_fetch_assoc($students)){

 //       $data[] = $row;
 //   }	
		}else{

$positions = mysqli_query($db, "SELECT * FROM `position` JOIN `addelection` ON addelection.id = position.election_id WHERE (position.position_name LIKE '%".$search_position."%') ORDER BY position.position_name ASC");	
		}
		$no = 1;
		//echo  json_encode($data);
		foreach ($positions as $position) {
			# code...
		
		?>

		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $position['position_name']; ?></td>
			<td><?php echo $position['election_name']; ?></td>
			<td><?php echo $position['position_status']; ?></td>
			<td><button class="btn btn-danger btn-sm" id="delete_position" data-id="<?php echo $position['id'];?>">delete</button></td>
		</tr>

		<?php

		$no++;
		}

	}









?>