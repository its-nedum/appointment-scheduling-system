<?php
/*This code checks for appointment availabilty with Ajax*/
session_start();
if(isset($_GET['apptime'])){
	if(isset($_GET['appdate'])){
	$apptime = $_GET['apptime'];
	$appdate = $_GET['appdate'];
}
}
	$conn = mysqli_connect('localhost','root', '', 'schedule') or die('Unable to connect');
	$query = "SELECT * FROM appointment WHERE apptime = '$apptime' AND appdate = '$appdate' ";
	$result = mysqli_query($conn,$query);
	$numrow = mysqli_num_rows($result);
		if($numrow >  0){
			echo '*That appointment has already been booked by another student....Try selecting another time or date';

}

?>