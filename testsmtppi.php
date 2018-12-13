d>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<?php
	require_once('class.phpmailer.php');
	$mail = new PHPMailer();
	$mail->IsHTML(true);
	$mail->IsSMTP();
	$mail->SMTPAuth = false; // enable SMTP authentication
	//$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
	$mail->Host = "pi.eng.src.ku.ac.th"; // sets GMAIL as the SMTP server
	$mail->Port = 25; // set the SMTP port for the GMAIL server
	//$mail->Username = "myaccount@gmail.com"; // GMAIL username
	//$mail->Password = "mypassword"; // GMAIL password
	$mail->From = "admin@pi.eng.src.ku.ac.th"; // "name@yourdomain.com";
	//$mail->AddReplyTo = "support@thaicreate.com"; // Reply
	$mail->FromName = "Nan Nan";  // set from Name
	$mail->Subject = "Test sending mail."; 
	$mail->Body = "My Body & <b>My Description</b>";

	$mail->AddAddress("ixhundred@gmail.com", "Vanlop Incham"); // to Address

	//$mail->AddAttachment("thaicreate/myfile.zip");
	//$mail->AddAttachment("thaicreate/myfile2.zip");

	//$mail->AddCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC
	//$mail->AddBCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC

	$mail->set('X-Priority', '1'); //Priority 1 = High, 3 = Normal, 5 = low

	$mail->Send(); 
?>
</body>
</html>
