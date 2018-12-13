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
        <title>Promotion | Easy Extra Education<</title>

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
        <link rel="stylesheet" href="assets/css/search.css">
        <link rel="shortcut icon" href="assets/ico/favicon.ico">

    </head>

    <body>

        <!-- Top menu -->
		<nav class="navbar" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle promotion</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
          <a class="navbar-brand" href="indexStudent.php">Easy Extra Education</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
        <div align="center" class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
            <li><a href="indexStudent.php"><span aria-hidden="true" class="icon_house"></span><br>หน้าหลัก</a></li>
						<li><a href="promotionStudent.php"><span aria-hidden="true" class="icon_gift"></span><br>โปรโมชั่น</a></li>
						<li class="active"><a href="courseStudent.php"><span aria-hidden="true" class="icon_profile"></span><br>คอร์ส</a></li>
            <li><a href="logout.php"><span aria-hidden="true" class="icon_tools"></span><br>ออกจากระะบบ</a></li>
					</ul>
				</div>
			</div>
		</nav>


        <!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 page-title wow fadeIn">
                        <span aria-hidden="true" class="icon_profile"></span>
                        <h1>Course </h1>

                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio -->
        <div class="portfolio-container">
	        <div class="container">
	            <div class="row">
	            	<div class="col-sm-12 portfolio-filters wow fadeInLeft">
	            		<a href="#" class="filter-all active">All</a> /
	            		<a href="#" class="filter-web-design">วิทยาศาสตร์</a> /
	            		<a href="#" class="filter-logo-design">คณิตศาสตร์</a> /
	            		<a href="#" class="filter-print-design">ภาษาอังกฤษ</a>
	            	</div>
	            </div>

							<div id="sidebar-collapse" class="col-sm-3 col-lg-12 sidebar">
            		<form action="confirmfindcourseStudent.php" method="post" enctype='multipart/form-data'>
            			<div class="form-group">
            				<input id="search" type="text" name="search"  class="form-control" placeholder="Search">
            			</div>
                  <input id="key" type="hidden" name="key" value="<?=$Det?>">
                  <button type="submit" class="btn" >search</button>
            		</form>
              </div>

              <!-- <form role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
              </form>
              <table data-toggle="table" data-search="true"> -->

              <!-- <div align="right"><input type="text" name="search" placeholder="Search.."></div>
              <br> -->



                <?php
                      require_once 'config.php';
                      $sql ="SELECT * FROM 3e_course ";
                      $result = mysql_query($sql);
                ?>
                <?php
                while ($fetch = mysql_fetch_assoc($result))
                {
                ?>
                <div class="col-sm-3 portfolio-masonry">
                  <div class="portfolio-box web-design">
                    <div class="portfolio-box-container">
                      <div class="thumbnail">
                          <?php if($fetch["image"]=="")
                          {
                            echo '<img style="width:400px; height:300px" src = "picture/promotion/cats.jpg" >';
                          }
                          else
                          {
                            echo '<img style="width:400px; height:300px" src = "picture/course/'.$fetch["image"].'" >' ;
                          }
                          ?>
                            <div class="caption">
                                <h3><?php echo $fetch['subject']?></h3>
                                <p>ชื่อสถาบัน: <?php echo $fetch['nametutor']?></p>
                                <!-- <h5>ชื่อสถาบัน: <?php echo $fetch['nametutor']?></h5> -->
                                <p>
																	<?PHP $GGG =$fetch['id'] ?>
                                    <a href="regis_course.php?idgg=<?=$GGG?>" class="btn btn-primary">สมัครเรียน</a>

                                      <a href="detailcourseStudent.php?idgg=<?=$GGG?>" class="btn btn-default">รายละเอียดเพิ่มเติม</a>
                                </p>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                  <?php
                }
                ?>

                </div>
	        </div>
        </div>







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
