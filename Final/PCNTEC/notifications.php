<!doctype html>
<?php include 'connection.php'; ?>
<?php  session_start();
if (isset($_SESSION['tec_data'])) {
	$tec=$_SESSION['tec_data'];

}else {
    header("location:../Bidder_Module/login.php");

}
?>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>TEC Member Panel</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="wrapper">

	    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-1.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="#" class="simple-text">
					TEC Member
				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
	                <li >
	                    <a href="dashboard.php">
	                        <i class="material-icons">dashboard</i>
	                        <p>Dashboard</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="profile.php">
	                        <i class="material-icons">person</i>
	                        <p>My Profile</p>
	                    </a>
	                </li>
	                <!--<li>
	                    <a href="search.html">
	                        <i class="material-icons">content_paste</i>
	                        <p>Search Tender</p>
	                    </a>
	                </li>-->
	                <li>
	                    <a href="evals.php">
	                        <i class="material-icons">library_books</i>
	                        <p>My Evaluations</p>
	                    </a>
	                </li>
	               <!-- <li>
	                    <a href="icons.html">
	                        <i class="material-icons">bubble_chart</i>
	                        <p>Icons</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="maps.html">
	                        <i class="material-icons">location_on</i>
	                        <p>Maps</p>
	                    </a>
	                </li>-->
	                <li class="active">
	                    <a href="notifications.php">
	                        <i class="material-icons text-gray">notifications</i>
	                        <p>Tender Ranks</p>
	                    </a>
	                </li>
					<li class="active-pro">
	                    <a href="tec_logout.php">
	                        <i class="material-icons">unarchive</i>
	                        <p>SignOut</p>
	                    </a>
	                </li>
	            </ul>
	    	</div>
	    </div>

	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">

			</nav>
			<?php
				$tecid=$tec['TecID'];
				$sql="SELECT TenderID FROM gaccess WHERE TecID='$tecid' AND Status=1  AND TenderID IN (SELECT TenderID FROM tender WHERE CDate < CURDATE()) ";
				//$sql1 = "SELECT * FROM bid";

				$result = mysqli_query($conn, $sql);
			 ?>
	        <div class="content">
	            <div class="container-fluid">
	                <div class="card">
	                    <div class="card-header" data-background-color="purple">
	                        <h4 class="title">Current Ranks</h4>
	                    </div>
	                    <div class="card-content">
	                        <div class="row">
	                        	<h5>Alerts</h5>

														<div class="panel-group" id="accordion">
															<!-- get tender id -->
															<?php if($result){
																$num=1;
																while ($row = mysqli_fetch_assoc($result)){

																?>

														  <div class="panel panel-default">
														    <div class="panel-heading">
														      <h4 class="panel-title">
														        <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $num ?>">
																			<p>Tender ID: <?php echo $row['TenderID'];?>
																				<span style="float:right;"><i class="material-icons">play_for_work</i></span> </p>
																			</p>



																		</a>
														      </h4>
														    </div>
														    <div id="<?php echo $num ?>" class="panel-collapse collapse">
														      <div class="panel-body">
																		<table class="table">
																			    <thead>
																			        <tr>
																			            <th class="text-center">#</th>
																			            <th>Bidder Name</th>
																			            <th>BidderID</th>
																			            <th>Avg Score</th>
																									<th>Evaluate Files</th>
																			            <th class="text-right">Bidder Registration File</th>
																			        </tr>
																			    </thead>
																					<?php
																						$tenid=$row['TenderID'];
																						$sql1="SELECT * FROM `finaleval` WHERE TenderID='$tenid' ORDER BY `finaleval`.`AvgScore` DESC";
																						$result1 = mysqli_query($conn, $sql1);


																					?>
																			    <tbody>
																						<?php if($result1){
																							$num1=1;
																							while ($row1 = mysqli_fetch_assoc($result1)){
																								$bidderid=$row1['BidderID'];
																								$sql3="SELECT * FROM bidder WHERE BidderID='$bidderid'";
																								$result3 = mysqli_query($conn, $sql3);
																								$row3 = mysqli_fetch_assoc($result3);

																								$sql2="SELECT `TecID`,`EvaluateFile` FROM `teceval`WHERE `TenderID`='$tenid' and BidderID='$bidderid'";
																								$result2 = mysqli_query($conn, $sql2);
																							?>
																			        <tr>
																			            <td class="text-center"><?php echo $num1; ?></td>
																			            <td><?php echo $row3['Name']?></td>
																			            <td><?php echo $row1['BidderID']?></td>
																			            <td><?php echo $row1['AvgScore']?></td>
																									<td>
																										<?php
																											while ($row2 = mysqli_fetch_assoc($result2)){
																												echo $row2["TecID"]." : ";
																												?>
																												<a href="../Bidder_Module/<?php echo $row3['TdFile']; ?>" target="_blank">Download </a><br>
																												<?php

																											}
																										?>

																									</td>
																			            <td class="text-right"><a href="../Bidder_Module/<?php echo $row3['TdFile']; ?>" target="_blank">Download </a></td>

																			        </tr>
																						<?php
																						$num1=$num1+1;
																					}
																				}


																						?>
																			    </tbody>
																			</table>
																	</div>
														      <div class="panel-footer"></div>
														    </div>
														  </div>
															<?php
															$num=$num+1;
														}
													}
															?>
														</div>





	                        </div>

	                        <br>
	                        <br>


	                    </div>
	                </div>
	            </div>
	        </div>

					<footer class="footer">
		 				 <div class="container-fluid">
		 						 <nav class="pull-left">
		 								 <ul>
		 										 <li>
		 												 <a href="#">
		 														 Home
		 												 </a>
		 										 </li>

		 								 </ul>
		 						 </nav>
		 						 <p class="copyright pull-right">
		 								 &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">E-Procurement</a>
		 						 </p>
		 				 </div>
		 		 </footer>
	    </div>
	</div>

</body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
