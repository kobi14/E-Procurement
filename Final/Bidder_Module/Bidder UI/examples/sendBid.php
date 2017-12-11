<?php
include "../../connect.php";
date_default_timezone_set('Asia/Kolkata');

$userfile="../../BidSub/".basename($_FILES["file1"]["name"]);
move_uploaded_file($_FILES["file1"]["tmp_name"],  $userfile);

$tender=$_POST['tenderID'];
$bidder=$_POST['bidderID'];


$date_now = date("Y-m-d");
$time=date("h:i:sa");

$sql="INSERT INTO bid (BidderID,TenderID,sDate,sTime,BidFile) VALUES ('$bidder','$tender','$date_now','$time','$userfile')";
$result=mysqli_query($conn,$sql);

if(!$result){
  echo mysqli_error($conn);
}else{

  header("location:searchdup.php");






}

 ?>
