<?php
include "connect.php";
include "functions.php";
$name=$u_username=$password1=$password2=$email=$contact=$about="";
$errname=$errusername=$errpass1=$errpass2=$errfilename=$errmail=$errcontact=$errabout="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $errname = "Name is required";
    } else {

        $name = mysqli_real_escape_string($conn,$_POST["name"]);
        $errname = validate_text($name);
      }

      if (empty($_POST["email"])) {
            $errmail = "Email is required";
        } else {

            $email = mysqli_real_escape_string($conn,$_POST["email"]);
            $errmail = validate_email($email);
        }

     if (empty($_POST["username"])) {
        $errusername = "Username is required";
    } else{
        $u_username = mysqli_real_escape_string($conn,strtolower($_POST['username']));
        $errusername = validate_username($u_username);
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
        $password2 = mysqli_real_escape_string($conn,md5($_POST["password2"]));
        $errpass2 = validate_text_and_numbers($password2);
    }








    if (empty($_POST["contact"])) {
          $errcontact = "Contact number is required";
      } else {

          $contact = mysqli_real_escape_string($conn,$_POST["contact"]);
          $errcontact = validate_contact($contact);
      }

    $spc=$_POST["special"];
    $about=$_POST["about"];

    if($errname=="" and $errusername=="" and $errpass1=="" and $errpass2=="" and  $errmail=="" and $errcontact=="" ){



        register__tec($name,$u_username,$password2,$about,$email,$contact,$spc);



      }else{

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

	<!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>
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
    	</div>

    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <i  class="brand-logo"><p id="demo"></p></i>
    		<ul class="nav navbar-nav right hide-on-med-and-down">
				<li class="active"><a href="home.html">Home</a></li>
        		<li><a href="home.html">Contact Us</a></li>
        		<li><a href="login.php">Sing In</a></li>
        		<li><a href="singup.php">Sing Up</a></li>

    		</ul>
    	</div>
	</div>
</nav>


     <div class="row">
     	<div class="col s3">
     		<table >
     			<tr>
     			<td><button class="btn btn-info" style="padding: 15px 30px; width: 200px; ">Announcements</button></td>
     			</tr>

          <tr>
     			<td><button class="btn btn-info" style="padding: 15px 30px; width: 200px; " >Tenders by Location</button></td>
     			</tr>
          <tr>
     			<td><button class="btn btn-info" style="padding: 15px 30px; width: 200px; " >Tenders by Organisation</button></td>
     			</tr>
          <tr>
     			<td><button class="btn btn-info" style="padding: 15px 30px; width: 200px; " >Tenders Status</button></td>
     			</tr>
          <tr>
     			<td><button class="btn btn-info" style="padding: 15px 30px; width: 200px; " >Tenders by Classification</button></td>
     			</tr>
     			</table>


      	</div>
          <div class="col s6">

        						<div class="card card-register">
                      <div class="row" style="margin:10px;">
                        <div class="col-md-4">
                          <a href="signup.php" class="btn btn-info center-block" role="button">Bidder Registartionr</a>
                        </div>
                        <div class="col-md-4">
                          <a href="signup_tec.php" class="btn btn-info center-block" role="button" style="background-color:purple;">TEC Registartion</a>


                        </div>
                        <div class="col-md-4">
                          <a href="signup_pc.php" class="btn btn-info center-block" role="button">PC Registartion</a>

                        </div>

                      </div>
        							<form class="form" enctype="multipart/form-data"  action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
									<!--<form action="<?php //echo $_SERVER["PHP_SELF"];?>" method="POST">-->
        								<div class="header header-info text-center">
        									<h4>TEC Registartion From</h4>

        								</div>
        								<!--<p class="text-divider">Or Be Classical</p>-->
        								<div class="content">

                          <div class="input-group">
        										<span class="input-group-addon">
        											<i class="material-icons">face</i>
        										</span>
        										<input type="text" class="form-control" name="name" placeholder="Name..." value="<?php echo $name; ?>" />
												<span><font color='red'><?php echo $errname; ?></font></span>
        									</div>

        									<div class="input-group">
        										<span class="input-group-addon">
        											<i class="material-icons">face</i>
        										</span>
        										<input type="text" class="form-control"name="username" placeholder="User Name..." value="<?php echo $u_username; ?>" />
												<span><font color='red'><?php echo $errusername; ?></font></span>
        									</div>

                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="material-icons">phone</i>
                            </span>
                            <input type="text" class="form-control" name="contact" placeholder="contact No...." value="<?php echo $contact; ?>" />
							<span><font color='red'><?php echo $errcontact; ?></font></span>
                          </div>

        									<div class="input-group label-floating has-error">
        										<span class="input-group-addon">
        											<i class="material-icons">email</i>
        										</span>
        										<input type="email"  class="form-control  validate" name="email" placeholder="Email..." value="<?php echo $email; ?>" />
												 <span><font color='red'><?php echo $errmail; ?></font></span>
        									</div>


        									<div class="input-group">
        										<span class="input-group-addon">
        											<i class="material-icons">lock_outline</i>
        										</span>
        										<input type="password"  class="form-control" name="password1" placeholder="Password..." value="" />
												   <span><font color='red'><?php echo $errpass1; ?></font></span>
        									</div>

                          <div class="input-group">
        										<span class="input-group-addon">
        											<i class="material-icons">lock_outline</i>
        										</span>
        										<input type="password"  class="form-control" name="password2" placeholder="Confirm Password..." value="" />
												   <span><font color='red'><?php echo $errpass2; ?></font></span>
        									</div>

                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="material-icons">account_circle</i>
                            </span>
                            <textarea class="form-control" name="about" rows="2" value="" placeholder="About..."><?php echo $about; ?></textarea>
                           <span><font color='red'></font></span>
                          </div>

                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="material-icons">assignment_returned</i>
                            </span>
                            <select class="form-control" id="sel1" name="special">
                              <option value="Goods">Goods</option>
                              <option value="Services">Services</option>
                              <option value="Works">Works</option>
                            </select>
                            <span><font color='black'>Select the specialized field</font></span>

                          </div>

        								<div class="footer text-center">
        									<button  type="submit" name="submit" value="Submit" class="btn btn-simple btn-primary btn-lg">Submit</button>
                          <button type="reset" value="Reset" class="btn btn-simple btn-primary btn-lg">Reset</button>
        								</div>
        							</form>

        </div>
      </div>




   	<div class="fixed-action-btn">
   			<a class="btn-floating btn-large red">
        <i class="large material-icons">more</i>
        </a>
        <ul>
          <li><a href="#" class="btn-floating red btn-large"><i class="large material-icons">help</a></li>
          <li><a href="#" class="btn-floating blue btn-large"><i class="large material-icons">search</i></a></li>
          <li><a href="#" class="btn-floating orange btn-large"><i class="large material-icons">feedback</i></a></li>
          <li><a href="#" class="btn-floating green btn-large"><i class="large material-icons">FAQ</i></a></li>

          </ul>
   	</div>



			<!-- here you can add your content -->

		</div>
	</div>
</div>


</body>
  <script>
  var d = new Date();
  document.getElementById("demo").innerHTML = d.toUTCString();
  </script>
	<!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script type="text/javascript" src="assets/js/materialize.min.js"></script>


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
