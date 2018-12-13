<html>
<head>
<title></title>
</head>
<body>
<?php
require_once 'config.php';
$Del = $_GET["CusID"] ;
$sql = "DELETE FROM 3e_course ";
$sql .="WHERE id = '".$_GET["CusID"]."' ";
$result = mysql_query($sql);
$sqlDel = "DELETE FROM `3e_regiscourse` WHERE courseid = $Del" ;
$resultDel = mysql_query($sqlDel) ;
$sqlDell = "DELETE FROM `3e_rating` WHERE courseid = $Del" ;
$resultDell = mysql_query($sqlDell) ;
if($result && $resultDel && $resultDell)
{
	echo "Record Deleted.";
}
else
{
	echo "Error Delete [".$sqlDel."]";
}
mysql_close($result);
?>
<Meta http-equiv="refresh"content="0.01;URL=courseTutor.php">
</body>
</html>
