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

// if($_POST["name_promotion"]=="" || $_POST["price_promotion"]=="" || $_POST["info_promotion"]=="")
// {
//
//   $empty_error="<center><font color=red>กรุณากรอกข้อมูลให้ครบ</font>";
//   echo $empty_error;
//   echo "  <a href='addpromotiontutor.php'>
//   <br><br>
// <input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";
// exit();
// }

else{
	$id=$_POST["id"];
	$type= $_POST["type"];
	$level = $_POST["level"];
	$name_promotion = $_POST["name_promotion"];
	$price_promotion = $_POST["price_promotion"];
	$typestudy = $_POST["typestudy"];
	$typeteach = $_POST["typetech"];
	$info_promotion = $_POST["info_promotion"];

	if($type=="" ||$level==""|| $name_promotion=="" || $price_promotion=="" || $info_promotion==""|| $typestudy=="")
	{

		$empty_error="<center><font color=red>กรุณากรอกข้อมูลให้ครบ</font>";
		echo $empty_error;
		echo "  <a href='addpromotionTutor.php'>
		<br><br>
		<input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";
	exit();
	}

			$savepath = "/home/project59/3e/public_html/picture/promotion";
			$info = pathinfo($_FILES['imgupload']['name']);

			$target = $savepath.DIRECTORY_SEPARATOR.$info['basename'];
			move_uploaded_file( $_FILES['imgupload']['tmp_name'], $target);

			$sql = "INSERT INTO 3e_promotion (id,type,level,typeteach,typestudy,name_promotion,price_promotion,info_promotion,image_promotion,checkid) VALUES
						('".$_POST["id"]."', '$type', '$level', '$typeteach', '$typestudy', '".$_POST["name_promotion"]."','".$_POST["price_promotion"]."',
						'".$_POST["info_promotion"]."' ,'".$info['basename']."','$newid')";




			if ($conn->query($sql) === TRUE) {
			  //  echo "New record created successfully";
				 echo "<center><br><br><br><font color=green>Add promotion successfully</font>";
		 		echo "  <a href='promotionTutor.php'>
		 		<br><br>
		 		<input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";


			 } else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
}


$conn->close();

?>
