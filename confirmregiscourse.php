<?php
$ebits = ini_get('error_reporting');
error_reporting($ebits ^ E_NOTICE);
	session_start();
	isset($_SESSION['id']) ? $id = $_SESSION['id'] : $id = '';
	isset($_SESSION['status']) ? $name = $_SESSION['status'] : $name = '';
	$newid = $_SESSION['id'];
	if($_SESSION['status'] == "")
	{
		$empty_error="<center><br><br><br><font color=red>กรุณาเข้าสู่ระบบก่อนใช้งาน!</font>";
		echo $empty_error;
		echo "  <a href='index.php'>
		<br><br>
	<input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";
		exit();
	}

date_default_timezone_set('Asia/Bangkok');

$servername = "localhost";
$username = "3e";
$password = "123456";
$dbname = "project59";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");



//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


else{
				// $lname = $_POST['lname'];
				// echo $lname;
      $userid = $_POST["userid"];
			$idstudent= $_SESSION['id'];
			$day = $_POST["day"];
			$times = $_POST["times"];

			$subject = $_POST["subject"];
			$fname = $_POST['newfname'];
			$lname = $_POST['newlname'];
			$email = $_POST['newemail'];
			$phone = $_POST['newphone'];
			$address = $_POST['newaddress'];
			$city = $_POST['newcity'];
			$province = $_POST['newprovince'];
			$code = $_POST['newcode'];

			$courseid = $_POST['courseid'];
			$nametutor = $_POST['nametutor'];


      if($fname==''){
				$fname = $_POST['fname'];
			}
			if($lname==''){
				$lname = $_POST['lname'];
			}
			if($email==''){
				$email = $_POST['email'];
			}
			if($phone==''){
				$phone = $_POST['phone'];
			}
			if($address==''){
				$address = $_POST['address'];
			}
			if($city==''){
				$city = $_POST['city'];
			}
			if($province==''){
				$province = $_POST['province'];
			}
			if($code==''){
				$code = $_POST['code'];
			}
			// echo $courseid;
			if($address=="" || $city=="" || $province==""|| $code=="")
			{
			  $empty_error="<center><font color=red>กรุณากรอกข้อมูลที่อยู่ให้ครบ</font>";
			  echo $empty_error;
				// echo <a href=javascript:history.back(1)>ย้อนกลับ</a>
				// <a href="#" onclick='window.history.back()'>Back Page</a>

				echo "  <a href='regis_course.php?idgg=$courseid'>
			  <br><br>
				<input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";
			exit();
			}

			$date = date("Y-m-d");
			$time = date("H:i:s");

			$sql = "INSERT INTO 3e_regiscourse (regis_id,tutor_id,id,subject,nametutor, day,times,fname,lname,email,phone,address,city,province,code,courseid,date,time) VALUES
						('','$userid','$idstudent','$subject','$nametutor','$day','$times','$fname','$lname','$email',
						'$phone','$address','$city','$province','$code','$courseid','$date','$time')";





			if ($conn->query($sql) == TRUE) {
			  //  echo "New record created successfully";
				 echo "<center><br><br><br><font color=green> สมัครเรียบร้อยแล้ว</font>";
					echo "  <a href='courseStudent.php'>
					<br><br>
					<input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";


			 } else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
}



$conn->close();

?>
