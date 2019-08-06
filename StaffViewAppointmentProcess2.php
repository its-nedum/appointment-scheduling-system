<?php
session_start();
$conn = mysqli_connect('localhost','root','','schedule');

$rowCount = count($_POST["id"]);
for($i=0;$i<$rowCount;$i++) {
$query = "DELETE FROM appointment WHERE id='" . $_POST["id"][$i] . "'";
mysqli_query($conn,$query);
}

header("Location:StaffViewAppointment.php");

?>


