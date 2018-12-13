<?php
//require ('connect.php')
require_once('mpdf/mpdf.php');
ob_start();
?>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">

<style type="text/css">
<!--
@page rotated { size: Portrait; }
.style1 {
  font-family: "TH SarabunPSK";
  font-size: 12pt;
  font-weight: bold;
}
.style2 {
  font-family: "TH SarabunPSK";
  font-size: 16pt;
  font-weight: bold;
}
.style3 {
  font-family: "TH SarabunPSK";
  font-size: 16pt;

}
.style5 {cursor: hand; font-weight: normal; color: #000000;}
.style9 {font-family: Tahoma; font-size: 12px; }
.style11 {font-size: 12px}
.style13 {font-size: 9}
.style16 {font-size: 9; font-weight: bold; }
.style17 {font-size: 12px; font-weight: bold; }
-->
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
  <head>
  <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
  </head>
    <body>
      <div class=style1>

      <?php
        $Det= $_GET['idgg'];
        require_once 'config.php';
        $sql ="SELECT * FROM 3e_regiscourse WHERE 3e_regiscourse.regis_id = $Det" ;
        $result = mysql_query($sql);
      ?>

      <h1> รายละเอียดผู้สมัคร </h1>

      <br><br>

      <?php
      $fetch = mysql_fetch_assoc($result)
      ?>



      <p>ชื่อผู้สมัคร &nbsp; &nbsp; &nbsp; <?php echo $fetch['fname']?>  &nbsp; &nbsp;  <?php echo $fetch['lname']?></p>

      <p>วันเวลาที่สมัคร &nbsp; &nbsp; &nbsp; <?php echo $fetch['time']?> &nbsp; &nbsp; <?php echo $fetch['date']?></p>

      <p>อีเมลล์ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $fetch['email']?></p>

      <p>เบอร์โทร &nbsp; &nbsp; &nbsp; <?php echo $fetch['phone']?></p>

      <p>ที่อยู่ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $fetch['address']?></p>

      <p>อำเภอ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $fetch['city']?></p>

      <p>จังหวัด &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $fetch['province']?></p>

      <p>รหัสไปรษณีย์ &nbsp; <?php echo $fetch['code']?></p>

      <p>วิชาที่สมัคร &nbsp; &nbsp; <?php echo $fetch['subject']?></p>

      <p>ลงชื่อ.................................................ผู้สมัคร &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  ลงวันที่............../....................../..........</p>
      <p>ลงชื่อ.................................................ผู้อนุมัติ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  ลงชื่อ...........................................ผู้จ่าย</p><br>

  </div>

</body>




<?Php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th', 'A4', '0', 'THSaraban');
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output();
?>
ดาวโหลดรายงานในรูปแบบ PDF <a href="MyPDF/MyPDF.pdf">คลิกที่นี้</a>
