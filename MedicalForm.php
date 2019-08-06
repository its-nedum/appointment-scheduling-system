<?php
session_start();
$regnum = $_SESSION['regnum'];

$conn = mysqli_connect('localhost','root', '', 'schedule') or die('Unable to connect');

$queryit = "SELECT * FROM record WHERE regnum = '$regnum' ";
$resultz = mysqli_query($conn,$queryit);
$numrowit = mysqli_num_rows($resultz);
if($numrowit > 0){
	echo "<script>window.open('EditRecord.php','_self');</script>";
}

$queryy = "SELECT * FROM register WHERE reg_number = '$regnum'";
$resulty = mysqli_query($conn,$queryy);
$numrowy = mysqli_num_rows($resulty);
if($numrowy > 0){
	while($rowy = mysqli_fetch_assoc($resulty)){
		$datsurname = $rowy['surname'];
		$datfirstname = $rowy['first_name'];
		$datregnum = $rowy['reg_number'];
		$datdepartment = $rowy['department'];
		$datlevel = $rowy['level'];
		$datphone = $rowy['phone'];
	}
}

/*@$surname = $_POST['surname'];
@$firstname = $_POST['firstname'];
@$regnum = $_POST['regnum'];
@$level = $_POST['level'];
@$department = $_POST['dept'];
@$phone = $_POST['phone'];
*/

@$faculty = $_POST['faculty'];
@$birthday = $_POST['birthday'];
@$sex = $_POST['sex'];
@$marital = $_POST['status'];
@$nationality = $_POST['nationality'];
@$state = $_POST['state'];
@$lga = $_POST['LGA'];
@$health = $_POST['gfp'];
@$admitted = $_POST['admit'];
@$reason = $_POST['reason'];
@$tb = $_POST['tb'];
@$urine = $_POST['urine'];
@$heart = $_POST['hrt'];
@$resp = $_POST['resp'];
@$veneral = $_POST['veneral'];
@$ear = $_POST['ear'];
@$allergy = $_POST['allergies'];
@$digest = $_POST['digest'];
@$reasonyes = $_POST['reasonyes'];
@$history = $_POST['history'];
@$family = $_POST['family'];
@$yellowfever = $_POST['yellowfever'];
@$smallpox = $_POST['smallpox'];
@$tetanus = $_POST['tetanus'];
@$others = $_POST['others'];

/*profile pics start
  $image = $_FILES["pic"]["name"];
  $temp = $_FILES["pic"]["tmp_name"];
  $type = $_FILES["pic"]["type"];
  
profile pics end*/

@$submit = $_POST['submit'];

if(isset($submit)){
	$image = $_FILES["file"]["name"];
  	$temp = $_FILES["file"]["tmp_name"];
  	$type = $_FILES["file"]["type"];

	$query = "INSERT INTO record(surname,firstname,regnum,level,department,faculty,phone,birthday,sex,maritalstatus,nationality,state,LGA,healthstatus,admitted,reason,tuberculosis,bloodyurine,heartdisease,respiratorydisease,veneraldisease,eardisease,allergies,digestive,ifyes,medicalhistory,healthfamily, yellowfever,smallpox,tetanus,others,photo)VALUES('$datsurname','$datfirstname','$datregnum','$datlevel','$datdepartment','$faculty','$datphone','$birthday','$sex','$marital','$nationality','$state','$lga','$health','$admitted','$reason','$tb','$urine','$heart','$resp','$veneral','$ear','$allergy','$digest','$reasonyes','$history','$family','$yellowfever','$smallpox','$tetanus','$others','$image')";

	$result = mysqli_query($conn, $query);
	move_uploaded_file($temp,"photos/$image");
	if($result){
	
	echo "<script>window.open('ProcessMedicalForm.php','_self')</script>";
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|Medical Form</title>
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/Indexcss.css"/>

</head>
<body>
<div id="cont" class="container">
	<div class="row">
		<div class="col-lg-12">
		<img src="images/top_image.png" width="1140px" height="70px" class="img-responsive">

			<!-- <div id="nav">
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
	<br><br>
	
	<div class="panel panel-default">
	<div class="panel-heading" style="background:darkblue;"><h3>Fill the form below</h3></div>
	<div class="panel-body">
	<div class="row">
		<div class="col-xs-12">
					
		<form method="POST" action="MedicalForm.php" enctype="multipart/form-data">
			<div class="row">
				<div class="col-xs-6"><hr>
					<div class="form-group col-xs-4">
						Surname:<input type="text" name="surname" class="form-control input-sm" value="<?php echo $datsurname ?>" required="required" disabled>
					</div>
					<div class="form-group col-xs-4">
						First Name:<input type="text" name="firstname" class="form-control input-sm" value="<?php echo $datfirstname ?>" required="required" disabled>
					</div>
					<div class="form-group col-xs-4">
						Reg Number:<input type="text" name="regnum" class="form-control input-sm" value="<?php echo $datregnum ?>" required="required" disabled>
					</div>
				</div>
				
			</div>
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group col-xs-4">
						Level:<input type="text" name="level" class="form-control input-sm" value="<?php echo $datlevel ?>" required="required" disabled>
					</div>
					<div class="form-group col-xs-4">
						Department:<input type="text" name="dept" class="form-control input-sm" value="<?php echo $datdepartment ?>" required="required" disabled>
					</div>
					<div class="form-group col-xs-4">
						Faculty:<select name="faculty" class="form-control input-sm" required="required">
						<option>Choose Faculty...</option>
						<option>Physical Sciences</option>
						<option>Natural Sciences</option>
						<option>Engineering</option>
						<option>Environmental Sciences</option>
						<option>BAMSSA</option>
						<option>Others</option>
						</select>
					</div>
					<div class="form-group col-xs-4">
						Phone:<input type="text" name="phone" class="form-control input-sm" value="<?php echo $datphone ?>" required="required" disabled>
					</div><br>
					<div class="col-xs-4 form-group">
					Select Photo
					<input type="file" name="file" value="" accept="image/*">
				</div>
				</div>
			</div>

					<h3>MEDICAL FORM A: TO BE COMPLETED BY STUDENT</h3>
			<div class="row">
				<div class="col-xs-6">
				<hr>
					<div class="form-group col-xs-4">
							Date of Birth<br> (dd/mm/yyyy):<input type="text" name="birthday" class="form-control input-sm" required="required">
					</div>
					<div class="form-group col-xs-4">
							Sex:<select name="sex" class="form-control input-sm" required="required">
							<option>Choose Gender...</option>
							<option>Male</option>
							<option>Female</option>
							</select>
					</div>
					<div class="form-group col-xs-4">
							Marital Status:<select name="status" class="form-control input-sm" required="required">
							<option>Select...</option>
							<option>Single</option>
							<option>Married</option>
							</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group col-xs-4">
						Nationality:<input type="text" name="nationality" class="form-control input-sm" required="required">
					</div>
					<div class="form-group col-xs-4">
						State Of Origin:<select name="state" class="form-control input-sm" required="required">
						<option>Select....</option>
						<option>Abia</option>
						<option>Adamawa</option>
						<option>Akwa Ibom</option>
						<option>Anambra</option>
						<option>Bauchi</option>
						<option>Bayelsa</option>
						<option>Benue</option>
						<option>Borno</option>
						<option>Cross River</option>
						<option>Delta</option>
						<option>Ebonyi</option>
						<option>Edo</option>
						<option>Ekiti</option>
						<option>Enugu</option>
						<option>Gombe</option>
						<option>Imo</option>
						<option>Jigawa</option>
						<option>Kaduna</option>
						<option>Kano</option>
						<option>Katsina</option>
						<option>Kebbi</option>
						<option>Kogi</option>
						<option>Kwara</option>
						<option>Lagos</option>
						<option>Nasarawa</option>
						<option>Niger</option>
						<option>Ogun</option>
						<option>Ondo</option>
						<option>Osun</option>
						<option>Oyo</option>
						<option>Plateau</option>
						<option>Rivers</option>
						<option>Sokoto</option>
						<option>Taraba </option>
						<option>Yobe</option>
						<option>Zamfara</option>
						<option>Federal Capital Territory</option>
						</select>
					</div>
					<div class="form-group col-xs-4">
						L.G.A:<input type="text" name="LGA" class="form-control input-sm" required="required">
					</div>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4">
					A. Would you say your health was Good/Fair/Poor?:<select name="gfp" class="form-control input-sm">
					<option>Select...</option>
					<option>Good</option>
					<option>Fair</option>
					<option>Poor</option>
					</select> 
					B. Have you ever been admitted as a patient into a hospital?:
					<select name="admit"class="form-control input-sm">
					<option>Select....</option>
					<option>YES</option>
					<option>NO</option>
					</select>
					if yes please state reason for admission, name of hospital and date below:
					<textarea rows="2" cols="70" maxlength="100" name="reason" class="form-control input-sm"></textarea>
				<div class="row">	C. Do you suffer from or have you suffered from any of the following? (indicate YES or NO):<br> </div>
					1. Tuberculosis:<select name="tb" class="form-control input-sm">
					<option>Select....</option>
					<option>YES</option>
					<option>NO</option>
					</select>
					2. Passing blood in the urine:<select name="urine" class="form-control input-sm">
					<option>Select....</option>
					<option>YES</option>
					<option>NO</option>
					</select>
					3. Any disease of the heart:<select name="hrt" class="form-control input-sm">
					<option>Select....</option>
					<option>YES</option>
					<option>NO</option>
					</select>
					4. Any respiratory disease:<select name="resp" class="form-control input-sm">
					<option>Select....</option>
					<option>YES</option>
					<option>NO</option>
					</select>
					5. Any Veneral disease:<select name="veneral" class="form-control input-sm">
					<option>Select....</option>
					<option>YES</option>
					<option>NO</option>
					</select>
					6. Any disease of Ear, Nose, Throat or Blader:<select name="ear" class="form-control input-sm">
					<option>Select....</option>
					<option>YES</option>
					<option>NO</option>
					</select>
					7. Allergies e.g. Asthma, Skin disease:<select name="allergies" class="form-control input-sm">
					<option>Select....</option>
					<option>YES</option>
					<option>NO</option>
					</select>
					8. Any disease of digestive system e.g. Peptic ulcer, hernia, pile etc:<select name="digest" class="form-control input-sm">
					<option>Select....</option>
					<option>YES</option>
					<option>NO</option>
					</select>
					if the anwser to any of the above is yes, please give details with dates below:
					<textarea rows="2" cols="70" maxlength="100" name="reasonyes" class="form-control input-sm"></textarea>
					D. If there is any other relevant details of your medical history not covered by the questions please give particulars below:<textarea rows="2" cols="70" maxlength="150" name="history" class="form-control input-sm"></textarea>
					<center>(<b>Indicate YES or NO to these Questions</b>)</center> <br>
					E. Is your family a healthy one?:<select name="family" class="form-control input-sm">
					<option>Select....</option>
					<option>YES</option>
					<option>NO</option>
					</select>
					F. Have you been immunized against any of the following?:<br>
					1.Yellow Fever:<select name="yellowfever" class="form-control input-sm">
					<option>Select....</option>
					<option>YES</option>
					<option>NO</option>
					</select>
					2. Small Pox:<select name="smallpox" class="form-control input-sm">
					<option>Select....</option>
					<option>YES</option>
					<option>NO</option>
					</select>
					3. Tetanus:<select name="tetanus" class="form-control input-sm">
					<option>Select....</option>
					<option>YES</option>
					<option>NO</option>
					</select>
					4. Others specify:<input type="text" name="others" class="form-control input-sm">
				</div>
			</div>
					<hr>

					<center>
					<a href="StudentHome.php" class="btn btn-danger">CANCEL</a>				
					<input type="submit" name="submit" value="SUBMIT" class="btn btn-primary" >
					</center>
					<hr>
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

	<script type="text/javascript" src="JQUERY/jquery-3.1.1.min.js"></script>
	<script src="BOOTSTRAP/js/bootstrap.min.js"> </script>
</body>
</html>
