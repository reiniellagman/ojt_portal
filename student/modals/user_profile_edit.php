<!-- ./modal -->
<div id="user_profile_edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
      <div class="modal-content">
        <div div class="modal-header bg-light">
          <h5 class="modal-title"><i class="fas fa-id-card"></i>&nbsp;&nbsp;Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group text-center">
                <img src="<?php echo $profile; ?>" style="width: 60%; height: 60%;">
            </div>
            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="phpaction/update_profile_pict.php" name="form">
                <div class="form-group">
                    <label for="exampleInputFile">Change Profile Picture<span class="text-danger"> Image file type only.</span></label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" required name="file_image" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose photo</label>
                        </div>
                    </div>
                </div> 
                <input type="hidden" name="student_id" value="<?php echo $session_id; ?>" />
                <div class="form">
                    <div class="">
                        <button name = "submit_picture" type="submit" class="btn btn-block btn-warning btn-sm"><i class="fas fa-paper-plane mr-2"></i>Save</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
   </div>
</div>