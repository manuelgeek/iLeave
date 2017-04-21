<?php
include 'login_admin.php';

if(!isset($_SESSION['adminSession']))
{
	header("Location: index");
}

include '../db.php';

$query3 = $MySQLi_CON->query("SELECT * FROM admin WHERE email='$_SESSION[adminSession]'");
          $row=$query3->fetch_array();

$sql = "SELECT * FROM leaves WHERE aprove= '' ORDER BY id DESC";
$result = mysqli_query($MySQLi_CON,$sql) or die (mysqli_error());

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
  <title>iLeave | Admin Home</title>

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
            <li class="active"><a href="admin">Pending Aprovals</a></li>
            <li><a href="aprove">Aprove Leave</a></li>
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
    <h2 class="text-center">Pending Approvals</h2>

  </div> 

  <!--          Start to display-->
    
          <div class="container-fluid" id="results">
             
              <div class="col-md-11" id="results1">

                  <div class="container">
                  <div class="row">

                  <table class="table  table-borderless table-responsive"> 
                    <thead class="panel-title ">       
                      <tr> 
                        <td> <b>NAME</b> </td>  
                        <td> <b>CODE </b> </td>
                        <td> <b>TYPE </b> </td>  
                        <td> <b>START </b> </td>
                        <td> <b>END </b> </td>
                        <td> <b>EMAIL </b> </td>
                        <td> <b>S. ADDRESS </b> </td>
                         <td> <b>MESSAGE </b> </td>
                       
                        
                      </tr>    
                    </thead> 
                    <tbody> 
              
                      <?php
                      
                        while($leaves = mysqli_fetch_array($result)){
                         $email = $leaves['email'];

                          $query2 = $MySQLi_CON->query("SELECT * FROM users WHERE email='$email'");
                               $row=$query2->fetch_array();

                          echo "<tr>";
                          
                            echo "<td>".$row['name']. "</td>";
                            echo "<td>".$leaves['rand']."</td>"; 
                            echo "<td>".$leaves['type']."</td>";
                            echo "<td>".$leaves['sday']. "-".$leaves['smon']."-" .$leaves['syear']."</td>";
                             echo "<td>".$leaves['zday']. "-".$leaves['zmon']."-" .$leaves['zyear']."</td>";
                             echo "<td>".$leaves['email']."</td>";
                             echo "<td>".$row['phone_2']."</td>";
                             echo "<td>".$leaves['message']."</td>"; 
                             
                            
                          echo "</tr>";
                        }//end of while
                      
                    
                      ?>
                      
                    
                    </tbody>
                  </table>
                </div>
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