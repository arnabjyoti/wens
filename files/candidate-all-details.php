  <?php 
  $title = "Candidate All Details";
  include('../include/header.php');

  $student_id=$_GET['id'];

  $qry4=$mysqli->query("select * from admsn_frm join admin on admsn_frm.u_id = admin.u_id where id='$student_id'");
      while($row4=$qry4->fetch_array()){
        $center_id = $row4['u_id'];
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
                <a href="certificate-request.php" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Certificate Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="enquiry.php" class="nav-link active">
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
                <a href="discount-request.php" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Discount Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="enquiry.php" class="nav-link active">
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
            <h1 class="m-0">Candidate All Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="enquiry.php">Enquiry</a></li>
              <li class="breadcrumb-item active">Candidate All Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <?php
    if ($role == 'client' && $center_id == $u_id || $role == 'admin') {
    ?>
      <div class="container-fluid"> 
        <div class="row">
          <div class="col-md-12">
         <div class="card">
          <div class="card-header bg-light">
            <h5><b>Application Details</b></h5>
          </div>
          <div class="card-body">
        <?php
            include('../include/connection.php');
            $qry2=$mysqli->query("select * from admin where u_id='$center_id'");
            while($row2=$qry2->fetch_array()){
              $center_location = $row2['center_location'];
              $center_address = $row2['address'];
              $center_contact_no = $row2['contact_no'];
              $center_email = $row2['email'];
              $center_user_name = $row2['user_name'];
            }
          ?>
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
  <div class="mt-2 mb-3" style="background-color: #34ebbd; text-align: center; color: #fff;"><h3><b>ADMISSION FORM</b></h3>
  </div>
<?php
$qry=$mysqli->query("select * from admsn_frm join anx_2 on admsn_frm.anx_id = anx_2.anx_id join course on anx_2.course_id = course.course_id where admsn_frm.id='$student_id' and u_id='$center_id'");
      while($row1=$qry->fetch_array()){
        $anx_id = $row1['anx_id'];
        $name = $row1['name'];
        $enrollment_id = $row1['enrollment_id'];
        $course_code = $row1['course_code'];
        $course_name = $row1['course_name'];
        $duration = $row1['duration'];
        $photo = $row1['photo'];
        $sign = $row1['sign'];
        $age = $row1['age'];
        $graduation = $row1['graduation'];
        $blood_gr = $row1['blood_gr'];
        $emergency_name = $row1['emergency_name'];
        $emergency_relation = $row1['emergency_relation'];
        $emergency_contact_no = $row1['emergency_contact_no'];
        //dob format change
        $dob = $row1['dob'];
        $dob = str_replace('-', '/', $dob);
        $dob = date('d/m/Y', strtotime($dob));
        //enrolment date format change
        $form_date1 = $row1['form_date'];
        $form_date = str_replace('-', '/', $form_date1);
        $form_date = date('d/m/Y', strtotime($form_date));

        $prectical_mark = $row1['prectical_mark'];
        $theory_mark = $row1['theory_mark'];
        $percent_mark = $prectical_mark+$theory_mark;
        $certificate_no = $row1['certificate_no'];
        //certificate_date format change
        $certificate_date = $row1['certificate_date'];
        $certificate_date = str_replace('-', '/', $certificate_date);
        $certificate_date = date('d/m/Y', strtotime($certificate_date));
      ?>
      <div class="tbl">
   <table style="width:100%" class="table-striped">
  <tr>
    <th>Enrollment ID:</th>
    <td colspan="3"><?php echo $enrollment_id; ?></td>
  </tr>
  <tr>
    <th>Course</th>
    <?php
      $qry3=$mysqli->query("select * from anx_2 inner join course on anx_2.course_id = course.course_id where anx_id='$anx_id'");
          while($row3=$qry3->fetch_array()){
            ?>
          
    <td colspan="3">
      <?php echo $course_code; ?> -
      <?php echo $course_name; ?>
    </td>
    <?php } ?>
  </tr>
  <tr>
    <th colspan="4" class="bg-clr">Personal details:</th>
  </tr>
  <tr>
    <th>Candidate Name:</th>
    <td colspan="2"><?php echo $name; ?></td>
    <td style="width: 210px; height: 170px;" rowspan="6" class="p-0 b-0" >
    <center class="p-0 b-0">
      <img src="../dist/img/student/<?php echo $photo; ?>" type="file" height="140px" width="130px"><br><b>Photograph</b>
    </center></td>
  </tr>
  <tr>
    <th>Date of birth:</th>
    <td colspan="2"><?php echo $dob; ?></td>
  </tr>
  <tr>
    <th>Gender:</th>
    <td colspan="2"><?php echo $row1['gender']; ?></td>
  </tr>
  <tr>
    <th>Email:</th>
    <td colspan="2"><?php echo $row1['email']; ?></td>
  </tr>
  <tr>
    <th>Mobile No.:(+91)</th>
    <td colspan="2"><?php echo $row1['contact_no']; ?></td>
  </tr>
  <tr>
    <th>Nationality:</th>
    <td colspan="2"><?php echo $row1['nationality']; ?></td>
  </tr>
  <tr>
    <th>Father's Name:</th>
    <td colspan="2"><?php echo $row1['fathers_name']; ?></td>
    <td style="width: 210px; height: 50px;" rowspan="4" class="p-0 b-0" >
    <center class="p-0 b-0">
      <img src="../dist/img/student/<?php echo $sign; ?>" type="file" height="60px" width="200px"><br><b>Signature</b>
    </center></td>
  </tr>
  <tr>
    <th>Father's Phone No.:</th>
    <td colspan="2"><?php echo $row1['father_contact_no']; ?></td>
  </tr>
  <tr>
    <th>Mother's Name:</th>
    <td colspan="2"><?php echo $row1['mother_name']; ?></td>
  </tr>
  <tr>
    <th>Mother's Phone No.:</th>
    <td colspan="2"><?php echo $row1['mother_contact_no']; ?></td>
  </tr>
  <tr>
    <th colspan="2" class="bg-clr">Address:<p>(Correspondance Address)</p></th>
    <th colspan="2" class="bg-clr">Address:<p>(Parmanent Address)</p></th>
  </tr>
  <tr>
    <th>House No./Street/Locality:</th>
    <td ><?php echo $row1['cors_address']; ?></td>

    <th>House No./Street/Locality:</th>
    <td ><?php echo $row1['pr_address']; ?></td>
  </tr>
  <tr>
    <th>Landmark:</th>
    <td ><?php echo $row1['cors_land']; ?></td>

    <th>Landmark:</th>
    <td ><?php echo $row1['pr_land']; ?></td>
  </tr>
  <tr>
    <th>City / District:</th>
    <td><?php echo $row1['cors_district']; ?></td>

    <th>City / District:</th>
    <td><?php echo $row1['pr_district']; ?></td>
  </tr>
  <tr>
    <th>State:</th>
    <td><?php echo $row1['cors_state']; ?></td>

    <th>State:</th>
    <td><?php echo $row1['pr_state']; ?></td>
  </tr>
  <tr>
    <th>Pin:</th>
    <td><?php echo $row1['cors_pin']; ?></td>

    <th>Pin:</th>
    <td><?php echo $row1['pr_pin']; ?></td>
  </tr>
    <tr>
    <th colspan="2" class="bg-clr">Highest Educational qualification:</th>
    <th colspan="2" class="bg-clr">Emergency Information:</th>
  </tr>
  <tr>
    <th>Highest Qualification:</th>
    <td><?php echo $row1['education']; ?></td>

    <th>Blood Group:</th>
    <td><?php echo $blood_gr; ?></td>
</tr>
    <tr>
    <th>Course / Stream:</th>
    <td><?php echo $row1['course_strem']; ?></td>

    <th>Alergic to:</th>
    <td><?php echo $row1['alergic_to']; ?></td>
</tr>
    <tr>
    <th>School/College Name with address:</th>
    <td><?php echo $row1['e_ins_name']; ?></td>

    <th>Severe Disease(if any):</th>
    <td><?php echo $row1['severe_disease']; ?></td>
</tr>
    <tr>
    <th>University / Board:</th>
    <td ><?php echo $row1['e_board']; ?></td>

    <th>During Emergency contact Name:</th>
    <td><?php echo $emergency_name; ?></td>
  </tr>
    <tr>
    <th>Year of passing:</th>
    <td><?php echo $row1['pass_year']; ?></td>

     <th>Phone no.:</th>
    <td><?php echo $emergency_contact_no; ?></td>
  </tr>
  <tr>
    <th>Percentage:</th>
    <td><?php echo $row1['percent']; ?></td>

    <th>Relation:</th>
    <td><?php echo $emergency_relation; ?></td>
  </tr>
<tr>
  <th colspan="4" class="bg-clr">Other Details:</th>
  </tr>
  <tr>
    <th>Student's Occupation:</th>
    <td colspan="3"><?php echo $row1['stdnt_ocu']; ?></td>
</tr>
    <tr>
    <th>Father's Occupation:</th>
    <td colspan="3"><?php echo $row1['father_ocu']; ?></td>
</tr>
    <tr>
    <th>Mother's Occupation:</th>
    <td colspan="3"><?php echo $row1['mother_ocu']; ?></td>
</tr>
    <th colspan="4" class="bg-clr text-center">Declaration</th>

  <tr>
    <td colspan="4" class="dclrsn"><p> I do hereby declare that all the particulars given above are true to the best of my knowledge and belief and if any mistake / misinformation, detected at any stage in future, will result in the cancellation of candidature. I shall abide by all the terms and conditions therein.</p></td>
</tr>
<tr>
    <th>Date:</th>
    <td colspan="3"><?php echo $form_date; ?></td>
</tr>
</table>
</div>
<?php } ?>
<br>
<div class="text-center">
  <a href="print-application.php?id=<?php echo $student_id; ?>&nm=<?php echo $name; ?>" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i> Print Application Form</a>
</div>
<br>
</div>
</div>
</div>
</div>
</div>
</div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
          <div class="card">
            <div class="card-header bg-light">
              <h5><b>Document Upload</b></h5>
            </div>
            <div class="card-body">
    <div class="row">
      <div class="col-sm-12">
        <div class="table-responsive">
          <table class="table table-sm align-middle border">
              <tr>
                <th style="width:30%" class="align-middle">
                  <label class="col-form-label">Photograph:</label>
                </th>
                <td>
                </td>
                <td style="width:30%" class="align-middle text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg">
                  <i class="fas fa-eye text-info"></i>
                  <p class="text-info">View</p>
                  </button>
                  <!-- modal -->
                  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <img src="../dist/img/student/<?php echo $photo; ?>" class=" img-fluid">
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th class="align-middle">
                  <label class="col-form-label">Signature:</label>
                </th>
                <td>
                </td>
                <td class="align-middle text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg1">
                  <i class="fas fa-eye text-info"></i>
                  <p class="text-info">View</p>
                  </button>
                  <!-- modal -->
                  <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <img src="../dist/img/student/<?php echo $sign; ?>" class=" img-fluid">
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th class="align-middle">
                  <label class="col-form-label">Age Proof</label>
                </th>
                <td>
                </td>
                <td class="align-middle text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg2">
                  <i class="fas fa-eye text-info"></i>
                  <p class="text-info">View</p>
                  </button>
                  <!-- modal -->
                  <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <img src="../dist/img/student/<?php echo $age; ?>" class=" img-fluid">
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th class="align-middle">
                  <label class="col-form-label">Graduation Certificate/marksheet (Required for PGDCA)</label>
                </th>
                <td>
                </td>
                <td class="align-middle text-center">
                  <button type="button" class="btn btn" data-toggle="modal" data-target=".bd-example-modal-lg3">
                  <i class="fas fa-eye text-info"></i>
                  <p class="text-info">View</p>
                  </button>
                  <!-- modal -->
                  <div class="modal fade bd-example-modal-lg3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <img src="../dist/img/student/<?php echo $graduation; ?>" alt="No Image" class=" img-fluid">
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
          </table>
        </div>
      </div>
     </div>
</div>
          </div>
        </div>
      </div>
      <!-- /.row -->
        <div class="row">
          <div class="col-12">
          <div class="card">
            <div class="card-header bg-light">
              <h5><b>Fee Collection Details</b></h5>
            </div>
            <div class="card-body">
            <div class="row">
            <?php
            $qry1=$mysqli->query("select * from fee_collect join admsn_frm on fee_collect.student_id = admsn_frm.id where student_id='$student_id' and fee_collect.u_id='$center_id'");
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
      <div class="row">
          <div class="col-12">
          <div class="card">
            <div class="card-header bg-light">
              <h5><b>I-Card</b></h5>
            </div>
            <div class="card-body">
            <div class="row">
              <div class="col-12">
            <?php
            if ($enrollment_id != null) {
                $to_date = date("d/m/Y", strtotime($form_date1 .'+'.$duration.' month'));

                $qry5=$mysqli->query("select * from admsn_frm join admin on admsn_frm.u_id = admin.u_id where admsn_frm.u_id='$u_id'");
                while($row5=$qry->fetch_array())
                {
                  $center_user_name = $row5['user_name'];
                }
                //split character & integer from user name
                preg_match_all("/[A-Z]+|\d+/", $center_user_name, $matches1);
                $code = $matches1[0][1];

                $crs = preg_match('/(?<=\()(.+)(?=\))/is', $course_name, $matches2);
                if (isset($matches2[0])) {
                $course = $matches2[0];
                }else{
                 $course_length = strlen($course_name);
                 if ($course_length > 22)
                  {
                   $parts = explode(' ',$course_name);
                   $initials = '';
                     foreach($parts as $part)
                     {
                        $initials .= $part[0];
                     }
                    $course = strtoupper($initials);
                  }else{
                    $course = $course_name;
                  }
                }
               
            echo '<img src="i-card.php?name='.$name.'&roll='.$enrollment_id.'&course='.rawurlencode($course).'&c_code='.$course_code.'&photo='.$photo.'&sign='.$sign.'&form_date='.$form_date.'&to_date='.$to_date.'&center_location='.ucfirst($center_location).'&code='.$code.'&blood_gr='.rawurlencode($blood_gr).'&emergency_name='.$emergency_name.'&emergency_relation='.$emergency_relation.'&emergency_contact_no='.$emergency_contact_no.'&center_address='.rawurlencode($center_address).'" class="img-fluid">';
            echo "<br>";
            echo '<a href="i-card.php?name='.$name.'&roll='.$enrollment_id.'&course='.rawurlencode($course).'&c_code='.$course_code.'&photo='.$photo.'&sign='.$sign.'&form_date='.$form_date.'&to_date='.$to_date.'&center_location='.ucfirst($center_location).'&code='.$code.'&blood_gr='.rawurlencode($blood_gr).'&emergency_name='.$emergency_name.'&emergency_relation='.$emergency_relation.'&emergency_contact_no='.$emergency_contact_no.'&center_address='.rawurlencode($center_address).'" download>
            <button type="button" class="btn btn-primary" >
            <i class="fa fa-download"></i> Download I-Card
            </button>
            </a>';
          }else{
            echo "Enrollment ID not alloted";
          }
             ?>
           </div>
        </div>
      </div>
          </div>
        </div>
      </div>
      <div class="row">
          <div class="col-12">
          <div class="card">
            <div class="card-header bg-light">
              <h5><b>Certificate Details</b></h5>
            </div>
            <div class="card-body">
            <div class="row">
              <div class="col-12">
            <?php
            if ($certificate_no != null) { ?>
              


              <table class="table table-bordered table-striped text-left">
                <tr>
                  <th>Certificate No.:</th>
                  <td><?php echo $certificate_no; ?></td>
                  <th>Percentage:</th>
                  <td><?php echo $percent_mark; ?></td>
                  <th>Date of issue:</th>
                  <td><?php echo $certificate_date; ?></td>
                </tr>
              </table>
          <?php }else{
            echo "Certificate No. not alloted";
          }
             ?>
           </div>
        </div>
      </div>
          </div>
        </div>
      </div>
      
      </div>
      <!-- /.container-fluid -->
    <?php }else{ 
      echo "<script type='text/javascript'>alert('You are not authorized to access.');
    window.location.href='dashboard.php';</script>";
  } ?>
    <!-- /.content -->
  </div>
  </div>
  <!-- /.content-wrapper -->
  <?php
  include('../include/footer.php');
  ?>