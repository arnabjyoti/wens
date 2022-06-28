<?php
include ('../include/connection.php');
$email=$_POST['email'];
$resultSet = $mysqli->query("select * from admin where email='$email'");
  $count=mysqli_num_rows($resultSet);
if($count>0){
	$otp=rand(11111,99999);
	$mysqli->query("update admin set otp='$otp' where email='$email'");
	$html="Your otp verification code is ".$otp;
	$_SESSION['EMAIL']=$email;
	smtp_mailer($email,'OTP Verification',$html);
	echo "yes";
}else{
	echo "not_exist";
}
 
function smtp_mailer($to,$subject, $msg){
	require_once("../smtp/class.phpmailer.php");
	$mail = new PHPMailer(); 
  //$mail->SMTPDebug=3;
  $mail->IsSMTP(); 
  $mail->SMTPAuth = true; 
  $mail->SMTPSecure = 'tls'; 
  $mail->Host = "host.adrp.in";
  $mail->Port = "587"; 
  $mail->IsHTML(true);
  $mail->CharSet = 'UTF-8';
  $mail->Username = "support@edu.adrp.in";
  $mail->Password = 'Support_adrp@2010';
  $mail->SetFrom("support@edu.adrp.in");
  $mail->Subject = $subject;
  $mail->Body =$msg;
  $mail->AddAddress($to);
	if(!$mail->Send()){
		return 0;
	}else{
		return 1;
	}
}
?>