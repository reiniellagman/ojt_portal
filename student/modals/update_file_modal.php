<!-- ./modal -->
<div id="update_documents<?php echo $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
      <div class="modal-content">
        <div div class="modal-header bg-light">
          <h5 class="modal-title"><i class="fas fa-edit"></i>&nbsp;&nbsp;Update Documents</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="phpaction/update_file.php" name="form">
          <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputFile">Choose File to upload<span class="text-danger"> PDF File only.</span></label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" required name="file_edit" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose photo</label>
                    </div>
                </div>
            </div> 
          </div>
          <input type="hidden" name="file_id" value="<?php echo $id ?>" />
          <div class="modal-footer">
              <button class="btn btn-cancel" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Cancel</button>
              <button name = "update_file" type="submit" class="btn btn-warning btn-sm" ><i class="fas fa-paper-plane mr-2"></i>Update</button>
          </div>
        </form>
      </div>
   </div>
</div>