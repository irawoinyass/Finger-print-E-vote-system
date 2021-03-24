<?php

include('../DB/db.php');


$data = array();


	if (isset($_POST['search_canditate'])) {
		
		$search_canditate = $_POST['search_canditate']; 

		if ($search_canditate == '') {

	$candidates = mysqli_query($db, "SELECT * FROM `candidates` JOIN addelection ON addelection.id = candidates.election_title ORDER BY candidates.id DESC");	
		
		}else{

$candidates = mysqli_query($db, "SELECT * FROM `candidates` JOIN addelection ON addelection.id = candidates.election_title WHERE (candidates.name LIKE '%".$search_canditate."%') ORDER BY candidates.id DESC");	
		}

		
		$no = 1;
	
		foreach ($candidates as $candidate) {
			
		
		?>

		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $candidate['election_name']; ?></td>
				<td><?php echo $candidate['position_title']; ?></td>
					<td><?php echo $candidate['name']; ?></td>
						<td><?php echo $candidate['college']; ?></td>
						<td><?php echo $candidate['course_title']; ?></td>
							<td><?php echo $candidate['level']; ?></td>
							<td><?php echo $candidate['student_id']; ?></td>
			<td><button class="btn btn-success btn-sm" id="edit_candidate" data-id="<?php echo $candidate['id'];?>" data-name="<?php echo $candidate['name'];?>" data-election="<?php echo $candidate['election_title'];?>" data-position="<?php echo $candidate['position_title'];?>" data-course="<?php echo $candidate['course_title'];?>" data-level="<?php echo $candidate['level'];?>" data-student="<?php echo $candidate['student_id'];?>" data-total="<?php echo $candidate['total_vote'];?>" >edit</button></td>
		</tr>

		<?php

		$no++;
		}

	}









?>