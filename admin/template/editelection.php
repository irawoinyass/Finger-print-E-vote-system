<div id="EditElectionModal" class="modal" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable">
<div class="modal-content">
    <div class="modal-header" style="background: lightgreen;">
<h5 class="modal-title mt-0" id="exampleModalScrollableTitle"><h4 id="election_title" style="color: #fff;"></h4></h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_up_edit_election">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
 <div class="modal-body">
     
      <form>

                 <div class="form-group">
                  <label>Title</label>
                <input type="text" name="edit_title" id="edit_title" class="form-control" >
              </div>

              <div class="form-group">
                  <label>Status</label>
                <select name="edit_status" id="edit_status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
              </div>

<input type="hidden" name="election_id" id="election_id">
              

                 <div>
                   <button class="btn btn-success" type="submit" id="update_btn">Update</button>
            
                 </div>
              </form>





</div>
<div class="modal-footer" style="background: lightgray;">
<button type="button" class="btn btn-secondary" id="close_down_edit_election" data-dismiss="modal">Close</button>
 
                </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
                                            
