<?php
include 'login_admin.php';

if(!isset($_SESSION['adminSession']))
{
	header("Location: index");
}

include '../db.php';

$query3 = $MySQLi_CON->query("SELECT * FROM admin WHERE email='$_SESSION[adminSession]'");
          $row=$query3->fetch_array();

$sql = "SELECT * FROM leaves ORDER BY id DESC";
$result = mysqli_query($MySQLi_CON,$sql) or die (mysqli_error());

if(isset($_POST['aprove-leave']))
{
  $rand = $MySQLi_CON->real_escape_string(trim($_POST['code']));
  $aprove = $MySQLi_CON->real_escape_string(trim($_POST['aprove']));

  if ($aprove == 'REJECT') {
    $ender = 'STOP';
  } else{
    $ender = '';
  }

  $stmt = $MySQLi_CON->prepare("UPDATE  leaves SET aprove='$aprove', ended='$ender' WHERE rand='$rand'");

    if($stmt->execute())
      {
        $successMSG = "Leave Succefully Approved / Rejected ...";
       
      }
      else
      {
        $errMSG = "error while Approving....";
      }

}

?>
<!DOCTYPE html PUBLIC >
<html xmlns="http://www.w3.org/1999/xhtml">
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
  <title>iLeave | Admin Aprove</title>

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
          <a class="navbar-brand" href="#">iLeave Admin</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="admin">Pending Aprovals</a></li>
            <li class="active"><a href="aprove">Aprove Leave</a></li>
             <li><a href="reject">Rejected  Leaves</a></li>
            <li><a href="active">Active Leaves</a></li>
            <li><a href="past">Past Leaves</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $row['name']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                
                <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  <div class="container"><br><br><br>
    <h2 class="text-center">Aprove Leave</h2>

  </div> <br><br><br><br><br><br>

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
     <td> <input type="radio" class="form-control input-sm" value="ACCEPT" name="aprove" required ></td><td><span style="padding: 0px 50px 50px 10px!important;">APPROVED</span></td>
    <td>  <input type="radio" class=" form-control input-sm" value="REJECT" name="aprove" required /></td><td><span style="padding:0px 0px 50px 10px!important;">DISAPPROVED </span></td>
    </tr>
    </table>
  </div>
    <br><br><br><br>
    
    <br><br>
   <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3" >
        <button type="submit" name="aprove-leave" class="form-control btn btn-primary">
        <span class="fa fa-sign-in"></span> &nbsp; Aprove
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