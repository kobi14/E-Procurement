<?php
$servername="localhost";
$usename="root";
$password="";
$dbname="procurement";

$conn=mysqli_connect($servername,$usename,$password,$dbname);

if(!$conn){
  die("Could not connect to the server: ".mysql_error()); //Check connecetion
}
?>