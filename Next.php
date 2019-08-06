<?php
session_start();
date_default_timezone_set('Africa/Lagos');
@$name = $_POST['name'];
@$appdate = $_POST['appdate'];
@$start = $_POST['start'];
@$stop = $_POST['stop'];
@$consultant = $_POST['consultant'];
@$submit = $_POST['update'];
$consult = $consultant.' '.'is free';

//////////////////////////////////////
@$appdate = date('d/m/Y');
@$stop = date('h:i A', time());
/////////////////////////////////////

if(isset($submit)){
	$conn = mysqli_connect('localhost','root','','schedule') or die('Unable to connect...pls try again!!!');
	$query = "INSERT INTO next(name,appdate,start_time,stop_time,consultant)VALUES('$name','$appdate','$start','$stop','$consult')";
	$result = mysqli_query($conn,$query);
	if($result){
		echo "<script>alert('Sent Successfully....The next student will arrive shortly')</script>";
		echo "<script>window.open('Next.php','_self')</script>";
	}
}





?>
<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|Next Student</title>
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/Indexcss.css"/>

	<script type="text/javascript">
		function LoadName(){

			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			} else{
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){					
					
					document.getElementById('show').innerHTML = xmlhttp.responseText;

				}
			}
			xmlhttp.open("GET","NextName.php?date="+document.getElementById("appdate").value+"&time="+document.getElementById("start").value,true);
			xmlhttp.send();
		}
	
	</script>

</head>
<body>
<div id="cont" class="container">
	<div class="row">
		<div class="col-lg-12">
		<img src="images/top_image.png" width="1140px" height="70px" class="img-responsive">
<br><br><br>
<!--<div id="nav">
		<div id="wrapper">
			<ul>
				<li><a href="Index.php">Home</a></li><li>
				
			</div>
		</div>-->
	</div>
</div>


<div class="row">
	<div class="col-xs-4"></div>
	<div class="col-xs-4">
	<div class="panel panel-default">
	<div class="panel-heading" style="background:darkblue;color:white;">Completed Appointment Details</div>
	<div class="panel-body">
	<form action="Next.php" method="POST">
	
		<div class="row">
			<div class="col-xs-6">
			Student Name:<input type="text" id="show" name="name" onload="LoadName();" class="form-control input-sm" required>
			</div>
			<div class="col-xs-6">
			Appointment Date: <input type="text" id="appdate" name="appdate" class="form-control input-sm" value="<?php echo date('Y-m-d'); ?>" required disabled>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6">
			Start Time:<select name="start" id="start" class="form-control input-sm" required>
								<option>08:00 AM</option>
								<option>08:15 AM</option>
								<option>08:30 AM</option>
								<option>08:45 AM</option>
								<option>09:00 AM</option>
								<option>09:15 AM</option>
								<option>09:30 AM</option>
								<option>09:45 AM</option>
								<option>10:00 AM</option>
								<option>10:15 AM</option>
								<option>10:30 AM</option>
								<option>10:45 AM</option>
								<option>11:00 AM</option>
								<option>11:15 AM</option>
								<option>11:30 AM</option>
								<option>11:45 AM</option>
								<option>12:00 PM</option>
								<option>12:15 PM</option>
								<option>12:30 PM</option>
								<option>12:45 PM</option>
								<option>01:00 PM</option>
								<option>01:15 PM</option>
								<option>01:30 PM</option>
								<option>01:45 PM</option>
								<option>02:00 PM</option>
								<option>02:15 PM</option>
								<option>02:30 PM</option>
								<option>02:45 PM</option>
								<option>03:00 PM</option>
								<option>03:15 PM</option>
								<option>03:30 PM</option>
								<option>03:45 PM</option>
			</select>
			</div>
			<div class="col-xs-6">
			Stop Time: <input type="text" name="stop" class="form-control input-sm" value="<?php echo date('h:i A', time()); ?>" required disabled>
			</div>
		</div>
		<div class="row">
			
			<div class="col-xs-6">
			Consultant Id: <select name="consultant" class="form-control input-sm" required>
				<option>Select...</option>
				<option>Consultant 1</option>
				<option>Consultant 2</option>
			</select>
			</div>
		</div><br>
		<div class="row">
			<center>
			<a href="StaffHome.php" class="btn btn-danger">BACK</a>
			<input type="submit" name="update" class="btn btn-success" value="UPDATE">
			</center>
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
