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
			<nav class="navbar" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
							<span class="sr-only"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<li class="navbar-brand">Easy Extra Education</li>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div align="center" class="collapse navbar-collapse" id="top-navbar-1">
						<ul class="nav navbar-nav navbar-right">

						</ul>
					</div>
				</div>
			</nav>

      <?php
        $newid = $_SESSION['id'] ;
  			require_once 'config.php';
        $sqls = "SELECT * FROM 3e_regiscourse WHERE 3e_regiscourse.id = $newid" ;
        $result = mysql_query($sqls);

				$sql = "SELECT * FROM 3e_user WHERE 3e_user.id = $newid" ;
        $resultuser = mysql_query($sql);

  		?>

      <div class="page-title-container">
          <div class="container">
              <div class="row">
                  <div class="col-sm-10 col-sm-offset-1 page-title wow fadeIn">
                      <span aria-hidden="true" class="icon_profile"></span>
                      <h1>วันและเวลาเรียนทั้งหมด</h1>
                  </div>
              </div>
          </div>

          <div class="col-md-8">
            <div class="panel panel-default">
              <div class="panel-heading"><h2></h2></div>
              <div class="panel-body">
                <form class="form-horizontal" action="" method="post">
                  <!-- <div align ="center"> -->
      <?php
			$fetch2 = mysql_fetch_assoc($resultuser);
			$fname =$fetch2['fname'];
			echo $fname ;

      while ($fetch = mysql_fetch_assoc($result))
      {
      ?>
                  <fieldset>
										<?php echo $userstudent ;?>
										<div class="form-group">
											<div class="col-md-3">

                      <label>ชื่อวิชา &nbsp</label><?php echo $fetch['subject']?> &nbsp&nbsp&nbsp
											<label>วัน &nbsp</label><?php echo $fetch['day']?> &nbsp&nbsp&nbsp
											<label>เวลา &nbsp</label> <?php echo $fetch['times']?> &nbsp&nbsp&nbsp
											<label>ผู้สอน &nbsp</label><?php echo $fetch['nametutor']?>
											<?PHP $GGG =$fetch['courseid'] ?>
											<?PHP $course_id =$fetch['courseid'] ?>
											<a href="JavaScript:{window.location='rating_index.php?idgn=<?=$GGG?> & $fname=<?=$fname?> ';}" class="btn btn-primary">Review</a>
											<a href="JavaScript:if(confirm('Confirm Delete?') == true){window.location='deleteregisStudent.php?idgg=<?=$GGG?>';}" class="btn btn-default">Delete</a>



                    </div>
									</div>

                  </fieldset>

      <?php
      }
      ?>




							</form>
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
