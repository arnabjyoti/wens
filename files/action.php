<?php 
	include('../include/connection.php');
	if(isset($_POST['student_id']))
	{
		$student_id = $_POST['student_id'];
		$u_id = $_POST['u_id'];
		$stmt = $mysqli->prepare("SELECT student_id FROM cart WHERE student_id=?");
		$stmt->bind_param("i",$student_id);
		$stmt->execute();
		$res = $stmt->get_result();
		$r = $res->fetch_assoc();
		$code = isset($r['student_id']);

		if (!$code) {
			$query = $mysqli->prepare("INSERT INTO cart (u_id, student_id) VALUES(?,?)");
		$query->bind_param("ii",$u_id,$student_id);
			$query->execute();
			echo "Item added to cart";
		}else{
			echo "Item already in cart";
		}
	}
?>








