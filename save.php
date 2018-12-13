<?php
require_once'connect.php';

if(isset($_POST['save']));
{
	if(!empty($_FILES['Image']['name']))
	 {
            $filename =  md5($_FILES['Image']['name'].time());
            $ext = explode('.',$_FILES['Image']['name']);
            $dest =  __DIR__.DIRECTORY_SEPARATOR.'imageggg'.DIRECTORY_SEPARATOR.$filename.'.'.$ext[1];
            if(!copy($_FILES['Image']['tmp_name'], $dest)) 
            {
                        echo 'upload Error';
                        exit();
                      
            }
            $Image = $filename.'.'.$ext[1];
       }

	$Name =$_POST['Name'];
    $Price =$_POST['Price'];
    $Info =$_POST['Info'];
        
    $sql = "INSERT INTO  testg (Name,Price,Info)"
               . "VALUES('$Name',$Price,'$Info')";
      
    mysql_query($sql)or die ('insert error');
}
?>
<html>
	
	<body>
		<?php require_once("form.php"); ?>
	</body>
</html>


