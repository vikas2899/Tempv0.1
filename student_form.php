<?php
ob_start();
define('myheader',TRUE);
require('header.php');
session_start();
$_SESSION['fromAdminDash'] = '1';
$_SESSION['fromMain'] = true;
if($_SESSION['manage']!='1'){
  header('location:login.php');
  session_destroy();
}
else{  
    $_SESSION['manage'] = '0';
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
  document.getElementById("drop").style.display = "none";
  document.getElementById("logout").style.display = "block";

</script>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="simple-sidebar.css" rel="stylesheet">
</head>
<script type="text/javascript">
  document.getElementById("alloc").disabled = true;
  document.getElementById("alloc").style.pointerEvents="none";
document.getElementById("alloc").style.cursor="default";
</script>      
</body>
</html>
<?php
}
$_SESSION['fromMain'] = true;
define('fromM',TRUE);
//require('student_addData.php');
?>
<div class="d-flex" id="wrapper">
      <div class="bg-light border-right" id="sidebar-wrapper" style="margin-top:-7px;">
          <div class="sidebar-heading"><?php echo "Welcome Admin"?></div>
          <div class="list-group list-group-flush">
            <a href="login_configure.php" class="list-group-item list-group-item-action bg-light" id="dash" href="student_form.php">Dashboard</a>
            <a href="manage_student.php" class="list-group-item list-group-item-action bg-light" id="alloc">Manage Student</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Manage Building</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Manage Employee</a>
            <a href="student_profile.php" class="list-group-item list-group-item-action bg-light">Profile</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Setting</a>
          </div>
      </div>
      <div id="page-content-wrapper">
          <div class="container-fluid">

                  <div class="d1" style="width:50%;margin:0px auto;">
      <form action="student_addData.php" method="post">
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
              </div>
              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="name" name="firstname" autocomplete="off" required>
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Guardian's Name</span>
              </div>
              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="gname" name="gname" autocomplete="off" required>
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">E-mail</span>
              </div>
              <input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="email" name="email" autocomplete="off" required>
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Residential Address</span>
              </div>
              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="raddress" name="raddress" autocomplete="off" required>
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Phone</span>
              </div>
              <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="phone" name="phone" autocomplete="off" required>
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Institute</span>
              </div>
              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="institute" name="institute" autocomplete="off" required>
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Gender</span>
              </div>    
              <select class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="gender" name="gender">
                  <option value="male">Male</option>
                  <option value="female">Female</option>
              </select>
          </div>
          <button type="submit" name="submit" class="btn btn-primary btn-md btn-block" style="width:100%; margin:0px auto;" >Submit</button>
      </form>
      </div>
          </div>
      </div>
</div>          

