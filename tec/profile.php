<!doctype html>
<?php  session_start();
if (isset($_SESSION['tec_data'])) {
	$tec=$_SESSION['tec_data'];

}else {
	header("location:login.php");

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
		                <li class="active">
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
		                <li>
		                    <a href="notifications.php">
		                        <i class="material-icons text-gray">notifications</i>
		                        <p>Notifications</p>
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
				<!--<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Profile</a>
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
				</div>-->
			</nav>

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-8">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Edit Profile</h4>
									<p class="category">Complete your profile</p>
	                            </div>
	                            <div class="card-content">
																<h4><?php if(isset($_SESSION['pro_up_flashdata'])){echo $_SESSION['pro_up_flashdata'];unset($_SESSION['pro_up_flashdata']); }?></h4>
	                                <form action="profile_update.php" method="POST">
	                                    <div class="row">

	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label" >Username</label>
													<input readonly type="text" name="username" class="form-control" value="<?php echo $tec['TecID'] ?>" 	>
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label" >Email address</label>
													<input type="email" name="email" class="form-control" value="<?php echo $tec['TecEmail'] ?>" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Name</label>
													<input type="text" name="name" class="form-control" value="<?php echo $tec['TecName'] ?>">
												</div>
	                                        </div>
	                                       <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Phone NO</label>
													<input type="number" name="contact" class="form-control" value="<?php echo $tec['TecContact'] ?>" >
												</div>
	                                        </div>
	                                    </div>

	                                      <div class="row">
	                                        <div class="col-md-12">
	                                            <div class="form-group">
	                                                <label>About Me</label>
													<div class="form-group label-floating">
									    				<label class="control-label"> Add text here.</label>
								    					<textarea class="form-control" name="about" rows="5" value="" ><?php echo $tec['TecAbout'] ?></textarea>
		                        					</div>
	                                            </div>
	                                        </div>
	                                    </div>

	                                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
	                                    <div class="clearfix"></div>
	                                </form>
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
