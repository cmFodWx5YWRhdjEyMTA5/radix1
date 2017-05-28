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


	
if(!isset($_SESSION['username']))
{
die("Please Login To Book Package!");
}
else
{
	$q="select * from book_package where emailid='".$username."' and package='".trim($_POST['package'])."'";
	$q1=mysql_query($q);
	$q2=mysql_num_rows($q1);
	while($q3=mysql_fetch_array($q1))
	{
	$q4 = $q3[name];
	}
	
	if($_POST['package'] == '')
	{
		

				
					die("Please Select Package!");
			
	}
	
	
	if($q2 > 0)
	{
	die("You have already booked this Package. Please contact to our customer care to make payment and activate your package!");
	}
	
	
	if($q2 < 1)
	{
	
	$qry="insert into book_package(emailid,package,packagebooking_date,package_bookingtime) values('".$username."','".trim($_POST['package'])."','".$date."','".$time."')";
	mysql_query($qry);
	
	$email_to = $username;
    $email_subject = "Radix Beauty Package Confirmation";
     
     
   
     
    $error_message = "";

    $email_message = "You received this message because someone requested a package booking for '".$username."' to Radix Beauty.  If you did not make this request, please ignore the rest of this message.

Hello there,

You recently requested a package booking to Radix Beauty. Our customer care executive will contact you soon.

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