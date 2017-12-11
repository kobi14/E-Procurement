<?php


function user_loginopr($user,$pass){

    include_once "function/conn.php";

    //$hashed=password_hash($pass,PASSWORD_DEFAULT);
  //  $pass=md5($pass);

      $sql="SELECT * FROM operator WHERE OperatorID='$user' AND OperatorKey='$pass' ";




    $result = mysqli_query($conn,$sql);
    if(!$result){
      echo "Could not execute query".mysqli_error();
    }


    if(mysqli_num_rows($result)==0){
        return "Invalid Username/Password";
    } else{
        echo "User Logged In";
        session_start();
        $_SESSION['username']=$user;
        $_SESSION['password']=$pass;
        $_SESSION['type']="op";
       // echo "hi";

        header("location:../Operator/view/dashboard.php");
    }


}


?>
