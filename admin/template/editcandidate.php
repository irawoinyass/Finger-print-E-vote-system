<div id="EditCandidateModal" class="modal" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable">
<div class="modal-content">
    <div class="modal-header" style="background: lightgreen;">
<h5 class="modal-title mt-0" id="exampleModalScrollableTitle"><h4 id="candidate_title" style="color: #fff;"></h4></h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_up_edit_candidate">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
 <div class="modal-body">
     
     

        <form>

                 <div class="form-group">
                  <label>Name</label>
                <input type="text" name="edit_name" id="edit_name" class="form-control" >
              </div>



              <div class="form-row">

                <div class="col">
                  
               <div class="form-group">
                  <label>Election</label>
                <select class="form-control" name="edit_election_title" id="edit_election_title">

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
                <select class="form-control" name="edit_position_title" id="edit_position_title">

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
                  <label>Course</label>
                <select class="form-control" name="edit_course_title" id="edit_course_title">

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
                  <label>Level</label>
                <select class="form-control" name="edit_level" id="edit_level">

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
                <input type="number" name="edit_student_id" id="edit_student_id" class="form-control" >
              </div>
   </div>
  
</div>


              
<input type="hidden" name="candidate_id" id="candidate_id">
<input type="hidden" name="total_vote" id="total_vote">





            

              
                 <div>
                   <button class="btn btn-success" type="submit" id="update_btn">Update</button>
                 
                 </div>
              </form>

             





</div>
<div class="modal-footer" style="background: lightgray;">
<button type="button" class="btn btn-secondary" id="close_down_edit_candidate" data-dismiss="modal">Close</button>
 
                </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
                                            
