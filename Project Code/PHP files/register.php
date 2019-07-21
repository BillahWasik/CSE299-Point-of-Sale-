<?php session_start(); ?>  <!-- Startong previous session -->
<?php require 'function.php'; ?>  <!-- including function -->
<?php ob_start();  ?> <!-- managing output buffer -->

<?php

   $db=db_connect();
   // checking session validation
   if (!isset($_SESSION['pos_admin']) || !isset($_COOKIE['userlog'])) {
     header('Location: index.php');
   }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="assets/js/sweetalert.min.js"></script>
<link rel="stylesheet" href="assets/css/sweetalert.min.css">

	<link rel="icon" type="image/png" href="register/images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="register/vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="register/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="register/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="register/fonts/iconic/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="register/vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="register/vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="register/vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="register/vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="register/vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="register/css/util.css">
	<link rel="stylesheet" type="text/css" href="register/css/main.css">
	
</head>
<body style="background-color: #999999;">

	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('register/images/bg-01.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-36 p-b-30">
				<form class="login100-form validate-form" action="register.php" method="post">
					<span class="login100-form-title p-b-15">
						Sign Up
						<a href="dashboard.php" class="dis-block txt3 hov1 p-r-30  p-b-10 p-l-30" style="display:inline-block;">
							Back To Dashboard
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</span>


					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">Full Name</span>
						<input class="input100" type="text" name="name" placeholder="Name...">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">Phone Number</span>
						<input class="input100" type="text" name="phone" placeholder="Phone number...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Email addess...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="text" name="password" placeholder="*************">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 " >
						<span class="label-input100">Admin Power</span>
						<select class="input100" name="admin" required>
							<option value="1">Yes</option>
							<option value="0">No</option>
						</select>
						<span class="focus-input100"></span>
					</div>

					<div class="flex-m w-full p-b-20">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								<span class="txt1">
									I agree to the
									<a href="#" class="txt2 hov1">
										Terms of User
									</a>
								</span>
							</label>
						</div>


					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submit">
								Sign Up
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
		if (isset($_POST['submit'])) {
			$name=$_POST['name'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$admin=$_POST['admin'];
			$phone=$_POST['phone'];
			$sql="INSERT INTO admin VALUES (NULL,'$name',$phone,'$email','$password',$admin)";
			$sql_result=mysqli_query($db,$sql);
			if (!$sql_result) {
				echo "mara";
			}
			else{
				?><script>swal("Success","Registration Successfull", "success");</script> <?php
			}
		}
	 ?>

	<script src="register/vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="register/vendor/animsition/js/animsition.min.js"></script>

	<script src="register/vendor/bootstrap/js/popper.js"></script>
	<script src="register/vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="register/vendor/select2/select2.min.js"></script>

	<script src="register/vendor/daterangepicker/moment.min.js"></script>
	<script src="register/vendor/daterangepicker/daterangepicker.js"></script>

	<script src="register/vendor/countdowntime/countdowntime.js"></script>

	<script src="register/js/main.js"></script>

</body>
</html>
