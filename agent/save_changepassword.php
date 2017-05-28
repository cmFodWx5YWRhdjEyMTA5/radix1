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
	
	
	
	
	
	if($_POST['city_pass'] == '')
	{
		

				
					die("Please Enter Password!");
			
	}
	if($_POST['city1_pass'] == '')
	{
		

				
					die("Please Enter Password Again!");
			
	}
	if($_POST['city_pass'] != $_POST['city1_pass'])
	{
	die("Password does not Match!");
	}
	
	
	
	if(($_POST['city_pass'] == $_POST['city1_pass']) and ($_POST['city_pass']!=''))
	{
	$qry="update agent set pass='".$_POST['city_pass']."' where email='".$_POST['id_pass']."'";
	mysql_query($qry);
	die("Saved!");
	}
}

	
	
	
	
	



 
   

  
   



?>