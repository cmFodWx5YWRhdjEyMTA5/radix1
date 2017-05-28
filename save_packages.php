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
$time = date("h:i:sa");
$day = date("l"); //it will show day


if($_POST)
{	
$sellerid = base64_decode($_POST['sellerid']);

 //will store the image to fp

	$q="select * from Packages where Name='".trim($_POST['category'])."' and sellerid='".trim($sellerid)."'";
	
	$q1=mysql_query($q);
	$q2=mysql_num_rows($q1);
	while($q3=mysql_fetch_array($q1))
	{
	$q4 = $q3['Name'];
	}
	
	
	
	
	if($_POST['category'] == '')
	{
		

				
					die("Please Enter Package Name!");
			
	}
	
	if($_POST['price'] == '')
	{
		

				
					die("Please Enter Price of Package!");
			
	}
	if(!is_numeric($_POST['price']))
	{
		

				
					die("Please Enter Number Only In Price Field!");
			
	}
	if($_POST['price'] < 10000)
	{
		

				
					die("Please Enter Price More Than 10000 In Price Field!");
			
	}
	
	
	if($_POST['desc'] == '')
	{
		

				
					die("Please Enter Description of Package!");
			
	}
	if($q2 > 0)
	{
	die("Packages '".$q4."' already exists");
	}
	
	
	if($q2 < 1)
	{
	$qry="insert into Packages(Name,active,createdby,description,price,sellerid,creationdate,creationtime) values('".trim($_POST['category'])."','Yes','".$username."','".trim($_POST['desc'])."','".trim($_POST['price'])."','".trim($sellerid)."','".$date."','".$time."')";
	mysql_query($qry);
	die("Saved!");
	}
	
}

?>