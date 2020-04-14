<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Successfully Recorded!!!</h4>
  <!-- <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <hr>
  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p> -->
<?php 
session_start();
if($_SESSION["fromRoom"] == '1'){
      $_SESSION["fromRoom"] = '0';

      
      $fname = $_SESSION['fname'];
      $gname = $_SESSION['gname'];
      $email = $_SESSION['email'];
      $addrs = $_SESSION['addrs'];  
      $phone = $_SESSION['phone'];
      $inst = $_SESSION['inst'];
      $gender = $_SESSION['gender'];
      $con = mysqli_connect("localhost", "root", "", "building_data");
      $query = "INSERT INTO student_table(NAME, G_NAME, EMAIL, ADDRESS, PHONE, INSTITUTE, GENDER) VALUES ('$fname','$gname','$email','$addrs','$phone','$inst','$gender')";
      $query2 = "INSERT INTO student_login(ID,NAME,PASSWORD) VALUES ('$email','$fname','$phone')";
      $run = mysqli_query($con,$query);
      $run2 = mysqli_query($con,$query2);  
      $id = "SELECT ID from student_table where PHONE='$phone'";
      $run1 = mysqli_query($con,$id);
      if($run1){
          while($row = mysqli_fetch_array($run1)){
            $id_send = $row['ID'];
          }
        $uid = $id_send;
      }  






      $id = $uid;
      echo "<p>Credential of Student are as Follows :</p>";
      echo "<hr>";
      echo "<p>Student ID is : ".$id."</p>";	
 	  $building=$_POST['build'];
      echo "<p>Student Building Name : ".$building."</p>";
      $selected_room=isset($_POST['room']) ? $_POST['room'] : false;
      echo "<p>Student Room No. is : ".$selected_room."</p>";
      
      $flooring=$_POST['floor'];
      echo "<p>Student Floor No. : ".$flooring."</p>";
      $con = mysqli_connect("localhost", "root", "", "building_data");
      $selected=$selected_room[0];
      if($selected=='b'){
	         $sql="update boys_hostel set available=available-1 where room_no='$selected_room'";
	         if (mysqli_query($con, $sql)) {
            echo "Record updated successfully";
	         } else {
	             echo "Error updating record: " . mysqli_error($conn);
	           }
      }else{
	         $sql="update girls_hostel set available=available-1 where room_no='$selected_room'";
	         if (mysqli_query($con, $sql)) {
	         echo "Record updated successfully";
	         } else {
	             echo "Error updating record: " . mysqli_error($conn);
	         }
	              }
      $sql="insert into allocation_data values('$id','$building','$flooring','$selected_room')";
      $run = mysqli_query($con,$sql);
	   if($run){

         echo"<br><br>";
		     echo "You Will be Redirected to dashboard in 5 Seconds";
         $_SESSION['fromCheck'] = '1';
         header( "refresh:5;url=login_configure.php" );
	     }
	   else{
		      echo "<p>Failure</p>";
		      echo $con->error;
	       }
  session_destroy();
}
else{
       header('location:login.php');
}  
?>
</div>
<style>
   #navbarDropdownMenuLink{
      display: none;
   }
   #logout{
        display:block;
      }
</style>
<script type="text/javascript">
  document.getElementById("logout").style.display = "block";
</script> 