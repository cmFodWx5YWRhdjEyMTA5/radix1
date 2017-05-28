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

	
//$fp=addslashes(file_get_contents($_FILES['image']['tmp_name'])); //will store the image to fp
	

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


if($_POST['emailid'] == '')

	{

		



				

					die("Please Enter Email Id!");

			

	}
	
	$q="select * from agent where emailid='".$_POST['emailid']."'";
	$q1=mysql_query($q);
	$q2=mysql_num_rows($q1);
	if($q2 > 0)
{
	die("Email Id Already Exists!");
}




	
	
	if($_POST['password'] == '')

	{

		



				

					die("Please Enter Password!");

			

	}

	

		
	if($_POST['city'] == '')

	{

		



				

					die("Please Select City!");

			

	}


	

	
//$cb_modes=implode(',',$_POST['cb_modes']);
//$sb_modes=implode(',',$_POST['sb_modes']);



	
	
	
	
	if($_POST['companyname'] != '' and $_POST['city'] != '' and $_POST['contactperson'] != '' and $_POST['contactno'] != '' and $_POST['emailid'] != '' and $q2 < 1)

	{
	$random = rand();

	$qry="insert into agent(firstname,lastname,mobile,email,pass,city,creationdate,country,active,createdby,confirmation_code,confirmation) values('".trim($_POST['companyname'])."','".trim($_POST['contactperson'])."','".trim($_POST['contactno'])."','".trim($_POST['emailid'])."','".trim($_POST['password'])."','".trim($_POST['city'])."','".$date."','India','Yes','Admin','".$random."','No')";

	mysql_query($qry);


$random = base64_encode($random);
	$email_to = trim($_POST['emailid']);
    $email_subject = "Radix Beauty Agent Registration";
     
     
   
     
    $error_message = "";

    $email_message = "You received this message because someone requested an email registration for '".trim($_POST['emailid'])."' to Radix Beauty.  If you did not make this request, please ignore the rest of this message.

Hello there,

You recently requested an email registration to Radix Beauty. We can't wait to send the updates you want via email, so please click the following link to activate your registration immediately:

https://radixbeauty.com/successmailconfirm.php?k=$random

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

	die("Saved!");


	}

}



	

	

	

	

	







 

   



  

   







?>