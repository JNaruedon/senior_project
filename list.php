<?php
require_once 'connect.php';
$sql ="SELECT * FROM phpbb_ranks";
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
                                <th>rank title</th>
                                <th>rank min</th>
                                <th>rank special</th>
                                <th>rank image</th>
                                
                                
                        </tr>
                        <?php
                        while ($fetch = mysql_fetch_assoc($result)){
                             
                        ?>
                        <tr>
                                <td><?php echo $fetch['rank_id']?></td>
                                <td><?php echo $fetch['rank_title']?></td>
                                <td><?php echo $fetch['rank_min']?></td>
                                <td><?php echo $fetch['rank_special']?></td>
                                <td><?php echo $fetch['rank_image']?></td>
                                
                  <?php    
                         }
                        ?>
                </table>
        </body>
</html>