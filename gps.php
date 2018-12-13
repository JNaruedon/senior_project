<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
   <title>Google Maps JavaScript API v3 Example: Directions Complex</title>
   <script type="text/javascript"
           src="http://maps.google.com/maps/api/js?sensor=false"></script>

   <!-- CSS -->
   <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
   <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:700,400">
   <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/elegant-font/code/style.css">

   <link rel="stylesheet" href="assets/css/magnific-popup.css">
   <link rel="stylesheet" href="assets/flexslider/flexslider.css">
   <link rel="stylesheet" href="assets/css/form-elements.css">
   <link rel="stylesheet" href="assets/css/style.css">
   <link rel="stylesheet" href="assets/css/media-queries.css">
   <link rel="shortcut icon" href="assets/ico/favicon.ico">
</head>
<!-- <body style="font-family: Arial; font-size: 13px; color: red;"> -->

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
          <a class="navbar-brand" href="index.php">Easy Extra Education</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div align="center" class="collapse navbar-collapse" id="top-navbar-1">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="index.php"><span aria-hidden="true" class="icon_house"></span><br>หน้าหลัก</a></li>
            <!-- <li><a href="promotion.php"><span aria-hidden="true" class="icon_gift"></span><br>โปรโมชั่น</a></li>
            <li><a href="course.php"><span aria-hidden="true" class="icon_profile"></span><br>คอร์ส</a></li> -->
            <!-- <li><a href="login.html"><span aria-hidden="true" class="icon_tools"></span><br>เข้าสู่ระบบ</a></li> -->
          </ul>
        </div>
      </div>
    </nav>


   <div id="map" style="width: 1340px; height: 500px;"></div>
   <!-- <div id="duration">Duration: </div> -->
   <div id="distance">Distance: </div>
   <?php
   require_once 'config.php';
   $nid = $_GET['idgg'] ;
   $sql ="SELECT * FROM 3e_gps where 3e_gps.id =$nid" ;
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

   <script type="text/javascript">

   var directionsService = new google.maps.DirectionsService();
   var directionsDisplay = new google.maps.DirectionsRenderer();

   var myOptions = {
     zoom:7,
     mapTypeId: google.maps.MapTypeId.ROADMAP
   }

   var map = new google.maps.Map(document.getElementById("map"), myOptions);
   directionsDisplay.setMap(map);

  //  lat = '<?php echo $latgo ;?>';
  //  varlng = '<?php echo $lng ;?>';
  //  var request = {
  //              origin: "33.661565,73.041330",
  //              destination: "latgo,lng",
  //              travelMode: google.maps.TravelMode.DRIVING
  //  };

   var request = {

       origin: '13.120827, 100.919942',
       destination: '13.110649, 100.923813',
       travelMode: google.maps.DirectionsTravelMode.DRIVING
   };

   directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {

         // Display the distance:
         document.getElementById('distance').innerHTML +=
            (response.routes[0].legs[0].distance.value)/1000 + " กิโลเมตร";

         // Display the duration:
        //  document.getElementById('duration').innerHTML +=
        //     response.routes[0].legs[0].duration.value + " seconds";

         directionsDisplay.setDirections(response);
      }
   });
   </script>
</body>
</html>
