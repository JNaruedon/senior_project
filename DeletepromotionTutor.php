<html>
<head>
</head>
<body>
<?php
require_once 'config.php';
$sql = "DELETE FROM 3e_promotion ";
$sql .="WHERE id = '".$_GET["CusID"]."' ";
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
<Meta http-equiv="refresh"content="0.01;URL=promotionTutor.php">
</body>
</html>
