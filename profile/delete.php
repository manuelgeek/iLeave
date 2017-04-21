<?php

include '../db.php';
include '../login.php';

if(!isset($_SESSION['userSession']))
{
    header("Location: ../index");
}

if(isset($_POST['btn-delete']))
{
    $user_email = $MySQLi_CON->real_escape_string(trim($_POST['email']));
    $upass = $MySQLi_CON->real_escape_string(trim($_POST['password']));
    
    $query = $MySQLi_CON->query("SELECT * FROM users WHERE email='$_SESSION[userSession]'");
    $row=$query->fetch_array();
    
    if(password_verify($upass, $row['password']))
    {
        // select image from db to delete
        $stmt_select = $MySQLi_CON->query("SELECT photo FROM users WHERE email='$_SESSION[userSession]'");
    //  $stmt_select->execute(array('$_SESSION[userSession]'=>$_GET['upload_pic']));
        $imgRow=$stmt_select->fetch_array();
        unlink("user_images/".$imgRow['photo']);
        // it will delete an actual record from db
        $stmt_delete = $MySQLi_CON->query("DELETE FROM users WHERE email='$_SESSION[userSession]'");
        //$stmt_delete->bindParam('$_SESSION[userSession]',$_GET['btn-delete']);
        //$stmt_delete->execute();
        session_destroy();
        unset($_SESSION['userSession']);
        header("refresh:3;../index");

        $msg6 = "<div class='alert alert-success col-md-6 col-md-offset-3>
                    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Account deleted Successfully! We Regret Loosing you!
                </div>";

    }
    else
    {
        $msg6 = "<div class='alert alert-danger col-md-6 col-md-offset-3 >
                    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; email or password Wrong !
                </div>";
    }
    
    $MySQLi_CON->close();
    
}
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
  
    <title>iLeave | Delete Account</title>
  </head>
  <body>


<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="title text-center">Delete Your  Account</h2><hr /><br><br><br>
        <p class="col-md-6 col-md-offset-3">By deleting this account you issolate yourself from the iLeaves Terms and Conditions plus all the benefits you can receive from it.<br>
        Your Account and all your details will be lost from the database.</p><br><br><br>
        
        <?php
		if(isset($msg6)){
			echo $msg6;
		}
		?>
         <br><br><br>
        <div class="form-group col-md-6 col-md-offset-3">
        <input type="email" class="form-control " placeholder="Email address" name="email" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group col-md-6 col-md-offset-3">
        <input type="password" class="form-control " placeholder="Password" name="password" required />
        </div>
       
     	
        
        <div class="form-group col-md-6 col-md-offset-3">
            <button type="submit" class="btn btn-danger " name="btn-delete" id="btn-login" title="click for delete" onclick="return confirm('sure to delete your iLeave Account ?')">
    		<span class="glyphicon glyphicon-remove" ></span> &nbsp; Delete Account
			</button> <br><br><br>
           
            
        </div>  
        
         <p class="col-md-6 col-md-offset-3">We're concerned with why you choose to leave. Please leave us a Message in our <a href="../contact">Contact  </a> Page.&nbsp; &nbsp; &nbsp;
            We regret Loosing you. </p> <br><br><br>
            <a href="../home" class="b col-md-6 col-md-offset-3" style="float:right;">Go back to website</a>
      
      </form>

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
  
    
    </body>
</html>