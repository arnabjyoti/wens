  <?php
  $error = NULL;
    include ('../include/connection.php');
  if(!empty($email=$_GET['email']) && !empty($otp=$_GET['otp']))
  {
  if(isset($_POST['submit'])){
    $password = $mysqli->real_escape_string($_POST['password']);
    $pass = md5($password);
    $res=$mysqli->query("select * from admin where email='$email' and otp='$otp'");
    $count=mysqli_num_rows($res);
if($count>0){
    $resultSet = $mysqli->query("update admin set password='$pass' where email='$email'");
    if($resultSet )
        {
          $mysqli->query("update admin set otp='' where email='$email'");
          header("location:../index.php?Message=");
        }
        else
        {
            echo $mysqli->error;
        } 
}else{
  header("location:../index.php");
}
  }
}else{
  header("location:../index.php");
}
  ?>
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | New Password</title>
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
      <div class="text-center pb-2"><strong>Enter your new password</strong></div>  

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="password" name="password"class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
          <!-- /.col -->
          <div class="col-12 text-center text-danger pt-2"><?php echo $error; ?></div>
        </div>
      </form>
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

</body>
</html>
