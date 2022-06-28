<?php
include('../include/header.php');
include('../include/connection.php');
$id=$_GET['id'];
$query = $mysqli->query("update admsn_frm set enrollment_id='Applied', enrollment_apply_date=CURRENT_DATE() where u_id='$u_id' and id='$id'");
if($query )
        {
        	header('location:enrollment.php');
        }else
        {
            echo $mysqli->error;
        }   
?>