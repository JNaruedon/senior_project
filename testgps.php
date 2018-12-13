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
<!-- <link rel="shortcut icon" href="assets/ico/favicon.ico"> -->

</head>
<body>

<br><br><br>

<table width="800" border="0" align="center" cellpadding="0" cellspacing="5">
  <tr>
    <td> <div id="map_canvas" style="width:800px; height:450px"></div>

<form action="testsavegps.php" method="post" id="maps_form">
<br><br><table width="400" border="0" align="center" cellpadding="3" cellspacing="0" style="border:1px dashed #999;background:#f9f5f5;">
  <br><tr>
    <td>บันทึกสถานที่ปัจจุบัน</td>
    <!-- <td>
      <input type="text" name="locat_name" id="locat_name" />
    </td> -->
  </tr>
  <tr>

    <td>
      <input name="bt_savemaps" id="bt_savemaps" type="submit" value="บันทึกข้อมูล" /></span>
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
