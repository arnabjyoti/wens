  <?php 
  $title = "Candidate edit";
  include('../include/header.php');

  $id=$_GET['id'];

  $error = NULL;

if (isset($_POST['update'])) {
  $anx_id = $_POST['anx_id'];
  $date = $_POST['form_date'];
  //conver date into database format
  $date = str_replace('/', '-', $date);
  $date = date('Y-m-d', strtotime($date));

  $name = $_POST['name'];
  $dob = $_POST['dob'];
  //conver date into database format
  $dob = str_replace('/', '-', $dob);
  $dob = date('Y-m-d', strtotime($dob));

  $gender= $_POST['gender'];
  $nationality = $_POST['nationality'];
  $ph_no = $_POST['ph_no'];
  $email_id = $_POST['email_id'];
  $father = $_POST['father'];
  $father_ph_no = $_POST['father_ph_no'];
  $mother = $_POST['mother'];
  $mother_ph_no = $_POST['mother_ph_no'];
  $p_address = $_POST['p_address'];
  $p_land = $_POST['p_land'];
  $p_dist = $_POST['p_dist'];
  $p_state = $_POST['p_state'];
  $p_pin = $_POST['p_pin'];
  $pr_address = $_POST['pr_address'];
  $pr_land = $_POST['pr_land'];
  $pr_dist = $_POST['pr_dist'];
  $pr_state = $_POST['pr_state'];
  $pr_pin = $_POST['pr_pin'];
  $education = $_POST['education'];
  $course_strem = $_POST['course_strem'];
  $e_ins_name = $_POST['e_ins_name'];
  $e_board = $_POST['e_board'];
  $pass_year = $_POST['pass_year'];
  $percent = $_POST['percent'];
  $blood = $_POST['blood'];
  $alergic = $_POST['alergic'];
  $severe_disease = $_POST['severe_disease'];
  $emrgency_name = $_POST['emrgency_name'];
  $Phone_no = $_POST['Phone_no'];
  $relation = $_POST['relation'];
  $occupation = $_POST['occupation'];
  $f_occupation = $_POST['f_occupation'];
  $m_occupation = $_POST['m_occupation'];

  

   // $course_code = $mysqli->real_escape_string($course_code);
   // $course_title = $mysqli->real_escape_string($course_title);
   $name = $mysqli->real_escape_string(strtoupper($name));
   $dob = $mysqli->real_escape_string($dob);
   $gender = $mysqli->real_escape_string($gender);
   $nationality = $mysqli->real_escape_string($nationality);
   $ph_no = $mysqli->real_escape_string($ph_no);
   $email_id = $mysqli->real_escape_string($email_id);
   $father = $mysqli->real_escape_string(strtoupper($father));
   $father_ph_no = $mysqli->real_escape_string($father_ph_no);
   $mother = $mysqli->real_escape_string(strtoupper($mother));
   $mother_ph_no = $mysqli->real_escape_string($mother_ph_no);
   $p_address = $mysqli->real_escape_string(strtoupper($p_address));
   $p_land = $mysqli->real_escape_string(strtoupper($p_land));
   $p_dist = $mysqli->real_escape_string(strtoupper($p_dist));
   $p_state = $mysqli->real_escape_string(strtoupper($p_state));
   $p_pin = $mysqli->real_escape_string($p_pin);
   $pr_address = $mysqli->real_escape_string(strtoupper($pr_address));
   $pr_land = $mysqli->real_escape_string(strtoupper($pr_land));
   $pr_dist = $mysqli->real_escape_string(strtoupper($pr_dist));
   $pr_state = $mysqli->real_escape_string(strtoupper($pr_state));
   $pr_pin = $mysqli->real_escape_string($pr_pin);

  $education = $mysqli->real_escape_string($education);
  $course_strem = $mysqli->real_escape_string($course_strem);
  $e_ins_name = $mysqli->real_escape_string($e_ins_name);
  $e_board = $mysqli->real_escape_string($e_board);
  $pass_year = $mysqli->real_escape_string($pass_year);
  $percent = $mysqli->real_escape_string($percent);
  $blood = $mysqli->real_escape_string($blood);
  $alergic = $mysqli->real_escape_string($alergic);
  $severe_disease = $mysqli->real_escape_string($severe_disease);
  $emrgency_name = $mysqli->real_escape_string($emrgency_name);
  $Phone_no = $mysqli->real_escape_string($Phone_no);
  $relation = $mysqli->real_escape_string($relation);
  $occupation = $mysqli->real_escape_string($occupation);
  $f_occupation = $mysqli->real_escape_string($f_occupation);
  $m_occupation = $mysqli->real_escape_string($m_occupation);


    $qry2=$mysqli->query("select * from anx_2 inner join course on anx_2.course_id = course.course_id where user_id='$u_id' and anx_id='$anx_id'");
            while($row=$qry2->fetch_array())
            {
              $fee = $row['course_fee'];
            } 

   $query = $mysqli->query("update admsn_frm set  fee='$fee', anx_id='$anx_id', form_date='$date', name='$name', dob='$dob', gender='$gender', nationality='$nationality', contact_no='$ph_no', email='$email_id', fathers_name='$father', father_contact_no='$father_ph_no', mother_name='$mother', mother_contact_no='$mother_ph_no', cors_address='$p_address', cors_land='$p_land', cors_district='$p_dist', cors_state='$p_state', cors_pin='$p_pin', pr_address='$pr_address', pr_land='$pr_land', pr_district='$pr_dist', pr_state='$pr_state', pr_pin='$pr_pin', education='$education', course_strem='$course_strem', e_ins_name='$e_ins_name', e_board='$e_board', pass_year='$pass_year', percent='$percent', blood_gr='$blood', alergic_to='$alergic', severe_disease='$severe_disease', emergency_name='$emrgency_name', emergency_contact_no='$Phone_no', emergency_relation='$relation', stdnt_ocu='$occupation', father_ocu='$f_occupation', mother_ocu='$m_occupation' where u_id='$u_id' and id='$id'");
    if($query ){
              header("location:candidate-edit.php?id=$id");
        }else{
            echo $mysqli->error;
      }
}
//phptograph upload
if (isset($_POST['photo'])) {

  $photo = $_FILES['photo'];
  $filename = $photo['name'];
  $fileerror = $photo['error'];
  $filetmp = $photo['tmp_name'];
  $filesize = $photo['size'];
  $fileext = explode('.', $filename);
  $filecheck = strtolower(end($fileext));  
  $fileextstored = array('png', 'jpg', 'jpeg');
  if(in_array($filecheck, $fileextstored))
  {
    $temp = explode(".", $filename);
    $newfilename = round(microtime(true)) . 'photo'.'.' . end($temp);
    $destinationfile = '../dist/img/student/'.$newfilename;
    move_uploaded_file($filetmp, $destinationfile);
  }
if($filesize > 8290832){
      echo '<script>alert("Photo Size is grater than 6MB")</script>';
    }elseif($filesize < 10400){
      echo '<script>alert("Photo Size is less then 10KB")</script>'; 
    }else{
     
      $photo  = $mysqli->real_escape_string($newfilename);

       $query = $mysqli->query("update admsn_frm set photo='$photo' where u_id='$u_id' and id='$id'");
    if($query ){
              header("location:candidate-edit.php?id=$id");
        }else{
            echo $mysqli->error;
      }
      }
    }

    //sign upload
    if (isset($_POST['sign'])) {

      $photo1 = $_FILES['sign'];
      $filename1 = $photo1['name'];
      $fileerror1 = $photo1['error'];
      $filetmp1 = $photo1['tmp_name'];
      $filesize1 = $photo1['size'];
      $fileext1 = explode('.', $filename1);
      $filecheck1 = strtolower(end($fileext1));  
      $fileextstored1 = array('png', 'jpg', 'jpeg');
      if(in_array($filecheck1, $fileextstored1))
      {
        $temp1 = explode(".", $filename1);
        $newfilename1 = round(microtime(true)) . 'sign'.'.' . end($temp1);
        $destinationfile1 = '../dist/img/student/'.$newfilename1;
        move_uploaded_file($filetmp1, $destinationfile1);
      }
    if($filesize1 > 8290832){
          echo '<script>alert("Photo Size is grater than 6MB")</script>';
        }elseif($filesize1 < 10400){
          echo '<script>alert("Photo Size is less then 10KB")</script>'; 
        }else
        {
          $photo1  = $mysqli->real_escape_string($newfilename1);
          $query = $mysqli->query("update admsn_frm set sign='$photo1' where u_id='$u_id' and id='$id'");
    if($query ){
              header("location:candidate-edit.php?id=$id");
        }else{
            echo $mysqli->error;
        }
        }
      }

  //age proof upload
      if (isset($_POST['age'])) {

      $photo2 = $_FILES['age'];
      $filename2 = $photo2['name'];
      $fileerror2 = $photo2['error'];
      $filetmp2 = $photo2['tmp_name'];
      $filesize2 = $photo2['size'];
      $fileext2 = explode('.', $filename2);
      $filecheck2 = strtolower(end($fileext2));  
      $fileextstored2 = array('png', 'jpg', 'jpeg');
      if(in_array($filecheck2, $fileextstored2))
      {
        $temp2 = explode(".", $filename2);
        $newfilename2 = round(microtime(true)) . 'age'.'.' . end($temp2);
        $destinationfile2 = '../dist/img/student/'.$newfilename2;
        move_uploaded_file($filetmp2, $destinationfile2);
      }
    if($filesize2 > 8290832){
          echo '<script>alert("Photo Size is grater than 6MB")</script>';
        }elseif($filesize2 < 10400){
          echo '<script>alert("Photo Size is less then 10KB")</script>'; 
        }else
        {
          $photo2  = $mysqli->real_escape_string($newfilename2);
          $query = $mysqli->query("update admsn_frm set age='$photo2' where u_id='$u_id' and id='$id'");
        if($query ){
              header("location:candidate-edit.php?id=$id");
        }else{
            echo $mysqli->error;
        }
        }
      }

      //graduation certificate upload
      if (isset($_POST['graduation'])) {
      $photo3 = $_FILES['graduation'];
      $filename3 = $photo3['name'];
      $fileerror3 = $photo3['error'];
      $filetmp3 = $photo3['tmp_name'];
      $filesize3 = $photo3['size'];
      $fileext3 = explode('.', $filename3);
      $filecheck3 = strtolower(end($fileext3));  
      $fileextstored3 = array('png', 'jpg', 'jpeg');
      if(in_array($filecheck3, $fileextstored3))
      {
        $temp3 = explode(".", $filename3);
        $newfilename3 = round(microtime(true)) . 'graduation'.'.' . end($temp3);
        $destinationfile3 = '../dist/img/student/'.$newfilename3;
        move_uploaded_file($filetmp3, $destinationfile3);
      }
    if($filesize3 > 8290832){
          echo '<script>alert("Photo Size is grater than 6MB")</script>';
        }elseif($filesize3 < 10400){
          echo '<script>alert("Photo Size is less then 10KB")</script>'; 
        }else
        {
          $photo3  = $mysqli->real_escape_string($newfilename3);
          $query = $mysqli->query("update admsn_frm set graduation='$photo3' where u_id='$u_id' and id='$id'");
        if($query ){
              header("location:candidate-edit.php?id=$id");
        }else{
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
                <a href="enrollment.php" class="nav-link active">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Enrollment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/icons.html" class="nav-link">
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
            <h1 class="m-0">New Enrollment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="enrollment.php">Enrollment</a></li>
              <li class="breadcrumb-item active">New Enrollment</li>
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
              
            }
          ?>


<div class="col-md-12 bg-white">
  <div class="" style="background-color: #fff; border-radius: 20px; text-align: center;"><b><?php echo $user_name;?></b><br> <?php echo $center_address; ?>
</div>
  <div class="mt-2 mb-3" style="background-color: #34ebbd; text-align: center; color: #fff;"><h3><b>ADMISSION FORM</b></h3>
  </div>
<?php
$qry=$mysqli->query("select * from admsn_frm join anx_2 on admsn_frm.anx_id = anx_2.anx_id join course on anx_2.course_id = course.course_id where admsn_frm.id='$id' and u_id='$u_id'");
      while($row1=$qry->fetch_array()){
        $anx_id = $row1['anx_id'];
        //dob format change
        $dob = $row1['dob'];
        $dob = str_replace('-', '/', $dob);
        $dob = date('d-m-y', strtotime($dob));
        //enrolment date format change
        $form_date = $row1['form_date'];
        $form_date = str_replace('-', '/', $form_date);
        $form_date = date('d-m-y', strtotime($form_date));
      ?>
<!-- Sport Proficiency -->
<form method="post" action="" onsubmit="return confirm('Are you sure you want to submit this form?');">
<div class="card">
  <div class="card-header bg-light">
   <h5><b>Course</b></h5>
  </div>
  <div class="card-body">
    <div class="form-row">
    <div class="form-group col-md-9">
      <label for="course_code" class="required">Course</label>
        <select name="anx_id" class="form-control" required="required" id="selectcourse">
          <?php
            $qry3=$mysqli->query("select * from anx_2 inner join course on anx_2.course_id = course.course_id where anx_id='$anx_id'");
            while($row2=$qry3->fetch_array()){
            ?>
          <option value="<?php echo $row1['anx_id']; ?>"><?php echo $row2['course_name']; ?></option>
          <?php } ?>
            <?php
            include('../include/connection.php');
            $qry2=$mysqli->query("select * from anx_2 inner join course on anx_2.course_id = course.course_id where user_id='$u_id'");
            while($row=$qry2->fetch_array()){
            ?>
        <option value="<?php echo $row['anx_id']; ?>"><?php echo $row['course_name']; ?></option>
            <?php } ?>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="course_code" class="required">Enrollment Date</label>
        <div class=" input-group date" id="submitDate" data-target-input="nearest">
      <input type="text" name="form_date" required="required" class="form-control datetimepicker-input" value="<?php echo $form_date; ?>" data-target="#submitDate"/>
        <div class="input-group-append" data-target="#submitDate" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<br>
<div class="card">
  <div class="card-header bg-light">
    <h5><b>Candidate Details</b></h5>
  </div>
  <div class="card-body">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name" class="required">Name</label>
      <input type="text" name="name" class="form-control" value="<?php echo $row1['name']; ?>" required="required">
    </div>
    <div class="col-sm-3">
      <label for="dob" class="required">Date of Birth</label>
      <div class=" input-group date" id="dob" data-target-input="nearest">
      <input type="text" name="dob" required="required" class="form-control datetimepicker-input" value="<?php echo $dob; ?>" data-target="#dob"/>
        <div class="input-group-append" data-target="#dob" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
      </div>
  </div>
  <div class="col-md-3">
      <label for="gender" class="required">Gender</label>
        <select name="gender" class="form-control" required>
          <option value="<?php echo $row1['gender']; ?>"><?php echo $row1['gender']; ?></option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email_id">Email Id</label>
      <input type="email" class="form-control" required="required" name="email_id" value="<?php echo $row1['email']; ?>">
    </div>
    <div class="col-md-3">
      <label for="nationality" class="required">Nationality</label>
        <select name="nationality" class="form-control" required="required">
          <option value="Indian">Indian</option>
        </select>
    </div>
    <div class="form-group col-md-3">
      <label for="ph_no">Phone No.</label>
      <input type="number" class="form-control" name="ph_no" required="required" value="<?php echo $row1['contact_no']; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="father">Father's Name</label>
      <input type="text" class="form-control" name="father" required="required" value="<?php echo $row1['fathers_name']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="father_ph_no">Father's Phone No.</label>
      <input type="number" class="form-control" name="father_ph_no" required="required" value="<?php echo $row1['father_contact_no']; ?>">
    </div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="mother">Mother's Name</label>
        <input type="text" class="form-control" name="mother" required="required" value="<?php echo $row1['mother_name']; ?>">
  </div>
  <div class="form-group col-md-6">
      <label for="mother_ph_no">Mother's Phone No.</label>
      <input type="number" class="form-control" name="mother_ph_no" required="required" value="<?php echo $row1['mother_contact_no']; ?>">
    </div>
</div>

  </div>
</div>
<br>
<!-- candidate address (permanent) -->
<div class="card">
  <div class="card-header bg-light">
    <h5><b>Correspondance address of the candidate</b></h5>
  </div>
  <div class="card-body">
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="address" class="required">House No./Street/Locality</label>
      <input type="text" name="p_address" id="p_address" class="form-control" value="<?php echo $row1['cors_address']; ?>" required="required">
    </div>
  <div class="form-group col-md-3">
      <label for="Landmark" class="required">Landmark</label>
      <input type="text" name="p_land" id="p_land" class="form-control" value="<?php echo $row1['cors_land']; ?>" required="required">
    </div>
    <div class="form-group col-md-2">
      <label for="District" class="required">City / District</label>
      <input type="text" class="form-control" id="p_dist" name="p_dist" value="<?php echo $row1['cors_district']; ?>" required="required">
    </div>
    <div class="form-group col-md-2">
      <label for="State" class="required">State</label>
      <input type="text" class="form-control" id="p_state" name="p_state" value="<?php echo $row1['cors_state']; ?>" required="required">
    </div>
    <div class="form-group col-md-2">
      <label for="pin" class="required">Pin</label>
      <input type="number" class="form-control" id="p_pin" name="p_pin" value="<?php echo $row1['cors_pin']; ?>" required="required">
    </div>
  </div>
  </div>
</div>
<br>

<!-- candidate address (present) -->
<div class="card">
  <div class="card-header bg-light">
   <h5><b>Permanent address of the candidate</b></h5>(&nbsp;<input type="checkbox" id="same" name="same" onchange="addressFunction()"/><label for="same">&nbsp;If Same Select this&nbsp;)</label>
  </div>
  <div class="card-body">
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="address" class="required">House No./Street/Locality</label>
      <input type="text" name="pr_address" id="pr_address" class="form-control" value="<?php echo $row1['pr_address']; ?>" required="required">
    </div>
  
  <div class="form-group col-md-3">
      <label for="Landmark" class="required">Landmark</label>
      <input type="text" name="pr_land" id="pr_land" class="form-control" value="<?php echo $row1['pr_land']; ?>" required="required">
    </div>
    <div class="form-group col-md-2">
      <label for="District" class="required">City / District</label>
      <input type="text" class="form-control" id="pr_dist" name="pr_dist" value="<?php echo $row1['pr_district']; ?>" required="required">
    </div>
    <div class="form-group col-md-2">
      <label for="State" class="required">State</label>
      <input type="text" class="form-control" id="pr_state" name="pr_state" value="<?php echo $row1['pr_state']; ?>" required="required">
    </div>
    <div class="form-group col-md-2">
      <label for="pin" class="required">Pin</label>
      <input type="number" class="form-control" id="pr_pin" name="pr_pin" value="<?php echo $row1['pr_pin']; ?>" required="required">
    </div>
  </div>
  </div>
</div>
<br>

<!-- candidate education -->
<div class="card">
  <div class="card-header bg-light">
   <h5><b>Highest Educational qualification</b></h5>
  </div>
  <div class="card-body">
  <div class="form-row">
    <div class="form-group  col-sm-4">
      <label for="education" class="required">Highest Qualification</label>
      <input type="text" name="education" class="form-control" value="<?php echo $row1['education']; ?>" required="required">
    </div>
    <div class="form-group col-sm-4">
      <label for="course_strem" class="required">Course / Stream</label>
      <input type="text" class="form-control" name="course_strem" value="<?php echo $row1['course_strem']; ?>" required="required">
    </div>
    <div class="form-group  col-sm-4">
      <label for="e_ins_name" class="required">School/College Name with address</label>
      <input type="text" class="form-control" name="e_ins_name" value="<?php echo $row1['e_ins_name']; ?>" required="required">
    </div>
    <div class="form-group col-sm-4">
      <label for="e_board" class="required">University / Board</label>
      <input type="text" class="form-control" name="e_board" value="<?php echo $row1['e_board']; ?>" required="required">
    </div>
  <div class="form-group  col-sm-4">
      <label for="passing" class="required">Year of passing</label>
      <input type="number" name="pass_year" class="form-control" value="<?php echo $row1['pass_year']; ?>" required="required">
    </div>
    <div class="form-group  col-sm-4">
      <label for="permanent" class="required">Percentage</label>
      <input type="number" class="form-control" name="percent" value="<?php echo $row1['percent']; ?>" required="required">
    </div>
  </div>
  </div>
</div>
<br>

<!--Emergency details -->
<div class="card">
  <div class="card-header bg-light">
   <h5><b>Emergency Information</b></h5>
  </div>
  <div class="card-body">
  <div class="form-row">
    <div class="form-group col-sm-4">
      <label for="blood">Blood Group</label>
      <input type="text" name="blood" class="form-control" value="<?php echo $row1['blood_gr']; ?>">
    </div>
    <div class="form-group col-sm-4">
      <label for="alergic">Alergic to</label>
      <input type="text" class="form-control" name="alergic" value="<?php echo $row1['alergic_to']; ?>">
    </div>
    <div class="form-group col-sm-4">
      <label for="severe_disease">Severe Disease(if any)</label>
      <input type="text" class="form-control" name="severe_disease" value="<?php echo $row1['severe_disease']; ?>">
    </div>
  <div class="form-group col-sm-4">
      <label for="emrgency_name">During Emergency contact Name</label>
      <input type="text" name="emrgency_name" class="form-control" required="required" value="<?php echo $row1['emergency_name']; ?>">
    </div>
    <div class="form-group col-sm-4">
      <label for="Phone no">Phone no.</label>
      <input type="number" class="form-control" name="Phone_no" required="required" value="<?php echo $row1['emergency_contact_no']; ?>">
  </div>
    <div class="form-group col-sm-4">
      <label for="relation">Relation</label>
      <input type="text" class="form-control" name="relation" required="required" value="<?php echo $row1['emergency_relation']; ?>">
    </div>
  </div>
  </div>
</div>
<br>

<!-- Sport Proficiency -->
<div class="card">
  <div class="card-header bg-light">
   <h5><b>Other Details</b></h5>
  </div>
  <div class="card-body">
    <div class="form-row">
    <div class="col-md-4">
      <label for="course_code" class="required">Student's Occupation</label>
        <select name="occupation" class="form-control" required>
          <option value="<?php echo $row1['stdnt_ocu']; ?>"><?php echo $row1['stdnt_ocu']; ?></option>
          <option value="Student">Student</option>
          <option value="Business">Business</option>
          <option value="Govt. Service">Govt. Service</option>
          <option value="Others">Others</option>
        </select>
    </div>
    <div class="col-md-4">
      <label for="course_code" class="required">Father's Occupation</label>
        <select name="f_occupation" class="form-control" required>
          <option value="<?php echo $row1['father_ocu']; ?>"><?php echo $row1['father_ocu']; ?></option>
          <option value="Business">Business</option>
          <option value="Govt. Service">Govt. Service</option>
          <option value="Pvt. Service">Pvt. Service</option>
          <option value="Others">Others</option>
        </select>
    </div>
    <div class="col-md-4">
      <label for="course_code" class="required">Mother's Occupation</label>
        <select name="m_occupation" class="form-control" required>
          <option value="<?php echo $row1['mother_ocu']; ?>"><?php echo $row1['mother_ocu']; ?></option>
          <option value="Business">Business</option>
          <option value="Govt. Service">Govt. Service</option>
          <option value="Pvt. Service">Pvt. Service</option>
          <option value="Housewife">Housewife</option>
          <option value="Others">Others</option>
        </select>
    </div>
  </div>
</div>
</div>
<br>
<button class="btn btn-warning btn-block" type="submit" value="submit" name="update">Update</button>
<br>
</form>
<div class="card">
  <div class="card-header bg-light">
   <h5><b>Documents Upload</b></h5>
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
                <td style="width:40%">
                  <form method="post" action="" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to submit this form?');">
                  <div class="custom-file">
                  <input type="file" class="custom-file-input photo" name="photo" accept=".jpg,.jpeg,.png" required="required" id="photo" aria-describedby="photo">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <button class="btn btn-warning btn-block mt-2" type="submit" value="submit" name="photo">Update</button>
                </form>
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
                        <img src="../dist/img/student/<?php echo $row1['photo']; ?>" class=" img-fluid">
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
                  <form method="post" action="" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to submit this form?');">
                  <div class="custom-file">
                  <input type="file" class="custom-file-input sign" name="sign" accept=".jpg,.jpeg,.png" required="required" id="sign" aria-describedby="sign">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <button class="btn btn-warning btn-block mt-2" type="submit" value="submit" name="sign">Update</button>
                </form>
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
                        <img src="../dist/img/student/<?php echo $row1['sign']; ?>" class=" img-fluid">
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
                  <form method="post" action="" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to submit this form?');">
                  <div class="custom-file">
                  <input type="file" class="custom-file-input age" name="age" accept=".jpg,.jpeg,.png" required="required" id="age" aria-describedby="age">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <button class="btn btn-warning btn-block mt-2" type="submit" value="submit" name="age">Update</button>
                </form>
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
                        <img src="../dist/img/student/<?php echo $row1['age']; ?>" class=" img-fluid">
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
                  <form method="post" action="" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to submit this form?');">
                  <div class="custom-file">
                  <input type="file" class="custom-file-input graduation" name="graduation" accept=".jpg,.jpeg,.png" id="graduation" aria-describedby="graduation">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <button class="btn btn-warning btn-block mt-2" type="submit" value="submit" name="graduation">Update</button>
                </form>
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
                        <img src="../dist/img/student/<?php echo $row1['graduation']; ?>" alt="No Image" class=" img-fluid">
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
<?php } ?>
<br>
</div>






    <center>
      <?php
        echo $error;
      ?>
    </center>
        
         
    

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
  <script>
  $(function () {
    //Date picker
    $('#dob').datetimepicker({
         format: 'DD/MM/YYYY'
    });
    $('#submitDate').datetimepicker({
         format: 'DD/MM/YYYY'
    });
  })
</script>
<script type="text/javascript">
  document.querySelector('.photo').addEventListener('change',function(e){
  var fileName = document.getElementById("photo").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})
  document.querySelector('.sign').addEventListener('change',function(e){
  var fileName = document.getElementById("sign").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})
  document.querySelector('.age').addEventListener('change',function(e){
  var fileName = document.getElementById("age").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})
  document.querySelector('.graduation').addEventListener('change',function(e){
  var fileName = document.getElementById("graduation").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})
  </script>
  <script type="text/javascript">
            function addressFunction(){
              if (document.getElementById("same").checked) {
                document.getElementById("pr_address").value=document.getElementById("p_address").value;
                document.getElementById("pr_dist").value=document.getElementById("p_dist").value;
                document.getElementById("pr_pin").value=document.getElementById("p_pin").value;
                document.getElementById("pr_land").value=document.getElementById("p_land").value;
                document.getElementById("pr_state").value=document.getElementById("p_state").value;
              }else{
                document.getElementById("pr_address").value="";
                document.getElementById("pr_dist").value="";
                document.getElementById("pr_pin").value="";
                document.getElementById("pr_land").value="";
                document.getElementById("pr_state").value="";
              }
            }
         </script>