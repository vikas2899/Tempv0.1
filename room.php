<?php
ob_start();
define('myheader',TRUE);
require('header.php');
session_start();
// $uid =  $_SESSION['uid'];
$pass = $_SESSION['pass'];
$phone = $_SESSION['phone'];

// $fname = $_SESSION['fname'];
// $gname = $_SESSION['gname'];
// $email = $_SESSION['email'];
// $addrs = $_SESSION['addrs'];
// $phone = $_SESSION['phone'];
// $inst = $_SESSION['inst'];
// $gender = $_SESSION['gender'];


if($_SESSION["fromData"] == '1'){
	$_SESSION["fromData"] = '0';
	$_SESSION["fromRoom"] = '1';

$con = mysqli_connect("localhost", "root", "", "building_data");
// $query = "INSERT INTO student_table(NAME, G_NAME, EMAIL, ADDRESS, PHONE, INSTITUTE, GENDER) VALUES ('$fname','$gname','$email','$addrs','$phone','$inst','$gender')";
// $query2 = "INSERT INTO student_login(ID,NAME,PASSWORD) VALUES ('$email','$fname','$phone')";
// $run = mysqli_query($con,$query);
// $run2 = mysqli_query($con,$query2);
// $id = "SELECT ID from student_table where PHONE='$phone'";
// $run1 = mysqli_query($con,$id);
// if($run1){
//    while($row = mysqli_fetch_array($run1)){
//       $id_send = $row['ID'];
//    }
//    $uid = $id_send;
// }
// $_SESSION['uid'] = $uid;

$container = array('b1','b2','b3','b4','b5','b6');

$selected_build = isset($_POST['building']) ? $_POST['building'] : false;
$selected_floor = isset($_POST['floor']) ? $_POST['floor'] : false;

 if(in_array($selected_build, $container)){
 	echo "<form action='check.php' method='post'><label>Room No</label><select name='room'>";
 	$sql = "select room_no from boys_hostel where building_no='$selected_build' and floor_no='$selected_floor' and available>0";
 	$result = mysqli_query($con, $sql);
 	if(mysqli_num_rows($result) > 0){
	 	while($row = mysqli_fetch_array($result)){
	         echo "<option value=".$row['room_no'].">".$row['room_no']."</option>";
	 	}
	 	echo "</select>";
	 	echo "<input type='hidden' name='build' value=".$selected_build.">";
	 	echo "<input type='hidden' name='floor' value=".$selected_floor.">";
	 	echo"<input type='submit' name='submit' value='Get Selected Values' /></form>";
	}else{
		?>
		<script>
		   alert("No Floor or Room Available");
		</script>
	<?php	
		$query = "DELETE FROM `student_table` WHERE PHONE = '$phone'";
		$query1 = "DELETE FROM `student_login` WHERE PASSWORD = '$pass'";
		$run1 = mysqli_query($con,$query);
		$run2 = mysqli_query($con,$query1);
		header( "refresh:1;url=student_addData.php" );
	}
 }else{
 	echo "<form action='check.php' method='post'><label>Room No</label><select name='room'>";
 	$sql = "select room_no from girls_hostel where building_no='$selected_build' and floor_no='$selected_floor' and available>0";
 	$result = mysqli_query($con, $sql);
 	if(mysqli_num_rows($result) > 0){
	 	while($row = mysqli_fetch_array($result)){
	         echo "<option value=".$row['room_no'].">".$row['room_no']."</option>";
	 	}
	 	echo "</select>";
	 	echo "<input type='hidden' name='build' value=".$selected_build.">";
	 	echo "<input type='hidden' name='floor' value=".$selected_floor.">";
	 	echo "<input type='submit' name='submit' value='Get Selected Values' /></form>";
	 }else{
	 	?>
	 	<script>
	 	   alert("No Floor or Room available");
	 	</script>
	 <?php	
		$query = "DELETE FROM `student_table` WHERE PHONE = '$phone'";
		$query1 = "DELETE FROM `student_login` WHERE PASSWORD = '$pass'";
		$run1 = mysqli_query($con,$query);
		$run2 = mysqli_query($con,$query1);
		header( "refresh:1;url=student_addData.php" );
	}
	 }
 }
else{
	 header('location:login.php');
} 
?>
<style>
   #navbarDropdownMenuLink{
      display: none;
   }
</style>