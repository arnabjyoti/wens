  <?php 
  $title = "Staff Details";
  include('../include/header.php');


if(isset($_POST['delete'])){
  //get form data
  $s_id  = $mysqli->real_escape_string($_POST['s_id']);
  // query the database
  $resultSet = $mysqli->query("delete from staff where staff_id='$s_id' and u_id='$u_id'");
  if($resultSet)
     {
       header('location:staff-details.php');
     }
   else
     {
      echo $mysqli->mysqli_error();
     }
}

  if(isset($_POST['submit'])){

$photo = $_FILES['staff_img'];
  

  $filename = $photo['name'];
  $fileerror = $photo['error'];
  $filetmp = $photo['tmp_name'];
  $filesize = $photo['size'];
  $fileext = explode('.', $filename);
  $filecheck = strtolower(end($fileext));  
  $fileextstored = array('png', 'jpg', 'jpeg');
  if(in_array($filecheck, $fileextstored)){
    $temp = explode(".", $filename);
    $newfilename = round(microtime(true)) . 'aa'.'.' . end($temp);
    $destinationfile = '../dist/img/staff_img/'.$newfilename;
    move_uploaded_file($filetmp, $destinationfile);
  }

if($filesize > 8290832){
      echo '<script>alert("Photo Size is grater than 6MB")</script>';
    }elseif($filesize < 10400){
      echo '<script>alert("Photo Size is less then 10KB")</script>'; 
    }else{
     
      $photo  = $mysqli->real_escape_string($newfilename);
      


  //get form data
  $full_name = $mysqli->real_escape_string($_POST['full_name']);
  $aca_quali = $mysqli->real_escape_string($_POST['aca_quali']);
  $cmp_quali = $mysqli->real_escape_string($_POST['cmp_quali']);
  $date_of_join = $mysqli->real_escape_string($_POST['date_of_join']);
  $job_roll = $mysqli->real_escape_string($_POST['job_roll']);
  $skill  = $mysqli->real_escape_string($_POST['skill']);
  //conver date into database format
  $date = str_replace('/', '-', $date_of_join);
  $date = date('Y-m-d', strtotime($date));
 
  // query the database
  $resultSet1 = $mysqli->query("insert into staff (full_name, aca_quali, cmp_quali, date_of_join, job_roll, skill, staff_img, u_id) values('$full_name', '$aca_quali', '$cmp_quali', '$date', '$job_roll', '$skill', '$photo', '$u_id')");
  if($resultSet1)
     {
        header('location:staff-details.php');
     }
   else
     {
        echo $mysqli->mysqli_error();
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
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
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
                <a href="staff-details.php" class="nav-link active">
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
          <li class="nav-item">
            <a href="#" class="nav-link">
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
            <h1 class="m-0">Staff Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="deshboard.php">Home</a></li>
              <li class="breadcrumb-item active">Staff Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      
        <!-- Main row -->
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">

            <?php
                      include('../include/connection.php');
                      $qry2=$mysqli->query("select * from staff where u_id=$u_id");
                      while($row=$qry2->fetch_array()){
                        $date_of_join = $row['date_of_join'];
                        //date of joinng format change
                        $date_join = str_replace('-', '/', $date_of_join);
                        $date_join = date('d/m/Y', strtotime($date_join));
                            ?>

            <div class="col-12 col-sm-12 col-md-12 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-5 col-sm-4 col-md-2 text-center">
                      <img src="../dist/img/staff_img/<?php echo $row['staff_img']; ?>" alt="user-avatar" class=" img-fluid border">
                      <br>
                      <h2 class="lead pt-3 text-uppercase"><b><?php echo $row['full_name']; ?></b></h2>
                    </div>
                    <div class="col-7 col-sm-8 col-md-10">
                      <ul class="m-0 fa-ul text-muted">
                        <li class="h7 pt-3"><i class="fas fa-user-tag"></i> Job Roll: <?php echo $row['job_roll']; ?></li>
                        <li class="h7 pt-3"><i class="fas fa-calendar-alt"></i><b> Date of Joining: </b> <?php echo $date_join; ?></li>
                        <li class="h7 pt-3"><i class="fas fa-user-graduate"></i><b> Academic Qualification: </b> <?php echo $row['aca_quali']; ?></li>
                        <li class="h7 pt-3"><i class="fas fa-chalkboard-teacher"></i><b> Computer Qualification: </b> <?php echo $row['cmp_quali']; ?></li>
                        <?php if ($row['job_roll'] == "Faculty") {
                        ?>
                        <li class="h7 pt-3"><i class="fas fa-atom"></i><b> Skill: </b> <?php echo $row['skill']; ?></li>
                        <?php }
                      else{

                      } ?>
                      </ul>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <ul class="m-0 fa-ul text-muted">
                        
                      
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <form action="" method="POST" onsubmit="return confirm('Are you sure you want to Delete <?php echo $row['full_name']; ?>?');">
                      <input type="hidden" name="s_id" value="<?php echo $row['staff_id']; ?>">
                    <input type="submit" name="delete" class="btn btn-sm btn-danger" value="Delete"> 
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
        <!-- /.card-body -->
        
      </div>
      <!-- /.card  -->
          </div>
          
        </div>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->
     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-plus"></i> Add Staff details
              </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Staff details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                  <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Full Name:</label>
                  <div class="col-sm-8">
                <input type="text" name="full_name" required="required" class="form-control" placeholder="Full Name">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Academic Qualification:</label>
    <div class="col-sm-8">
  <select class="form-control" name="aca_quali" required="required" id="exampleFormControlSelect1">
    <option value="HSLC">HSLC</option>
    <option value="HS">HS</option>
    <option value="Graduate">Graduate</option>
    <option value="Post Graduate">Post Graduate</option>
  </select>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Computer Qualification:</label>
    <div class="col-sm-8">
  <input type="text" class="form-control" required="required" name="cmp_quali" placeholder="Computer Qualification">
    </div>
  </div>
   <div class="form-group row">
    <label class="col-sm-4 col-form-label">Date of Joining:</label>
    <div class="col-sm-8 input-group date" id="joiningDate" data-target-input="nearest">
      <input type="text" name="date_of_join" required="required" class="form-control datetimepicker-input" placeholder="Date of Joining" data-target="#joiningDate"/>
        <div class="input-group-append" data-target="#joiningDate" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
      </div>
  </div>
   <div class="form-group row">
    <label class="col-sm-4 col-form-label">Job Roll:</label>
    <div class="col-sm-8">
  <select class="form-control" name="job_roll" required="required" id="myselect">
    <option value="Center In-Charge">Center In-Charge</option>
    <option value="PRO/ Counselor">PRO/ Counselor</option>
    <option value="Faculty">Faculty</option>
    <option value="MPW">MPW</option>
  </select>
    </div>
  </div>
  <div class="forms" id="Form1">
   <div class="form-group row">
    <label class="col-sm-4 col-form-label">Skill:</label>
    <div class="col-sm-8">
  <input type="text" class="form-control" name="skill" placeholder="Skill">
    </div>
  </div>
</div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Image Upload:</label>
    <div class="col-sm-8">
      <div class="custom-file">
        <input type="file" class="custom-file-input photo" name="staff_img" accept=".jpg,.jpeg,.png" required="required" id="photo" aria-describedby="myInput">
        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
      </div>
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-12">
      <button type="submit" name="submit" class="btn float-right btn-primary">Sumbit</button>
    </div>
  </div>
</form>


    
    </div>
    </div>
  </div>
  </div>
</div>
</div>
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
  <script type="text/javascript">
    $(function() {
    $(".forms").hide();
    $("#myselect").change(function() {
        switch($(this).val()){ 
            case "Faculty":
                $(".forms").hide().parent().find("#Form1").show();
                break;
            default:
                $(".forms").hide().parent().find("#Form1").hide();
                break;
        }
    });
});

  document.querySelector('.photo').addEventListener('change',function(e){
  var fileName = document.getElementById("photo").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})
  
  </script>
  <script>
  $(function () {
    //Date picker
    $('#joiningDate').datetimepicker({
        format: 'DD/MM/YYYY'
    });
  })
</script>