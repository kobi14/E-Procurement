<?php
/**
 * Created by PhpStorm.
 * User: kobi.ktk
 * Date: 12/7/17
 * Time: 5:20 PM
 */

//tec_action.php


include "dbPDO.php";


if(isset($_POST['btn_action']))
{

    if($_POST['btn_action'] == 'fetch_single')
    {
        $query = "
		SELECT * FROM tec WHERE  TecID = :tec_id
		";
        $statement = $conn->prepare($query);
        $statement->execute(
            array(
                ':tec_id'	=>	$_POST["TecID"]
            )
        );
        $result = $statement->fetchAll();
        foreach($result as $row)
        {
            $output['spc'] = $row['Spc'];
            //$output['tec_id'] = $row['TecID'];
        }
        echo json_encode($output);

    }


    if($_POST['btn_action'] == 'delete')
    {

        $query = "
		DELETE  FROM tec
		WHERE TecID = '".$_POST["TecID"]."'
		";
        $statement = $conn->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        if(isset($result))
        {
            echo "<script type='text/javascript'>
            
            alert('Deleted successfully!');
    
    
    </script>";
        }
    }
}

if(isset($_POST['submit']))

{
    if($_POST['tid'] != '')

    {

        $tid=$_POST['tid'];
        $tecid=$_POST['tec_id'];
        $sts=1;




        $query = "
                INSERT INTO gaccess (TecID,TenderID,Status)
                VALUES  ('$tecid','$tid','$sts')";
    }
    else
    {
        echo 'error';

    }
    $statement = $conn->prepare($query);
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
}

?>