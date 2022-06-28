  <?php 
  $title = "Enrollment ID";
  include('../include/header.php');
    if (isset($_GET['Message'])) 
    {
    echo "<script type='text/javascript'>alert('Enrollment ID submitted');</script>";
    }
  
    $id=$_GET['id'];


  if(isset($_POST['submit']))
  {
    $new_enrollment_id = $_POST['enrollment_id'];

    $qry1 = $mysqli->query("select * from admsn_frm where enrollment_id='$new_enrollment_id'");
      if ($qry1->num_rows > 0)
      {
        print "<script type='text/javascript'>alert('Enrollment ID is exist. Please enter an unique ID');</script>";
      }
      else 
      {
        $query = $mysqli->query("update admsn_frm set enrollment_id='$new_enrollment_id' where id='$id'");
          if($query )
        {
          header("location:enrollment-id.php?id=$id&Message=" . urlencode($new_enrollment_id));
        }
        else
        {
            echo $mysqli->error;
        } 
      }
  }

  if(isset($_POST['reject']))
  {
        $query = $mysqli->query("update admsn_frm set enrollment_id='' where id='$id'");
          if($query )
        {
          header("location:enrollment-request.php");
        }
        else
        {
            echo $mysqli->error;
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
          <li class="nav-item  menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Service Request
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="enrollment-request.php" class="nav-link active">
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
            <h1 class="m-0">Enrollment ID</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="enrollment-request.php">Enrollment Request</a></li>
              <li class="breadcrumb-item active">Enrollment ID</li>
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
            $qry2=$mysqli->query("select * from admsn_frm join admin on admsn_frm.u_id = admin.u_id where admsn_frm.id='$id'");
            while($row=$qry2->fetch_array()){
              $center_name = $row['user_name'];
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
  <div class="" style="background-color: #fff; border-radius: 20px; text-align: center;"><b>Center Code: <?php echo $center_name;?></b>
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
$qry=$mysqli->query("select * from admsn_frm join anx_2 on admsn_frm.anx_id = anx_2.anx_id join course on anx_2.course_id = course.course_id where admsn_frm.id='$id'");
      while($row1=$qry->fetch_array()){
        $anx_id = $row1['anx_id'];
        $name = $row1['name'];
        $course_name = $row1['course_name'];
        $enrollment_id = $row1['enrollment_id'];
        $photo = $row1['photo'];
        $sign = $row1['sign'];
        $age = $row1['age'];
        $graduation = $row1['graduation'];
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
   <table style="width:100%">
  <tr>
    <th>Enrollment ID:</th>
    <?php
       if ($enrollment_id == "Applied") {
      ?>
    <td colspan="2">
      <form method="post" action="">
        <div class="form-group m-0 row">
          <div class="col-8">
        <input type="text" class="form-control" required="required" name="enrollment_id" value="">
      </div>
      <div class="col-4">
        <button type="submit" class="btn btn-success btn-block" name="submit" value="submit">Enroll</button>
      </div>
    </div>
      </form>
    </td>
    <td>
      
      <form method="post" action="">
      
        <button type="submit" class="btn btn-danger btn-block" name="reject" value="reject">Reject</button>
     
    </form>
  
    </td>
    <?php }else{
      echo "<td colspan='3'>".$enrollment_id;
    } ?>
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
  <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
</div>
<br>
</div>
</div>
        <!-- /.row -->
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