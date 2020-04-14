<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
  document.getElementById("logout").style.display = "block";
  document.getElementById("drop").style.display = "none";
  document.getElementById("menu-toggle").style.display = "none";
</script>

</head>
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
              <img src="admin.png" >
 </div>
      </div>
    </div>
</body>
</html>

<?php
session_start();
// if(isset($_POST['expand'])){
//   $_SESSION['fromAdminDash'] = '1';
// }  
$_SESSION['fromAdminDash'] = '1';
if(isset($_SESSION['uemail'])){
	//echo $_SESSION['uemail'];
  $_SESSION['fromCheck'] = '0';
	if(isset($_POST['logout'])){

		header('location:login.php');
		session_destroy();
	}
}
// if(isset($_POST['expand'])){
//   $_SESSION['fromAdminDash'] = '1';
// } 

else{
	header('location:login.php');
	?>
  <style>
			#button{
				display: none;
		}
	</style>
	<?php
}

?>