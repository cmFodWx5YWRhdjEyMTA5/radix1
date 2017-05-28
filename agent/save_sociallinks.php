<?php
include_once("config.php");
session_set_cookie_params(3600);
//ini_set('session.gc_maxlifetime',60*60);
//ini_set('session.gc_probability',1);
//ini_set('session.gc_divisor',1);
session_start();

/*if(!isset($_SESSION['username']))
{
	echo "<script>alert('You are not authorised to view this page, please login for authentication.');</script>";
	echo "<script>window.location.href='index.php'</script>";
}*/
$username=$_SESSION['username'];
if(!isset($_SESSION['username']))
{
	echo "<script>alert('You are not authorised to view this page, please login for authentication.');</script>";
	echo "<script>window.location.href='index.php'</script>";
}
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d");



if($_POST)
{	
	$id=$_POST['id_social'];
$id=base64_decode($id);
$qry="update agent set facebooklink='".mysql_real_escape_string($_POST['facebooklink'])."',twitterlink='".mysql_real_escape_string($_POST['twitterlink'])."',pinterestlink='".mysql_real_escape_string($_POST['pinterestlink'])."',instagramlink='".mysql_real_escape_string($_POST['instagramlink'])."',flickrlink='".mysql_real_escape_string($_POST['flickrlink'])."' where id='".$id."'";
	mysql_query($qry);
	die("Saved!");
	
}
?>