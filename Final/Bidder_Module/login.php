
<?php
include "connect.php";
include "functions.php";
$username=$pass=$user="";
$errusername=$errpass=$errlogin="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["uname"])) {
        $errusername = "Username is required";
    }else{
			$username = mysqli_real_escape_string($conn,strtolower($_POST["uname"]));
			$errusername = validate_text_and_numbers($username);
      }

    if (empty($_POST["pass"])) {
        $errpass = "Password is required";
    } else {
        $pass = mysqli_real_escape_string($conn,$_POST["pass"]);
        $errpass = validate_text_and_numbers($pass);
    }
    if($errusername=="" and $errpass==""){
        $errlogin=user_login($username,$pass);
    }
}

?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>E Procurements Site</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css" rel="stylesheet"/>
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

    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
    		</button>
    		<!--<a class="navbar-brand" href="#">Brand</a>-->
    	</div>

    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    		<ul class="nav navbar-nav">
				<li class="active"><a href="home.html">Home</a></li>
        		<li><a href="#">Contact Us</a></li>
        		<li><a href="login.php">Sing In</a></li>
        		<li><a href="signup.php">Sing Up</a></li>

    		</ul>
    	</div>
	</div>
</nav>





    <div class="wrapper; ">
		<!--<div class="header header-filter" style="background-image: url('../assets/img/city.jpg'); background-size:20px;  background-position:right; ">-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form class="form" action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
								<div class="header header-info text-center">
									<h4>Sign In</h4>

								</div>
								<!--<p class="text-divider">Or Be Classical</p>-->
								<div class="content">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">account_box</i>
										</span>
									<div class="form-group label-floating">
													<label>Login as a</label>
                                                    <select class="form-control" id="type" name="ttype">
                                                        <option value="0">Select</option>
                                                        <option value="operator">Operator</option>
                                                        <option value="tec">TEC</option>
                                                        <option value="pc">PC</option>
                                                        <option value="bidder">Bidder</option>
                                                    </select>
												</div>
									</div>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
										
										<input type="text" class="form-control" name="uname" placeholder="User Name..." value="<?php echo $username;?>" />
										<span><?php echo $errusername; ?></span>
									</div>


									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input type="password" class="form-control" name="pass" placeholder="Password..." value="<?php echo $pass;?>" />
										<span><?php echo $errpass; ?></span>
                    <span><?php echo $errlogin; ?></span>
									</div>


								</div>
								<div class="footer text-center">
									<button  type="submit" name="submit" value="Submit" class="btn  btn-info btn-s">Signin</button>
									<br>
									<span>
						                  <a href="recovery.php">Click here,<label> forgot password?</label></div></a>
						             </span>

								</div>

							</form>
						</div>
					</div>
				</div>
			</div>

	</div>
	<!-- you can use the class main-raised if you want the main area to be as a page with shadows -->
	<div class="main">
		<div class="container">

			<!-- here you can add your content -->

		</div>
	</div>
</div>


</body>

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

</html>
