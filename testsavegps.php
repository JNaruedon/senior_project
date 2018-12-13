<?php
$ebits = ini_get('error_reporting');
error_reporting($ebits ^ E_NOTICE);
	session_start();
	isset($_SESSION['id']) ? $id = $_SESSION['id'] : $id = '';
	isset($_SESSION['status']) ? $name = $_SESSION['status'] : $name = '';
	$newid = $_SESSION['id'];
	// if($_SESSION['status'] == "")
	// {
	// 	$empty_error="<center><br><br><br><font color=red>กรุณาเข้าสู่ระบบก่อนใช้งาน!</font>";
	// 	echo $empty_error;
	// 	echo "  <a href='index.php'>
	// 	<br><br>
	// <input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";
	// 	exit();
	// }

$conn=mysql_connect('localhost','3e','123456');
mysql_select_db('project59',$conn);
mysql_query('SET NAMES utf8');
if(isset($_POST['locat_name'])){
$locatName=$_POST['locat_name'];
$lat=$_POST['mapsLat'];
$lng=$_POST['mapsLng'];

// echo $locatName;
// echo $lat;
// echo $lng;
// //echo $locatName;
// echo "\n";

// $sql ="SELECT * FROM test_gps";
// $result = mysql_query($sql);
//
// if(mysql_num_rows($result) < 1 )
// {
  $sql="INSERT INTO test_gps(lat,lng,id) VALUES('$lat','$lng','')";
// }
// else
// {
//   echo "<center><br><br><br><font color=green>กรุณาลบที่อยู่เดิมก่อน</font>";
//   echo "  <a href='google-map-api.php'>";
  ?>
  <!-- <br>
  <a href="JavaScript:if(confirm('Confirm Delete?') == true){window.location='deletemap.php?idgg=<?=$newid?>';}" class="btn btn-default">ลบที่อยู่</a> -->
  <?php
// }
// echo $sql;

// if ($conn->query($sql) == TRUE) {
//   //  echo "New record created successfully";
//    echo "<center><br><br><br><font color=green> cennect ได้</font>";
//     // echo "  <a href='courseStudent.php'">
//
//
//  } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
mysql_query($sql);
}
?>
<table width="100%" border="0" cellpadding="3" cellspacing="0" style="border:1px solid #CCC;background-color:#E4E4E4;">
  <tr>
    <td align="center"><strong>ละติจูด</strong></td>
    <td align="center"><strong>ลองติจูด</strong></td>

  </tr>
  <?php

  $rsMapsGoo=mysql_query("SELECT * FROM test_gps");
  while($showMapsGoo=mysql_fetch_array($rsMapsGoo)){
  ?>
  <tr>
    <a href="testshowgps.php=<?=$showMapsGoo['id']?>" target="_blank"><?=$showMapsGoo['nametutor']?></a>
    <td align="center"><?=$showMapsGoo['lat']?></td>
    <td align="center"><?=$showMapsGoo['lng']?></td>

  </tr>
  <?php } mysql_close($conn);?>
