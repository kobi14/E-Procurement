<?php
$servername="127.0.0.1:3307";
$usename="root";
$password="root";
$dbname="procurement";

$conn=mysql_connect($servername,$usename,$password);

if(!$conn){
  die("Could not connect to the server: ".mysql_error()); //Check connecetion
}
$link=mysql_select_db('procurement',$conn);
if(!$link){
  echo "Could not connect to the database".mysql_error($conn);
}


?>
