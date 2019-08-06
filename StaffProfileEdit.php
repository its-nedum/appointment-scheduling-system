<?php
session_start();
$myown = $_SESSION['username'];
$conn = mysqli_connect('localhost','root','','schedule') or die('Unable to connect to database');
$query = "SELECT * FROM staff WHERE username = '$myown' ";
$result = mysqli_query($conn,$query);
$numrow = mysqli_num_rows($result);
if($numrow > 0){
	while($row = mysqli_fetch_assoc($result)){
		$user = $row['username'];
		$pass = $row['password'];
		$sur = $row['surname'];

	}
}

@$username = $_POST['username'];
@$password = $_POST['password'];
@$change = $_POST['change'];
if(isset($change)){
	$queryme = "UPDATE staff SET username = '$username', password = '$password' WHERE surname = '$sur' ";
	$update = mysqli_query($conn,$queryme);
	echo"<script>alert('Your changes have saved, You will be logged out to effect changes');</script>";
	echo"<script>window.open('StaffLogin.php','_self')</script>";
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|Edit Profile</title>
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
		</div>-->
		<br><br>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading" style="background:darkblue;"><h3>Edit Your Profile</h3></div>
	<div class="panel-body">
		<div class="row">
		<div class="col-xs-4"></div>
		<div class="col-xs-4">
		<form action="StaffProfileEdit.php" method="POST">
				<div class="form-group col-xs-6">
				Username:<input type="text" name="username" value="<?php echo $user ?>" class="form-control input-sm" required>
				</div>
				<div class="form-group col-xs-6">
				Password:<input type="password" name="password" value="<?php echo $pass ?>" class="form-control input-sm" required>
				</div>
				<center><a href="StaffHome.php" class="btn btn-danger"><< BACK</a>
				 <input type="submit" name="change" value="CHANGE" class="btn btn-primary"> </center>
		</form>
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
