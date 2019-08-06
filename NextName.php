<?php
session_start();
if(isset($_GET['date'])){
	if(isset($_GET['time'])){
	$apptime = $_GET['time'];
	$appdate = $_GET['date'];
}
}
	$conn = mysqli_connect('localhost','root', '', 'schedule') or die('Unable to connect');
	$query = "SELECT * FROM appointment WHERE apptime = '$apptime' AND appdate = '$appdate' ";
	$result = mysqli_query($conn,$query);
	$numrow = mysqli_num_rows($result);
		if($numrow >  0){
			while($row = mysqli_fetch_assoc($result)){
				$dbname = $row['full_name'];
			}
			echo $dbname;
}


?>