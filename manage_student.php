<?php
ob_start();
define('myheader',TRUE);
require('header.php');
session_start();
$_SESSION['manage'] = '1';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="simple-sidebar.css" rel="stylesheet">
</head>
<body>
	<div class="d-flex" id="wrapper">
      <div class="bg-light border-right" id="sidebar-wrapper" style="margin-top:-7px;">
          <div class="sidebar-heading"><?php echo "Welcome Admin"?></div>
          <div class="list-group list-group-flush">
          	<a href="login_configure.php" class="list-group-item list-group-item-action bg-light" id="dash" href="student_form.php">Dashboard</a>
            <a href="manage_student.php" class="list-group-item list-group-item-action bg-light" id="alloc" href="student_form.php">Manage Student</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Manage Building</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Manage Employee</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Setting</a>
          </div>
      </div>
      <div id="page-content-wrapper">
          <div class="container-fluid" style="margin:0px;">
          	<br><br><br>
             <div class="container">
  					<div class="row justify-content-md-center">
    					<div class="col-xm-3" style="">
      						 <div class="card" style="width: 18rem;">
  								<div class="card-body">
    								<h5 class="card-title">Student Allocation</h5>
    								<p class="card-text">Used for Allocating Hostel Rooms to the Students.</p>
    								<a href="student_form.php" class="card-link">Proceed</a>
  								</div>
							</div>
    					</div>
    					<div class="col-xm-auto">
    							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</div>
    					<div class="col-xm-3" style="">
      						<div class="card" style="width: 18rem;">
  								<div class="card-body">
    								<h5 class="card-title">Student Reallocation</h5>
    								<p class="card-text">Used For Re-assigning Rooms to the Students.</p>
    								<a href="#" class="card-link">Proceed</a>
  								</div>
							</div>
    					</div>
  					</div>
			</div>
      	  </div>
      </div>
    </div>
<script type="text/javascript">
	document.getElementById("alloc").style.pointerEvents="none";
	document.getElementById("alloc").style.cursor="default";
 	document.getElementById("drop").style.display = "none";
  	document.getElementById("logout").style.display = "block";
</script>
</body>
</html>