<?php include 'connection.php'; ?>
<?php
if(isset($_POST['optradio'])){
  $sql= $_POST['optradio'];
  $result = mysqli_query($conn, $sql);
}
 ?>
