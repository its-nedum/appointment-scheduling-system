<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'schedule') or die('unable to connect');


@$username = $_POST['username'];
@$password = $_POST['password'];
@$poster = $_POST['docnurse'];
@$submit = $_POST['submit'];
$_SESSION['username'] = $username;

if(isset($submit)){ 
	if($poster == 'doctor'){
	$query = "SELECT * FROM staff WHERE username='$username'";
	$result = mysqli_query($conn,$query);
	$numrow = mysqli_num_rows($result);
	if($numrow != 0){
		while($row = mysqli_fetch_assoc($result)){
			$dbusername = $row['username'];
			$dbpassword = $row['password'];
		}
		if($username == $dbusername && $password == $dbpassword){
				echo "<script>window.open('StaffHome.php','_self')</script>";
			}else{
				echo "<script>alert('Incorrect Username or Password...pls try again');</script>";
			}
		
	}
} 
elseif ($poster == 'nurse'){
	$query = "SELECT * FROM nurse WHERE username='$username'";
	$result = mysqli_query($conn,$query);
	$numrow = mysqli_num_rows($result);
	if($numrow != 0){
		while($row = mysqli_fetch_assoc($result)){
			$dbusername = $row['username'];
			$dbpassword = $row['password'];
		}
		if($username == $dbusername && $password == $dbpassword){
				echo "<script>window.open('NurseHome.php','_self')</script>";
			}else{
				echo "<script>alert('Incorrect Username or Password...pls try again');</script>";
			}
		

	}
}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|Staff Login</title>
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/Indexcss.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/login.css">

</head>
<body>
<div id="cont" class="container">
	<div class="row">
		<div class="col-lg-12">
		<img src="images/top_image.png" width="1140px" height="70px" class="img-responsive">

<div id="nav">
		<div id="wrapper">
			<ul>
				<li><a href="Index.php">Home</a></li>
			</ul>
			</div>
		</div>
	</div>
</div>

	<br>
	<br>

<div id="stafflogin" class="row">
		<div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
		<div class="col-xs-6 col-sm-6 col-md-5 col-lg-4">

			<h3>STAFF LOGIN</h3>
			<div class="cover">
			<form method="POST" action="StaffLogin.php">
				<div class="row">
					<div class=" form-group col-xs-12">
						Username: <input type="text" name="username" required="required" class="form-control" />
					</div>
				</div>
				<div class="row">
					<div class=" form-group col-xs-12">
						Password: <input type="password" name="password" required="required" class="form-control" />
					</div>
				</div>
				<div class="row">
				<center>
				<input type="radio" name="docnurse" value="doctor" required>DOCTOR 
				<input type="radio" name="docnurse" value="nurse" required>NURSE
				</center> 
				</div>

			<div class="row">
				<div class=" form-group col-xs-12">
			 		<input type="submit" name="submit" value="LOGIN" class="btn btn-primary btn-block "  />
			 	</div>
			 </div>
			 </form>
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
