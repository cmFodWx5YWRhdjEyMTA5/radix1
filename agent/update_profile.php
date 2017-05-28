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

	$fp=addslashes(file_get_contents($_FILES['aadharattachment']['tmp_name']));
	
	$bn="select aadharattachment from agent where id='".$id."'";
	$bn1=mysql_query($bn);
	while($bn2=mysql_fetch_array($bn1))
	{
	$aadharimage = $bn2['aadharattachment'];
	}
	
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
	
		if($_POST['building'] == '')
	{
		

				
					die("Please Enter building!");
			
	}
	if($_POST['street'] == '')
	{
		

				
					die("Please Enter Street!");
			
	}
	if($_POST['landmark'] == '')
	{
		

				
					die("Please Enter Landmark!");
			
	}
	if($_POST['area'] == '')
	{
		

				
					die("Please Enter Area!");
			
	}
	if($_POST['pincode'] == '')
	{
		

				
					die("Please Enter Pincode!");
			
	}
	if($_POST['city'] == '')
	{
		

				
					die("Please Select City!");
			
	}
	
	if($_POST['aadharnumber'] == '')
	{
		

				
					die("Please Enter Aadhar Card Number!");
			
	}
	if($fp == '' and $aadharimage == '')
	{
		

				
					die("Please Attach Aadhar Card Image!");
			
	}
	//$sb_modes=implode(',',$_POST['sb_modes']);
	
	
	if($_POST['companyname'] != '' and $_POST['city'] != '' and $_POST['pincode'] != '' and $_POST['area'] != '' and $_POST['landmark'] != '' and $_POST['building'] != '' and $_POST['street'] != '' and $_POST['contactperson'] != '' and $_POST['contactno'] != '' and $_POST['aadharnumber'] != '')
	{
	if($fp == '')
	{
	
	$qry="update agent set firstname='".trim($_POST['companyname'])."',lastname='".trim($_POST['contactperson'])."',mobile='".trim($_POST['contactno'])."',email='".trim($_POST['emailid'])."',building='".trim($_POST['building'])."',street='".trim($_POST['street'])."',landmark='".trim($_POST['landmark'])."',area='".trim($_POST['area'])."',pincode='".trim($_POST['pincode'])."',city='".trim($_POST['city'])."',aadharnumber='".trim($_POST['aadharnumber'])."' where id='".$id."'";
	mysql_query($qry);
	
	die("Saved!");
}
else
{
$qry="update agent set firstname='".trim($_POST['companyname'])."',lastname='".trim($_POST['contactperson'])."',mobile='".trim($_POST['contactno'])."',email='".trim($_POST['emailid'])."',building='".trim($_POST['building'])."',street='".trim($_POST['street'])."',landmark='".trim($_POST['landmark'])."',area='".trim($_POST['area'])."',pincode='".trim($_POST['pincode'])."',city='".trim($_POST['city'])."',aadharnumber='".trim($_POST['aadharnumber'])."',aadharattachment='".$fp."' where id='".$id."'";
	mysql_query($qry);
	
	die("Saved!");
}	
	}
}
?>