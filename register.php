<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$ebits = ini_get('error_reporting');
error_reporting($ebits ^ E_NOTICE);
//กำหนดตัวแปรเพื่อนำไปใช้งาน

$hostname = "localhost"; //ชื่อโฮสต์
$user = "3e"; //ชื่อผู้ใช้
$password = "123456"; //รหัสผ่าน
$dbname = "project59"; //ชื่อฐานข้อมูล
$tblname = "3e_user"; //ชื่อตาราง
$conn = new mysqli($hostname, $user, $password, $dbname);
mysqli_set_charset($conn,"utf8");


// เริ่มติดต่อฐานข้อมูล
$link = mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");


// เลือกฐานข้อมูล
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");
mysql_query("SET NAMES UTF8");
// คำสั่ง SQL และสั่งให้ทำงาน
//$sql=mysql_query("SELECT FROM users $tblname (username,fname,lname,password,email,status) WHERE username=$fusername,email=$femail");

// $username = $_POST['tutorname'];
$username = $_POST['username'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$password = $_POST['password'];
$conpassword = $_POST['conpassword'];
$email = $_POST['email'];
$phone = $_POST['phone'];


if($username=="" || $fname=="" || $lname=="" || $password==""|| $conpassword=="" || $email=="" || $phone =="" )
{
  $empty_error="<center><font color=red>กรุณากรอกข้อมูลให้ครบ</font>";
  echo $empty_error;
  echo "  <a href='login.html'>
  <br><br>
  <input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";
exit();
}

if($password != $conpassword){
  $empty_error="<center><font color=red>รหัสผ่านไม่ตรงกัน </font>";
  echo $empty_error;
  echo "  <a href='login.html'>
  <br><br>
<input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";
exit();
}

$sql1 =  "select * from 3e_user where username='$username'|| email='$email'";
$result = mysql_query($sql1,$link);
$num = mysql_num_rows($result);
if($num>0)
{
$was_used = "<center><font color=red>username หรือ
             email address นี้ได้ถูกใช้ไปแล้ว</font>";

echo $was_used;
echo "  <a href='login.html'>
<br><br>
<input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";
exit();
}

// if(check_email($email)==false)//ใช้งาน function ตรวจสอบอีเมล์
// {
// $email_error = "<center><font color=red>
//                 อีเมล์นี้ไม่มีอยู่จริง กรุณากรอกใหม่</font>";
// echo $email_error;
// echo "  <a href='index.html'>
// <br><br>
// <input type='button'value='Back'style='background:#3B59A8;
// border:1px solid #000;color:#ffffff;font-weight:bold;'/></a>
// </center>";
// exit();
// }


$sql = "INSERT INTO 3e_user (username,fname,lname,password,email,phone,status,address,city,province,code) values
('$_POST[username]', '$_POST[fname]', '$_POST[lname]', '$_POST[password]', '$_POST[email]', '$_POST[phone]', '1','','','','')"; // กำหนดคำสั่ง SQL เพื่อเพิ่มข้อมูลแบบคีย์ในคำสั่ง SQL
$dbquery = mysql_db_query($dbname, $sql);

$strSQL = "SELECT * FROM 3e_user WHERE username = '".mysql_real_escape_string($username)."'
and email = '".mysql_real_escape_string($email)."'";
$qry = mysql_query($strSQL) or die('ไม่สามารถเชื่อมต่อฐานข้อมูลได้ Error : '. mysql_error());
$row = mysql_fetch_assoc($qry);
mysqli_set_charset($strSQL,"utf8");
mysql_query("SET NAMES UTF8");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");




if(!$row)
{
    $was_false = "<center><font color=red>username หรือ
                 password ไม่ถูกต้อง</font>";

    echo $was_false;
    echo "  <a href='login.html'>
    <br><br>
    <input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";
    exit();
}

//function ตรวจสอบอีเมล์ จากเว็บ ninenik.com ขอบคุณครับ.
// function check_email($email){
// list($email_user,$email_host)=explode("@",$email);
// $host_ip=gethostbyname($email_host);
// if(eregi("*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$"
// , $email) && !ereg($host_ip,$email_host))
// {
// return true;
// }
// else
// {
// return false;
// }
// }


// ปิดการติดต่อฐานข้อมูล
mysql_close();
$was_complete= "<br><br><br><center><font color=blue> ลงทะเบียนผู้ใช้สำเร็จ กรุณาล็อคอินเข้าสู่ระบบใหม่อีกครั้ง</font>";
echo $was_complete;
// header("location:login.html");
echo "  <a href='login.html'>
<br><br>
<input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";
?>
