<?php
$servername="localhost";
$username="root";
$password="";
$dbname="e-procurement"

$conn=mysql_connect($servername,$username,$password,$dbname);

if(!$conn){
  die("Could not connect to the server: ".mysql_error()); //Check connecetion
}
$db=mysql_select_db("employee",$conn)
	or die("unable to connect to the Database<br>".mysql_error());






?>
