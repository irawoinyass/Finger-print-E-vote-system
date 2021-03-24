<div id="ApiModal" class="modal" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable">
<div class="modal-content">
    <div class="modal-header" style="background: lightgreen;">
<h5 class="modal-title mt-0" id="exampleModalScrollableTitle">Secret Key</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_up_api">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
 <div class="modal-body">
     
      <form>

                 <div class="form-group">
                  <label>CloudABIS_API_URL</label>
                <input type="text" name="api_url" id="api_url" class="form-control" value="<?php echo $api_url;?>">
              </div>


               <div class="form-group">
                  <label>CloudABISAppKey</label>
                <input type="text" name="appkey" id="appkey" class="form-control" value="<?php echo $appkey;?>">
              </div>


               <div class="form-group">
                  <label>CloudABISSecretKey</label>
                <input type="text" name="secretkey" id="secretkey" class="form-control" value="<?php echo $secretkey;?>">
              </div>


               <div class="form-group">
                  <label>CloudABISCustomerKey</label>
                <input type="text" name="customerkey" id="customerkey" class="form-control" value="<?php echo $customerkey;?>">
              </div>



               <div class="form-group">
                  <label>ENGINE_NAME</label>
                <input type="text" name="enginekey" id="enginekey" class="form-control" value="<?php echo $enginekey;?>">
              </div>

            

                 <div>
                   <button class="btn btn-info" type="submit" id="update_key_btn">Update</button>
            
                 </div>
              </form>





</div>
<div class="modal-footer" style="background: lightgray;">
<button type="button" class="btn btn-secondary" id="close_down_api" data-dismiss="modal">Close</button>
 
                </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
                                            
