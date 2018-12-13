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
			$sql ="SELECT * FROM 3e_course where 3e_course.id =$Det";
			$result = mysql_query($sql);
		?>

        <!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 page-title wow fadeIn">
                        <span aria-hidden="true" class="icon_table"></span>
                        <h1>รายละเอียด </h1>
                    </div>
                </div>

        <br><br>
        <?php $fetch = mysql_fetch_assoc($result) ;?>

        <div class="row">
    			<div class="col-md-8">
    				<div class="panel panel-default">
    					<div class="panel-heading"><h2>   <?php echo $fetch['subject']?>

              </div>
    					<div class="panel-body">
    						<form class="form-horizontal" action="" method="post">
                  <div align ="center">



    							<fieldset>

                    <div class="form-group">
    									<label class="col-md-3 control-label" >หมวดวิชา</label>
    									<div class="col-md-9">
                          <label><?php echo $fetch['type']?></label>
    									</div>
    								</div>


    								<div class="form-group">
    									<label class="col-md-3 control-label" >ช่วงระดับชั้น</label>
    									<div class="col-md-9">
                        <label><?php echo $fetch['level']?></label>
    									</div>
    								</div>

                    <div class="form-group">
                      <label class="col-md-3 control-label" ></label>
                      <div class="col-md-9">

                        <?php if($fetch["image"]=="")
                      {
                      ?>
                        <td> <?php echo '<img style="width:150px; height:180px" src = "picture/promotion/cats.jpg" >' ; ?></td>
                      <?php
                      }
                      else
                      {
                      ?>
                        <td> <?php echo '<img style="width:150px; height:180px" src = "picture/course/'.$fetch["image"].'" >' ; ?></td>

                      <?php
                      }
                      ?>
                      </div>
                    </div>

                    <div class="form-group">
    									<label class="col-md-3 control-label" >ชื่อผู้สอน</label>
    									<div class="col-md-9">
                        <label><?php echo $fetch['nametutor']?></label>
    									</div>
    								</div>

                    <div class="form-group">
    									<label class="col-md-3 control-label" >ลักษณะการเรียน</label>
    									<div class="col-md-9">
                        <label><?php echo $fetch['typestudy']?></label>
    									</div>
    								</div>

                    <div class="form-group">
    									<label class="col-md-3 control-label" >ลักษณะการสอน</label>
    									<div class="col-md-9">
                        <label><?php echo $fetch['typeteach']?></label>
    									</div>
    								</div>

                    <div class="form-group">
    									<label class="col-md-3 control-label" >ราคา</label>
    									<div class="col-md-9">
                        <label><?php echo $fetch['price'];?>   บาท</label>
    									</div>
    								</div>

                    <div class="form-group">
                      <label class="col-md-3 control-label" >เวลาที่สอน</label>
                      <div class="col-md-9">
                        <label><?php echo $fetch['times']?></label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-3 control-label" >วันที่สอน</label>
                      <div class="col-md-9">
                        <label><?php echo $fetch['day']?></label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-3 control-label" >จำนวนสัปดาห์ที่สอน</label>
                      <div class="col-md-9">
                        <label><?php echo $fetch['week']?></label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-3 control-label" >อำเภอ</label>
                      <div class="col-md-9">
                        <label><?php echo $fetch['city']?></label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-3 control-label" >จังหวัด</label>
                      <div class="col-md-9">
                        <label><?php echo $fetch['province']?></label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-3 control-label" >ดูวิดีโอตัวอย่างการสอน</label>
                      <div class="col-md-9">
                        <?php $vid = $fetch['video'] ; ?>
                        <label><a href="video.php?vid=video/course/<?=$vid?>"> click </a> </label>

                        <!-- if($address=="" || $city=="" || $lname=="" || $province==""|| $code=="")
                  			{
                  			  $empty_error="<center><font color=red>กรุณากรอกข้อมูลที่อยู่ให้ครบ</font>";
                  			  echo $empty_error;
                  				// echo <a href=javascript:history.back(1)>ย้อนกลับ</a>
                  				// <a href="#" onclick='window.history.back()'>Back Page</a>

                  				echo "  <a href='regis_course.php?idgg=$courseid'>
                  			  <br><br>
                  				<input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";
                  			exit();
                  			} -->
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-3 control-label" >บรรยายเกี่ยวกับวิชา</label>
                      <div class="col-md-9">
                        <textarea class="form-control" rows="5"><?php echo $fetch['info']?></textarea>

                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-3 control-label" >คะแนนความพึงพอใจ</label>
                      <div class="col-md-9">
                              <style type="text/css">
                                  #dv1{
                                      width: 408px;
                                      border: 0px #ccc solid;
                                      padding: 15px;
                                      margin: auto;
                                  }
                              </style>

                              <style>
                                  /****** Rating Starts *****/
                                  @import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
                                  fieldset, label { margin: 0; padding: 0; }
                                  body{ margin: 20px; }
                                  h1 { font-size: 1.5em; margin: 10px; }
                                  .rating {
                                      border: none;
                                      float: left;
                                  }
                                  .rating > input { display: none; }
                                  .rating > label:before {
                                      margin: 5px;
                                      font-size: 1.25em;
                                      font-family: FontAwesome;
                                      display: inline-block;
                                      content: "\f005";
                                  }
                                  .rating > .half:before {
                                      content: "\f089";
                                      position: absolute;
                                  }

                                  .rating > label {
                                      color: #ddd;
                                      float: right;
                                  }

                                  .rating > input:checked ~ label,
                                  .rating:not(:checked) > label:hover,
                                  .rating:not(:checked) > label:hover ~ label { color: #FFD700;  }

                                  .rating > input:checked + label:hover,
                                  .rating > input:checked ~ label:hover,
                                  .rating > label:hover ~ input:checked ~ label,
                                  .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }
                              </style>


                              <?php

                          			require_once 'config.php';
                          			$sqlstar ="SELECT AVG(3e_rating) where 3e_rating.courseid =$Det";
                          			$result = mysql_query($sqlstar);
                                echo $result;
                          		?>

                              <div class="main">
                                  <div id="dv1">
                                      <form action="rating.php" method="post" enctype="multipart/form-data">
                                      <fieldset id='demo1' class="rating">
                                          <input class="stars" type="hide" id="star5" name="rating" value="5" />
                                          <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                          <input class="stars" type="hide" id="star4" name="rating" value="4" />
                                          <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                          <input class="stars" type="hide" id="star3" name="rating" value="3" />
                                          <label class = "full" for="star3" title="Meh - 3 stars"></label>
                                          <input class="stars" type="hide" id="star2" name="rating" value="2" />
                                          <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                          <input class="stars" type="hide" id="star1" name="rating" value="1" />
                                          <!-- <input class="stars" type="radio" id="star1" name="rating" value="1" /> -->
                                          <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                      </fieldset>
                                      <!-- <button type="submit" class="btn" >submit</button> -->
                                    </form>
                                  </div>
                              </div>

                      </div>
                    </div>






    							</fieldset>

    						</form>
    					</div>
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
