<?php
include 'login.php';

if(!isset($_SESSION['userSession']))
{
	header("Location: index");
}

include_once 'db.php';

$query3 = $MySQLi_CON->query("SELECT * FROM users WHERE email='$_SESSION[userSession]'");
          $row=$query3->fetch_array();

if(isset($_POST['submit-leave']))
{
$rand = rand(10000,1000000);

  $email = $row['email'];
  $type = $MySQLi_CON->real_escape_string(trim($_POST['type']));
  $sday = $MySQLi_CON->real_escape_string(trim($_POST['sday']));
  $smon = $MySQLi_CON->real_escape_string(trim($_POST['smon']));
  $syear = $MySQLi_CON->real_escape_string(trim($_POST['syear']));
  $zday = $MySQLi_CON->real_escape_string(trim($_POST['zday']));
  $zmon = $MySQLi_CON->real_escape_string(trim($_POST['zmon']));
  $zyear = $MySQLi_CON->real_escape_string(trim($_POST['zyear']));
  $message = $MySQLi_CON->real_escape_string(trim($_POST['message']));
  $current = date("Y");

    if(($syear==$zyear && $smon > $zmon || $syear > $zyear) ||( ($syear==$zyear && $smon==$zmon)&& $sday>$zday) || ($syear< $current))
    {
       $msg3 = "<div class='alert alert-danger col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2'>
              <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Wrong Format In Time Interval
            </div>";
            
   }else{
        if($zyear - $syear > 2)
        {
             $msg3 = "<div class='alert alert-danger col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2'>
              <span class='glyphicon glyphicon-info-sign'></span> &nbsp; No Leave Goes Beyond 2 years.
            </div>";
        }else{

    $check_leave = $MySQLi_CON->query("SELECT * FROM leaves WHERE ended = '' AND email='$email' ");
      $count=$check_leave->num_rows;

         if($count==0){

          $query4 = "INSERT INTO leaves(type,rand,email,sday,smon, syear, zday, zmon, zyear, message) VALUES('$type','$rand','$email','$sday','$smon', '$syear', '$zday','$zmon','$zyear','$message')";
       if($MySQLi_CON->query($query4))
      {
        $msg3 = "<div class='alert alert-success col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2'>
              <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Leave Successfully Applied, Wait for Approval
            </div>";
            
      }
      else
      {
        $msg3 = "<div class='alert alert-danger col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2'>
              <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while applying leave !
            </div>";
      }

    }else{
        $msg3 = "<div class='alert alert-danger col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2'>
              <span class='glyphicon glyphicon-info-sign'></span> &nbsp; You Alredy Have an Active Leave or Pending!
            </div>";
    }

     }//end of years max
    }
}
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
  <title>iLeave | Apply Leave</title>

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
            <li class="active"><a href="apply">Apply Leave</a></li>
            <li><a href="ended">End Leave</a></li>
            <li><a href="record">Leave Record</a></li>
            <li><a href="contact">Contact</a></li>
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
    <!-- Section: intro -->
    <section id="intro" class="intro">
  
    <div class="slogan">
      <h2>Apply Leave <span class="text_color">iLeave</span> </h2>
      <h4>Apply leaves online.</h4>
    
    </div>
   
    </section>

    <br><br><br>
<div class="container">
<div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
    <form action="#" method="post">


    <h2 class="text-center">Apply Leave Here </h2><br>
 <?php
              if(isset($msg3)){
                echo $msg3;
              }
        ?>

  <table class="table-responsive col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">

   
 <tr><td class="lefttd" align="center">Select Leave Type </td><td>
     <select class="form-control" name="type" required>
     <option value="">Select</option>
         <option value="Paternal">Paternal</option>
        <option value="Maternal">Maternal</option>
        <option value="Sick">Sick</option>
        <option value="Academic">Academic</option>
        <option value="Emergency">Emergency</option>
        <option value="Annual">Annual</option>
        
    </select></td></tr>
 <tr><td>&nbsp;</td></tr>


         <tr><td>&nbsp;</td></tr>
        <tr><td class="lefttd" align="center">From Date:</td><td>
      <div class=" col-md-12 row">
      <div class="col-md-4 col-sm-4 ">
        <select class="form-control" name="smon">
        <option value="1">JAN</option>
        <option value="2">FEB</option>
        <option value="3">MARCH</option>
        <option value="4">APRIL</option>
        <option value="5">MAY</option>
        <option value="6">JUNE</option>
        <option value="7">JULY</option>
        <option value="8">AUG</option>
        <option value="9">SEPT</option>
        <option value="10">OCT</option>
        <option value="11">NOV</option>
        <option value="12">DEC</option>
        </select>
      </div>
      <div class="col-md-4 col-sm-4">
        <select class="form-control" name="sday">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
        </select>
      </div>
      <div class="col-md-4 col-sm-4">
        <input class="form-control" type="text" name="syear"   /></td></tr>
      </div>
    </div>
         <tr><td>&nbsp;</td></tr>

        <tr><td>&nbsp;</td></tr>
        <tr><td class="lefttd" align="center">To Date:</td><td>
        <div class=" col-md-12 row">
      <div class="col-md-4 col-sm-4 ">
        <select class="form-control" name="zmon">
        <option value="1">JAN</option>
        <option value="2">FEB</option>
        <option value="3">MARCH</option>
        <option value="4">APRIL</option>
        <option value="5">MAY</option>
        <option value="6">JUNE</option>
        <option value="7">JULY</option>
        <option value="8">AUG</option>
        <option value="9">SEPT</option>
        <option value="10">OCT</option>
        <option value="11">NOV</option>
        <option value="12">DEC</option>
        </select>
      </div>
      <div class="col-md-4 col-sm-4">
        <select class="form-control" name="zday">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
        </select>
      </div>
      <div class="col-md-4 col-sm-4">
        <input class="form-control" type="text" name="zyear"   /></td></tr>
      </div>
    </div>
         <tr><td>&nbsp;</td></tr>


        <tr><td class="lefttd" align="center">Detail</td><td><textarea class="form-control" name="message"></textarea></td></tr>
         <tr><td>&nbsp;</td></tr><br><br><br>
        <tr><td>&nbsp;</td><td><input type="submit" class=" btn btn-success form-control" value="Submit" name="submit-leave""></td></tr>
      </table>

  </form>
 </div>
 </div><br><br><br>

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