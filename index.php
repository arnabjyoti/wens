d<?php 
$error = NULL;
if (isset($_GET['Message'])) 
    {
    echo "<script type='text/javascript'>alert('Password Change successful');</script>";
    }
if(isset($_POST['submit'])){
  //connect to database
  include('include/connection.php');
  //get form data
  $user_email = $mysqli->real_escape_string($_POST['user_email']);
  $user_password = $mysqli->real_escape_string($_POST['user_password']); 
  $user_password = md5($user_password);
  // query the database
  $resultSet = $mysqli->query("select * from admin where user_name = '$user_email' and password = '$user_password' limit 1");
  if($resultSet->num_rows != 0) {
    // process login
    $row = $resultSet->fetch_assoc();
    $user_status = $row['user_status'];
    if ($user_status == 1) {
      //continue processing
      session_start();
      $_SESSION['user_email'] = $user_email;
      session_regenerate_id( false );

      header('location:files/dashboard.php');
    }else{
      $error = "<b>This acccount has been suspended. Contact your Administrative</b>";
    }
  }else{
    // invalid cradentials
    $error = "<b>The User Name or Password you entered is incorrect</b>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>
  <!-- Favicons -->
  <link href="dist/img/adrp-logo.png" rel="icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="dist/img/adrp-logo.png" alt="User Avatar">
    <p class="text-center h6 text-danger"><?php echo $error; ?></p>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="user_email" class="form-control" placeholder="User Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="user_password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="files/forgot-password.php">I forgot my password</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
