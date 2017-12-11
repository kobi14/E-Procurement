

<?php
/**
 * Created by PhpStorm.
 * User: kobi.ktk
 * Date: 12/7/17
 * Time: 12:57 PM
 */


//bidder_fetch.php

//$conn = new PDO('mysql:host=localhost;dbname=procurement', 'root', '');
include "dbPDO.php";

$query = '';

$output = array();

$query .= "
SELECT * FROM bidder 
WHERE 
";

if(isset($_POST["search"]["value"]))
{
    $query .= '(Name LIKE "%'.$_POST["search"]["value"].'%" ';
   // $query .= ' OR Bemail LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= ' OR BidderID LIKE "%'.$_POST["search"]["value"].'%" )';

}

if(isset($_POST["order"]))
{
    $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
    $query .= 'ORDER BY Name DESC ';
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

    $sub_array[] = $row['BidderID'];
    $sub_array[] = '<a href="../../Bidder_Module/'.$row["TdFile"].'" target="_blank" class="btn btn-success btn-xs">View PDF</a>';
    $sub_array[] = $row['Name'];
    $sub_array[] = $row['Bemail'];
    $sub_array[] = $row['Bcontact'];
    if ($row['Status']==0){
        $sub_array[] = '<label  class="btn btn-default btn-xs" disabled>Inactive</label>';
    }elseif ($row['Status']==1){
        $sub_array[] = '<label   class="btn btn-success btn-xs " disabled>Active</label>';
    }
    if ($row['Status']==0){
        $sub_array[] = '<button type="button"  name="unblock" id="'.$row["BidderID"].'" class="btn btn-success btn-xs unblock">Unblock</button>';
    }elseif ($row['Status']==1){
        $sub_array[] = '<button type="button" name="block" id="'.$row["BidderID"].'" class="btn btn-warning btn-xs block">Block</button>';
    }


    //$sub_array[] = '<button type="button" name="update" id="'.$row["BidderID"].'"  class="btn btn-warning btn-xs update">Update</button>';
    $sub_array[] = '<button type="button" name="delete" id="'.$row["BidderID"].'" class="btn btn-danger btn-xs delete">Delete</button>';
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
    $statement = $conn->prepare("SELECT * FROM bidder ");
    $statement->execute();
    return $statement->rowCount();
}

?>