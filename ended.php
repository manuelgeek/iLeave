<?php
include 'login.php';

if(!isset($_SESSION['userSession']))
{
	header("Location: index");
}

include 'db.php';

$query3 = $MySQLi_CON->query("SELECT * FROM users WHERE email='$_SESSION[userSession]'");
          $row=$query3->fetch_array();
           $email = $row['email'];

$sql = "SELECT * FROM leaves ORDER BY id DESC";
$result = mysqli_query($MySQLi_CON,$sql) or die (mysqli_error());

if(isset($_POST['end-leave']))
{
  $rand = $MySQLi_CON->real_escape_string(trim($_POST['code']));
  $ended = $MySQLi_CON->real_escape_string(trim($_POST['ended']));

    $check_aprove = $MySQLi_CON->query("SELECT * FROM leaves WHERE aprove = '' AND email='$email' ");
      $count=$check_aprove->num_rows;

    if($count==0){

         $stmt = $MySQLi_CON->prepare("UPDATE  leaves SET ended='$ended' WHERE rand='$rand'");

    if($stmt->execute())
      {
        $successMSG = "Leave Succefully Ended ...";
       
      }
      else
      {
        $errMSG = "error while Stoping...";
      }
    } else {
      $errMSG = "No Current Leave or Leave is Pending...";
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
  <title>iLeave | Home</title>

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
            <li class="active"><a href="ended">End Leave</a></li>
            <li ><a href="record">Leave Record</a></li>
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
   
  <div class="container"><br><br><br>
    <h2 class="text-center">End Leave </h2>

  </div> 

  <br><br><br><br><br>

  <div class="container">
      <form method="post" enctype="multipart/form-data" class="form-horizontal">
     <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2" >

     <?php
  if(isset($errMSG)){
      ?>
            <div class="alert alert-danger">
              <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
  }
  else if(isset($successMSG)){
    ?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
  }
  ?>   
  
    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3" >
      <label class="control-label">Leave Code</label><br><br>
        <input class="form-control " type="text" name="code" placeholder="Leave code No"  required /><br><br>
    </div>
    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3" >
        <label class="control-label">Condition</label>
    <table  class=" table-responsive">
    <tr >
     <td> <input type="radio" class="form-control input-sm" value="STOP" name="ended" required ></td><td><span style="padding: 0px 50px 50px 10px!important;">End Leave</span></td>
    </table>
  </div>
    <br><br><br><br>
    
    <br><br>
   <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3" >
        <button type="submit" name="end-leave" class="form-control btn btn-primary" onclick="return confirm('sure to End Leave ?')">
        <span class="fa fa-sign-out"></span> &nbsp; End Leave
        </button>
    </div>
    <br>
    
    
    </div>
</form>
  </div><br><br><br><br>

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