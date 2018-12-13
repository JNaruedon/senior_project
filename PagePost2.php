<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<?php
echo $_POST["txtName"]."<br>"; // txtName
echo $_POST["txtSiteName"]."<br>"; // txtSiteName
echo "<hr>";

foreach($_POST as $key => $val) // All Key & Value
{
	echo $key . " : " . $val . "<br>";
}
?>
</body>
</html>
