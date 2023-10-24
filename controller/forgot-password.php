<?php

	ob_start();
	session_start();
	include('database.php');

	$email    = mysqli_real_escape_string($mysqli,$_POST['user']);

	$sql      = "SELECT * FROM tbl_signup WHERE email='$email'  AND is_confirm= 1";
	$result   = mysqli_query($mysqli, $sql);

	$row      = mysqli_fetch_assoc($result);

	if($row["type"]=="patient") {
		$name     = $row['firstname'] .' '. $row['lastname'];
		
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array();
		$alphaLength = strlen($alphabet) - 1; 
		for ($i = 0; $i < 5; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		$code =  implode($pass); 
		
		$sql      = "UPDATE tbl_signup set is_code ='$code' where email='$email'";
		mysqli_query($mysqli, $sql);
		
			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->Host     = 'smtp.hostinger.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'administrator@mlorense.com';
			$mail->Password = '@Mlorense2021';
			$mail->SMTPSecure = 'ssl'; // tls
			$mail->Port     = 465; // 587
			$mail->setFrom('administrator@mlorense.com', 'ML ORENSE');
			$mail->addAddress($email);
			$mail->Subject = 'Code for Password Recovery';
			$mail->isHTML(true);


			$mail->Body = "<html>
								<body>
									<h1>Hello , " .$name ." </h1>
									<p> Code for Password Recovery : " . $code ." </p>
								</body>
							</html>";

			if ($mail->send()) {
				$message = 'success';
			} else {
				$message = 'failed';
			}
		header("location:../forgot-code.php");
	} else {
		header("location:../forgot-password.php?error");
	}
