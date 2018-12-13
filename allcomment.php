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
              <a class="navbar-brand" href="index.php">Easy Extra Education</a>
    				</div>
    				<!-- Collect the nav links, forms, and other content for toggling -->
            <div align="center" class="collapse navbar-collapse" id="top-navbar-1">
    					<ul class="nav navbar-nav navbar-right">
                <li><a href="index.php"><span aria-hidden="true" class="icon_house"></span><br>หน้าหลัก</a></li>
    						<li><a href="promotion.php"><span aria-hidden="true" class="icon_gift"></span><br>โปรโมชั่น</a></li>
    						<li class="active"><a href="course.php"><span aria-hidden="true" class="icon_profile"></span><br>คอร์ส</a></li>
                <li><a href="login.html"><span aria-hidden="true" class="icon_tools"></span><br>เข้าสู่ระบบ</a></li>
    					</ul>
    				</div>
    			</div>
    		</nav>

		<?php
			$Det= $_GET['idgg'];
			require_once 'config.php';
			$sql ="SELECT * FROM 3e_rating where 3e_rating.courseid =$Det";
			$result = mysql_query($sql);

      $subject = $_GET['subject'];
		?>

    <!-- Page Title -->
    <div class="page-title-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 page-title wow fadeIn">
                    <span aria-hidden="true" class="icon_table"></span>
                    <h1>Comment</h1>
                </div>
            </div>


          <div class="col-md-8">
            <div class="panel panel-default">
              <div class="panel-heading"><h2>  Course:  &nbsp<?php echo $subject?></h2></div>

                <div class="panel-body">
                  <form class="form-horizontal" action="" method="post">
                    <div align ="center">


    <br><br>
    <div class="form-group">
        <!-- <div class="col-md-6"></div> -->
      <!-- <div class="col-md-9"> -->
          <h4><label class="col-md-4 " > ชื่อ</label></h4>
          <h4><label class="col-md-8 "> ความคิดเห็น</label></h4>
      <!-- </div> -->
    </div>
    <br>
    <?php
    while ($fetch = mysql_fetch_assoc($result))
    {
    ?>
              <?php if($fetch['comment'] != "")
              {
                ?>
                <fieldset>

                        <label class="col-md-4 " ><?php echo $fetch['name']?></label>
                        <label class="col-md-8 "><?php echo $fetch['comment']?></label>
                  <br><br>


                </fieldset>
                <?php
              }
              ?>


      <?php
      }
      ?>
      </div>
      </div>
      </div>
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
