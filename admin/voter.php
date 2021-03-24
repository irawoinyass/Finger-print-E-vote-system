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
    // $key = $row['secret_key'];
	}

 //  $student = mysqli_query($db, "SELECT * FROM `students` ");
 //  $count_student = mysqli_num_rows($student);

 // $lesson = mysqli_query($db, "SELECT * FROM `lesson` ");
 //  $count_lesson = mysqli_num_rows($lesson);

//   $elections = mysqli_query($db, "SELECT * FROM `addelection` WHERE `election_status` = 'active'");

//   $positions = mysqli_query($db, "SELECT * FROM `position` WHERE `position_status` = 'active'");

$courses = mysqli_query($db, "SELECT * FROM `course`");


?>



<!-- <input type="hidden" name="secret_key" id="secret_key" value="<?php echo $key;?>">
 -->


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Expert System -  Voters</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

<!-- <link href="../css/overlay.css" rel="stylesheet">
<link href="../css/progress.css" rel="stylesheet"> -->

</head>

<div class="overlays"><div class="loaders"></div></div>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

<?php include('template/header.php')?>


       <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Voters</h1>
       <a href="../Register.php" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-register fa-sm text-white-50"></i>Add Voter</a>
          </div>

    




 <div class="card shadow mb-4" style="display: none;" id="form">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-info">Voters Form</h6>
            </div>
            <div class="card-body">
<div class="alert" id="message" style="display: none;"></div>
              <form id="upload_voters_form" method="POST" enctype="multipart/form-data">

                 



              <div class="form-row">

                
            <div class="col">
              <div class="form-group">
                  <label>Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Voter's Name">
              </div>
            </div>


             <div class="col">
                  <div class="form-group">
                  <label>Course</label>
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

                
                
              </div>







<div class="form-row">

<div class="col">
                  <div class="form-group">
                  <label>Course</label>
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
                   <button class="btn btn-info" type="submit" id="add_btn">Add</button>
                   <button class="btn btn-danger" id="close_form">Close</button>
                 </div>
              </form>

              
            </div>
          </div>













          <div class="card shadow mb-4" id="table">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-info">Voters Table</h6>
            </div>
            <div class="card-body">
              <div class="form-group">
              <input type="text" name="search_voter" id="search_voter" class="form-control" placeholder="Enter Title Name to search">
              </div>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <td>S/N</td>
                     
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



$('#upload_voters_form').on('submit', function(event){

  event.preventDefault();

  var name = $('#name').val();
var course_title = $('#course_title').val();
var level = $('#level').val();
var student_id = $('#student_id').val();
var image = $('#image').val();


if (name == '') {

alert('Title Field is required');

}else if (image == '') {

alert('Image Title Field is required');

}else if (course_title == '') {

alert('Course Title Field is required');

}else if (level == '') {

alert('Level Field is required');

}else if (student_id == '') {

alert('Student ID Field is required');

}else{

      if (confirm("Are you sure")) {

        $('.overlays').show();

$.ajax({
    url:"ajaxprocess/addvoter.php",
    method:"POST",
    data:new FormData(this),
    dataType:'JSON',
    contentType:false,
    cache:false,
    processData:false,
    success:function(data){

   //console.log(data); 

 

if (data.status == 'success') {


  //console.log(data);
AddVoter(name,course_title,level,student_id,data.id)
$('.overlays').hide();



}else{

 alert(data);
 $('.overlays').hide();
}
     

    }


  });


      }


    }


});





function AddVoter(name,course,level,student_id,face_id){


 $.ajax({        
        url:"ajaxprocess/Addvoter2.php",
        method:"POST",
        data:{name:name,course:course,level:level,student_id:student_id,face_id:face_id},
        success:function(data){

    //console.log(data);

    if (data == 'success') {

     alert('Inserted Successfully');
    $('#name').val('');
$('#course_title').val('');
$('#level').val('');
$('#student_id').val('');
$('#image').val('');
  

  FetchVoters();


    }else{

      alert(data);
    }

          }
        
         })


}







FetchVoters();
     function FetchVoters(search_voter=""){

        $.ajax({        
        url:"ajaxprocess/fetchvoters.php",
        method:"POST",
        data:{search_voter:search_voter},
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



     $("#search_voter").keyup(function(){
    var search_voter = $(this).val();
   
   FetchVoters(search_voter);

 });



$("#search_voter").bind("change keyup", function(event){
    var search_voter = $(this).val();
   
   FetchVoters(search_voter);

 });














  $('body').delegate('#edit_voter', 'click', function(e){

  e.preventDefault();
  var id = $(this).data('id');
 
   var name = $(this).data('name');
   var course = $(this).data('course');

   var level = $(this).data('level');
   var student = $(this).data('student');
  

  
 
       $('#voter_title').html(name);
       $('#voter_id').val(id);
       $('#edit_name').val(name);
    
$('#edit_course_title').val(course);
$('#edit_level').val(level);
$('#edit_student_id').val(student);





       
        

$('#EditVoterModal').show();

});


$('#close_up_edit_voter').click(function(){
    $('#EditVoterModal').hide();
});

$('#close_down_edit_voter').click(function(){
    $('#EditVoterModal').hide();
});




$('#update_btn').click(function(e){

  e.preventDefault();

  var edit_name = $('#edit_name').val();
var edit_course_title = $('#edit_course_title').val();
var edit_level = $('#edit_level').val();
var edit_student_id = $('#edit_student_id').val();
var voter_id = $('#voter_id').val();



 if (edit_name == '') {

alert('Title Field is required');

}else if (edit_course_title == '') {

alert('Course Title Field is required');

}else if (edit_level == '') {

alert('Level Field is required');

}else if (edit_student_id == '') {

alert('Student ID Field is required');

}else{

      if (confirm("Are you sure")) {

$.ajax({        
        url:"ajaxprocess/updatevoter.php",
        method:"POST",
        data:{edit_name:edit_name,edit_course_title:edit_course_title,edit_level:edit_level,edit_student_id:edit_student_id,voter_id:voter_id},
        success:function(data){

    console.log(data);

    if (data == 'success') {

    alert('Upated Successfully');

  
 FetchVoters();


    }else{

alert(data);

    }

          }
        
         })


      }
  }



});














  $('body').delegate('#add_face', 'click', function(e){

  e.preventDefault();
  var id = $(this).data('id');
 var name = $(this).data('name');

  

  
 
       $('#face_title').html(name);
       $('#face_id').val(id);
      





       
        

$('#AddFaceModal').show();

});


$('#close_up_add_face').click(function(){
    $('#AddFaceModal').hide();
});

$('#close_down_add_face').click(function(){
    $('#AddFaceModal').hide();
});








$('#add_face_form').on('submit', function(event){

  event.preventDefault();



var change_image = $('#change_image').val();


 if (change_image == '') {

alert('Image Title Field is required');

}else{

      if (confirm("Are you sure")) {
$('.overlays').show();
$.ajax({
    url:"ajaxprocess/addface.php",
    method:"POST",
    data:new FormData(this),
    dataType:'JSON',
    contentType:false,
    cache:false,
    processData:false,
    success:function(data){

   console.log(data); 

 

if (data.status == 'success') {

alert('Added Successfully');
$('#change_image').val('');

$('.overlays').hide();
}else{

 alert(data);
 $('.overlays').hide();
}
     

    }


  });


      }


    }


});
















$('body').delegate('#delete_voter', 'click', function(event){


  event.preventDefault();

var id = $(this).data('id');

if (confirm('Are you sure')) {
$('.overlays').show();
       $.ajax({        
        url:"ajaxprocess/deletevoter.php",
        method:"POST",
        data:{id:id},
        dataType:'JSON',
        success:function(data){

    console.log(data);

    if (data.status == 'success') {

    alert('Deleted Successfully');


  FetchVoters();
$('.overlays').hide();

    }else{

      alert(data);
      $('.overlays').hide();
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
include('template/editvoter.php');
// include('template/addface.php');

}

?>
