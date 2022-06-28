<?php 
include('../include/header.php');
$qry=$mysqli->query("select monthname(form_date) as mname, sum(fee) as total from admsn_frm group by month(form_date)");
$data = array();
foreach ($qry as $row) {
	$data[] = $row;
}
print json_encode($data);
?>