<?php
/**
 * Created by PhpStorm.
 * User: kobi.ktk
 * Date: 12/3/17
 * Time: 8:37 PM
 */

$servername = "localhost";
$usename = "root";
$password = "";
$dbname = "procurement";

/** @var TYPE_NAME $servername */
$conn = mysqli_connect($servername, $usename, $password,$dbname);

if (!$conn) {
    die("Could not connect to the server: " . mysqli_error()); //Check connecetion
}




$link = mysqli_select_db($conn,$dbname);
if (!$link) {
    echo "Could not connect to the database" . mysqli_error($conn);
}
