<!-- ./modal -->
<div id="user_update_profile" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div div class="modal-header bg-light">
          <h5 class="modal-title"><i class="fas fa-id-card"></i>&nbsp;&nbsp;Update Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="phpaction/update_profile_info.php" name="form">
            <div class="modal-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Employee No.</label>
                                <input type="text" class="form-control" value="<?php echo $session_id; ?>" placeholder="Student No." name="Student No." readonly/>
                            </div> 
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" value="<?php echo $row_info['f_name'] ?>" placeholder="First Name" name="fname" />
                            </div> 
                            <div class="form-group">
                                <label>Middle Name</label>
                                <input type="text" class="form-control" value="<?php echo $row_info['m_name'] ?>" placeholder="Middle Name" name="mname" />
                            </div> 
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" value="<?php echo $row_info['l_name'] ?>" placeholder="Last Name" name="lname" />
                            </div> 
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control" value="<?php echo $dob ?>" placeholder="Date of Birth" name="dob"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sex</label>
                                <select name="sex" class="form-control" required>
                                    <option value="<?php echo $sex ?>"><?php echo $sex ?></option>
                                    <option value="Male" >Male</option>
                                    <option value="Female" >Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Contact No.</label>
                                <input type="text" class="form-control" value="<?php echo $contact_no ?>" placeholder="Contact No" name="contact_no"/>
                            </div> 
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" value="<?php echo $email ?>" placeholder="Email" name="email"/>
                            </div> 
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" class="form-control" value="<?php echo $position ?>" placeholder="Position" name="position" readonly/>
                            </div>
                            <div class="form-group">
                                <label>Department</label>
                                <input type="text" class="form-control" value="<?php echo $department ?>" placeholder="Department" name="department" readonly/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea rows="3" class="form-control" value="<?php echo $address ?>" name="address" placeholder="Address"><?php echo $address ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
                <input type="hidden" name="emp_id" value="<?php echo $session_id; ?>" />
            </div>
            <div class="modal-footer">
                <button name = "submit_info" type="submit" class="btn btn-warning btn-sm" style="float: right;"><i class="fas fa-paper-plane mr-2"></i>Save</button>
            </div>
        </form>
      </div>
   </div>
</div>