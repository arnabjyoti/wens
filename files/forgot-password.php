<?php 
$error = NULL;
if(isset($_POST['submit'])){
  //connect to database
  include('../include/connection.php');
  //get form data
  $email = $mysqli->real_escape_string($_POST['user_email']);
  $resultSet = $mysqli->query("select * from admin where email='$email'");
  $count=mysqli_num_rows($resultSet);
if($count>0){
  $otp=rand(11111,99999);
  $mysqli->query("update admin set OTP='$otp' where email='$email'");
  $html="Your otp verification code is ".$otp.". Do not share the OTP wih anyone.<br><br>-WENS LINK GHUGUHA";
  smtp_mailer($email,'OTP Verification',$html);
  header("location:otp-verification.php?email={$email}");
}else{
  $error = "Please enter valid email";
}
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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Forgot Password</title>
<link href="../dist/img/adrp-logo.png" rel="icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="../dist/img/adrp-logo.png" alt="ADRP LOGO">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" name="user_email"class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <div class="col-12 text-center text-danger pt-2"><?php echo $error; ?></div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <form method="post">
        <div class="form-group first_box mb-3">
            <input type="email" id="email" class="form-control" placeholder="Email" required="required">
      <span id="email_error" class="field_error"></span>
        </div>
        <div class="form-group first_box">
            <button type="button" class="btn btn-primary btn-block" onclick="send_otp()">Send OTP</button>
        </div>
        <div class="form-group second_box">
            <input type="text" id="otp" class="form-control" placeholder="OTP" required="required">
      <span id="otp_error" class="field_error"></span>
        </div>
        <div class="form-group second_box">
            <button type="button" class="btn btn-primary btn-block" onclick="submit_otp()">Submit OTP</button>
        </div>
      </form> -->

      <p class="mt-3 mb-1">
        <a href="../index.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script>
function send_otp(){
  var email=jQuery('#email').val();
  jQuery.ajax({
    url:'send_otp.php',
    type:'post',
    data:'email='+email,
    success:function(result){
      if(result=='yes'){
        jQuery('.second_box').show();
        jQuery('.first_box').hide();
      }
      if(result=='not_exist'){
        jQuery('#email_error').html('Please enter valid email');
      }
    }
  });
}
</script>
<script>
function submit_otp(){
  var otp=jQuery('#otp').val();
  jQuery.ajax({
    url:'check_otp.php',
    type:'post',
    data:'otp='+otp,
    success:function(result){
      if(result=='yes'){
        window.location='reset-password.php'
      }
      if(result=='not_exist'){
        jQuery('#otp_error').html('Please enter valid otp');
      }
    }
  });
}
</script>
</body>
</html>
