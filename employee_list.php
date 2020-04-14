<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<form action="employee_list.php" method="post">
	<select name="choice">
		<option>All Employees</option>
		<option>Particular Employee</option>
	</select>
	<input type="submit" value="Go" name="submit">
</form>
<?php
$choice=isset($_POST['choice'])?$_POST['choice']:'';
if($choice=='All Employees'){
	$con = mysqli_connect('localhost','root','','building_data');
	$query="SELECT * from employee";
    $run = mysqli_query($con,$query);
    if($run){
	echo "<table border='2px solid black'>";
			echo "<tr>";
					echo "<th> Employee Id </th>";
					echo "<th> Employee Type </th>";
					echo "<th> Employee Name </th>";
					echo "<th> Employee Gender </th>";
					echo "<th> Employee Date of Birth </th>";
					echo "<th> Employee Phone </th>";
					echo "<th> Employee Date of joining </th>";
					echo "<th> Employee Address </th>";
					echo "<th> Employee Salary </th>";
					echo "<th> Employee Designation </th>";
			echo "</tr>";
	while($row = mysqli_fetch_array($run)){		
			echo "<tr>";
                echo "<td>".$row['empid']."</td>";
                echo "<td>".$row['emptype']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['gender']."</td>";
                echo "<td>".$row['dob']."</td>";
                echo "<td>".$row['phone']."</td>";
                echo "<td>".$row['doj']."</td>";
                echo "<td>".$row['address']."</td>";
                echo "<td>".$row['salary']."</td>";
                echo "<td>".$row['designation']."</td>";
            echo "</tr>";   
        }
        echo "</table>";
    }          
    else{
	    $con->error;
    }
}else if($choice=='Particular Employee'){
    echo"<form action='findEmployee.php' method='post'><label>Enter employee id</label><input type='text' name='eid'/><br/>";
    echo"<input type='submit' value='Go' name='submitf'>";
    echo"</form>";    
   } 
?>