  <?php 
  $title = "Candidate Details";
  include('../include/header.php');

  $id=$_GET['id'];
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
            <h1 class="m-0">Candidate Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="enrollment.php">Enrollment</a></li>
              <li class="breadcrumb-item active">Candidate Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    
      <div class="container-fluid"> 
        <?php
            include('../include/connection.php');
            $qry2=$mysqli->query("select * from admin where u_id='$u_id'");
            while($row=$qry2->fetch_array()){
              $center_address = $row['address'];
              $center_contact_no = $row['contact_no'];
              
            }
          ?>
        <div class="row bg-white">
          <div class="col-2">
            <img src="../dist/img/adr.png" alt="Admin Logo" class="img-fluid p-3">
          </div>
          <div class="col-8 text-center">
          <center><h1><b>WENS LINK GHUGUHA</b></h1></center>
  <div class="" style="background-color: #fff; border-radius: 20px; text-align: center;"><b>Center Code: <?php echo $user_name;?></b>
    <br>
    Address: <?php echo $center_address; ?>
    <br>
    Contact No.: <?php echo $center_contact_no; ?>
</div>
</div>
<div class="col-2">
            
          </div>
          <div class="col-12 bg-white">
  <div class="mt-2 mb-3" style="background-color: #34ebbd; text-align: center; color: #fff;"><h3><b>ADMISSION FORM</b></h3>
  </div>
<?php
$qry=$mysqli->query("select * from admsn_frm join anx_2 on admsn_frm.anx_id = anx_2.anx_id join course on anx_2.course_id = course.course_id where admsn_frm.id='$id' and u_id='$u_id'");
      while($row1=$qry->fetch_array()){
        $anx_id = $row1['anx_id'];
        $name = $row1['name'];
        $course_name = $row1['course_name'];
        //dob format change
        $dob = $row1['dob'];
        $dob = str_replace('-', '/', $dob);
        $dob = date('d/m/Y', strtotime($dob));
        //enrolment date format change
        $form_date = $row1['form_date'];
        $form_date = str_replace('-', '/', $form_date);
        $form_date = date('d/m/Y', strtotime($form_date));
      ?>
      <div class="tbl">
   <table style="width:100%" class="table-striped">
  <tr>
    <th>Enrollment ID:</th>
    <td colspan="3"><?php echo $row1['enrollment_id']; ?></td>
  </tr>
  <tr>
    <th>Course</th>
    <?php
      $qry3=$mysqli->query("select * from anx_2 inner join course on anx_2.course_id = course.course_id where anx_id='$anx_id'");
          while($row2=$qry3->fetch_array()){
            ?>
          
    <td colspan="3">
      <?php echo $row2['course_code']; ?> -
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
      <img src="../dist/img/student/<?php echo $row1['photo']; ?>" type="file" height="140px" width="130px" name="photo" value="<?php echo $photo; ?>"><br><b>Photograph</b>
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
      <img src="../dist/img/student/<?php echo $row1['sign']; ?>" type="file" height="60px" width="200px" name="sign" value="<?php echo $sign; ?>"><br><b>Signature</b>
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
    <td><?php echo $row1['blood_gr']; ?></td>
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
    <td><?php echo $row1['emergency_name']; ?></td>
  </tr>
    <tr>
    <th>Year of passing:</th>
    <td><?php echo $row1['pass_year']; ?></td>

     <th>Phone no.:</th>
    <td><?php echo $row1['emergency_contact_no']; ?></td>
  </tr>
  <tr>
    <th>Percentage:</th>
    <td><?php echo $row1['percent']; ?></td>

    <th>Relation:</th>
    <td><?php echo $row1['emergency_relation']; ?></td>
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
  <a href="print-application.php?id=<?php echo $id; ?>&nm=<?php echo $name; ?>" target="_blank" class="btn btn-primary">Print</a>
</div>
<br>
</div>
</div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    
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