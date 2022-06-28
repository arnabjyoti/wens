
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Certificate Verification</title>

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="dist/img/adrp-logo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="dist/css/adminlte.min.css" rel="stylesheet">
  <link href="plugins/aos/aos.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link rel="stylesheet" type="text/css" href="dist/css/style1.css">
  <link rel="stylesheet" type="text/css" href="dist/css/style.css">
</head>
<body>
  
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex pt-5">
    <div class="container position-relative text-center text-lg-left pt-5" data-aos="fade-up" data-aos-delay="100">
      <div class="row text-center">
        <div class="col-lg-12">
          <h1>Welcome to <span>Wens Link Ghuguha</span></h1>
          <h2>Certificate Verification</h2>
          <br>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
          <form method="post" action="">
            <div class="form-group col-md-8 offset-md-2">
            <input type="text" name="certificate_no" class="form-control form-control-sm" id="cn" required="required" >
          </div>

          <div class="btns">
            <button type="submit" name="submit" class="btn-menu animated fadeInUp scrollto">Verify</button>
            <br>
        <br>
          </div>
        </form>
        </div>
        <div class="col-lg-4"></div>
        <?php 
$error = NULL;
//connect to database
  include('include/connection.php');
  if(isset($_POST['submit'])){
  
  //get form data
  $certificate_no = $mysqli->real_escape_string($_POST['certificate_no']);
  // query the database
  $resultSet = $mysqli->query("select * from admsn_frm join anx_2 on admsn_frm.anx_id = anx_2.anx_id join course on anx_2.course_id = course.course_id join admin on admin.u_id = admsn_frm.u_id where certificate_no = '$certificate_no'");
  if($resultSet->num_rows != 0) {
    // process login
    $row = $resultSet->fetch_assoc();
    $name = $row['name'];
    $roll_no = $row['enrollment_id'];
    $duration_hrs = $row['duration_hrs'];
    $certificate_date = $row['certificate_date'];
    //enrolment date format change
    $certificate_date1 = str_replace('-', '/', $certificate_date);
    $certificate_date1 = date('d/m/Y', strtotime($certificate_date1));;
    $course_name = $row['course_name'];
    $duration = $row['duration'];
    $duration_hrs = $row['duration_hrs'];
    $theory_mark = $row['theory_mark'];
    $prectical_mark = $row['prectical_mark'];
    $center_location = $row['center_location'];
    $score = $theory_mark+$prectical_mark;
    $user_name = $row['user_name'];
    preg_match_all("/[A-Z]+|\d+/", $user_name, $matches1);
    $code = $matches1[0][1];
    ?>
    <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <div class="tbl p-2 bg-white">
   <table style="width:100%" class="table-striped">
  <tr>
    <th>Certificate No.:</th>
    <td><?php echo $certificate_no; ?></td>
  </tr>
  <tr>
    <th>Student Name:</th>
    <td>
      <?php echo $name; ?>
    </td>
  </tr>
  <tr>
    <th>Roll No.:</th>
    <td>
      <?php echo $roll_no; ?>
    </td>
  </tr>
  <tr>
    <th>Date of Issue:</th>
    <td>
      <?php echo $certificate_date1; ?>
    </td>
  </tr>
  <tr>
    <th>Course Name:</th>
    <td>
      <?php echo $course_name; ?>
    </td>
  </tr>
  <tr>
    <th>Duration:</th>
    <td>
      <?php echo $duration; ?> Months (<?php echo $duration_hrs; ?> Hrs.)
    </td>
  </tr>
  <tr>
    <th>Score:</th>
    <td>
      <?php echo $score; ?> %
    </td>
  </tr>
  <tr>
    <th>Study Center:</th>
    <td>
      <?php echo ucfirst($center_location). " "."(CC-" .$code. ")"; ?>
    </td>
  </tr>
</table>
</div>
        </div>
        <?php
  }else{
    $resultSet1 = $mysqli->query("select * from old_data join course on old_data.course = course.course_id join admin on admin.u_id = old_data.center where certificate_no = '$certificate_no'");
  if($resultSet1->num_rows != 0) {
    // process login
    $row1 = $resultSet1->fetch_assoc();
    $name = $row1['student_name'];
    $roll_no = $row1['roll_no'];
    $duration_hrs = $row1['duration_hrs'];
    $certificate_date = $row1['date_issue'];
    //enrolment date format change
    $certificate_date1 = str_replace('-', '/', $certificate_date);
    $certificate_date1 = date('d/m/Y', strtotime($certificate_date1));

    $course_name = $row1['course_name'];
    $duration = $row1['duration'];
    $score = $row1['score'];
    $center_location = $row1['center_location'];
    $user_name = $row1['user_name'];
    preg_match_all("/[A-Z]+|\d+/", $user_name, $matches1);
    $code = $matches1[0][1];
    ?>
    <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <div class="tbl p-2 bg-white">
   <table style="width:100%" class="table-striped">
  <tr>
    <th>Certificate No.:</th>
    <td><?php echo $certificate_no; ?></td>
  </tr>
  <tr>
    <th>Student Name:</th>
    <td>
      <?php echo $name; ?>
    </td>
  </tr>
  <tr>
    <th>Roll No.:</th>
    <td>
      <?php echo $roll_no; ?>
    </td>
  </tr>
  <tr>
    <th>Date of Issue:</th>
    <td>
      <?php echo $certificate_date1; ?>
    </td>
  </tr>
  <tr>
    <th>Course Name:</th>
    <td>
      <?php echo $course_name; ?>
    </td>
  </tr>
  <tr>
    <th>Duration:</th>
    <td>
      <?php echo $duration; ?> Months (<?php echo $duration_hrs; ?> Hrs.)
    </td>
  </tr>
  <tr>
    <th>Score:</th>
    <td>
      <?php echo $score; ?> %
    </td>
  </tr>
  <tr>
    <th>Study Center:</th>
    <td>
      <?php echo ucfirst($center_location). "(" .$code. ")"; ?>
    </td>
  </tr>
</table>
</div>
        </div>
    <?php 
  }else{ ?>
    <div class="col-lg-12 text-center text-white">No Data Found!</div>
  <?php }
  }
 }
?>
      </div>
    </div>
  </section>
  <!-- End Hero -->

  
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright text-center p-2">
        All rights reserved || Developed by <a class="bklink" href="https://adrp.in" target='_blank'>ADRP Computer (P) Ltd.</a>
      </div>
    </div>
  </footer>
  <!-- End Footer -->



  
  <!-- Vendor JS Files -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/jquery-mask/jquery.mask.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="plugins/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="dist/js/main.js"></script>

<script>
  $(document).ready(function($){
    $('#cn').mask("CN/999/9999", {placeholder:"CN/___/____"});
  });
</script>
</body>
</html>

