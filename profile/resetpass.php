<?php

include '../db.php';
include '../login.php';


if(isset($_POST['btn-reset']))
{
	$email = $MySQLi_CON->real_escape_string(trim($_POST['email']));
	$payroll = $MySQLi_CON->real_escape_string(trim($_POST['payroll_no']));
	$upass = $MySQLi_CON->real_escape_string(trim($_POST['password']));
	$password_again = $MySQLi_CON->real_escape_string(trim($_POST['password_again']));

	$new_password = password_hash($upass, PASSWORD_DEFAULT);
	
	$query = $MySQLi_CON->query("SELECT name, email,payroll, password FROM users WHERE email='$email' AND payroll='$payroll'");
	$row=$query->fetch_array();

	if($upass!=$password_again){
      	$msg3 = "<div class='alert alert-danger col-sm-12 col-md-12''>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Passwords Do Not Match . Try Again !
					</div>";
       }else{
	if ($row['email']==$email) {
		$updateQuery1 = "UPDATE users SET password='$new_password' WHERE email='$email'";
		mysqli_query($MySQLi_CON,$updateQuery1);

			if(isset($_SESSION['userSession']))
				{
				//session_start();
				session_destroy();
				unset($_SESSION['userSession']);
				//header("Location: ../home");
				exit();
			}

		$msg3 = "<div class='alert alert-success col-md-12 col-sm-12'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Password successfully Changed !<br>
						<a href='../index' >Log In to account </a>
					</div>";

	}else {
		$msg3 = "<div class='alert alert-danger col-sm-12 col-md-12'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Email or ID NO does not Match existing Acount details!! <br>
					<p> <a href='../contact'>Contact Admin</a></p>
				</div>";
	}

}
}

	$MySQLi_CON->close();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link href="../css/presb.css" rel="stylesheet" type="text/css" />
		 <link href="../css/" rel="stylesheet">
		<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		 <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		 <link href="../font/css/font-awesome.css" rel="stylesheet" />
		<script type="text/javascript" src="../js/jquery2.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/main.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
		 <link rel="shortcut icon" href="../images/asawa.jpg">
	
		<title>iLeave | Reset Password</title>
	</head>
	<body>


<div class="col-md-12">
<div class="container" id="change">
	<div class="row">


		<div class="login-form col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2"><br><br>
						  <h2 class=" title text-center">Reset your password</h2>  <br><br><br><br>

						 <?php
							if(isset($msg3)){
								echo $msg3;
							}
							?>
						
						  <form action="" method="post" id="register-form">

							<div class="form-group col-md-12 col-sm-12">
							<label class="login-field-icon fui-user" for="login-email">Enter Your Email here</label>
							  <input type="email" name="email" class="form-control login-field" value="" placeholder="Enter your email" id="login-email" required />
							  <span class="help-block" id="error"></span>
							  
							</div>

							<div class="form-group col-md-12 col-sm-12">
							<label class="login-field-icon fui-user" for="login-email">Enter Your Payroll No here</label>
							  <input type="number" name="payroll_no" class="form-control login-field" value="" placeholder="Enter your sawa no" id="login-no" required />
							  <span class="help-block" id="error"></span>
							  
							</div>
							

							<div class="form-group col-md-12 col-sm-12">
							<label class="login-field-icon fui-lock" for="login-pass"> Enter Your New Password</label>
							  <input type="password" name="password" class="form-control login-field" value="" placeholder="Password" id="password" required />
							   <span class="help-block" id="error"></span>
							   

							</div>
							<div class="form-group col-md-12 col-sm-12">
							 <label class="login-field-icon fui-lock" for="login-pass">Confirm your new password</label>
							  <input type="password" name="password_again" class="form-control login-field" value="" placeholder="Confirm Password" id="login-pass" required />
							  <span class="help-block" id="error"></span>
							 
							</div>
							<div class="form-group col-md-12 col-sm-12">
							<input name="btn-reset" class="btn btn-primary  btn-block" onclick="return validate();" value="Reset Password" type="submit"/><br>
							

							</div>
						</form>
				<p>Back<br><a class="login-link1" href="index">Home</a></p>
			 </div>

			 	
	</div>
</div>

</div><div class="clearfix"></div>


<footer>
			
			  <!-- Start Footer Bottom -->
          <div class="footer-bottom ">
          <div class="container" style="background-color: f0f0f0; width: 100%; padding: 20px; text-align: center;">
            <div class="row">
            <div class="col-md-12">
              <p>Designed & Developed By <a rel="nofollow" href="#"><span class="aps">iLeave</span></a></p>
            </div>
            </div>
          </div>
          </div>
		
		<footer>
	
	<script src="../js/jquery.validate.min.js"></script>
    <script src="../js/register.js"></script>
	</body>
</html>