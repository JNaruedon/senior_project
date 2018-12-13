<?php
require_once 'connect.php';
if(isset($_POST['Find']));
{
	$ID = $_POST['f'];
}
$sql ="SELECT * FROM testg where Name = '$ID' ";
$result = mysql_query($sql);
?>
<html>
        <head>
                <meta charset="UTF-8">
                <title></title>
        </head>
        <body>
                <table border="1">
                        <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Info</th>
                                <th>image</th>
                                
                                
                        </tr>
                        <?php
                        while ($fetch = mysql_fetch_assoc($result))
                        {
                             
                        ?>
                        <tr>
                                <td><?php echo $fetch['ID']?></td>
                                <td><?php echo $fetch['Name']?></td>
                                <td><?php echo $fetch['Price']?></td>
                                <td><?php echo $fetch['Info']?></td>
                                <td><?php echo $fetch['Image']?></td>
                  <?php    
                         }
                        ?>
                </table>
        </body>
</html>