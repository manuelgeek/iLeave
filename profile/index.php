<?php
include_once '../db.php';
include '../login.php';


if(!isset($_SESSION['userSession']))
{
	header("Location: ../index");
}

$query = "SELECT * FROM users WHERE email='$_SESSION[userSession]'";
$account1 = mysqli_query($MySQLi_CON,$query) or die (mysqli_error());
$account = mysqli_fetch_array($account1);

$MySQLi_CON->close();


?>

<!--*************PHP PROFILE PHOTO******-->
<?php

//include_once 'db.php';

if ($account['photo']=="") {
	$msg4 = "<img src='../img/user.png' style='border-radius:6px; border:8px solid #fff; padding:0px;' height=150px />";
}//else {
	//$msg4 = "";
//}
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
	
		<title>iLeave | Profile</title>
	</head>
	<body>
	
	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../home"><i class="fa fa-2x fa-angle-left"></i> Back</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
         <!-- <ul class="nav navbar-nav">
            <li class="active"><a href="home">Home</a></li>
            <li><a href="about">About Us</a></li>
            <li><a href="#">Apply Leave</a></li>
            <li><a href="#">Leave Record</a></li>
            <li><a href="contact">Contact</a></li>
          </ul>-->
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $account['name']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="index"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                <li><a href="../logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav><br><br><br>
	<section class="wholebody">
	<div class="col-md-3  row-eq-height" id="sidedar">
		 <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <div class="config-icon hvr-outline-out"><img src="../img/settings.svg"></div>
                </button>
                <a class="navbar-brand" href="#" > iLEAVE ACCOUNT</a>
            </div>

        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side navbar-collapse" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                             <?php
							if(isset($msg4)){
								echo $msg4;
							} else {
								?>

							

							<img src="user_images/<?php echo $account['photo']; ?>"  style="border-radius:6px; border:8px solid #fff; padding:0px;"  height=150px />
							<?php
						}?>
                            <div class="inner-text">
                                <?php echo $account['name'];?>
                            <br />
                                <small>Email:  <b> <?php echo $account['email'];?> </b>    </small><br>
                                
                            </div>
                        </div>

                    </li>
                    <li>
                         <a href="index?page=prof_page"><i class="fa fa-user" ></i>Profile</a>
                    </li>

                     <li>
                        <a href="update"><i class="fa fa-info "></i>Update Info</a>
                    </li>
                    <li>
                        <a  href="updateinfo" ><i class="fa fa-star "></i>Leave Record</a>  <!--class="active-menu"-->
                    </li>
                    <li>
                        <a href="../apply" ><i class="fa fa-star "></i>Apply Leave </a>
                         
                    </li>
                     
                    <li>
                        <a href="resetpass"><i class="fa fa-lock "></i>Change Password </a>
                        
                    </li>
                     
                     
                     
                    <li>
                        <a href="delete"><i class="fa fa-remove " ></i>Delete Account</a>
                    </li>
                    <li>
                        <a href="../logout"><i class="fa fa-sign-out " name="logout"></i>LOG OUT </a>
                        
                    </li>
                   
                   
                   
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
	</div>
		
		 <div class="container-fluid">
      <div class="main-body col-md-9  row-eq-height">
       
        <div class="row">
          <div class="col-md-8">
            

          		<?php 
		@$page=  $_GET['page'];
		  if($page!="")
		  {
		  	if($page=="prof_page")
			{
				include('prof.php');
			
			}

			if($page=="profile")
			{
				include('profile.php');
			
			}
			if($page=="uploadpic")
			{
				include('uploadpic.php');
			
			}
			if($page=="updateinfo")
			{
				include('updateinfo.php');
			
			}
		  }
		  else
		  {
		  include('prof.php');
		}
		  ?>
	</div>
</div>
</div>


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
		
	</body>


</html>
		
		
		
	
	
	