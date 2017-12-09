<?php

function validate_text($data){
    if (!preg_match("/^[a-zA-Z .]*$/",$data)) {
        return  "Only letters and white space allowed";
    }
}


function validate_text_and_numbers($data){
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$data)) {
        return  "Only letters and numbers allowed";
    }
}

function validate_email($data){
  if (!(filter_var($data, FILTER_VALIDATE_EMAIL))) {
    return "Email is not valid";
 }
}

function validate_contact($data){
  if(!(preg_match('/^\d{10}$/',$data))) // phone number is valid
    {
      return "Phone number is invalid";
    }
}


function user_login($user,$pass){
    include "connection.php";
    //$hashed=password_hash($pass,PASSWORD_DEFAULT)
    $sql="SELECT * FROM tec WHERE TecID='$user' AND TecKey='$pass' ";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($result);
    if(!$result){
      echo "Could not execute query".mysqli_error($link);
    }


    if(mysqli_num_rows($result)==0){
        return "Invalid Username/Password";
    } else if(mysqli_num_rows($result)==1){
        echo "User Logged In";
        echo $row['TecName'];
        $_SESSION['tec_data'] = $row;
        header("location:dashboard.php");
    }


}




?>
