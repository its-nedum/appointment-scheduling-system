<link rel="stylesheet" type="text/css" href="CSS/Indexcss.css"/>

<?php
session_start();
$tregnum = $_SESSION['regnum'];

	mysql_connect('localhost','root', '') or die('Unable to connect');
	@mysql_select_db(schedule);
	$query = mysql_query("SELECT * FROM record WHERE regnum = '$tregnum'");

	$numrow = mysql_num_rows($query);
	if($numrow = 1){
		while($row = mysql_fetch_assoc($query)){
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

?>
<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|Medical Form print out</title>
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap-theme.min.css">
</head>
<body>
<div class="container">
	<div><br></br>
	<center><b>
		CHUKWUEMEKA ODUMEGWU OJUKWU UNIVERSITY ULI.<br>
		Student Medical Examination Form.</b><br><br><br><br>
	</center>
	</div>
<div class="row">
</div>
<div class="output-img"><?php echo "<img class='position' src='photos/$dbphoto' width='100' height='100'/>" ?></div>
	<div class="row">
		<div class="col-xs-6">
			<div class="col-xs-6"><b>Surname</b>:	<?php echo $dbsurname; ?> </div>
			<div class="col-xs-6"><b>First Name</b>:	<?php echo $dbfirstname; ?> </div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-6">
			<div class="col-xs-4"><b>Registration number</b>:	<?php echo $dbregnum; ?></div>
			<div class="col-xs-4"><b>Level</b>:	<?php echo $dblevel; ?></div>
			<div class="col-xs-4"><b>Department</b>:	<?php echo $dbdepartment; ?></div>
		</div>
	</div>
	<div>
	
	</div>
	<div class="row">
		<div class="col-xs-6">
			<div class="col-xs-4"><b>Faculty</b>:	<?php echo $dbfaculty; ?></div>
			<div class="col-xs-4"><b>Phone</b>:	<?php echo $dbphone; ?></div>
			<div class="col-xs-4"><b>Date of Birth</b>:	<?php echo $dbbirthday; ?></div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<div class="col-xs-4"><b>Sex</b>:	<?php echo $dbsex;?></div>
			<div class="col-xs-4"><b>Marital status</b>:	<?php echo $dbmarital;?></div>
			<div class="col-xs-4"><b>Nationality</b>:	<?php echo $dbnationality;?></div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<div class="col-xs-4"><b>State</b>:	<?php echo $dbstate;?></div>
			<div class="col-xs-4"><b>L.G.A</b>:		<?php echo $dblga;?></div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<b>A. Would you say your health was Good/Fair/Poor?</b>:	<?php echo $dbhealth;?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<b>B. Have you ever been admitted as a patient into a hospital?</b>:	<?php echo $dbadmitted; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
		<b>if yes please state reason for admission, name of hospital and date below</b>:	<?php echo $dbreason;?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
		<b>C. Do you suffer from or have you suffered from any of the following? (indicate YES or NO)</b>:
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
		<b>1. Tuberculosis</b>:		<?php echo $dbtb;?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
		<b>2. Passing blood in the urine</b>:	<?php echo $dburine;?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
		<b>3. Any disease of the heart</b>:		<?php echo $dbheart;?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
		<b>4. Any respiratory disease</b>:		<?php echo $dbresp;?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
		<b>5. Any Veneral disease</b>:		<?php echo $dbveneral;?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
		<b>6. Any disease of Ear, Nose, Throat or Blader</b>:		<?php echo $dbear;?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
		<b>7. Allergies e.g. Asthma, Skin disease</b>:		<?php echo $dballergy;?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
		<b>8. Any disease of digestive system e.g. Peptic ulcer, hernia, pile etc</b>:		<?php echo $dbdigest;?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
		<b>if the anwser to any of the above is yes, please give details with dates below</b>:		<?php echo $dbreasonyes;?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
		<b>D. If there is any other relevant details of your medical history not covered by the questions please give particulars below</b>:		<?php echo $dbhistory;?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
		(<b>Indicate YES or NO to these Questions</b>)
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
		<b>E. Is your family a healthy one?</b>:		<?php echo $dbfamily;?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
		<b>F. Have you been immunized against any of the following?</b>:
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
		<b>1.Yellow Fever</b>:		<?php echo $dbyellowfever;?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
		<b>2. Small Pox</b>:		<?php echo $dbsmallpox;?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
		<b>3. Tetanus</b>:		<?php echo $dbtetanus;?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
		<b>4. Others specify</b>:		<?php echo $dbothers;?>
		</div>
	</div>

	<div class="row">
					<center><h4>TO BE COMPLETED BY A DOCTOR AVAILABLE IN THE UNIVERSITY MEDICAL CENTRE</h4></center>
				<b>	Height:...................... M:....................... GM:..................... Weight:.......................<br>
					KG:....................... G:..................................................................................<br>
					</div>

					<div class="row">
						<div class="col-xs-4">
							Visual Acuity <br>
							Without glasses R 6/ 16/<br> </br>
							<u>HEARING</u><br>
							Left:...............................<br>
							Right:..............................<br>
							Eye:................................<br>
							Ear:................................<br>
							Pharynx:............................<br>
							Teeth:..............................<br>
							Lymphatic Glands:...................<br>
							Skin:...............................<br>
						</div>

						<div class="col-xs-4">
							<u>CIRCULATORY SYSTEM</u><br>
							Heart:..............................<br>
							Blood Pressure:......................<br></br>
							<u>RESPIRATORY SYSTEM</u><br>
							Lungs:..............................<br>
							Abdomen:............................<br>
							Liver:..............................<br>
							Spleen:.............................<br>
							Hernia:.............................<br>
						</div>

						<div class="col-xs-4">
							<u>BLOOD</u><br>
							HB:.................................<br>
							Blood Group:........................<br>
							Genotype:...........................<br>
							VDRL Test:..........................<br>
						</div>
						<hr>
					</div>
					<br> </br>
					<center>
						Medical Officer(Name):.........................................................<br> </br>
						Signature:..........................<br> </br>
						Date:.............................<br> </br>
					</center>
				</b>
	<center>
		<a href="StudentHome.php" class="btn btn-danger">CANCEL</a>
	<input type="submit" name="print" value="PRINT" class="btn btn-primary" onclick="window.print();"></center>
</div>
	<script type="text/javascript" src="JQUERY/jquery-3.1.1.min.js"></script>
	<script src="BOOTSTRAP/js/bootstrap.min.js"> </script>
</body>
</html>
