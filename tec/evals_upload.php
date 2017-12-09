<?php
include 'connection.php';

session_start();


  $numv= $_SESSION["numvalue"];
  echo $numv;
  for ($num=1; $num <$numv ; $num++) {
    if (isset($_POST["submit".$num])) {
      $bidderid= $_SESSION["BidderID".$num];
      $tenderid= $_SESSION["TenderID".$num];

    }
  }



$score=$_POST['score'];
$target_file="evaluated_pdfs/".basename($_FILES["pdf"]["name"]) ;
move_uploaded_file($_FILES["pdf"]["tmp_name"], $target_file) ;
$tecid=$_SESSION["tec_data"]["TecID"];

$sql="INSERT INTO `teceval` (`TecID`, `TenderID`, `BidderID`, `EvaluateFile`, `Score`) VALUES ('$tecid', '$tenderid', '$bidderid', '$target_file', '$score')";
//update finaleval table
$sql1="SELECT * FROM finaleval WHERE TenderID='$tenderid' AND BidderID='$bidderid' ";
$result1=mysqli_query($link, $sql1);
if ($result1) {
  $row=mysqli_fetch_assoc($result1);
  $curAvg=$row['AvgScore'];$curDocs=$row['Docs'];
  $docs=$curDocs+1;
  if ($curAvg==0) {
    $avgscore=$score;
  }else {
    $avgscore= (($curAvg*$curDocs)+$score)/$docs;
  }
}


$sql2="UPDATE `finaleval` SET `AvgScore` = '$avgscore', `Docs` = '$docs' WHERE `finaleval`.`TenderID` = '$tenderid' AND `finaleval`.`BidderID` = '$bidderid'";

if(mysqli_query($link, $sql) && mysqli_query($link, $sql2) ){
  $_SESSION['flashdata1']="Evaluated document submitted succesfully!";
  //echo $_POST["pdf"];
  header('Location: evals.php');

}else {
  echo "Error occor";
}
 ?>
