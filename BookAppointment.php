<?php
session_start();
$regnumba = $_SESSION['regnum'];
$conn = mysqli_connect('localhost','root','','schedule') or die('unable to connect to database');
$query = "SELECT * FROM register WHERE reg_number ='$regnumba' ";
$result = mysqli_query($conn,$query);
$numrow = mysqli_num_rows($result);
if($numrow > 0){
	while($row = mysqli_fetch_assoc($result)){
		$datsurname = $row['surname'];
		$datfirstname = $row['first_name'];
		$datregnum = $row['reg_number'];
		$datphone = $row['phone'];
	}
}

$nameit = $datsurname.' '.$datfirstname;


?>
<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|Book An Appointment</title>
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/Indexcss.css"/>
	<!--Jquery CSS-->
	<link rel="stylesheet" type="text/css" href="CSS/BookAppointment.css">
	<link rel="stylesheet" type="text/css" href="CSS/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="CSS/jquery-ui.structure.css">
	<link rel="stylesheet" type="text/css" href="CSS/jquery-ui.theme.css">

<script type="text/javascript">

function load(){
	if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	} else{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById('adiv').innerHTML = xmlhttp.responseText;
			if (xmlhttp.responseText == "*That appointment has already been booked by another student....Try selecting another time or date") {
				document.getElementById("mysubmit").disabled = true;
			}else{
				document.getElementById("mysubmit").disabled = false;
			}
		}
	} 
	
	
	xmlhttp.open("GET","BookAppointmentAjax.php?apptime="+document.getElementById("appointtime").value+"&appdate="+document.getElementById("date").value, true);
	xmlhttp.send();
}
</script>

</head>
<body>
<div id="cont" class="container">
	<div class="row">
				<div class="col-lg-12">
				<img src="images/top_image.png" width="1140px" height="70px" class="img-responsive">

				<br><br>
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
			</div>
	</div>

	<form id="appoint" action="BookAppointmentProcess.php" method="POST">
	<div class="panel panel-default">
	<div class="panel-heading" style="background:darkblue;"><h3>Request an appointment</h3></div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-7">
			
			<span>Complete the form below to request an appointment at COOU Medical Centre. </span>
			<span>You will receive an SMS from the Medical Centre to confirm and remind you of your appointment...</span>
			<p>If you are having any medical emergency come to the university medical for help.</p><br>
			<span><i>NOTE: Students with DND (Do Not Disturb) activated on the line won't be able to receive Appointment reminder message from the medical centre. To cancel DND send 'STOP' to 2442 and then later send 'ALLOW' to 2442..</i>
			</span>

			
			</div>
			<div class="col-xs-3">
			 
			<img src="images/schedule_now.png" class="img-responsive">
			</div>

		</div>
		<div class="row">
		
			<div class="col-xs-6">
					<h4>Patient Information</h4>
					Have you previously received care at the University medical centre?
					<ul style="list-style-type:none;">
					<li><input type="radio" name="visit" value="Yes" required>YES</li>
					<li><input type="radio" name="visit" value="No" required>NO</li>
					</ul>
					<br>
					<div class="row">
						<div class="form-group col-xs-6">
							Full Name: <input type="text" name="name" class="form-control input-sm" value="<?php echo $nameit ?>" required disabled>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-6">
							Reg Number: <input type="text" name="regnum" class="form-control input-sm" value="<?php echo $datregnum ?>" required disabled>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-6">
							Phone: <input type="text" name="phone" class="form-control input-sm" value="<?php echo $datphone ?>" required disabled>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-6">
							Appointment Date: <input id="date" onchange="load();" type="text" name="appdate" class="form-control input-sm" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-6">
							Appointment Time: <select name="apptime" id="appointtime" onchange="load();" class="form-control input-sm" required>
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
					</div>
					<div id="adiv" style="color:red;" ></div>
					<hr>
					<h4>Medical Concern</h4>
					<div class="row">
						<div class="col-xs-12">
					<p>What is the primary medical problem or diagnosis for the appointment request?</p>
					<textarea name="concern" rows="2" cols="60" maxlength="300" required></textarea>
						</div>
					</div>
					<p></p>
					<a href="StudentHome.php" class="btn btn-danger">CANCEL</a>
					<input id="mysubmit" type="submit" name="submit" value="SEND REQUEST" class="btn btn-primary"/>
			</div>
		</div>
		</div>
		</div>
		</form>
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
	<script type="text/javascript" src="JQUERY/jquery-ui.min.js"></script>
	<script type="text/javascript" src="JQUERY/BookAppointment.js"></script>
	<script src="BOOTSTRAP/js/bootstrap.min.js"> </script>
</body>
</html>