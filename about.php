<?php
include 'login.php';

if(!isset($_SESSION['userSession']))
{
	header("Location: index");
}

include_once 'db.php';

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
  <title>iLeave | About Us</title>

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
            <li class="active"><a href="about">About Us</a></li>
            <li><a href="apply">Apply Leave</a></li>
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
   
<br><br><br>
     <!--.........................Body...........................-->
      <div class="container">
      
      <!-- Article main content -->
      <article class="col-sm-8 maincontent">
        <div class="page-header1">
          <h1 class="page-title1">About us</h1>
        </div>
        <h3>Presbyterian Weavers</h3>
        <p><img src="images/img.jpg" alt="" class="img-responsive" width="300" > Presbyterian Weavers is a Community Based Organisation that was founded almost two years ago. It is also registered and have a certificate. We are guided by the following key objectives:   </p>
          <ul>
            <li>To Promote economic empowerment and ensure meaninful participation of the community in poverty eradication</li>
            <li>To provide education and trainings in matter of sustainable  development through networking and collaboration with other organization</li>
            <li>To educate the general public on behaviour changes targeting sanitation,communicable diseases control mainly HIV/AIDS,Tuberculosis and Water borne diseases,drug and Substance abuse among the youth</li>
            <li>To Campaign against traditions that hinder sustainable development in our communities.</li>
            <li>To change as many youths as we can to a sound mindset able to reason and make sound judgment concerning their lives.</li>
            <li>To tap talent among the youths and transform it into self employemnt</li>
            <li>Creation of employment through income Generating activities i.e farming,ICT,trade among others</li>
            <li>To invest in I.T and ICT program in order to equip today's generation with relevant knowledge of the changing times</li>
          </ul>
        <p></p>
        <h3>Achievements</h3>
        <p> <ul>
        <li>We have had great achievements in visiting two children’s home where we were having some of our outreach programs. [Agape and iAfrica Children Centers]</li>
               <li>Participated over the last three years in youth week projects which we were able to bring the youths together, motivated them to help assist in some business projects which profits were geared towards maintaining the youth account.</li>
                <li>We have had constructive talks with key people who challenged us on ideas to invest in and projects to undertake. This helped in perception growth and team building bounds.</li>
                 </li>Out of the group we were able to have considerable number of members who agreed to participate in merry go rounds and table banking activities, in conjunction with some outsiders, but all thanks to the support and the cohesion the group brought.</li>
</p></ul>
        <h3>Weaver iLab</h3>
        <p>This a digital library based at the P.C.E.A Githima Church. Its the main project that we as the Presbyterian Weavers are investing in.The Weaver iLab is aimed at enriching the people of Dagoretti South all about technology. It will cover diverse areas including training programmes for the youth, internet access, photo shoot, printing of high quality posters and T-shirts, branding, graphic design, web design and software development. All these will be done in this Lab some of which will be charged at very friendly prices. It’s a one of a kind lab since there is none like this in Dagoretti area. Since the IT sector is growing vastly we saw the need to educate people and also mentor all technology enthusiast. </p>
        <h3>Property Management</h3>
        <p>Property Management will come as an aid to improve and help manage properties which some are owned by the local church and residents. To help improve their income and add value. </p>
        <h3>Community Radio</h3>
        <p>With the very much expected growth of the Weaver iLab,investing in communication will also be a set goal where we plan to launch a community radio as a main communication broadcast in the area. </p>
        
        
      </article>
      <!-- /Article -->
      
      <!-- Sidebar -->
      <aside class="col-sm-4 sidebar sidebar-right">

        <div class="widget">
          <h4>Weekly Updates</h4>
          <ul class="list-unstyled list-spaces">
            <li><a href="">Holiday Programme</a><br><span class="small text-muted">It is set to begin on the first week of November,plans are underway to improve efficiency of the program.</span></li>
            <li><a href="">Project Reports</a><br><span class="small text-muted">There will be a meeting to decide on which projects to be given priority.</span></li>
            <li><a href="">Account information</a><br><span class="small text-muted">Members are suppossed to clear their dbpts by the next meeting.</span></li>
            <li><a href="">Events</a><br><span class="small text-muted">A series of events have been organised for the purpose of team work among the group members.</span></li>
            <li><a href="">Meeting Calendar</a><br><span class="small text-muted">The meetings are held every first and third sunday of the month at the P.C.E.A Githima Church Basement at exactly 11.00AM.All are welcomess</span></li>
          </ul>
        </div>

      </aside>
      <!-- /Sidebar -->

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