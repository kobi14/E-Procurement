<?php
include "../../connect.php";
include '../../functions.php';
$rank=sprintf("SELECT  BidderID, COUNT(TenderID) as TCount from wbid  GROUP BY BidderID ORDER BY BidderID ASC");
$result=mysqli_query($conn,$rank);

$data=array();
while($row = mysqli_fetch_assoc($result))
{
  $data[]=$row;
}

echo json_encode($data);

?>
