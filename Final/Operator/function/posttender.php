<?php
/**
 * Created by PhpStorm.
 * User: kobi.ktk
 * Date: 12/3/17
 * Time: 8:25 PM
 */

include 'Conn.php';
//$db=new Connect();

date_default_timezone_set('Asia/Kolkata');


//echo $link;

if($link == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


// Escape user inputs for security
//$tid = mysqli_real_escape_string($link, $_REQUEST['tenderId']);
//$bd = mysqli_real_escape_string($link, $_REQUEST['biddate']);
//$bt = mysqli_real_escape_string($link, $_REQUEST['bidtime']);
//$tot = mysqli_real_escape_string($link, $_REQUEST['topent']);
//$org = mysqli_real_escape_string($link, $_REQUEST['org']);
//$ttype = mysqli_real_escape_string($link, $_REQUEST['ttype']);
//$file = mysqli_real_escape_string($link, $_REQUEST['file1']);
$tid=$_POST['tenderId'];
$bd=$_POST['biddate'];
$bt=$_POST['bidtime'];
$title=$_POST['title'];

//$tot=$_POST['topendt'];
//$tod=$_POST['topendd'];
$org=$_POST['org'];
$ttype=$_POST['ttype'];

$file = "../tenderinfo/";
$file = $file . basename( $_FILES['file1']['name']);
move_uploaded_file($_FILES['file1']['tmp_name'], $file);

//if(move_uploaded_file($_FILES['file1']['tmp_name'], $file)) {
//    //Tells you if its all ok
//    echo "The file ". basename( $_FILES['file1']['name']). " has been uploaded, and your information has been added to the directory";
//} else {
//    //Gives and error if its not
//    echo "Sorry, there was a problem uploading your file.";
//}
//$file="bidderinfo/".basename($_FILES["file1"]["name"]);
// move_uploaded_file($_FILES["file1"]["tmp_name"],$file);
$date = date("Y-m-d");

$time=date("h:i:sa");


// attempt insert query execution
$sql = "INSERT INTO tender (TenderId,TenderTitle,TenderFile,TOwner,ODate,OTime,CDate,CTime,Category) VALUES ('$tid','$title','$file','$org','$date','$time','$bd','$bt','$ttype')";
//$sql="INSERT INTO demo (name,age) VALUES ('hi',23)";
//$link->query($sql);



$q=mysqli_query($conn,$sql);








if($q){




    echo "<script type='text/javascript'>

            alert('submitted successfully!')

     function Redirect() {
               window.location.href='../view/postTender.php';
            }
            Redirect();
    </script>";



} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    echo "<script type='text/javascript'>

            alert('submitted unsuccessfully!')

     function Redirect() {
               window.location.href='../view/postTender.php';
            }
            Redirect();
    </script>";
}

// close connection
mysqli_close($conn);



