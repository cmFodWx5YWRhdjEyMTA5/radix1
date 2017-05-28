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


 //will store the image to fp

	$q="select * from Packages where Name='".trim($_POST['category'])."'";
	$q1=mysql_query($q);
	$q2=mysql_num_rows($q1);
	while($q3=mysql_fetch_array($q1))
	{
	$q4 = $q3['Name'];
	}
	
	
	
	
	if($_POST['category'] == '')
	{
		

				
					die("Please Enter Package!");
			
	}
	if($_POST['package_type'] == '')
	{
		

				
					die("Please Select Package Type!");
			
	}
	
	if($_POST['desc'] == '')
	{
		

				
					die("Please Enter Description!");
			
	}
	if($q2 > 0)
	{
	die("Packages '".$q4."' already exists");
	}
	
	
	if($q2 < 1)
	{
	$qry="insert into Packages(Name,active,createdby,description,type) values('".trim($_POST['category'])."','Yes','".$username."','".trim($_POST['desc'])."','".trim($_POST['package_type'])."')";
	mysql_query($qry);
	die("Saved!");
	}
	
}

?>