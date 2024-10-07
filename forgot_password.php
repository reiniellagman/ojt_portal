<?php 
include('dbconn.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>OJT Authentication and Online Management System</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" href="img/school-logo.png"/>
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script><!-- Include Toastr or SweetAlert2 CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/img-bg.png" style="background-size: cover;">
	<div class="container">
		<div class="img" style="margin-top: 10px;">
			<!-- <img src="img/bg.svg"> -->
			 <div style="display: flex;">
				<img src="img/school-logo.png" style="width: 120px; height: 120px; margin-right: 10px;">
				<h1 style="color: white; padding-top: 5px;">ON-THE-JOB TRAINING AUTHENTICATION AND ONLINE MANAGEMENT SYSTEM</h1>
			 </div>
			<div style="margin-top: 30px; position: absolute; bottom: 25%;">
				<p style="font-size: 16px; padding-bottom: 3px; color: white">
					<b>For questions, contact us using the details below.</b>
				</p>
				<div style="margin-top: 10px; display: flex; color: white">
					<div>
						<img src="img/email1.png" style="width: 20px; height: 20px; margin-right: 10px;">
						<b>Email Address:</b> &nbsp; admin.system@gmail.com
					</div>

					<div style="margin-left: 50px;">
						<img src="img/phone-call.png" style="width: 17px; height: 17px; margin-right: 10px;">
						<b>Telephone:</b> &nbsp; (02) 000 000
					</div>
				</div>
			</div>
		</div>
        
		<div class="login-content" style="background-color: white;">
			<form action="verify_otp.php" method="post">
				<div style="line-height: 12px;">
					<h3 style="text-align: left; margin-top: 10px; font-weight: normal;">Reset Password</h3> <br/>
					<hr style="width: 18%; height: 4px; background-color: #e2a31e; border: none;"/>
				</div><br/><br/>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Mobile Number</h5>
           		   		<input type="number" name="username" class="input">
           		   </div>
           		</div>
            	<input name= "otp" type="submit" class="btn" value="Send OTP">
            </form>
        </div>
    </div>
	
    <script type="text/javascript" src="js/main.js"></script>
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
