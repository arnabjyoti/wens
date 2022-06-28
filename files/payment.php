  <?php 
  $title = "Payment";
  include('../include/header.php');

      //candidate serial no
    $inv=0;
    $k=0;
    $q=$mysqli->query("select invoice_no from payment where u_id='$u_id'");
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
    $invoice_no = $n1."/INV/".$k;


  if (isset($_POST['submit_form'])) {

      $tax = $_POST['tax'];
      $shipping = $_POST['shipping'];
      $payment_mode = $_POST['payment_mode'];
      $transaction_id = $_POST['transaction_id'];
      $total_amount = $_POST['total_amount'];
      $p_date = $_POST['p-date'];
      //conver date into database format
      $p_date = str_replace('/', '-', $p_date);
      $p_date = date('Y-m-d', strtotime($p_date));

    foreach ($_POST['student_id'] as $i => $value) {
      $student_id = $_POST['student_id'][$i];
      $fee = $_POST['sell_price'][$i];
      $cart_id = $_POST['cart_id'][$i];
      
      $query = $mysqli->query("insert into payment(student_id, invoice_no, payment_fee, tax, shipping, payment_mode, transaction_id, status, u_id, total_amount, payment_date_time) values('$student_id', '$invoice_no', '$fee', '$tax', '$shipping', '$payment_mode', '$transaction_id', 'Pending', '$u_id', '$total_amount', '$p_date')");
        if($query )
        {
              $qry=$mysqli->query("delete from cart where cart_id='$cart_id' and u_id='$u_id'");
                if($qry)
                  {
                    header('location:certificate-request.php');
                  }else{
                      echo $mysqli->error;
                  }
        }else
        {
            echo $mysqli->error;
        }        
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="certificate-request.php">Certificate Request</a></li>
              <li class="breadcrumb-item active">Payment</li>
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
                  <address>
                    <strong><?php echo $user_name; ?></strong><br>
                    <?php echo $row['address']; ?><br>
                    <?php echo $row['center_location']; ?><br>
                    Phone: <?php echo $row['contact_no']; ?><br>
                    Email: <?php echo $row['email']; ?>
                  </address>
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped border text-center">
                    <thead>
                    <tr>
                      <th>Candidate Name</th>
                      <th>Enrollment. No.</th>
                      <th>Course</th>
                      <th>Score</th>
                      <th>Royalty(10%)</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      include('../include/connection.php');
                      $sub_total = 0;
                      $qry2=$mysqli->query("select * from cart join admsn_frm on cart.student_id = admsn_frm.id join anx_2 on admsn_frm.anx_id = anx_2.anx_id join course on anx_2.course_id = course.course_id where cart.u_id='$u_id' order by admsn_frm.name asc");
                      while($row=$qry2->fetch_array()){
                       $student_id = $row['student_id'];
                       $cart_id = $row['cart_id'];
                       $fee = $row['fee'];
                       $discount = $row['discount'];
                       $theory_mark = $row['theory_mark'];
                       $prectical_mark = $row['prectical_mark'];
                       $score = $theory_mark+$prectical_mark;
                       if ($discount>0) {
                          $price = ($fee-($discount/100)*$fee);
                        }
                        else {
                          $price = $fee;
                        }
                       $fee=(10/100)*$price;
                       $sub_total = $sub_total + $fee;

                      ?>
                    <tr> 
                      <input type="hidden" name="cart_id[]" value="<?php echo $cart_id; ?>">
                      <input type="hidden" name="student_id[]" value="<?php echo $row['student_id']; ?>">
                      <input type="hidden" name="sell_price[]" value="<?php echo$fee; ?>">
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['enrollment_id']; ?></td>
                      <td><?php echo $row['course_name']; ?></td>
                      <td><?php echo $score; ?> %</td>
                      <td><?php echo number_format((float)$fee, 2, '.', ''); ?> ₹</td>
                      <td> <?php echo "<a href='delete-cart.php?id=$cart_id'><i class='fas fa-trash-alt text-danger'></i></a>"; ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <br>
              <div class="row">
                <!-- accepted payments column -->
                <div class="col-sm-6">
                  
                  <div class="table-responsive border">
                    <table class="table table-sm table-borderless">
                      <p class="border-bottom p-2"><strong>Bank Details</strong></p>
                      <!-- <tr>
                        <th style="width:40%">Name:</th>
                        <td>ADRP COMPUTER PRIVATE LIMITED</td>
                      </tr>
                      <tr>
                        <th>Account No.:</th>
                        <td>7001050007146</td>
                      </tr>
                      <tr>
                        <th>IFSC:</th>
                        <td>PUNB0RRBAGB</td>
                      </tr>
                      <tr>
                        <th>Bank & Branch Details:</th>
                        <td>ASSAM GRAMIN VIKASH BANK, Dhemaji Branch</td>
                      </tr> -->
                    </table>
                  </div>
                  <br>
                  <div class="table-responsive border">
                    <table class="table table-sm table-borderless">
                      <!-- <tr>
                        <th style="width:40%">Payment QR Code:</th>
                        <td><img src="../dist/img/qr_code/adrpqr.jpeg" alt="paytm QR" class="img-thumbnail"></td>
                      </tr>
                      <tr>
                        <th style="width:40%">UPI ID:</th>
                        <td>8794498141@paytm</td>
                      </tr> -->
                    </table>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                  <div class="table-responsive text-right">
                    <table class="table table-sm">
                      <tr>
                        <th style="width:50%;">Subtotal:</th>
                        <td><?php echo number_format((float)$sub_total, 2, '.', ''); ?> ₹</td>
                      </tr>
                      <tr>
                        <input type="hidden" name="tax" value="18">
                        <th>GST (18%):</th>
                        <td><?php
                        $tax=(18/100)*$sub_total;
                        echo number_format((float)$tax, 2, '.', '');
                        ?> ₹</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td><?php
                        $qry3=$mysqli->query("select count(*) from cart where u_id='$u_id'");
                        $row1=$qry3->fetch_row()[0];
                        if ($row1>4) {
                          $shipping = 0;
                          echo "Free Shipping";
                          echo "<input name='shipping' type='hidden' class='form-control' value='0'>";
                        }else{
                          $shipping = 100;
                          echo "100.00 ₹";
                          echo "<input name='shipping' type='hidden' class='form-control' value='100'>";
                        }
                        ?></td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td><b><?php
                        $total=$sub_total+$tax+$shipping;
                        echo number_format((float)$total, 2, '.', '');
                        ?> ₹</b></td>
                        <input type="hidden" name="total_amount" value="<?php echo $total; ?>">
                      </tr>
                    </table>
                    <P class="m-0"><i>* Please pay the exact amount shown above.</i></P>

                  </div>
                  <br>
                    <div class="form-row">
                  <div class="form-group col-md-12">
                  <label class="required">Payment Method:</label>
                  <select class="form-control" name="payment_mode" required="required" id="myselect">
                    <option></option>
                    <option value="Bank Transfer">Bank Transfer</option>
                    <option value="QR Code">QR Code</option>
                    <option value="UPI ID">UPI ID</option>
                  </select>
                  </div>
                  <div class="form-group col-md-12">
                  <label>Transaction ID</label>
                  <input type="text" class="form-control" required="required" name="transaction_id" placeholder="Transaction Id">
                </div>
                <div class="form-group col-md-12">
                  <label for="p-date" class="required">Payment Date</label>
                  <div class=" input-group date" id="p-date" data-target-input="nearest">
                  <input type="text" name="p-date" required="required" class="form-control datetimepicker-input" placeholder="Payment Date" data-target="#p-date"/>
                    <div class="input-group-append" data-target="#p-date" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
                </div>
                  <button type="submit" name="submit_form" value="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
              </form>
            <!-- /.invoice -->
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