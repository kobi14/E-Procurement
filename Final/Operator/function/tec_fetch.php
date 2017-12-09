<?php
/**
 * Created by PhpStorm.
 * User: kobi.ktk
 * Date: 12/7/17
 * Time: 12:57 PM
 */


//user_fetch.php

//$conn = new PDO('mysql:host=localhost;dbname=procurement', 'root', '');
include "dbPDO.php";

$query = '';

$output = array();

$query .= "
SELECT * FROM tec 
WHERE 
";

if(isset($_POST["search"]["value"]))
{
    $query .= '(TecID LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= ' OR Spc LIKE "%'.$_POST["search"]["value"].'%" )';

}

if(isset($_POST["order"]))
{
    $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
    $query .= 'ORDER BY TecID DESC ';
}

if($_POST["length"] != -1)
{
    $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}


$statement = $conn->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

$filtered_rows = $statement->rowCount();

foreach($result as $row)
{

    $sub_array = array();
    $sub_array[] = $row['TecID'];
    $sub_array[] = $row['MebID'];
    $sub_array[] = $row['TecMail'];
    $sub_array[] = $row['TpNO'];
    $sub_array[] = $row['Spc'];

    $sub_array[] = '<button type="button" name="update" id="'.$row["TecID"].'"  class="btn btn-warning btn-xs update">Access</button>';
    $sub_array[] = '<button type="button" name="delete" id="'.$row["TecID"].'" class="btn btn-danger btn-xs delete">Delete</button>';
    $data[] = $sub_array;
}

$output = array(
    "draw"				=>	intval($_POST["draw"]),
    "recordsTotal"  	=>  $filtered_rows,
    "recordsFiltered" 	=> 	get_total_all_records($conn),
    "data"    			=> 	$data
);
echo json_encode($output);

function get_total_all_records($conn)
{
    $statement = $conn->prepare("SELECT * FROM tec ");
    $statement->execute();
    return $statement->rowCount();
}

?>