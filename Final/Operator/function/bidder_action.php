<?php
/**
 * Created by PhpStorm.
 * User: kobi.ktk
 * Date: 12/11/17
 * Time: 1:47 PM
 */



    include "dbPDO.php";




if(isset($_POST['btn_action'])) {


    if($_POST['btn_action'] == 'delete')
    {

        $query = "
		DELETE  FROM bidder
		WHERE BidderID = '".$_POST["BidderID"]."'
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
    if($_POST['btn_action'] == 'unblock')
    {

        $query = "
		UPDATE bidder
		SET 
		  Status=1
		WHERE BidderID = '".$_POST["BidderID"]."'
		";
        $statement = $conn->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        if(isset($result))
        {
            echo "<script type='text/javascript'>

            alert('Unblock successfully!');


    </script>";
        }
    }
    if($_POST['btn_action'] == 'block')
    {


        $query = "
		UPDATE bidder
		SET 
		  Status=0
		WHERE BidderID = '".$_POST["BidderID"]."'
		";
        $statement = $conn->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        if(isset($result))
        {
            echo "<script type='text/javascript'>

            alert('block successfully!');


    </script>";
        }
    }
}






?>