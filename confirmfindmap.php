<!DOCTYPE html>
<?php

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
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/heroic-features.css" rel="stylesheet">

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
          <a class="navbar-brand" href="promotion.php">Easy Extra Education</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
        <div align="center" class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
            <li><a href="index.php"><span aria-hidden="true" class="icon_house"></span><br>หน้าหลัก</a></li>
						<li><a href="promotion.php"><span aria-hidden="true" class="icon_gift"></span><br>โปรโมชั่น</a></li>
						<li class="active"><a href="course.php"><span aria-hidden="true" class="icon_profile"></span><br>คอร์ส</a></li>
            <li><a href="login.html"><span aria-hidden="true" class="icon_tools"></span><br>เข้าสู่ระะบบ</a></li>
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


                <div id="sidebar-collapse" class="col-sm-3 col-lg-12 sidebar">
                  <form action="confirmfindcourse.php" method="post" enctype='multipart/form-data'>
                    <div class="form-group">
                      <input id="search" type="text" name="search"  class="form-control" placeholder="Search">
                    </div>
                    <input id="key" type="hidden" name="key" value="<?=$Det?>">
                    <button type="submit" class="btn" >search</button>
                  </form>
                </div>


             	<br>
             	<?php

                    require_once 'config.php';

                    $keyword = $_POST['search'] ;
                    $ids = $_POST['key'] ;
                    // $sql ="SELECT * FROM 3e_course ";
                    // $result = mysql_query($sql);
                    //
                    // if ($ids == 1)
                    // {
                    //     $key = 'level' ;
                    // }
                    // if ($ids == 2)
                    // {
                    //     $key = 'subject' ;
                    // }
                    // if ($ids == 3)
                    // {
                    //     $key = 'nametutor' ;
                    // }
                    // if ($ids == 4)
                    // {
                    //     $key = 'price' ;
                    // }
                    // if ($ids == 5)
                    // {
                    //     $key = 'day' ;
                    // }
                    // if ($ids == 6)
                    // {
                    //     $key = 'province' ;
                    // }

                    $sql ="SELECT * FROM 3e_course WHERE (type LIKE '%".$keyword."%') or (level LIKE '%".$keyword."%')
                    or (subject LIKE '%".$keyword."%') or (nametutor LIKE '%".$keyword."%') or (typestudy LIKE '%".$keyword."%')
                    or (typeteach LIKE '%".$keyword."%')  or (price LIKE '%".$keyword."%')  or (times LIKE '%".$keyword."%')
                    or (day LIKE '%".$keyword."%')  or (week LIKE '%".$keyword."%')  or (address LIKE '%".$keyword."%')
                    or (city LIKE '%".$keyword."%')  or (province LIKE '%".$keyword."%') " ;

                    $result = mysql_query($sql);
                    ?>


                    <?php
                        if(mysql_num_rows($result) < 1 )
                        {
                    ?>
                         <tr>
                           <br><br><br>
                            <th width="106" colspan="4"> <div align="center">ไม่พบข้อมูล<div></th>
                          </tr>

                        <?php
                        }
                        else
                        {

                  $fetch = mysql_fetch_assoc($result)

                    ?>
                      <!-- <div class="row text-center">
                        <div class="container">
                          <div class="col-sm-8 portfolio-masonry">
  	                        <div class="portfolio-box web-design">
  	                            <div class="thumbnail"> -->
                        <div class="col-sm-3 portfolio-masonry">
                          <div class="portfolio-box web-design">
                              <div class="portfolio-box-container">
                                <div class="thumbnail">
                                  <!-- width = "500" height = "300" -->
                                  <?php
                                    echo '<img style="width:400px; height:300px" src = "picture/promotion/cats.jpg" >';

                                  ?>
                                  <div class="caption">
                                  	<!-- <h3><?php echo $fetch['subject']?></h3> -->
                                    <h3>ผู้สอน/สถาบัน: <?php echo $fetch['nametutor']?></h3>
                                    <br>
  	                                <p>
                                      <?PHP $GGG =$fetch['checkid'] ?>
                                        <a href="gps.php?idgg=<?=$GGG?>" class="btn btn-primary">นำทาง</a>
                                        <!-- <a href="#" class="btn btn-default">รายละเอียดเพิ่มเติม</a> -->
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
              <br><br><br><br>




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
