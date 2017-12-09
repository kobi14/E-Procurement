<?php
/**
 * Created by PhpStorm.
 * User: kobi.ktk
 * Date: 12/3/17
 * Time: 2:36 PM
 */



    class Operator{

        public function __construct()
        {


            // Check connection

        }

        public function insert(){
            include_once 'Connect.php';
            $db=new Connect();

            if($db->conn == false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }


// Escape user inputs for security
            $tid = mysqli_real_escape_string($db->conn, $_POST['tenderId']);
            $bd = mysqli_real_escape_string($db->conn, $_POST['biddate']);
            $bt = mysqli_real_escape_string($db->conn, $_POST['bidtime']);
            $tot = mysqli_real_escape_string($db->conn, $_POST['topent']);
            $org = mysqli_real_escape_string($db->conn, $_POST['org']);
            $ttype = mysqli_real_escape_string($db->conn, $_POST['ttype']);
            $file = mysqli_real_escape_string($db->conn ,$_POST['file1']);
            $date = date('m/d/Y h:i:s a', time());


// attempt insert query execution
            $sql = "INSERT INTO e-pro (tender_id,e_published_date,bid_sub_closing_date,bid_sub_closing_time,tender_opening_date,tender_detail,organisation,tender_type) VALUES ('$tid','$date','$bd','$bt','$tot','$org','$ttype','$file')";
            if($db->conn->query($sql)){
                echo "Records added successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($db->conn);
            }

// close connection
            //mysqli_close($conn);

        }

    }