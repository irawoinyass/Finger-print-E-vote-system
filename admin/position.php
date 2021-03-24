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
	}

 //  $student = mysqli_query($db, "SELECT * FROM `students` ");
 //  $count_student = mysqli_num_rows($student);

 // $lesson = mysqli_query($db, "SELECT * FROM `lesson` ");
 //  $count_lesson = mysqli_num_rows($lesson);
$elections = mysqli_query($db, "SELECT * FROM `addelection` WHERE `election_status` = 'active'");

?>







<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Expert System -  Position</title>

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
            <h1 class="h3 mb-0 text-gray-800">Position</h1>
       <a href="Javascript:void(0);" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="open_form"><i class="fas fa-register fa-sm text-white-50"></i> Add Position</a>
          </div>

    




 <div class="card shadow mb-4" style="display: none;" id="form">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-info">Position Form</h6>
            </div>
            <div class="card-body">
<div class="alert" id="message" style="display: none;"></div>
              <form>

                 <div class="form-group">
                  <label>Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Election Title">
              </div>

              <div class="form-group">
                  <label>Election</label>
                <select class="form-control" name="election_id" id="election_id">

                <option value="">Select</option>

                <?php

                foreach ($elections as $election) {
                 

                 ?>

                 <option value="<?php echo $election['id'];?>"><?php echo $election['election_name'];?></option>
                 <?php
                }

                ?>
              </select>

              </div>

              

                 <div>
                   <button class="btn btn-info" type="submit" id="add_btn">Add</button>
                   <button class="btn btn-danger" id="close_form">Close</button>
                 </div>
              </form>

              
            </div>
          </div>










 <div class="card shadow mb-4" id="table">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-info">Position Table</h6>
            </div>
            <div class="card-body">
              <div class="form-group">
              <input type="text" name="search_position" id="search_position" class="form-control" placeholder="Enter Title Name to search">
              </div>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <td>S/N</td>
                      <th>Title</th>
                      <th>Election</th>
                      <th>Status</th>
                      <th>Action</th>
                    
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                <td>S/N</td>
                      <th>Title</th>
                      <th>Election</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody id="list_student">
                 
                
                  </tbody>
                </table>
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

$('#open_form').click(function(event){

event.preventDefault();


  $('#form').show();
 $('#table').hide();




    });


        $('#close_form').click(function(event){

event.preventDefault();


  $('#form').hide();
 $('#table').show();




    });







$('#add_btn').click(function(event){

event.preventDefault();

var title = $('#title').val();
var election_id = $('#election_id').val();


if (title == '') {

alert('Title Field is required');

}else if (election_id == '') {

alert('Election Field is required');

}else{

  if (confirm('Are you sure')) {

       $.ajax({        
        url:"ajaxprocess/addposition.php",
        method:"POST",
        data:{title:title,election_id:election_id},
        success:function(data){

    //console.log(data);

    if (data == 'success') {

    alert('Inserted Successfully');

    $('#title').val('');
    $('#election_id').val('');
  

  FetchPositions();


    }else{

      alert(data);
    }

          }
        
         })
     }

}


     });   





FetchPositions();
     function FetchPositions(search_position=""){

        $.ajax({        
        url:"ajaxprocess/fetchposition.php",
        method:"POST",
        data:{search_position:search_position},
        success:function(data){

    //console.log(data);

    $('#list_student').empty();

    if (data == '') {

      var list_student = '<center><h6>NO RECORD FOUND</h6></center>';
      $('#list_student').html(list_student);

    }else{

//  $.each(data, function(i, value){

//   var list_student = '<tr><td>1</td><td>Tiger Nixon</td><td>System Architect</td></tr>';
// $('#list_student').append(list_student);
 
// });
 $('#list_student').html(data);



    }

   

          }
        
         })


     }



     $("#search_position").keyup(function(){
    var search_position = $(this).val();
   
   FetchPositions(search_position);

 });



$("#search_position").bind("change keyup", function(event){
    var search_position = $(this).val();
   
   FetchPositions(search_position);

 });














  $('body').delegate('#edit_election', 'click', function(e){

  e.preventDefault();
  var id = $(this).data('id');
   var title = $(this).data('title');
   var status = $(this).data('status');
  
 
       $('#election_title').html(title);
       $('#edit_title').val(title);
       $('#edit_status').val(status);

       $('#election_id').val(id);
       
        

$('#EditElectionModal').show();

});


$('#close_up_edit_election').click(function(){
    $('#EditElectionModal').hide();
});

$('#close_down_edit_election').click(function(){
    $('#EditElectionModal').hide();
});




$('#update_btn').click(function(e){

  e.preventDefault();

  var edit_title = $('#edit_title').val();
  var edit_status = $('#edit_status').val();
  var election_id = $('#election_id').val();


  if (edit_title == '') {
alert('Title Field is required');
  }else{

      if (confirm("Are you sure")) {

$.ajax({        
        url:"ajaxprocess/editelec.php",
        method:"POST",
        data:{edit_title:edit_title,edit_status:edit_status,election_id:election_id},
        success:function(data){

    console.log(data);

    if (data == 'success') {

    alert('Upated Successfully');

  
 FetchElections();


    }else{

      alert(data);
    }

          }
        
         })


      }
  }



});










$('body').delegate('#delete_position', 'click', function(event){


  event.preventDefault();

var id = $(this).data('id');

if (confirm('Are you sure')) {

       $.ajax({        
        url:"ajaxprocess/deleteposition.php",
        method:"POST",
        data:{id:id},
        success:function(data){

    //console.log(data);

    if (data == 'success') {

    alert('Deleted Successfully');


  FetchPositions();


    }else{

      alert(data);
    }

          }
        
         })


}


});







  });


</script>

</body>
</html>































<?php
include('template/editelection.php');

}

?>
