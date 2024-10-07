<!-- ./modal -->
<div id="upload_documents" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
      <div class="modal-content">
        <div div class="modal-header bg-light">
          <h5 class="modal-title"><i class="fas fa-file-pdf"></i>&nbsp;&nbsp;Upload Documents</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="phpaction/upload_file.php" name="form">
          <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputFile">Choose File to upload<span class="text-danger"> PDF File only.</span></label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" required name="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose photo</label>
                    </div>
                </div>
            </div> 
          </div>
          <input type="hidden" name="student_id" value="<?php echo $session_id ?>" />
          <div class="modal-footer">
              <button class="btn btn-cancel" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Cancel</button>
              <button name = "upload_file" type="submit" class="btn btn-warning btn-sm" ><i class="fas fa-paper-plane mr-2"></i>Save</button>
          </div>
        </form>
      </div>
   </div>
</div>