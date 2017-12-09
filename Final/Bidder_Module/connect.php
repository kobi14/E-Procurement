<?php
$servername="127.0.0.1:3307";
$usename="root";
$password="root";
$dbname="procurement";

$conn=mysqli_connect($servername,$usename,$password,$dbname);

if(!$conn){
  die("Could not connect to the server: ".mysqli_error()); //Check connecetion

}else{

}




?>
