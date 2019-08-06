<?php
session_start();
$regnumba = $_SESSION['regnum'];
if(!isset($regnumba)){
	echo "<script>window.open('StudentLogin.php','_self');</script>";
}

//session picture db connection
$conn = mysqli_connect('localhost', 'root', '', 'schedule');
$query = "SELECT * FROM record WHERE regnum = '$regnumba'";
$result = mysqli_query($conn,$query);
$numrows = mysqli_num_rows($result);
if($numrows != 0){
	while($row = mysqli_fetch_assoc($result)){
		$dbphoto = $row['photo'];
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|Home</title>

	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/Indexcss.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/staff.css"/>
	
</head>
<body>
<div id="cont" class="container">
	<div class="row">
		<div class="col-lg-12">
		<img src="images/top_image.png" width="1140px" height="70px" class="img-responsive">

	<div id="nav">
		<div id="wrapper">
			<ul>
				<li><a href="Index.php">Home</a></li><li>
				<!--<a href="Register.php">Register</a></li><li>
				<a href="#">Login <span>&#9662;</span></a>
						<ul>
							<li><a href="StudentLogin.php">Student</a></li>
							<li><a href="StaffLogin.php">Staff</a></li>
							<li><a href="AdminLogin.php">Admin</a></li>
						</ul>
				</li><li>
				<a href="#">About Us</a></li><li>
				<a href="#">Contact Us</a></li>-->
			</ul>
		</div>

	</div>
	


<div id="dashboard">
<!--<h2>Dashboard</h2>-->
<div class="dashboard-container">
		<div class="side-bar-left-container">
	<ul>
		<li><a href="MedicalForm.php" class="dash-text-left"><img src="icon/edit.png" class="dash-icon-display">Fill Medical Form</a></li>
		<li><a href="BookAppointment.php" class="dash-text-left"><img src="icon/stopwatch.png" class="dash-icon-display">Book An Appointment</a></li>
		<li><a href="ViewAppointment.php" class="dash-text-left"><img src="icon/calendar.png" class="dash-icon-display">View Appointment</a></li>
		<li><a href="Complain.php" class="dash-text-left"><img src="icon/email.png" class="dash-icon-display">Report Your Complains</a></li>
		<li><a href="MedicalResult.php" class="dash-text-left"><img src="icon/book.png" class="dash-icon-display">Your Medical Result</a></li>
		<li><a href="EditRecord.php" class="dash-text-left"><img src="icon/clipboard.png" class="dash-icon-display">Edit Medical Record</a></li>
		<li><a href="EditProfile.php" class="dash-text-left"><img src="icon/student.png" class="dash-icon-display">Edit Your Profile</a></li>
		<li><a href="LogoutStudent.php" class="dash-text-left"><img src="icon/cancel.png" class="dash-icon-display">LogOut</a></li>
	</ul>
		</div>
		<div class="side-bar-right-container">

			<div class="inside-bar-container-top">
				<p class="welcome-text">Welcome <?php echo $_SESSION['regnum']; ?></p>
				<img src="icon/user.png" class="image-add">
			</div>
			<a href="MedicalForm.php">
				<div class="inside-bar-container">
					<img src="icon/edit.png" class="inside-icon-display">
					<p class="link-list-txt">Fill Medical Form</p>
				</div>
			</a>
			
			<a href="BookAppointment.php">
			<div class="inside-bar-container">
				<img src="icon/stopwatch.png" class="inside-icon-display">
				<p class="link-list-txt">Book Appointment</p>
			</div>
			</a>
			<a href="MedicalResult.php">
			<div class="inside-bar-container">
				<img src="icon/book.png" class="inside-icon-display">
				<p class="link-list-txt">Medical Result</p>
			</div>
			</a>
		</div>
</div>
</div>
</div>
</div>
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
