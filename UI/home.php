<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>E Procurements Site</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <!--middle table -->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
     
	<!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css" rel="stylesheet"/>
    <style>
    .table-style .today {background: #2A3F54; color: #ffffff;}
.table-style th:nth-of-type(7),td:nth-of-type(7) {color: blue;}
.table-style th:nth-of-type(1),td:nth-of-type(1) {color: red;}
.table-style tr:first-child th{background-color:#F6F6F6; text-align:center; font-size: 15px;}</style>
</head>

<body>
		
		<div class="row">
  		<div class align="center">
		<a href="index.html"><img id="logo" src="logo.png" alt="Worthy"></a></div>
		</div>


<!-- Navbar will come here -->

<!-- end navbar -->

<div class="wrapper">
	<div class="header">
		<nav class="navbar navbar-info" role="navigation">

	<div class="container-fluid">
    	<div class="navbar-header">
    	</div>

    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <i  class="brand-logo"><p id="demo"></p></i>
    		<ul class="nav navbar-nav right hide-on-med-and-down">
				<li class="active"><a href="home.html">Home</a></li>
        		<li><a href="home.html">Contact Us</a></li>
        		<li><a href="singin.html">Sign In</a></li>
        		<li><a href="#">Sign Up</a></li>
        		<!--<li class="dropdown">
        			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        			<ul class="dropdown-menu">
					  <li><a href="#">Action</a></li>
					  <li><a href="#">Another action</a></li>
					  <li><a href="#">Something else here</a></li>
					  <li class="divider"></li>
					  <li><a href="#">Separated link</a></li>
					  <li class="divider"></li>
				      <li><a href="#">One more separated link</a></li>
        			</ul>
        		</li>-->
    		</ul>
    	</div>
	</div>
</nav>

<div class="container-fluid"><!-- start the contend -->
 <div class="row"><!-- start the row -->
    <div class="col-md-2"><!-- start side bar -->
      <table >
     		<tr>
     		<td><button class="btn btn-info" style="padding: 15px 30px; width: 200px; ">Announcements</button></td>
     		</tr>
          
        <tr>			
     		<td><button class="btn btn-info" style="padding: 15px 30px; width: 200px; " >Tenders by Location</button></td>
     		</tr>
        <tr>  
     		<td><button class="btn btn-info" style="padding: 15px 30px; width: 200px; " >Tenders by Organisation</button></td>
     		</tr>
        <tr>  
     		<td><button class="btn btn-info" style="padding: 15px 30px; width: 200px; " >Tenders Status</button></td>
     		</tr>
        <tr>  
     		<td><button class="btn btn-info" style="padding: 15px 30px; width: 200px; " >Tenders by Classification</button></td>
     		</tr>
     	</table>
    
    </div><!-- end side bar -->

  
    <div class="col-md-8"><!-- start the tables -->
     <div class="row"><!-- start 1st table row -->
 

      <div class="container-fluid"><!-- start contend 1st table -->
      <h3 class="#ce93d8 purple lighten-3">Latest Tenders</h3>
      <table class="table table-hover">
      <thead class="#ce93d8 purple lighten-3">
        <tr>
          <th>Tender Title</th>
          <th>Reference</th>
          <th>Closing Date</th>
          <th>Bid Opening Date</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>John</td>
          <td>Doe</td>
          <td>john@example.com</td>
          <td>2015.01.01</td>
        </tr>
        <tr>
          <td>Mary</td>
          <td>Moe</td>
          <td>mary@example.com</td>
           <td>2015.01.01</td>
        </tr>
        <tr>
          <td>July</td>
          <td>Dooley</td>
          <td>july@example.com</td>
           <td>2015.01.01</td>
        </tr>
      </tbody>
      </table>
      </div><!-- end contend 1st table -->
     </div><!-- end 1st table row -->
    <div class="row"><!-- start 2nd table row -->
      <div class="container-fluid"> <!-- start 2nd table contend -->
      <h3 class="#ce93d8 purple lighten-3">Latest Corrigendums</h3>
      <table class="table table-hover">
      <thead class="#ce93d8 purple lighten-3">
        <tr>
          <th>Tender Title</th>
          <th>Reference</th>
          <th>Closing Date</th>
          <th>Bid Opening Date</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>John</td>
          <td>Doe</td>
          <td>john@example.com</td>
          <td>2015.01.01</td>
        </tr>
        <tr>
          <td>Mary</td>
          <td>Moe</td>
          <td>mary@example.com</td>
          <td>2015.01.01</td>
        </tr>
        <tr>
          <td>July</td>
          <td>Dooley</td>
          <td>july@example.com</td>
          <td>2015.01.01</td>
        </tr>

      </tbody>
      </table>

     
    
   
    </div><!--2nd table end contend -->
      
    </div><!-- end 2nd table row -->
   </div><!-- end tables -->


    <div class=" col-md-2 col-sm-12 well pull-right-lg" style="border:1px solid;height: 350px;"><!-- start calender -->
    <p class="well" style="padding:0px; margin-bottom:0px;">
      <span class="glyphicon glyphicon-calendar"></span>  Calendar
    </p>
    <div class="col-md-12" style="padding:0px;">
      <br>
        <table style="margin-left: -12px;" class="table table-bordered table-style table-responsive">
          <tr>
            <th colspan="2"><a href="?ym=<?php echo $prev; ?>"><span class="glyphicon glyphicon-chevron-left"></span></a></th>
            <th colspan="2"> 2017</th>
            <th colspan="2"><a href="?ym=<?php echo $next; ?>"><span class="glyphicon glyphicon-chevron-right"></span></a></th>
          </tr>
          <tr>
            <th>S</th>
            <th>M</th>
            <th>T</th>
            <th>W</th>
            <th>T</th>
            <th>F</th>
            <th>S</th>
          </tr>
          <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
          </tr>
          <tr>
            <td>8</td>
            <td>9</td>
            <td>10</td>
            <td>11</td>
            <td class="today">12</td>
            <td>13</td>
            <td>14</td>
          </tr>
          <tr>
            <td>15</td>
            <td>16</td>
            <td>17</td>
            <td>18</td>
            <td>19</td>
            <td>20</td>
            <td>21</td>
          </tr>
           <tr>
            <td>22</td>
            <td>23</td>
            <td>24</td>
            <td>25</td>
            <td>26</td>
            <td>27</td>
            <td>28</td>
          </tr>
            <tr>
            <td>29</td>
            <td>30</td>
            <td>31</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          
          <!--?php
            foreach ($weeks as $week) {
              echo $week;
            };
          ?-->
        </table>

    </div>
  </div><!-- end calender -->

 

 </div><!-- end row -->
</div><!-- end of container -->

      <!--
       	<div >
       		<ul style="list-style: none; align-self: center;" >
       			<li ><button class="btn btn-info"><a href="">Tenders Status</a></button></li>
       			<li ><button class="btn btn-info"><a href="">Tenders by Organisation</a></li></button>
       			<li ><button class="btn btn-info"><a href="">Tenders by Location</a></li></button>
       			<li ><a href="">Tenders by Classification</a></li><br>
       			<li ><a href="">Announcements</a></li>

      		</ul>
      	</div>-->
      
      	

       

      
    
   
   	<div class="fixed-action-btn">
   			<a class="btn-floating btn-large red">
        <i class="large material-icons">more</i>
        </a>
        <ul>
          <li><a href="#" class="btn-floating red btn-large"><i class="large material-icons">help</a></li>
          <li><a href="#" class="btn-floating blue btn-large"><i class="large material-icons">search</i></a></li>
          <li><a href="#" class="btn-floating orange btn-large"><i class="large material-icons">feedback</i></a></li>
          <li><a href="#" class="btn-floating green btn-large"><i class="large material-icons">FAQ</i></a></li>
          
          </ul>
   	</div>
	
	

			<!-- here you can add your content -->
			
		</div>
	</div>
</div>



</body>
  <script>
  var d = new Date();
  document.getElementById("demo").innerHTML = d.toUTCString();
  </script>
	<!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  

	<!--   Core JS Files   -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="assets/js/material-kit.js" type="text/javascript"></script>
  <!-- include ALL Plugin -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" ></script>
    <!-- nessesary for bootstrap java script plugin -->



</html>
