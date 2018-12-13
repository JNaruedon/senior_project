<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
mysql_query("SET NAMES UTF8");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome | Easy Extra Education<</title>

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
						<li><a href="promotion.php"><span aria-hidden="true" class="icon_gift"></span><br>โปรโมชั่น</a></li>
						<li><a href="course.php"><span aria-hidden="true" class="icon_profile"></span><br>คอร์ส</a></li>
            <li><a href="login.html"><span aria-hidden="true" class="icon_tools"></span><br>เข้าสู่ระบบ</a></li>
					</ul>
				</div>
			</div>
		</nav>

        <!-- Slider -->
        <div class="slider-container">
            <div class="slider">
              <div class="container">
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <img src="assets/img/slider/1.jpg" >
                        </li>
                        <li>
                            <img src="assets/img/slider/2.jpg" >
                        </li>
                        <li>
                            <img src="assets/img/slider/3.jpg" >
                        </li>
                    </ul>
                </div>
              </div>
            </div>
        </div>

        <!-- Presentation -->
        <div class="presentation-container">
        	<div class="container">
        		<div class="row">
	        		<div class="col-sm-12 wow fadeInLeftBig">
	            		<h1>This is <span class="colored-text">3E</span>, Easy Extra Education</h1>
	            		<p>
	            			<!-- Download this theme <a href="http://azmind.com" target="_blank">from here</a> for free,
	            			use it and customize it as you like. -->
                    ค้นหาแหล่งเรียนพิเศษ
	            		</p>
	            	</div>
            	</div>
        	</div>
        </div>

        <!-- Services -->
        <div class="container">
        <div class="services-container">

	         <div class="row">
                   <div class="col-sm-3">
                       <div class="service wow fadeInUp">
                           <div class="service-icon"><span aria-hidden="true" class="icon_gift"></span></div>
                           <h3>All Promotions</h3>
                           <p>รวมโปรโมชั่นใหม่ ทัั้งหมดที่นี..</p>
                           <a class="big-link-1" href="promotion.php">เข้าชม</a>
                       </div>
                   </div>
					        <div class="col-sm-3">
		                <div class="service wow fadeInDown">
		                    <div class="service-icon"><span aria-hidden="true" class="icon_mobile"></span></div>
		                    <h3>Find Course</h3>
		                    <p>ค้นหาคอร์สเรียนต่างๆ ที่คุณสนใจ...</p>
		                    <a class="big-link-1" href="findcourse.php">ค้นหา</a>
		                </div>
	                </div>
	                <div class="col-sm-3">
		                <div class="service wow fadeInUp">
		                    <div class="service-icon"><span aria-hidden="true" class="icon_pencil"></span></div>
		                    <h3>Comparison</h3>
		                    <p>เปรียบเทียบข้อมูลระหว่างคอร์ส..</p>
		                    <a class="big-link-1" href="comparecourse.php">เปรียบเทียบ</a>
		                </div>
	                </div>
	                <!-- <div class="col-sm-3">
		                <div class="service wow fadeInDown">
		                    <div class="service-icon"><span aria-hidden="true" class="icon_printer-alt"></span></div>
		                    <h3>High Res Prints</h3>
		                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...</p>
		                    <a class="big-link-1" href="services.html">Read more</a>
		                </div>
	                </div> -->

                    <div class="service wow fadeInDown">
											<!-- icon_printer-alt -->
                        <div align="center" class="service-icon"><span aria-hidden="true" class="icon_heart"></span></div>
                        <h3>GPS</h3>
                        <p>ค้นหาสถานประกอบการที่ต้องการนำทาง</p>
                        <a class="big-link-1" href="findmaps.php">GPS</a>
                    </div>




	            </div>
	        </div>
        </div>

        <br><br><br>



        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/flexslider/jquery.flexslider-min.js"></script>
        <script src="assets/js/jflickrfeed.min.js"></script>
        <script src="assets/js/masonry.pkgd.min.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="assets/js/jquery.ui.map.min.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>
