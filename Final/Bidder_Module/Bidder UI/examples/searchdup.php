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

<body id="body">

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
	                <li>
	                    <a href="bids.html">
	                        <i class="material-icons">library_books</i>
	                        <p>My bids</p>
	                    </a>
	                </li>
	               <!-- -->
	                <li>
	                    <a href="notifications.php">
	                        <i class="material-icons text-gray">notifications</i>
	                        <p>Notifications</p>
	                    </a>
	                </li>
					<li class="active-pro">
	                      <a href="http://localhost/e-procurement/UI/logout.php">
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
															<h4 class="title">Tender Table</h4>
															<p class="category">Tender Details</p>
													</div>

            <!--    -->
            </div>
						<div class="card-content table-responsive">
							<form>
	                     <label><b>OrderBy&nbsp;&nbsp;&nbsp;  </b></label><select onChange="getData();" id="selectForm" name="sort">
	                      <option  value="TenderID">Tender ID</option>
	                      <option  value="eDate">Closing Date</option>
	                    </select>
	                </form>
								<table class="table">
										<thead class="text-primary">

                        <th style="font-size: 15px"><b>Tender ID</b></th>
                        <th style="font-size: 15px"><b>Tender</b></th>
												<th style="font-size: 15px"><b>Owner</b></th>
                        <th style="font-size: 15px"><b>Open Date</b></th>
												<th style="font-size: 15px"><b>Open Time</b></th>
												<th style="font-size: 15px"><b>Expiry Date</b></th>
                        <th style="font-size: 15px"><b>Expiry Time</b></th>
												<th style="font-size: 15px"><b>Category</b></th>

												<tbody id="data">


											</tbody>
									</table>
							</div>
					</div>
			</div>
	</div>
	</div>
	</div>



                             <!--  -->
<!--

-->


	                                       <!-- -->


					<footer class="footer">
	            <div class="container-fluid">
	                <nav class="pull-left">
	                    <ul>
	                        <li>
	                            <a href="#">
	                                Home
	                            </a>
	                        </li>
	                       <!-- -->
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

	<script src="../assets/js/dropdown.js"></script>

	<!--  Notifications Plugin    -->
	<script src="../assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script> -->

	<!-- Material Dashboard javascript methods -->
	<script src="../assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="../assets/js/demo.js"></script>

	<script>
		document.getElementById("body").onload = function() {myFunction()};

		function myFunction(){
			console.log("Test");
			$("#selectForm").val('eDate');

			$.ajax({
		                url     : 'process.php',
		                method  : 'POST',
		                async: false,
		                data:{ sortBy: $('#selectForm').val() },

		                success   : function(res)
		                {

		                   $('#data').html(res);

		                },
		                error : function(e)
		                {
		                    alert('error');
		                }
		            });
		          }



	</script>
</script>
</html>
