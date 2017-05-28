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
$id=$_GET['id'];
$id=base64_decode($id);
$q="select * from book_service where id=$id";
$q1=mysql_query($q);
while($q2=mysql_fetch_array($q1))
{
$emailid = $q2['emailid'];
$package = $q2['package'];
$packagebooking_date = $q2['packagebooking_date'];
$package_bookingtime = $q2['package_bookingtime'];
$qry="insert into notinterestedbook_service(emailid,package,packagebooking_date,package_bookingtime) values('".$emailid."','".$package."','".$packagebooking_date."','".$package_bookingtime."')";
mysql_query($qry);
}
header('Location: booked_services.php');
?>