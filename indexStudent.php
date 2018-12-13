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
$id = $_SESSION['id'] ;
?>
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
  					<a class="navbar-brand" href="indexStudent.php">Easy Extra Education</a>
  				</div>
  				<!-- Collect the nav links, forms, and other content for toggling -->
  				<div align="center" class="collapse navbar-collapse" id="top-navbar-1">
  					<ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="indexStudent.php"><span aria-hidden="true" class="icon_house"></span><br>หน้าหลัก</a></li>
  						<li><a href="promotionStudent.php"><span aria-hidden="true" class="icon_gift"></span><br>โปรโมชั่น</a></li>
  						<li><a href="courseStudent.php"><span aria-hidden="true" class="icon_profile"></span><br>วิชาที่เปิดสอน</a></li>
							<!-- <li><a href="alertStudent.php"><span aria-hidden="true" class="icon_gift"></span><br>วัน/เวลาเรียน</a></li> -->
              <li><a href="logout.php"><span aria-hidden="true" class="icon_tools"></span><br>ออกจากระบบ</a></li>
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

<!-- code เช็คเวลาเรียน -->
<?php
require_once 'config.php';

$sql ="SELECT * FROM 3e_regiscourse WHERE 3e_regiscourse.id = $id" ;
$result = mysql_query($sql);
$fetch = mysql_fetch_assoc($result);
$cid = $fetch['courseid'];

$sqll ="SELECT * FROM 3e_course WHERE 3e_course.id = $cid" ;
$resultt = mysql_query($sqll);
while ($fetchh = mysql_fetch_assoc($resultt))
{
	$times = $fetchh['times'];

	$Hour = substr($times,0,2);
	$min = substr($times,3,2);

	$Hour = $Hour-1 ;

	$date = date("Y-m-d");
	$time = date("H");


	$datep = ("Y-m-d");
	$timep = "$Hour" ;

	echo $Hour;

	if($time == $timep)
	{

			echo"<body onload=\"window.alert('ใกล้ถึงเวลาเรียนครอสที่ท่านสมัครไว้แล้ว'); return false;\">";

	}
}
?>

        <!-- Services -->
        <div class="services-container">
	        <div class="container">
	            <div class="row">
	            	<!-- <div class="col-sm-3">
		                <div class="service wow fadeInUp">
		                    <div class="service-icon"><span aria-hidden="true" class="icon_gift"></span></div>
		                    <h3>All Promotions</h3>
		                    <p>รวมโปรโมชั่นใหม่ ทัั้งหมดที่นี..</p>
		                    <a class="big-link-1" href="promotionStudent.php">เข้าชม</a>
		                </div>
					</div> -->
					<div class="col-sm-3">
		                <div class="service wow fadeInDown">
		                    <div class="service-icon"><span aria-hidden="true" class="icon_profile"></span></div>
		                    <h3>Find Course</h3>
		                    <p>ค้นหาวิชาที่เปิดสอนทั้งหมด...</p>
		                    <a class="big-link-1" href="findcourseStudent.php">ค้นหา</a>
		                </div>
	                </div>
	                <div class="col-sm-3">
		                <div class="service wow fadeInUp">
		                    <div class="service-icon"><span aria-hidden="true" class="icon_pencil"></span></div>
		                    <h3>Comparison</h3>
		                    <p>เปรียบเทียบข้อมูลระหว่างคอร์ส..</p>
		                    <a class="big-link-1" href="comparecourseStudent.php">เปรียบเทียบ</a>
		                </div>
	                </div>

									<div class="col-sm-3">
		                <div class="service wow fadeInUp">
		                    <div class="service-icon"><span aria-hidden="true" class="icon_mobile"></span></div>
		                    <h3>Check</h3>
		                    <p>ตรวจสอบคอร์สที่สมัครไว้...</p>

												<a class="big-link-1" href="alertStudent.php" onClick="js_popup('alertStudent.php',783,600); return false;">ตรวจสอบ</a>
		                </div>
	                </div>
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

				<script language="javascript">
				function js_popup(theURL,width,height) { //v2.0
					leftpos = (screen.availWidth - width) / 2;
				    	toppos = (screen.availHeight - height) / 2;
				  	window.open(theURL, "viewdetails","width=" + width + ",height=" + height + ",left=" + leftpos + ",top=" + toppos);
				}
				</script>

				<!-- <a href="alertStudent.php" onClick="js_popup('alertStudent.php',783,600); return false;" title="Code PHP Popup">วัน และ เวลาเรียน</a> -->



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
