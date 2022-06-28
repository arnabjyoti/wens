<?php
// development
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "edu_wens";
// db connection
$mysqli = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($mysqli->connect_error) {
  die("Connection Failed : " . $mysqli->connect_error);
} else {
  // echo "Successfully connected";
}
?>