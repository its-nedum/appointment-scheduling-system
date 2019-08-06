<?php
session_start();
$tregnum = $_SESSION['regnum'];
$conn = mysqli_connect('localhost','root','','schedule') or die('Unable to connect to database');
$query = "SELECT * FROM register WHERE reg_number = '$tregnum'";
$result = mysqli_query($conn,$query);
$numrows = mysqli_num_rows($result);
if($numrows = 1){
	while($row=mysqli_fetch_assoc($result)){
		$dbsurname = $row['surname'];
		$dbfirstname = $row['first_name'];
		$dbregnum = $row['reg_number'];
		$dbdepartment = $row['department'];
		$dblevel = $row['level'];
		$dbphone = $row['phone'];
		$dbusername = $row['username'];
		$dbpassword = $row['password'];
	}
}

@$surname = $_POST['surname'];
@$firstname = $_POST['firstname'];
@$regnum = $_POST['regnum'];
@$department = $_POST['dept'];
@$level = $_POST['level'];
@$phone = $_POST['phone'];
@$username = $_POST['username'];
@$password = $_POST['password'];
@$submit = $_POST['submit'];
 if(isset($submit)){
 	$query2 = "UPDATE register SET surname='$surname',first_name='$firstname',reg_number='$dbregnum',department='$department',level='$level',phone='$phone',username='$username',password='$password' WHERE reg_number='$tregnum'";
 	$result2 = mysqli_query($conn,$query2);
 	echo"<script>alert('Your Changes Have Been Saved, You will be Logged out to effect changes');</script>";
 	echo"<script>window.open('StudentLogin.php','_self');</script>";
 }



?>
<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|Edit Medical Record</title>
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
	</div>
</div>
<br><br>
				<div class="panel panel-default">
				<div class="panel-heading" style="background:darkblue;"><h3>Make changes</h3></div>
				<div class="panel-body">
				<div class="row">
				<div class="col-xs-4"></div>
				<form method="POST" action="EditProfile.php">
					<div class="col-xs-6">
						<div class="row">
							 	<div class="form-group col-xs-4">
									Surname:<input type="text" name="surname" value="<?php echo $dbsurname ;?>" class="form-control input-sm" required="required" >
								</div>
								<div class="form-group col-xs-4">
									First Name:<input type="text" name="firstname" value="<?php echo $dbfirstname ;?>" class="form-control input-sm"  required="required" > 
								</div>
						</div>
						<div class="row">
								<div class="form-group col-xs-4">
									Reg Number:<input type="text" name="regnum" value="<?php echo $dbregnum;?>" class="form-control input-sm" required="required" disabled>
								</div>	
								<div class="form-group col-xs-4">					
									Department:<input type="text" name="dept" value="<?php echo $dbdepartment;?>" class="form-control input-sm" required="required" > 
								</div>
						</div>
						<div class="row">
								<div class="form-group col-xs-4">
									Level:<input type="text" name="level" value="<?php echo $dblevel;?>" class="form-control input-sm" required="required" >
								</div>
								<div class="form-group col-xs-4"> 
									Phone:<input type="text" name="phone" value="<?php echo $dbphone;?>" class="form-control input-sm" required="required"> 
								</div>
						</div>
						<div class="row">
								<div class="form-group col-xs-4">
									Username:<input type="text" name="username" value="<?php echo $dbusername;?>" class="form-control input-sm" required="required">
								</div>
								<div class="form-group col-xs-4">
									Password:<input type="password" name="password" value="<?php echo $dbpassword;?>" class="form-control input-sm" required="required">
								</div>
						</div>
									<a href="StudentHome.php"><input type="button" value="BACK" class="btn btn-danger" ></a>
									<input type="submit" name="submit" value="UPDATE" class="btn btn-success" >
							
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
