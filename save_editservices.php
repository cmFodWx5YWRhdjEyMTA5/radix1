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
$sellerid = base64_decode($_POST['id']);

 
 $qry="select * from Services where id='".$sellerid."'";
	$qry1=mysql_query($qry);
	$qry2=mysql_num_rows($qry1);
	while($qry3=mysql_fetch_array($qry1))
	{
	$qry4 = $qry3['Name'];
	}
	
	$q="select * from Services where Name='".trim($_POST['category'])."' && Name!='".$qry4."' && sellerid='".$username."'";
	$q1=mysql_query($q);
	$q2=mysql_num_rows($q1);
	while($q3=mysql_fetch_array($q1))
	{
	$q4 = $q3['Name'];
	}
	

		
	if($_POST['category'] == '')
	{
		

				
					die("Please Enter Service Name!");
			
	}
	/*if($_POST['package_type'] == '')
	{
		

				
					die("Please Select Package Type!");
			
	}*/
	if($_POST['price'] == '')
	{
		

				
					die("Please Enter Price of Service!");
			
	}
	
	if($_POST['desc'] == '')
	{
		

				
					die("Please Enter Description of Service!");
			
	}
	if($qry4 == trim($_POST['category']))
	{
	$qry="update Services set Name='".trim($_POST['category'])."',description='".trim($_POST['desc'])."',price='".trim($_POST['price'])."' where id='".$sellerid."'";
		mysql_query($qry);
	die("Saved!");
	}
	
	if($q2 > 0)
	{
	die("Service '".$q4."' already exists");
	}
	
	
	if($q2 < 1)
	{
	$qry="update Services set Name='".trim($_POST['category'])."',description='".trim($_POST['desc'])."',price='".trim($_POST['price'])."' where id='".$sellerid."'";
		mysql_query($qry);
	die("Saved!");
	}
	
}

?>