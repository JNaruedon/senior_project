<?php
	$host = "localhost"; // ชื่ออ host หรือ ip ที่ใช้ 
    $userhost = "3e"; //ชื่อ user ที่ใช้ในการล็อกอิน 
    $passhost = "123456"; // password ที่ใช้ในการล็อกอิน 
    $database = "project59"; // ชื่อ Database
    $conn = mysql_connect($host,$userhost,$passhost); // เชื่อมต่อฐานข้อมูลผ่าน $conn
    mysql_query("SET NAMES UTF8") ;
    if(! $conn)
    {
    	die("Error MySQL") ;
    }
    mysql_select_db("project59" , $conn)
    	or die("Can't connect !!!") ;
?>