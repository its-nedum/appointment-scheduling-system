<!DOCTYPE html>
<html>
<head>
	<title>COOU Medical Centre|Feedbacks</title>
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
	<link rel="stylesheet" href="BOOTSTRAP/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/Indexcss.css"/>

</head>
<body>
<div id="cont" class="container">
	<div class="row">
		<div class="col-lg-12">
		<img src="images/top_image.png" width="1140px" height="70px" class="img-responsive">
<br>
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
<br>
<?php
session_start();
mysql_connect('localhost','root','') or die('Unable to connect');
@mysql_select_db(schedule);
$per_page = 5;
$pages_query = mysql_query("SELECT COUNT('id') FROM contact_us");
$pages = ceil(mysql_result($pages_query,0)/$per_page);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_page;
$prev = $page - 1;
$next = $page + 1; 

$query = "SELECT * FROM contact_us LIMIT $start,$per_page";
$result = mysql_query($query);
$numrow = mysql_num_rows($result);
if($numrow != 0){

?>
<div class="panel panel-default">
<div class="panel-heading" style="background:darkblue;"><h3>Contact Us Messages</h3></div>
<div class="panel-body">
<div style="background-color:skyblue;  width:1100px; color:white; margin-top:10px; border-radius:10px;">
<div class='row' style='margin-top:10px;'>
<div class='col-xs-12'>
<table class="table table-bordered">
<tr>
<th>s/n</th>
<th>NAME</th>
<th>EMAIL</th>
<th>PHONE</th>
<th>MESSAGE</th>
</tr>
<?php
	while($row = mysql_fetch_assoc($result)){
		$dbid = $row['id'];
		$dbname = $row['name'];
		$dbemail = $row['email'];
		$dbphone = $row['phone'];
		$dbmessage = $row['message'];


?>

<tr>
<td><?php echo $dbid ?></td>
<td><?php echo $dbname ?></td>
<td><?php echo $dbemail ?></td>
<td><?php echo $dbphone ?></td>
<td><?php echo $dbmessage ?></td>
</tr>

<?php
}
?>
</table>
</div>
</div>
</div>

<?php
}
?>
</div>
</div>
<?php
	if(!($page<=1)){
	echo "<a href='ContactUs.php?page=$prev'>Prev</a> ";
	}
	if($pages >= 1){
		for ($i=1; $i <=$pages ; $i++) { 
			echo ($i == $page) ? '<b><a href="?page='.$i.'">'.$i.'</a></b> ':'<a href="?page='.$i.'">'.$i.'</a> ';
		}
	}
	if(!($page>=$pages)){
	echo " <a href='ContactUs.php?page=$next'>Next</a>";
	}
?>
<br>
<a href="AdminHome.php" class="btn btn-danger">BACK</a>




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
