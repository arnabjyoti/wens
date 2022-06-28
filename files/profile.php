  <?php 
  $title = "Profile";
  include('../include/header.php');

  if(isset($_POST['update'])){
  //connect to database
  include('../include/connection.php');
  //get form data
  $user_id = $mysqli->real_escape_string($_POST['u_id']);

  $center_in_chrg = $mysqli->real_escape_string($_POST['center_in_chrg']);
  $contact_no = $mysqli->real_escape_string($_POST['contact_no']);
  $theory_room = $mysqli->real_escape_string($_POST['theory_room']);
  $lab_room = $mysqli->real_escape_string($_POST['lab_room']);
  $office_room = $mysqli->real_escape_string($_POST['office_room']);
  $system_no = $mysqli->real_escape_string($_POST['system_no']);
  $gst = $mysqli->real_escape_string($_POST['gst']);
  $pan = $mysqli->real_escape_string($_POST['pan']);

  
  // query the database
  $resultSet1 = $mysqli->query("update admin set center_in_chrg='$center_in_chrg', contact_no='$contact_no', theory_room='$theory_room', lab_room='$lab_room', office_room='$office_room', system_no='$system_no', gst='$gst', pan='$pan' where u_id='$user_id'");
  if($resultSet1)
     {
       header('location:profile.php');
     }
   else
     {
        echo mysqli_error($mysqli);
     }
}
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
              <?php if ($role == 'client') {
            ?> 
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
                <a href="profile.php" class="nav-link active">
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
                <a href="anexureII.php" class="nav-link">
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
          <?php } ?>
            <?php if ($role == 'admin') {
            ?>
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
                <a href="profile.php" class="nav-link active">
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
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Course
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="course.php" class="nav-link">
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      
    </section>
<?php 
              include('../include/connection.php');
              $q1 = $mysqli->query("select * from admin where u_id = '$u_id' limit 1");
            if($q1->num_rows != 0){
              $row1 = $q1->fetch_assoc();
              $center_owner=$row1['center_owner'];
              $center_location=$row1['center_location'];
              $address=$row1['address'];
              $center_in_chrg=$row1['center_in_chrg'];
              $contact_no=$row1['contact_no'];
              $theory_room=$row1['theory_room'];
              $lab_room=$row1['lab_room'];
              $office_room=$row1['office_room'];
              $system_no=$row1['system_no'];
              $gst=$row1['gst'];
              $pan=$row1['pan'];
              $est_date=$row1['est_date'];
              //est_date format change
              $est_date = str_replace('-', '/', $est_date);
              $est_date = date('d/m/Y', strtotime($est_date));

              $email=$row1['email'];

              if ($role == "client") {

                ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Us</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Center Code</strong>

                <p class="text-muted">
                 <?php echo $user_name; ?>
                </p>

                <hr>
                <strong><i class="fas fa-laptop-house mr-1"></i> Date of Establishment</strong>

                <p class="text-muted">
                 <?php echo $est_date; ?>
                </p>

                <hr>

                <strong><i class="fas fa-envelope mr-1"></i> Center Email-ID</strong>

                <p class="text-muted">
                 <?php echo $email; ?>
                </p>

                <hr>

                <strong><i class="fas fa-user mr-1"></i> Center Owner</strong>

                <p class="text-muted">
                  <?php echo $center_owner; ?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Center Location</strong>

                <p class="text-muted"><?php echo $center_location; ?></p>

                <hr>
                <strong><i class="fas fa-map-marked-alt mr-1"></i> Center Address</strong>

                <p class="text-muted">
                  <?php echo $address; ?>
                </p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <!-- <div class="card-header p-2">
                
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    

                    
                  

                  <div class="tab-pane" id="settings">

  <form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Name of Center In-Charge:</label>
      <input type="text" name="center_in_chrg" class="form-control" placeholder="Center In-Charge" value="<?php echo $center_in_chrg; ?>">
      <input type="hidden" name="u_id" class="form-control" value="<?php echo $u_id; ?>">
    </div>
    <div class="form-group col-md-6">
      <label>Contact Number:</label>
      <input type="number" name="contact_no" class="form-control" placeholder="Contact Number" value="<?php echo $contact_no; ?>">
    </div>
  <div class="form-group col-md-6">
      <label >Nos. of Theory/Class Room:</label>
      <input type="number" name="theory_room" class="form-control" placeholder="Nos. of Theory/Class Room" value="<?php echo $theory_room; ?>">
    </div>
  <div class="form-group col-md-6">
      <label>Nos. of Practical/Lab Room:</label>
      <input type="number" name="lab_room" class="form-control" placeholder="Nos. of Practical/Lab Room" value="<?php echo $lab_room; ?>">
    </div>
    <div class="form-group col-md-6">
      <label>Nos. of Office Room:</label>
      <input type="number" name="office_room" class="form-control" placeholder="Nos. of Office Room" value="<?php echo $office_room; ?>">
    </div>
  <div class="form-group col-md-6">
      <label>Nos. of Computer Systems Avilable for Students:</label>
      <input type="number" name="system_no" class="form-control" value="<?php echo $system_no; ?>">
    </div>
    <div class="form-group col-md-6">
      <label>GST No.</label>
      <input type="text" name="gst" class="form-control" placeholder="GST No." value="<?php echo $gst; ?>">
    </div>
    <div class="form-group col-md-6">
      <label>PAN No.:</label>
      <input type="text" name="pan" class="form-control" placeholder="PAN No." value="<?php echo $pan; ?>">
    </div>
  </div>
  <button type="submit" name="update" class="btn float-right btn-warning">Update</button>
</form>




                    
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  <?php } elseif ($role == "admin") {
    ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 text-center">
                <i class="fas fa-user-circle fa-10x"></i>
                <br>
                <p class="h2 pt-4">
                  <b>User Name: </b>
                  <span class="text-uppercase">
                    <?php echo $row['user_name']; ?>
                  </span>
                </p>
                <p class="h4 p-1">
                  <b>Full Name: </b>
                  <span class="text-uppercase">
                    <?php echo $row['center_owner']; ?>
                  </span>
                </p>
                <p class="h5 p-1">
                  <b>Job Role: </b>
                  <span class="text-uppercase">
                    Administrative
                  </span>
                </p>
              </div>
              
            
        </div>
      </div>
    </section>
  <?php }} ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  include('../include/footer.php');
  ?>


  