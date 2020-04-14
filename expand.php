<?php
ob_start();
define('myheader',TRUE);
require('header.php');
session_start();
echo $_SESSION['fromAdminDash'];
if($_SESSION['fromAdminDash']!='1'){
	header('location:index.php');
}
?>
<html>
<head>
<title>Expand Hostel</title>
<script type="text/javascript">
	document.getElementById("drop").style.display = "none";
</script>
</head>
<body>
	<form action="expand.php" method="post">
		<label>Hostel</label>
		<select name="hostel" id="hostel">
			<option>Boys Hostel</option>
			<option>Girls Hostel</option>
		</select>
		<input type="submit" value="Go" name="submit" id="btn"/>
	</form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
	    
		echo "hello";
	    $choice=$_POST['hostel'];
		?>
		<script type="text/javascript">
			
			document.getElementById("hostel").disabled = true;
			document.getElementById("hostel").value = "<?php echo $choice ?>";
			document.getElementById("btn").disabled = true;
		</script>
		<?php
		if($choice=='Boys Hostel'){
				echo"<form action='expand_config.php' method='post'>";
				echo"<label>Building Number</label>";
				echo"<select name='build1'>";
				for($i=1;$i<=10;$i++){
					echo"<option>b".$i."</option>";
				}	
				echo"</select>";
				echo"<br/>";
				echo"<label>Floor Number</label>";
				echo"<input type='text' name='floor' autocomplete='off' required/><br/>";
				echo"<label>Room Number</label>";
				echo"<input type='text' name='room' autocomplete='off' required/><br/>";
				echo "<input type='hidden' name='hostel' value=".$choice.">";
				echo"<input type='submit' value='Go' name='submitf'/>";
					$_SESSION['fromExpand'] = '1';
					$_SESSION['fromAdminDash'] = '0';
				echo"</form>";
				

		}else{
				echo"<form action='expand_config.php' method='post'>";
				echo"<label>Building Number</label>";
				echo"<select name='build1'>";
				for($i=1;$i<=10;$i++){
				echo"<option>g".$i."</option>";
				}
				echo"</select>";
				echo"<br/>";
				echo"<label>Floor Number</label>";
				echo"<input type='text' name='floor' autocomplete='off' required/><br/>";
				echo"<label>Room Number</label>";
				echo"<input type='text' name='room' autocomplete='off' required/><br/>";
				echo "<input type='hidden' name='hostel' value=".$choice.">";
				echo"<input type='submit' value='Go' name='submitf'/>";
				$_SESSION['fromExpand'] = '1';
					$_SESSION['fromAdminDash'] = '0';
				echo"</form>";
						
		}
}
?>