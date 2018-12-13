<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Type" content="text/css; charset=utf-8">
		<?php

		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		session_start();
		header ('Content-type: text/html; charset=utf-8');


		$ebits = ini_get('error_reporting');
		error_reporting($ebits ^ E_NOTICE);

		session_start();
		isset($_SESSION['id']) ? $id = $_SESSION['id'] : $id = '';
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

	  $objConnect = mysql_connect("localhost","3e","123456") or die("Error Connect to Database");
	  $objCon = mysqli_connect("localhost","3e","123456","project59");
	  mysqli_set_charset($objCon,"utf8");
  	?>



<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Promotion | Easy Extra Education</title>

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
          <a class="navbar-brand" href="promotion.html">Easy Extra Education</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="indexTutor.php"><span aria-hidden="true" class="icon_house"></span><br>หน้าหลัก</a></li>
						<li class="active"><a href="promotionTutor.php"><span aria-hidden="true" class="icon_gift"></span><br>โปรโมชั่น</a></li>
						<li><a href="courseTutor.php"><span aria-hidden="true" class="icon_profile"></span><br>คอร์ส</a></li>
						<!-- <li><a href="contact.html"><span aria-hidden="true" class="icon_mail"></span><br>Contact</a></li> -->
            <li><a href="logout.php"><span aria-hidden="true" class="icon_tools"></span><br>ออกจากระบบ</a></li>
					</ul>
				</div>
			</div>
		</nav>

    </html>

<html>

        <!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 page-title wow fadeIn">
                        <span aria-hidden="true" class="icon_gift"></span>
                        <h1>Promotion </h1>

                    </div>
                </div>
            </div>
        </div>

        <?php $Det= $_GET['idupgn']; ?>
        <div align="center">
					<div class="contact-us-container">
	        	<div class="container">
		            <div class="row">
									<div class="col-sm-7">
		                <div class="col-sm-7">
										<!-- enctype='multipart/form-data' -->
												<form action="confirmUpdatepromotionTutor.php?idupgn=<?=$Det?>" method="post" enctype='multipart/form-data'>
		                    <!-- <form role="form" method="post" action="confirmaddpromotiontutor.php" enctype='multipart/form-data'> -->
		                    	<div class="form-group">
		                    		<label for="name">ชื่อโปรโมชั่น</label>
		                        	<input type="text" name="name_promotion" placeholder="ใส่ชื่อโปรโมชั่น" class="contact-name form-control" id="name_promotion">
		                        </div>

	                          <div class="form-group">
	  	                    		<label for="price">ราคาโปรโมชั่น</label>
	  	                        	<input type="text" name="price_promotion" placeholder="ราคาโปรโมชั่น" class="contact-name form-control" id="price_promotion">
	  	                        </div>

		                    	<div class="form-group">
	                          <label for="info">รายละเอียด</label>
	                          <textarea name="info_promotion" placeholder="รายละเอียดโปรโมชั่น" class="contact-message form-control" id="info_promotion"></textarea>
	                        </div>

													<div class="form-group">
													 <!-- <label for="image_promotion">Image :</label><input type="file" name="image_promotion"> -->
													 <!-- <img id="prphoto" /> -->
													 <!-- <form method="post" enctype='multipart/form-data'> -->
	 								            Image Upload <input type="file" id="imgupload" name="imgupload" onchange="readURL(this,'prphoto')">
															<br>
															<img id="prphoto"/>

		                     	</div>
														<!-- <input type="submit" name="frmsubmit" value="Upload"> -->
		                        <button type="submit" class="btn" >Edit Promotion</button>

		                    </form>
		                </div>

		            </div>
		        </div>
        </div>
			</div>

			<script>
		      function readURL(input, pic) {
		          var im = document.getElementById(pic);
		          if (input.files && input.files[0]) {
		              var reader = new FileReader();
		              reader.onload = function (e) {
		                  im.height = 120;
		                  im.src = e.target.result;
		              };
		              reader.readAsDataURL(input.files[0]);
		          }
		          else {
		              im.width = '';
		              im.height = '';
		              im.src = '';
		          }
		      }


		  	</script>

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
