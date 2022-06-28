  <?php 
  $title = "Enrollment";
  include('../include/header.php');
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
                <a href="enrollment.php" class="nav-link active">
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
            <h1 class="m-0">Enrollment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Enrollment</li>
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
              <button type="button" class="btn btn-primary" onclick="window.location.href='new-enrollment.php'">
                <i class="fas fa-plus"></i> New Enrollment
              </button>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <br>
    <!-- /.content -->
    

    <!-- Main content -->
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
                    <th>sl.</th>
                    <th>App. No.</th>
                    <th>Enrl. No.</th>
                    <th>Student Name</th>
                    <th>Course</th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sl = 1;
                      include('../include/connection.php');
                      $qry2=$mysqli->query("select * from admsn_frm join anx_2 on admsn_frm.anx_id = anx_2.anx_id join course on anx_2.course_id = course.course_id where u_id='$u_id' order by admsn_frm.id desc");
                      while($row=$qry2->fetch_array()){
                        $student_id = $row['id'];
                        $enrollment_id = $row['enrollment_id'];
                        $discount = $row['discount'];
                    ?> 
                  <tr>
                    <td><?php echo $sl++; ?></td>
                    <td><?php echo $row['aplc_id']; ?></td>
                    <td class="text-center">
                      <?php if (empty($enrollment_id)) {
                        echo $enrollment_id;
                      }elseif ($enrollment_id == "Applied"){
                        echo "";
                      }else{
                        echo $enrollment_id;
                      } ?>
                    </td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['course_name']; ?></td>
                    <td>
                      <?php echo $row['course_fee']; ?> ₹
                      <?php if ($discount > 0) {
                        echo "<p class='p-0 m-0 text-success'><small>$discount% Off</small></p>";
                      } ?>
                    </td>
                    <td class="text-center">
                      <?php if (empty($enrollment_id)) {
                        echo "<a href='candidate-edit.php?id=$student_id' target='_blank'><i class='fas fa-edit text-orange'></i></a> &nbsp;&nbsp;";
                        echo "<a href='request-enrollment.php?id=$student_id'><i class='fas fa-paper-plane text-indigo'></i></a>";
                      }elseif ($enrollment_id == "Applied"){
                        echo "<a href='candidate-edit.php?id=$student_id' target='_blank'><i class='fas fa-edit text-orange'></i></a> &nbsp;&nbsp;";
                        echo "<i class='fas fa-check-circle text-success'></i>";
                      }
                      else{
                        echo "<a href='candidate-details.php?id=$student_id'><i class='fas fa-info-circle text-dark'></i></a>";
                      } ?>
                    </td>
                  </tr>
                  <?php } ?>
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