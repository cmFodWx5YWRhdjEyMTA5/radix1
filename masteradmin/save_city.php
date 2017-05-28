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
	$q="select * from location where name='".trim($_POST['city'])."'";
	$q1=mysql_query($q);
	$q2=mysql_num_rows($q1);
	while($q3=mysql_fetch_array($q1))
	{
	$q4 = $q3[name];
	}
	
	
	
	
	if($_POST['city'] == '')
	{
		

				
					die("Please Enter City!");
			
	}
	if($q2 > 0)
	{
	die("City '".$q4."' already exists");
	}
	
	
	if($q2 < 1)
	{
	$qry="insert into location(name,active,createdby) values('".trim($_POST['city'])."','Yes','Admin')";
	mysql_query($qry);
	die("Saved!");
	}
}

	
	
	
	
	



 
   

  
   



?>