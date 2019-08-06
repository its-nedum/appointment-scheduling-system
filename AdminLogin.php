<?php
session_start();
@$username = $_POST['username'];
@$password = $_POST['password'];
@$submit = $_POST['submit'];
$_SESSION['username'] = $username;
if(isset($submit)){
	mysql_connect('localhost', 'root', '') or die('unable to connect');
	@mysql_select_db(schedule);
	$query = mysql_query("SELECT * FROM admin WHERE username='$username'");
	$numrow = mysql_num_rows($query);

	if($numrow != 0){
		while($row = mysql_fetch_assoc($query)){
			$dbusername = $row['username'];
			$dbpassword = $row['password'];
		}
		if($username == $dbusername){
			if($password == $dbpassword){
				echo "<script>window.open('AdminHome.php','_self')</script>";
			}
		}

	}
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|Admin Login</title>
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/Indexcss.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/login.css">

</head>
<body>
<div id="cont" class="container">
	<div class="row">
		<div class="col-xs-12">
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


<div id="studentlogin" class="row">
		<div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
		<div class="col-xs-6 col-sm-6 col-md-5 col-lg-4">

			<h3>ADMIN LOGIN</h3>
			<div class="cover">
			<form method="POST" action="AdminLogin.php">
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
