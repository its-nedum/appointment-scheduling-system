<?php
session_start();
@$surname = $_POST['surname'];
@$firstname = $_POST['firstname'];
@$regnum = $_POST['regnum'];
@$dept = $_POST['dept'];
@$level = $_POST['level'];
@$phone = $_POST['phone'];
@$username = $_POST['username'];
@$password = $_POST['password'];
@$submit = $_POST['submit'];
@$_SESSION['regnum'];

if(isset($submit)){
	$conn = mysqli_connect('localhost', 'root', '','schedule') or die("Unable to connect");
	$que = "SELECT * FROM register WHERE reg_number = '$regnum'";
	$check = mysqli_query($conn,$que);
	$numrow = mysqli_num_rows($check);
	if($numrow != 0){
		while($row = mysqli_fetch_assoc($check)){
			$dbregnum = $row['reg_number'];
		}
		if($regnum==$dbregnum){
			echo "<script>alert('The Reg Number You Entered Already Exist');</script>";
			echo "<script>window.open('Register.php','_self');</script>";
		}
	}
	else{
	$query = "INSERT INTO register(surname,first_name,reg_number,department,level,phone,username,password)VALUES('$surname','$firstname','$regnum','$dept','$level','$phone','$username','$password')";
	$result = mysqli_query($conn,$query);
	echo "<script>alert('You have been successfully registered');</script>";
   	echo"<script>window.open('StudentLogin.php','_self')</script>";
}
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|Registration</title>
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/Indexcss.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/register.css">
	
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

	<div id="xyz" class="row">
	<div class="col-xs-2 col-md-4"> </div>
	
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				<h3>Students Register Here</h3>
				
				<div class="form_wrap">
					<form method="POST" action="Register.php">
					
							<div class="col-xs-12">
									<input type="text" name="surname"  required="required" placeholder="Surname">
								
									<input type="text" name="firstname"  required="required" placeholder="First Name"> 
								
									<input type="text" name="regnum"  required="required" placeholder="Reg Number">
													
									<input type="text" name="dept"  required="required" placeholder="Department"> 
							
									<input type="text" name="level"  required="required" placeholder="Level">
								 
									<input type="text" name="phone"  required="required" placeholder="Phone"> 
								
									<input type="text" name="username"  required="required" placeholder="Username">
									
									<input type="password" name="password"  required="required" placeholder="Password">
								
									<input type="submit" name="submit" value="REGISTER" >
							</div>

					</form>
					Already have an account?<a href="StudentLogin.php"> Log-in</a>
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