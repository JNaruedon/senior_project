<?php

    $rfrmsubmit = $_POST['frmsubmit'];

    $savepath = "/home/project59/3e/public_html/picture/temp";
    $info = pathinfo($_FILES['imgupload']['name']);

    $target = $savepath.DIRECTORY_SEPARATOR.$info['basename'];
    move_uploaded_file( $_FILES['imgupload']['tmp_name'], $target);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <form method="post" enctype='multipart/form-data'>
            Image Upload <input type="file" id="imgupload" name="imgupload" onchange="readURL(this,'prphoto')">
            <input type="submit" name="frmsubmit" value="Upload">
            <br>
            <img id="prphoto" src="" alt="ภาพตัวอย่าง" />

        </form>
        <hr>
<?php
//show all pic
    $filelist = scandir($savepath);
    foreach ($filelist as $key => $value) {
        if (!in_array($value,array(".",".."))) {
            if (!is_dir($filelist.DIRECTORY_SEPARATOR.$value)) {
?>
            <img src="/~3e/picture/temp/<?php print $value?>" height="180">
<?php
            }
        }
    }
?>

  <script>
      function readURL(input, pic) {
          var im = document.getElementById(pic);
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  im.height = 120;
                  im.src = e.target.result;
              };
              reader.readAsDataURL(input.files[0]);
          }
          else {
              im.width = '';
              im.height = '';
              im.src = '';
          }
      }


  </script>

    </body>
</html>
