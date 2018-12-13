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
  $newid= $_SESSION['id'];
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome Tutor| Easy Extra Education<</title>

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
		<nav class="navbar" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="indexTutor.php">Easy Extra Education</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="indexTutor.php"><span aria-hidden="true" class="icon_house"></span><br>หน้าหลัก</a></li>
						<li><a href="promotionTutor.php"><span aria-hidden="true" class="icon_gift"></span><br>โปรโมชั่น</a></li>
						<li><a href="courseTutor.php"><span aria-hidden="true" class="icon_profile"></span><br>คอร์ส</a></li>
						<!-- <li><a href="contact.html"><span aria-hidden="true" class="icon_mail"></span><br>Contact</a></li> -->
            <li><a href="logout.php"><span aria-hidden="true" class="icon_tools"></span><br>ออกจากระบบ</a></li>
					</ul>
				</div>
			</div>
		</nav>



    <?php
			require_once 'config.php';
			$sql ="SELECT * FROM 3e_regiscourse WHERE 3e_regiscourse.tutor_id = $newid" ;
			$result = mysql_query($sql);
      $resultDel = mysql_query($sqlDel);
		?>
        <!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 page-title wow fadeIn">
                        <span aria-hidden="true" class="icon_table"></span>
                        <h1> ผู้สมัคร </h1>
                    </div>
                </div>

        <br><br>


        <div class="row">
    			<div class="col-md-8">
    				<div class="panel panel-default">
    					<div class="panel-heading"><h2> </h2>

              </div>
    					<div class="panel-body">
    						<form class="form-horizontal" action="" method="post">
                  <div align ="center">

        <?php
        while ($fetch = mysql_fetch_assoc($result))
        {
        ?>

	        <fieldset>
							<?PHP $GGG =$fetch['regis_id'] ?>
	        <div class="form-group">
	          <label class="col-md-3 control-label" >ชื่อผู้สมัครเรียน</label>
	          <div class="col-md-6">
	              <label><?php echo $fetch['fname']?> &nbsp &nbsp <?php echo $fetch['lname']?>
								&nbsp &nbsp &nbsp &nbsp<a href="detailregiscourseTutor.php?idgg=<?=$GGG?>" >รายละเอียด</a>
								&nbsp <label>วันที่ &nbsp<?php echo $fetch['date']?>&nbsp &nbsp เวลา &nbsp<?php echo $fetch['time']?></label>
								<a href="JavaScript:if(confirm('Confirm not allowed?') == true){window.location='deleteregisTutor.php?idgg=<?=$GGG?>';}" class="btn btn-default">not allowed</a>
	          </div>
	        </div>

	      </fieldset>
      <?php
      }
      ?>


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
