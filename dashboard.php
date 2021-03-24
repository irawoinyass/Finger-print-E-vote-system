<?php
include('DB/db.php');

session_start();
if(!isset($_SESSION['voter_id'])){
header("location: index.php");
}else{

	$voter_id = $_SESSION['voter_id'];

	$me = mysqli_query($db, "SELECT * FROM `voters` WHERE `id` = '$voter_id' ");

	while ($row = mysqli_fetch_assoc($me)) {
		$name = $row['voter_name'];
    
	}

  $elections = mysqli_query($db, "SELECT * FROM `addelection` WHERE `election_status` = 'active'");

 //  $student = mysqli_query($db, "SELECT * FROM `students` ");
 //  $count_student = mysqli_num_rows($student);

 // $lesson = mysqli_query($db, "SELECT * FROM `lesson` ");
 //  $count_lesson = mysqli_num_rows($lesson);


?>







<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Expert System - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendors/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

<?php include('template/header.php')?>


       <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      
          </div>

    







          <div class="card shadow mb-4" id="table">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">Election <span id="election_title"></span></h6>
            </div>
            <div class="card-body">
              <div class="form-group">
                  <label>Election</label>
                <select class="form-control" name="election_id" id="election_id">
<option value="">SELECT ELECTION</option>
                <?php

                foreach ($elections as $election) {
                 

                 ?>

                 <option value="<?php echo $election['id'];?>"><?php echo $election['election_name'];?></option>
                 <?php
                }

                ?>
              </select>

              </div>



              <div id="show_cants">
                



              </div>
          
            </div>
          </div>






















    


        </div>
        <!-- /.container-fluid -->

        <?php include('template/footer.php')?>
        </div>



  </div>






  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendors/jquery/jquery.min.js"></script>
  <script src="vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendors/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

<script type="text/javascript">
  
  $(document).ready(function(){


    var election_id = $('#election_id').val();
FetchCandidates(election_id);
//$('#election_title').html(election_id);

      function FetchCandidates(election_id){


        $.ajax({        
        url:"ajaxprocess/fetchcandidate.php",
        method:"POST",
        data:{election_id:election_id},
        success:function(data){

    console.log(data);

   $('#show_cants').empty();

    if (data == '') {

      var show_cants = '<center><h6>NO RECORD FOUND</h6></center>';
      $('#show_cants').html(show_cants);

    }else{


 $('#show_cants').html(data);



    }

   

          }
        
         })


      }






      $("#election_id").bind("change keyup", function(event){
    var election_id = $(this).val();
   
   FetchCandidates(election_id);

 });






//       $('body').delegate('#vote_btn', 'click', function(e){

// e.preventDefault();


//   var position = $(this).data('position');
// var voter = $(this).data('voter');
// var candidate_id = $('.candidate_id').val();
// var election = $(this).data('election');

// alert(candidate_id);

// // if (confirm("Are you sure")) {




// // }








//       });




// $('.voting_form').on('submit', function(event){

$('body').delegate('.voting_form','submit', function(event){
  event.preventDefault();

  var elect = $('#election').val();
// var candidate_id = $('#candidate_id').val();
//  if (candidate_id == '') {
// alert('Choose a Candidate');
// }else{

  if (confirm("Are you sure")) {

$.ajax({
    url:"ajaxprocess/vote.php",
    method:"POST",
    data:new FormData(this),
    dataType:'JSON',
    contentType:false,
    cache:false,
    processData:false,
    success:function(data){

   //console.log(data); 

 

if (data == 'success') {

alert('Voted Successfully');

FetchCandidates(elect);

}else{

 alert(data);
}
     

    }


  });


      }


    //}


});





  });


</script>


</body>
</html>































<?php


}

?>
