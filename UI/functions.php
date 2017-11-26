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
    include "connect.php";
    //$hashed=password_hash($pass,PASSWORD_DEFAULT);

    if($user[0]=="b" or $user[0]=="B"){
      $sql="SELECT * FROM bidder WHERE bidderID='$user' AND bidderKey='$pass' ";
    }elseif($user[0]=="o" or $user[0]=="O"){
        $sql="SELECT * FROM Operator WHERE operatorID='$user' AND operatorKey='$pass' ";
    }else{
        $sql="SELECT * FROM pcm WHERE ProcurementID='$user' AND ProcurementKey='$pass' ";
    }


    $result = mysql_query($sql,$conn);
    if(!$result){
      echo "Could not execute query".mysql_error($conn);
    }


    if(mysql_num_rows($result)==0){
        return "Invalid Username/Password";
    } else{
        echo "User Logged In";
        header("location:wwww.google.com");
    }


}

function register__operator($name,$user,$passwordN,$email,$contact){
    include "connect.php";
    //$hash=password_hash($password,PASSWORD_DEFAULT);
    $sql = "INSERT INTO operator (operatorID,operatorKey,Name,Oemail,Ocontact) VALUES ('$user','$passwordN','$name','$email',$contact)";
    mysql_query($sql,$conn);

}
function register__procurementer($name,$user,$passwordN,$email,$contact){
    include "connect.php";
    //$hash=password_hash($password,PASSWORD_DEFAULT);

    $sql = "INSERT INTO pcm (procurementID,procurementKey,Name,Pemail,Pcontact) VALUES ('$user','$passwordN','$name','$email',$contact)";
    mysql_query($sql,$conn);

}
function register__bidder($name,$user,$passwordN,$userfile,$email,$contact){
    include "connect.php";
    //$hash=password_hash($password,PASSWORD_DEFAULT);

    $sql = "INSERT INTO bidder (BidderID,TdFile,BidderKey,Name,Bemail,Bcontact) VALUES ('$user','$userfile','$passwordN','$name','$email',$contact)";
    mysql_query($sql,$conn);


}

function validate_username($user){
    if (!preg_match("/^[a-zA-Z0-9]*$/",$user)) {
        return  "Only letters and numbers allowed";
    }
    require "connect.php";
    $sql="";
    if($user[0]=="b" or $user[0]=="B"){
      $sql="SELECT * FROM bidder WHERE bidderID='$user' ";
    }elseif($user[0]=="o" or $user[0]=="O"){
        $sql="SELECT * FROM Operator WHERE operatorID='$user'  ";
    }else{
        $sql="SELECT * FROM pcm WHERE ProcurementID='$user'  ";
    }



    $result = mysql_query($sql,$conn);
    if(!$result){
      echo "Could not execute query".mysql_error($conn);
    }


    if(mysql_num_rows($result)==1){
        return "username already available";
    } else{

    }
}


?>
