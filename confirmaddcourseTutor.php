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

$servername = "localhost";
$username = "3e";
$password = "123456";
$dbname = "project59";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// if($_POST["subject"]=="" || $_POST["nametutor"]=="" || $_POST["price"]=="" || $_POST["times"]==""||
// 	$_POST["day"]==""|| $_POST["week"]==""|| $_POST["address"]==""|| $_POST["city"]=="")
// {
//
//   $empty_error="<center><font color=red>กรุณากรอกข้อมูลให้ครบ</font>";
//   echo $empty_error;
//   echo "  <a href='addcoursetutor.php'>
//   <br><br>
// <input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";
// exit();
// }

else{
	// print_r($_FILES['imgupload']);
	// echo "------------------------------";
	// print_r($info);
	$type = $_POST["type"];
	$level = $_POST["level"];
	$subject = $_POST["subject"];
	$nametutor = $_POST["nametutor"];
	$price = $_POST["price"];
	$typestudy = $_POST["typestudy"];
	$typeteach = $_POST["typeteach"];
	$day = $_POST["day"];
	$times= $_POST["times"];
	$week = $_POST["week"];
	$info = $_POST["info"];

	if($type=="" || $level=="" || $subject=="" || $nametutor==""|| $price=="" || $typestudy=="" || $typeteach ==""|| $day==""|| $times=="" || $week=="" )
	{

	  $empty_error="<center><font color=red>กรุณากรอกข้อมูลให้ครบ</font>";
	  echo $empty_error;
	  echo "  <a href='addcourseTutor.php'>
	  <br><br>
	  <input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";

	$conn->close();
	exit();

	}

	else{



			$savepath = "/home/project59/3e/public_html/picture/course";
			$info = pathinfo($_FILES['imgupload']['name']);
			$allowed =  array('gif','png' ,'jpg');
			$file_name2 = $_FILES['imgupload']['name'];
			$file_name_temp2 = explode(".", $file_name2);
	 	 	$extension2 = end($file_name_temp2);
			$file_type2= $_FILES['imgupload']['type'];
			// echo $file_type2;


			$savevideo = "/home/project59/3e/public_html/video/course";
			$infovideo = pathinfo($_FILES['videoupload']['name']);
			$allowed_extensions = array("webm", "mp4", "ogv");
			$file_name = $_FILES['videoupload']['name'];
	 $file_name_temp = explode(".", $file_name);
	 $extension = end($file_name_temp);
	//  echo "file:".$file_name;
	$file_type= $_FILES['videoupload']['type'];



	 if (!empty($file_name) & !empty($file_name2))
	 {
			 if (($file_type2 == "image/png") || ($file_type2 == "image/gif") || ($file_type2 == "image/jpg") || ($file_type2 == "image/jpeg"))
			 {

				if (($file_type == "video/webm") || ($file_type == "video/mp4") || ($file_type == "video/ogv"))
 			  {
 					 if ($_FILES['file']['error'] > 0)
 					 {
 							 echo "Unexpected error occured, please try again later.";
							 echo "  <a href='courseTutor.php'>
							 <br><br>
							 <input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";
 					 }
					  else {

							// 		 echo $file_name." already exists.";
							//  } else {
									//  move_uploaded_file($_FILES["file"]["tmp_name"], "secure/".$file_name);
									//  echo "Stored in: " . "secure/".$file_name;
									// echo "not save";
									$target = $savepath.DIRECTORY_SEPARATOR.$info['basename'];
									move_uploaded_file( $_FILES['imgupload']['tmp_name'], $target);

									$targetvideo = $savevideo.DIRECTORY_SEPARATOR.$infovideo['basename'];
									move_uploaded_file( $_FILES['videoupload']['tmp_name'], $targetvideo);
									$sql = "INSERT INTO 3e_course (id,type,level,subject,nametutor,typestudy,typeteach,price,times,day,week,address,city,province,info,image,video,checkid) VALUES
												('','".$_POST["type"]."','".$_POST["level"]."','".$_POST["subject"]."','".$_POST["nametutor"]."',
												'".$_POST["typestudy"]."','".$_POST["typeteach"]."','".$_POST["price"]."','".$_POST["times"]."','".$_POST["day"]."','".$_POST["week"]."','".$_POST["address"]."',
												'".$_POST["city"]."','".$_POST["province"]."','".$_POST["info"]."','".$info['basename']."','".$infovideo['basename']."','$newid')";

												if ($conn->query($sql) === TRUE) {
												  //  echo "New record created successfully";
													 echo "<center><br><br><br><font color=green> Add Course Completed</font>";
											 		echo "  <a href='courseTutor.php'>
											 		<br><br>
											 		<input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";


												 } else {
												    echo "Error: " . $sql . "<br>" . $conn->error;
												}
							 }

						 }


			 }
			 else {
				 echo "<center><br><br><br><font color=green> ประเภทไฟล์รูปภาพ/วิดีโอไม่ถูกต้อง</font>";
				echo "  <a href='addcourseTutor.php'>
				<br><br>
				<input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";

			 }
	 } else {
		 	echo "<center><br><br><br><font color=green> Please select a video to upload</font>";
			echo "  <a href='courseTutor.php'>
			<br><br>
			<input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";

	 }
			// $targetvideo = $savevideo.DIRECTORY_SEPARATOR.$infovideo['basename'];
			// move_uploaded_file( $_FILES['videoupload']['tmp_name'], $targetvideo);







}
}


$conn->close();

?>
