<?php
require_once'connect.php';

if(isset($_POST['save']));
{
	$Name =$_POST['name_promotion'];
    $Price =$_POST['price_promotion'];
    $Info =$_POST['info_promotion'];
        
    $sql = "INSERT INTO  3e_promotion (name_promotion,price_promotion,info_promotion)"
               . "VALUES('$Name',$Price,$Info)";
      
    mysql_query($sql)or die ('insert error');
    echo "Insert";
}
?>
