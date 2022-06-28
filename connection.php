

<?php 	
// produvtion

// $localhost = "localhost";
// $username = "edu_admin";
// $password = "tTD1yVBYW&hr";
// $dbname = "edu_adrp";


// dev

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "edu_adrp";

// db connection
$mysqli = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($mysqli->connect_error) {
  die("Connection Failed : " . $mysqli->connect_error);
} else {
  // echo "Successfully connected";
}

?>