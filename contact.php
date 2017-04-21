<?php
include 'login.php';

if(!isset($_SESSION['userSession']))
{
	header("Location: index");
}

include_once 'db.php';
include 'mail.php';

$query3 = $MySQLi_CON->query("SELECT * FROM users WHERE email='$_SESSION[userSession]'");
          $row=$query3->fetch_array();

?>
<!DOCTYPE html PUBLIC >
<html xmlns="http://www.w3.org/1999/xhtml">
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
  <title>iLeave | Contact</title>

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
          <a class="navbar-brand" href="#">iLeave</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="home">Home</a></li>
            <li><a href="about">About Us</a></li>
            <li><a href="apply">Apply Leave</a></li>
            <li><a href="ended">End Leave</a></li>
            <li><a href="record">Leave Record</a></li>
            <li class="active"><a href="contact">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $row['name']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="profile/index"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
   
<br><br><br>
    <!-- Section: contact -->
    <section id="contact" class="home-section text-center">
    <div class="heading-contact">
      <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class=" " data-wow-delay="0.4s">
          <div class="section-heading">
          <h2>Get in touch</h2>
          <i class="fa fa-2x fa-angle-down"></i>

          </div>
          </div>
        </div>
         <div class="row main-top-margin text-center">
                <div class="col-md-8 col-md-offset-2 " >
                   
                    <p>
                     Contact us today. We iLeave value your feed back. Help us improve on our services.
                    </p>
                </div>
            </div>
      </div>
      </div>
    </div>
    <div class="container">

    <div class="row">
      <div class="col-lg-2 col-lg-offset-5">
        <hr class="marginbot-50">
      </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="boxed-grey">

                  <?php
                            if(isset($msg)){
                              echo $msg;
                            }
                          ?>  

                <form id="contact-form" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" name="name"  id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                                <option value="General Customer Service">General Customer Service</option>
                                <option value="Suggestions">Suggestions</option>
                                <option value="Product Support">Product Support</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" name="btnContactUs" class="btn btn-skin " id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    
    <div class="col-lg-4 col-md-4 col-sm-4">
      <div class="widget-contact">
        <address>
          <strong>iLeave</strong><br>
          <br>
          Moi University<br>
          <abbr title="Phone">P:</abbr> +(254) 729 000 000 <br> +(254) 790 000 000
          
        </address>

        <address>
          <strong>Email</strong><br>
          
           <a href="mailto:#">info@yourdormain.com.com</a>
        </address>  
        <address>
          <strong>We're on social networks</strong><br>
                        <ul class="company-social">
                            <li class="social-facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="social-twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li class="social-dribble"><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li class="social-google"><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        </ul> 
        </address>          
      
      </div>  
    </div>
    </div>  

    </div>
  </section>
  <!-- /Section: contact -->

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