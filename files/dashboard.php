  <?php 
  $title = "Dashboard";
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
          <li class="nav-item menu-open">
            <a href="dashboard.php" class="nav-link active">
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
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
        <!-- Small boxes (Stat box) -->
        <?php if ($role == 'admin') {
          //enrollment request
          $qry=$mysqli->query("select count(*) from admsn_frm where enrollment_id='Applied'");
          $data=$qry->fetch_row()[0];

          //certificate request
          $qry1=$mysqli->query("select count(DISTINCT (invoice_no)) from payment where status='Pending'");
          $data1=$qry1->fetch_row()[0];

          //discount request
          $qry2=$mysqli->query("select count(*) from discount where discount_status='Pending'");
          $data2=$qry2->fetch_row()[0];

          //anexure update request
          $qry3=$mysqli->query("select count(*) from admin where anx2_request='1'");
          $data3=$qry3->fetch_row()[0];

          //no. of study center
          $qry4=$mysqli->query("select count(*) from admin where role='client'");
          $data4=$qry4->fetch_row()[0];

          //no. of student
          $qry5=$mysqli->query("select count(*) from admsn_frm where enrollment_id not in ('','Applied')");
          $data5=$qry5->fetch_row()[0];

          //no. of certificate issued
          $qry6=$mysqli->query("select count(*) from admsn_frm where certificate_no != ''");
          $data6=$qry6->fetch_row()[0];

          $qry7=$mysqli->query("select monthname(form_date) as mname, sum(fee) as total from admsn_frm group by month(form_date)");
        ?>
        <div class="row">
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-lime">
              <div class="inner">
                <h3><?php echo $data; ?></h3>

                <p>Enrollment Request</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="enrollment-request.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $data1; ?></h3>

                <p>Certificate Request</p>
              </div>
              <div class="icon">
                <i class="fas fa-rupee-sign"></i>
              </div>
              <a href="certificate.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $data2; ?></h3>

                <p>Discount Request</p>
              </div>
              <div class="icon">
                <i class="fas fa-percentage"></i>
              </div>
              <a href="discount-request.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-teal">
              <div class="inner">
                <h3><?php echo $data3; ?></h3>

                <p>Anexure II Update Request</p>
              </div>
              <div class="icon">
                <i class="fas fa-copy"></i>
              </div>
              <a href="anexure-update-request.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row text-center">
          <div class="col-4">
            <div class="info-box bg-purple">
              <span class="info-box-icon"><i class="fas fa-school"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Study Center</span>
                <span class="info-box-number number h2"><?php echo $data4; ?></span>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="info-box bg-navy">
              <span class="info-box-icon"><i class="fas fa-graduation-cap"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Student Enrolled</span>
                <span class="info-box-number number h2"><?php echo $data5; ?></span>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="info-box bg-maroon">
              <span class="info-box-icon"><i class="far fa-file-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Certificate Issued</span>
                <span class="info-box-number number h2"><?php echo $data6; ?></span>
              </div>
            </div>
          </div>
      </div><!-- 
      <div class="row">
        <div class="col-12">
        <div id="chart-counter">
          <canvas id="mycanvas"></canvas>
        </div>
      </div>
      </div> -->
        <?php }else{
          //no. of study center
          $qry4=$mysqli->query("select count(*) from admsn_frm where u_id='$u_id'");
          $data4=$qry4->fetch_row()[0];

          //no. of student
          $qry5=$mysqli->query("select count(*) from admsn_frm where enrollment_id not in ('','Applied') and u_id='$u_id'");
          $data5=$qry5->fetch_row()[0];

          //no. of certificate issued
          $qry6=$mysqli->query("select count(*) from admsn_frm where certificate_no != '' and u_id='$u_id'");
          $data6=$qry6->fetch_row()[0];
          ?>
        <!-- Main row -->
        <div class="row text-center">
          <div class="col-4">
            <div class="info-box bg-purple">
              <span class="info-box-icon"><i class="far fa-sticky-note"></i></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Form filled-up</span>
                <span class="info-box-number number h2"><?php echo $data4; ?></span>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="info-box bg-navy">
              <span class="info-box-icon"><i class="fas fa-graduation-cap"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Student Enrolled</span>
                <span class="info-box-number number h2"><?php echo $data5; ?></span>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="info-box bg-maroon">
              <span class="info-box-icon"><i class="far fa-file-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Certificate Issued</span>
                <span class="info-box-number number h2"><?php echo $data6; ?></span>
              </div>
            </div>
          </div>
      </div>
      <?php } ?>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  include('../include/footer.php');
  ?>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
<script>
  $(".number").counterUp({time:300});
</script>
<!-- <script>
  $(document).ready(function(){
    $.ajax({
      url: "http://127.0.0.1/adrp/files/chart-data.php",
      method: "GET",
      success: function(data) {
        console.log(data);
        var month = [];
        var total = [];

        for(var i in data){
          month.push("month " + data[i].monthid);
          total.push(data[i].total);
        }
        var chartdata = {
          labels: month,
          datasets : [
          {
            label : 'month Total',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 0.75)',
            hoverBorderColor: 'rgba(200, 200, 200, 0.75)',
            data: total
          }]
        };
      var ctx = $("#mycanvas");
      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata
      });
    },
      error: function(data) {
        console.log(data);
      }
    });
  });
</script> -->