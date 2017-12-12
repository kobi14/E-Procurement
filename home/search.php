<?php 
session_start();
$name=$_POST['search'];
$sql = "SELECT * FROM `tender` WHERE TenderTitle LIKE '%$name%'";
$_SESSION["searchsql"]=$sql;
header( "Location: home1.php" );
?>