<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|Update Student Record</title>
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/Indexcss.css"/>
	<script>
		function setUpdateAction() {
		document.update.action = "UpdateRecordProcess.php";
		document.update.submit();
	}

	</script>

</head>
<body>
<div id="cont" class="container">
	<div class="row">
		<div class="col-lg-12">
		<img src="images/top_image.png" width="1140px" height="70px" class="img-responsive">

<!-- <div id="nav">
		<div id="wrapper">
			<ul>
				<li><a href="Index.php">Home</a></li><li>
				<a href="Register.php">Register</a></li><li>
				<a href="#">Login<span>&#9662;</span></a>
						<ul>
							<li><a href="StudentLogin.php">Student</a></li>
							<li><a href="StaffLogin.php">Staff</a></li>
							<li><a href="AdminLogin.php">Admin</a></li>
						</ul>
				</li><li>
				<a href="#">About Us</a></li><li>
				<a href="#">Contact Us</a></li>
			</ul>
			</div>
		</div> -->
	</div>
</div>
<br><br>
<div class="row">
<div class="col-xs-12" style="background:skyblue; color:white; width:1133px; margin-left:20px;margin-top:20px;border-radius:10px;">
<form action="UpdateRecord.php" method="POST">
Search Student's Reg Number:
<div class="row" style="margin-top:10px;">
<div class="form-group col-xs-2">
<input class="form-control input-sm" type="text" name="searchtxt">
</div>
<div class="form-group col-xs-4">
<input type="submit" name="searchbtn" value="SEARCH" class="btn btn-primary">
</div>
</div>
</form>

<?php
if(isset($_REQUEST['searchbtn'])){
	$search = $_POST['searchtxt'];
	$terms = explode(" ", $search);
	$query = "SELECT * FROM appointment WHERE ";
	$i = 0;
	foreach ($terms as $each) {
		$i++;
		if($i == 1){
			$query .= "reg_number LIKE '%$each%' ";
		}else{
			$query .= "OR reg_number LIKE '$each%' ";
		}
	}
////////////////////////////////////////////////////////////////////////////////

$connect = mysqli_connect('localhost','root','','schedule');
$que = "SELECT * FROM report WHERE regnum='$search'";						  
$runquery = mysqli_query($connect,$que);
$numbrow = mysqli_num_rows($runquery);
if($numbrow != 0){
	while($rowz = mysqli_fetch_assoc($runquery)){
		$reportreg = $rowz['regnum'];
		$reportdate = $rowz['appdate'];
	}
	//echo $reportreg;
	//echo $reportdate;
}


/////////////////////////////////////////////////////////////////////////////

$conn = mysqli_connect('localhost', 'root', '', 'schedule');
$result = mysqli_query($conn,$query);	
$numrows = mysqli_num_rows($result);
	if($numrows > 0 && $search != ""){
?>
<table class="table table-borderd">
<tr>
	<th></th>
	<th>NAME</th>
	<th>REG NUMBER</th>
	<th>APPOINTMENT DATE</th>
	<th>REASON FOR APPOINTMENT</th>

</tr>
<form action='' method='POST' name='update'>

<?php
		while($row = mysqli_fetch_assoc($result)){
			$id = $row['id'];
			$name = $row['full_name'];
			$reg = $row['reg_number'];
			$date = $row['appdate'];
			$reason = $row['reason_for_appointment'];
?>


<tr>
	<td><input name='id' type ='checkbox' value='<?php echo $id ?>'</td>
	<td><?php echo $name ?></td>
	<td><?php echo $reg ?></td>
	<td><?php echo $date ?></td>
	<td><?php echo $reason ?></td>
</tr>


<?php
		}
?>
	</table>
	select the checkbox that correspond to the student and click continue...
	<input style="margin-left:20px; margin-bottom:20px; float:right;" type='submit' name='saveit' class='btn btn-success' onclick='setUpdateAction();' value="CONTINUE"/>
	</form>
<?php
	}else{
		echo "<span style='color:red'>NO RESULT FOUND!!!!</span>";
	}

}else{

}


?>


</div>
<a href="StaffHome.php"><input style="margin-left:20px; margin-top:20px;" type='submit' name='back' class='btn btn-danger' value='<< CANCEL'/></a>
</div>
	<br>
	<div class="row">
		<div class="col-xs-12">
			<div id="big_footer">

			<div id="footer"> <center>Copyright &copy 2017 Appointment Scheduling System. Developed By Emesue Chinedu 2013 224 326</center></div>

			</div>
		</div>
	</div>
</div>
	<script type="text/javascript" src="JQUERY/jquery-3.1.1.min.js"></script>
	<script src="BOOTSTRAP/js/bootstrap.min.js"> </script>
</body>
</html>

