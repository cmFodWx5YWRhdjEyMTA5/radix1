<?php
include_once("config.php");

date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d");


if($_POST)
{	
	$q="select * from listings where emailid='".trim($_POST['emailid'])."'";
	$q1=mysql_query($q);
	$q2=mysql_num_rows($q1);
	while($q3=mysql_fetch_array($q1))
	{
	$q4 = $q3[name];
	}
	
	if($_POST['cname'] == '')
	{
		

				
					die("Please Enter Business Name!");
			
	}
	
	
	if($_POST['name'] == '')
	{
		

				
					die("Please Enter Contact Person Name!");
			
	}
	if($_POST['emailid'] == '')
	{
		

				
					die("Please Enter Email Id!");
			
	}
	if($_POST['contactno'] == '')
	{
		

				
					die("Please Enter Contact No!");
			
	}
	
	if($_POST['password'] == '')
	{
		

				
					die("Please Enter Password!");
			
	}
	if($_POST['city'] == '')
	{
		

				
					die("Please Select City!");
			
	}
	if($_POST['pincode'] == '')
	{
		

				
					die("Please Select Pincode!");
			
	}if($_POST['cat'] == '')
	{
		

				
					die("Please Select Category!");
			
	}
	if($q2 > 0)
	{
	die("Email Id already exists");
	}
	
	
	if($q2 < 1)
	{
	$random = rand();
	$qry="insert into listings(companyname,contactperson,emailid,contactno,password,confirmation_code,confirmation,creationdate,listing_type,city,pincode,cat_id) values('".trim($_POST['cname'])."','".trim($_POST['name'])."','".trim($_POST['emailid'])."','".trim($_POST['contactno'])."','".trim($_POST['password'])."','".$random."','No','".$date."','Free','".trim($_POST['city'])."','".trim($_POST['pincode'])."','".trim($_POST['cat'])."')";
	mysql_query($qry);
	$random = base64_encode($random);
	$email_to = trim($_POST['emailid']);
    $email_subject = "Radix Beauty Business Registration";
     
     
   
     
    $error_message = "";

    $email_message = "You received this message because someone requested an email registration for '".trim($_POST['emailid'])."' to Radix Beauty.  If you did not make this request, please ignore the rest of this message.

Hello there,

You recently requested an email registration to Radix Beauty. We can't wait to send the updates you want via email, so please click the following link to activate your registration immediately:

https://radixbeauty.com/sellermailconfirm.php?k=$random

(If the link above does not appear clickable or does not open a browser window when you click it, copy it and paste it into your web browser's Location bar.)

--
This message was sent to you by Radix Beauty (radixbeauty.com)
If you received this in error, please disregard.  Do not reply directly to this email.";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    
    $emailfrom = 'info@radixbeauty.com';
     
// create email headers
$headers = 'From: '.$emailfrom."\r\n".
$headers .= 'Cc: connectcityindia@gmail.com.com ' . "\r\n";
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
	die("Thanks for registering with us. Please check your email inbox or spambox to activate your account with us!");
	}
}

	
	
	
	
	



 
   

  
   



?>