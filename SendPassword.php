<html>
<head>
<title>Easy Extra Education</title>
</head>
<body>
<?php
	mysql_connect("localhost","3e","123456");
	mysql_select_db("project59");
	$strSQL = "SELECT * FROM 3e_user WHERE email = '".trim($_POST['txtEmail'])."' ";
	// $strSQL = "SELECT * FROM 3e_user WHERE username = '".trim($_POST['txtUsername'])."'
	// OR email = '".trim($_POST['txtEmail'])."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "Not Found Username or Email!";
	}
	else
	{
		echo "Your password send successful.<br>Send to mail : ".$objResult["Email"]
		require_once("../class.phpmailer.php");

			$mail = new PHPMailer();                    // create a new object
			$mail->IsSMTP();                         // enable SMTP
			$mail->SMTPDebug = 1;                     // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true;                     // authentication enabled
			$mail->SMTPSecure = 'ssl';                     // secure transfer enabled REQUIRED for GMail
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 465;                         // or 587
			$mail->IsHTML(true);
			$mail->Username = "hulahulalive@gmail.com"; //=>ตรงนี้ใสส่เป็น Gmail
			$mail->Password = "lalalanan"; //=> รหัสผ่าน
			$mail->From = "Easy Extra Education ค้นหาแหล่งเรียนพิเศษได้ตรงใจที่สุด";
			$mail->FromName = "hulahulalive@gmail.com";
			$mail->Subject = "Easy Extra Education ค้นหาแหล่งเรียนพิเศษได้ตรงใจที่สุด";
			$bodyMsg="<html>";
			$bodyMsg.="<body>";
			$bodyMsg.="<br/>";
			$bodyMsg.="TESTING Sendmail";
			$bodyMsg.="</body>";
			$bodyMsg.="</html>";
			$mail->Body = $bodyMsg;
			$mail->AddAddress($objResult);//=> $email เป็นตัวแปลที่รับค่ามาจาก Input เช็คแล้วว่ามีค่า
			if(!$mail->Send()){
				echo "Message could not be sent. <p>";
				echo "Mailer Error: " . $mail->ErrorInfo;
			}else{
				echo "Message has been sent";
			}
			// echo "Your password send successful.<br>Send to mail : ".$objResult["Email"];
			//
			// $strTo = $objResult["txtEmail"];
			// $strSubject = "Your Account information username and password.";
			// $strHeader = "Content-type: text/html; charset=windows-874\n"; // or UTF-8 //
			// $strHeader .= "From: pi.eng.src.ku.ac.th\nReply-To: pi.eng.src.ku.ac.th";
			// $strMessage = "";
			// $strMessage .= "Welcome : ".$objResult["Name"]."<br>";
			// $strMessage .= "Username : ".$objResult["Username"]."<br>";
			// $strMessage .= "Password : ".$objResult["Password"]."<br>";
			// $strMessage .= "=================================<br>";
			// $strMessage .= "Easy Extra Education ค้นหาแหล่งเรียนพิเศษได้ตรงใจที่สุด";
			// $flgSend = mail($strTo,$strSubject,$strMessage,$strHeader);
// 			require_once 'class.phpmailer.php';
// $mail = new PHPMailer();
// $mail->CharSet = "UTF-8";
// $subject = "my subject";
// $msg = "hey there!";
// $from = "myemail@gmail.com";
// $fname = "my name";
// $mail->From = $from;
// $mail->FromName = $fname;
// $mail->AddAddress("tosomeone@somedomain.com");
// $mail->AddReplyTo($from,$fname);
// $mail->Subject = $subject;
// $mail->Body    = $msg;
// $mail->preSend();
// $mime = $mail->getSentMIMEMessage();
// $m = new Google_Service_Gmail_Message();
// $data = base64_encode($mime);
// $data = str_replace(array('+','/','='),array('-','_',''),$data); // url safe
// $m->setRaw($data);
// $service->users_messages->send('me', $m);

	}




	mysql_close();
?>
</body>
</html>
