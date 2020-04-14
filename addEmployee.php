<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<html>
<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	  $(function () {
	    $('#datepicker').datepicker();
	 });
	   $(function () {
	    $('#datepicker1').datepicker();
	 });
	   document.getElementById("drop").style.display = "none";
	   document.getElementById("logout").style.display = "block";
</script>
</head>
<body>
	<form action="addEmployee.php" method="post">
		<label>Name</label>
		<input type="text" name="name" autocomplete="off" required/><br/>
		<label>Gender</label>
         <select name="gender" required>
         	<option>Male</option>
         	<option>Female</option>
         </select>
         <br/>
         <label>EmpType</label>
         <input type="text" name="etype" autocomplete="off" required/>
         <label>Date of Birth</label>
         <input type="text" id="datepicker" name="dob" autocomplete="off" required/>
         <label>Phone Number</label>
         <input type="text" name="phone" autocomplete="off" required/><br/>
         <label>Date of Joining</label>
		 <input type="text" id="datepicker1" name="doj" autocomplete="off" required/>
		 <label>Address</label>
		 <input type="text" name="address" autocomplete="off" required/>
		 <label>Salary</label>
		 <input type="text" name="salary" autocomplete="off" required/>
		 <label>Designation</label>
		 <input type="text" name="des" autocomplete="off" required/>
		 <input type="submit" value="GO" name="submit"/>
    </form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
$name=$_POST['name'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$phone=$_POST['phone'];
$doj=$_POST['doj'];
$emptype=$_POST['etype'];
$salary=$_POST['salary'];
$address=$_POST['address'];
$designation=$_POST['des'];
$con = mysqli_connect('localhost','root','','building_data');
		$query = "INSERT into employee(emptype,name,gender,dob,phone,doj,address,salary,designation) values('$emptype','$name','$gender','$dob','$phone','$doj','$address','$salary','$designation')";
		$run = mysqli_query($con,$query);
		if($run){
			?>
				<script>
					alert("Successfully Recorded");
				</script>
			<?php
			header( "refresh:1;url=addEmployee.php" );
		}
}		
?>