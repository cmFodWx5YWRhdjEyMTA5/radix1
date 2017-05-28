<?php
include_once("config.php");
session_set_cookie_params(3600);
//ini_set('session.gc_maxlifetime',60*60);
//ini_set('session.gc_probability',1);
//ini_set('session.gc_divisor',1);
session_start();


$username=$_SESSION['username'];
if(!isset($_SESSION['username']))
{
	echo "<script>alert('You are not authorised to view this page, please login for authentication.');</script>";
	echo "<script>window.location.href='index.php'</script>";
}
$query=mysql_query("select * from agent where email='".$username."' and ((firstname = '') or (lastname = '') or (email = '') or (pass = '') or (mobile = '') or (building = '') or (street = '') or (landmark = '') or (area = '') or (city = '') or (pincode = '') or (aadharnumber = '') or (aadharattachment = ''))");
$query1=mysql_num_rows($query);
if($query1 > 0)
{
header('Location: profile.php');

}
?>