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
?>

<html>
<head>
</head>
<body>
<?php
require_once 'config.php';
$sql = "DELETE FROM 3e_gps ";
$sql .="WHERE checkid = '$newid' ";
$result = mysql_query($sql);
if($result)
{
	echo "Record Deleted.";
}
else
{
	echo "Error Delete [".$sql."]";
}
mysql_close($result);
?>
<Meta http-equiv="refresh"content="0.001;URL=google-map-api.php">
</body>
</html>
