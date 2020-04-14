<?php
ob_start();
define('myheader',TRUE);
require('header.php');
session_start();
$_SESSION["fromData"] = '1';
if($_SESSION['fromMain']==true && isset($_POST['submit'])){
            $_SESSION['fromMain'] = false;  
            $_SESSION['fromData'] = '1';
            
   // header("location:student_form.php");
// $fname = $_POST['firstname'];
// $gname = $_POST['gname'];
// $email = $_POST['email'];
// $addrs = $_POST['raddress'];
// $phone = $_POST['phone'];
// $inst = $_POST['institute'];
// $gender = $_POST['gender'];
// $_SESSION["pass"] = $phone;
            $_SESSION['fname'] = $_POST['firstname'];
            $_SESSION['gname'] = $_POST['gname'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['addrs'] = $_POST['raddress'];   
            $_SESSION['phone'] = $_POST['phone'];
            $_SESSION['inst'] = $_POST['institute'];
            $_SESSION['gender'] = $_POST['gender'];
            $_SESSION['pass'] = $_SESSION['phone'];



            $con = mysqli_connect('localhost','root','','building_data');
// $query = "INSERT INTO student_table(NAME, G_NAME, EMAIL, ADDRESS, PHONE, INSTITUTE, GENDER) VALUES ('$fname','$gname','$email','$addrs','$phone','$inst','$gender')";
// $query2 = "INSERT INTO student_login(ID,NAME,PASSWORD) VALUES ('$email','$fname','$phone')";
// if(isset($_POST['submit'])){
// $run = mysqli_query($con,$query);
// $run2 = mysqli_query($con,$query2);
// }
            $pp = $_SESSION['phone'];
            $query = "SELECT `ID` FROM `student_table` WHERE PHONE = '$pp'";
            $run = mysqli_query($con,$query);
            $row = mysqli_num_rows($run);
            if($row>=1){
      ?>
                     <script type="text/javascript">
                     document.getElementById("pmessage").style.display = "block";    
                     </script>
      <?php 
                     header( "refresh:1.5;url=login.php" );
            }
            else{
                     if(true){
                                 if ($_SESSION['gender']=='male') {
                        ?>
                                       <form method ="post" action="room.php">
                                       <label>Building No.</label>
                                       <select name="building">
            
                        <?php
                                       $res = mysqli_query($con,"select distinct(building_no) from boys_hostel");
                                       while($row=mysqli_fetch_array($res)){
                        ?>
                                             <option>
                                             <?php echo $row['building_no'] ?>
                                             </option>
                        <?php
                                       }
                        ?>
                                       </select><br>
                                       <lable>Floor No.</label>
                                       <select name="floor">
            
                        <?php
                                       $res = mysqli_query($con,"select distinct(floor_no) from boys_hostel");
                                       while($row=mysqli_fetch_array($res)){
                        ?>
                                       <option>
                                       <?php echo $row['floor_no'] ?>
                                       </option>
                        <?php
                                       }
                        ?>
                                       </select>
                                       <input type="submit" name="submitb" value="Get Selected Options"/>
                                       </form>   
<?php
                                 }  
                                 else{
?>                                      <form method ="post" action="room.php">
                                       <label>Building No.</label>
                                          <select name="building">
            
                                 <?php
                                          $_SESSION['fromData'] = '1'; 
                                          $res = mysqli_query($con,"select distinct(building_no) from girls_hostel");
                                       while($row=mysqli_fetch_array($res)){
                  ?>
                                       <option>
                                       <?php echo $row['building_no'] ?>
                                        </option>
                  <?php
                                       }
                  ?>
                                       </select><br>
                                       <lable>Floor No.</label>
                                       <select name="floor">
            
            <?php
                                        $res = mysqli_query($con,"select distinct(floor_no) from girls_hostel");
                                          while($row=mysqli_fetch_array($res)){
                  ?>
                                          <option>
                                          <?php echo $row['floor_no'] ?>
                                          </option>
                  <?php
                                          }
            ?>
                                       </select>
                                       <input type="submit" name="submitb" value="Get Selected Options"/>
                                       </form>
           <?php
                                 }
                     }
// $id = "SELECT ID from student_table where PHONE='$phone'";
// $run1 = mysqli_query($con,$id);
// if($run1){
//    while($row = mysqli_fetch_array($run1)){
//       $id_send = $row['ID'];
//    }
//    $_SESSION['uid'] = $id_send;
//    $_SESSION['fromData'] = '1';
// }
         $_SESSION['fromData'] = '1';   
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
