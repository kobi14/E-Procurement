<?php
include "../opfun.php";

session_start();

if(!isset($_SESSION['username']))

{

    header('location:../../Bidder_Module/login.php');
}elseif(isset($_SESSION['username'])) {

}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Operator Panel</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>

    <script type="text/javascript" src="../function/validation.js"></script>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="wrapper">

	    <div class="sidebar" data-color="blue" data-image="../assets/img/sidebar-1.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="#" class="simple-text">
					Operator
                    <br>
                    <?php echo "WelCome : ".$_SESSION['username'] ; ?>
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
	                    <a href="AccTo.php">
	                        <i class="material-icons">person</i>
	                        <p>Access To TEC</p>
	                    </a>
	                </li>
	                <li class="active">
	                    <a href="postTender.php">
	                        <i class="material-icons">content_paste</i>
	                        <p>Post Tender</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="viewbidder.php">
	                        <i class="material-icons">bubble_chart</i>
	                        <p>Post Winners</p>
	                    </a>
	                </li>

					<li class="active-pro">
                        <a href="../../Bidder_Module/logout.php">
	                        <i class="material-icons">unarchive</i>
	                        <p>LogOut</p>
	                    </a>
	                </li>
	            </ul>
	    	</div>
	    </div>

	    <div class="main-panel" >


			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8">
							<div class="card">
								<div class="card-header" data-background-color="blue">
									<h4 class="title">Post Tender </h4>
									<p class="category">Complete the tender requirements</p>
								</div>
								<div class="card-content">
									<form method="post"  action="../function/posttender.php" name="pTender" enctype="multipart/form-data" onsubmit="return(validate());">
										<div class="row">
											<div class="col-md-5">
												<div class="form-group label-floating">
                                                    <label class="control-label"><b>Tender ID</b></label>
													<input type="text" class="form-control" name="tenderId">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label"></label>
													<label>Bid Submision Date</label>
													<input type="date" class="form-control" name="biddate">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label"></label>
													<label>Bid Submision Time</label>
													<input type="time" class="form-control" name="bidtime">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label"></label>
                                                    <label>Tender Title </label>
                                                    <input type="text" class="form-control" name="title">
												</div>
<!---->
<!--                                                <div class="form-group label-floating">-->
<!--                                                    <label class="control-label"></label>-->
<!--                                                    <label>Tender Opening time </label>-->
<!--                                                    <input type="time" class="form-control" name="topendt">-->
<!--                                                </div>-->

												<div class="form-group label-floating">
													<label class="control-label">Organisation</label>
													<input type="text" class="form-control" name="org">
												</div>
											</div>
										</div>


										<div class="row">
											<div class="col-md-4">
												<div class="form-group label-floating">
													<label>Tender Type</label>
                                                    <select class="form-control" id="type" name="ttype">
                                                        <option value="-1">Select</option>
                                                        <option value="Goods">Goods</option>
                                                        <option value="Services">Services</option>
                                                        <option value="Works">Works</option>
                                                    </select>
												</div>
											</div>

										</div>

										<div class="row">
											<div class="col-md-12" >
												<div>
                                                    <h4><b>Tender detail file in .pdf</b><h4>
                                                    <input  type="file"  name="file1" id="file1" accept=".pdf">
												</div>
											</div>
										</div>

										<button type="submit" class="btn btn-success pull-right"  >Post Tender</button>

										<div class="clearfix"></div>
<!--                                        <div class="alert alert-success">-->
<!--                                            <div class="container-fluid">-->
<!--                                                <div class="alert-icon">-->
<!--                                                    <i class="material-icons">check</i>-->
<!--                                                </div>-->
<!--                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
<!--                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>-->
<!--                                                </button>-->
<!--                                                <b>Success Alert:</b> Yuhuuu! You've got your $11.99 album from The Weeknd-->
<!--                                            </div>-->
<!--                                        </div>-->

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
