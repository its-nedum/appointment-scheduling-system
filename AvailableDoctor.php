<?php
session_start();
$page = $_SERVER['PHP_SELF'];
$time = '5';
header("Refresh: $time; url=$page");
?>

<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|Available Doctor</title>
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
				
			</div>
		</div>-->
	</div>
</div>


 
 <div class="row">
<div class="panel panel-default">
<div class="panel-heading" style="background:darkblue;color:white;">Completed Appointment Details</div>
<div class="panel-body">
<div class="col-xs-12" style="background:skyblue; color:white; width:1100px; margin-left:20px;margin-top:0px;border-radius:10px; ">

<!--Pagination starts here-->
<?php
$conn = mysqli_connect('localhost','root','','schedule');
$sql = "SELECT * FROM next ORDER BY id DESC";
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
$sql2 = "SELECT * FROM next ORDER BY id DESC LIMIT $start,$itemsPerPage";
$runquery = mysqli_query($conn,$sql2);
$numrow = mysqli_num_rows($runquery);
if($numrow != 0){
	echo"<div class='row' style='margin-top:10px;'>
	<div class='col-xs-12'>
		<table class='table table-bordered' >
		<tr style='color:blue;'>
		<th>STUDENT NAME</th>
		<th>APPOINTMENT DATE</th>
		<th>START TIME</th>
		<th>STOP TIME</th>
		<th>AVAILABLE CONSULTANT</th>
		</tr>";
?>
<?php
	while($row = mysqli_fetch_assoc($runquery)){
		$id = $row['id'];
		$name = $row['name'];
		$appdate = $row['appdate'];
		$start = $row['start_time'];
		$stop = $row['stop_time'];
		$consultant = $row['consultant'];

?>
	<tr>
		<td><?php echo $name ?></td>
		<td><?php echo $appdate ?></td>
		<td><?php echo $start ?></td>
		<td><?php echo $stop ?></td>
		<td><?php echo $consultant ?></td>
		</tr>

<?php		
	}
	echo"</table>";
?>
</div>
</div>
</div>
</div>

<?php
/*clickable number*/
echo "<ul class='pager'>";
if(!($pagenum<=1)){
	echo " <li> <a href='AvailableDoctor.php?pagenum=$prev'>&larr; Prev</a> </li>";
	}

	if($lastpage >= 1){
		for ($i=1; $i <=$lastpage ; $i++) { 
			echo ($i == $pagenum) ? '<b><a href="?pagenum='.$i.'">'.$i.'</a></b> ':'<a href="?pagenum='.$i.'">'.$i.'</a> ';
		}
	}

	if(!($pagenum>=$lastpage)){
	echo "<li> <a href='AvailableDoctor.php?pagenum=$next'>Next &rarr;</a> </li>";
	}
	echo "</ul>";
}else{
	echo"<span style='color:red;'>NO APPOINTMENT DETAILS TO DISPLAY</span>";

echo"</div>";
echo"</div>";

} 
?>
<div style="margin-left:30px;">
<a href="NurseHome.php" class="btn btn-danger">BACK</a>
<a href="AvailableDoctor.php" class="btn btn-primary">REFRESH</a>
</div>
</div>
<!---Pagination ends here-->


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
