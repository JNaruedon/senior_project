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

    <br><br><br>

    <?php
          $type = $_POST["type"];
          echo "$type";

          $level = $_POST["level"];
          echo "$level";

          $typestudy = $_POST["typestudy"];
          echo "$typestudy";

          $typeteach = $_POST["typeteach"];
          echo "$typeteach";

          $name = $_POST["name"];
          echo "$name";

          $prices = $_POST["prices"];
          echo "$prices";

          $timee = $_POST["timee"];
          echo "$timee";

          $dayy = $_POST["dayy"];
          echo "$dayy";

          $timess = $_POST["timess"];
          echo "$timess";

          $city = $_POST["city"];
          echo "$city";

          $province = $_POST["province"];
          echo "$province";

          ?>
          <br>
        <?php
          require_once 'config.php';

          $sql ="SELECT * FROM 3e_course WHERE (type LIKE '%$type%') and (level LIKE '%$level%')
          and (nametutor LIKE '%$name%') and (typestudy LIKE '%$typestudy%')
          and (typeteach LIKE '%$typeteach%') and (price LIKE '%$prices%')
          and (times LIKE '%$timee%') and (day LIKE '%$dayy%')
          and (week LIKE '%$timess%') and (city LIKE '%$city%')
          and (province LIKE '%$province%') " ;

          $result = mysql_query($sql);

      ?>
      <?php
          if(mysql_num_rows($result) < 1 )
          {
      ?>
           <tr>
             <br><br><br>

              <th width="106" colspan="4"> <div align="center">ไม่พบครอสที่ท่านตามหา<div></th>
            </tr>

          <?php
          }
          else
          {
            while ($fetch = mysql_fetch_assoc($result))
            {
            ?>
                <div class="col-sm-3 portfolio-masonry">
                  <div class="portfolio-box web-design">
                      <div class="portfolio-box-container">
                        <div class="thumbnail">
                          <!-- width = "500" height = "300" -->
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
                            <p>ผู้สอน/สถาบัน: <?php echo $fetch['nametutor']?></p>
                            <br>
                            <p>
                              <?PHP $GGG =$fetch['id'] ?>
                                <a href="detailcourse.php?idgg=<?=$GGG?>" class="btn btn-primary">รายละเอียดเพิ่มเติม</a>
                                <!-- <a href="#" class="btn btn-default">รายละเอียดเพิ่มเติม</a> -->
                            </p>
                        </div>
                      </div>
                  </div>
              </div>
            </div>
              <?php
            }
          }
          ?>
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
