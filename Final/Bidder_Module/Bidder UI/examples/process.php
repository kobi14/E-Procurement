<?php
include "../../connect.php";
include '../../functions.php';
date_default_timezone_set('Asia/Kolkata');
session_start();
$userID=$_SESSION['username'];

             if($_REQUEST['sortBy']=="TenderID")
              {
              $choice = "TenderID";

              }
              else if($_REQUEST['sortBy']=="eDate")
              {
              $choice = "CDate";
            }

              $date_now = date("Y-m-d");
              $time=date("h:i:sa");

              $search = mysqli_query($conn,"SELECT * FROM tender ORDER BY $choice");
              if (!$search) { // add this check.
                  die('Invalid query: ' . mysqli_error());
                }

              while($row = mysqli_fetch_array($search)){
                $col="";
                $tdate=$row['CDate'];
                $ttime=$row['CTime'];
                  if($tdate>=$date_now ){
                    if($ttime>=$time){
                    $col="#FFFF00";
                    }
                  }else{
                    $col="#ADD8E6";
                  }

                  echo "<tr bgcolor=$col>";
                  echo "<td>" . $row['TenderID'] . "</td>";
                  echo "<td>" . $row['TenderTitle'] . "</td>";
                  echo "<td>" .'<a href="'.$row["TenderFile"].'" target="_blank" class="btn btn-success btn-xs">View PDF</a>'."</td>";

                 // echo "<td>" .$date_now . "</td>";
                  //echo "<td> </td>";
                  echo "<td>" . $row['TOwner'] . "</td>";
                  echo "<td>" . $row['ODate'] . "</td>";
                  echo "<td>" . $row['OTime'] . "</td>";
                  echo "<td>" . $row['CDate'] . "</td>";
                  echo "<td>" . $row['CTime'] . "</td>";
                  echo "<td>" . $row['Category'] . "</td>";
                  $id=$row['TenderID'];
                  $sql="SELECT BidderID FROM Bid where TenderID='$id' && BidderID='$userID'";
            //      ".$rows['TenderID']."
                  $result=mysqli_query($conn,$sql);

                  if(mysqli_num_rows($result)>0){
                    echo "<td> <a href=# ><b>Bidded<b></a></td>";
                  }else{
                  echo "<td> <a href='BidSub.php?id=$id & user=$userID' ><b>Bid<b></a></td>";
                  }
                  echo "</tr>";

              }
          ?>
