
<?php
$check = "SELECT * FROM 3e_rating ";
$result = mysql_query($check);
  while ($fetch = mysql_fetch_assoc($result))
  {
    //echo "score: $score";
    if($fetch['user_id'] == $newid)
    {
      echo "<center><br><br><br><font color=green> ให้คะแนนเรียบร้อยแล้ว</font>";
       echo "  <a href='alertStudent.php'>
       <br><br>
       <input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";

    }
    else
    {
      echo "<center><br><br><br><font color=green> vbvb</font>";
       echo "  <a href='alertStudent.php'>
       <br><br>
       <input type='button'value='Back'style='background:#3B59A8;border:1px solid #000;color:#ffffff;font-weight:bold;'/></a></center>";
    }
  }
  ?>
