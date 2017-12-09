<?php
/**
 * Created by PhpStorm.
 * User: kobi.ktk
 * Date: 12/7/17
 * Time: 12:57 PM
 */


//dash_fetch.php

//$conn = new PDO('mysql:host=localhost;dbname=procurement', 'root', '');
include "dbPDO.php";

$query = '';

$output = array();

$query .= "
SELECT * FROM tender 
WHERE 
";

if(isset($_POST["search"]["value"]))
{
    $query .= '(TOwner LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= ' OR Category LIKE "%'.$_POST["search"]["value"].'%" )';

}

if(isset($_POST["order"]))
{
    $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
    $query .= 'ORDER BY CDate DESC ';
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
    $sub_array[] = $row['TenderID'];
    $sub_array[] = '<a href="'.$row["TenderFile"].'" target="_blank" class="btn btn-success btn-xs">View PDF</a>';
    $sub_array[] = $row['TOwner'];
    $sub_array[] = $row['ODate'];
    $sub_array[] = $row['OTime'];
    $sub_array[] = $row['CDate'];
    $sub_array[] = $row['CTime'];
    $sub_array[] = $row['Category'];

    $sub_array[] = '<button type="button" name="update" id="'.$row["TenderID"].'"  class="btn btn-warning btn-xs update">Update</button>';
    $sub_array[] = '<button type="button" name="delete" id="'.$row["TenderID"].'" class="btn btn-danger btn-xs delete">Delete</button>';
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
    $statement = $conn->prepare("SELECT * FROM tender ");
    $statement->execute();
    return $statement->rowCount();
}

?>