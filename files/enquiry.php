  <?php 
  $title = "Enquiry";
  include('../include/header.php');
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
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
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
                <a href="enquiry.php" class="nav-link active">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Enquiry</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
          <?php if ($role == 'admin') {
            ?>
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
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
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
                <a href="enquiry.php" class="nav-link active">
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Enquiry</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <div class="col-md-12">
         <div class="card">
  <div class="card-header bg-light">
    <h5><b>Search Candidate Details</b></h5>
  </div>
  <div class="card-body">
    <form method="post" action="">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="name" class="required">Name</label>
      <input type="text" name="name" class="form-control" placeholder="Name">
    </div>
    <div class="col-sm-3">
      <label for="dob" class="required">Application No.</label>
      <input type="text" name="aplc_id" class="form-control" placeholder="Application No.">
  </div>
  <div class="col-sm-3">
      <label class="required">Enrollment No.</label>
      <input type="text" name="enrollment_id" class="form-control" placeholder="Enrollment No.">
  </div>
  <div class="col-md-2">
      <label for="gender" class="required">Gender</label>
        <select name="gender" class="form-control">
          <option></option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Course Name</label>
        <select name="course_name" class="form-control" id="selectcourse">
          <option></option>
            <?php
            include('../include/connection.php');
            $qry2=$mysqli->query("select * from course");
            while($row=$qry2->fetch_array()){
            ?>
        <option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_name']; ?></option>
            <?php } ?>
      </select>
    </div>
    <div class="col-md-6">
      <label>Date Range</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="far fa-calendar-alt"></i>
            </span>
          </div>
          <input type="text" class="form-control float-right" name="daterange" id="reservation">
        </div>
    </div>
  </div>
  <?php if ($role == "admin") { ?>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="center">Center Name</label>
        <select name="center_code" class="form-control" id="Centername">
          <option></option>
            <?php
            include('../include/connection.php');
            $qry3=$mysqli->query("select * from admin where role='client'");
            while($row3=$qry3->fetch_array()){
            ?>
        <option value="<?php echo $row3['u_id']; ?>"><?php echo $row3['user_name']; ?></option>
            <?php } ?>
      </select>
    </div>
  </div>
<?php } ?>
  <button class="btn btn-success float-right" type="submit" value="submit" name="submit">Search</button>
</form>
  </div>
</div>
</div>
          
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
        <div class="card-body">
                <table id="example1" class="table small table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl.</th>
                    <th>App. No.</th>
                    <th>Enrl. No.</th>
                    <th>Student Name</th>
                    <th>En. Req. Date</th>
                    <th>Course</th>
                    <th>Details</th>
                  </tr>
                  </thead>
                  <tbody>
        <?php
        $sl=1;
        include('../include/connection.php');
        if (isset($_POST['submit'])) {
    if(isset($_POST["daterange"]) && ($_POST["daterange"]) != "")
    {
      $aRanges = explode(' - ', $_POST['daterange']);
      //conver date into database format
      $start_date = str_replace('/', '-', $aRanges[0]);
      $start_date = date('Y-m-d', strtotime($start_date));
      //conver date into database format
      $end_date = str_replace('/', '-', $aRanges[1]);
      $end_date = date('Y-m-d', strtotime($end_date));
    }else{
      $start_date = "";
      $end_date = "";
    }
  $name = $_POST['name'];
  $course_name = $_POST['course_name'];
  $gender = $_POST['gender'];
  $aplc_id = $_POST['aplc_id'];
  $enrollment_id = $_POST['enrollment_id'];

  if ($role == "admin") {
    $center_code = $_POST['center_code'];
      if (empty($name || $course_name || $gender || $aplc_id || $enrollment_id || $center_code || $end_date || $start_date)) {
      echo "<script type='text/javascript'>alert('Form is empty!');</script>";
      }else {
        if ($name != "" || $course_name != "" || $gender != "" || $aplc_id != "" || $center_code != "")
      {
        $qry=$mysqli->query("select * from admsn_frm join anx_2 on admsn_frm.anx_id = anx_2.anx_id join course on anx_2.course_id = course.course_id where name='$name' or aplc_id='$aplc_id' or gender='$gender' or anx_2.course_id='$course_name' or admsn_frm.u_id='$center_code'");
      }elseif ($end_date != "" || $start_date != "")
      {
        $qry=$mysqli->query("select * from admsn_frm join anx_2 on admsn_frm.anx_id = anx_2.anx_id join course on anx_2.course_id = course.course_id where form_date between '$start_date' and '$end_date'");
      }elseif ($enrollment_id != "")
      {
        $qry=$mysqli->query("select * from admsn_frm join anx_2 on admsn_frm.anx_id = anx_2.anx_id join course on anx_2.course_id = course.course_id where enrollment_id='$enrollment_id'");
      }
        if ($qry->num_rows > 0)
          {
            while($row=$qry->fetch_array())
            {
              $candidate_name = $row['name'];
              $student_id = $row['id'];
              //enrollment_apply_date format change
              $enrollment_apply_date = $row['enrollment_apply_date'];
              // $enrollment_apply_date = str_replace('-', '/', $enrollment_apply_date);
              // $enrollment_apply_date = date('d/m/Y', strtotime($enrollment_apply_date));
              
              ?> 
                  <tr>
                    <td><?php echo $sl++; ?></td>
                    <td><?php echo $row['aplc_id']; ?></td>
                    <td><?php echo $row['enrollment_id']; ?></td>
                    <td><?php echo $candidate_name; ?></td>
                    <td><?php echo $enrollment_apply_date; ?></td>
                    <td><?php echo $row['course_name']; ?></td>
                    <td class="text-center"><?php echo "<a href='candidate-all-details.php?id=$student_id'  target='_blank'><i class='fas fa-arrow-circle-right text-info'></i></a>"; ?></td>
                  </tr>
            <?php }
          }else
            {
              // echo "No data found";
            }
    }
  }
  elseif ($role == "client") {
    if (empty($name || $course_name || $gender || $aplc_id || $enrollment_id || $end_date || $start_date)) {
      echo "<script type='text/javascript'>alert('Form is empty!');</script>";
      }else {
    if ($name != "" || $course_name != "" || $gender != "" || $aplc_id != "") {
      $qry=$mysqli->query("select * from admsn_frm join anx_2 on admsn_frm.anx_id = anx_2.anx_id join course on anx_2.course_id = course.course_id where name='$name' and admsn_frm.u_id='$u_id' or aplc_id='$aplc_id' and admsn_frm.u_id='$u_id' or gender='$gender' and admsn_frm.u_id='$u_id' or anx_2.course_id='$course_name' and admsn_frm.u_id='$u_id'");
    }elseif ($end_date != "" || $start_date != "") {
    $qry=$mysqli->query("select * from admsn_frm join anx_2 on admsn_frm.anx_id = anx_2.anx_id join course on anx_2.course_id = course.course_id where form_date between '$start_date' and '$end_date' and admsn_frm.u_id='$u_id'");
    }elseif ($enrollment_id != "")  {
      $qry=$mysqli->query("select * from admsn_frm join anx_2 on admsn_frm.anx_id = anx_2.anx_id join course on anx_2.course_id = course.course_id  where enrollment_id='$enrollment_id' and u_id='$u_id'");
    }
    if ($qry->num_rows > 0)
          {
            while($row=$qry->fetch_array())
            {
              $candidate_name = $row['name'];
              $student_id = $row['id'];
              $enrollment_apply_date = $row['enrollment_apply_date'];
              ?> 
                  <tr>
                    <td><?php echo $sl++; ?></td>
                    <td><?php echo $row['aplc_id']; ?></td>
                    <td><?php echo $row['enrollment_id']; ?></td>
                    <td><?php echo $candidate_name; ?></td>
                    <td><?php echo $row['enrollment_apply_date']; ?></td>
                    <td><?php echo $row['course_name']; ?></td>
                    <td class="text-center"><?php echo "<a href='candidate-all-details.php?id=$student_id'  target='_blank'><i class='fas fa-arrow-circle-right text-info'></i></a>"; ?></td>
                  </tr>
            <?php }
            }else{
              // echo "No data found";
            }
            }
          }
        }

  ?>
</tbody>

</table>
</div>
</div>
</div>
</div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  include('../include/footer.php');
  ?>
  <script type="text/javascript">
    $('#reservation').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        }
    })
    $('#reservation').val("")
  </script>
   <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": true, 
      "autoWidth": false, 
      "order": [[0, "asc"]],
      "ordering": true, 
      "buttons": ["colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  })
</script>