<?php
include_once("config.php");
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d");
$time = date("h:i:sa");

if($_POST)
{	
	
	$reviewseller = base64_decode($_POST['reviewseller']);
	
	
	
	if($_POST['reviewname'] == '')
	{
		

				
					die("Please Enter Your Name!");
			
	}
	if($_POST['reviewemail'] == '')
	{
		

				
					die("Please Enter Your Email Id!");
			
	}
	if($_POST['reviewcomment'] == '')
	{
		

				
					die("Please Enter Your Feedback!");
			
	}
		
	
	if($_POST['reviewname'] != '' and $_POST['reviewemail'] != '' and $_POST['reviewcomment'] != '')
	{
	
	$qry="insert into reviews(reviewname,reviewemail,reviewcomment,reviewdate,reviewtime,reviewstatus,reviewapproval,reviewseller) values('".trim($_POST['reviewname'])."','".trim($_POST['reviewemail'])."','".trim($_POST['reviewcomment'])."','".$date."','".$time."','No','No','".$reviewseller."')";
	mysql_query($qry);
	die("Thanks for submitting your review. It will show after approval!");
	}
}
?>