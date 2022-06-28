<?php 
session_start();
session_regenerate_id( true );
 if(!isset($_SESSION['user_email'])){
 	header('location:../index.php');
 }


include('connection.php');
$user_email = $_SESSION["user_email"];
$qry1 = $mysqli->query("select * from admin where user_name='$user_email' limit 1");
if ($qry1) {
	$row = $qry1->fetch_assoc();
    $u_id = $row['u_id'];
    $role = $row['role'];
    $user_name = $row['user_name'];
}
?>


