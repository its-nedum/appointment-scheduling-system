<?php
session_start();
if(!isset($_SESSION['username'])){
	echo "<script>window.open('StaffLogin.php','_self');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|Staff Home</title>
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
				<a href="#">Login<span>&#9662;</span></a>
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
<!--<h2 class="dash-header-text"> Staff Dashboard</h2>-->
	<div class="dashboard-container">
		<div class="side-bar-left-container">
			<ul>
		<li><a href="NurseViewAppointment.php"  class="dash-text-left"><img src="icon/checked.png" class="dash-icon-display">Confirm Appointment</a></li>
		<li><a href="NurseVerifyHistory.php" class="dash-text-left"><img src="icon/professor.png" class="dash-icon-display">Verify Medical History</a></li>
		<li><a href="AvailableDoctor.php" class="dash-text-left"><img src="icon/user-40.png" class="dash-icon-display">Available Doctor</a></li>
		<li><a href="NurseSms.php" class="dash-text-left"><img src="icon/emails.png" class="dash-icon-display">SMS Reminder</a></li>
		<li><a href="NurseProfileEdit.php" class="dash-text-left"><img src="icon/edit.png" class="dash-icon-display">Change Password</a></li>
		<li><a href="LogoutStaff.php" class="dash-text-left"><img src="icon/cancel.png" class="dash-icon-display">LogOut</a></li>
		
	</ul>
		</div>
		<div class="side-bar-right-container">

			<div class="inside-bar-container-top" >
				<p class="welcome-text">Welcome <?php echo $_SESSION['username']; ?></p>
				<img src="icon/nurse.png" class="image-add">
			</div>
			<a href="NurseViewAppointment.php">
				<div class="inside-bar-container">
					<img src="icon/checked.png" class="inside-icon-display">
					<p class="link-list-txt">Appointments</p>
				</div>
			</a>
			
			<a href="AvailableDoctor.php">
			<div class="inside-bar-container">
				<img src="icon/user-40.png" class="inside-icon-display">
				<p class="link-list-txt">Available Doctor</p>
			</div>
			</a>
			<a href="NurseSms.php">
			<div class="inside-bar-container">
				<img src="icon/emails.png" class="inside-icon-display">
				<p class="link-list-txt">SMS Reminder</p>
			</div>
			</a>
		</div>
</div>
</div>
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
