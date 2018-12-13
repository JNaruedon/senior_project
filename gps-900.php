<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <?php
            echo "Welcome";
        ?>

            ตำแหน่งของฉัน:
        <div id="geo_data"></div>

        ตำแหน่งที่ต้องการไป:
        <?php
        require_once 'config.php';

        $sql ="SELECT * FROM 3e_gps where 3e_gps.id =3" ;
        $result = mysql_query($sql);
        $fetch = mysql_fetch_assoc($result) ;


          $id = $fetch['id'];
          $latgo = $fetch['lat'];
          $lng = $fetch['lng'];

        echo "lat: ";
        echo $latgo;
        echo "lng: ";
        echo $lng;

        ?>

	<?php
		if ($latgo != '' && $lng != '') {
	?>
		<input type="hidden" name="start" id="start" value="13.1209819,100.9169647">
		<input type="hidden" name="end" id="end" value="<?php echo "$latgo,$lng" ?>">
      		<div id="map" style="width: 100%; height: 480px;"></div>
		
	<?php 
		}
		else {
	?>
		ไม่พบข้อมูล โปรดลองใหม่
	<?php 
		}
	?>
  <script src="https://maps.google.com/maps/api/js?key=AIzaSyCcuNRys8Xh_ArB7_Ceqsf6d7Oe7hTv8Tg"></script>    
<script>

    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;

    var options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
    };

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 7,
            center: { lat: 13.7824754, lng: 100.5365475 }
        });
        directionsDisplay.setMap(map);
    }

    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
            origin: document.getElementById('start').value,
            destination: document.getElementById('end').value,
            travelMode: 'DRIVING'
        }, function (response, status) {
            if (status === 'OK') {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('ไม่สามารถค้นหาเส้นทางได้ โปรดลองใหม่ภายหลัง ' + status);
            }
        });
    }

    function success(pos) {
        var crd = pos.coords;
        if (document.getElementById('end').value == ',') {
            alert('ระบบไม่ได้กำหนดตำแหน่งพิกัด GPS ไว้');
            initMap();            
        }
        else {
            document.getElementById('start').value = crd.latitude + ',' + crd.longitude;
            window.open('http://maps.google.com/maps?saddr=' + document.getElementById('start').value + '&daddr=' + document.getElementById('end').value, '_self');
            //initMap();
            //calculateAndDisplayRoute(directionsService, directionsDisplay);
        }
    };

    function error(err) {
        alert('ระบบไม่สามารถขอตำแหน่ง GPS ปัจจุบันได้\r\nระบบจะใช้ตำแหน่งที่อยู่ของกรมแทน\r\n(' + err.code + '): ' + err.message);
        if (document.getElementById('end').value == ',') {
            alert('ระบบไม่ได้กำหนดตำแหน่งพิกัด GPS ไว้');
            initMap();            
        }
        else {
            document.getElementById('start').value = crd.latitude + ',' + crd.longitude;
            window.open('http://maps.google.com/maps?saddr=' + document.getElementById('start').value + '&daddr=' + document.getElementById('end').value, '_self');
            //initMap();
            //calculateAndDisplayRoute(directionsService, directionsDisplay);
        }
    };

    navigator.geolocation.getCurrentPosition(success, error, options);

</script>

	

    </body>
</html>
