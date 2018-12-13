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
		$newid =$_SESSION['id'];
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
          <a class="navbar-brand" href="indexTutor.php">Easy Extra Education</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="indexTutor.php"><span aria-hidden="true" class="icon_house"></span><br>หน้าหลัก</a></li>
						<li><a href="promotionTutor.php"><span aria-hidden="true" class="icon_gift"></span><br>โปรโมชั่น</a></li>
						<li class="active"><a href="courseTutor.php"><span aria-hidden="true" class="icon_profile"></span><br>คอร์ส</a></li>
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
                        <span aria-hidden="true" class="icon_profile"></span>
                        <h1>Course </h1>

                    </div>
                </div>
            </div>
        </div>

				<?php
				$idcourse= $_GET['idupgg'];
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
<br>
(โปรดพิมพ์ข้อมูลใหม่ลงในช่องที่ต้องการแก้ไข )


        <div align="center">
					<div class="contact-us-container">
	        	<div class="container">
		            <div class="row">
									<div class="col-sm-7">
		                <div class="col-sm-7">
										<!-- enctype='multipart/form-data' -->
												<form action="confirmUpdatecourseTutor.php?idupgg=<?=$idcourse?>" method="post" enctype='multipart/form-data'>
		                    <!-- <form role="form" method="post" action="confirmaddpromotiontutor.php" enctype='multipart/form-data'> -->

													<div class="form-group">
														<label >หมวดวิชา</label>
														<select id="newtype" name="newtype" class="contact-name form-control">
											        <option value="">โปรดเลือกหมวดวิชา</option>
											        <option value="หมวดคณิตศาสตร์">หมวดคณิตศาสตร์</option>
											        <option value="หมวดวิทยาศาสตร์">หมวดวิทยาศาสตร์</option>
											        <option value="หมวดภาษาอังกฤษ">หมวดภาษาอังกฤษ</option>
															<option value="หมวดภาษาไทย">หมวดภาษาไทย</option>
											        <option value="หมวดสังคม">หมวดสังคม</option>
											        <option value="หมวดวิชาอื่นๆ">หมวดวิชาอื่นๆ</option>
											      </select>
													</div>
													<div class="form-group">
														<label>ระดับชั้น</label>
														<select id="newlevel" name="newlevel" class="contact-name form-control">
											        <option value="">โปรดเลือกระดับชั้น</option>
											        <option value="มหาวิทยาลัย">มหาวิทยาลัย</option>
											        <option value="มัธยมศึกษาตอนปลาย">มัธยมศึกษาตอนปลาย</option>
											        <option value="มัธยมศึกษาตอนต้น">มัธยมศึกษาตอนต้น</option>
															<option value="ประถมศึกษาตอนปลาย">ประถมศึกษาตอนปลาย</option>
											        <option value="ประถมศึกษาตอนต้น">ประถมศึกษาตอนต้น</option>
											        <option value="อื่นๆ">อื่นๆ</option>
											      </select>
													</div>
													<div class="form-group">
														<label >ชื่อวิชา</label>
														<input type="text" name="newsubject" placeholder="<?php echo $fetch ['subject'];?>" class="contact-name form-control" id="newsubject">
													</div>
		                    	<div class="form-group">
		                    		<label >ชื่อผู้สอน</label>
		                        	<input type="text" name="newtutorname" placeholder="<?php echo $fetch ['nametutor'];?>" class="contact-name form-control" id="newtutorname">
		                        </div>

	                          <div class="form-group">
	  	                    		<label >ราคา</label>
	  	                        	<input type="text" name="newprice" placeholder="<?php echo $fetch ['price'];?>" class="contact-name form-control" id="newprice">
	  	                      </div>

														<div class="form-group">
															<label>ลักษณะการเรียน</label>
															<select id="newtypestudy" name="newtypestudy" class="contact-name form-control">
												        <option value="">โปรดเลือกลักษณะการเรียน</option>
												        <option value="แบบกลุ่ม">แบบกลุ่ม</option>
												        <option value="แบบเดี่ยว">แบบเดี่ยว</option>
												        <option value="อื่นๆ">อื่นๆ</option>
												      </select>
														</div>

														<div class="form-group">
															<label>ลักษณะการสอน</label>
															<select id="newtypeteach" name="newtypeteach" class="contact-name form-control">
												        <option value="">โปรดเลือกลักษณะการสอน</option>
												        <option value="สอนสด">สอนสด</option>
												        <option value="วิดีโอ">วิดีโอ</option>
												        <option value="อื่นๆ">อื่นๆ</option>
												      </select>
														</div>

														<div class="form-group">
															<label>วันที่สอน</label>
																<input type="text" name="newday" placeholder="<?php echo $fetch ['day'];?>์" class="contact-name form-control" id="newday">
														</div>

														<div class="form-group">
															<label>เวลาที่สอน</label>
																<input type="text" name="newtimes" placeholder="<?php echo $fetch ['times'];?>" class="contact-name form-control" id="newtimes">
														</div>

														<div class="form-group">
															<label>เวลาที่สอน</label>
																<input type="text" name="newweek" placeholder="<?php echo $fetch ['week'];?>" class="contact-name form-control" id="newweek">
														</div>


		                    	  <div class="form-group">
	                            <label>รายละเอียดเพิ่มเติม</label>
	                            <textarea name="newinfo" placeholder="<?php echo $fetch ['info'];?>" class="contact-message form-control" id="newinfo"></textarea>
	                          </div>

													<div class="form-group">
														<label >Image upload</label>
	 								          <input type="file" id="imgupload" name="imgupload" onchange="readURL(this,'prphoto')">
														<img id="prphoto"/>
		                     	</div>

													<div class="form-group">
														<label>Video upload</label>
														<input type="file" id="videoupload" name="videoupload">
													</div>


													<input type="hidden" id="type" name="type" value="<?php echo $fetch['type'];?>"/>
													<input type="hidden" id="level" name="level" value="<?php echo $fetch['level'];?>"/>
													<input type="hidden" id="typestudy" name="typestudy" value="<?php echo $fetch['typestudy'];?>"/>
													<input type="hidden" id="typeteach" name="typeteach" value="<?php echo $fetch['typeteach'];?>"/>
													<!-- <input type="hidden" id="hide" name="flag" value="1" /> -->
													<input type="hidden" id="subject" name="subject" value="<?php echo $fetch['subject'];?>"/>
													<input type="hidden" id="tutorname" name="tutorname" value="<?php echo $fetch['nametutor'];?>"/>
													<input type="hidden" id="price" name="price" value="<?php echo $fetch['price'];?>"/>
													<input type="hidden" id="times" name="times" value="<?php echo $fetch['times'];?>"/>
													<input type="hidden" id="day" name="day" value="<?php echo $fetch['day'];?>"/>
													<input type="hidden" id="week" name="week" value="<?php echo $fetch['week'];?>"/>
													<input type="hidden" id="info" name="info" value="<?php echo $fetch['info'];?>"/>


		                        <button type="submit" class="btn" >Edit Course</button>

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
