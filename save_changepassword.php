<?php
include_once("config.php");
session_set_cookie_params(3600);

session_start();

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
	$qry="update members set password='".$_POST['city_pass']."' where emailid='".$_POST['id_pass']."'";
	mysql_query($qry);
	die("Saved!");
	}
}

	
	
	
	
	



 
   

  
   



?>