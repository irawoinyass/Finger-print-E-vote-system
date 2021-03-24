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

  $positions = mysqli_query($db, "SELECT * FROM `position` WHERE `position_status` = 'active'");

$courses = mysqli_query($db, "SELECT * FROM `course`");

$college = mysqli_query($db, "SELECT * FROM `college`");


?>







<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Expert System -  Candidates</title>

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
            <h1 class="h3 mb-0 text-gray-800">Candidates</h1>
       <a href="Javascript:void(0);" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="open_form"><i class="fas fa-register fa-sm text-white-50"></i> Add Candidates</a>
          </div>

    




 <div class="card shadow mb-4" style="display: none;" id="form">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">Candidate Form</h6>
            </div>
            <div class="card-body">
<div class="alert" id="message" style="display: none;"></div>
              <form>

                 <div class="form-group">
                  <label>Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Candidate's Name">
              </div>



              <div class="form-row">

                <div class="col">
                  
               <div class="form-group">
                  <label>Election</label>
                <select class="form-control" name="election_title" id="election_title">

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
                </div>
                <div class="col">
                  
              <div class="form-group">
                  <label>Position</label>
                <select class="form-control" name="" id="position_title">

                <option value="">Select</option>

                <?php

                foreach ($positions as $position) {
                 

                 ?>

                 <option value="<?php echo $position['position_name'];?>"><?php echo $position['position_name'];?></option>
                 <?php
                }

                ?>
              </select>

              </div>
                </div>
                <div class="col">
                  <div class="form-group">
                  <label>College</label>
                <select class="form-control" name="college" id="college">

                <option value="">Select</option>

                <?php

                foreach ($college as $col) {
                 

                 ?>

                 <option value="<?php echo $col['college_name'];?>"><?php echo $col['college_name'];?></option>
                 <?php
                }

                ?>
              </select>

              </div>
                </div>
                
              </div>







<div class="form-row">


  <div class="col">
                  <div class="form-group">
                  <label>Department</label>
                <select class="form-control" name="course_title" id="course_title">

                <option value="">Select</option>

                <?php

                foreach ($courses as $course) {
                 

                 ?>

                 <option value="<?php echo $course['course_name'];?>"><?php echo $course['course_name'];?></option>
                 <?php
                }

                ?>
              </select>

              </div>
                </div>

  <div class="col">

<div class="form-group">
                  <label>Level</label>
                <select class="form-control" name="level" id="level">

                <option value="">Select</option>
                 <option value="100">100L</option>
                  <option value="200">200L</option>
                   <option value="300">300L</option>
                    <option value="400">400L</option>
                     <option value="500">500l</option>


              </select>

              </div>

  </div>
   <div class="col">
       <div class="form-group">
                  <label>Student ID</label>
                <input type="number" name="student_id" id="student_id" class="form-control" placeholder="Enter Student ID">
              </div>
   </div>
  
</div>


              





            

              
                 <div>
                   <button class="btn btn-success" type="submit" id="add_btn">Add</button>
                   <button class="btn btn-danger" id="close_form">Close</button>
                 </div>
              </form>

              
            </div>
          </div>













          <div class="card shadow mb-4" id="table">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">Candidates Table</h6>
            </div>
            <div class="card-body">
              <div class="form-group">
              <input type="text" name="search_canditate" id="search_canditate" class="form-control" placeholder="Enter Title Name to search">
              </div>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <td>S/N</td>
                      <th>Election Title</th>
                      <th>Postion</th>
                      <th>Name</th>
                      <th>College</th>
                      <th>Department</th>
                      <th>Level</th>
                      <th>Student ID</th>
                      <th>Action</th>
                    
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                  <td>S/N</td>
                      <th>Election Title</th>
                      <th>Postion</th>
                      <th>Name</th>
                      <th>College</th>
                      <th>Department</th>
                      <th>Level</th>
                      <th>Student ID</th>
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

var name = $('#name').val();
var election_title = $('#election_title').val();
var position_title = $('#position_title').val();
var course_title = $('#course_title').val();
var level = $('#level').val();
var student_id = $('#student_id').val();
var college = $('#college').val();




if (name == '') {

alert('Title Field is required');

}else if (election_title == '') {

alert('Election Title Field is required');

}else if (position_title == '') {

alert('Position Title Field is required');

}else if (college == '') {

alert('College Title Field is required');

}else if (course_title == '') {

alert('Department Name Field is required');

}else if (level == '') {

alert('Level Field is required');

}else if (student_id == '') {

alert('Student ID Field is required');

}else{

  if (confirm('Are you sure')) {

       $.ajax({        
        url:"ajaxprocess/addcandidate.php",
        method:"POST",
        data:{name:name,election_title:election_title,position_title:position_title,course_title:course_title,level:level,student_id:student_id,college:college},
        success:function(data){

    //console.log(data);

    if (data == 'success') {

    alert('Inserted Successfully');

    $('#title').val('');
  

  FetchCandidates();

  $('#name').val('');
$('#election_title').val('');
$('#position_title').val('');
$('#course_title').val('');
$('#level').val('');
$('#student_id').val('');
$('#college').val('');


    }else{

      alert(data);
    }

          }
        
         })
     }

}


     });   




FetchCandidates();
     function FetchCandidates(search_canditate=""){

        $.ajax({        
        url:"ajaxprocess/fetchcandidates.php",
        method:"POST",
        data:{search_canditate:search_canditate},
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



     $("#search_canditate").keyup(function(){
    var search_canditate = $(this).val();
   
   FetchCandidates(search_canditate);

 });



$("#search_canditate").bind("change keyup", function(event){
    var search_canditate = $(this).val();
   
   FetchCandidates(search_canditate);

 });














  $('body').delegate('#edit_candidate', 'click', function(e){

  e.preventDefault();
  var id = $(this).data('id');
   var election = $(this).data('election');
   var position = $(this).data('position');

   var name = $(this).data('name');
   var course = $(this).data('course');

   var level = $(this).data('level');
   var student = $(this).data('student');
   var total = $(this).data('total');

  
 
       $('#candidate_title').html(name);
       $('#candidate_id').val(id);
       $('#edit_name').val(name);
       $('#edit_election_title').val(election);
$('#edit_position_title').val(position);
$('#edit_course_title').val(course);
$('#edit_level').val(level);
$('#edit_student_id').val(student);
$('#total_vote').val(total);




       
        

$('#EditCandidateModal').show();

});


$('#close_up_edit_candidate').click(function(){
    $('#EditCandidateModal').hide();
});

$('#close_down_edit_candidate').click(function(){
    $('#EditCandidateModal').hide();
});




$('#update_btn').click(function(e){

  e.preventDefault();

  var edit_name = $('#edit_name').val();
var edit_election_title = $('#edit_election_title').val();
var edit_position_title = $('#edit_position_title').val();
var edit_course_title = $('#edit_course_title').val();
var edit_level = $('#edit_level').val();
var edit_student_id = $('#edit_student_id').val();
var candidate_id = $('#candidate_id').val();
var total_vote = $('#total_vote').val();


 if (edit_name == '') {

alert('Title Field is required');

}else if (edit_election_title == '') {

alert('Election Title Field is required');

}else if (edit_position_title == '') {

alert('Position Title Field is required');

}else if (edit_course_title == '') {

alert('Course Title Field is required');

}else if (edit_level == '') {

alert('Level Field is required');

}else if (edit_student_id == '') {

alert('Student ID Field is required');

}else{

      if (confirm("Are you sure")) {

$.ajax({        
        url:"ajaxprocess/updatecandidate.php",
        method:"POST",
        data:{edit_name:edit_name,edit_election_title:edit_election_title,edit_position_title:edit_position_title,edit_course_title:edit_course_title,edit_level:edit_level,edit_student_id:edit_student_id,candidate_id:candidate_id,total_vote:total_vote},
        success:function(data){

    console.log(data);

    if (data == 'success') {

    alert('Upated Successfully');

  
 FetchCandidates();


    }else{

alert(data);

    }

          }
        
         })


      }
  }



});
















  });


</script>

</body>
</html>































<?php
include('template/editcandidate.php');

}

?>
