  <?php 
  $title = "Study Center Details";
  include('../include/header.php');
  $id=$_GET['id'];

  if(isset($_POST['submit'])){
  //connect to database
  include('../include/connection.php');
  //get form data
  $contact_no = $mysqli->real_escape_string($_POST['contact_no']);
  $user_name = $mysqli->real_escape_string($_POST['user_name']);
  $center_location = $mysqli->real_escape_string($_POST['center_location']);
  $center_owner = $mysqli->real_escape_string($_POST['center_owner']);
  $address = $mysqli->real_escape_string($_POST['address']);
  $user_password  = $mysqli->real_escape_string($_POST['user_password']);
  $email  = $mysqli->real_escape_string($_POST['email']);
  $est_date  = $mysqli->real_escape_string($_POST['est_date']);
  $c_status  = $mysqli->real_escape_string($_POST['c_status']);
  //conver date into database format
  $est_date = str_replace('/', '-', $est_date);
  $date = date('Y-m-d', strtotime($est_date));
  
  $user_password = md5($user_password);
  // query the database
  $resultSet = $mysqli->query("update admin set user_name='$user_name', contact_no='$contact_no', email='$email', est_date='$date', center_location='$center_location', center_owner='$center_owner', address='$address', user_status='$c_status' where u_id='$id'");
  if($resultSet)
     {
       header("location:study-center-details.php?id=$id");
     }
   else
     {
        echo $mysqli->error;
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
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-university"></i>
              <p>
                Study Center
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_center.php" class="nav-link active">
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
            <h1 class="m-0">Study Center Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="deshboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="add_center.php">Add Center</a></li>
              <li class="breadcrumb-item active">Study Center Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php
      include('../include/connection.php');
      $qry2=$mysqli->query("select * from admin where u_id='$id'");
      while($row=$qry2->fetch_array()){
        $status = $row['user_status'];
        $est_date = $row['est_date'];
        $est_date = str_replace('-', '/', $est_date);
        $est_date = date('d-m-y', strtotime($est_date));
    ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row bg-white border p-2">
          <div class="col-8 ">
          <strong><i class="fas fa-book pt-3"></i> Center Code</strong>
            <p class="text-muted">
              <?php echo $row['user_name']; ?>
            </p>
          </div>
          <div class="col-4 float-right text-center pt-2">
            
            <p>
                      <?php 
                      if($status == "0"){
                        echo "<i class='fas text-danger fa-times-circle fa-2x'></i><br>Suspend";
                      }elseif ($status == "1") {
                        echo "<i class='fas text-success fa-check-circle fa-2x'></i><br>Active";
                      } ?>
                      </p>
          </div>

        </div>
        <div class="row bg-white">
        <br><br>
        <div class="col-md-12 p-2">
        </div>
    <div class="col-md-6 p-2">
      <form action="" method="POST">
        <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Center Code:</label>
    <div class="col-sm-8">
  <input type="text" class="form-control" name="user_name" required="required" value="<?php echo $row['user_name']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Contact No.:</label>
    <div class="col-sm-8">
  <input type="number" class="form-control" name="contact_no" required="required" value="<?php echo $row['contact_no']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Email ID:</label>
    <div class="col-sm-8">
  <input type="email" class="form-control" name="email" required="required" value="<?php echo $row['email']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Establish Date:</label>
    <div class="col-sm-8 input-group date" id="establishDate" data-target-input="nearest">
      <input type="text" name="est_date" required="required" class="form-control datetimepicker-input" value="<?php echo $est_date; ?>" data-target="#establishDate"/>
        <div class="input-group-append" data-target="#establishDate" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
      </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Center Location:</label>
    <div class="col-sm-8">
  <input type="text" class="form-control" name="center_location" required="required" value="<?php echo $row['center_location']; ?>">
    </div>
  </div>
   <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Center Owner:</label>
    <div class="col-sm-8">
  <input type="text" class="form-control" name="center_owner" required="required" value="<?php echo $row['center_owner']; ?>">
    </div>
  </div>
   <div class="form-group row">
    <label class="col-sm-4 col-form-label">Center Address Line:</label>
    <div class="col-sm-8">
  <input type="text" class="form-control" name="address" required="required" value="<?php echo $row['address']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Status:</label>
    <div class="col-sm-8">
        <select name="c_status" class="form-control" required>
          <?php if($status == "0"){ ?>
            <option value="0">Suspend</option>
            <option value="1">Active</option>
        <?php } elseif($status == "1"){ ?>
          <option value="1">Active</option>
          <option value="0">Suspend</option>
        <?php } ?>
        </select>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-12">
      <button type="submit" name="submit" class="btn btn-block btn-warning">Update</button>
    </div>
  </div>
</form>
    </div>
     <div class="col-md-6 border-left">
      <div class="row">
        <div class="col-md-12">
            <div class="info-box bg-purple">
              <span class="info-box-icon"><i class="fas fa-user"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Center In-Charge</span>
                <span class="info-box-number number h5"><?php echo $row['center_in_chrg']; ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box bg-purple">
              <span class="info-box-icon"><i class="fas fa-restroom"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Theory/Class Room</span>
                <span class="info-box-number number h3"><?php echo $row['theory_room']; ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box bg-purple">
              <span class="info-box-icon"><i class="fas fa-laptop-house"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Practical/Lab Room</span>
                <span class="info-box-number number h3"><?php echo $row['lab_room']; ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="info-box bg-purple">
              <span class="info-box-icon"><i class="fas fa-person-booth"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Office Room</span>
                <span class="info-box-number number h3"><?php echo $row['office_room']; ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="info-box bg-purple">
              <span class="info-box-icon"><i class="fas fa-desktop"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Computer Systems Avilable for Students</span>
                <span class="info-box-number number h3"><?php echo $row['system_no']; ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box bg-purple">
              <span class="info-box-icon"><i class="fas fa-id-card"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">GST No.</span>
                <span class="info-box-number number h6"><?php echo $row['gst']; ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box bg-purple">
              <span class="info-box-icon"><i class="fas fa-id-card-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">PAN No.:</span>
                <span class="info-box-number number h6"><?php echo $row['pan']; ?></span>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
<br>
<div class="row">
 <div class="col-md-12">
 </div>
 <div class="card">
  <div class="card-header bg-light">
    <h5><b>Anexure II</b></h5>
  </div>
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
          $qry3=$mysqli->query("select * from anx_2 inner join course on anx_2.course_id = course.course_id where user_id='$id'");
           while($row3=$qry3->fetch_array()){
        ?>
        <tr>
          <td><?php echo $row3['course_code']; ?></td>
          <td><?php echo $row3['course_name']; ?></td>
          <td><?php echo $row3['duration']; ?></td>
          <td><?php echo $row3['admission_fee']; ?> ₹</td>
          <td><?php echo $row3['course_fee']; ?> ₹</td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  </div>
  <br>
  <!-- Main row -->
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
      <div class="card card-solid">
        <div class="card-header bg-light">
          <h5><b>Staff Details</b></h5>
        </div>
        <div class="card-body">
          <div class="row small">

            <?php
                      include('../include/connection.php');
                      $qry2=$mysqli->query("select * from staff where u_id=$id");
                      while($row=$qry2->fetch_array()){
                        $date_of_join = $row['date_of_join'];
                        //date of joinng format change
                        $date_join = str_replace('-', '/', $date_of_join);
                        $date_join = date('d/m/Y', strtotime($date_join));
                            ?>

            <div class="col-12 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-body p-1">
                  <div class="row">
                    <div class="col-5 col-sm-5 col-md-5 text-center">
                      <img src="../dist/img/staff_img/<?php echo $row['staff_img']; ?>" alt="user-avatar" class=" img-fluid border">
                      <br>
                      <div class=" pt-3 text-uppercase"><b><?php echo $row['full_name']; ?></b></div>
                    </div>
                    <div class="col-7 col-sm-7 col-md-7">
                      <ul class="m-0 fa-ul text-muted">
                        <li class="h7 pt-2"><i class="fas fa-user-tag"></i><b> Job Roll: </b><?php echo $row['job_roll']; ?></li>
                        <li class="h7 pt-2"><i class="fas fa-calendar-alt"></i><b> Date of Joining: </b> <?php echo $date_join; ?></li>
                        <li class="h7 pt-2"><i class="fas fa-user-graduate"></i><b> Academic Qualification: </b> <?php echo $row['aca_quali']; ?></li>
                        <li class="h7 pt-2"><i class="fas fa-chalkboard-teacher"></i><b> Computer Qualification: </b> <?php echo $row['cmp_quali']; ?></li>
                        <?php if ($row['job_roll'] == "Faculty") {
                        ?>
                        <li class="h7 pt-2"><i class="fas fa-atom"></i><b> Skill: </b> <?php echo $row['skill']; ?></li>
                        <?php }
                      else{

                      } ?>
                      </ul>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <ul class="m-0 fa-ul text-muted">
                        
                      
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
        <!-- /.card-body -->
        
      </div>
      <!-- /.card  -->
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <?php } ?>
    <!-- /.content -->
  </div> 
  <!-- /.content-wrapper -->
   <?php
   }else{ 
      echo "<script type='text/javascript'>alert('You are not authorized to access.');
    window.location.href='dashboard.php';</script>";
    }
  include('../include/footer.php');
  ?>
  <script>
  $(function () {
    //Date picker
    $('#establishDate').datetimepicker({
        format: 'DD/MM/YYYY'
    });
  })
</script>
