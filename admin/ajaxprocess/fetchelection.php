<?php

include('../DB/db.php');


$data = array();

	if (isset($_POST['search_title'])) {
		
		$search_title = $_POST['search_title'];

		if ($search_title == '') {
	$elections = mysqli_query($db, "SELECT * FROM `addelection` ORDER BY `id` DESC");	
	// while($row = mysqli_fetch_assoc($students)){

 //       $data[] = $row;
 //   }	
		}else{

$elections = mysqli_query($db, "SELECT * FROM `addelection` WHERE (`election_name` LIKE '%".$search_title."%') ORDER BY `id` DESC");	
		}
		$no = 1;
		//echo  json_encode($data);
		foreach ($elections as $election) {
			# code...
		
		?>

		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $election['election_name']; ?></td>
			<td><?php echo $election['election_status']; ?></td>
			<td><button class="btn btn-success btn-sm" id="edit_election" data-id="<?php echo $election['id'];?>" data-status="<?php echo $election['election_status'];?>" data-title="<?php echo $election['election_name'];?>">edit</button></td>
		</tr>

		<?php

		$no++;
		}

	}









?>