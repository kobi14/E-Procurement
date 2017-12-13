<?php
/**
 * Created by PhpStorm.
 * User: kobi.ktk
 * Date: 12/11/17
 * Time: 1:47 PM
 */



    include "dbPDO.php";

//bidder table actions

//when click bidder table button blow code will be execute
if(isset($_POST['btn_action'])) {

    //when click delete btn

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

    //when click unblock button

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


    //when click block button

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