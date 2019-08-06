<?php
session_start();
$regnumba = $_SESSION['regnum'];
$conn = mysqli_connect('localhost','root','','schedule') or die('unable to connect to database');
$query = "SELECT * FROM register WHERE reg_number ='$regnumba' ";
$result = mysqli_query($conn,$query);
$numrow = mysqli_num_rows($result);
if($numrow > 0){
	while($row = mysqli_fetch_assoc($result)){
		$datsurname = $row['surname'];
		$datfirstname = $row['first_name'];
		$datregnum = $row['reg_number'];
		$datphone = $row['phone'];
	}
}

$nameit = $datsurname.' '.$datfirstname;



/*this code sends booked appointments to the database*/

/*@$name = $_POST['name'];
@$regnum = $_POST['regnum'];
@$phone = $_POST['phone'];
*/
@$first = $_POST['visit'];
@$appdate = date($_POST['appdate']);
@$apptime = $_POST['apptime'];
@$concern = $_POST['concern'];
@$submit = $_POST['submit'];

if(isset($submit)){
		$query ="INSERT INTO appointment(first_timer,full_name,reg_number,phone,appdate,apptime,reason_for_appointment,appointment_status)VALUES('$first','$nameit','$datregnum','$datphone','$appdate','$apptime','$concern','Pending')";
		$result = mysqli_query($conn,$query);
			echo "<script>alert('Your Appointment has being Successfully booked');</script>";
			echo "<script>window.open('StudentHome.php','_self');</script>";

	}
	
	
 ?>