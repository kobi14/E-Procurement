<?php
include "../../connect.php";
include "../../functions.php";
$tenders=sprintf("SELECT  Category, COUNT(TenderID) as TCount from tender  GROUP BY Category ");
$result=mysqli_query($conn,$tenders);

$data=array();
while($row = mysqli_fetch_assoc($result))
{
  $data[]=$row;
}

echo json_encode($data);

?>
