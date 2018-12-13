<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

 session_start();
 header ('Content-type: text/html; charset=utf-8');

 mysql_connect("localhost","3e","123456");  //ข้อมูลนี้ได้มาจากตอนติดตั้งเว็บเซิร์ฟเวอร์
 mysql_select_db("project59");

 $username = isset($_POST['username']) ? $_POST['username'] : '';
 $password = isset($_POST['password']) ? $_POST['password'] : '';
 $status= isset($_POST['status']) ? $_POST['status'] : '';


 $strSQL = "SELECT * FROM user_tbl WHERE username = '".mysql_real_escape_string($username)."'
 AND password = '".mysql_real_escape_string($password)."'";
 $qry = mysql_query($strSQL) or die('ไม่สามารถเชื่อมต่อฐานข้อมูลได้ Error : '. mysql_error());
 $row = mysql_fetch_assoc($qry);
 if(!$row)
 {
   $empty_error="<center><br><br><br><font color=red>ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง!</font>";
   echo $empty_error;
   echo "  <a href='login.html'>
   <br><br>
 <input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";
 exit();
 }
 else
 {
   //สร้าง SESSION เพื่อใช้ในหน้าอื่น ที่ต้องการตรวจสอบข้อมูลผู้ใช้ในขณะนั้น
   $_SESSION["id"]   = $row["id"];
   $_SESSION["status"]  = $row["status"];
   //$_SESSION["name"]  = $row["name"];


  //  if('status==0'){
  //    header("location:mainAdmin.php");//ย้ายไปยังหน้าหลัก
  //  }
  if($_SESSION['status'] == "0"){
     header("location:indextTutor.html");//ย้ายไปยังหน้าหลัก
   }
   session_write_close();//สิ้นสุดการทำงานของ SESSION ในหน้านี้

 }
 mysql_close();//ปิดการเชื่อมต่อฐานข้อมูล
?>
