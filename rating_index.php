<!DOCTYPE html>
<?php
$ebits = ini_get('error_reporting');
error_reporting($ebits ^ E_NOTICE);
	session_start();
  isset($_SESSION['id']) ? $name = $_SESSION['id'] : $name = '';
	isset($_SESSION['courseid']) ? $name = $_SESSION['courseid'] : $name = '';
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
  					<li class="navbar-brand" >Easy Extra Education</li>
  				</div>
  				<!-- Collect the nav links, forms, and other content for toggling -->
  				<div align="center" class="collapse navbar-collapse" id="top-navbar-1">
  					<ul class="nav navbar-nav navbar-right">

  					</ul>
  				</div>
  			</div>
  		</nav>

<?php $courseid = $_GET['idgn'] ; ?>
<?php $fname = $_GET['fname'] ; ?>


<html class="ng-scope" ng-app=""><head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">

        <style type="text/css">
            #dv1{
                width: 408px;
                border: 1px #ccc solid;
                padding: 5px;
                margin: auto;;
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




    <!-- </head> -->
    <body>


        <div class="main">
          <br><br><br>

            <div id="dv1">
                <lable>ให้คะแนนความพึงพอใจ</lable><br><br>
                <form action="rating.php" method="post" enctype="multipart/form-data">
                <fieldset id='demo1' class="rating">
                    <input class="stars" type="radio" id="star5" name="rating" value="5" />
                    <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                    <input class="stars" type="radio" id="star4" name="rating" value="4" />
                    <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                    <input class="stars" type="radio" id="star3" name="rating" value="3" />
                    <label class = "full" for="star3" title="Meh - 3 stars"></label>
                    <input class="stars" type="radio" id="star2" name="rating" value="2" />
                    <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                    <input class="stars" type="radio" id="star1" name="rating" value="1" />
                    <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                    <br><br>
                    &nbsp &nbsp &nbsp &nbsp<textarea class="starts" name="comment" placeholder="แสดงความคิดเห็น"  id="comment" rows="4" cols="50"></textarea>
										<input class="hiden" type="radio" id="star1" name="rating" value="1" />
										<input type="hidden" type="radio" id="courseid" name="courseid" value="<?=$courseid?>" />
                </fieldset>

                  <center><button type="submit" class="btn" >submit</button></center>
              </form>
            </div>
        </div>

    </body>
</html>
