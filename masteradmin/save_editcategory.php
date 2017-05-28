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

$id=$_POST['id'];
$id=base64_decode($id);
$fp=addslashes(file_get_contents($_FILES['image']['tmp_name'])); //will store the image to fp

$qry="select * from Category where id='".$id."'";
	$qry1=mysql_query($qry);
	$qry2=mysql_num_rows($qry1);
	while($qry3=mysql_fetch_array($qry1))
	{
	$qry4 = $qry3['Name'];
	}
	
	$q="select * from Category where Name='".trim($_POST['category'])."' && Name!='".$qry4."'";
	$q1=mysql_query($q);
	$q2=mysql_num_rows($q1);
	while($q3=mysql_fetch_array($q1))
	{
	$q4 = $q3['Name'];
	}
	
	
	
	
	if($_POST['category'] == '')
	{
		

				
					die("Please Enter Category!");
			
	}
	if($qry4 == trim($_POST['category']) && $fp == '')
	{
	die("Saved!");
	}
	if($qry4 == trim($_POST['category']) && $fp != '')
	{
	$qry="update Category set image='".$fp."' where id='".$id."'";
	mysql_query($qry);
	die("Saved!");
	}
	if($q2 > 0)
	{
	die("Category '".$q4."' already exists");
	}
	
	
	if($q2 < 1)
	{
	if($fp == '')
	{
	$qry="update Category set Name='".trim($_POST['category'])."' where id='".$id."'";
	mysql_query($qry);
	die("Saved!");
	}
	else
	{
	$qry="update Category set Name='".trim($_POST['category'])."',image='".$fp."' where id='".$id."'";
	mysql_query($qry);
	die("Saved!");
	}
	}
	
}

	
	
	
	
	



 
   

  
   



?>