<?php
session_start();
if(!isset($_POST["id"])){
	header("Location:UpdateRecord.php");
}

$conn = mysqli_connect('localhost','root','','schedule');
$myid = $_POST["id"];
$query = "SELECT * FROM appointment WHERE id='$myid'";
$result = mysqli_query($conn,$query);
$numrows = mysqli_num_rows($result);
if($numrows > 0){
	while($row = mysqli_fetch_assoc($result)){
		$name = $row['full_name'];
		$reg = $row['reg_number'];
		$date = $row['appdate'];
		$reason = $row['reason_for_appointment'];

	}
}





?>
<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|STUDENT's MEDICAL RESULT</title>
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/Indexcss.css"/>

</head>
<body>
<div id="cont" class="container">
	<div class="row">
		<div class="col-lg-12">
		<img src="images/top_image.png" width="1140px" height="70px" class="img-responsive">
<br><br>
<!--<div id="nav">
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
		</div>-->
	</div>
</div>
<div class="row">
<div class="panel panel-default">
<div class="panel-heading" style="background:darkblue;"><h3>Enter Result Of Students Appointment</h3></div>
<div class="panel-body">
<div class="col-xs-12" style="background:skyblue; color:white; width:1100px; margin-left:20px;margin-top:20px;border-radius:10px;">
<form action="UpdateRecordProcess.php" method="POST">
<table class="table">
<tr>
<td>Name:</td>
<td><?php echo $name ?></td> <input type="text" name="one" value="<?php echo $name ?>" hidden/>
</tr>
<tr>
<td>Reg Number:</td>
<td><?php echo $reg ?></td> <input type="text" name="two" value="<?php echo $reg ?>" hidden/>
</tr>
<tr>
<td>Appointment Date:</td>
<td><?php echo $date ?></td> <input type="text" name="three" value="<?php echo $date ?>" hidden/>
</tr>
<tr>
<td>Reason for Appointment:</td>
<td><?php echo $reason ?></td> <input type="text" name="four" value="<?php echo $reason ?>" hidden/>
</tr>
<tr>
<td>Doctor's Report:</td>
<td><textarea cols="30" rows="3" style="color:black;" name='mesg' placeholder="enter result here..." required></textarea></td>
</tr>
</table>
<input type="submit" name="update_result" value="SAVE" class="btn btn-primary" style="margin-left:20px; margin-bottom:20px; float:right;">
</form>
</div>
</div>
</div>
<a href="UpdateRecord.php"><input style="margin-left:20px; margin-top:20px;" type='submit' name='back' class='btn btn-danger' value='<< CANCEL'/></a>

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
<?php
$yourid = $myid;
@$re = $_POST['two'];
@$dat = $_POST['three'];
@$reas = $_POST['four'];
@$mesg = $_POST['mesg'];
@$reported = $_POST['update_result'];
if(isset($reported)){
	$connect = mysqli_connect('localhost','root','','schedule');
	$avoid = "SELECT * FROM report WHERE regnum = '$re'";
	$runquery = mysqli_query($connect,$avoid);
	$numbrows = mysqli_num_rows($runquery);
	if($numbrows != 0){
	$update = "UPDATE report SET regnum='$re',appdate='$dat',reason='$reas',doctor_report='$mesg' WHERE regnum='$re'";
	mysqli_query($connect,$update);
	}else{
		$query1 = "INSERT INTO report(regnum,appdate,reason,doctor_report)VALUES('$re','$dat','$reas','$mesg')";
		mysqli_query($conn,$query1);
	}
	

echo "<script>alert('RECORD SAVED SUCCESSFULLY');</script>";
echo "<script>window.open('UpdateRecord.php','_self');</script>";
}


?>