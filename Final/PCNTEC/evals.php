<!doctype html>
<?php  session_start();
if (isset($_SESSION['tec_data'])) {
	$tec=$_SESSION['tec_data'];

}else {
    header("location:../Bidder_Module/login.php");

}
?>
<?php include 'connection.php'; ?>
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
	<?php
	  $tecid=$tec['TecID'];
			$sql="SELECT * FROM bid WHERE TenderID IN (SELECT TenderID FROM gaccess WHERE TecID='$tecid' AND Status=1) AND TenderID in (SELECT TenderID FROM tender WHERE CDate < CURDATE())";
		//$sql1 = "SELECT * FROM bid";

		$result = mysqli_query($conn, $sql);
	 ?>

	<div class="wrapper">

	    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-1.jpg">


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

	                <li class="active">
	                    <a href="evals.php">
	                        <i class="material-icons">library_books</i>
	                        <p>My Evaluations</p>
	                    </a>
	                </li>

	                <li>
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

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">

	                                <h4 class="title">Tender Evaluation Information</h4>
	                               <!-- <p class="category">Created using Roboto Font Family</p>-->
	                            </div>
	                            <div class="card-content">
																<div id="typography">
																	<div class="title">
																		<h2>Alerts</h2>
																		<h4><?php if (isset($_SESSION['flashdata1'])) {
																			echo $_SESSION['flashdata1'];
																			unset($_SESSION['flashdata1']);;
																		} ?></h4>
																	</div>
																	<div class="row">
																		<div class="panel-group" id="accordion">
																			<?php if($result){
																				$num=1;
																				while ($row = mysqli_fetch_assoc($result)){

																				?>
																				<div class="panel panel-default">
																				 <div class="panel-heading">
																					 <h4 class="panel-title">
																						 <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $num ?>" >
																							 <?php
																							  $id = $row["BidderID"];
																							 	$sql1="SELECT Name FROM bidder WHERE BidderID='$id'";
																								$result1 = mysqli_query($conn, $sql1);
																								$row1 = mysqli_fetch_array($result1);

																								$tecid=$tec['TecID'];
																								$tenid=$row['TenderID'];
																								$bidderid=$row['BidderID'];
																								$sql2="SELECT * FROM teceval WHERE TecID='$tecid' AND TenderID='$tenid' AND BidderID= '$bidderid' ";
																								$result2 = mysqli_query($conn, $sql2);
																								$row_cnt = mysqli_num_rows($result2);
																								//$row_cnt=1;
																							 ?>
																							 <p>Bidder ID : <?php echo $row["BidderID"] ?> <span style="margin-left:50px;">Name : <?php echo $row1[0];?></span>
																							 <span style="float:right;"><?php if($row_cnt==1){?> <i class="material-icons">done</i> <?php }else{?><i class="material-icons">play_for_work</i><?php }?></span> </p>

																							</a>
																					 </h4>
																				 </div>
																				 <div id="<?php echo $num ?>" class="panel-collapse collapse ">
																					 <div class="panel-body">

																						 <ul class="list-group">
																							  <li class="list-group-item">Tender ID: <?php echo $row["TenderID"];  ?> </li>
																							  <li class="list-group-item">Bid Date: <?php echo $row["sDate"];  ?> </li>
																								<li class="list-group-item">Bid PDF:<a href="../Bidder_Module/Bidder UI/kobi/<?php echo $row["BidFile"];?>"> Download </a> </li>

																							</ul>
																							<form id="form1" enctype="multipart/form-data" action="evals_upload.php" method="post" >
																								<?php

																								$_SESSION["BidderID".$num] = $row["BidderID"];
																								$_SESSION["TenderID".$num] = $row["TenderID"];

																								?>
																								<div class="form-group label-floating">
																									<label class="control-label" >Score</label>
																									<input type="text" name="score" class="form-control" required>
																								</div>
																								<input type="file" name="pdf" id="pdf" accept=".pdf">
																								<button type="submit" name="submit<?php echo $num ?>" id="submit" class="btn btn-primary" <?php if($row_cnt==1){?> disabled <?php } ?>>SUBMIT</button>

																							</form>



																					 </div>
																				 </div>
																			 </div>

																				<?php
																				$num=$num+1;
																				}
																			}
																				$_SESSION["numvalue"]=$num;
																			?>


																	</div>


																	</div>


																</div>
	                            </div>

	                        </div>
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
