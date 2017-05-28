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
	
	
	
	
	
	if($_POST['city'] == '')
	{
		

				
					die("Please Enter Password!");
			
	}
	if($_POST['city1'] == '')
	{
		

				
					die("Please Enter Password Again!");
			
	}
	if($_POST['city'] != $_POST['city1'])
	{
	die("Password does not Match!");
	}
	
	
	
	if(($_POST['city'] == $_POST['city1']) and ($_POST['city']!=''))
	{
	$qry="update users set pass='".$_POST['city']."' where email='".$_POST['id']."'";
	mysql_query($qry);
	die("Saved!");
	}
}

	
	
	
	
	



 
   

  
   



?>