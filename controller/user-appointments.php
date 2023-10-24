<?php
include('database.php');
error_reporting(0);
$user = $_SESSION['id'];
$tbl_appointments = $mysqli->query("SELECT a.* ,b.firstname , b.lastname , c.service FROM tbl_appointments a 
									LEFT JOIN tbl_signup b on b.id = a.user_id
									LEFT JOIN tbl_offer c on a.service_id = c.id
									where a.user_id = '$user'");



if(isset($_POST['check-date'])){
	
	$date =  $_POST['date'];
	$tbl_appointments = $mysqli->query("SELECT * FROM tbl_appointments where request_date = '$date' and approved!=4 ");
	$count  = $tbl_appointments->num_rows;
	
	if($count != 9){
		echo 'yes';
	} else {
		echo 'no';
	}
}

if(isset($_POST['check-time'])){
	
	$date =  $_POST['date'];
	$time =  $_POST['time'];
	$tbl_appointments = $mysqli->query("SELECT * FROM tbl_appointments where request_date = '$date' and request_time = '$time'  and approved!=4 ");
	$count  = $tbl_appointments->num_rows;
	
	if($count == 0){
		echo 'yes';
	} else {
		echo 'no';
	}
}


if(isset($_POST['submit-schedule'])){
	
	$services =  json_encode($_POST['services'],true);
	$date     =  $_POST['date'];
	$time     =  $_POST['time'];
	$userid   =  $_POST['userid'];
	$mysqli->query("INSERT INTO tbl_appointments (user_id , request_date,request_time,service_id) VALUES ('$userid', '$date' , '$time' , '$services') ");
	  echo '<script>
			  $(document).ready(function() {
					Swal.fire({
							title: "Success! ",
							text: "Appointment Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "appointments";
							});
							});
			</script>';
}

if(isset($_POST['cancel-schedule'])){
	$reason   =  $_POST['reason'];
	$date     =  $_POST['date'];
	$id       =  $_POST['id'];
	$mysqli->query("UPDATE tbl_appointments set approved = 4 , cancel_reason ='$reason' , cancel_date = '$date' where id='$id'");
	  echo '<script>
			  $(document).ready(function() {
					Swal.fire({
							title: "Success! ",
							text: "Appointment Successfully Cancelled",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "appointments";
							});
							});
			</script>';
}
