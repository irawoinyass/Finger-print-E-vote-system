<?php
include('../DB/db.php');

session_start();
	$voter_id = $_SESSION['voter_id'];

	$me = mysqli_query($db, "SELECT * FROM `voters` WHERE `id` = '$voter_id' ");

	while ($row = mysqli_fetch_assoc($me)) {
		$name = $row['voter_name'];
    
	}


if (isset($_POST['election_id'])) {
			
			$election_id = $_POST['election_id'];

			$data = array();

$elections = mysqli_query($db, "SELECT * FROM `position` JOIN `addelection` ON addelection.id = position.election_id WHERE position.election_id = '$election_id' ");



//$row = mysqli_fetch_assoc($elections);

//print_r($row);


  foreach ($elections as $election) {
//while ($election = mysqli_fetch_assoc($elections)) {

	$position_title = $election['position_name'];

	$get_cants = mysqli_query($db, "SELECT * FROM `candidates` WHERE `election_title` = '$election_id' AND `position_title` = '$position_title' ");


	
	?>

  <form class="voting_form" method="POST" enctype="multipart/form-data" >

	  <div class="form-group">
        <label><?php echo $election['position_name'];?></label>
            <select class="form-control" name="candidate_id" id="candidate_id">
              <option value="0">Choose</option>

                <?php

                foreach ($get_cants as $cant) {

                	$cant_id = $cant['id'];
                 
      $check = mysqli_query($db, "SELECT * FROM `votes` WHERE `election_id` = '$election_id' AND `position` = '$position_title' AND `voter_id` = '$voter_id' ");

                 $check_vote = mysqli_num_rows($check);

                 ?>

                 <option value="<?php echo $cant['id'];?>"><?php echo $cant['name'];?></option>
                 <?php
                }

                ?>
              </select>

              </div>
              <input type="hidden" name="election" id="election" value="<?php echo $election_id;?>">
          <input type="hidden" name="position" id="position" value="<?php echo $position_title;?>">
          <input type="hidden" name="voter" id="voter" value="<?php echo $voter_id;?>">
              <div>
              	<?php

              		if ($check_vote > 0) {
              			

              			?>
<button class="btn btn-info btn-sm"disabled >Voted</button>

              			<?php
              		}else{

              			?>

          
          <button class="btn btn-info btn-sm" type="submit" >Vote</button>

              			<?php

              		}

              	?>
                   
                   </form>
                 </div>


	<?php
}


		}









?>