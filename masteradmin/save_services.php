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


$fp=addslashes(file_get_contents($_FILES['image']['tmp_name'])); //will store the image to fp

	$q="select * from Services where Name='".trim($_POST['category'])."'";
	$q1=mysql_query($q);
	$q2=mysql_num_rows($q1);
	while($q3=mysql_fetch_array($q1))
	{
	$q4 = $q3['Name'];
	}
	
	
	
	
	if($_POST['category'] == '')
	{
		

				
					die("Please Enter Services!");
			
	}
	
	if($fp == '')
	{
		

				
					die("Please Choose Image!");
			
	}
	if($q2 > 0)
	{
	die("Services '".$q4."' already exists");
	}
	
	
	if($q2 < 1)
	{
	$qry="insert into Services(Name,active,createdby,image) values('".trim($_POST['category'])."','Yes','".$username."','".$fp."')";
	mysql_query($qry);
	die("Saved!");
	}
	
}

	
	
	
	
	



 
   

  
   



?>