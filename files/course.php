  <?php 
  $title = "Course";
  include('../include/header.php');
  

  if(isset($_POST['add'])){
  //connect to database
  include('../include/connection.php');
  //get form data
  $course_code = $mysqli->real_escape_string($_POST['course_code']);
  $course_name = $mysqli->real_escape_string($_POST['course_name']);
  $duration = $mysqli->real_escape_string($_POST['duration']);
  $hrs = $mysqli->real_escape_string($_POST['hrs']);
  // query the database
  $resultSet = $mysqli->query("insert into course (course_code, course_name, duration, duration_hrs) values('$course_code', '$course_name', '$duration', '$hrs')");
  if($resultSet)
     {
        header('location:course.php');
     }
   else
     {
        echo $mysqli->mysqli_error();
     }
}

if(isset($_POST['update'])){
  //connect to database
  include('../include/connection.php');
  //get form data
  $course_id = $mysqli->real_escape_string($_POST['course_id']);
  $course_code = $mysqli->real_escape_string($_POST['course_code']);
  $course_name = $mysqli->real_escape_string($_POST['course_name']);
  $duration = $mysqli->real_escape_string($_POST['duration']);
  $hrs = $mysqli->real_escape_string($_POST['hrs']);
  // query the database
  $resultSet = $mysqli->query("update course set course_code='$course_code', course_name='$course_name', duration='$duration', duration_hrs='$hrs' where course_id='$course_id'");
  if($resultSet)
     {
       header('location:course.php');
     }
   else
     {
        echo $mysqli->mysqli_error();
     }
}
if(isset($_POST['delete'])){
  include('../include/connection.php');
  //get form data
  $course_id = $mysqli->real_escape_string($_POST['course_id']);
  // query the database
  $resultSet = $mysqli->query("delete from course where course_id='$course_id' and '$role'='admin'");
  if($resultSet)
     {
       header('location:course.php');
     }
   else
     {
      echo $mysqli->mysqli_error();
     }
}
if ($role == "admin") {
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
          <li class="nav-item">
            <a href="#" class="nav-link">
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
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-university"></i>
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
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Course
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="course.php" class="nav-link active">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Course Details</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Service Request
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="enrollment-request.php" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Enrollment Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="certificate.php" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Certificate Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="anexure-update-request.php" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Anexure II request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="discount-request.php" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Discount Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="enquiry.php" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Enquiry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="old-data.php" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Old Data</p>
                </a>
              </li>
            </ul>
          </li>
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
            <h1 class="m-0">Course</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Course</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header p-2"><h3>Add Course</h3></div>
              <div class="card-body p-3">
              <form action="" method="post">
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label>Course Code:</label>
                    <input type="text" name="course_code" required="required" class="form-control" placeholder="Course Code">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Course Name:</label>
                    <input type="text" name="course_name" required="required" class="form-control" placeholder="Course Name">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Duration (Month):</label>
                    <input type="number" name="duration" required="required" class="form-control" placeholder="Duration (Month)">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Duration (Hours):</label>
                    <input type="number" name="hrs" required="required" class="form-control" placeholder="Duration (Hours)">
                  </div>
                </div>
                <button type="submit" name="add" class="btn float-right btn-primary">Add</button>
              </form>
            </div>
          </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <br>
    <!-- /.content -->
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
               <div class="card-header text-center p-2"><h3>Course List</h3></div>
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover text-center">
                  <thead>
                    <tr>
                      <th style="width:20%;">Course Code</th>
                      <th style="width:50%;">Course Name</th>
                      <th style="width:10%;">Duration(Month)</th>
                      <th style="width:10%;">Duration(Hours)</th>
                      <th style="width:10%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php
                      include('../include/connection.php');
                      $qry2=$mysqli->query("select * from course");
                      while($row=$qry2->fetch_array()){
                    ?>
                    <form method="post" action="" onsubmit="return confirm('Are you sure you want to submit this form?');">
                    <tr>
                      <td>
                        <input type="text" class="form-control" name="course_code" value="<?php echo $row['course_code']; ?>">
                        <input type="hidden" class="form-control" name="course_id" value="<?php echo $row['course_id']; ?>">
                      </td>
                      <td>
                        <input type="text" class="form-control" name="course_name" value="<?php echo $row['course_name']; ?>">
                      </td>
                      <td>
                        <input type="number" class="form-control" name="duration" value="<?php echo $row['duration']; ?>">
                      </td>
                      <td>
                      <input type="number" class="form-control" name="hrs" value="<?php echo $row['duration_hrs']; ?>">
                      </td>
                      <td>
                        <input type="submit" class="btn btn-sm btn-warning" name="update" value="Update">
                        <!-- <input type="submit" class="btn btn-sm btn-success" name="delete" value="Delete"> -->
                      </td>
                    </tr>
                    </form>
                  <?php } ?>
                
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          
        </div>
        </div>
      </section>
    
  
  </div>
  <!-- /.content-wrapper -->
  <?php
  }else{ 
      echo "<script type='text/javascript'>alert('You are not authorized to access.');
    window.location.href='dashboard.php';</script>";
    }
  include('../include/footer.php');
  ?>