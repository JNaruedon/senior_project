<?php
$conn=mysql_connect('localhost','3e','123456');
mysql_select_db('project59',$conn);
mysql_query('SET NAMES utf8');
if($_GET['mapsId']!=''){
$showMaps=mysql_fetch_array(mysql_query('SELECT * FROM 3e_gps WHERE id='.$_GET['mapsId']));
$name=$showMaps['nametutor'];
$lat=$showMaps['lat'];
$lng=$showMaps['lng'];
}else{
header('Location:google-map-api.php');
exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyBz-BP0D-4bHIHnuwzXFzPThdqFt1f-qWM&libraries=places&callback=initAutocomplete&sensor=true"></script>
<title>แสดงแผนที่</title>
<script type="text/javascript">
var name='<?=$name?>';
var lat='<?=$lat?>';
var lng='<?=$lng?>';

function myMaps(){
var mapsGoo=google.maps;
var Position=new mapsGoo.LatLng(lat,lng);
var myOptions = {
    center:Position,
    zoom:8,
    mapTypeId: mapsGoo.MapTypeId.ROADMAP //ชนิดของแผนที่
    };
var map = new mapsGoo.Map(document.getElementById("map_canvas"),myOptions);
var infowindow = new mapsGoo.InfoWindow();
var marker = new mapsGoo.Marker({//เรียกเมธอดMarker(หมุด)
    position: Position,
});
marker.setMap(map);
infowindow.setContent(name);
infowindow.open(map, marker);
}
$(document).ready(function(){
 myMaps();
});
</script>
<style type="text/css">
body{
font-size:12px;
color:#333;
}
</style>
</head>
<body>
<table width="750" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td bgcolor="#E1E1E1"><strong>ชื่อสถานที่ :</strong></td>
    <td bgcolor="#E1E1E1"><h1><?=$name?></h1></td>
  </tr>
  <tr>
    <td bgcolor="#E1E1E1"><strong>แสดงผลปกติ</strong></td>
    <td bgcolor="#E1E1E1"><div id="map_canvas" style="width:500px; height:400px"></div></td>
  </tr>
  <tr>
    <td bgcolor="#EEEEEE"><strong>แสดงผลแบบรูปภาพ</strong></td>
    <td bgcolor="#EEEEEE"><img src="http://maps.googleapis.com/maps/api/staticmap?center=<?=$lat?>,<?=$lng?>&zoom=<?=$zoom?>&size=500x400&maptype=roadmap&markers=<?=$lat?>,<?=$lng?>&sensor=false&language=th&region=th" /></td>
  </tr>
</table>
</body>
</html>
<?php mysql_close($conn);?>
