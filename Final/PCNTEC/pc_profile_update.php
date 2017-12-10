
<?php
session_start();

include 'connection.php';

$id = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$about = $_POST['about'];

$sql = "UPDATE pc SET PcName= '$name',PcEmail= '$email',PcContact= '$contact',PcAbout= '$about'  WHERE PcID = '$id'";

if(mysqli_query($link, $sql)){
    echo "Records were updated successfully.";
    $_SESSION['pro_up_flashdata']="Profile updated successfully.";
    $sql="SELECT * FROM pc WHERE PcID='$id'";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['pc_data']=$row;
    header("location:pc_profile.php");
    
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 ?>
