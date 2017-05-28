<?php
include_once("config.php");
session_set_cookie_params(3600);

session_start();


$username=$_SESSION['username'];
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d");
$time = date("h:i:sa");
$day = date("l"); //it will show day

if($_POST)
{	

$date_format = strtotime(trim($_POST['packagebooking_date']));
$date_format = date('Y-m-d', $date_format); 
	
if(!isset($_SESSION['username']))
{
die("Please Login To Book Service!");
}
else
{
	$q="select * from book_service where emailid='".$username."' and package='".trim($_POST['package'])."' and packagebooking_date='".$date_format."' and packagebooking_time='".trim($_POST['packagebooking_time'])."'";
	$q1=mysql_query($q);
	$q2=mysql_num_rows($q1);
	while($q3=mysql_fetch_array($q1))
	{
	$q4 = $q3[name];
	}
	
	if($_POST['package'] == '')
	{
		

				
					die("Please Select Service!");
			
	}
	if($_POST['packagebooking_date'] == '')
	{
		

				
					die("Please Select Date!");
			
	}
	if($_POST['packagebooking_time'] == '')
	{
		

				
					die("Please Select Time!");
			
	}
	
	
	if($q2 > 0)
	{
	die("You have already booked this Service. Please contact to our customer care to make payment and activate your Service!");
	}
	
	
	if($q2 < 1)
	{
	
	$qry="insert into book_service(emailid,package,packagebooking_date,package_bookingtime,userbooking_date,userbooking_time) values('".$username."','".trim($_POST['package'])."','".$date_format."','".trim($_POST['packagebooking_time'])."','".$date."','".$time."')";
	mysql_query($qry);
	
	$email_to = $username;
    $email_subject = "Radix Beauty Service Confirmation";
     
     
   
     
    $error_message = "";

    $email_message = "You received this message because someone requested an Appointmnet of Service booking for '".$username."' to Radix Beauty.  If you did not make this request, please ignore the rest of this message.

Hello there,

You recently requested an Appointmnet of Service booking to Radix Beauty. Our customer care executive will contact you soon.

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
	die("Thanks for booking with us. Please check your email inbox or spambox. Our customer care executive will contact you soon!");
	}
	}
}

	
	
	
	
	



 
   

  
   



?>