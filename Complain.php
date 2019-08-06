<?php
session_start();
@$name = $_POST['name'];
@$phone = $_POST['phone'];
@$message = $_POST['message'];
@$submit =$_POST['submit'];
if(isset($submit)){
	$conn = mysqli_connect('localhost', 'root', '', 'schedule') or die('Unable to connect');
	$query = "INSERT INTO complain(name,phone,message)VALUES('$name','$phone','$message')";
	$result = mysqli_query($conn,$query);
	echo"<script>alert('Complain sent');</script>";
	echo"<script>window.open('StudentHome.php','_self');</script>";
}

?>




<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|Report Your Complains</title>
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/Indexcss.css"/>
</head>
<body>
<div id="cont" class="container">
	<div class="row">
		<div class="col-lg-12">
		<img src="images/top_image.png" width="1140px" height="70px" class="img-responsive">

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

	</div> -->
	<br><br>
	<div id="register">
	<div class="panel panel-default">
	<div class="panel-heading" style="background:darkblue;"><h3>Fill the form below</h3></div>
		<div class="panel-body">
		<form action="Complain.php" method="POST">
				<div class="row" class="form-group">
					<div class="col-xs-4">
						Name:<input type="text" name="name" class="form-control input-sm" required="required" />
					</div>
				</div>

				<div class="row" class="form-group">
					<div class="col-xs-4">
						Phone:<input type="text" name="phone" class="form-control input-sm" required="required"/>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-6">
					<p>write your message here (max. 1500 characters)</p>
					<textarea placeholder="Type your complains here..." rows="10" cols="50" maxlength="1500" name="message" required="required" ></textarea>
					</div>
				</div>
				<a href="StudentHome.php" class="btn btn-danger">CANCEL</a>
				<input type="submit" name="submit" value="SEND" class="btn btn-primary">
		</form>
	</div>
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
