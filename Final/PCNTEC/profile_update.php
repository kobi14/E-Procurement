
<?php
session_start();

include 'connection.php';

$id = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$about = $_POST['about'];

$sql = "UPDATE tec SET TecName= '$name',TecMail= '$email',TpNO= '$contact',TecAbout= '$about'  WHERE TecID = '$id'";

if(mysqli_query($conn, $sql)){
    echo "Records were updated successfully.";
    $_SESSION['pro_up_flashdata']="Profile updated successfully.";
    $sql="SELECT * FROM tec WHERE TecID='$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['tec_data']=$row;
    

} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
header("location:profile.php");
 ?>
