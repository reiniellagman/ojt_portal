<!-- ./modal -->
<div id="update_remarks<?php echo $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
      <div class="modal-content">
        <div div class="modal-header bg-light">
          <h5 class="modal-title"><i class="fas fa-id-card"></i>&nbsp;&nbsp;Remarks</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="phpaction/update_remarks.php" name="form">
                <div class="form-group">
                    <label>Remarks</label>
                    <textarea rows="3" class="form-control" value="<?php echo $row['remarks']; ?>" name="remarks" placeholder="Remarks"><?php echo $row['remarks']; ?></textarea>
                </div> 
                <input type="hidden" name="file_id" value="<?php echo $id; ?>" />
                <input type="hidden" name="student_id" value="<?php echo $student_id; ?>" />
                <div class="form">
                    <div class="">
                        <button name = "submit_remarks" type="submit" class="btn btn-block btn-warning btn-sm"><i class="fas fa-paper-plane mr-2"></i>Save</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
   </div>
</div>