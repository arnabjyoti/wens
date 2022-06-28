  <?php 
  $title = "Fee Payment";
  include('../include/header.php');

$student_id=$_GET['id'];
//fetch data of candidate
 $qry=$mysqli->query("select * from admsn_frm join anx_2 on admsn_frm.anx_id = anx_2.anx_id join course on anx_2.course_id = course.course_id where u_id='$u_id' and id='$student_id'");
    while($row11=$qry->fetch_array())
    {
      $course_name = $row11['course_name'];
      $aplc_id = $row11['aplc_id'];
      $enrollment_id = $row11['enrollment_id'];
      $fee = $row11['fee'];
      $discount = $row11['discount'];
      if ($discount>0) {
        $price = $fee-($fee*($discount/100));
      }
      else {
        $price = $fee;
      }
    }
    $total = 0;
    $qry3=$mysqli->query("select * from fee_collect where u_id='$u_id' and student_id='$student_id'");
    if ($qry3->num_rows > 0)
    {
       while($row1=$qry3->fetch_array())
      {
       $amount1 = $row1['amount'];
       $t_paid = $row1['total_paid'];
      $total = $total+$amount1;
      }
        $due = $price-$total;
    }
    else
    {
      $due = $price;
    }
    //candidate serial no
    $inv=0;
    $k=0;
    $q=$mysqli->query("select invoice_no from fee_collect where u_id='$u_id'");
    while($r=$q->fetch_array())
    {
      $inv=$r['invoice_no'];
    }
    //split & increament ***/ENR/*
    $j = preg_split("#/#", $inv);
    if(isset($j[2])) {
      $k = "$j[2]";
      $k++;
    }
    else {
        $k = 1;
    }
    //split character & integer from user name
    preg_match_all("/[A-Z]+|\d+/", $user_name, $matches1);
    $n1 = $matches1[0][1];
    $invoice_no = $n1."/STINV/".$k;


  if (isset($_POST['submit'])) {

      $amount = $_POST['amount'];

      $total_paid = $t_paid+$amount;
      $due1 = $due-$amount;

      if ($amount <= $due) {
      $query = $mysqli->query("insert into fee_collect(amount, invoice_no, u_id, student_id, due, total_paid) values('$amount', '$invoice_no', '$u_id', '$student_id', '$due1', '$total_paid')");
        if($query )
        {
          if ($due == $amount) {
           $qry=$mysqli->query("update admsn_frm set fee_status='Paid' where id='$student_id' and u_id='$u_id'");
                if($qry)
                  {
                    header('location:student-invoice.php?id='.$invoice_no);
                  }else{
                      echo $mysqli->error;
                  }}
                  else{
                     header('location:student-invoice.php?id='.$invoice_no);
                  }
        }else
        {
            echo $mysqli->error;
        }        
    }
    else{
      echo "<script type='text/javascript'>alert('No pending due');</script>";
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
                <a href="fee-collect.php" class="nav-link active">
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
            <h1>Fee Receipt</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="fee-collect.php">Fee Collect</a></li>
              <li class="breadcrumb-item active">Fee Receipt</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <form action="" method="POST">
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong><?php echo $user_name; ?></strong><br>
                    <?php echo $row['address']; ?><br>
                    <?php echo $row['center_location']; ?><br>
                    Phone: <?php echo $row['contact_no']; ?><br>
                    Email: <?php echo $row['email']; ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <?php
                      include('../include/connection.php');
                      $qry1=$mysqli->query("select * from admsn_frm where u_id='$u_id' and id='$student_id' order by admsn_frm.name asc");
                      while($row1=$qry1->fetch_array()){
                        $pr_address = $row1['pr_address'];
                        $pr_district = $row1['pr_district'];
                        $pr_state = $row1['pr_state'];
                        $pr_pin = $row1['pr_pin'];
                        $name = $row1['name'];
                        ?>
                  <address>
                    <strong><?php echo $name; ?></strong><br>
                    <?php echo $pr_address; ?><br>
                    <?php echo "District: ".$pr_district; ?><br>
                    <?php echo "State: ".$pr_state; ?><br>
                    <?php echo "Pin: ".$pr_pin; ?>
                  </address>
                <?php } ?>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Course Name: <?php echo $course_name; ?></b><br>
                  <br>
                  <b>Application No.:</b> <?php echo $aplc_id; ?><br>
                  <b>Total Fee:</b> <?php echo $price; ?> ₹<br>
                  <b>Due:</b> 
                  <?php echo $due; ?> ₹
                       <br>
                </div>
                <!-- /.col -->
              </div>
              <hr>
              <!-- /.row -->
              <?php if ($due != 0) { ?>
              <div class="row">
                <div class="col-sm-8"></div>
                <div class="col-sm-4">
                  <form method="post" action="">
                    <div class="form-group col-md-12">
                  <label class="required">Amount:</label>
                  <input type="number" name="amount" class="form-control" min="0" max="<?php echo $due; ?>" required="required">
                  </div>
                  <button type="submit" name="submit" value="submit" class="btn btn-success float-right"><i class="fas fa-check"></i> Submit
                  </button>
                  </form>
                  
                </div>
                <!-- /.col -->
              </div>
            <?php } ?>
              <!-- /.row -->
              <br>
              
              <!-- /.row -->
            </div>
              </form>
            <!-- /.invoice -->
            <!-- /.row -->
        <div class="row">
          <div class="col-12">
          <div class="card">
            <div class="card-header bg-light">
              <h5><b>Fee Collection History</b></h5>
            </div>
            <div class="card-body">
            <div class="row">
            <?php
            $qry1=$mysqli->query("select * from fee_collect join admsn_frm on fee_collect.student_id = admsn_frm.id where student_id='$student_id' and fee_collect.u_id='$u_id'");
            if ($qry1->num_rows > 0)
          {
                  while($row=$qry1->fetch_array()){
                    $fee_id = $row['fee_id'];
                    $invoice_no = $row['invoice_no'];
                    $amount = $row['amount'];
                    $fee_date_time = $row['fee_date_time'];
                    $fee_date_time = str_replace('/', '-', $fee_date_time);
                    $fee_date_time = date('d/m/Y', strtotime($fee_date_time));
            ?>
            <div class="col-sm-3">
              <a href="student-invoice.php?id=<?php echo $invoice_no; ?>">
                <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $invoice_no; ?></h3>
                <p><?php echo $fee_date_time; ?>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<b><?php echo $amount; ?> ₹</b></p>
              </div>
              <div class="icon">
                <i class="fas fa-receipt"></i>
              </div>
            </div>
          </a>
            </div>
          <?php }
          }else{
            echo "Payment has not been made yet";
          } ?>
        </div>
      </div>
          </div>
        </div>
      </div>
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
    $('#p-date').datetimepicker({
         format: 'DD/MM/YYYY'
    });
  })
</script>