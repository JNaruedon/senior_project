<!DOCTYPE html>
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Type" content="text/css; charset=utf-8">
		<?php

		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		session_start();
		header ('Content-type: text/html; charset=utf-8');


		$ebits = ini_get('error_reporting');
		error_reporting($ebits ^ E_NOTICE);

		session_start();
		isset($_SESSION['id']) ? $id = $_SESSION['id'] : $id = '';
		isset($_SESSION['status']) ? $name = $_SESSION['status'] : $name = '';
		if($_SESSION['status'] == "")
		{
			$empty_error="<center><br><br><br><font color=red>กรุณาเข้าสู่ระบบก่อนใช้งาน!</font>";
			echo $empty_error;
			echo "  <a href='index.php'>
			<br><br>
		<input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";
			exit();
		}

	  $objConnect = mysql_connect("localhost","3e","123456") or die("Error Connect to Database");
	  $objCon = mysqli_connect("localhost","3e","123456","project59");
	  mysqli_set_charset($objCon,"utf8");

    $newid = $_SESSION['id'];

    ?>
<head>
<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Maps| Easy Extra Education</title>
<style type="text/css">
body{
 font-family:Tahoma, Geneva, sans-serif;
font-size:12px;
}
</style>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyBz-BP0D-4bHIHnuwzXFzPThdqFt1f-qWM&libraries=places&callback=initAutocomplete&sensor=true"></script>
<script type="text/javascript">
function myMaps() {
var mapsGoo=google.maps;
var Position=new mapsGoo.LatLng(13.110649, 100.923813);//ละติจูด,ลองติจูด เริ่มต้น Bangkok
var myOptions = {
    center:Position,//ตำแหน่งแสดงแผนที่เริ่มต้น
 scrollwheel: false,
    zoom:8,//ซูมเริ่มต้น คือ 8
    mapTypeId: mapsGoo.MapTypeId.ROADMAP //ชนิดของแผนที่
    };
var map = new mapsGoo.Map(document.getElementById("map_canvas"),myOptions);
//var infowindow = new mapsGoo.InfoWindow();
var marker = new mapsGoo.Marker({//เรียกเมธอดMarker(ปักหมุด)
    position: Position,
 draggable:true,
    // title:"คลิกแล้วเคลื่อนย้ายหมุดไปยังตำแหน่งที่ต้องการ"
 });
var Posi=marker.getPosition();//เลือกเมธอดแสดงตำแหน่งของตัวปักหมุด
myMaps_locat(Posi.lat(),Posi.lng());
marker.setMap(map);//แสดงตัวปักหมุดโลด!!
//ตรวจจับเหตุการณ์ต่างๆ ที่เกิดใน google maps
mapsGoo.event.addListener(marker, 'dragend', function(ev) {//ย้ายหมุด
 var location =ev.latLng;
 myMaps_locat(location.lat(),location.lng());
});
mapsGoo.event.addListener(marker, 'click', function(ev) {//คลิกที่หมุด
 var location =ev.latLng;
 myMaps_locat(location.lat(),location.lng());
});
mapsGoo.event.addListener(map,'zoom_changed',function(ev){//ซูมแผนที่
 zoomLevel = map.getZoom();//เรียกเมธอด getZoom จะได้ค่าZoomที่เป็นตัวเลข
 $('#mapsZoom').val(zoomLevel);//เอาค่า Zoom Level ไปแสดงที่ Tag HTML ที่มีแอตทริบิวต์ id ชื่อ mapsZoom
});
}
function myMaps_locat(lat,lng){
 $('#mapsLat').val(lat);//เอาค่าละติจูดไปแสดงที่ Tag HTML ที่มีแอตทริบิวต์ id ชื่อ mapsLat
 $('#mapsLng').val(lng);//เอาค่าลองติจูดไปแสดงที่ Tag HTML ที่มีแอตทริบิวต์ id ชื่อ mapsLng
}
$.fn.myMaps_submit=function(){
 $(this).bind('submit', function(event) {
  if($('#locat_name').val()==''){
   alert('ระบุชื่อสถานที่ด้วยนะจ๊ะ!!');
  }else{
 $.ajax({
        url: $(this).attr('action'),
        type: "POST",
        data: $(this).serialize(),
        dataType: "html",
        beforeSend: function(){
            $('#loadding').html('<img src="wait.gif" />');
        },
        success: function(data) {
            $('#show_locat').html(data);
   $('#loadding').html('');
        }
    });
 }
return false;
 });
};
$(document).ready(function(){
 myMaps();//แสดงแผนที่
 $('#maps_form').myMaps_submit();//ตรวจสอบการSubmit Form
});
</script>

<!-- CSS -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:700,400">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/elegant-font/code/style.css">
<link rel="stylesheet" href="assets/css/animate.css">
<link rel="stylesheet" href="assets/css/magnific-popup.css">
<!-- <link rel="stylesheet" href="assets/flexslider/flexslider.css"> -->
<link rel="stylesheet" href="assets/css/form-elements.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/media-queries.css">
<link rel="shortcut icon" href="assets/ico/favicon.ico">

</head>
<body>

  <nav class="navbar" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
          <span class="sr-only"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="indexTutor.php">Easy Extra Education</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="top-navbar-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="indexTutor.php"><span aria-hidden="true" class="icon_house"></span><br>หน้าหลัก</a></li>
          <li><a href="promotionTutor.php"><span aria-hidden="true" class="icon_gift"></span><br>โปรโมชั่น</a></li>
          <li><a href="courseTutor.php"><span aria-hidden="true" class="icon_profile"></span><br>คอร์ส</a></li>
          <!-- <li><a href="contact.html"><span aria-hidden="true" class="icon_mail"></span><br>Contact</a></li> -->
          <li><a href="logout.php"><span aria-hidden="true" class="icon_tools"></span><br>ออกจากระบบ</a></li>
        </ul>
      </div>
    </div>
  </nav>

<table width="800" border="0" align="center" cellpadding="0" cellspacing="5">
  <tr>
    <td> <div id="map_canvas" style="width:800px; height:450px"></div>

<form action="savemaps.php" method="post" id="maps_form">
<br><br><table width="400" border="0" align="center" cellpadding="3" cellspacing="0" style="border:1px dashed #999;background:#f9f5f5;">
  <br><tr>
    <td>ชื่อสถานประกอบการของคุณ</td>
    <td>
      <input type="text" name="locat_name" id="locat_name" />
    </td>
  </tr>
  <tr>
    <td> </td>
    <td>
      <input name="bt_savemaps" id="bt_savemaps" type="submit" value="บันทึกข้อมูล" /> <span id="loadding"></span>
      <input type="hidden" name="mapsLat" id="mapsLat" />
      <input type="hidden" name="mapsLng" id="mapsLng" />
      <input type="hidden" name="id" id="id" />
  </tr>
</table>
</form>


<div id="show_locat"></div>
</td>
  </tr>
</table>
  </body>
</html>
