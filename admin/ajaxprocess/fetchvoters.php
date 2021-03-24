<?php

include('../DB/db.php');


$data = array();


	if (isset($_POST['search_voter'])) {
		
		$search_voter = $_POST['search_voter']; 

		if ($search_voter == '') {

	$voters = mysqli_query($db, "SELECT * FROM `voters` ORDER BY `id` DESC");	
		
		}else{

$voters = mysqli_query($db, "SELECT * FROM `voters` WHERE (`voter_name` LIKE '%".$search_voter."%') ORDER BY id DESC");	
		}

		
		$no = 1;
	
		foreach ($voters as $voter) {
			
		
		?>

		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $voter['voter_name']; ?></td>
			<td><?php echo $voter['voter_college']; ?></td>
				<td><?php echo $voter['voter_course']; ?></td>
					<td><?php echo $voter['voter_level']; ?></td>
						<td><?php echo $voter['voter_student_id']; ?></td>
							
			<td>
				<!-- <button class="btn btn-sm btn-danger" data-id="<?php //echo $voter['voter_student_id'];?>" id="delete_voter">Delete</button>  -->

				<button class="btn btn-primary btn-sm" id="edit_voter" data-id="<?php echo $voter['id'];?>" data-course="<?php echo $voter['voter_course'];?>" data-level="<?php echo $voter['voter_level'];?>" data-student="<?php echo $voter['voter_student_id'];?>" data-name="<?php echo $voter['voter_name'];?>">Edit</button></td>
		</tr>

		<?php

		$no++;
		}

	}









?>