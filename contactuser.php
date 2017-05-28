<?php
include_once("config.php");

date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d");


if($_POST)
{	
		
	
	if($_POST['name'] == '')
	{
		

				
					die("Please Enter Name!");
			
	}
	else if($_POST['email'] == '')
	{
		

				
					die("Please Enter Email Id!");
			
	}
	else if($_POST['sub'] == '')
	{
		

				
					die("Please Enter Subject!");
			
	}
	else if($_POST['message'] == '')
	{
		

				
					die("Please Enter Message!");
			
	}
	else
	{
	
	$name = trim($_POST['name']);
	$emailfrom = trim($_POST['email']);
	$sub = trim($_POST['sub']);
	$message = trim($_POST['message']);
	
	
	$email_to = "errahulsinghsolanki@gmail.com";
    $email_subject = "Radix Beauty Contact Enquiry";
     
     
   
     
    $error_message = "";

    $email_message = "Name: $name".PHP_EOL."Email: $emailfrom".PHP_EOL."Subject: $sub".PHP_EOL."Message: $message";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    
    $emailfrom = trim($_POST['email']);
     
// create email headers
$headers = 'From: '.$emailfrom."\r\n".
$headers .= 'Cc: connectcityindia@gmail.com ' . "\r\n";
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
	die("Thanks for Contacting with us. Our customer care executive will get in touch with you soon!");
	}
}

	
	
	
	
	



 
   

  
   



?>