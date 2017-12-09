<?php
/**
 * Created by PhpStorm.
 * User: kobi.ktk
 * Date: 12/7/17
 * Time: 5:20 PM
 */

//dash_action.php


    include "dbPDO.php";




if(isset($_POST['btn_action'])) {

    if ($_POST['btn_action'] == 'fetch_single') {
        $query = "
		SELECT * FROM tender WHERE  TenderID = :t_id
		";
        $statement = $conn->prepare($query);
        $statement->execute(
            array(
                ':t_id' => $_POST["TenderID"]
            )
        );
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            $output['t_file'] = $row['TenderFile'];
            $output['cd'] = $row['CDate'];

            $output['ct'] = $row['CTime'];
        }
        echo json_encode($output);

    }
    if($_POST['btn_action'] == 'delete')
    {

        $query = "
		DELETE  FROM tender
		WHERE TenderID = '".$_POST["TenderID"]."'
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


        if($_POST['t_id'] != '')
        {
            $query = "
			UPDATE tender SET 
				CDate = '".$_POST["cd"]."', 
				CTime = '".$_POST["ct"]."'
				 
				WHERE TenderID = '".$_POST["t_id"]."'
			";

        }
        else
        {

        }



        $statement = $conn->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        if(isset($result))
        {
            echo "<script type='text/javascript'>

            alert('submitted successfully!')

     function Redirect() {
               window.location.href='../view/dashboard.php';
            }
            Redirect();
    </script>";
        }
    }




?>