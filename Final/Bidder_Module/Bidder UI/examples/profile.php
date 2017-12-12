<?php
include "../../connect.php";
include '../../functions.php';


session_start();

if(!isset($_SESSION['username']) || ($_SESSION['type']!="bidder") )

{


    header('location:../../login.php');
}elseif(isset($_SESSION['username'])){

//    echo "<script type='text/javascript'>
//
//            alert('Hi,Successfully Login');
//
//
//    </script>";
}



//session_start();
$password1=$password2=$email=$contact=$user="";
$errpass=$errpass1=$errpass2=$errmail=$errcontact="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user=$_POST["username"];

    if (empty($_POST["email"])) {
          $errmail = "Email is required";
      } else {

          $email = mysqli_real_escape_string($conn,$_POST["email"]);
          $errmail = validate_profile_email($email,$user);
      }


    if (empty($_POST["existpass"])) {
        $errpass = "Current Password is required";
    } else {
        $password = mysqli_real_escape_string($conn,$_POST["existpass"]);

        $errpass = validate_password($password,$user);
    }

    if (empty($_POST["password1"])) {
        $errpass1 = "Password is required";
    } else {
        $password1 = mysqli_real_escape_string($conn,$_POST["password1"]);
        $errpass1 = validate_text_and_numbers($password1);
    }

    if (empty($_POST["password2"])) {
        $errpass2 = "Confirm password is required";
    } elseif($_POST["password1"]!=$_POST["password2"]){
        $errpass2="Passwords Do not match";
    }else {
        $password2 = mysqli_real_escape_string($conn,$_POST["password2"]);
        $errpass2 = validate_text_and_numbers($password2);
    }

    if (empty($_POST["contact"])) {
          $errcontact = "Contact number is required";
      } else {

          $contact = mysqli_real_escape_string($conn,$_POST["contact"]);
          $errcontact = validate_contact($contact);
      }

    if($errmail=="" and $errpass="" and $errpass1=="" and $errpass2=="" and  $errcontact==""){
        update__bidder($user,$password2,$email,$contact);
      }else{
        echo "Not successful";
    }
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
            <?php

            $profile=$_SESSION['username'];
            $sql="SELECT Name FROM bidder WHERE BidderID='$profile'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            $name= $row['Name']; ?>

						Bidder: <?php echo $name;  ?>
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
		                    <a href="bids.php">
		                        <i class="material-icons">library_books</i>
		                        <p>My bids</p>
		                    </a>
		                </li>
		               <!-- -->
<!--		                <li>-->
<!--		                    <a href="notifications.php">-->
<!--		                        <i class="material-icons text-gray">notifications</i>-->
<!--		                        <p>Notifications</p>-->
<!--		                    </a>-->
<!--		                </li>-->
<!--		                <li>-->
<!--	                    <a href="followers.php">-->
<!--	                        <i class="material-icons text-gray">assistant_photo</i>-->
<!--	                        <p>Followers</p>-->
<!--	                    </a>-->
<!--	                </li>-->
						<li class="active-pro" >
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
						<a class="navbar-brand" href="#">Profile</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<!---->
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

						<!---->
					</div>
				</div>
			</nav>

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-8">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">My Profile</h4>
									<p class="category"></p>
	                            </div>
	                            <div class="card-content">
	                                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
	                                    <div class="row">
	                                        <div class="col-md-5">
                        <?php

                        $profile=$_SESSION['username'];
                        $sql="SELECT * FROM bidder WHERE BidderID='$profile'";
                        $result=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_assoc($result); ?>

												<div class="form-group label-floating">
													<label class="control-label">Business Name</label>
													<input type="text" class="form-control" readonly value="<?php echo $row['Name'];  ?>">
												</div>
	                                        </div>
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Username</label>
													<input type="text" class="form-control" name="username" readonly value="<?php echo $row['BidderID']; ?>">


												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Email</label>
													<input type="email" class="form-control" name="email" value="<?php echo $row['Bemail'];  ?>">
													<span><?php echo $errmail;  ?> </span>
												</div>
	                                        </div>
	                                    </div>

	                                         <div class="row">
<!--	                                        <div class="col-md-6">-->
<!--												<div class="form-group label-floating">-->
<!--													<label class="control-label">NIC</label>-->
<!--													<input type="text" class="form-control" value="">-->
<!--												</div>-->
<!--                      </div>-->
	                                       <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Contact</label>
													<input type="number" class="form-control" name="contact" value="<?php echo $row['Bcontact'];  ?>" >
													<span><?php echo $errcontact; ?> </span>
												</div>
	                                        </div>
	                                    </div>



	                                    <div class="row">

                                    <!--    <div class="col-md-4">
                      <div class="form-group label-floating">
                        <label class="control-label"><b>New Password</b></label>
                        <input type="password" class="form-control" name="password" >
                        <span> <?php //echo $curpass;  ?> </span>
                      </div>
                    </div>-->
	                                       <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label"><b>Current Password</b></label>
													<input type="password" class="form-control" name="existpass">
                          <span> <?php echo $errpass ; ?> </span>
												</div>
	                                    </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label"><b>New Password</b></label>
													<input type="password" class="form-control" name="password1" >
                          <span> <?php echo $errpass1;  ?> </span>
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Enter New Password Again</label>
													<input type="password" class="form-control" name="password2" >
                          <span><?php echo $errpass2;  ?> </span>
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-12">
	                                            <div class="form-group">
	                                                <label>About Me</label>
													<div class="form-group label-floating">
									    				<label class="control-label"> About Your Company</label>
								    					<textarea class="form-control" rows="5">We are Company specialised for providing services for organisation</textarea>
		                        					</div>
	                                            </div>
	                                        </div>
	                                    </div>

	                                    <button type="submit" class="btn btn-primary pull-right" >Update</button>


																			<input type="reset" name="submitted" value="cancel" class="btn btn-primary pull-right"></input>
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
<!--
  <script>

	<!--  Core JS Files   -->

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
