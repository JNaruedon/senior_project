<!DOCTYPE html>
<?php
$ebits = ini_get('error_reporting');
error_reporting($ebits ^ E_NOTICE);
	session_start();
	isset($_SESSION['status']) ? $name = $_SESSION['status'] : $name = '';
	$newid = $_SESSION['id'] ;
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

?>
<?php
/*
 *  Simple Rating System using CSS, JQuery, AJAX, PHP, MySQL
 *  Downloaded from Devzone.co.in
 */
$ipaddress = $_SERVER['REMOTE_ADDR']; // here I am taking IP as UniqueID but you can have user_id from Database or SESSION

$servername = "localhost";
$username = "3e";
$password = "123456";
$dbname = "project59";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
?>

<?php
//Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else
{
  //$rate = $conn->real_escape_string($_POST['rating']);

	$sql = "SELECT * FROM 3e_rating WHERE 3e_rating.userid = $newid ";
	$result = mysql_query($sql);

		if(mysql_num_rows($result) < 1 )
	 {
			 $courseidd = $_POST['courseid'] ;
			 $score = $_POST['rating'];
			 $comment = $_POST['comment'];

			 $sql = "INSERT INTO 3e_rating (id,courseid,rate,userid,comment,name) VALUES
						('','$courseidd','$score','$newid','$comment','$fname')";
	 }
	 else
	 {
		 echo "<center><br><br><br><font color=green>คุณลงคะแนนวิชานี้ไปแล้ว</font>";
		 echo "  <a href='alertStudent.php'>
		 <br><br>
		 <input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";
	 }


    //echo $sql;

    // echo "score: $rate,($score) - ip: $ipaddress";
/*
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Unable to connect Server: " . $conn->connect_error);
}

if (isset($_POST['rating']) && !empty($_POST['rating'])) {

    $rate = $conn->real_escape_string($_POST['rating']);
// check if user has already rated
    // $sql = "SELECT `id` FROM 3e_rating WHERE `user_id`='" . $ipaddress . "'";
    // $sql = "INSERT INTO 3e_rating (id,rate,user_id) VALUES;

    //$result = $conn->query($sql);
    //$row = $result->fetch_assoc();
    //if ($result->num_rows > 0) {
    //    echo $row['id'];
    //} else {
        //$score= $_POST['rating'];
        $sql = "INSERT INTO 3e_rating ( id,rate,user_id) VALUES ('', '".$rate."', '') ";
        // '" . $ipaddress . "'
        //if (mysqli_query($conn, $sql)) {
         //   echo "0";
        //}
//   //  }
// }
*/
if ($conn->query($sql) === TRUE) {
  //  echo "New record created successfully";
   echo "<center><br><br><br><font color=green> ให้คะแนนเรียบร้อยแล้ว</font>";
    echo "  <a href='alertStudent.php'>
    <br><br>
    <input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";


 } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
  }
$conn->close();
?>
