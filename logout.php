<?php


header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location:/~3e/index.php"); //to redirect back to "index.php" after logging out
exit();
?>
