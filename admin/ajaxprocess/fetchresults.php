<?php
include('../DB/db.php');

if (isset($_POST['election_id'])) {
			
			$election_id = $_POST['election_id'];


$elections = mysqli_query($db, "SELECT * FROM `position` JOIN `addelection` ON addelection.id = position.election_id WHERE position.election_id = '$election_id' ");

$no = 1;
foreach ($elections as $election) {

	$position_title = $election['position_name'];

	$get_cants = mysqli_query($db, "SELECT * FROM `candidates` WHERE `election_title` = '$election_id' AND `position_title` = '$position_title' ");


	
	?>

<h5><?php echo $position_title;?></h5>
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    	<th>S/N</th>
                      <th>Student ID</th>
                      <th>Name</th>
                      <th>College</th>
                       <th>Department</th> 
                      <th>Votes</th>
                      
                    
                    </tr>
                  </thead>
                
                  <tbody>

                  	<?php 
                  	$no = 1;
                  	foreach ($get_cants as $cant) {

                  		$cant_id = $cant['id'];
                  	?>


                  	<tr>
                 		<td><?php echo $no;?></td>
                 		<td><?php echo $cant['student_id'];?></td>
                 		<td><?php echo $cant['name'];?></td>
                    <td><?php echo $cant['course_title'];?></td>
                    <td><?php echo $cant['college'];?></td>
                 		<td>
                 			
                 		<?php 

                 		$votes = mysqli_query($db, "SELECT * FROM `votes` WHERE `candidate_id` = '$cant_id' ");

                 		echo $counts = mysqli_num_rows($votes);

                 		?>

                 		</td>
                 	</tr>
                

                  	<?php

                  	$no++;
                  	}

                  	?>
                 	
                  </tbody>
                </table>


	<?php

$no++;
}


}







?>