  <?php 
  $title = "Add Study Center";
  include('../include/header.php');
  //Center serial no
  //   $center_id=0;
  //   $k=0;
  //   $q=$mysqli->query("select user_name from admin");
  //   while($r=$q->fetch_array())
  //   {
  //     $center_id=$r['user_name'];
  //   }
  //   //split character & integer from user name
  //   preg_match_all("/[A-Z]+|\d+/", $center_id, $matches1);
  //   if(isset($matches1[0][1])) {
  //   $n1 = $matches1[0][1];
  //   $n1++;
  // }else{
  //   $n1 = 1;
  // }
  //   $a = str_pad($n1,3,"0",STR_PAD_LEFT);
  //   $c_id = "CC".$a;
 
  if(isset($_POST['submit'])){
  //get form data
  $contact_no = $mysqli->real_escape_string($_POST['contact_no']);
  $user_name = $mysqli->real_escape_string($_POST['user_name']);
  $center_location = $mysqli->real_escape_string($_POST['center_location']);
  $center_owner = $mysqli->real_escape_string($_POST['center_owner']);
  $address = $mysqli->real_escape_string($_POST['address']);
  $user_password  = $mysqli->real_escape_string($_POST['user_password']);
  $email  = $mysqli->real_escape_string($_POST['email']);
  $est_date  = $mysqli->real_escape_string($_POST['est_date']);
  //conver date into database format
  $est_date = str_replace('/', '-', $est_date);
  $date = date('Y-m-d', strtotime($est_date));
  
  $user_password = md5($user_password);
  // query the database
  $resultSet = $mysqli->query("insert into admin (user_status, email, est_date, role, password, contact_no, user_name, center_location, center_owner, address, anx_2_status) values('1', '$email', '$date', 'client', '$user_password', '$contact_no', '$user_name', '$center_location', '$center_owner','$address','0')");
  if($resultSet)
     {
       header('location:add_center.php');
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
  $u_id  = $mysqli->real_escape_string($_POST['u_id']);
  $center_location = $mysqli->real_escape_string($_POST['center_location']);
  $center_owner = $mysqli->real_escape_string($_POST['center_owner']);
  $address = $mysqli->real_escape_string($_POST['address']);
  $user_status = $mysqli->real_escape_string($_POST['user_status']);
  
  // query the database
  $resultSet = $mysqli->query("update admin set user_status='$user_status', center_location='$center_location', center_owner='$center_owner', address='$address' where u_id='$u_id'");
  if($resultSet)
     {
        header('location:add_center.php');
     }
   else
     {
        echo $mysqli->mysqli_error();
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
            <h1 class="m-0">Add Study Center</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="deshboard.php">Home</a></li>
              <li class="breadcrumb-item active">Add Center</li>
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
                <i class="fas fa-plus"></i> Add Study Center
              </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Study Center</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                  <form action="" method="POST">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Center Code:</label>
                  <div class="col-sm-8">
                <input type="text" name="user_name" class="form-control" placeholder="Center Code:">
    </div>
  </div>

  <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Contact No.:</label>
    <div class="col-sm-8">
  <input type="number" class="form-control" name="contact_no" required="required" placeholder="Contact No.">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Email ID:</label>
    <div class="col-sm-8">
  <input type="email" class="form-control" name="email" required="required" placeholder="Email Id">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Establish Date:</label>
    <div class="col-sm-8 input-group date" id="establishDate" data-target-input="nearest">
      <input type="text" name="est_date" required="required" class="form-control datetimepicker-input" placeholder="Date of Establishment" data-target="#establishDate"/>
        <div class="input-group-append" data-target="#establishDate" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
      </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Center Location:</label>
    <div class="col-sm-8">
  <input type="text" class="form-control" name="center_location" required="required" placeholder="Center Location">
    </div>
  </div>
   <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Center Owner:</label>
    <div class="col-sm-8">
  <input type="text" class="form-control" name="center_owner" required="required" placeholder="Center Owner">
    </div>
  </div>
   <div class="form-group row">
    <label class="col-sm-4 col-form-label">Center Address Line:</label>
    <div class="col-sm-8">
  <input type="text" class="form-control" name="address" required="required" placeholder="Center Address Line">
    </div>
  </div>
   <div class="form-group row">
    <label class="col-sm-4 col-form-label">Password:</label>
    <div class="col-sm-8">
  <input type="password" class="form-control" name="user_password" required="required" placeholder="Password">
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
                <table id="example1" class="table table-bordered table-striped text-center">
                  <thead>
                    <tr>
                      <th>Sl.</th>
                      <th>Center Code</th>
                      <th>Owner Name</th>
                      <th>Center Location</th>
                      <th>Status</th>
                      <th>Details</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php
                    $sl = 1;
                      include('../include/connection.php');
                      $qry2=$mysqli->query("select * from admin where role='client'");
                      while($row=$qry2->fetch_array()){
                        $c_u_id = $row['u_id'];
                    ?>
                    <tr>
                      <td>
                        <?php echo $sl++; ?>
                      </td>
                      <td>
                        <?php echo $row['user_name']; ?>
                      </td>
                      <td>
                        <?php echo $row['center_owner']; ?>
                      </td>
                      <td>
                        <?php echo $row['center_location']; ?>
                      </td>
                      <td>
                          <?php 
                          if ($row['user_status'] == 0) {
                            echo "Suspended";
                          }
                          elseif ($row['user_status'] == 1) {
                            echo "Active";
                          }
                          ?>
                      </td>
                      <td>
                        <a href="study-center-details.php?id=<?php echo $c_u_id; ?>"target="_blank"><i class="fas fa-info-circle text-primary"></i></a>
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
    $('#establishDate').datetimepicker({
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