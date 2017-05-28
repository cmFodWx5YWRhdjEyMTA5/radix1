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

	
$fp=addslashes(file_get_contents($_FILES['image']['tmp_name'])); //will store the image to fp
	

	if($_POST['companyname'] == '')

	{

		



				

					die("Please Enter Company Name!");

			

	}
	
	if($_POST['contactperson'] == '')

	{

		



				

					die("Please Enter Contact Person!");

			

	}
	
	if($_POST['contactno'] == '')

	{

		



				

					die("Please Enter Contact No!");

			

	}


if($_POST['emailid'] == '')

	{

		



				

					die("Please Enter Email Id!");

			

	}
	
	$q="select * from listings where emailid='".$_POST['emailid']."'";
	$q1=mysql_query($q);
	$q2=mysql_num_rows($q1);
	if($q2 > 0)
{
	die("Email Id Already Exists!");
}




	if($_POST['listing_type'] == '')

	{

		



				

					die("Please Select Listing Type!");

			

	}

	
	

	if($_POST['desc'] == '')

	{

		



				

					die("Please Enter Description!");

			

	}

		if($_POST['cat'] == '')

	{

		



				

					die("Please Select Category!");

			

	}

		

	

	
	
	
	
	if($_POST['website'] == '')

	{

		



				

					die("Please Enter Website!");

			

	}
	
	if($_POST['password'] == '')

	{

		



				

					die("Please Enter Password!");

			

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

if($_POST['mondayfrom'] == '')

	{

		



				

					die("Please Select Monday Open Timimg!");

			

	}
	if($_POST['mondayto'] == '')

	{

		



				

					die("Please Select Monday Close Timimg!");

			

	}
	if($_POST['tuesdayfrom'] == '')

	{

		



				

					die("Please Select Tuesday Open Timimg!");

			

	}
	if($_POST['tuesdayto'] == '')

	{

		



				

					die("Please Select Tuesday Close Timimg!");

			

	}
if($_POST['wednesdayfrom'] == '')

	{

		



				

					die("Please Select Wednesday Open Timimg!");

			

	}
	if($_POST['wednesdayto'] == '')

	{

		



				

					die("Please Select Wednesday Close Timimg!");

			

	}
	if($_POST['thursdayfrom'] == '')

	{

		



				

					die("Please Select Thursday Open Timimg!");

			

	}
	if($_POST['thursdayto'] == '')

	{

		



				

					die("Please Select Thursday Close Timimg!");

			

	}
	if($_POST['fridayfrom'] == '')

	{

		



				

					die("Please Select Friday Open Timimg!");

			

	}
	if($_POST['fridayto'] == '')

	{

		



				

					die("Please Select Friday Close Timimg!");

			

	}
	if($_POST['saturdayfrom'] == '')

	{

		



				

					die("Please Select Saturday Open Timimg!");

			

	}
	if($_POST['saturdayto'] == '')

	{

		



				

					die("Please Select Saturday Close Timimg!");

			

	}
	if($_POST['sundayfrom'] == '')

	{

		



				

					die("Please Select Sunday Open Timimg!");

			

	}
	if($_POST['sundayto'] == '')

	{

		



				

					die("Please Select Sunday Close Timimg!");

			

	}
	

	
$cb_modes=implode(',',$_POST['cb_modes']);
//$sb_modes=implode(',',$_POST['sb_modes']);



	if($cb_modes == '')
	{
	die("Please Select Payment Mode!");
	}
	
	
	if($fp == '')
	{
		

				
					die("Please Choose Image!");
			
	}

	if($_POST['companyname'] != '' and $_POST['city'] != '' and $_POST['pincode'] != '' and $_POST['area'] != '' and $_POST['landmark'] != '' and $_POST['building'] != '' and $_POST['street'] != '' and $_POST['contactperson'] != '' and $_POST['contactno'] != '' and $_POST['listing_type'] != '' and $_POST['emailid'] != '' and $q2 < 1)

	{
	$random = rand();

	$qry="insert into listings(companyname,contactperson,contactno,emailid,password,building,street,landmark,area,pincode,city,listing_type,creationdate,country,active,createdby,cat_id,description,website,mondayfrom,mondayto,tuesdayfrom,tuesdayto,wednesdayfrom,wednesdayto,thursdayfrom,thursdayto,fridayfrom,fridayto,saturdayfrom,saturdayto,sundayfrom,sundayto,payment_mode,image,confirmation_code,confirmation) values('".trim($_POST['companyname'])."','".trim($_POST['contactperson'])."','".trim($_POST['contactno'])."','".trim($_POST['emailid'])."','".trim($_POST['password'])."','".trim($_POST['building'])."','".trim($_POST['street'])."','".trim($_POST['landmark'])."','".trim($_POST['area'])."','".trim($_POST['pincode'])."','".trim($_POST['city'])."','".trim($_POST['listing_type'])."','".$date."','India','Yes','Admin','".trim($_POST['cat'])."','".trim($_POST['desc'])."','".trim($_POST['website'])."','".trim($_POST['mondayfrom'])."','".trim($_POST['mondayto'])."','".trim($_POST['tuesdayfrom'])."','".trim($_POST['tuesdayto'])."','".trim($_POST['wednesdayfrom'])."','".trim($_POST['wednesdayto'])."','".trim($_POST['thursdayfrom'])."','".trim($_POST['thursdayto'])."','".trim($_POST['fridayfrom'])."','".trim($_POST['fridayto'])."','".trim($_POST['saturdayfrom'])."','".trim($_POST['saturdayto'])."','".trim($_POST['sundayfrom'])."','".trim($_POST['sundayto'])."','".trim($cb_modes)."','".$fp."','".$random."','No')";

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

	die("Saved!");


	}

}



	

	

	

	

	







 

   



  

   







?>