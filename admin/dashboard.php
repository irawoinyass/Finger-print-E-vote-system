<?php
include('DB/db.php');

session_start();
if(!isset($_SESSION['admin_id'])){
header("location: index.php");
}else{

	$admin_id = $_SESSION['admin_id'];

	$me = mysqli_query($db, "SELECT * FROM `admin` WHERE `id` = '$admin_id' ");

	while ($row = mysqli_fetch_assoc($me)) {
		$name = $row['name'];
    $api_url = $row['api_url'];
    $appkey = $row['appkey'];
    $secretkey = $row['secretkey'];
    $customerkey = $row['customerkey'];
    $enginekey = $row['enginekey'];
	}

 //  $student = mysqli_query($db, "SELECT * FROM `students` ");
 //  $count_student = mysqli_num_rows($student);

 // $lesson = mysqli_query($db, "SELECT * FROM `lesson` ");
 //  $count_lesson = mysqli_num_rows($lesson);
 $elections = mysqli_query($db, "SELECT * FROM `addelection` ");


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
  <link href="../vendors/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

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
              <h6 class="m-0 font-weight-bold text-success">Results Table</h6>
            </div>
            <div class="card-body">
                 <div class="form-group">
                  <label>Election</label>
                <select class="form-control" name="election_id" id="election_id">

                <option value="">SELECT</option>

                <?php

                foreach ($elections as $election) {
                 

                 ?>

                 <option value="<?php echo $election['id'];?>"><?php echo $election['election_name'];?></option>
                 <?php
                }

                ?>
              </select>

              </div>
              <div class="table-responsive" id="show_table">
              

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
  <script src="../vendors/jquery/jquery.min.js"></script>
  <script src="../vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendors/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>
<script type="text/javascript">
          $(document).ready(function(){



  $('#open_api_form').click(function(){

$('#ApiModal').show();

});


$('#close_up_api').click(function(){
    $('#ApiModal').hide();
});

$('#close_down_api').click(function(){
    $('#ApiModal').hide();
});



  $('#update_key_btn').click(function(e){

    e.preventDefault();

    var api_url = $('#api_url').val();
    var appkey = $('#appkey').val();
var secretkey = $('#secretkey').val();
var customerkey = $('#customerkey').val();
var enginekey = $('#enginekey').val();


    if (api_url == '') {

      alert("Dont Play with fire, API Key must not be left empty");

    }else if(appkey == ''){
alert("Dont Play with fire, App Key must not be left empty");

    }else if(secretkey == ''){
alert("Dont Play with fire, Secret Key must not be left empty");
      
    }else if(customerkey == ''){
alert("Dont Play with fire, Customer Key must not be left empty");
      
    }else if(enginekey == ''){
alert("Dont Play with fire, Engine Key must not be left empty");
      
    }else{
    if (confirm("Are you sure")) {

$.ajax({        
        url:"ajaxprocess/updatekey.php",
        method:"POST",
        data:{api_url:api_url,appkey:appkey,secretkey:secretkey,customerkey:customerkey,enginekey:enginekey},
        success:function(data){

    console.log(data);

    if (data == 'success') {

    alert('Upated Successfully');



    }else{

      alert(data);
    }

          }
        
         })


      }

    }

  });










  var election_id = $('#election_id').val();
FetchResults(election_id);
//$('#election_title').html(election_id);

      function FetchResults(election_id){


        $.ajax({        
        url:"ajaxprocess/fetchresults.php",
        method:"POST",
        data:{election_id:election_id},
        success:function(data){

    console.log(data);

   $('#show_table').empty();

    if (data == '') {

      var show_table = '<center><h6>NO RECORD FOUND</h6></center>';
      $('#show_table').html(show_table);

    }else{


 $('#show_table').html(data);



    }

   

          }
        
         })


      }






      $("#election_id").bind("change keyup", function(event){
    var election_id = $(this).val();
   
   FetchResults(election_id);

 });





          });
        </script>


</body>
</html>































<?php

include('template/api.php');
}

?>
