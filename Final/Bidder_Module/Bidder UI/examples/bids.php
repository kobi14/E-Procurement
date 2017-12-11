<?php

include "../../functions.php";

session_start();

if(!isset($_SESSION['username']) || ($_SESSION['type']!="bidder") )

{


    header('location:../../Bidder_Module/login.php');
}elseif(isset($_SESSION['username'])){
//
//echo "<script type='text/javascript'>
//
//    alert('Hi,Successfully Login');
//
//
//</script>";
}
?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Bidder Panel</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="wrapper">

	    <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="#" class="simple-text">
					Bidder
				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
	                <li class="active">
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
	                <li>
	                    <a href="searchdup.php">
	                        <i class="material-icons">content_paste</i>
	                        <p>Search Tender</p>
	                    </a>
	                </li>
<!--	                <li>-->
<!--	                    <a href="followers.php">-->
<!--	                        <i class="material-icons text-gray">assistant_photo</i>-->
<!--	                        <p>Followers</p>-->
<!--	                    </a>-->
<!--	                </li>-->
	                <li>
	                    <a href="bids.php">
	                        <i class="material-icons">library_books</i>
	                        <p>My bids</p>
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
	                <li>
	                    <a href="notifications.php">
	                        <i class="material-icons text-gray">notifications</i>
	                        <p>Notifications</p>
	                    </a>
	                </li>
					<li class="active-pro">
                        <a href="../../logout.php">
	                        <i class="material-icons">unarchive</i>
	                        <p><b>LogOut</b></p>
	                    </a>
	                </li>
	            </ul>
	    	</div>
	    </div>

	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">My Dashboard</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
									<i class="material-icons">dashboard</i>
									<p class="hidden-lg hidden-md">Dashboard</p>
								</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="material-icons">notifications</i>
									<span class="notification">0</span>
									<p class="hidden-lg hidden-md">Notifications</p>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#"></a></li>
									<li><a href="#"></a></li>
									<li><a href="#"></a></li>
									<li><a href="#"></a></li>
									<li><a href="#"></a></li>
								</ul>
							</li>
							<li>
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
	 							   <i class="material-icons">person</i>
	 							   <p class="hidden-lg hidden-md">Profile</p>
		 						</a>
							</li>
						</ul>

						<form class="navbar-form navbar-right" role="search">
							<div class="form-group  is-empty">
								<input type="text" class="form-control" placeholder="Search">
								<span class="material-input"></span>
							</div>
							<button type="submit" class="btn btn-white btn-round btn-just-icon">
								<i class="material-icons">search</i><div class="ripple-container"></div>
							</button>
						</form>
					</div>
				</div>
			</nav>

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title"><b>Past Bids</b></h4>
	                               <!-- <p class="category">Created using Roboto Font Family</p>-->
	                            </div>
	                            <div class="card-content">
									<div id="typography">
										<div class="title">
											<h2>Info</h2>
										</div>
										<div class="row">
											<div class="card-content table-responsive">
											<table class="table table-hover">
												<thead>
													<th>TenderID</th>
													<th>Tender Owner</th>
													<th>Status</th>
													<th>Bidded Amount</th>
													<th>Date</th>

												</thead>
												<tbody>
													<tr>
													<td>T12345</td>
													<td>Google Sri Lanka</td>
													<td>Won</td>
													<td>500000</td>
													<td>22-11-2012</td>
												</tr>
												<tr>
												<td>T12389</td>
												<td>Microsodt Sri Lanka</td>
												<td>Lost</td>
												<td>15000000</td>
												<td>22-10-2013</td>
											</tr>
											<tr>
											<td>T12436</td>
											<td>IBM Sri Lanka</td>
											<td>Lost</td>
											<td>800000</td>
											<td>02-12-2014</td>
										</tr>

									<tr>
									<td>T52436</td>
									<td>Richardson</td>
									<td>Won</td>
									<td>5800000</td>
									<td>02-12-2014</td>
								</tr>
								<tr>
								<td>T89637</td>
								<td>Airforce SL</td>
								<td>Lost</td>
								<td>960000</td>
								<td>02-01-2015</td>
							</tr>

												</tbody>
											</table>
										</div>
											<!--<div class="tim-typo">
												<h3><span class="tim-note">Header 1</span>information about bids </h3>
											</div>
											<div class="tim-typo">
												<h3><span class="tim-note">Header 2</span>information about bids </h3>
											</div>
											<div class="tim-typo">
												<h3><span class="tim-note">Header 3</span>information about bids </h3>
											</div>
											<div class="tim-typo">
												<h3><span class="tim-note">Header 4</span>information about bids </h3>
											</div>
											<div class="tim-typo">
												<h3><span class="tim-note">Header 5</span>information about bids </h3>
											</div>
											<div class="tim-typo">
												<h3><span class="tim-note">Header 6</span>information about bids </h3>
											</div>-->
											<!--<div class="tim-typo">
												<p><span class="tim-note">Paragraph</span>
													I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.</p>
											</div>
											<div class="tim-typo">
												<span class="tim-note">Quote</span>
												<blockquote>
												 <p>
												 I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.
												 </p>
												 <small>
												 Kanye West, Musician
												 </small>
												</blockquote>
											</div>

											<div class="tim-typo">
												<span class="tim-note">Muted Text</span>
												<p class="text-muted">
												I will be the leader of a company that ends up being worth billions of dollars, because I got the answers...
												</p>
											</div>
											<div class="tim-typo">
												<span class="tim-note">Primary Text</span>
												<p class="text-primary">
												I will be the leader of a company that ends up being worth billions of dollars, because I got the answers...                        </p>
											</div>
											<div class="tim-typo">
												<span class="tim-note">Info Text</span>
												<p class="text-info">
												I will be the leader of a company that ends up being worth billions of dollars, because I got the answers...                        </p>
											</div>
											<div class="tim-typo">
												<span class="tim-note">Success Text</span>
												<p class="text-success">
												I will be the leader of a company that ends up being worth billions of dollars, because I got the answers...                        </p>
											</div>
											<div class="tim-typo">
												<span class="tim-note">Warning Text</span>
												<p class="text-warning">
												I will be the leader of a company that ends up being worth billions of dollars, because I got the answers...
												</p>
											</div>
											<div class="tim-typo">
												<span class="tim-note">Danger Text</span>
												<p class="text-danger">
												I will be the leader of a company that ends up being worth billions of dollars, because I got the answers...                        </p>
											</div>
											<div class="tim-typo">
												<h2><span class="tim-note">Small Tag</span>
													Header with small subtitle <br>
													<small>Use "small" tag for the headers</small>
												</h2>
											</div>-->
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
				 								<!-- <li>
				 										 <a href="#">
				 												 Company
				 										 </a>
				 								 </li>
				 								 <li>
				 										 <a href="#">
				 												 Portfolio
				 										 </a>
				 								 </li>
				 								 <li>
				 										 <a href="#">
				 												Blog
				 										 </a>
				 								 </li>-->
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
	<script src="../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="../assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="../assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="../assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="../assets/js/demo.js"></script>

</html>
