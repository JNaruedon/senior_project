<!DOCTYPE html>
<?php
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
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
$newid =$_SESSION['id'];

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



							<?php

							$idcourse= $_GET['idgg'];
							 //echo $idcourse;
							// echo $newid;

							require_once 'config.php';
				      $sqlstudent ="SELECT * FROM 3e_user where id='$newid' ";
				      $student = mysql_query($sqlstudent);
				      $sql ="SELECT * FROM 3e_course where 3e_course.id =$idcourse";
				      $result = mysql_query($sql);

							$fetchstudent = mysql_fetch_assoc($student) ;
							$fetch = mysql_fetch_assoc($result) ;

							// echo $fetch['subject'];
							// echo $fetchstudent['fname'];
							// echo $fetchstudent['lname'];
							?>

							<div align="center">
							  <div class="contact-us-container">
							    <div class="container">
							        <div class="row">
							          <div class="col-sm-5">


																	<form action="confirmregiscourse.php" method="post" enctype='multipart/form-data'>
							                    <!-- <form role="form" method="post" action="confirmaddpromotiontutor.php" enctype='multipart/form-data'> -->


							                    	<div class="form-group">


							                       	<h2>ชื่อวิชา : <?php echo $fetch['subject'];?></h2>
																			<br>( หากมีการเปลี่ยนแปลงข้อมูล โปรดพิมพ์ข้อมูลใหม่ลงไป )
																		</div>

																		<div class="form-group">
							                       <label>ชื่อ</label>
						  	                     <input type="text" name="newfname" placeholder="<?php echo $fetchstudent['fname'];?>" class="contact-name form-control" id="fname">
																		</div>


																		<div class="form-group">
						                         <label>นามสกุล</label>
						                         <input type="text" name="newlname" placeholder="<?php echo $fetchstudent['lname'];?>" class="contact-message form-control" id="lname">
																		</div>

																		<div class="form-group">
						                         <label>อีเมลล์</label>
						                         <input type="text" name="newemail" placeholder="<?php echo $fetchstudent['email'];?>" class="contact-message form-control" id="email">
																		</div>

																		<div class="form-group">
						                         <label>เบอร์ที่ติดต่อได้</label>
						                         <input type="text" name="newphone" placeholder="<?php echo $fetchstudent['phone'];?>" class="contact-message form-control" id="phone">
																		</div>


																	 <br><label>ที่อยู่ที่ติดต่อได้ </label> ( ต้องระบุ )



																	<div class="form-group">
																		<label>ที่อยู่</label>
																	<input name="newaddress" type="text" id="address" placeholder="<?php echo $fetchstudent['address'];?>" class="contact-message form-control">
																	</div>

																	<div class="form-group">
																		<label>อำเภอ</label>
																	<input name="newcity" type="text" id="city" placeholder="<?php echo $fetchstudent['city'];?>" class="contact-message form-control">
																	</div>

																	<div class="form-group">
																		<label>จังหวัด</label>
																	<input name="newprovince" type="text" id="province" placeholder="<?php echo $fetchstudent['province'];?>" class="contact-message form-control">
																	</div>

																	<div class="form-group">
																		<label>รหัสไปรษณีย์</label>
																	<input name="newcode" type="text" id="code" placeholder="<?php echo $fetchstudent['code'];?>" class="contact-message form-control">
																	</div>


																			<button type="submit" class="btn" >สมัครเรียน</button>


																			<input type="hidden" id="check" name="check" value="1"/>
																			<input type="hidden" id="userid" name="userid" value="<?php echo $fetch['checkid'];?>"/>
																			<input type="hidden" id="nametutor" name="nametutor" value="<?php echo $fetch['nametutor'];?>"/>
																			<!-- <input type="hidden" id="hide" name="flag" value="1" /> -->
																			<input type="hidden" id="day" name="day" value="<?php echo $fetch['day'];?>"/>
																			<input type="hidden" id="times" name="times" value="<?php echo $fetch['times'];?>"/>
																			<input type="hidden" id="subject" name="subject" value="<?php echo $fetch['subject'];?>"/>
																			<input type="hidden" id="fname" name="fname" value="<?php echo $fetchstudent['fname'];?>"/>
																			<input type="hidden" id="lname" name="lname" value="<?php echo $fetchstudent['lname'];?>"/>
																			<input type="hidden" id="email" name="email" value="<?php echo $fetchstudent['email'];?>"/>
																			<input type="hidden" id="phone" name="phone" value="<?php echo $fetchstudent['phone'];?>"/>
																			<input type="hidden" id="address" name="address" value="<?php echo $fetchstudent['address'];?>"/>
																			<input type="hidden" id="city" name="city" value="<?php echo $fetchstudent['city'];?>"/>
																			<input type="hidden" id="province" name="province" value="<?php echo $fetchstudent['province'];?>"/>
																			<input type="hidden" id="code" name="code" value="<?php echo $fetchstudent['code'];?>"/>
																			<input type="hidden" id="courseid" name="courseid" value="<?php echo $idcourse;?>"/>


							                    </form>
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
