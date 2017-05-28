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
	$id=$_POST['id_bank'];
$id=base64_decode($id);
$fp=addslashes(file_get_contents($_FILES['bankpanattachment']['tmp_name']));

$bn="select bankpanattachment from agent where id='".$id."'";
	$bn1=mysql_query($bn);
	while($bn2=mysql_fetch_array($bn1))
	{
	$panimage = $bn2['bankpanattachment'];
	}
	
	if($_POST['bankacname'] == '')
	{
		

				
					die("Please Enter Name Of Account Holder!");
			
	}
	
	if($_POST['bankacnumber'] == '')
	{
		

				
					die("Please Enter Account Number!");
			
	}
	
	
	if($_POST['bankname'] == '')
	{
		

				
					die("Please Enter Name Of Bank!");
			
	}
	
		if($_POST['bankbranch'] == '')
	{
		

				
					die("Please Enter Branch Of Bank!");
			
	}
	if($_POST['bankcity'] == '')
	{
		

				
					die("Please Enter City!");
			
	}
	if($_POST['bankifsc'] == '')
	{
		

				
					die("Please Enter IFSC Code!");
			
	}
	if($_POST['bankpannumber'] == '')
	{
		

				
					die("Please Enter Pan Card Number!");
			
	}
	if($fp == '' and $panimage == '')
	{
		

				
					die("Please Attach Pan Card Image!");
			
	}
	
	//$sb_modes=implode(',',$_POST['sb_modes']);
	
	
	if($_POST['bankacname'] != '' and $_POST['bankacnumber'] != '' and $_POST['bankname'] != '' and $_POST['bankbranch'] != '' and $_POST['bankcity'] != '' and $_POST['bankifsc'] != '' and $_POST['bankpannumber'] != '')
	{
	if($fp == '')
	{
	
	$qry="update agent set bankacname='".trim($_POST['bankacname'])."',bankacnumber='".trim($_POST['bankacnumber'])."',bankname='".trim($_POST['bankname'])."',bankbranch='".trim($_POST['bankbranch'])."',bankcity='".trim($_POST['bankcity'])."',bankifsc='".trim($_POST['bankifsc'])."',bankpannumber='".trim($_POST['bankpannumber'])."' where id='".$id."'";
	mysql_query($qry);
	die("Saved!");
	}
else
{
$qry="update agent set bankacname='".trim($_POST['bankacname'])."',bankacnumber='".trim($_POST['bankacnumber'])."',bankname='".trim($_POST['bankname'])."',bankbranch='".trim($_POST['bankbranch'])."',bankcity='".trim($_POST['bankcity'])."',bankifsc='".trim($_POST['bankifsc'])."',bankpannumber='".trim($_POST['bankpannumber'])."',bankpanattachment='".$fp."' where id='".$id."'";
mysql_query($qry);
	die("Saved!");
}
	
	}
}
?>