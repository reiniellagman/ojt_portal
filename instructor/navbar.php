<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">

    
    
      <a href="index.php" class="navbar-brand">
        <img src="../img/school-logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">OJT Authentication and Online Management System</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user-cog"></i>
          </a>
       
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a data-toggle="modal" class="dropdown-item" title="View Identification Card" href="#user_update_password" >
              <i class="fa fas fa-user"></i>&nbsp;&nbsp;Change Password
            </a>
            <div class="dropdown-divider"></div>
          
            <div class="dropdown-divider"></div>
            <a href="../index.php" class="dropdown-item">
              <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </a>
            <div class="dropdown-divider"></div>
          </div>
        </li>
      </ul>
    </div>
  </nav>


  <!-- ./modal -->
<div id="user_update_password" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
        <div class="modal-content">
            <div div class="modal-header bg-light">
                <h5 class="modal-title "><i class="fa fas fa-user"></i>&nbsp;&nbsp;Change Password</h5>
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="phpaction/update_password.php" name="form">
              <div class="modal-body">
                <div class="form-group">
                  <div class="input-group input-group">
                    <input type="password" class="form-control" placeholder="Old Password" name="old_password" required />
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group">
                    <input type="password" class="form-control" placeholder="New Password" name="password" required />
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" required />
                  </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $session_id ?>"/>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-warning btn-sm" name="update_pass_btn" style="float: right;"><i class="fa fa-paper-plane mr-2"></i>Submit</button>
              </div>
          </form>
        </div>
   </div>
</div>