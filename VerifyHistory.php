<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|Medical History</title>
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
			</ul>
			</div>
		</div>
	</div>-->
</div>
<br><br><br><br>
<div class="row">
<div class="col-xs-12" style="background:skyblue; color:white; width:1133px; margin-left:35px;margin-top:20px;border-radius:10px;">
<form action="VerifyHistory.php" method="POST">
Enter Student's Reg Number:
<div class="row" style="margin-top:10px;">
<div class="form-group col-xs-2">
<input class="form-control input-sm" type="text" name="searchtxt">
</div>
<div class="form-group col-xs-4">
<input type="submit" name="searchbtn" value="SEARCH" class="btn btn-success">
</div>
</div>
</form>
<?php
if(isset($_REQUEST['searchbtn'])){
	$search = $_POST['searchtxt'];
	$terms = explode(" ", $search);
	$query = "SELECT * FROM record WHERE ";
	$i = 0;
	foreach ($terms as $each) {
		$i++;
		if($i == 1){
			$query .= "regnum LIKE '%$each%' ";
		}else{
			$query .= "OR regnum LIKE '$each%' ";
		}
	}

$conn = mysqli_connect('localhost', 'root', '', 'schedule');
$result = mysqli_query($conn,$query);	
$numrows = mysqli_num_rows($result);
	if($numrows > 0 && $search != ""){
?>




<?php
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
?>
<div id="output-img"><?php echo "<img class='position1' src='photos/$dbphoto' width='100' height='100'/>" ?></div>
<table class="table">
	<tr>
	<td style='font-size: 27px;'><center><b>MEDICAL HISTORY FOR <?php echo $dbsurname.' '.$dbfirstname.' '.$dbregnum ?></b></center></td>
	</tr>
		
	
	<tr>
	<td>A. Would you say your health was Good/Fair/Poor?:</td> <td><?php echo $dbhealth ?></td>
	</tr>
	<tr>
	<td>B. Have you ever been admitted as a patient into a hospital?:</td><td><?php echo $dbadmitted ?></td>
	</tr>
	<tr>
	<td>if yes please state reason for admission, name of hospital and date below:</td><td><?php echo $dbreason ?></td>
	</tr>
	<tr><td><center><b>C. Do you suffer from or have you suffered from any of the following? (indicate YES or NO)</b></center></td></tr>
	<tr>
	<td>1. Tuberculosis:</td><td><?php echo $dbtb ?></td>
	</tr>
	<tr>
	<td>2. Passing blood in the urine:</td><td><?php echo $dburine ?></td>
	</tr>
	<tr>
	<td>3. Any disease of the heart:</td><td><?php echo $dbheart ?></td>
	</tr>
	<tr>
	<td>4. Any respiratory disease:</td><td><?php echo $dbresp ?></td>
	</tr>
	<tr>
	<td>5. Any Veneral disease:</td><td><?php echo $dbveneral ?></td>
	</tr>
	<tr>
	<td>6. Any disease of Ear, Nose, Throat or Blader:</td><td><?php echo $dbear ?></td>
	</tr>
	<tr>
	<td>7. Allergies e.g. Asthma, Skin disease:</td><td><?php echo $dballergy ?></td>
	</tr>
	<tr>
	<td>8. Any disease of digestive system e.g. Peptic ulcer, hernia, pile etc:</td><td><?php echo $dbdigest ?></td>
	</tr>
	<tr>
	<td>if the anwser to any of the above is yes, please give details with dates below:</td><td><?php echo $dbreasonyes ?></td>
	</tr>
	<tr>
	<td>D. If there is any other relevant details of your medical history not covered by the questions please give particulars below:</td><td><?php echo $dbhistory ?></td>
	</tr>
	<tr><td><center><b>(Indicate YES or NO to these Questions)</b></center></td></tr>
	<tr>
	<td>E. Is your family a healthy one?:</td><td><?php echo $dbfamily ?></td>
	</tr>
	<tr><td>F. Have you been immunized against any of the following?:<td></tr>
	<tr>
	<td>1.Yellow Fever:</td><td><?php echo $dbyellowfever ?></td>
	</tr>
	<tr>
	<td>2. Small Pox:</td><td><?php echo $dbsmallpox ?></td>
	</tr>
	<tr>
	<td>3. Tetanus:</td><td><?php echo $dbtetanus ?></td>
	</tr>
	<tr>
	<td>4. Others specify:</td><td><?php echo $dbothers ?></td>
	</tr>
	<tr><td><center><b>Report from previous Appointments</b></center></td></tr>
<?php
	$querrt = "SELECT * FROM report WHERE regnum = '$dbregnum'";
	$runquery = mysqli_query($conn,$querrt);
	$numbrows = mysqli_num_rows($runquery);
	if($numbrows != 0){
		while($roll = mysqli_fetch_assoc($runquery)){
			$reports = $roll['doctor_report'];
			$reasonit = $roll['reason'];
		}
		}

	}
?>
	<tr>
	<td>Reason For Previous Appointment:</td><td><?php echo $reasonit ?></td>
	</tr>
	<tr>
	<td>Doctor's Report:</td><td><?php echo $reports ?></td>
	</tr>
	</table>
<?php
	}else{
		echo "<span style='color:red'>MEDICAL HISTORY NOT FOUND!!!!</span>";
	}

}else{

}


?>

</div>
<a href="StaffHome.php"><input style="margin-left:20px; margin-top:20px;" type='submit' name='back' class='btn btn-danger' value='<< CANCEL'/></a>
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
