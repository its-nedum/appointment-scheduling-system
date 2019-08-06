<?php
@$submit = $_POST['submit'];
if(isset($submit)){

//Authorization details
$email = urlencode('emesuechinedu@gmail.com');
$password = urlencode('qwertyuiop');

//Configuration variables
$type = '0';
$dlr = '1';

//Data for text message
$sender = urlencode('COOU Medics');
$receiver = urlencode($_POST['phone']);
$message = urlencode($_POST['message']);

$url ='email='.$email.'&password='.$password.'&type='.$type.'&dlr='.$dlr.'&destination='.$receiver.'&sender='.$sender.'&message='.$message;

//cURL Function
$ch = curl_init('http://smsgator.com/bulksms');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

if ($result){
	echo "<script>alert('Message Sent')</script>";
	echo "<script>window.open('StaffHome.php','_self');</script>";

}
}
?>

<?php
/*This codes brings out phone numbers from database into the phone number field*/

@$appdate = $_POST['appdate'];
@$check = $_POST['check'];
if (isset($check)){
	$conn = mysqli_connect('localhost','root','','schedule') or die();
	$query = "SELECT * FROM appointment WHERE appdate = '$appdate'";
	$result = mysqli_query($conn,$query);
	$numrows = mysqli_num_rows($result);
	if($numrows != 0){

		while($row = mysqli_fetch_row($result)){
			
			$total = $row[4];
		}
		
	}else{
		echo "<script>alert('No Appointment on the Selected date');</script>";
	}
}


?>




<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|Appointment Reminder</title>
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/Indexcss.css"/>

</head>
<body>
<div id="cont" class="container">
	<div class="row">
		<div class="col-lg-12">
		<img src="images/top_image.png" width="1140px" height="70px" class="img-responsive">


	</div>
</div>
<br><br>

<div class="row">
	<div class="col-xs-3"></div>
	<div class="col-xs-6 form-group">
		<div class="panel panel-default">
		<div class="panel-heading" style="background:darkblue;color:white;">Send Reminder</div>
		<div class="panel-body">

		<form method="POST" action="Sms.php">
		<div class="row">
		<div class="col-xs-4">
		Appointment Date: <input type="text" name="appdate" class="form-control" placeholder="enter appointment date">
		</div>
		<div class="col-xs-2">
		<br><input type="submit" name="check" value="INSERT NUMBERS" class="btn btn-primary">
		</div>
		</div>
		</form>
		<form method='POST' action='Sms.php'>
		Sender:<input type='text' name='name' class='form-control' value='COOU Medical Centre' required>
		
		Mobile Nos:<br><span style='font-size:12px;'>(Use comma to separate multiple phone numbers)</span><input type='text' name='phone' class='form-control' placeholder='enter mobile number' value='<?php echo @$total; ?>' required>
		Message:<textarea rows='5' cols='20' name='message' class='form-control' required>This is to remind you of your appointment with the University Medical Centre....please log-on to the website to view your appointment details.</textarea>
		<br>
		<a href='StaffHome.php' class='btn btn-danger'><< CANCEL</a>
		<input type='submit' name='submit' value='SEND' class='btn btn-success'>
		</form>
		
		</div>
	</div>
	</div>
	<div class="col-xs-3"></div>
</div>

<marquee behavior="alternate"><span>NOTE: Student with DND (Do Not Disturb) activated on their phone number won't be able to receive this message...</span></marquee>
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
