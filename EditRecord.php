<?php
session_start();
$tregnum = $_SESSION['regnum'];
/*Redirect user back when medical form have not been filled*/
$conn = mysqli_connect('localhost','root','','schedule') or die('Unable to make connection to database');
$queryu = "SELECT * FROM record WHERE regnum = '$tregnum'";
$resultu = mysqli_query($conn,$queryu);
$numrowu = mysqli_num_rows($resultu);
if($numrowu < 1){
	echo"<script>window.open('MedicalForm.php','_self');</script>";
}


//$conn = mysqli_connect('localhost','root','','schedule') or die('Unable to make connection to database');
$query = "SELECT * FROM record WHERE regnum = '$tregnum'";
$result = mysqli_query($conn,$query);

/*This script displays from database*/
$numrow = mysqli_num_rows($result);
	if($numrow = 1){
		while($row = mysqli_fetch_assoc($result)){
		$dbsurname =$row['surname'];
		$dbfirstname = $row['firstname'];
		$dbregnum = $row['regnum'];
		$dblevel = $row['level'];
		$dbdepartment = $row['department'];
		$dbfaculty = $row['faculty'];
		$dbphone = $row['phone'];
		$dbbirthday = $row['birthday'];
		$dbsex = $row['sex'];
		$dbmarital = $row['maritalstatus'];
		$dbnationality = $row['nationality'];
		$dbstate = $row['state'];
		$dblga = $row['LGA'];
		$dbhealth = $row['healthstatus'];
		$dbadmitted = $row['admitted'];
		$dbreason = $row['reason'];
		$dbtb = $row['tuberculosis'];
		$dburine = $row['bloodyurine'];
		$dbheart = $row['heartdisease'];
		$dbresp = $row['respiratorydisease'];
		$dbveneral = $row['veneraldisease'];
		$dbear = $row['eardisease'];
		$dballergy = $row['allergies'];
		$dbdigest = $row['digestive'];
		$dbreasonyes = $row['ifyes'];
		$dbhistory = $row['medicalhistory'];
		$dbfamily = $row['healthfamily'];
		$dbyellowfever = $row['yellowfever'];
		$dbsmallpox = $row['smallpox'];
		$dbtetanus = $row['tetanus'];
		$dbothers = $row['others'];
		$dbphoto = $row['photo'];
		}
	}

	/*This script update to database*/
		@$surname = $_POST['surname'];
		@$firstname = $_POST['firstname'];
		@$regnum = $_POST['regnum'];
		@$level = $_POST['level'];
		@$department = $_POST['dept'];
		@$faculty = $_POST['faculty'];
		@$phone = $_POST['phone'];
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
		@$submit = $_POST['submit'];
	if(isset($submit)){
		

		$query2 = "UPDATE record SET surname='$surname',firstname='$firstname',regnum='$regnum',level='$level',department='$department',faculty='$faculty',phone='$phone',birthday='$birthday',sex='$sex',maritalstatus='$marital',nationality='$nationality',state='$state',LGA='$lga',healthstatus='$health',admitted='$admitted',reason='$reason',tuberculosis='$tb',bloodyurine='$urine',heartdisease='$heart',respiratorydisease='$resp',veneraldisease='$veneral',eardisease='$ear',allergies='$allergy',digestive='$digest',ifyes='$reasonyes',medicalhistory='$history',healthfamily='$family', yellowfever='$yellowfever',smallpox='$smallpox',tetanus='$tetanus',others='$others' WHERE regnum = '$tregnum'";
		$result2 =mysqli_query($conn,$query2);
		move_uploaded_file($temp,"photos/$image");
		echo "<script>alert('Your Changes Have Been Updated Successfully');</script>";
		echo "<script>window.open('processMedicalForm.php','_self');</script>";

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

	<div class="row container">

		<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading" style="background:darkblue;"><h3>Make Your Changes</h3></div>
			<div class="panel-body">
		<form method="POST" action="EditRecord.php" enctype="multipart/form-data">
			<div class="row">
				<div class="col-xs-6"><hr>
					<div class="form-group col-xs-4">
						Surname:<input type="text" name="surname" value="<?php echo $dbsurname; ?>" class="form-control input-sm" required="required">
					</div>
					<div class="form-group col-xs-4">
						First Name:<input type="text" name="firstname" value="<?php echo $dbfirstname; ?>" class="form-control input-sm" required="required">
					</div>
					<div class="form-group col-xs-4">
						Reg Number:<input type="text" name="regnum" value="<?php echo $dbregnum; ?>" class="form-control input-sm" required="required">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group col-xs-4">
						Level:<input type="text" name="level" value="<?php echo $dblevel; ?>" class="form-control input-sm" required="required">
					</div>
					<div class="form-group col-xs-4">
						Department:<input type="text" name="dept" value="<?php echo $dbdepartment; ?>" class="form-control input-sm" required="required">
					</div>
					<div class="form-group col-xs-4">
						Faculty:<input type="text" name="faculty" value="<?php echo $dbfaculty; ?>" class="form-control input-sm" required="required">
					</div>
					<div id="output-img"><?php echo "<img class='position1' src='photos/$dbphoto' width='100' height='100'/>" ?></div>

					<div class="form-group col-xs-4">
						Phone:<input type="text" name="phone" value="<?php echo $dbphone; ?>" class="form-control input-sm" required="required">
					</div>
					
				</div>
			</div>

			<div class="row">
				<div class="col-xs-6">
				<hr>
					<div class="form-group col-xs-4">
							Date of Birth<br> (dd/mm/yyyy):<input type="text" name="birthday" value="<?php echo $dbbirthday; ?>" class="form-control input-sm" required="required">
					</div>
					<div class="form-group col-xs-4">
							Sex:<input type="text" name="sex" value="<?php echo $dbsex; ?>" class="form-control input-sm" required="required">
					</div>
					<div class="form-group col-xs-4">
							Marital Status:<input type="text" name="status" value="<?php echo $dbmarital; ?>" class="form-control input-sm" required="required">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group col-xs-4">
						Nationality:<input type="text" name="nationality" value="<?php echo $dbnationality; ?>" class="form-control input-sm" required="required">
					</div>
					<div class="form-group col-xs-4">
						State Of Origin:<input type="text" name="state" value="<?php echo $dbstate; ?>" class="form-control input-sm" required="required">
					</div>
					<div class="form-group col-xs-4">
						L.G.A:<input type="text" name="LGA" value="<?php echo $dblga; ?>" class="form-control input-sm" required="required">
					</div>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4">
					A. Would you say your health was Good/Fair/Poor?:<input type="text" name="gfp" value="<?php echo $dbhealth; ?>" class="form-control input-sm"> 
					B. Have you ever been admitted as a patient into a hospital?:<input type="text" name="admit" value="<?php echo $dbadmitted; ?>" class="form-control input-sm">
					if yes please state reason for admission, name of hospital and date below:
					<input type="text" name="reason" value="<?php echo $dbreason; ?>" class="form-control input-sm"/>
				<div class="row">	C. Do you suffer from or have you suffered from any of the following? (indicate YES or NO):<br> </div>
					1. Tuberculosis:<input type="text" name="tb" value="<?php echo $dbtb; ?>" class="form-control input-sm">
					2. Passing blood in the urine:<input type="text" name="urine" value="<?php echo $dburine; ?>" class="form-control input-sm">
					3. Any disease of the heart:<input type="text" name="hrt" value="<?php echo $dbheart ?>" class="form-control input-sm">
					4. Any respiratory disease:<input type="text" name="resp" value="<?php echo $dbresp; ?>" class="form-control input-sm">
					5. Any Veneral disease:<input type="text" name="veneral" value="<?php echo $dbveneral; ?>" class="form-control input-sm">
					6. Any disease of Ear, Nose, Throat or Blader:<input type="text" name="ear" value="<?php echo $dbear; ?>" class="form-control input-sm">
					7. Allergies e.g. Asthma, Skin disease:<input type="text" name="allergies" value="<?php echo $dballergy; ?>" class="form-control input-sm">
					8. Any disease of digestive system e.g. Peptic ulcer, hernia, pile etc:<input type="text" name="digest" value="<?php echo $dbdigest; ?>" class="form-control input-sm">
					if the anwser to any of the above is yes, please give details with dates below:
					<input type="text" name="reasonyes" value="<?php echo $dbreasonyes; ?>" class="form-control input-sm"/>
					D. If there is any other relevant details of your medical history not covered by the questions please give particulars below:<input type="text" name="history" value="<?php echo $dbhistory; ?>" class="form-control input-sm"/>
					<center>(<b>Indicate YES or NO to these Questions</b>)</center> <br>
					E. Is your family a healthy one?:<input type="text" name="family" value="<?php echo $dbfamily; ?>" class="form-control input-sm">
					F. Have you been immunized against any of the following?:<br>
					1.Yellow Fever:<input type="text" name="yellowfever" value="<?php echo $dbyellowfever; ?>" class="form-control input-sm">
					2. Small Pox:<input type="text" name="smallpox" value="<?php echo $dbsmallpox; ?>" class="form-control input-sm">
					3. Tetanus:<input type="text" name="tetanus" value="<?php echo $dbtetanus; ?>" class="form-control input-sm">
					4. Others specify:<input type="text" name="others" value="<?php echo $dbothers; ?>" class="form-control input-sm">
				</div>
			</div>
					<hr>

					<center>
					<a href="StudentHome.php" class="btn btn-danger">CANCEL</a>				
					<input type="submit" name="submit" value="UPDATE & PRINT" class="btn btn-primary" >
					</center>
					<hr>
					</form>
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
