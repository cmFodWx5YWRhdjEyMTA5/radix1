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
//$fp=addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
	
	if($_POST['companyname'] == '')
	{
		

				
					die("Please Enter First Name!");
			
	}
	
	if($_POST['contactperson'] == '')
	{
		

				
					die("Please Enter Last Name!");
			
	}
	
	
	if($_POST['contactno'] == '')
	{
		

				
					die("Please Enter Contact No!");
			
	}
	
		
	
	if($_POST['city'] == '')
	{
		

				
					die("Please Select City!");
			
	}
	
	//$cb_modes=implode(',',$_POST['cb_modes']);
	//$sb_modes=implode(',',$_POST['sb_modes']);
	
	
	if($_POST['companyname'] != '' and $_POST['city'] != '' and $_POST['contactperson'] != '' and $_POST['contactno'] != '' )
	{
	
	
	$qry="update listings set firstname='".trim($_POST['companyname'])."',lastname='".trim($_POST['contactperson'])."',mobile='".trim($_POST['contactno'])."',email='".trim($_POST['emailid'])."',city='".trim($_POST['city'])."',active='".trim($_POST['active'])."' where id='".$id."'";
	mysql_query($qry);
	die("Saved!");
	
	}
}
?>