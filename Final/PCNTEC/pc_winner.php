<!doctype html>
<?php include 'connection.php'; ?>

<?php  session_start();
if (isset($_SESSION['pc_data'])) {
	$pc=$_SESSION['pc_data'];
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

	<title>Procurement Commitee Member Panel</title>

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

	    <div class="sidebar" data-color="green" data-image="assets/img/sidebar-1.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="#" class="simple-text">
					PC MEMBER
				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
								<li >
									<a href="pc_dashboard.php">
										<i class="material-icons">dashboard</i>
										<p>Dashboard</p>
									</a>
								</li>

								<li>
	                                <a href="pc_profile.php">
	                                   <i class="material-icons">person</i>
	                                    <p>My Profile</p>
	                                </a>
	                            </li>

	                            <li>


								<li class="active">
									<a href="pc_winner.php">
									  <i class="material-icons">bubble_chart</i>
									  <p>Choosed Winners</p>
									</a>
								</li>

					<li class="active-pro">
		                    <a href="pc_logout.php">
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
				//$tecid=$tec['TecID'];
				$sql="SELECT * FROM tender ";
				//$sql1 = "SELECT * FROM bid";
				$result = mysqli_query($conn, $sql); ?>
	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="green">
	                                <h4 class="title">Choose Winners</h4>
	                               <!-- <p class="category">Created using Roboto Font Family</p>-->
	                            </div>
															 <div class="card-content">
																 <div class="row">

																	 <div class="panel-group" id="accordion">
																		 <!-- get tender id -->
																		 <?php if($result){
																			 $num=1;
																			 while ($row = mysqli_fetch_assoc($result)){
																				 $tenid=$row['TenderID'];
																				 $sql5="SELECT * FROM bid WHERE TenderID='$tenid' AND Status='1'  ";
																				 $result5 = mysqli_query($conn, $sql5);
																				 $bidwin=0;
																				 if ($result5) {
																					 if(mysqli_num_rows($result5)>=1){
																						 $bidwin=1;

																					 }
																				 }
																			 ?>
																			 <form action="pc_winnerform.php" method="POST">

																		 <div class="panel panel-default">
																			 <div class="panel-heading">
																				 <h4 class="panel-title">
																					 <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $num ?>">Tender ID: <?php echo $row['TenderID'];?>



																					 </a>
																					 <p><?php echo $bidwin;?></p>
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
																												 <th>Bidder File</th>
																												 <th>Select Winner</th>

																										 </tr>
																								 </thead>
																								 <?php
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
																											 //pass the winner update quary
																											 $sql4="UPDATE `bid` SET `Status` = '1' WHERE `bid`.`BidderID` = '$bidderid' AND `bid`.`TenderID` = '$tenid'";

																										 ?>
																										 <tr>
																												 <td class="text-center"><?php echo $num1; ?></td>
																												 <td><?php echo $row3['Name']?></td>
																												 <td><?php echo $row1['BidderID']?></td>
																												 <td><?php echo $row1['AvgScore']?></td>
																												 <td ><a href="<?php echo $row3['TdFile']; ?>">Download </a></td>
																												 <td class="text-right"><div class="radio">
																											      <label><input type="radio" name="optradio" value="<?php echo $sql4; ?>" <?php if($bidwin==1){?> disabled	  <?php } ?>><b><b></label>
																											    </div></td>

																										 </tr>
																									 <?php
																									 $num1=$num1+1;
																								 }
																							 }
																							  ?>

																								 </tbody>
																						 </table>
																						 <button style="background-color:green;" type="submit" class="btn btn-primary pull-right" <?php if($bidwin==1){?> disabled <?php } ?>>SUBMIT</button>

																						 </form>

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
															 </div>
														</div>
													</div>
												</div>
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
