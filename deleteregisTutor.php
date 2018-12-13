<html>
<head>
<title></title>
</head>
<body>
<?php
require_once 'config.php';
$Del = $_GET["idgg"] ;
$sqlDel = "DELETE FROM `3e_regiscourse` WHERE regis_id = $Del" ;
$resultDel = mysql_query($sqlDel) ;
if($resultDel)
{
	echo "Record Deleted.";
}
else
{
	echo "Error Delete [".$sqlDel."]";
}
mysql_close($result);
?>
<Meta http-equiv="refresh"content="0.01;URL=alertTutor.php">
</body>
</html>
