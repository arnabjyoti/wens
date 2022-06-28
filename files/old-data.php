  <?php 
  $title = "Old Data";
  include('../include/header.php');
 
  if(isset($_POST['submit'])){
  //get form data
  $certificate_no = $mysqli->real_escape_string($_POST['certificate_no']);
  $student_name = $mysqli->real_escape_string($_POST['student_name']);
  $roll_no = $mysqli->real_escape_string($_POST['roll_no']);
  $course = $mysqli->real_escape_string($_POST['course']);
  $score  = $mysqli->real_escape_string($_POST['score']);
  $center  = $mysqli->real_escape_string($_POST['center']);
  $date_issue1 = $mysqli->real_escape_string($_POST['date_issue']);
  //conver date into database format
  $date_issue1 = str_replace('/', '-', $date_issue1);
  $date_issue1 = date('Y-m-d', strtotime($date_issue1));

  $qry = $mysqli->query("select certificate_no from old_data where certificate_no='$certificate_no'");
      if ($qry->num_rows > 0)
      {
        print "<script type='text/javascript'>alert('Certificate No. is exist. Please enter an unique Certificate No.');</script>";
      }else{
  // query the database
  $resultSet = $mysqli->query("insert into old_data (center, score, certificate_no, student_name, roll_no, date_issue, course) values('$center', '$score', '$certificate_no', '$student_name', '$roll_no', '$date_issue1','$course')");
  if($resultSet)
     {
       header('location:old-data.php');
     }
   else
     {
        echo $mysqli->error;
     }
   }
}
if(isset($_POST['update'])){
  //get form data
  $old_data_id = $mysqli->real_escape_string($_POST['old_data_id']);
  $certificate_no = $mysqli->real_escape_string($_POST['certificate_no']);
  $student_name = $mysqli->real_escape_string($_POST['student_name']);
  $roll_no = $mysqli->real_escape_string($_POST['roll_no']);
  $course = $mysqli->real_escape_string($_POST['course']);
  $score  = $mysqli->real_escape_string($_POST['score']);
  $center  = $mysqli->real_escape_string($_POST['center']);
  $date_issue2 = $mysqli->real_escape_string($_POST['date_update']);
  //conver date into database format
  $date_issue2 = str_replace('/', '-', $date_issue2);
  $date_issue2 = date('Y-m-d', strtotime($date_issue2));
  
  // query the database
  $resultSet = $mysqli->query("update old_data set certificate_no='$certificate_no', student_name='$student_name', roll_no='$roll_no', course='$course', score='$score', center='$center', date_issue='$date_issue2' where old_data_id='$old_data_id'");
  if($resultSet)
     {
        header('location:old-data.php');
     }
   else
     {
        echo $mysqli->error;
     }
}
if(isset($_POST['delete'])){
  $old_data_id = $mysqli->real_escape_string($_POST['old_data_id']);
  $qry=$mysqli->query("delete from old_data where old_data_id='$old_data_id'");
    if($qry)
    {
        header('location:old-data.php');
     }
   else
     {
        echo $mysqli->error;
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
                <a href="enquiry.php" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Enquiry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="old-data.php" class="nav-link active">
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
            <h1 class="m-0">Add Old Data</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="deshboard.php">Home</a></li>
              <li class="breadcrumb-item active">Old Data</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php 
if ($role == "admin") {
  ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-plus"></i> Add Old Data
              </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Old Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                  <form action="" method="POST">

  <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Certificate No.:</label>
    <div class="col-sm-8">
  <input type="text" class="form-control" name="certificate_no" required="required" placeholder="Certificate No.">
    </div>
  </div>
   <div class="form-group row">
     <label class="col-sm-4 col-form-label">Name of Student:</label>
     <div class="col-sm-8">
  <input type="text" name="student_name" class="form-control" placeholder="Name of Student">
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Roll. No.:</label>
    <div class="col-sm-8">
  <input type="text" class="form-control" name="roll_no" required="required" placeholder="Roll. No.">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Date of Issue:</label>
    <div class="col-sm-8 input-group date" id="date_issue" data-target-input="nearest">
      <input type="text" name="date_issue" required="required" class="form-control datetimepicker-input" placeholder="Date of Issue" data-target="#date_issue"/>
        <div class="input-group-append" data-target="#date_issue" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
      </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Course:</label>
    <div class="col-sm-8">
  <select name="course" class="form-control" required="required">
          <option></option>
            <?php
            $qry1=$mysqli->query("select * from course");
            while($row1=$qry1->fetch_array()){
            ?>
        <option value="<?php echo $row1['course_id']; ?>"><?php echo $row1['course_name']; ?></option>
            <?php } ?>
      </select>
    </div>
  </div>
   <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Score:</label>
    <div class="col-sm-8">
  <input type="number" class="form-control" name="score" required="required" placeholder="Score">
    </div>
  </div>
   <div class="form-group row">
    <label class="col-sm-4 col-form-label">Study Center Details:</label>
    <div class="col-sm-8">
  <select name="center" class="form-control" required="required">
          <option></option>
            <?php
            $qry2=$mysqli->query("select * from admin where role='client'");
            while($row2=$qry2->fetch_array()){
            ?>
        <option value="<?php echo $row2['u_id']; ?>"><?php echo $row2['user_name']; ?></option>
            <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-12">
      <button type="submit" name="submit" class="btn float-right btn-primary">Sumbit</button>
    </div>
  </div>
</form>
    </div>
    </div>
  </div>
  </div>
</div>
</div>
  <br>
        <!-- Main row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
         <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table h6 small table-bordered table-striped text-center">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Certificate No.</th>
                      <th>Student Name</th>
                      <th>Roll No.</th>
                      <th>Date of Issue</th>
                      <th>Course Name</th>
                      <th>Score(%)</th>
                      <th>Study Center Details</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php
                    $sl = 1;
                      include('../include/connection.php');
                      $qry3=$mysqli->query("select * from old_data join admin on old_data.center = admin.u_id join course on old_data.course = course.course_id");
                      while($row3=$qry3->fetch_array()){
                        $old_data_id = $row3['old_data_id'];
                        $center_location = $row3['center_location'];
                        $user_name = $row3['user_name'];
                        //split character & integer from user name
                        preg_match_all("/[A-Z]+|\d+/", $user_name, $matches1);
                        $n1 = $matches1[0][1];
                        //date_issue format change
                        $date_issue = $row3['date_issue'];
                        $date_issue = str_replace('-', '/', $date_issue);
                        $date_issue = date('d/m/Y', strtotime($date_issue));

                    ?>
                    <tr>
                      <td>
                        <?php echo $sl++; ?>
                      </td>
                      <td>
                        <?php echo $row3['certificate_no']; ?>
                      </td>
                      <td>
                        <?php echo $row3['student_name']; ?>
                      </td>
                      <td>
                        <?php echo $row3['roll_no']; ?>
                      </td>
                      <td>
                        <?php echo $date_issue; ?>
                      </td>
                      <td>
                        <?php echo $row3['course_name']; ?>
                      </td>
                      <td>
                        <?php echo $row3['score']; ?>
                      </td>
                      <td>
                        <?php echo $user_name; ?>
                        <!-- <?php echo $center_location; ?>
                        <p>(Center: 
                          <?php echo $n1; ?>
                        )</p> -->
                      </td>
                      <td>
                        <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#m<?php echo $old_data_id; ?>"><i class="fas fa-edit text-info"></i></button>
                      <!-- Modal -->
                      <div class="modal fade" id="m<?php echo $old_data_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Old Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body text-left h6">
                    
                  <form action="" method="POST">

                    <div class="form-group row">
                      <label  class="col-sm-4 col-form-label">Certificate No.:</label>
                      <div class="col-sm-8">
                        <input type="hidden" name="old_data_id" value="<?php echo $row3['old_data_id']; ?>">
                    <input type="text" class="form-control" name="certificate_no" required="required" value="<?php echo $row3['certificate_no']; ?>">
                      </div>
                    </div>
                     <div class="form-group row">
                       <label class="col-sm-4 col-form-label">Name of Student:</label>
                       <div class="col-sm-8">
                    <input type="text" name="student_name" class="form-control" value="<?php echo $row3['student_name']; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-sm-4 col-form-label">Roll. No.:</label>
                      <div class="col-sm-8">
                    <input type="text" class="form-control" name="roll_no" value="<?php echo $row3['roll_no']; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Date of Issue:</label>
                      <div class="col-sm-8 input-group date dateUpdate" data-target-input="nearest">
                        <input type="text" name="date_update" required="required" class="form-control datetimepicker-input" value="<?php echo $date_issue; ?>" data-target=".dateUpdate"/>
                          <div class="input-group-append" data-target=".dateUpdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Course:</label>
                      <div class="col-sm-8">
                    <select name="course" class="form-control" required="required">
                            <option value="<?php echo $row3['course_id']; ?>"><?php echo $row3['course_name']; ?></option>
                              <?php
                              $qry4=$mysqli->query("select * from course");
                              while($row4=$qry4->fetch_array()){
                              ?>
                          <option value="<?php echo $row4['course_id']; ?>"><?php echo $row4['course_name']; ?></option>
                              <?php } ?>
                        </select>
                      </div>
                    </div>
                     <div class="form-group row">
                      <label  class="col-sm-4 col-form-label">Score:</label>
                      <div class="col-sm-8">
                    <input type="number" class="form-control" name="score" required="required" value="<?php echo $row3['score']; ?>">
                      </div>
                    </div>
                     <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Study Center Details:</label>
                      <div class="col-sm-8">
                    <select name="center" class="form-control" required="required">
                            <option value="<?php echo $row3['u_id']; ?>"><?php echo $row3['user_name']; ?></option>
                              <?php
                              $qry5=$mysqli->query("select * from admin where role='client'");
                              while($row5=$qry5->fetch_array()){
                              ?>
                          <option value="<?php echo $row5['u_id']; ?>"><?php echo $row5['user_name']; ?></option>
                              <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <button type="submit" name="delete" class="btn"><i class="fas fa-trash fa-2x text-danger"></i></button>
                      </div>
                      <div class="col-sm-6">
                        <button type="submit" name="update" class="btn float-right btn-primary">Update</button>
                      </div>
                    </div>
                  </form>
                      </div>
                      </div>
                    </div>
                    </div>
                    <!-- modal -->

                      </td>
                    </tr>
                  <?php } ?>
                
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <?php 
    }else{ 
      echo "<script type='text/javascript'>alert('You are not authorized to access.');
    window.location.href='dashboard.php';</script>";
    }?>
  </div>
  <!-- /.content-wrapper -->
  <?php
  include('../include/footer.php');
  ?>
  <script>
  $(function () {
    //Date picker
    $('#date_issue').datetimepicker({
        format: 'DD/MM/YYYY'
    });
  })
</script>
<script>
  $(function () {
    //Date picker
    $('.dateUpdate').datetimepicker({
        format: 'DD/MM/YYYY'
    });
  })
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": true, 
      "autoWidth": false, 
      "order": [[0, "asc"]],
      "ordering": true,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  })
</script>