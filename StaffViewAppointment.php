<?php
session_start();
$tregnum = $_SESSION['username'];



?>
<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|View Student Appointment</title>
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/Indexcss.css"/>
	<script>
		function setUpdateAction() {
		var test = confirm("Are you sure you want to confirm these Appointment?")
		if(test == true) {	
		document.frmUser.action = "StaffViewAppointmentProcess.php";
		document.frmUser.submit();
		}
	}
		function setDeleteAction() {
		var test = confirm("Are you sure you want to delete these Appointment?")
		if(test == true) {
		document.frmUser.action = "StaffViewAppointmentProcess2.php";
		document.frmUser.submit();
		}
}
	

	</script>

</head>
<body>
<div id="cont" class="container">
	<div class="row">
		<div class="col-lg-12">
		<img src="images/top_image.png" width="1140px" height="70px" class="img-responsive">

		<br><br>
	</div>
</div>
<div class="row">
<div class="panel panel-default">
<div class="panel-heading" style="background:darkblue;color:white;">Appointment Details</div>
<div class="panel-body">
<div class="col-xs-12" style="background:skyblue; color:white; width:1100px; margin-left:20px; margin-top:0px; border-radius:10px; height:auto;">
<!--Pagination starts here-->
<?php
$conn = mysqli_connect('localhost','root','','schedule');
$sql = "SELECT * FROM appointment ORDER BY id DESC";
$result = mysqli_query($conn,$sql);

/*logic start here*/
$numrow = mysqli_num_rows($result);
if(isset($_GET['pagenum'])){
	$pagenum = preg_replace('#[^0-9]#i','', $_GET['pagenum']);
}else{
	$pagenum = 1;
}

$itemsPerPage = 10;
$lastpage = ceil($numrow/$itemsPerPage);
if($pagenum < 1){
	$pagenum = 1;
}elseif($pagenum > $lastpage){
	$pagenum = $lastpage;
}

$start = ($pagenum - 1) * $itemsPerPage;
$prev = $pagenum - 1;
$next = $pagenum + 1;
$sql2 = "SELECT * FROM appointment ORDER BY id DESC LIMIT $start,$itemsPerPage";
$runquery = mysqli_query($conn,$sql2);
$numrow = mysqli_num_rows($runquery);
if($numrow != 0){
	echo"<div class='row' style='margin-top:10px;'>
	<div class='col-xs-12'>
		<table class='table table-bordered' >
		<tr style='color:blue;'>
		<th></th>
		<th>NAME</th>
		<th>REG NUMBER</th>
		<th>PHONE</th>
		<th>APPOINTMENT DATE</th>
		<th>APPOINTMENT TIME</th>
		<th>REASON FOR APPOINTMENT</th>
		<th>APPOINTMENT STATUS</th>
		</tr>";
?>
<form method="POST" action="" name="frmUser">
<?php
	while($row = mysqli_fetch_assoc($runquery)){
		$id = $row['id'];
		$name = $row['full_name'];
		$regnumber = $row['reg_number'];
		$phone = $row['phone'];
		$appdate = $row['appdate'];
		$apptime = $row['apptime'];
		$reason = $row['reason_for_appointment'];
		$confirm = $row['appointment_status'];
?>
		<tr>
		<td><input name='id[]' type ='checkbox' value='<?php echo $id ?>'></td>
		<td><?php echo $name ?></td>
		<td><?php echo $regnumber ?></td>
		<td><?php echo $phone ?></td>
		<td><?php echo $appdate ?></td>
		<td><?php echo $apptime ?></td>
		<td><?php echo $reason ?></td>
		<td><?php echo $confirm ?></td>
		</tr>

<?php		
	}
	echo"</table>";
	
	

?>

</div>
<!--Blue background ends here-->

</div>
</div>
</div>


<?php

/*clickable number*/
echo "<ul class='pager'>";
if(!($pagenum<=1)){
	echo " <li> <a href='StaffViewAppointment.php?pagenum=$prev'>&larr; Prev</a> </li>";
	}

	if($lastpage >= 1){
		for ($i=1; $i <=$lastpage ; $i++) { 
			echo ($i == $pagenum) ? '<b><a href="?pagenum='.$i.'">'.$i.'</a></b> ':'<a href="?pagenum='.$i.'">'.$i.'</a> ';
		}
	}

	if(!($pagenum>=$lastpage)){
	echo "<li> <a href='StaffViewAppointment.php?pagenum=$next'>Next &rarr;</a> </li>";
	}
	echo "</ul>";
}else{
	echo"<span style='color:red;'>NO APPOINTMENT DETAILS TO DISPLAY</span>";



} 
?>

</form>
<div class="row">
	<div class="col-xs-4" style="margin-left:30px;">
		<a href="StaffHome.php"><input type="submit" name="back" class="btn btn-primary" value="BACK"/></a>
		<input type="submit" name="confirm" class="btn btn-success" value="CONFIRM" onclick="setUpdateAction();" />
		<input type="submit" name="delete" class="btn btn-danger" value="DELETE" onclick="setDeleteAction();"/>


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
