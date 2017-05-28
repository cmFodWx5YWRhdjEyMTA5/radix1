<?php
include_once("config.php");
session_set_cookie_params(3600);
//ini_set('session.gc_maxlifetime',60*60);
//ini_set('session.gc_probability',1);
//ini_set('session.gc_divisor',1);
session_start();


$username=$_SESSION['username'];
$usertype = $_SESSION['usertype'];
if(!isset($_SESSION['username']))
{
	echo "<script>alert('You are not authorised to view this page, please login for authentication.');</script>";
	echo "<script>window.location.href='index.php'</script>";
}

date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d");

if($_POST)
{	
	$q="select * from members where emailid='".trim($_POST['emailid'])."'";
	$q1=mysql_query($q);
	$q2=mysql_num_rows($q1);
	while($q3=mysql_fetch_array($q1))
	{
	$q4 = $q3[name];
	}
	
	
	
	
	if($_POST['name'] == '')
	{
		

				
					die("Please Enter Name!");
			
	}
	if($_POST['emailid'] == '')
	{
		

				
					die("Please Enter Email Id!");
			
	}
	if($_POST['contactno'] == '')
	{
		

				
					die("Please Enter Contact No!");
			
	}
	if($_POST['gender'] == '')
	{
		

				
					die("Please Select Gender!");
			
	}
	
	if($_POST['pincode'] == '')
	{
		

				
					die("Please Enter Pincode!");
			
	}
	if($_POST['city'] == '')
	{
		

				
					die("Please Select City!");
			
	}
	
	
	
	if($q2 > 0)
	{
	$qry="update members set name='".trim($_POST['name'])."',contactno='".trim($_POST['contactno'])."',gender='".trim($_POST['gender'])."',pincode='".trim($_POST['pincode'])."',city='".trim($_POST['city'])."' where emailid='".trim($_POST['emailid'])."'";
	mysql_query($qry);
	die("Saved!");
	}
}

	
	
	
	
	



 
   

  
   



?>