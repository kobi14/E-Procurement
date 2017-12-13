<?php
/**
 * Created by PhpStorm.
 * User: kobi.ktk
 * Date: 12/12/17
 * Time: 11:34 PM
 */




    include_once "conn.php";
//if(isset($_POST['btn_action'])) {
//
//
//    if ($_POST['btn_action'] == 'select') {


//        echo($_POST["TecI"]);

        //$query = "SELECT TenderID FROM tender WHERE TenderID NOT IN (SELECT TenderID FROM gaccess WHERE TecID='" . $_POST["TecID"] . "'  AND `Status`=1)";
        $get = mysqli_query($conn, "SELECT TenderID FROM tender ");
        //$get = mysqli_query($conn, $query);

        $option = ' ';

        while ($row = mysqli_fetch_assoc($get)) {
            $option .= '<option  value = "' . $row['TenderID'] . '">' . $row['TenderID'] . '</option>';
//       }
//
//
//    }

}

?>
