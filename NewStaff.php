<?php
@$surname = $_POST['surname'];
@$firstname = $_POST['firstname'];
@$position = $_POST['position'];
@$phone = $_POST['phone'];
@$email = $_POST['email'];
@$username = $_POST['username'];
@$password = $_POST['password'];
@$submit = $_POST['submit'];
if(isset($submit)){
	mysql_connect('localhost','root','') or die('unable to connect');
	@mysql_select_db(schedule);
	mysql_query("INSERT INTO staff(surname,first_name,position,phone,email,username,password)
		VALUES('$surname','$firstname','$position','$phone','$email','$username','$password')");

	echo "<script>alert('A new doctor have been successfully registered');</script>";
	echo "<script>window.open('AdminHome.php','_self')</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|Add new staff</title>
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/Indexcss.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/newstaff.css">


</head>
<body>
<div id="cont" class="container">
	<div class="row">
		<div class="col-xs-12">
				<img src="images/top_image.png" width="1140px" height="70px" class="img-responsive">

			<!--	<div id="nav">
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
				<br><br>
		</div>
	</div>
<div class="panel panel-default">
<div class="panel-heading" style="background:darkblue;"><h3>Add New Doctor</h3></div>
<div class="panel-body">
	<div class="row">

		<div class="col-xs-4"> </div>

			<div class="col-xs-4">
					
					
				<div class="cover">
				<form method="POST" action="NewStaff.php">
					<div class="row">
						<div class="form-group col-xs-6">
							Surname:<input type="text" name="surname" required="required" class="form-control input-sm">
						</div>
						<div class="form-group col-xs-6">
							First Name:<input type="text" name="firstname" required="required" class="form-control input-sm">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-6">
							Position:<select name="position" required="required" class="form-control input-sm">
							<option>Select...</option>
							<option>Medical Consultant</option>
							<option>Medical Officer</option>
							<option>Pharmacist</option>
							</select>
						</div>
						<div class="form-group col-xs-6">
							Phone:<input type="text" name="phone" required="required" class="form-control input-sm">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-6">
							Email:<input type="email" name="email" required="required" class="form-control input-sm">	
						</div>
						
					</div>
					<hr>
					<div class="row">
					<h4>Login Information</h4>
						<div class="form-group col-xs-6">
							Username:<input type="text" name="username" required="required" class="form-control input-sm">
						</div>
						<div class="form-group col-xs-6">
							Password:<input type="password" name="password" required="required" class="form-control input-sm">
						</div>
						<center><a href="AdminHome.php" class="btn btn-danger"><< BACK</a>
						 <input type="submit" name="submit" value="REGISTER" class="btn btn-primary"> </center>
					</div>
				</form>
			</div>
			<div class="row">
			<center>
			<marquee behavior="alternate"><a href="NewNurse.php">Click here to register a Nurse</a></marquee>
			</center>
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
