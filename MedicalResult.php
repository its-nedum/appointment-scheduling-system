<?php
session_start();
$myreg = $_SESSION['regnum'];
$conn = mysqli_connect('localhost','root','','schedule') or die('Unable to connect to database');
$query = "SELECT * FROM report WHERE regnum = '$myreg'";
$result = mysqli_query($conn,$query);
$numrows = mysqli_num_rows($result);



?>
<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|Medical Result</title>
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
		</div>
		-->
	</div>
</div>

<div class="row">
<div class="panel panel-default">
<div class="panel-heading" style="background:darkblue;"><h3>Medical Result</h3></div>
<div class="panel-body">
<div class="col-xs-12" style="background:skyblue; color:white; width:1100px; margin-left:10px;margin-top:20px;border-radius:10px;">
<table class='table'>
<tr>
	<th>Reg Number</th>
	<th>Appointment Date</th>
	<th>Reason for Appointment</th>
	<th>Doctor's Report</th>
</tr>
<?php
if($numrows = 1){
	while($row = mysqli_fetch_assoc($result)){
		$reg = $row['regnum'];
		$date = $row['appdate'];
		$reason = $row['reason'];
		$report = $row['doctor_report'];
?>
<tr>
<td><?php echo $reg ?></td>
<td><?php echo $date ?></td>
<td><?php echo $reason ?></td>
<td><?php echo $report ?></td>
</tr>
<?php
	}
?>
</table>
<?php
}else{
	echo "<span style='color:red;'>YOU DON'T HAVE ANY REPORT YET....TRY AGAIN LATER!!!</span>";
}
?>
</div>
</div>
</div>
<a href="StudentHome.php"><input style="margin-left:20px; margin-top:20px;" type="submit" name="back" class="btn btn-primary" value="<< BACK" /></a>
</div>




	<br><br>
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
