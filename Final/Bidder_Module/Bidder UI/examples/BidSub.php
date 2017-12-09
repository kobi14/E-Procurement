<?php

include "../../connect.php";
include '../../functions.php';

session_start();

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

    <div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4"></div>
            <div class="col-md-6">

							<div class="card">
								<div class="card-header" data-background-color="blue">
									<h4 class="title">Bid Submission </h4>
									<p class="category">Submit Bid Details</p>
								</div>
								<div class="card-content">
									<form method="post" enctype="multipart/form-data" action="sendBid.php" name="pBidder" onsubmit="return validate();">
										<div class="row">
											<div class="col-md-5">
												<div class="form-group label-floating">
                          <label class="control-label"><b>Tender ID</b></label>
													<input type="text" class="form-control" name="tenderID" value="<?php echo $_GET['id'] ?>" readonly>
												</div>
											</div>

										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label"><b>Bidder ID</b></label>

                                                    <input type="text" class="form-control" name="bidderID" value="<?php echo $_GET['user'] ?>" readonly>
												</div>


											</div>
										</div>


										<div class="row">
											<div class="col-md-4">
												<div class="form-group label-floating">
													<label><b>Bid Form<b></label><br><br>
                          <a href='https://docs.google.com/document/d/1uEz3-Zxdc-pSaAKMg59M86FxzRwJ2eeFZixsCf1n-FI/edit' target="_blank">Visit</a>

												</div>
											</div>

										</div>

										<div class="row">
											<div class="col-md-12" >
												<div>
                                                    <h4><b>Bid Submission .pdf</b><h4>
                                                    <input  type="file"  name="file1" id="file1" accept="application/pdf">

												</div>
											</div>
										</div>

										<button type="submit" class="btn btn-success pull-right" >Submit</button>

										<div class="clearfix"></div>
									</form>


</body>
  <script>

	function validate() {


	    //var x = document.forms["pTender"]["tenderId"].value;

	    if(document.pBidder.file1.value==""){
	        alert("Bid File must be submitted");
	        document.pBidder.file1.focus();
	        return false;
				}
				return true;
	}
</script>
	<!--   Core JS Files   -->
	<script src="../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/material.min.js" type="text/javascript"></script>
  <script src="C:\xampp\htdocs\e-procurement\UI\Bidder UI\examples\validation.js" type="text/javascript"></script>
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
