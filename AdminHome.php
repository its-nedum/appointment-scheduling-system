<?php
session_start();
if(!isset($_SESSION['username'])){
	echo "<script>window.open('AdminLogin.php','_self');</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|Admin Home</title>
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
<!--<h2> Admin Dashboard</h2>-->
	<div class="dashboard-container">
		<div class="side-bar-left-container">
	<ul>
		<li><a href="NewStaff.php" class="dash-text-left"><img src="icon/add.png" class="dash-icon-display">Register New Staff</a></li>
		<!--<li><a href="UpdateRecordAdmin.php" class="dash-text-left"><img src="icon/test.png" class="dash-icon-display">Manage Database</a></li>-->
		<!--<li><a href="AdminViewAppointment.php" class="dash-text-left"><img src="icon/checked.png" class="dash-icon-display">View Appointment</a></li>-->
		<li><a href="ViewComplain.php" class="dash-text-left"><img src="icon/student.png" class="dash-icon-display">View Students' Complain</a></li>
		<li><a href="ContactUs.php" class="dash-text-left"><img src="icon/professor.png" class="dash-icon-display">View FeedBack</a></li>
		<li><a href="LogoutAdmin.php"class="dash-text-left"><img src="icon/cancel.png" class="dash-icon-display">LogOut</a></li>
	</ul>
	</div>
	<div class="side-bar-right-container">

			<div class="inside-bar-container-top">
				<p class="welcome-text">Welcome <?php echo $_SESSION['username']; ?></p>
				<img src="icon/man.png" class="image-add">
			</div>
			<a href="NewStaff.php">
				<div class="inside-bar-container">
					<img src="icon/add.png" class="inside-icon-display">
					<p class="link-list-txt">Register Staff</p>
				</div>
			</a>
			
			<a href="ContactUs.php">
			<div class="inside-bar-container">
				<img src="icon/professor.png" class="inside-icon-display">
				<p class="link-list-txt">View Feedback</p>
			</div>
			</a>
			<a href="ViewComplain.php">
			<div class="inside-bar-container">
				<img src="icon/student.png" class="inside-icon-display">
				<p class="link-list-txt">View Complain</p>
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
