<?php
session_start();
@$regnum = $_POST['regnum'];
@$password = $_POST['password'];
@$submit = $_POST['submit'];
$_SESSION['regnum'] = $regnum;

if(isset($submit)){
	$conn = mysqli_connect('localhost', 'root', '','schedule') or die('Unable to connect');
	$query = "SELECT * FROM register WHERE reg_number = '$regnum'";
	$result = mysqli_query($conn,$query);
	$numrow = mysqli_num_rows($result);
	
	if($numrow != 0){
		while($row = mysqli_fetch_assoc($result)){
			$dbregnum = $row['reg_number'];
			$dbpassword = $row['password'];
		}
		if($regnum==$dbregnum && $password==$dbpassword){

			echo "<script> window.open('StudentHome.php','_self') </script>";

			}
			else{
				
				echo "<script> alert('Wrong Reg Number or Password....pls try again'); </script>";

			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|Student Login</title>
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/Indexcss.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/login.css">

</head>
<body>
<div id="cont" class="container">
	<div class="row">
		<div class="col-xs-12">
			<img src="images/top_image.png" width="1140px" height="70px">

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
		<div class="col-xs-4"></div>
		<div class="col-xs-4">

			<h3>STUDENT's LOGIN</h3>
			<div class="cover">
			<form method="POST" action="StudentLogin.php">
				<div class="row">
					<div class=" form-group col-xs-12">
						Reg Number: <input type="text" name="regnum" required="required" class="form-control" />
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
			 Don't have an account yet?<a href="Register.php"> Create an account</a>
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
