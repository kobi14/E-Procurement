
<?php
session_start();

include 'connection.php';

$id = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$about = $_POST['about'];

$sql = "UPDATE tec SET TecName= '$name',TecEmail= '$email',TecContact= '$contact',TecAbout= '$about'  WHERE TecID = '$id'";

if(mysqli_query($link, $sql)){
    echo "Records were updated successfully.";
    $_SESSION['pro_up_flashdata']="Profile updated successfully.";
    $sql="SELECT * FROM tec WHERE TecID='$id'";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['tec_data']=$row;

} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
header("location:profile.php");
 ?>
