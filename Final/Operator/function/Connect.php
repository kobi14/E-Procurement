<?php
/**
 * Created by PhpStorm.
 * User: kobi.ktk
 * Date: 12/2/17
 * Time: 12:18 PM
 */
class Connect{






        //public $link;
        public function __construct()
        {


            $servername = "localhost";
            $usename = "root";
            $password = "";
            $dbname = "e-pro";

            /** @var TYPE_NAME $servername */
            $conn = new mysqli($servername, $usename, $password,$dbname);

            if ($conn->connect_error) {
                die("Could not connect to the server: " . $conn->connect_error); //Check connecetion
            }




        }

}









?>
