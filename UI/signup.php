<?php
include "connect.php";
include "functions.php";
$name=$u_username=$password1=$password2=$email=$conatct="";
$errname=$errusername=$errpass1=$errpass2=$errfilename=$errmail=$errcontact="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $errname = "Name is required";
    } else {

        $name = mysql_real_escape_string($_POST["name"]);
        $errname = validate_text($name);
      }

      if (empty($_POST["email"])) {
            $errmail = "Email is required";
        } else {

            $email = mysql_real_escape_string($_POST["email"]);
            $errmail = validate_email($email);
        }

     if (empty($_POST["username"])) {
        $errusername = "Username is required";
    } else {
      $user=$_POST['username'];
		if(!($user[0]=="b" or $user[0]=="B" or $user[0]=="p" or $user[0]=="P" or $user[0]=="o" or $user[0]=="O") ){
			$errusername="Username should start with{b,B,p,P,o,O}";
		}else{
        $u_username = mysql_real_escape_string($_POST["username"]);
        $errusername = validate_username($u_username);
      }
    }

    if (empty($_POST["password1"])) {
        $errpass1 = "Password is required";
    } else {
        $password1 = mysql_real_escape_string($_POST["password1"]);
        $errpass1 = validate_text_and_numbers($password1);
    }

    if (empty($_POST["password2"])) {
        $errpass2 = "Confirm password is required";
    } elseif($_POST["password1"]!=$_POST["password2"]){
        $errpass2="Passwords Do not match";
    }else {
        $password2 = mysql_real_escape_string($_POST["password2"]);
        $errpass2 = validate_text_and_numbers($password2);
    }
    if (empty($_POST["userfile"])) {
        $errfilename= "Business registration file required";
    } else {
        $userfile=$_POST["userfile"];

    }

    if (empty($_POST["contact"])) {
          $errcontact = "Contact number is required";
      } else {

          $contact = mysql_real_escape_string($_POST["contact"]);
          $errcontact = validate_contact($contact);
      }

    if($errname=="" and $errusername=="" and $errpass1=="" and $errpass2=="" and $errfilename=="" and $errmail=="" and $errcontact==""){


      if($user[0]=="b" or $user[0]=="B"){
        register__bidder($name,$u_username,$password2,$userfile,$email,$contact);
      }elseif($user[0]=="o" or $user[0]=="O"){
        register__operator($name,$u_username,$password2,$email,$contact);
      }else{
        register__procurementer($name,$u_username,$password2,$email,$contact);

      }



    }else{
      echo "hi";
    }
}

?>


<!--

<html>
<head>
<title>
Login
</title>
</head>
<body>
<form action="<?php //echo $_SERVER["PHP_SELF"];?>" method="POST">
Name <input type="text" name="name" placeholder="Busines Name..." value="" />
<?php// echo $errname; ?>
username <input type="text" name="username" placeholder="User Name..." value="" />
<br>
<?php //echo $errusername; ?>
<br>
Password  <input type="password" name="password1" placeholder="Password..." value="" />
<?php// echo $errpass1; ?>
<br>
Confirm Password<input type="password" name="password2" placeholder="Confirm Password..." value="" />
<?php //echo $errpass2; ?>
<br>
Email<input <input type="email" name="email" placeholder="Email..." value="" />
<?php// echo $errmail; ?>
<br>
Contact <input type="number" name="contact" placeholder="contact No...." value="" />
<br>
<?php //echo $errcontact; ?>

<table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
<tr>
<td width="246">
<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
<input name="userfile" type="file" id="userfile">
<?php// echo $errfilename;?>

</td>
</tr>
</table>
<button  type="submit" name="submit" value="Submit">Submit</button>

</form>
</body>
</html>
*/
-->
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
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
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
        		<li><a href="singin.html">Sing In</a></li>
        		<li><a href="singup.html">Sing Up</a></li>
        		<!--<li class="dropdown">
        			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        			<ul class="dropdown-menu">
					  <li><a href="#">Action</a></li>
					  <li><a href="#">Another action</a></li>
					  <li><a href="#">Something else here</a></li>
					  <li class="divider"></li>
					  <li><a href="#">Separated link</a></li>
					  <li class="divider"></li>
				      <li><a href="#">One more separated link</a></li>
        			</ul>
        		</li>-->
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

      <!--
       	<div >
       		<ul style="list-style: none; align-self: center;" >
       			<li ><button class="btn btn-info"><a href="">Tenders Status</a></button></li>
       			<li ><button class="btn btn-info"><a href="">Tenders by Organisation</a></li></button>
       			<li ><button class="btn btn-info"><a href="">Tenders by Location</a></li></button>
       			<li ><a href="">Tenders by Classification</a></li><br>
       			<li ><a href="">Announcements</a></li>

      		</ul>
      	</div>-->


      	</div>
          <div class="col s6">

        						<div class="card card-register">
        							<form class="form" action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
									<form action="<?php //echo $_SERVER["PHP_SELF"];?>" method="POST">
        								<div class="header header-info text-center">
        									<h4>Bidder's Registartion From</h4>

        								</div>
        								<!--<p class="text-divider">Or Be Classical</p>-->
        								<div class="content">

                          <div class="input-group">
        										<span class="input-group-addon">
        											<i class="material-icons">face</i>
        										</span>
        										<input type="text" class="form-control" name="name" placeholder="Busines Name..." value="" />
												<span><?php echo $errname; ?></span>
        									</div>

        									<div class="input-group">
        										<span class="input-group-addon">
        											<i class="material-icons">face</i>
        										</span>
        										<input type="text" class="form-control"name="username" placeholder="User Name..." value="" />
												<span><?php echo $errusername; ?></span>
        									</div>

                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="material-icons">phone</i>
                            </span>
                            <input type="text" class="form-control" name="contact" placeholder="contact No...." value="" />
							<span><?php echo $errcontact; ?></span>
                          </div>

        									<div class="input-group label-floating has-error">
        										<span class="input-group-addon">
        											<i class="material-icons">email</i>
        										</span>
        										<input type="email"  class="form-control  validate" name="email" placeholder="Email..." value="" />
												<?php echo $errmail; ?>
        									</div>


        									<div class="input-group">
        										<span class="input-group-addon">
        											<i class="material-icons">lock_outline</i>
        										</span>
        										<input type="password"  class="form-control" name="password1" placeholder="Password..." value="" />
												<?php echo $errpass1; ?>
        									</div>

                          <div class="input-group">
        										<span class="input-group-addon">
        											<i class="material-icons">lock_outline</i>
        										</span>
        										<input type="password"  class="form-control" name="password2" placeholder="Confirm Password..." value="" />
												<?php echo $errpass2; ?>
        									</div>

                          <div class="file-field input-field">
                                <div class="btn-info">
                                  <p style="text-align:center;">Upload Your Document File in "pdf"</p>
                                  <input type="file" name="userfile">
								  <span><?php echo $errfilename;?></span>
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text">
                                </div>
                              </div>

                              <div class="checkbox">
                								<label>
                									<input type="checkbox" name="optionsCheckboxes">
                									I Agree above details
                								</label>
                							</div>
        									<!-- If you want to add a checkbox to this form, uncomment this code

        									<div class="checkbox">
        										<label>
        											<input type="checkbox" name="optionsCheckboxes" checked>
        											Subscribe to newsletter
        										</label>
        									</div> -->
        								</div>
        								<div class="footer text-center">
        									<<button  type="submit" name="submit" value="Submit" class="btn btn-simple btn-primary btn-lg">Submit</button>

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
 <script type="text/javascript" src="materialize/js/materialize.min.js"></script>


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
