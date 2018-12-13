<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

ob_start();
session_start();

$app_id	= 'xxxxxxxxxxxxxxxxxxxxx';
$app_secret = 'xxxxxxxxxxxxxxxxxx';
$required_scope = 'public_profile, publish_actions, email'; //Permissions required
$redirect_url = 'http://localhost/www/example/facebook/login_v4/'; //FB redirects กลับเมื่อ login ผ่านแล้ว

$mysql_host			= 'localhost';
$mysql_username		= 'root';
$mysql_password		= '';
$mysql_db_name		= 'test';

require_once"facebook-php-sdk-v4-4.0-dev/autoload.php";

//เรียกใช้ class
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRedirectLoginHelper;

FacebookSession::setDefaultApplication($app_id , $app_secret);
$helper = new FacebookRedirectLoginHelper($redirect_url);

try {
  $session = $helper->getSessionFromRedirect();
} catch(FacebookRequestException $ex) {
	die(" Error1 : " . $ex->getMessage());
} catch(\Exception $ex) {
	die(" Error2 : " . $ex->getMessage());
}


//สร้างปุ่ม log out
if(isset($_GET["log-out"]) && $_GET["log-out"]==1){
	unset($_SESSION["fb_userDetails"]);
	//session ver is set, redirect user
	header("location: ". $redirect_url);
}

//ทำการเช็คค่าที่ได้จาก facebook
if (isset($session)) {
        //ทำการเชื่อมต่อแล้วอ่านค่าจาก facebook graph
	$user_profile = (new FacebookRequest($session, 'GET', '/me'))->execute()->getGraphObject(GraphUser::className());
        //ทำการเก็บค่าลง session เพื่อเรียกใช้งานต่อไป
	$_SESSION["fb_userDetails"] = $user_profile->asArray();
	/*echo'<pre>';
	print_r($user_profile);
	echo'</pre>';*/

        //insert sql
        $user_id = ( isset( $_SESSION["fb_userDetails"]["id"] ) )? $_SESSION["fb_userDetails"]["id"] : "";
	$user_name = ( isset( $_SESSION["fb_userDetails"]["name"] ) )? $_SESSION["fb_userDetails"]["name"] : "";
	$user_email = ( isset( $_SESSION["fb_userDetails"]["email"] ) )? $_SESSION["fb_userDetails"]["email"] : "";

        $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_db_name);
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

        	//เช็ค fbid ใน server เราก่อนว่ามีหรือยัง
	$results = $mysqli->query("SELECT COUNT(*) FROM tb_member WHERE fbid=".$user_id);
	$get_total_rows = $results->fetch_row();

       	if(!$get_total_rows[0]){ //ไม่พบข้อมูลก็ให้ insert ใหม่
		$insert_row = $mysqli->query("INSERT INTO tb_member (fbid, fullname, email) VALUES(".$user_id.", '".$user_name."', '".$user_email."')");
	}

	header("location: ". $redirect_url);
}else{
        //ตรวจสอบค่า session fb_userDetails
	if(isset($_SESSION["fb_userDetails"])){
                echo'สวัสดี: '.$_SESSION["fb_userDetails"]["name"].' หากต้องการออกจากระบบคลิก '.[ <a href="?log-out=1">Logout</a> ] ';
                echo'<pre>';
                print_r($_SESSION["fb_userDetails"]);
                echo'</pre>';

	}else{
		//Link Login facebook
		$login_url = $helper->getLoginUrl( array( 'scope' => $required_scope ) );
		echo '<a href="'.$login_url.'">Login with Facebook</a>';
	}
}
