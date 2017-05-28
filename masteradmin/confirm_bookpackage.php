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

$q="select * from book_package where id=$id";
$q1=mysql_query($q);
$q3=mysql_num_rows($q1);
$binaryid = '1';
while($q2=mysql_fetch_array($q1))
{
$emailid = $q2['emailid'];
$package = $q2['package'];
$packagebooking_date = $q2['packagebooking_date'];
$qry="insert into confirmbook_package(emailid,package,packagebooking_date,confirm_date,binaryid,service_type) values('".$emailid."','".$package."','".$packagebooking_date."','".$date."','".$binaryid."','Package')";
mysql_query($qry);
}

$pquery="delete from book_package where id=$id";
mysql_query($pquery);
header('Location: booked_packages.php');
?>