<?php session_start();
$regnumba = $_SESSION['regnum'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|View Appointment</title>
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/Indexcss.css"/>

	<script type="text/javascript">
		function remove(){
			var ans = confirm('ARE YOU SURE YOU WANT TO DELETE THIS APPOINTMENT?');
			if(ans==true){

			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			} else{
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){					
					window.open('ViewAppointment.php','_self');
					document.getElementById('display').innerHTML = xmlhttp.responseText;

				}
			}
			xmlhttp.open("GET","ViewAppointmentProcess.php?chk="+document.getElementById("ids").value,true);
			xmlhttp.send();

		}else{
			window.open('ViewAppointment.php','_self');
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
<div class="row" >
<div class="panel panel-default">
<div class="panel-heading" style="background:darkblue;"><h3>View Appointment</h3></div>
<div class="panel-body">
<div class="col-xs-12" style="background:skyblue; color:white; width:1100px; margin-left:10px;margin-top:20px;border-radius:10px;">
<!--Pagination starts here-->
<?php
$conn = mysqli_connect('localhost','root','','schedule');
$sql = "SELECT * FROM appointment WHERE reg_number = '$regnumba' ORDER BY id DESC";
$result = mysqli_query($conn,$sql);

/*logic start here*/
$numrow = mysqli_num_rows($result);
if(isset($_GET['pagenum'])){
	$pagenum = preg_replace('#[^0-9]#i','', $_GET['pagenum']);
}else{
	$pagenum = 1;
}

$itemsPerPage = 2;
$lastpage = ceil($numrow/$itemsPerPage);
if($pagenum < 1){
	$pagenum = 1;
}elseif($pagenum > $lastpage){
	$pagenum = $lastpage;
}


$start = ($pagenum - 1) * $itemsPerPage;
$prev = $pagenum - 1;
$next = $pagenum + 1;
$sql2 = "SELECT * FROM appointment WHERE reg_number = '$regnumba' ORDER BY id DESC LIMIT $start,$itemsPerPage";
$runquery = mysqli_query($conn,$sql2);
$numrow = mysqli_num_rows($runquery);
if($numrow != 0){
	echo"<div class='row' style='margin-top:10px;'>
	<div class='col-xs-12'>
		<table class='table table-bordered'>
		<tr>
		<th>NAME</th>
		<th>REG NUMBER</th>
		<th>PHONE</th>
		<th>APPOINTMENT DATE</th>
		<th>APPOINTMENT TIME</th>
		<th>REASON FOR APPOINTMENT</th>
		<th>APPOINTMENT STATUS</th>
		<th>DELETE APPOINTMENT</th>
		</tr>";
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
	<tr><td><?php echo $name;?></td><td><?php echo $regnumber;?></td><td><?php echo $phone;?></td><td><?php echo $appdate;?></td><td><?php echo $apptime;?></td><td><?php echo $reason;?></td><td><input type='text' value='<?php echo $confirm;?>' class='form-control input-sm' disabled><td><select name='delete' onchange="remove();" class='form-control input-sm'><option>NO</option><option>YES</option></select></td></tr>
	<?php
}
	echo"</table>";
	echo"</div>";
	echo"</div>";
	?>
</div>
</div>
</div>
</div>
	<?php
	/*clickable number*/
echo "<ul class='pager'>";
if(!($pagenum<=1)){
	echo " <li> <a href='ViewAppointment.php?pagenum=$prev'>&larr; Prev</a> </li>";
	}

	if($lastpage >= 1){
		for ($i=1; $i <=$lastpage ; $i++) { 
			echo ($i == $pagenum) ? '<b><a href="?pagenum='.$i.'">'.$i.'</a></b> ':'<a href="?pagenum='.$i.'">'.$i.'</a> ';
		}
	}

	if(!($pagenum>=$lastpage)){
	echo "<li> <a href='ViewAppointment.php?pagenum=$next'>Next &rarr;</a> </li>";
	}
	echo "</ul>";
}
else{
	echo"<span style='color:red;'>NO APPOINTMENT DETAILS TO DISPLAY</span>";
}

?>
	

<div><a href='StudentHome.php'><input type="submit" name="submit" value="<< BACK" class="btn btn-danger"></a></div>


	<br><br>
	<input type='text' id='ids' value='<?php echo $id; ?>' hidden/>
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
