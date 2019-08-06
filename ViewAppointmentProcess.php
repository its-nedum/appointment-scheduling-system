<?php
session_start();
if(isset($_GET['chk'])){
	$id = $_GET['chk'];
}

$conn = mysqli_connect('localhost','root','','schedule') or die('unable to connect');

$query = "DELETE FROM appointment WHERE id = '$id'";
mysqli_query($conn,$query);
echo "Appointment deleted successfully";



?>