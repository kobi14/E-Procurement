<?php
/**
 * Created by PhpStorm.
 * User: kobi.ktk
 * Date: 12/8/17
 * Time: 3:52 AM
 */

$connect = new PDO('mysql:host=localhost;dbname=procurement', 'root', '');

    if($_POST['tid'] != '')
    {

            $tid=$_POST['tid'];
            $tecid=$_POST['tec_id'];
            $sts=1;

//            array(
//                ':TecID' => $_POST["tec_id"],
//                ':TenderID' =>$_POST["tid"],
//                ':Status' => 1
//            )


        $query = "
			INSERT INTO gaccess (TecID,TenderID,Status)
			VALUES  ('$tecid','$tid','$sts')";
    }
    else
    {
        echo 'error';
//            $query = "
//			UPDATE user_details SET
//				user_name = '".$_POST["user_name"]."',
//				user_email = '".$_POST["user_email"]."'
//				WHERE user_id = '".$_POST["user_id"]."'
//			";
    }
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    if(isset($result))
    {
        echo "<script type='text/javascript'>
            
            alert('submitted successfully!');
    
     function Redirect() {
               window.location.href='../view/AccTo.php';
            }
            Redirect();
    </script>";
    }
