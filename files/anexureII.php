  <?php 
  $title = "Anexure II";
  include('../include/header.php');

  if(isset($_POST['submit'])){
  //get form data


  foreach ($_POST['course_id'] as $i => $value) {
            $course_id = $_POST['course_id'][$i];
            $course_fee = $_POST['course_fee'][$i];
            $admission_fee = $_POST['admission_fee'][$i];

    $resultSet = $mysqli->query("insert into anx_2 (course_id, admission_fee, course_fee, user_id) values('$course_id','$admission_fee','$course_fee','$u_id')");
  if($resultSet)
     {
        // query the database
        $resultSet1 = $mysqli->query("update admin set anx_2_status='1' where u_id='$u_id'");
        if($resultSet1)
           {
              header('location:anexureII.php');
           }
         else
           {
              echo $mysqli->mysqli_error();
           }
     }
   else
     {
        echo mysqli_error($mysqli);
     }
  }
  // query the database
  
}

if(isset($_POST['update'])){
  foreach ($_POST['anx_id'] as $i => $value) {
    $anx_id = $_POST['anx_id'][$i];
    $course_fee = $_POST['course_fee'][$i];
    $admission_fee = $_POST['admission_fee'][$i];
  
  // query the database
  $resultSet2 = $mysqli->query("update anx_2 set admission_fee='$admission_fee', course_fee='$course_fee' where user_id='$u_id' and anx_id='$anx_id'");
  if($resultSet2)
     {
       $resultSet1 = $mysqli->query("update admin set anx_2_status='1', anx2_request='0' where u_id='$u_id'");
        if($resultSet1)
           {
              header('location:anexureII.php');
           }
         else
           {
              echo $mysqli->mysqli_error();
           }
     }
   else
     {
        echo mysqli_error($mysqli);
     }
}
}
if ($role == "client") {
  ?>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link bg-white">
      <img src="../dist/img/adr.png" alt="Admin Logo" class="brand-image">
      <span class="brand-text text-uppercase font-weight-light"><?php echo $user_name; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                My Account
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="profile.php" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="change-password.php" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="staff-details.php" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Staff Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="anexureII.php" class="nav-link active">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Anexure-II</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="request.php" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Request</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Student
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="enrollment.php" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Enrollment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="fee-collect.php" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Fee Collect</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="certificate-request.php" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Certificate Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="enquiry.php" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Enquiry</p>
                </a>
              </li>
            </ul>
          </li>
          <?php if ($role == 'admin') {
            ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Study Center
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_center.php" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Study Center Details</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="course.php" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Course
              </p>
            </a>
          </li>
        <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Anexure II</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="deshboard.php">Home</a></li>
              <li class="breadcrumb-item active">Anexure II</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12">
            <div class="card">
            	<?php 
            	include('../include/connection.php');
            	$q1 = $mysqli->query("select * from admin where u_id = '$u_id' limit 1");
    				if($q1->num_rows != 0){
    				  $row1 = $q1->fetch_assoc();
    				  $status=$row1['anx_2_status'];


              if ($status == 0) {
                ?>

                <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover text-center">
                  <thead>
                    <tr>
                      <th>Course Name</th>
                      <th>Course Code</th>
                      <th>Duration(months)</th>
                      <th>Admission Fee <br>(to be paid by Student)</th>
                      <th>Course Fee <br>(to be paid by Student)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <form method="post" action="" onsubmit="return confirm('Are you sure you want to submit this form?');">
                      <?php
                      include('../include/connection.php');
                      $qry2=$mysqli->query("select * from course");
                      while($row=$qry2->fetch_array()){
                    ?>
                    <tr>
                      <td><?php echo $row['course_code']; ?></td>
                      <td><?php echo $row['course_name']; ?></td>
                      <td><?php echo $row['duration']; ?></td>
                      <td>
                        <input type="number" class="form-control" name="admission_fee[]">
                        <input type="hidden" class="form-control" name="course_id[]" value="<?php echo $row['course_id']; ?>">
                        <input type="hidden" class="form-control" name="user_id[]" value="<?php echo $u_id; ?>">
                      </td>
                      <td><input type="number" class="form-control" name="course_fee[]"></td>
                    </tr>
                    <?php } ?>
                    <tr>
                      <td colspan="5">
                        <input type="submit" class="btn btn-block btn-primary" name="submit" value="Submit">
                      </td>
                    </tr>
                </form>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

                <?php
              }
    				  elseif ($status == 1) {
    				  	?>

    				  	<!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover text-center">
                  <thead>
                    <tr>
                      <th>Course Name</th>
                      <th>Course Code</th>
                      <th>Duration(months)</th>
                      <th>Admission Fee <br>(to be paid by Student)</th>
                      <th>Course Fee <br>(to be paid by Student)</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php
                      include('../include/connection.php');
                      $qry2=$mysqli->query("select * from anx_2 inner join course on anx_2.course_id = course.course_id where user_id='$u_id'");
                      while($row=$qry2->fetch_array()){
                    ?>
                    <tr>
                      <td><?php echo $row['course_code']; ?></td>
                      <td><?php echo $row['course_name']; ?></td>
                      <td><?php echo $row['duration']; ?></td>
                      <td><?php echo $row['admission_fee']; ?> ₹</td>
                      <td><?php echo $row['course_fee']; ?> ₹</td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

    				  	<?php
    				  }
    				  elseif ($status == 2) {
    				  	?>
    				  	<!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover text-center">
                  <thead>
                    <tr>
                      <th>Course Name</th>
                      <th>Course Code</th>
                      <th>Duration(months)</th>
                      <th>Admission Fee <br>(to be paid by Student)</th>
                      <th>Course Fee <br>(to be paid by Student)</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<form method="post" action="" onsubmit="return confirm('Are you sure you want to submit this form?');">
                      <?php
                        include('../include/connection.php');
                        $qry2=$mysqli->query("select * from anx_2 inner join course on anx_2.course_id = course.course_id where user_id='$u_id'");
                        while($row=$qry2->fetch_array()){
                      ?>
                    <tr>
                      <td><?php echo $row['course_code']; ?></td>
                      <td><?php echo $row['course_name']; ?></td>
                      <td><?php echo $row['duration']; ?></td>
                      <td><input type="number" class="form-control" name="admission_fee[]" value="<?php echo $row['admission_fee']; ?>">
                      	<input type="hidden" class="form-control" name="anx_id[]" value="<?php echo $row['anx_id']; ?>"></td>
                      <td><input type="number" class="form-control" name="course_fee[]" value="<?php echo $row['course_fee']; ?>"></td>
                    </tr>
                    <?php } ?>
                    <tr>
                      <td colspan="5">
                        <input type="submit" class="btn float-right btn-warning" name="update" value="Update">
                      </td>
                    </tr>
                </form>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

    				  	<?php
    				  }






    				}else{
    					?>
    					
    				<?php }
            	?>
              
              
            </div>
            <!-- /.card -->
          </div>
      </div>
  </div>
  </div>

  <!-- /.content-wrapper -->
  <?php
  }else{ 
      echo "<script type='text/javascript'>alert('You are not authorized to access.');
    window.location.href='dashboard.php';</script>";
    }
  include('../include/footer.php');
  ?>