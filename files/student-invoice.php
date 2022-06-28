  <?php 
  $invoice_no=$_GET['id'];
  include('../include/session.php');
  $qry4=$mysqli->query("select * from fee_collect join admin on fee_collect.u_id = admin.u_id where invoice_no='$invoice_no'");
      while($row4=$qry4->fetch_array()){
        $center_id = $row4['u_id'];
        $center_location = $row4['center_location'];
        $center_address = $row4['address'];
        $center_contact_no = $row4['contact_no'];
        $center_email = $row4['email'];
        $center_user_name = $row4['user_name'];
      }
      if ($role == 'client' && $center_id == $u_id || $role == 'admin') {
  $qry=$mysqli->query("select * from fee_collect join admsn_frm on fee_collect.student_id = admsn_frm.id join anx_2 on admsn_frm.anx_id = anx_2.anx_id join course on anx_2.course_id = course.course_id where fee_collect.u_id='$center_id' and invoice_no='$invoice_no'");
    while($row11=$qry->fetch_array())
    {
      $pr_address = $row11['pr_address'];
      $pr_district = $row11['pr_district'];
      $pr_state = $row11['pr_state'];
      $pr_pin = $row11['pr_pin'];
      $name = $row11['name'];
      $student_id = $row11['student_id'];
      $course_name = $row11['course_name'];
      $aplc_id = $row11['aplc_id'];
      $date = $row11['fee_date_time'];
        $date = str_replace('/', '-', $date);
        $date = date('d/m/Y', strtotime($date));
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
  }else{
    echo "<script type='text/javascript'>alert('You are not authorized to access.');
    window.location.href='dashboard.php';</script>";
  }
    $total = 0;
    $qry3=$mysqli->query("select * from fee_collect where u_id='$center_id' and invoice_no='$invoice_no'");
    if ($qry3->num_rows > 0)
    {
       while($row1=$qry3->fetch_array())
      {
       $amount = $row1['amount'];
       $total_paid = $row1['total_paid'];
       $due = $row1['due'];
      }
    }
    else
    {
      $due = $price;
    }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?php 
        if ($role == 'admin') {
          echo "Admin";
        }elseif ($role == 'client') {
          echo $user_name;
        }
    ?> | <?php echo $invoice_no; ?></title>

  <link rel="stylesheet" type="text/css" href="../dist/css/print.css" media="print">
  <link rel="stylesheet" type="text/css" href="../dist/css/style.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="shortcut icon" href="#">
</head>
<body>
      <div class="container-fluid">
        
        <div class="row bg-white">
          <div class="col-2">
            <img src="../dist/img/adr.png" alt="Admin Logo" class="img-fluid p-3">
          </div>
          <div class="col-8 text-center">
          <center><h1><b>WENS LINK GHUGUHA</b></h1></center>
  <div class="" style="background-color: #fff; border-radius: 20px; text-align: center;"><b>Center Code: <?php echo $center_user_name;?></b>
    <br>
    Address: <?php echo $center_address; ?>
    <br>
    Contact No.: <?php echo $center_contact_no; ?>
    <br>
    Email: <?php echo $center_email; ?>
</div>
</div>
<div class="col-2">
            
          </div>
          <div class="col-12 bg-white">
  <div class="mt-2 mb-3" style="background-color: #34ebbd; text-align: center; color: #fff; -webkit-print-color-adjust: exact;"><h3><b>FEE RECEIPT</b></h3>
  </div>
</div>
</div>
        <!-- /.row -->
        <div class="row p-3 invoice-info">
                
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?php echo $name; ?></strong><br>
                    <?php echo $pr_address; ?><br>
                    <?php echo "District: ".$pr_district; ?><br>
                    <?php echo "State: ".$pr_state; ?><br>
                    <?php echo "Pin: ".$pr_pin; ?>
                  </address>
                </div>
                <div class="col-sm-4 invoice-col">
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Receipt No.: <?php echo $invoice_no; ?><br>
                    Date: <?php echo $date; ?>
                  </b><br>
                  <br>
                  <b>Application No.:</b> <?php echo $aplc_id; ?><br>
                  <b>Total Fee:</b> <?php echo $price; ?> ₹<br>
                  <b>Total Paid:</b> <?php echo $total_paid; ?> ₹<br>
                  <b>Due:</b> 
                  <?php echo $due; ?> ₹
                       <br>
                </div>
                <!-- /.col -->
              </div>
              <hr>
              <div class="row p-3">
                <div class="col-12 table-responsive">
                  <table class="table table-striped border text-center">
                    <thead>
                    <tr>
                      <th>Course Name</th>
                      <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td><?php echo $course_name; ?></td>
                      <td><?php echo $amount; ?> ₹</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
                <div class="col-10 p-3"></div>
                <div class="col-2 p-3">Signature</div>
              </div>
      </div>
      <!-- /.container-fluid -->

<script>
  window.addEventListener("load", window.print());
</script>
</body>
    </html>