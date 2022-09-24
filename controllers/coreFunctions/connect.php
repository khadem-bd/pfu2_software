<?php
//error_reporting(0);

//local server
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pfu2_software";

//live server
// $servername = "localhost";
// $username = "moinuddi_usr";
// $password = "escalaTe@#202@";
// $dbname = "moinuddi_escalate";

//live server inalyze
// $servername = "localhost";
// $username = "mornvqfq_escuser";
// $password = "allstar@#inalyzebd2021";
// $dbname = "mornvqfq_escalate";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//$conn = new PDO("mysql:host='$servername';dbname='$dbname'",$username,$password);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
?>
