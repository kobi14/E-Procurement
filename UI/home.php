<!doctype html>
<?php include 'connection.php'; ?>
     <!-- calender java script file -->
      <script> 
function displayCalendar(){
 
 
 var htmlContent ="";
 var FebNumberOfDays ="";
 var counter = 1;
 
 
 var dateNow = new Date();
 var month = dateNow.getMonth();

 var nextMonth = month+1; //+1; //Used to match up the current month with the correct start date.
 var prevMonth = month -1;
 var day = dateNow.getDate();
 var year = dateNow.getFullYear();
 
 
 //Determing if February (28,or 29)  
 if (month == 1){
    if ( (year%100!=0) && (year%4==0) || (year%400==0)){
      FebNumberOfDays = 29;
    }else{
      FebNumberOfDays = 28;
    }
 }
 
 
 // names of months and week days.
 var monthNames = ["January","February","March","April","May","June","July","August","September","October","November", "December"];
 var dayNames = ["Sunday","Monday","Tuesday","Wednesday","Thrusday","Friday", "Saturday"];
 var dayPerMonth = ["31", ""+FebNumberOfDays+"","31","30","31","30","31","31","30","31","30","31"]
 
 
 // days in previous month and next one , and day of week.
 var nextDate = new Date(nextMonth +' 1 ,'+year);
 var weekdays= nextDate.getDay();
 var weekdays2 = weekdays
 var numOfDays = dayPerMonth[month];
     
 
 
 
 // this leave a white space for days of pervious month.
 while (weekdays>0){
    htmlContent += "<td class='monthPre'></td>";
 
 // used in next loop.
     weekdays--;
 }
 
 // loop to build the calander body.
 while (counter <= numOfDays){
 
     // When to start new line.
    if (weekdays2 > 6){
        weekdays2 = 0;
        htmlContent += "</tr><tr>";
    }
 
 
 
    // if counter is current day.
    // highlight current day using the CSS defined in header.
    if (counter == day){
        htmlContent +="<td class='dayNow'  onMouseOver='this.style.background=\"#FF0000\"; this.style.color=\"#FFFFFF\"' "+
        "onMouseOut='this.style.background=\"\"; this.style.color=\"\"'>"+counter+"</td>";
    }else{
        htmlContent +="<td class='monthNow' onMouseOver='this.style.background=\"#FF0000\"'"+
        " onMouseOut='this.style.background=\"\"'>"+counter+"</td>";    
 
    }
    
    weekdays2++;
    counter++;
 }
 
 
 
 // building the calendar html body.
 var calendarBody = "<table class='calendar'> <tr class='monthNow'><th colspan='7'>"
 +monthNames[month]+" "+ year +"</th></tr>";
 calendarBody +="<tr class='dayNames'>  <td>Sun</td>  <td>Mon</td> <td>Tues</td>"+
 "<td>Wed</td> <td>Thurs</td> <td>Fri</td> <td>Sat</td> </tr>";
 calendarBody += "<tr>";
 calendarBody += htmlContent;
 calendarBody += "</tr></table>";
 // set the content of div .
 document.getElementById("calendar").innerHTML=calendarBody;
 
}
</script> 





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
    <link rel="stylesheet" type="text/css"  href="home_css/home.css">
</head>

<body onload="displayCalendar()">

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
				<li class="active"><a href="home.php">Home</a></li>
        		<li><a href="home.php">Contact Us</a></li>
        		<li><a href="singin.html">Sign In</a></li>
        		<li><a href="#">Sign Up</a></li>
          </ul>
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
<?php
			//Active members count
      $sql1="SELECT COUNT(*) AS num FROM bidder";//get the bidder count
      $data = mysqli_query($conn, $sql1);//excute the query
      $row=mysqli_fetch_assoc($data);//
      $activeMembers=$row['num'];

			//opening today tender count
			$sql2="SELECT COUNT(*) AS num FROM tender WHERE OpeningDate=CURDATE()";//curdate() eken system date eka enawa.
			$data2 = mysqli_query($conn, $sql2);//excute the query
			$row2=mysqli_fetch_assoc($data2);//
			$openToday=$row2['num'];

			//closiing today tender count
			$sql3="SELECT COUNT(*) AS num FROM tender WHERE ExpireDate=CURDATE()";//curdate() eken system date eka enawa.
			$data3 = mysqli_query($conn, $sql3);//excute the query
			$row3=mysqli_fetch_assoc($data3);//
			$closeToday=$row3['num'];

     ?>
      <!--live bids-->
      <div class="container-fluid">
        <div class="row">

            <div class=" #82b1ff blue accent-1" style="padding: 20px 10px; width: 200px; box-shadow: 5px 5px grey" align="center"><h4 style="font-family:Impact;"><?php echo $activeMembers;?></h4></div>
            <div class=" #ce93d8 purple lighten-3  " align="center" style="padding: 5px 10px; width: 200px; box-shadow: 5px 5px grey"><span style="font-family:Impact; color:white; font-size: 15pt" >Active members</span></div>
            <div class=" #82b1ff blue accent-1  " style="padding: 20px 10px; width: 200px; box-shadow: 5px 5px grey " align="center"><h4 style="font-family:Impact;"><?php echo $openToday;?></h4></div>
            <div class=" #ce93d8 purple lighten-3  " align="center" style="padding: 5px 20px; width: 200px; box-shadow: 5px 5px grey"><span style="font-family:Impact; color:white; font-size: 15pt" >Tenders Opening Today</span></div>
            <div class="  #82b1ff blue accent-1  " style="padding: 20px 20px; width: 200px; box-shadow: 5px 5px grey " align="center"><h4 style="font-family:Impact;"><?php echo $closeToday;?></h4></div>
            <div class=" #ce93d8 purple lighten-3 " align="center" style="padding: 5px 20px; width: 200px; box-shadow: 5px 5px grey"><span style="font-family:Impact; color:white; font-size: 15pt" >Tenders closing Today</span></div>

        </div>
      </div>


     </div>  <!--end live bids-->
<!-- end side bar -->

		<?php
			$sql="SELECT * FROM tender";
			$result = mysqli_query($conn, $sql);

		 ?>

    <div class="col-md-8"><!-- start the tables -->
     <div class="row"><!-- start 1st table row -->


      <div class="container-fluid"><!-- start contend 1st table -->
      <h3 class="#ce93d8 purple lighten-3 col-md-4" style=" box-shadow: 5px 5px grey; font-family:Impact;  font-size: 20pt">Latest Tenders</h3>
      <table class="table table-hover">
      <thead class="#ce93d8 purple lighten-3" style=" box-shadow: 5px 5px grey" >
        <tr>
          <th>Tender Title</th>
          <th>Reference</th>
          <th>Closing Date</th>
          <th>Bid Opening Date</th>
        </tr>
      </thead>
      <tbody>
				<?php
				while ($row = mysqli_fetch_assoc($result)) {

				 ?>
        <tr>
          <td><?php echo $row["TenderTitle"] ?></td>
          <td><?php echo $row["Category"] ?></td>
          <td><?php echo $row["ExpireDate"] ?></td>
          <td><?php echo $row["OpeningDate"] ?></td>
        </tr>
				<?php
				}
				 ?>
      </tbody>
      </table>
      </div><!-- end contend 1st table -->
     </div><!-- end 1st table row -->
    <div class="row"><!-- start 2nd table row -->
      <div class="container-fluid"> <!-- start 2nd table contend -->
      <h3 class="#ce93d8 purple lighten-3 col-md-4" style=" box-shadow: 5px 5px grey; font-family:Impact;  font-size: 20pt ">Latest Corrigendums</h3>
      <table class="table table-hover">
      <thead class="#ce93d8 purple lighten-3" style=" box-shadow: 5px 5px grey">
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

    <!-- start calender -->
<div class="col-md-2">
        
       <div id="calendar"></div> 
</div><!-- end calender -->

     <!--more icon-->

      <!--<div class="fixed-action-btn">

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
     -->
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










			<!-- here you can add your content -->

		</div>
	</div>
</div>
    <!--footer-->
<footer id="red">
  <h2 class="text">-All rights reserved.-</h2>
 
      </div>
</footer>

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
