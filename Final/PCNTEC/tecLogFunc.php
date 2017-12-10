<?php

//function validate_text($data){
//    if (!preg_match("/^[a-zA-Z .]*$/",$data)) {
//        return  "Only letters and white space allowed";
//    }
//}
//
//
//function validate_text_and_numbers($data){
//    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$data)) {
//        return  "Only letters and numbers allowed";
//    }
//}
//
//function validate_email($data){
//  if (!(filter_var($data, FILTER_VALIDATE_EMAIL))) {
//    return "Email is not valid";
// }
//}
//
//function validate_contact($data){
//  if(!(preg_match('/^\d{10}$/',$data))) // phone number is valid
//    {
//      return "Phone number is invalid";
//    }
//}


function user_logintec($user,$pass)
{
    include "connection.php";
    //$hashed=password_hash($pass,PASSWORD_DEFAULT)
    $sql = "SELECT * FROM tec WHERE TecID='$user' AND TecPwd='$pass' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(!$result){
        echo "Could not execute query".mysqli_error();
    }


    if(mysqli_num_rows($result)==0){
        return "Invalid Username/Password";
    } else{
        echo "User Logged In";
        session_start();
        echo $row['TecName'];
        $_SESSION['tec_data'] = $row;


        header("location:../PCNTEC/dashboard.php");
    }


}




function user_loginpc($user,$pass)
{
    include "connection.php";

    $sql1 = "SELECT * FROM pc WHERE PcID='$user' AND PcKey='$pass' ";
    $result = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result);
    if(!$result){
        echo "Could not execute query".mysqli_error();
    }else{
        echo "User Logged In";
        session_start();
        echo $row1['PcName'];
        $_SESSION['pc_data'] = $row1;
        header("location:../PCNTEC/pc_dashboard.php");
    }


}

//    if((mysqli_num_rows($result)==0) && (mysqli_num_rows($result1)==0)){
//        return "Invalid Username/Password";
//    } else if(mysqli_num_rows($result)==1){
//        echo "User Logged In";
//        echo $row['TecName'];
//        $_SESSION['tec_data'] = $row;
//        header("location:dashboard.php");
//    }elseif (mysqli_num_rows($result1)==1) {
//        echo "User Logged In";
//        echo $row1['PcName'];
//        $_SESSION['pc_data'] = $row1;
//        header("location:pc_dashboard.php");
//    }







?>
