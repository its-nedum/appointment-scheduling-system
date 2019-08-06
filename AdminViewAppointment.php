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
		document.frmUser.action = "StaffViewAppointmentProcess.php";
		document.frmUser.submit();
	}
		function setDeleteAction() {
		var test = confirm("Are you sure want to delete these Appointment?")
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
		</div> -->
		<br><br>
	</div>
</div>
<div class="row">

<div class="col-xs-12" style="background:skyblue; color:white; width:1133px; margin-left:20px; margin-top:20px; border-radius:10px; height:auto;">
<?php
mysql_connect('localhost','root','') or die('Unable to connect');
@mysql_select_db(schedule);
$per_page = 10;
$pages_query = mysql_query("SELECT COUNT('id') FROM appointment");
$pages = ceil(mysql_result($pages_query,0)/$per_page);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_page;
$prev = $page - 1;
$next = $page + 1; 

$query = "SELECT * FROM appointment LIMIT $start,$per_page";
$result = mysql_query($query);
$numrow = mysql_num_rows($result);
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
	while($row = mysql_fetch_assoc($result)){
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
		<td><input name='id[]' type ='checkbox' value='<?php echo $id ?>'</td>
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
</div>

<div class='row'>
<div class='col-xs-12'>
<?php

if(!($page<=1)){
	echo " <a href='StaffViewAppointment.php?page=$prev'>Prev</a> ";
	}
	if($pages >= 1){
		for ($i=1; $i <=$pages ; $i++) { 
			echo ($i == $page) ? '<b><a href="?page='.$i.'">'.$i.'</a></b> ':'<a href="?page='.$i.'">'.$i.'</a> ';
		}
	}
	if(!($page>=$pages)){
	echo " <a href='StaffViewAppointment.php?page=$next'>Next</a>";
	}
}else{
	echo"<span style='color:red;'>NO APPOINTMENT DETAILS TO CONFIRM</span>";

echo"</div>";
echo"</div>";

}

?>

</form>
<div class="row">
	<div class="col-xs-4">
		<a href="AdminHome.php"><input type="submit" name="back" class="btn btn-primary" value="BACK"/></a>
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
