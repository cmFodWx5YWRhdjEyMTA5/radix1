<?php
session_start();
//include ('connection.php');
session_destroy();

 print"<script language='javascript'>document.location='index.php'</script>";
//unset($_SESSION["Role"]);
unset($_SESSION["username"]);
//unset($_SESSION["division"]);
 

?>

