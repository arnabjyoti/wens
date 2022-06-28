<?php 
  $title = "New Enrollment";
  include('../include/header.php');

//date without back parenthesis
  $d = date("Y/m/d");
  $d = str_replace("/", "", $d);

//candidate serial no
	$aplc_id=0;
  $k=0;
	$q=$mysqli->query("select aplc_id from admsn_frm where u_id='$u_id'");
	while($r=$q->fetch_array())
	{
		$aplc_id=$r['aplc_id'];
	}

//split & increament ***/APPL/*
  $j = preg_split("#/#", $aplc_id);
  if(isset($j[2]))
  {
    $k = "$j[2]";
    $k++;
  }
  else
  {
    $k = 1;
  }
	
//split character & integer from user name
  preg_match_all("/[A-Z]+|\d+/", $user_name, $matches1);
  $n1 = $matches1[0][1];
  $sl_no = $n1."/APPL/".$k;

//discount check
  $qry3=$mysqli->query("select * from discount where u_id='$u_id' and discount_status='Approved'");
  if ($qry3->num_rows > 0)
  {
    while($row3=$qry3->fetch_array())
    {
      $start = $row3['start'];
      $end = $row3['end'];
      $percent = $row3['percent'];
    }
    $date_today = date("Y-m-d"); // this format is string comparable
    if ($start <= $date_today && $end >= $date_today)
    {
      $discount = $percent;
    }else
    {
      $discount = 0;
    }
  }else
  {
    $discount = 0;
  }
  $error = NULL;

//form submit
  if (isset($_POST['submit'])) {

//phptograph upload
  $photo = $_FILES['photo'];
  $filename = $photo['name'];
  $fileerror = $photo['error'];
  $filetmp = $photo['tmp_name'];
  list($width, $height) = getimagesize($filetmp);
  $filesize = $photo['size'];
  $fileext = explode('.', $filename);
  $filecheck = strtolower(end($fileext));  
  $fileextstored = array('jpg', 'jpeg');

//sign upload
  $photo1 = $_FILES['sign'];
  $filename1 = $photo1['name'];
  $fileerror1 = $photo1['error'];
  $filetmp1 = $photo1['tmp_name'];
  list($width1, $height1) = getimagesize($filetmp1);
  $filesize1 = $photo1['size'];
  $fileext1 = explode('.', $filename1);
  $filecheck1 = strtolower(end($fileext1));  
  $fileextstored1 = array('jpg', 'jpeg');
  
//age proof upload
  $photo2 = $_FILES['age'];
  $filename2 = $photo2['name'];
  $fileerror2 = $photo2['error'];
  $filetmp2 = $photo2['tmp_name'];
  $filesize2 = $photo2['size'];
  $fileext2 = explode('.', $filename2);
  $filecheck2 = strtolower(end($fileext2));  
  $fileextstored2 = array('png', 'jpg', 'jpeg');

//graduation certificate upload
  $photo3 = $_FILES['graduation'];
  $filename3 = $photo3['name'];
  $fileerror3 = $photo3['error'];
  $filetmp3 = $photo3['tmp_name'];
  $filesize3 = $photo3['size'];
  $fileext3 = explode('.', $filename3);
  $filecheck3 = strtolower(end($fileext3));  
  $fileextstored3 = array('png', 'jpg', 'jpeg');


if($width > 245 && $height > 310){
  echo '<script>alert("Photo Size not match")</script>';
}else{
  if ($width1 > 276 && $height1 > 100) {
    echo '<script>alert("Signature Size not match")</script>';
  }else{
    if ($filesize2 > 2000000) {
      echo '<script>alert("Age Proof Size not match")</script>';
    }else{
      if ($filesize3 > 2000000) {
        echo '<script>alert("Educational Certificate/marksheet Size not match")</script>';
      }else{
          $temp = explode(".", $filename);
          $newfilename = $d.round(microtime(true)) . 'photo'.'.' . end($temp);
          $destinationfile = '../dist/img/student/'.$newfilename;
          move_uploaded_file($filetmp, $destinationfile);
        }
        if(in_array($filecheck1, $fileextstored1))
        {
          $temp1 = explode(".", $filename1);
          $newfilename1 = round(microtime(true)) . 'sign'.'.' . end($temp1);
          $destinationfile1 = '../dist/img/student/'.$newfilename1;
          move_uploaded_file($filetmp1, $destinationfile1);
        }
        if(in_array($filecheck2, $fileextstored2))
        {
          $temp2 = explode(".", $filename2);
          $newfilename2 = round(microtime(true)) . 'age'.'.' . end($temp2);
          $destinationfile2 = '../dist/img/student/'.$newfilename2;
          move_uploaded_file($filetmp2, $destinationfile2);
        }
        if(in_array($filecheck3, $fileextstored3))
        {
          $temp3 = explode(".", $filename3);
          $newfilename3 = round(microtime(true)) . 'graduation'.'.' . end($temp3);
          $destinationfile3 = '../dist/img/student/'.$newfilename3;
          move_uploaded_file($filetmp3, $destinationfile3);
          $photo3  = $mysqli->real_escape_string($newfilename3);
        
        $photo  = $mysqli->real_escape_string($newfilename);
        $photo1  = $mysqli->real_escape_string($newfilename1);
        $photo2  = $mysqli->real_escape_string($newfilename2);
        $photo3  = $mysqli->real_escape_string($newfilename3);
        
      


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
        $name = $mysqli->real_escape_string(ucwords($name));
        $dob = $mysqli->real_escape_string($dob);
        $gender = $mysqli->real_escape_string($gender);
        $nationality = $mysqli->real_escape_string($nationality);
        $ph_no = $mysqli->real_escape_string($ph_no);
        $email_id = $mysqli->real_escape_string($email_id);
        $father = $mysqli->real_escape_string(ucwords($father));
        $father_ph_no = $mysqli->real_escape_string($father_ph_no);
        $mother = $mysqli->real_escape_string(ucwords($mother));
        $mother_ph_no = $mysqli->real_escape_string($mother_ph_no);
        $p_address = $mysqli->real_escape_string($p_address);
        $p_land = $mysqli->real_escape_string($p_land);
        $p_dist = $mysqli->real_escape_string(ucwords($p_dist));
        $p_state = $mysqli->real_escape_string(ucwords($p_state));
        $p_pin = $mysqli->real_escape_string($p_pin);
        $pr_address = $mysqli->real_escape_string($pr_address);
        $pr_land = $mysqli->real_escape_string($pr_land);
        $pr_dist = $mysqli->real_escape_string(ucwords($pr_dist));
        $pr_state = $mysqli->real_escape_string(ucwords($pr_state));
        $pr_pin = $mysqli->real_escape_string($pr_pin);
        $education = $mysqli->real_escape_string($education);
        $course_strem = $mysqli->real_escape_string($course_strem);
        $e_ins_name = $mysqli->real_escape_string($e_ins_name);
        $e_board = $mysqli->real_escape_string($e_board);
        $pass_year = $mysqli->real_escape_string($pass_year);
        $percent = $mysqli->real_escape_string($percent);
        $blood = $mysqli->real_escape_string(ucwords($blood));
        $alergic = $mysqli->real_escape_string($alergic);
        $severe_disease = $mysqli->real_escape_string($severe_disease);
        $emrgency_name = $mysqli->real_escape_string(ucwords($emrgency_name));
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

   $query = $mysqli->query("insert into admsn_frm(u_id, fee, anx_id, aplc_id, form_date, name, dob, gender, nationality, contact_no, email, fathers_name, father_contact_no, mother_name, mother_contact_no, cors_address, cors_land, cors_district, cors_state, cors_pin, pr_address, pr_land, pr_district, pr_state, pr_pin, education, course_strem, e_ins_name, e_board, pass_year, percent, blood_gr, alergic_to, severe_disease, emergency_name, emergency_contact_no, emergency_relation, stdnt_ocu, father_ocu, mother_ocu, photo, sign, age, graduation, discount) values('$u_id', '$fee', '$anx_id', '$sl_no', '$date', '$name', '$dob', '$gender', '$nationality', '$ph_no', '$email_id', '$father', '$father_ph_no', '$mother', '$mother_ph_no', '$p_address', '$p_land', '$p_dist', '$p_state', '$p_pin', '$pr_address', '$pr_land', '$pr_dist', '$pr_state', '$pr_pin','$education','$course_strem','$e_ins_name','$e_board','$pass_year','$percent','$blood','$alergic','$severe_disease','$emrgency_name','$Phone_no','$relation','$occupation','$f_occupation','$m_occupation','$photo','$photo1','$photo2','$photo3','$discount')");
    if($query )
    {
    header('location:enrollment.php');
    }else
    {
      echo $mysqli->error;
    }
    }
    }
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
<form method="post" action="" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to submit this form?');">

<div class="col-md-12 bg-white">
  <div class="" style="background-color: #fff; border-radius: 20px; text-align: center;"><b><?php echo $user_name;?></b><br> <?php echo $center_address; ?>
</div>
  <div class="mt-2 mb-3" style="background-color: #34ebbd; text-align: center; color: #fff;"><h3><b>ADMISSION FORM</b></h3>
  </div>

<!-- Sport Proficiency -->
<div class="card">
  <div class="card-header bg-light">
   <h5><b>Course Details</b></h5>
  </div>
  <div class="card-body">
    <div class="form-row">
    <div class="form-group col-md-9">
      <label for="course_code" class="required">Course</label>
        <select name="anx_id" class="form-control" required="required" id="selectcourse">
          <option></option>
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
      <input type="text" name="form_date" required="required" class="form-control datetimepicker-input" placeholder="Enrollment Date" data-target="#submitDate"/>
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
      <input type="text" name="name" class="form-control" placeholder="Name" required="required">
    </div>
    <div class="col-sm-3">
      <label for="dob" class="required">Date of Birth</label>
      <div class=" input-group date" id="dob" data-target-input="nearest">
      <input type="text" name="dob" required="required" class="form-control datetimepicker-input" placeholder="Date of Birth" data-target="#dob"/>
        <div class="input-group-append" data-target="#dob" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
      </div>
  </div>
  <div class="col-md-3">
      <label for="gender" class="required">Gender</label>
        <select name="gender" class="form-control" required>
          <option></option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email_id">Email Id</label>
      <input type="email" class="form-control" required="required" name="email_id" placeholder="Email Id">
    </div>
    <div class="col-md-3">
      <label for="nationality" class="required">Nationality</label>
        <select name="nationality" class="form-control" required="required">
          <option value="Indian">Indian</option>
        </select>
    </div>
    <div class="form-group col-md-3">
      <label for="ph_no">Phone No.</label>
      <input type="number" class="form-control" name="ph_no" required="required" placeholder="Phone Number">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="father">Father's Name</label>
      <input type="text" class="form-control" name="father" required="required" placeholder="Fathers Name">
    </div>
    <div class="form-group col-md-6">
      <label for="father_ph_no">Father's Phone No.</label>
      <input type="number" class="form-control" name="father_ph_no" required="required" placeholder="Fathers Phone No.">
    </div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="mother">Mother's Name</label>
        <input type="text" class="form-control" name="mother" required="required" placeholder="Mothers Name">
  </div>
  <div class="form-group col-md-6">
      <label for="mother_ph_no">Mother's Phone No.</label>
      <input type="number" class="form-control" name="mother_ph_no" required="required" placeholder="Mothers Phone No.">
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
      <input type="text" name="p_address" id="p_address" class="form-control" placeholder="House No./Street/Locality" required="required">
    </div>
  <div class="form-group col-md-3">
      <label for="Landmark" class="required">Landmark</label>
      <input type="text" name="p_land" id="p_land" class="form-control" placeholder="Landmark" required="required">
    </div>
    <div class="form-group col-md-2">
      <label for="District" class="required">City / District</label>
      <input type="text" class="form-control" id="p_dist" name="p_dist" placeholder="District" required="required">
    </div>
    <div class="form-group col-md-2">
      <label for="State" class="required">State</label>
      <input type="text" class="form-control" id="p_state" name="p_state" placeholder="State" required="required">
    </div>
    <div class="form-group col-md-2">
      <label for="pin" class="required">Pin</label>
      <input type="number" class="form-control" id="p_pin" name="p_pin" placeholder="Pin" required="required">
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
      <input type="text" name="pr_address" id="pr_address" class="form-control" placeholder="House No./Street/Locality" required="required">
    </div>
  
  <div class="form-group col-md-3">
      <label for="Landmark" class="required">Landmark</label>
      <input type="text" name="pr_land" id="pr_land" class="form-control" placeholder="Landmark" required="required">
    </div>
    <div class="form-group col-md-2">
      <label for="District" class="required">City / District</label>
      <input type="text" class="form-control" id="pr_dist" name="pr_dist" placeholder="District" required="required">
    </div>
    <div class="form-group col-md-2">
      <label for="State" class="required">State</label>
      <input type="text" class="form-control" id="pr_state" name="pr_state" placeholder="State" required="required">
    </div>
    <div class="form-group col-md-2">
      <label for="pin" class="required">Pin</label>
      <input type="number" class="form-control" id="pr_pin" name="pr_pin" placeholder="Pin" required="required">
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
      <input type="text" name="education" class="form-control" placeholder="B.E./B.Tech/etc." required="required">
    </div>
    <div class="form-group col-sm-4">
      <label for="course_strem" class="required">Course / Stream</label>
      <input type="text" class="form-control" name="course_strem" placeholder="Science / Arts" required="required">
    </div>
    <div class="form-group  col-sm-4">
      <label for="e_ins_name" class="required">School/College Name with address</label>
      <input type="text" class="form-control" name="e_ins_name" placeholder="School/College Name with address" required="required">
    </div>
    <div class="form-group col-sm-4">
      <label for="e_board" class="required">University / Board</label>
      <input type="text" class="form-control" name="e_board" placeholder="Board/University Name" required="required">
    </div>
  <div class="form-group  col-sm-4">
      <label for="passing" class="required">Year of passing</label>
      <input type="number" name="pass_year" class="form-control" placeholder="Year of passing" required="required">
    </div>
    <div class="form-group  col-sm-4">
      <label for="permanent" class="required">Percentage</label>
      <input type="number" class="form-control" name="percent" placeholder="%" required="required">
    </div>
  </div>
  </div>
</div>
<br>

<!-- other qualification -->
<div class="card">
  <div class="card-header bg-light">
   <h5><b>Emergency Information</b></h5>
  </div>
  <div class="card-body">
  <div class="form-row">
    <div class="form-group col-sm-4">
      <label for="blood">Blood Group</label>
      <input type="text" name="blood" class="form-control" placeholder="Blood Group">
    </div>
    <div class="form-group col-sm-4">
      <label for="alergic">Alergic to</label>
      <input type="text" class="form-control" name="alergic" placeholder="Alergic to">
    </div>
    <div class="form-group col-sm-4">
      <label for="severe_disease">Severe Disease(if any)</label>
      <input type="text" class="form-control" name="severe_disease" placeholder="Severe Disease">
    </div>
  <div class="form-group col-sm-4">
      <label for="emrgency_name">During Emergency contact Name</label>
      <input type="text" name="emrgency_name" class="form-control" required="required" placeholder="Name">
    </div>
    <div class="form-group col-sm-4">
      <label for="Phone no">Phone no.</label>
      <input type="number" class="form-control" name="Phone_no" required="required" placeholder="Phone No">
  </div>
    <div class="form-group col-sm-4">
      <label for="relation">Relation</label>
      <input type="text" class="form-control" name="relation" required="required" placeholder="Relation">
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
          <option></option>
          <option value="Student">Student</option>
          <option value="Business">Business</option>
          <option value="Govt. Service">Govt. Service</option>
          <option value="Others">Others</option>
        </select>
    </div>
    <div class="col-md-4">
      <label for="course_code" class="required">Father's Occupation</label>
        <select name="f_occupation" class="form-control" required>
          <option></option>
          <option value="Business">Business</option>
          <option value="Govt. Service">Govt. Service</option>
          <option value="Pvt. Service">Pvt. Service</option>
          <option value="Others">Others</option>
        </select>
    </div>
    <div class="col-md-4">
      <label for="course_code" class="required">Mother's Occupation</label>
        <select name="m_occupation" class="form-control" required>
          <option></option>
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
<div class="card">
  <div class="card-header bg-light">
   <h5><b>Documents Upload</b></h5>
  </div>
  <div class="card-body">
    <div class="form-row">
  <div class="form-group col-sm-4">
    <label class="col-form-label">Photograph:</label>
    <p class="p-0 m-0"><small class="text-muted">Dimension should be below 245 x 310 pixels (preferred)</small></p>
      <div class="custom-file">
        <input type="file" class="custom-file-input photo" name="photo" accept=".jpg,.jpeg" required="required" id="photo" aria-describedby="photo">
        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
    </div>
  </div>
  <div class="form-group col-sm-4">
    <label class="col-form-label">Signature:</label>
    <p class="p-0 m-0"><small class="text-muted">Dimension should be below 100 x 276 pixels (preferred)</small></p>
      <div class="custom-file">
        <input type="file" class="custom-file-input sign" name="sign" accept=".jpg,.jpeg" required="required" id="sign" aria-describedby="sign">
        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
    </div>
  </div>
  <div class="form-group col-sm-4">
    <label class="col-form-label">Age Proof:</label>
    <p class="p-0 m-0"><small class="text-muted">Maximum size of image should be between 2MB</small></p>
      <div class="custom-file">
        <input type="file" class="custom-file-input age" name="age" accept=".jpg,.jpeg,.png" required="required" id="age" aria-describedby="age">
        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
    </div>
  </div>

   <div class="form-group col-sm-4 pgdca" id="pgdca">
    <label class="col-form-label">Educational Certificate/marksheet:</label>
    <p class="p-0 m-0"><small class="text-muted">Maximum size of image should be between 2MB</small></p>
      <div class="custom-file">
        <input type="file" class="custom-file-input graduation" name="graduation" accept=".jpg,.jpeg,.png" id="graduation" aria-describedby="graduation" required="required">
        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
    </div>
  </div>


</div>
</div>
</div>
<br>
<div class="card">
  <div class="card-header bg-light">
   <h5><b>Declaration</b></h5>
  </div>
  <div class="card-body">
<p class="text-justify p-3">
<input type="checkbox" id="declare" name="declare" value="declare" required>
  <span>I do hereby declare that all the particulars given above are true to the best of my knowledge and belief and if any mistake / misinformation, detected at any stage in future, will result in the cancellation of candidature. I shall abide by all the terms and conditions therein.</span></p>
    </div>
  </div>
      <br><center>
      <button class="btn btn-success btn-center" type="submit" value="submit" name="submit">Submit</button>
      </center>
<br>
</div>
</form>





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

  var _URL = window.URL || window.webkitURL;
  if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
          if (this.width>245 || this.height> 310) {
            // alert("width : "+this.width + " and height : " + this.height + ". (Dimension should be below 245 x 310 pixels)");
            console.log("Width is ==> ",this.width);
            document.getElementById("photo").setCustomValidity("Dimension should be below 245 x 310 pixels");
            document.getElementById("photo").reportValidity();
          }else{
            console.log("Else condition");
            document.getElementById("photo").setCustomValidity("");
          }
          
        };
        img.src = _URL.createObjectURL(file);
    }
})
  document.querySelector('.sign').addEventListener('change',function(e){
  var fileName = document.getElementById("sign").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName

  var _URL = window.URL || window.webkitURL;
  if ((file = this.files[0])) {
        img = new Image();

        img.onload = function () {
          if (this.width>276 || this.height> 100) {
            // alert("width : "+this.width + " and height : " + this.height + ". (Dimension should be below 100 x 276 pixels)");
            console.log(this.width);
            document.getElementById("sign").setCustomValidity("Dimension should be below 100 x 276 pixels");
            document.getElementById("sign").reportValidity();
          }else{
            document.getElementById("sign").setCustomValidity("");
          }
        };
        img.src = _URL.createObjectURL(file);
    }


  var ss = e.target.height;
  console.log("k", document.getElementById("sign").files[0].size);
})
  document.querySelector('.age').addEventListener('change',function(e){
  var fileName = document.getElementById("age").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName

  var ageSize = document.getElementById("age").files[0].size;
  var maxAge = 2097152;
    if (ageSize>maxAge) {
      this.setCustomValidity("Please upload less than 2MB image");
      this.reportValidity();
    }else{
      console.log(this);
      this.setCustomValidity("");
    }
})
  document.querySelector('.graduation').addEventListener('change',function(e){
  var fileName = document.getElementById("graduation").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName

  var graduationSize = document.getElementById("graduation").files[0].size;
  var maxGraduation = 2097152;
    if (graduationSize>maxGraduation) {
      this.setCustomValidity("Please upload less than 2MB image");
      this.reportValidity();
    }else{
      this.setCustomValidity("");
    }
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
