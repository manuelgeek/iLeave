<?php

include 'login_admin.php';
if(isset($_SESSION['adminSession']))
{
	header("Location: admin");
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link href="../css/ileave.css" rel="stylesheet" type="text/css" />
		 <link href="../css/" rel="stylesheet">
		<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		 <link href="../font/css/font-awesome-animation.css" rel="stylesheet" />
		  <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="../js/jquery2.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	
		<title>iLeave | Admin Sign In</title>
	</head>
	<body>
					<div class="container">
						 
					
						<div class="login-screen col-md-12">
						<br><br><br><br>
						 
							<h2 class="h2 text-center">iLeave <small>Admin Sign In</small></h2>  <br><br><br>


							
							<?php
							if(isset($msg1)){
								echo $msg1;
							}
							?>


						<form action="" method="post">
							<div class="form-group col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
							  <input type="email" name="email" class="form-control login-field" value="" placeholder="Enter your email" id="login-name" required />
							  <label class="login-field-icon fui-user" for="login-name"></label>
							</div>

							<div class="form-group col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
							  <input type="password" name="password" class="form-control login-field" value="" placeholder="Password" id="login-pass" required />
							  <label class="login-field-icon fui-lock" for="login-pass"></label>
							</div>
							<div class="form-group col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
							<input class="btn btn-primary  btn-block" value="Sign In" name="btn-login" type="submit"/>
							</div>
							<div class="form-group col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
							<br><br>
							
							</div>
						</form>
				 </div>
<br><br>

						<div class="ft1 text-center">
								<p class="ftr"> ©2016-Powered By <span> <a href="#"/> iLeave</a></span></p>
						</div>
		</div>


	  <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/register.js"></script>
	</body>
</html>