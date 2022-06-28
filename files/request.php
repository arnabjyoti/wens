  <?php 
  $title = "Request";
  include('../include/header.php');

  if(isset($_POST['submit']))
  {
    $percent = $_POST['percent'];
    $start = $_POST['start'];
    //conver date into database format
    $start = str_replace('/', '-', $start);
    $start = date('Y-m-d', strtotime($start));
    
    $date = $_POST['end'];
    //conver date into database format
    $end = str_replace('/', '-', $date);
    $end = date('Y-m-d', strtotime($end));


    $query = $mysqli->query("insert into discount (percent, start, end, discount_status, u_id) values('$percent', '$start', '$end', 'Pending', '$u_id')");
     if($query){
              header('location:request.php');
        }else{
            echo $mysqli->error;
      }
  }
  if(isset($_POST['apply'])){
    $anx2_request = 1;
    $qry3 = $mysqli->query("update admin set anx2_request='$anx2_request' where u_id='$u_id'");
    if ($qry3){
      header('location:request.php');
    }else{
            echo $mysqli->error;
      }
  }
  if(isset($_POST['cancel'])){
    $anx2_request = 0;
    $qry3 = $mysqli->query("update admin set anx2_request='$anx2_request' where u_id='$u_id'");
    if ($qry3){
      header('location:request.php');
    }else{
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
                <a href="anexureII.php" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Anexure-II</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="request.php" class="nav-link active">
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Request</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Request</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
    
  <br>
  <div class="card">
  <div class="card-header bg-light">
   <h5><b>Request for Update Anexure II</b></h5>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-5">
        Apply request for Anexure II data update:
      </div>
        <?php 
        $qry4 = $mysqli->query("select anx2_request from admin where u_id='$u_id'");
      if ($qry4->num_rows > 0) {
      while($row4=$qry4->fetch_array()){
      $anx2_request_status = $row4['anx2_request'];
      }
      if ($anx2_request_status == 0) {
       ?>
      <div class="col-sm-5">
        <form method="post" action="">
        <button class="btn btn-sm btn-success" type="submit" value="submit" name="apply">Apply</button>
      </form>
      </div>
    <?php }else{ ?>
      <div class="col-sm-1">
        <b>Applied</b>
      </div>
      <div class="col-sm-3">
      <form method="post" action="">
        <button class="btn btn-sm btn-danger" type="submit" value="submit" name="cancel">Cancel</button>
      </form>
    </div>
    <?php } }?>
    </div>
      </div>
  </div>
<?php
      include('../include/connection.php');
      $date_today = date("Y-m-d");
      $qry2=$mysqli->query("select * from discount join admin on discount.u_id = admin.u_id where discount.u_id='$u_id'");
      if ($qry2->num_rows > 0) {
      while($row=$qry2->fetch_array()){
        $discount_id = $row['discount_id'];
        $start = $row['start'];
        $end = $row['end'];
        $percent = $row['percent'];
        $status = $row['discount_status'];

        //start format change
        $start1 = str_replace('-', '/', $start);
        $start1 = date('d/m/Y', strtotime($start1));
        //end1 format change
        $end1 = str_replace('-', '/', $end);
        $end1 = date('d/m/Y', strtotime($end1));

        if ($end < $date_today) {
         $qry=$mysqli->query("delete from discount where discount_id='$discount_id' and u_id='$u_id'");
        }
        else{
       ?>
       <div class="card">
  <div class="card-header bg-light">
   <h5><b>Request for course fee discount</b></h5>
  </div>
  <div class="card-body">
      <table id="example1" class="table table-bordered text-center table-striped">
          <thead>
          <tr>
            <th>Start Date</th>
            <th>End Date</th>
             <th>Discount (%)</th>
             <th>Status</th>
          </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $start1;?></td>
              <td><?php echo $end1; ?></td>
              <td><?php echo $percent; ?></td>
              <td><?php echo $status; ?></td>
            </tr>
             </tbody>
        </table>
      </div>
    </div>
    <?php } } }
    else{ ?>
      <form action="" method="post">       
<div class="card">
  <div class="card-header bg-light">
   <h5><b>Request for course fee discount</b></h5>
  </div>
  <div class="card-body">
    <div class="form-row">
    <div class="col-sm-3">
      <label class="required">Discount(%)</label>
      <input type="number" name="percent" class="form-control" placeholder="%" required="required">
    </div>
    <div class="col-sm-3">
      <label for="start" class="required">Start Date</label>
      <div class=" input-group date" id="start" data-target-input="nearest">
      <input type="text" name="start" required="required" class="form-control datetimepicker-input" placeholder="Start Date" data-target="#start"/>
        <div class="input-group-append" data-target="#start" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
      </div>
  </div>
  <div class="col-sm-3">
      <label for="end" class="required">End Date</label>
      <div class=" input-group date" id="end" data-target-input="nearest">
      <input type="text" name="end" required="required" class="form-control datetimepicker-input" placeholder="End Date" data-target="#end"/>
        <div class="input-group-append" data-target="#end" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
      </div>
    </div>
      <div class="col-sm-3">
        <label class="pt-3"></label>
      <button class="btn btn-success btn-block" type="submit" value="submit" name="submit">Submit</button>
    </div>
  </div>
  </div>
  </div>
</form> 
    <?php } ?>

            
          </div><!-- /.col -->
        </div><!-- /.row -->
        
      </div><!-- /.container-fluid -->
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
    //Date picker
    $('#start').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    $('#end').datetimepicker({
        format: 'DD/MM/YYYY'
    });
  })
</script>