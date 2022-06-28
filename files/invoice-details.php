  <?php 
  $invoice_id=$_GET['id'];
  $title = "Invoice Details"." ".$invoice_id;

  if (isset($_GET['Message'])) 
    {
    print "<script type='text/javascript'>alert('Payment Status & Certificate No. updated');</script>";
    }

  include('../include/header.php');
  if(isset($_POST['submit'])){

    $p_id = $_POST['p_id'];
    $status = 'Success';
    

    foreach ($p_id as $key => $value) {

    $query = $mysqli->query("update payment set status='$status' where payment_id='".$p_id[$key]."'");
    if($query)
        {
          

          foreach ( $_POST['student_id'] as $i => $j) {
            $student_id = $_POST['student_id'][$i];
            $certificate_no = $_POST['certificate_no'][$i];

            $certificate_date = $_POST['date'][$i];
            //conver date into database format
            $certificate_date = str_replace('/', '-', $certificate_date);
            $certificate_date = date('Y-m-d', strtotime($certificate_date));
            

          $resultSet = $mysqli->query("update admsn_frm set certificate_no='$certificate_no', certificate_date='$certificate_date' where id='$student_id'");
    if($resultSet){
          header("location:invoice-details.php?id=$invoice_id&Message=$certificate_date");
        }else
        {
            echo $mysqli->error;
        } 
        }}else
        {
            echo $mysqli->error;
        } 
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
                <a href="certificate.php" class="nav-link active">
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
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12 text-center">
                  <img src="../dist/img/adr.png" alt="Admin Logo" style="height: 90px;" class="image-fluid">
                </div>
                <div class="col-12 bg-dark" style="height: 5px;">
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <?php
                      include('../include/connection.php');
                      $qry3=$mysqli->query("select * from payment join admin on payment.u_id = admin.u_id where invoice_no='$invoice_id'");
                      while($row3=$qry3->fetch_array()){
                       $date = $row3['payment_date_time'];
                       $date = str_replace('-', '/', $date);
                       $date = date('d/m/Y', strtotime($date));

                       $center_user_name = $row3['user_name'];
                       $center_address = $row3['address'];
                       $center_center_location = $row3['center_location'];
                       $center_contact_no = $row3['contact_no'];
                       $center_email = $row3['email'];
                       $status = $row3['status'];
                       }
                      ?> 
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?php echo $center_user_name; ?></strong><br>
                    <?php echo $center_address; ?><br>
                    <?php echo $center_center_location; ?><br>
                    Phone: <?php echo $center_contact_no; ?><br>
                    Email: <?php echo $center_email; ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>WENS LINK GHUGUHA</strong><br>
                    Ghuguha Gaon Panchayat Office Campus<br>
                    Paschim Dhemaji College Road<br>
                    Near Ghuha Dole, P.O. Ghuguha Dole<br>
                    Dist. Dhemaji Assam. Pin- 787057
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice No.: <?php echo $invoice_id; ?></b><br>
                  <br>
                  <b>Date:</b> <?php echo $date; ?><br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <form method="post" action="" onsubmit="return confirm('Are you sure you want to submit this form?');">
              <div class="row">
                <div class="col-12 ">
                  <table class="table small table-striped border text-center">
                    <thead>
                    <tr>
                      <th>Enrl. No.</th>
                      <th>Candidate Name</th>
                      <th>Course</th>
                      <th>Theory Mark</th>
                      <th>Prectical Mark</th>
                      <th>Exam Date</th>
                      <th>Amount</th>
                      <th>Certificate No.</th>
                      <th>Issue Date</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      include('../include/connection.php');
                      $sub_total = 0;
                      $qry2=$mysqli->query("select * from payment join admsn_frm on payment.student_id = admsn_frm.id join anx_2 on admsn_frm.anx_id = anx_2.anx_id join course on anx_2.course_id = course.course_id where invoice_no='$invoice_id'");
                      while($row=$qry2->fetch_array()){
                       $student_id = $row['student_id'];
                       $shipping = $row['shipping'];
                       $payment_mode = $row['payment_mode'];
                       $transaction_id = $row['transaction_id'];
                       $exam_date = $row['exam_date'];
                       //enrolment date format change
                       $exam_date = str_replace('-', '/', $exam_date);
                       $exam_date = date('d/m/Y', strtotime($exam_date));

                       $certificate_no = $row['certificate_no'];
                       //dob format change
                       $certificate_date = $row['certificate_date'];
                       if($certificate_date != '0000-00-00')
                       {
                         $certificate_date = str_replace('-', '/', $certificate_date);
                         $certificate_date = date('d/m/Y', strtotime($certificate_date));
                       }else{
                        $certificate_date = $certificate_date;
                       }

                       $fee = $row['payment_fee'];
                       $total_amount = $row['total_amount'];
                       $sub_total = $sub_total + $fee;
                      ?>
                    <tr> <input type="hidden" name="p_id[]" value="<?php echo $row['payment_id']; ?>">
                      <input type="hidden" name="student_id[]" value="<?php echo $row['id']; ?>">
                      <td><?php echo $row['enrollment_id']; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['course_name']; ?></td>
                      <td><?php echo $row['theory_mark']; ?></td>
                      <td><?php echo $row['prectical_mark']; ?></td>
                      <td><?php echo $exam_date ?></td>
                      <td><?php echo number_format((float)$fee, 2, '.', ''); ?> ₹</td>
                      <td>
                        <?php
                        if($certificate_no != null) {
                          echo $certificate_no;
                        }else{
                        ?>
                        <input type="text" class="form-control form-control-sm" name="certificate_no[]" required="required">
                      <?php } ?>
                      </td>
                      <td>
                        <?php
                        if($certificate_date != '0000-00-00') {
                          echo $certificate_date;
                        }else{
                        ?>
                        <div class="form-group col-md-12">
                        <div class="input-group cDate" id="date<?php echo $row['payment_id']; ?>" data-target-input="nearest">
                      <input type="text" name="date[]" required="required" class="form-control form-control-sm datetimepicker-input" container="body" data-target="#date<?php echo $row['payment_id']; ?>"/>
                        <div class="input-group-append" data-target="#date<?php echo $row['payment_id']; ?>" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                     <?php } ?>
                   <!--      
              <input type="text" class="form-control datetimepicker-input cDate" id="date<?php echo $row['payment_id']; ?>" data-toggle="datetimepicker" data-target="#date<?php echo $row['payment_id']; ?>" /> -->
            
                      </td>
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
                        <th>IFSC Code:</th>
                        <td>PUNB0RRBAGB</td>
                      </tr>
                      <tr>
                        <th>Account No.:</th>
                        <td>7001050007146</td>
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
                        <td><?php echo number_format((float)$shipping, 2, '.', ''); ?> ₹</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td><?php
                        $total=$sub_total+$tax+$shipping;
                        echo number_format((float)$total, 2, '.', '');
                        ?> ₹</td>
                        <input type="hidden" name="total_amount" value="<?php echo $total; ?>">
                      </tr>
                    </table>
                    <br>
                    
                  </div>
                  <br>
                <br>
                    <div class="form-row">
                  <div class="form-group col-md-12 text-right">
                  <b>Payment Method:</b>
                  <p><?php echo $payment_mode; ?></p>
                  </div>
                  <div class="form-group col-md-12 text-right">
                  <b>Transaction ID</b>
                  <p><?php echo $transaction_id; ?></p>
                </div>
                </div>
                
                <?php
                  if($certificate_no != null) { ?>
                    <div class="form-row">
                  <div class="form-group col-md-12 text-right">
                  <b>Certificate Issue Date:</b>
                  <p><?php echo $certificate_date; ?></p>
                  </div>
                  <div class="form-group col-md-12 text-right">
                  <b>Payment Status:</b>
                  <p><?php echo $status; ?></p>
                </div>
                </div>
                  <?php }else{ ?>
                        
                  <button type="submit" name="submit" value="submit" class="btn btn-success float-right"><i class="fas fa-check"></i> Update
                  </button>
                      <?php } ?>
                
                
                </div>
                <!-- /.col -->
              </div>
              </form>
              <!-- /.row -->
            </div>
            <!-- /.invoice -->
            <!-- <div class="text-center">
              <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
            </div> -->
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

    // console.log('js running')
  $(function () {
    //Date picker
    var cDates = document.querySelectorAll('.cDate')
    for(var i = 0; i < cDates.length; i++){
      var dateItem = cDates[i]
      var dateId =  dateItem.getAttribute('id')
      // console.log('inside cdate loop', i, dateItem, dateId)
      // console.log('jquery date element', $('#' + dateId))
      // console.log('jquery date string: ', '#' + dateId)
      $('#' + dateId).datetimepicker({
        format: 'DD/MM/YYYY'
      });
    }
  })
</script>
<!-- <script type="text/javascript">
  $(function () {
    $('#CertificateDate').datetimepicker({
        format: 'DD-MM-YYYY'
      });
  })
</script> -->
