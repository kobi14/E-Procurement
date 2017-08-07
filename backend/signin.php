<?php
include('connection.php');

$tablename="";
$uname=mysqli_real_escape_string($conn, $_POST['username']);;
$password=mysqli_real_escape_string($conn, $_POST['password']);

function checkTable($uname){
  if(strcmp($uname[0],"b") or strcmp($uname[0],"B") ){
  $tablename="Bidder";
  }elseif(strcmp($uname[0],"o") or strcmp($uname[0],"O") or strcmp($uname[0],"c") or strcmp($uname[0],"C")){
  $tablename="Operator_CPO";
  }elseif(strcmp($uname[0],"t") or strcmp($uname[0],"T") ){
  $tablename="TEC";
  }

}

function validate($tablename,$uname,$password){
  if($tablename=="Bidder"){
$result=mysql_query(SELECT BUsername from $tablename where BUsername==$uname );
  if(mysql_num_rows($result)==0){
    $str="invalid Username";
    return $str;
  }else{
    $row=mysql_fetch_assoc($result);
    if($row['Bpass']==$password){
      header();
    }
  }
 }
 if($tablename=="Operator_CPO"){
$result=mysql_query(SELECT OCUsername from $tablename where OCUsername==$uname);
 if(mysql_num_rows($result)==0){
   $str="invalid Username ";
   return $str;
   else{
     $row=mysql_fetch_assoc($result);
     if($row['OCpass']==$password){
       header();
     }
 }
}  if($tablename=="TEC"){
$result=mysql_query(SELECT TUsername from $tablename where TUsername==$uname);
  if(mysql_num_rows($result)==0){
    $str="invalid Username";
    return $str;
  }else{
    $row=mysql_fetch_assoc($result);
    if($row['Bpass']==$password){
      header();
    }
 }

}







 ?>
