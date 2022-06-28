<?php
include('../include/header.php');
include('../include/connection.php');
$id=$_GET['id'];
$qry=$mysqli->query("delete from cart where cart_id='$id' and u_id='$u_id'");
	if($qry)
	{
    	header('location:payment.php');
    }else{
        echo $mysqli->error;
    }
?>