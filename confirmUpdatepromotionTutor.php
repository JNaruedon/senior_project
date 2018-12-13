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
      $Det= $_GET['idupgn'];

			$savepath = "/home/project59/3e/public_html/picture/promotion";
			$info = pathinfo($_FILES['imgupload']['name']);
			$target = $savepath.DIRECTORY_SEPARATOR.$info['basename'];
			move_uploaded_file( $_FILES['imgupload']['tmp_name'], $target);

			$Name = $_POST['name_promotion'] ;
			$Price = $_POST['price_promotion'] ;
			$Info = $_POST['info_promotion'] ;
			$Image = $info['basename'] ;


			$sql = "UPDATE 3e_promotion SET name_promotion = '$Name', price_promotion = '$Price', info_promotion = '$Info',image_promotion = '$Image' WHERE 3e_promotion.id = $Det" ;

			//
			if ($conn->query($sql) === TRUE) {
			  //  echo "New record created successfully";
				 echo "<center><br><br><br><font color=green> Update Promotion Completed</font>";
					echo "  <a href='promotionTutor.php'>
					<br><br>
					<input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";


			 } else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
}


$conn->close();

?>
