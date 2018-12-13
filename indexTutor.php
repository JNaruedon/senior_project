<!DOCTYPE html>
<?php
$ebits = ini_get('error_reporting');
error_reporting($ebits ^ E_NOTICE);
	session_start();
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
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
date_default_timezone_set('Asia/Bangkok');
?>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome Tutor| Easy Extra Education<</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:700,400">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/elegant-font/code/style.css">
        <link rel="stylesheet" href="assets/css/animate.css">
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
					<a class="navbar-brand" href="indexTutor.php">Easy Extra Education</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="indexTutor.php"><span aria-hidden="true" class="icon_house"></span><br>หน้าหลัก</a></li>
						<li><a href="promotionTutor.php"><span aria-hidden="true" class="icon_gift"></span><br>โปรโมชั่น</a></li>
						<li><a href="courseTutor.php"><span aria-hidden="true" class="icon_profile"></span><br>คอร์ส</a></li>
						<!-- <li><a href="google-map-api.php"><span aria-hidden="true" class="icon_gift"></span><br>GPS</a></li> -->

            <li><a href="logout.php"><span aria-hidden="true" class="icon_tools"></span><br>ออกจากระบบ</a></li>
					</ul>
				</div>
			</div>
		</nav>

        <!-- Slider -->
        <div class="slider-container">
            <div class="slider">
              <div class=" container">
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <img src="assets/img/slider/1.jpg">
                            <!-- <div class="flex-caption">
                              Welcome to ExEasy Extra Education.

                            </div> -->
                        </li>
                        <li>
                            <img src="assets/img/slider/2.jpg">
                            <!-- <div class="flex-caption">
                            	Let's find the best tutor for get "A".
                            </div> -->
                        </li>
                        <li>
                            <img src="assets/img/slider/3.jpg">
                            <!-- <div class="flex-caption">

                            </div> -->
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
	            		<br><h1>This is <span class="colored-text">3E</span>, Easy Extra Education</h1>
	            		<p>
	            			<!-- Download this theme <a href="http://azmind.com" target="_blank">from here</a> for free,
	            			use it and customize it as you like. -->
                    ค้นหาแหล่งเรียนพิเศษ ได้ตรงใจคุณที่สุด
	            		</p>
	            	</div>
            	</div>
        	</div>
        </div>


				<?php
					$Det = $_GET['check'];
					require_once 'config.php';
					$sql ="SELECT * FROM 3e_course where 3e_course.id =$Det";
					$result = mysql_query($sql);
				?>




        <!-- Services -->
        <div class="container">
        <div class="services-container">

              <div class="row">
                <div class="col-sm-3">
                    <div class="service wow fadeInUp">
                        <div class="service-icon"><span aria-hidden="true" class="icon_gift"></span></div>
                        <h3>Add Promotion</h3>
                        <p>เพิ่มโปรโมชั่นใหม่...</p>
                        <a class="big-link-1" href="addpromotionTutor.php">Add Promotion</a>
                    </div>
          </div>
          			<div class="col-sm-3">
                    <div class="service wow fadeInDown">
                        <div class="service-icon"><span aria-hidden="true" class="icon_pencil"></span></div>
                        <h3>Add Course</h3>
                        <p>เพิ่มวิชาเรียน...</p>
                        <a class="big-link-1" href="addcourseTutor.php">Add Course</a>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="service wow fadeInUp">
                        <div class="service-icon"><span aria-hidden="true" class="icon_mobile"></span></div>
                        <h3>Checks</h3>
                        <p>ตรวจสอบผู้สมัครเรียน...</p>
                        <a class="big-link-1" href="alertTutor.php">Check</a>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="service wow fadeInDown">
											<!-- icon_printer-alt -->
                        <div class="service-icon"><span aria-hidden="true" class="icon_heart"></span></div>
                        <h3>Location</h3>
                        <p>จัดการที่อยู่สถานประกอบการของคุณ...</p>
                        <a class="big-link-1" href="google-map-api.php">Manage</a>
                    </div>
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
