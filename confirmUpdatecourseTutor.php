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
      $Det = $_GET['idupgg'];

			$savepath = "/home/project59/3e/public_html/picture/course";
			$info = pathinfo($_FILES['imgupload']['name']);
			$target = $savepath.DIRECTORY_SEPARATOR.$info['basename'];
			move_uploaded_file( $_FILES['imgupload']['tmp_name'], $target);

			$savevideo = "/home/project59/3e/public_html/video/course";
			$infovideo = pathinfo($_FILES['videoupload']['name']);
			$targetvideo = $savevideo.DIRECTORY_SEPARATOR.$infovideo['basename'];
			move_uploaded_file( $_FILES['videoupload']['tmp_name'], $targetvideo);

			$Type = $_POST['newtype'] ;
			$Level = $_POST['newlevel'] ;
			$Subject = $_POST['newsubject'] ;
			$Tutor = $_POST['newtutorname'] ;
			$Stutype = $_POST['newtypestudy'] ;
			$typeteach = $_POST['newtypeteach'] ;
			$Price = $_POST['newprice'] ;
			$Times = $_POST['newtimes'] ;
			$Day = $_POST['newday'] ;
			$Week = $_POST['newweek'] ;
			$Info = $_POST['newinfo'] ;
			$Image = $info['basename'] ;
			$Video = $infovideo['basename'] ;

			// $sqll ="SELECT * FROM 3e_course where 3e_course.id =$Det";
			// $result = mysql_query($sqll);
			// $fetch = mysql_fetch_assoc($result) ;


			if($Type==''){
				$Type = $_POST['type'];
			}
			if($Level==''){
				$Level = $_POST['level'];
			}
			if($Stutype==''){
				$Stutype = $_POST['typestudy'];
			}
			if($typeteach==''){
				$typeteach = $_POST['typeteach'];
			}
			/////////////////////////////////////////////////////
			if($Subject==''){
				$Subject = $_POST['subject'];
			}
			if($Tutor==''){
				$Tutor = $_POST['tutorname'];
			}
			if($Price==''){
				$Price = $_POST['price'];
			}
			if($Times==''){
				$Times = $_POST['times'];
			}
			if($phone==''){
				$Day = $_POST['day'];
			}
			if($Week==''){
				$Week = $_POST['week'];
			}
			if($Info==''){
				$Info = $_POST['info'];
			}


			if($Image == "" & $Video == "")
			{
				$sql = "UPDATE 3e_course SET type = '$Type', level = '$Level', subject = '$Subject', nametutor = '$Tutor',
				typestudy = '$Stutype',times = '$Times', typeteach = '$typeteach',price = '$Price',day = '$Day',week = '$Week',
				info = '$Info' WHERE 3e_course.id = $Det" ;
			}
			if($Image=='' & $Video != "")
			{
				$sql = "UPDATE 3e_course SET type = '$Type', level = '$Level', subject = '$Subject', nametutor = '$Tutor',
				typestudy = '$Stutype', typeteach = '$typeteach',price = '$Price',day = '$Day',week = '$Week',
				info = '$Info',video = '$Video' WHERE 3e_course.id = $Det" ;
			}
			if($Video=='' & $Image != "")
			{
				$sql = "UPDATE 3e_course SET type = '$Type', level = '$Level', subject = '$Subject', nametutor = '$Tutor',
				typestudy = '$Stutype', typeteach = '$typeteach',price = '$Price',day = '$Day',week = '$Week',
				info = '$Info',image = '$Image' WHERE 3e_course.id = $Det" ;
			}




			//
			if ($conn->query($sql) === TRUE) {
			  //  echo "New record created successfully";
				 echo "<center><br><br><br><font color=green> Update course Completed</font>";
					echo "  <a href='courseTutor.php'>
					<br><br>
					<input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";


			 } else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
}


$conn->close();

?>
