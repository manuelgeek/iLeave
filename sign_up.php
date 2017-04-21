<?php
include_once 'db.php';
include 'login.php';


if(isset($_SESSION['userSession']))
{
	header("Location: home");
}

include_once'register.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link href="css/ileave.css" rel="stylesheet" type="text/css" />
		 <link href="css/" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		 <link href="font/css/font-awesome-animation.css" rel="stylesheet" />
		  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="js/jquery2.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
		 
		<script type='text/javascript'>
			function refreshCaptcha(){
				var img = document.images['captchaimg'];
				img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
			}
		</script>
	
		<title>iLeave | Sign Up</title>
	</head>
	<body>
					<div class="container">
						  <div class="login-form col-md-12 col-sm-12 ">
						 <!-- <h2 class="signup">New to ASAWA? Sign Up</h2>-->
						 <h2 class="h2 text-center">iLeave <small> Sign Up</small></h2>



						  <?php
							if(isset($msg)){
								echo $msg;
							}
							else{
								?>
					            <!--<div class='alert alert-info col-md-7 col-sm-7'>
									<span class='glyphicon glyphicon-asterisk'></span> &nbsp; all the fields are mandatory !
								</div>-->
					            <?php
							}
							?>


						  <form action="" method="post" id="register-form">
							<div class="form-group col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
							  <input type="text" class="form-control login-field" value="" placeholder="Enter your Full Name" id="login-name" name="full_name" required />
							   <span class="help-block" id="error"></span>
							</div>
							<div class="form-group col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
							  <input type="email" name="email" class="form-control login-field" value="" placeholder="Enter your email" id="login-email" required />
							 
							   <span class="help-block" id="error"></span>
							</div>
							<div class="form-group col-md-6 col-sm-6 col-sm-offset-3 col-md-offset-3">
							  <input type="number" name="payroll_no" class="form-control login-field" value="" placeholder="Enter your Payroll No" id="login-no"	required />
							 
							   <span class="help-block" id="error"></span>
							</div>

							<div class="form-group col-md-6 col-sm-6 col-sm-offset-3 col-md-offset-3">
							  <input type="password" name="password" id="password" class="form-control login-field" value="" placeholder="Password" id="login-pass" required />
							  
							  <span class="help-block" id="error"></span>
							</div>
							<div class="form-group col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
							  <input type="password" name="password_again" class="form-control login-field" value="" placeholder="Confirm Password" id="login-pass" required />
							 
							  <span class="help-block" id="error"></span>
							</div>
							<div class="form-group col-md-6 col-sm-6 col-sm-offset-3 col-md-offset-3">
							<input  value="Log In" name="checkbox1" id="checkboxid" type="checkbox"><span class="login-link" required />I Accept Terms and Conditions of iLeave</span></input>
							 <span class="help-block" id="error"></span>

							 <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="table">
								    <?php if(isset($msg2)){?>
								    <tr>
								      <td colspan="2" align="center" valign="top"><?php echo $msg2;?></td>
								    </tr>
								    <?php } ?>
							 </table>
								   
								<ul class="captchacode">
									<li><img src='captcha.php?rand=<?php echo rand();?>' id='captchaimg'/></li>
								        
								    <li> <input id="captcha_code" name="captcha_code" type="text"></li>
								</ul>
								         <label for='message'>Enter the code above here :</label><br>
								        
								        Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.
								
								   
								    
								 


							<input name="btn-signup" class="btn btn-primary  btn-block" onclick="return validate();" value="Sign Up" type="submit"/>
							
							<br>
						
							Already Have Account?<br><a class="login-link1" href="index">Sign In</a>
							</div>
						</form>
						  </div>
						<div class="ft1 text-center">
								<p class="ftr"> ©2016-Powered By <span> <a href="#"/> iLeave</a></span></p>
						</div>
					  </div>


	  <script src="js/jquery.validate.min.js"></script>
    <script src="js/register.js"></script>
	</body>
</html>