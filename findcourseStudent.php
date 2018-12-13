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



      <div class="presentation-container">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 wow fadeInLeftBig">
                <h1>This is <span class="colored-text">3E</span>, Easy Extra Education</h1>
                <p>
                  <!-- Download this theme <a href="http://azmind.com" target="_blank">from here</a> for free,
                  use it and customize it as you like. -->
                  ค้นหาแหล่งเรียนพิเศษ ได้ตรงใจคุณที่สุด
                </p>
              </div>
            </div>
        </div>
      </div>




			<form action="searchStudent.php" method="post" name="form1">
	    <!-- Services -->
	    <div class="container">
	      <div class="services-container">
	        <div class="row">

	              <div class="col-sm-4">
	                <div class="service wow fadeInUp">
	                    <!-- <div class="service-icon"><span aria-hidden="true" class="icon_pencil"></span></div> -->
	                    <h3>หมวดวิชา</h3>
	                    <p>เลือกหมวดวิชา...</p>
	                    <select name="type">
	                      <option value="">-</option>
	                      <option value="คณิตศาสตร์">หมวดคณิตศาสตร์</option>
	                      <option value="วิทยาศาสตร์">หมวดวิทยาศาสตร์</option>
	                      <option value="สังคม">หมวดสังคม</option>
	                      <option value="ภาษาไทย">หมวดภาษาไทย</option>
	                      <option value="อังกฤษ">หมวดภาษาอังกฤษ</option>
	                    </select>
	                </div>
	              </div>

	              <div class="col-sm-4">
	                <div class="service wow fadeInDown">
	                    <!-- <div class="service-icon"><span aria-hidden="true" class="icon_pencil"></span></div> -->
	                    <h3>ระดับชั้น</h3>
	                    <p>เลือกระดับชั้น...</p>
	                    <select name="level">
	                      <option value="">-</option>
	                      <option value="ประถมศึกษาตอนต้น">ประถมศึกษาตอนต้น</option>
	                      <option value="ประถมศึกษาตอนปลาย">ประถมศึกษาตอนปลาย</option>
	                      <option value="มัธยมศึกษาตอนต้น">มัธยมศึกษาตอนต้น</option>
	                      <option value="มัธยมศึกษาตอนปลาย">มัธยมศึกษาตอนปลาย</option>
	                      <option value="มหาวิทยาลัย">มหาวิทยาลัย</option>
	                    </select>
	                    <!-- <a class="big-link-1" href="search.php?idgg=2">ค้นหา</a> -->
	                </div>
	              </div>

	              <div class="col-sm-4">
	                <div class="service wow fadeInUp">
	                    <!-- <div class="service-icon"><span aria-hidden="true" class="icon_pencil"></span></div> -->
	                    <h3>ลักษณะการเรียน</h3>
	                    <p>เลือกลักษณะการเรียน...</p>
	                    <select name="typestudy">
	                      <option value="">-</option>
	                      <option value="แบบเดี่ยว">แบบเดี่ยว</option>
	                      <option value="แบบกลุ่ม">แบบกลุ่ม</option>
	                    </select>
	                    <!-- <a class="big-link-1" href="search.php?idgg=3">ค้นหา</a> -->
	                </div>
	              </div>

	        </div>
	      </div>
	    </div>

	  <br><br><br>

	    <div class="container">
	      <div class="services-container">
	        <div class="row">

	              <div class="col-sm-4">
	                <div class="service wow fadeInUp">
	                    <!-- <div class="service-icon"><span aria-hidden="true" class="icon_pencil"></span></div> -->
	                    <h3>ลักษณะการสอน</h3>
	                    <p>เลือกลักษณะการสอน...</p>
	                    <select name="typeteach">
	                      <option value="">-</option>
	                      <option value="สอนสด">สอนสด</option>
	                      <option value="วิดีโอ">วิดีโอ</option>
	                    </select>
	                    <!-- <a class="big-link-1" href="search.php?idgg=4">ค้นหา</a> -->
	                </div>
	              </div>

	              <div class="col-sm-4">
	                <div class="service wow fadeInUp">
	                  <!-- <div class="service-icon"><span aria-hidden="true" class="icon_pencil"></span></div> -->
	                    <h3>ชื่อผู้สอน</h3>
	                    <p>ใส่ชื่อผู้สอน...</p>
	                    <input id="name" type="text" name="name" placeholder="ชื่อผู้สอน...">
	                    <!-- <input id="key" type="hidden" name="key" value="<?=$Det?>"> -->
	                </div>
	              </div>

	              <div class="col-sm-4">
	                <div class="service wow fadeInUp">
	                  <!-- <div class="service-icon"><span aria-hidden="true" class="icon_pencil"></span></div> -->
	                    <h3>ราคา</h3>
	                    <p>ใส่ราคา...</p>
	                    <input id="prices" type="text" name="prices" placeholder="ราคา...">
	                    <!-- <input id="keyprice" type="hidden" name="keyprice" value="<?=$Det?>"> -->
	                </div>
	              </div>

	          </div>
	        </div>
	      </div>

	      <br><br><br>

	        <div class="container">
	          <div class="services-container">
	            <div class="row">

	                  <div class="col-sm-4">
	                    <div class="service wow fadeInUp">
	                      <!-- <div class="service-icon"><span aria-hidden="true" class="icon_pencil"></span></div> -->
	                        <h3>เวลาที่สอน</h3>
	                        <p>ใส่เวลาที่สอน...</p>
	                        <input id="timee" type="text" name="timee" placeholder="เวลาที่สอน...">
	                        <!-- <input id="keytime" type="hidden" name="keytime" value="<?=$Det?>"> -->
	                    </div>
	                  </div>

	                  <div class="col-sm-4">
	                    <div class="service wow fadeInUp">
	                      <!-- <div class="service-icon"><span aria-hidden="true" class="icon_pencil"></span></div> -->
	                        <h3>วันที่สอน</h3>
	                        <p>ใส่วันที่สอน...</p>
	                        <input id="dayy" type="text" name="dayy" placeholder="วันที่สอน...">
	                        <!-- <input id="keyday" type="hidden" name="keyday" value="<?=$Det?>"> -->
	                    </div>
	                  </div>

	                  <div class="col-sm-4">
	                    <div class="service wow fadeInUp">
	                      <!-- <div class="service-icon"><span aria-hidden="true" class="icon_pencil"></span></div> -->
	                        <h3>จำนวนสัปดาห์ที่สอน</h3>
	                        <p>ใส่จำนวนสัปดาห์ที่สอน...</p>
	                        <input id="timess" type="text" name="timess" placeholder="จำนวนสัปดาห์...">
	                        <!-- <input id="keytimes" type="hidden" name="keytimes" value="<?=$Det?>"> -->
	                    </div>
	                  </div>

									</div>
								</div>
							</div>

		<br>

						<div class="container">
						<div class="services-container">
						<div class="row">

										<div class="col-sm-4">
										  <div class="service wow fadeInUp">
										                        <!-- <div class="service-icon"><span aria-hidden="true" class="icon_pencil"></span></div> -->
										    <h3>อำเภอ</h3>
										    <p>ใส่อำเภอ...</p>
										    <input id="city" type="text" name="city" placeholder="อำเภอ...">
										                          <!-- <input id="key" type="hidden" name="key" value="<?=$Det?>"> -->
										  </div>
										</div>

										<div class="col-sm-4">
										  <div class="service wow fadeInUp">
										                        <!-- <div class="service-icon"><span aria-hidden="true" class="icon_pencil"></span></div> -->
										      <h3>จังหวัด</h3>
										      <p>ใส่จังหวัด...</p>
										      <input id="province" type="text" name="province" placeholder="จังหวัด...">
										                          <!-- <input id="key" type="hidden" name="key" value="<?=$Det?>"> -->
										  </div>
										</div>

					</div>
				</div>
			</div>

				<button type="submit" class="btn" >ค้นหา</button>
			</form>

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
