  <?php 
  $student_id=$_GET['id'];
  $title=$_GET['nm'];
  include('../include/session.php');
  $qry4=$mysqli->query("select * from admsn_frm join admin on admsn_frm.u_id = admin.u_id where id='$student_id'");
      while($row4=$qry4->fetch_array()){
        $center_id = $row4['u_id'];
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
    ?> | <?php echo $title; ?></title>

  <link rel="stylesheet" type="text/css" href="../dist/css/print.css" media="print">
  <link rel="stylesheet" type="text/css" href="../dist/css/style.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="shortcut icon" href="#">
</head>
<?php
    if ($role == 'client' && $center_id == $u_id || $role == 'admin') {
    ?>
<body>
      <div class="container-fluid">
        <?php
            include('../include/connection.php');
            $qry2=$mysqli->query("select * from admin where u_id='$center_id'");
            while($row2=$qry2->fetch_array()){
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
  <div class="mt-2 mb-3" style="background-color: #34ebbd; text-align: center; color: #fff; -webkit-print-color-adjust: exact;"><h3><b>ADMISSION FORM</b></h3>
  </div>
<?php
$qry5=$mysqli->query("select * from admsn_frm join anx_2 on admsn_frm.anx_id = anx_2.anx_id join course on anx_2.course_id = course.course_id where admsn_frm.id='$student_id' and u_id='$center_id'");
      while($row5=$qry5->fetch_array()){
        $anx_id = $row5['anx_id'];
        $name = $row5['name'];
        $course_name = $row5['course_name'];
        //dob format change
        $dob = $row5['dob'];
        $dob = str_replace('-', '/', $dob);
        $dob = date('d/m/Y', strtotime($dob));
        //enrolment date format change
        $form_date = $row5['form_date'];
        $form_date = str_replace('-', '/', $form_date);
        $form_date = date('d/m/Y', strtotime($form_date));
      ?>
      <div class="tbl">
   <table style="width:100%" class="table-striped">
  <tr>
    <th>Enrollment ID:</th>
    <td colspan="3"><?php echo $row5['enrollment_id']; ?></td>
  </tr>
  <tr>
    <th>Course</th>
    <?php
      $qry3=$mysqli->query("select * from anx_2 inner join course on anx_2.course_id = course.course_id where anx_id='$anx_id'");
          while($row3=$qry3->fetch_array()){
            ?>
          
    <td colspan="3">
      <?php echo $row3['course_code']; ?> -
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
      <img src="../dist/img/student/<?php echo $row5['photo']; ?>" type="file" height="140px" width="130px" name="photo" value="<?php echo $photo; ?>"><br><b>Photograph</b>
    </center></td>
  </tr>
  <tr>
    <th>Date of birth:</th>
    <td colspan="2"><?php echo $dob; ?></td>
  </tr>
  <tr>
    <th>Gender:</th>
    <td colspan="2"><?php echo $row5['gender']; ?></td>
  </tr>
  <tr>
    <th>Email:</th>
    <td colspan="2"><?php echo $row5['email']; ?></td>
  </tr>
  <tr>
    <th>Mobile No.:(+91)</th>
    <td colspan="2"><?php echo $row5['contact_no']; ?></td>
  </tr>
  <tr>
    <th>Nationality:</th>
    <td colspan="2"><?php echo $row5['nationality']; ?></td>
  </tr>
  <tr>
    <th>Father's Name:</th>
    <td colspan="2"><?php echo $row5['fathers_name']; ?></td>
    <td style="width: 210px; height: 50px;" rowspan="4" class="p-0 b-0" >
    <center class="p-0 b-0">
      <img src="../dist/img/student/<?php echo $row5['sign']; ?>" type="file" height="60px" width="200px" name="sign" value="<?php echo $sign; ?>"><br><b>Signature</b>
    </center></td>
  </tr>
  <tr>
    <th>Father's Phone No.:</th>
    <td colspan="2"><?php echo $row5['father_contact_no']; ?></td>
  </tr>
  <tr>
    <th>Mother's Name:</th>
    <td colspan="2"><?php echo $row5['mother_name']; ?></td>
  </tr>
  <tr>
    <th>Mother's Phone No.:</th>
    <td colspan="2"><?php echo $row5['mother_contact_no']; ?></td>
  </tr>
  <tr>
    <th colspan="2" class="bg-clr">Address:<p>(Correspondance Address)</p></th>
    <th colspan="2" class="bg-clr">Address:<p>(Parmanent Address)</p></th>
  </tr>
  <tr>
    <th>House No./Street/Locality:</th>
    <td ><?php echo $row5['cors_address']; ?></td>

    <th>House No./Street/Locality:</th>
    <td ><?php echo $row5['pr_address']; ?></td>
  </tr>
  <tr>
    <th>Landmark:</th>
    <td ><?php echo $row5['cors_land']; ?></td>

    <th>Landmark:</th>
    <td ><?php echo $row5['pr_land']; ?></td>
  </tr>
  <tr>
    <th>City / District:</th>
    <td><?php echo $row5['cors_district']; ?></td>

    <th>City / District:</th>
    <td><?php echo $row5['pr_district']; ?></td>
  </tr>
  <tr>
    <th>State:</th>
    <td><?php echo $row5['cors_state']; ?></td>

    <th>State:</th>
    <td><?php echo $row5['pr_state']; ?></td>
  </tr>
  <tr>
    <th>Pin:</th>
    <td><?php echo $row5['cors_pin']; ?></td>

    <th>Pin:</th>
    <td><?php echo $row5['pr_pin']; ?></td>
  </tr>
    <tr>
    <th colspan="2" class="bg-clr">Highest Educational qualification:</th>
    <th colspan="2" class="bg-clr">Emergency Information:</th>
  </tr>
  <tr>
    <th>Highest Qualification:</th>
    <td><?php echo $row5['education']; ?></td>

    <th>Blood Group:</th>
    <td><?php echo $row5['blood_gr']; ?></td>
</tr>
    <tr>
    <th>Course / Stream:</th>
    <td><?php echo $row5['course_strem']; ?></td>

    <th>Alergic to:</th>
    <td><?php echo $row5['alergic_to']; ?></td>
</tr>
    <tr>
    <th>School/College Name with address:</th>
    <td><?php echo $row5['e_ins_name']; ?></td>

    <th>Severe Disease(if any):</th>
    <td><?php echo $row5['severe_disease']; ?></td>
</tr>
    <tr>
    <th>University / Board:</th>
    <td ><?php echo $row5['e_board']; ?></td>

    <th>During Emergency contact Name:</th>
    <td><?php echo $row5['emergency_name']; ?></td>
  </tr>
    <tr>
    <th>Year of passing:</th>
    <td><?php echo $row5['pass_year']; ?></td>

     <th>Phone no.:</th>
    <td><?php echo $row5['emergency_contact_no']; ?></td>
  </tr>
  <tr>
    <th>Percentage:</th>
    <td><?php echo $row5['percent']; ?></td>

    <th>Relation:</th>
    <td><?php echo $row5['emergency_relation']; ?></td>
  </tr>
<tr>
  <th colspan="4" class="bg-clr">Other Details:</th>
  </tr>
  <tr>
    <th>Student's Occupation:</th>
    <td colspan="3"><?php echo $row5['stdnt_ocu']; ?></td>
</tr>
    <tr>
    <th>Father's Occupation:</th>
    <td colspan="3"><?php echo $row5['father_ocu']; ?></td>
</tr>
    <tr>
    <th>Mother's Occupation:</th>
    <td colspan="3"><?php echo $row5['mother_ocu']; ?></td>
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
<br>
</div>
</div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

<script>
  window.addEventListener("load", window.print());
</script>
</body>
<?php }else{ 
      echo "<script type='text/javascript'>alert('You are not authorized to access.');
    window.location.href='dashboard.php';</script>";
  } ?>
    </html>