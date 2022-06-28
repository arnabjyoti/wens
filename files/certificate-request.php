  <?php
  $title = "Certificate Request";
  include('../include/header.php');
  ?> 
  <?php 
  include('../include/connection.php');
  if(isset($_POST['submit']))
  {
    $u_id = $_POST['u_id'];
    $student_id = $_POST['student_id'];
    $theory_mark = $_POST['theory_mark'];
    $prectical_mark = $_POST['prectical_mark'];
    $exam_date = $_POST['exam_date'];
    //conver date into database format
    $exam_date = str_replace('/', '-', $exam_date);
    $exam_date = date('Y-m-d', strtotime($exam_date));

    $u_id = $mysqli->real_escape_string($u_id);
    $student_id = $mysqli->real_escape_string($student_id);
    $prectical_mark = $mysqli->real_escape_string($prectical_mark);
    $theory_mark = $mysqli->real_escape_string($theory_mark);
    $exam_date = $mysqli->real_escape_string($exam_date);
    

    $resultSet = $mysqli->query("update admsn_frm set theory_mark='$theory_mark', prectical_mark='$prectical_mark', exam_date='$exam_date' where u_id='$u_id' and id='$student_id'");
    if($resultSet)
     {
       $query = $mysqli->query("insert into cart (u_id, student_id) values('$u_id', '$student_id')");
        if($query)
        {
          header('location:certificate-request.php');
        }else
        {
          echo $mysqli->error;
        }
     }
   else
     {
        echo $mysqli->error;
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
                <a href="certificate-request.php" class="nav-link active">
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
            <h1 class="m-0">Certificate Request</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Certificate Request</li>
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
              <button type="button" class="btn btn-primary" onclick="window.location.href='payment.php'">
                <i class="far fa-credit-card"></i> Payment
              </button>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <br>
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl.</th>
                    <th>App. No.</th>
                    <th>Enrl. No.</th>
                    <th>Student Name</th>
                    <th>Course</th>
                    <th>Fee</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sl = 1;
                      include('../include/connection.php');
                      $qry2=$mysqli->query("select * from admsn_frm join anx_2 on admsn_frm.anx_id = anx_2.anx_id join course on anx_2.course_id = course.course_id where u_id='$u_id' order by admsn_frm.id desc");
                      while($row=$qry2->fetch_array()){
                        $id = $row['id'];
                        $enrollment_id = $row['enrollment_id'];
                        $discount = $row['discount'];
                        $certificate_no = $row['certificate_no'];
                       if (!empty($enrollment_id) && $enrollment_id != "Applied" && empty($certificate_no)) {
                    ?>
                  <tr>
                    <td><?php echo $sl++; ?></td>
                    <td><?php echo $row['aplc_id']; ?></td>
                    <td><?php echo $enrollment_id; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['course_name']; ?></td>
                    <td><?php echo $row['course_fee']; ?> ₹
                    <?php if ($discount > 0) {
                        echo "<p class='p-0 m-0 text-success'><small>$discount% Off</small></p>";
                      } ?></td>
                    <td>
                      <form action="" method="POST">
                      <input type="hidden" name="student_id" class="student_id" value="<?php echo $row['id']; ?>">
                      <input type="hidden" name="u_id" class="u_id" value="<?php echo $u_id; ?>">
                      <?php
                      include('../include/connection.php');
                      $qry3=$mysqli->query("select * from cart where u_id='$u_id' and student_id = '$id'");
                      if($row1=$qry3->fetch_array()){
                    ?>
                    <div class="text-center text-danger">
                    Proceed to Payment
                  </div>
                  <?php } else {
                    $qry4=$mysqli->query("select * from payment where u_id='$u_id' and student_id = '$id'");
                      if($row2=$qry4->fetch_array()){
                    ?>
                    <button type="button" class="btn text-primary btn-block">
                <i class="far fa-check-circle"></i> Requested
              </button>
                <?php } else{ ?>
                  <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#m<?php echo $id; ?>">Certificate Request</button>
                      <!-- Modal -->
                      <div class="modal fade" id="m<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Student mark & exam date</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                 
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Candidate Name:</label>
                      <div class="col-sm-8">
                    <input type="text" readonly class="form-control" value="<?php echo $row['name']; ?>">
                      </div>
                    </div>
                     <div class="form-group row">
                      <label  class="col-sm-4 col-form-label">Theory mark:</label>
                      <div class="col-sm-8">
                    <input type="number" class="form-control" name="theory_mark" min="0" max="50" required="required">
                      </div>
                    </div>
                     <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Prectical mark:</label>
                      <div class="col-sm-8">
                    <input type="number" class="form-control" name="prectical_mark" min="0" max="50" required="required">
                      </div>
                    </div>
                     <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Exam date:</label>
                      <div class="col-sm-8 input-group date examDate" data-target-input="nearest">
                      <input type="text" name="exam_date" required="required" class="form-control datetimepicker-input" placeholder="Exam Date" data-target=".examDate"/>
                        <div class="input-group-append" data-target=".examDate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <button class="btn btn-success btn-sm btn-block" type="submit" value="submit" name="submit">Certificate Request</button>
                      </div>
                    </div>

                      </div>
                      </div>
                    </div>
                    </div>
                      
                      <?php } } ?>
                    </form>
                    </td>
                  </tr>
                  <?php }} ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
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
 <script>
  $(function () {
    //Date picker
    $('.examDate').datetimepicker({
        format: 'DD/MM/YYYY'
    });
  })
</script>