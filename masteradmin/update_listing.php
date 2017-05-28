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
$fp=addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
	
	if($_POST['companyname'] == '')
	{
		

				
					die("Please Enter Company Name!");
			
	}
	if($_POST['listing_type'] == '')
	{
		

				
					die("Please Select Listing Type!");
			
	}
	if($_POST['contactperson'] == '')
	{
		

				
					die("Please Enter Contact Person!");
			
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
	if($_POST['cat'] == '')
	{
		

				
					die("Please Select Category!");
			
	}
	
	if($_POST['desc'] == '')
	{
		

				
					die("Please Enter Description!");
			
	}
	$cb_modes=implode(',',$_POST['cb_modes']);
	//$sb_modes=implode(',',$_POST['sb_modes']);
	
	
	if($_POST['companyname'] != '' and $_POST['city'] != '' and $_POST['pincode'] != '' and $_POST['area'] != '' and $_POST['landmark'] != '' and $_POST['building'] != '' and $_POST['street'] != '' and $_POST['contactperson'] != '' and $_POST['contactno'] != '' and $_POST['listing_type'] != '')
	{
	if($fp!='')
	{
	$qry="update listings set companyname='".trim($_POST['companyname'])."',contactperson='".trim($_POST['contactperson'])."',contactno='".trim($_POST['contactno'])."',emailid='".trim($_POST['emailid'])."',building='".trim($_POST['building'])."',street='".trim($_POST['street'])."',landmark='".trim($_POST['landmark'])."',area='".trim($_POST['area'])."',pincode='".trim($_POST['pincode'])."',city='".trim($_POST['city'])."',mondayfrom='".trim($_POST['mondayfrom'])."',mondayto='".trim($_POST['mondayto'])."',tuesdayfrom='".trim($_POST['tuesdayfrom'])."',tuesdayto='".trim($_POST['tuesdayto'])."',wednesdayfrom='".trim($_POST['wednesdayfrom'])."',wednesdayto='".trim($_POST['wednesdayto'])."',thursdayfrom='".trim($_POST['thursdayfrom'])."',thursdayto='".trim($_POST['thursdayto'])."',fridayfrom='".trim($_POST['fridayfrom'])."',fridayto='".trim($_POST['fridayto'])."',saturdayfrom='".trim($_POST['saturdayfrom'])."',saturdayto='".trim($_POST['saturdayto'])."',sundayfrom='".trim($_POST['sundayfrom'])."',sundayto='".trim($_POST['sundayto'])."',payment_mode='".trim($cb_modes)."',listing_type='".trim($_POST['listing_type'])."',active='".trim($_POST['active'])."',cat_id='".trim($_POST['cat'])."',description='".trim($_POST['desc'])."',image='".$fp."' where id='".$id."'";
	mysql_query($qry);
	die("Saved!");
	}
	else
	{
	$qry="update listings set companyname='".trim($_POST['companyname'])."',contactperson='".trim($_POST['contactperson'])."',contactno='".trim($_POST['contactno'])."',emailid='".trim($_POST['emailid'])."',building='".trim($_POST['building'])."',street='".trim($_POST['street'])."',landmark='".trim($_POST['landmark'])."',area='".trim($_POST['area'])."',pincode='".trim($_POST['pincode'])."',city='".trim($_POST['city'])."',mondayfrom='".trim($_POST['mondayfrom'])."',mondayto='".trim($_POST['mondayto'])."',tuesdayfrom='".trim($_POST['tuesdayfrom'])."',tuesdayto='".trim($_POST['tuesdayto'])."',wednesdayfrom='".trim($_POST['wednesdayfrom'])."',wednesdayto='".trim($_POST['wednesdayto'])."',thursdayfrom='".trim($_POST['thursdayfrom'])."',thursdayto='".trim($_POST['thursdayto'])."',fridayfrom='".trim($_POST['fridayfrom'])."',fridayto='".trim($_POST['fridayto'])."',saturdayfrom='".trim($_POST['saturdayfrom'])."',saturdayto='".trim($_POST['saturdayto'])."',sundayfrom='".trim($_POST['sundayfrom'])."',sundayto='".trim($_POST['sundayto'])."',payment_mode='".trim($cb_modes)."',listing_type='".trim($_POST['listing_type'])."',active='".trim($_POST['active'])."',cat_id='".trim($_POST['cat'])."',description='".trim($_POST['desc'])."' where id='".$id."'";
	mysql_query($qry);
	die("Saved!");
	}
	}
}
?>