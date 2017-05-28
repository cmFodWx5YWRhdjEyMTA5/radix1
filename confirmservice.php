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
$time = date("h:i:sa");

if($_POST)
{	
	$q="select * from confirmbook_package where vouchercode='".trim($_POST['servicecode'])."' and selleremail='".$username."'";
	$q1=mysql_query($q);
	$q2=mysql_num_rows($q1);
	while($q3=mysql_fetch_array($q1))
	{
	$q4 = $q3['vouchercode'];
	$q5 = $q3['usedstatus'];
	}
	
	
	
	
	if($_POST['servicecode'] == '')
	{
		

				
					die("Please Enter Service Code!");
			
	}
	if($q2 < 1)
	{
	die("Service Code Is Not Valid!");
	}
	
	if($q5 == 'Yes')
	{
	die("Service Code Already Used!");
	}
	
	
	if($q2 > 0 and $q5 == 'No')
	{
	
	$qry="update confirmbook_package set usedstatus='Yes',vouchercode_useddate='".$date."',vouchercode_usedtime='".$time."' where vouchercode='".trim($_POST['servicecode'])."' and selleremail='".$username."'";
	mysql_query($qry);
	
	die("Confirmed Service!");
	
	}
}
?>