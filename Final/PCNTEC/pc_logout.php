<?php
session_start();
unset($_SESSION['pc_data']);
header("location:login.php");
 ?>
