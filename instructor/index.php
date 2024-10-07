<?php 
include('../dbconn.php');
include('session.php'); 
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<?php include("header.php"); ?>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <?php include("navbar.php"); ?>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Welcome back Instructor!</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <!-- Profile Image -->
            <div class="card card-primary card-outline" style="border-color: #ffb60f;">
              <div class="card-body box-profile">
                <div class="text-center">
                <?php
                    $session_id=$_SESSION['emp_id'];
                    $query = "SELECT * FROM instructor_db 
                              WHERE emp_id = '$session_id'";
                    $result = mysqli_query($conn, $query);

                    $row_info = mysqli_fetch_assoc($result);
                    $fullname = $row_info['f_name'].' '.$row_info['m_name'].'. '.$row_info['l_name'];
                    $dob = $row_info['dob'];
                    $sex = $row_info['sex'];
                    $address = $row_info['address'];
                    $contact_no = $row_info['contact_no'];
                    $email = $row_info['email'];
                    $position = $row_info['position'];
                    $department = $row_info['department'];
                    $profile = $row_info['profile'];
                  ?>
                  <a data-toggle="modal" class="btn btn-sm btn-a edit" title="Update Profile" href="#user_profile_edit" name="selector" value="">
                    <img class="profile-user-img img-fluid img-circle"
                      src="<?php echo $profile; ?>"
                      alt="User profile picture"
                      style="width: 200px; height: 200px;">
                  </a>
                  <p class="text-center text-muted"><?php echo $session_id; ?></p>
                </div>
                <?php include("modals/user_profile_edit.php"); ?>
                  <h3 class="profile-username text-center"></h3>
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Full Name:</b> <p class="float-right"><?php echo $fullname ?></p>
                    </li>
                    <li class="list-group-item">
                      <b>Date of Birth:</b> <p class="float-right"><?php echo $dob ?></p>
                    </li>
                    <li class="list-group-item">
                      <b>Sex:</b> <p class="float-right"><?php echo $sex ?></p>
                    </li>
                    <li class="list-group-item">
                      <b>Address:</b> <p class="float-right"><?php echo $address ?></p>
                    </li>
                    <li class="list-group-item">
                      <b>Contact No.:</b> <p class="float-right"><?php echo $contact_no ?></p>
                    </li>
                    <li class="list-group-item">
                      <b>Email:</b> <p class="float-right"><?php echo $email ?></p>
                    </li>
                    <li class="list-group-item">
                      <b>Position:</b> <p class="float-right"><?php echo $position ?></p>
                    </li>
                    <li class="list-group-item">
                      <b>Department:</b> <p class="float-right"><?php echo $department ?></p>
                    </li>
                  </ul>
                  <button data-toggle="modal" class="btn btn-warning btn-sm btn-block" title="Update Profile" href="#user_update_profile" name="selector" value=""><i class="fa-solid fa-address-card "></i>&nbsp;&nbsp;Update Info</button>
                  <?php include("modals/user_view_profile.php"); ?>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-lg-8">
            <div class="col-lg-12">
              <div class="card card-primary card-outline" style="border-color: #ffb60f;">
                <div class="card-header">
                  <h3 class="card-title">List of Students</h3>
                  <i class="fa fa-clipboard-list btn-a" style="float: right;"></i>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Student No</th>
                        <th>Full Name</th>
                        <th>Course</th>
                        <th>Institute</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $session_id=$_SESSION['id'];
                      $query = "SELECT * FROM student_db WHERE assigned_instructor = '$session_id'";
                      $result = mysqli_query($conn, $query);
                      $counter = 1;
                      
                      while($row = mysqli_fetch_assoc($result)) {
                      $id = $row['student_id'];
                    ?>
                      <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $row['student_id']; ?></td>
                        <td><?php echo $row['f_name'].' '.$row['m_name'].'. '.$row['l_name']; ?></td>
                        <td><?php echo $row['course']; ?></td>
                        <td><?php echo $row['institute']; ?></td>
                        <td class="text-center">
                          <a class="btn btn-info btn-sm" title="View Info" href="student_info.php?id=<?php echo $id; ?>" name="selector" value="">
                            <i class="fa fa-eye mr-2"></i>View Records
                          </a>
                        </td>
                      </tr>
                      <?php
                      $counter++;
                    } ?>
                    </tbody>
                  </table>
                </div>
              </div><!-- /.card -->
            </div>
           
          </div>
          <!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2024 BSIT. All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../plugins/toastr/toastr.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
</body>
</html>
<!-- script for getting file -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "pageLength": 5,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example2").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "pageLength": 5,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<script>
$(function () {
 //Initialize Select2 Elements
 $('.select2').select2()

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
})
</script>

<script> // script functions for the table
  $(function () {

    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    <?php  if(isset($_SESSION['success'])){ ?>
      toastr.success("<?php echo $_SESSION['success'];  ?>")
      <?php
      unset($_SESSION['success']);
    }else{ ?>
      toastr.error("<?php echo $_SESSION['error'];  ?>")
      <?php
      unset($_SESSION['error']);
    }
    ?> 
  });
</script>
</body>
</html>