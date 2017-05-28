<?php
include_once("config.php");
session_set_cookie_params(3600);

session_start();


$username=$_SESSION['username'];
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d");
$time = date("h:i:sa");
$day = date("l"); //it will show day



function getfirstname($a)
{
$q="select Name from members where emailid='".$a."'";
$q1=mysql_query($q);
$q2=mysql_fetch_assoc($q1);
$name = $q2['Name'];
return $name;
}
function getphone($a)
{
$q="select contactno from members where emailid='".$a."'";
$q1=mysql_query($q);
$q2=mysql_fetch_assoc($q1);
$name = $q2['contactno'];
return $name;
}
function getserviceamount($a)
{
$q="select price from Services where id='".$a."'";
$q1=mysql_query($q);
$q2=mysql_fetch_assoc($q1);
$name = $q2['price'];
return $name;
}
function getservicename($a)
{
$q="select Name from Services where id='".$a."'";
$q1=mysql_query($q);
$q2=mysql_fetch_assoc($q1);
$name = $q2['Name'];
return $name;
}
function getseller($a)
{
$q="select sellerid from Services where id='".$a."'";
$q1=mysql_query($q);
$q2=mysql_fetch_assoc($q1);
$name = $q2['sellerid'];
return $name;
}
function getsellername($a)
{
$q="select companyname from listings where emailid='".$a."'";
$q1=mysql_query($q);
$q2=mysql_fetch_assoc($q1);
$name = $q2['companyname'];
return $name;
}
function getsellerperson($a)
{
$q="select contactperson from listings where emailid='".$a."'";
$q1=mysql_query($q);
$q2=mysql_fetch_assoc($q1);
$name = $q2['contactperson'];
return $name;
}
function getsellerphone($a)
{
$q="select contactno from listings where emailid='".$a."'";
$q1=mysql_query($q);
$q2=mysql_fetch_assoc($q1);
$name = $q2['contactno'];
return $name;
}



if($_POST)
{	

$date_format = strtotime(trim($_POST['packagebooking_date']));
$date_format = date('Y-m-d', $date_format); 
	
if(!isset($_SESSION['username']))
{
die('Please <a data-toggle="modal" href="#myLoginModal" data-dismiss="modal"><input type="button" value="Login"></a> To Book Service! <br/><br/>Or <a data-toggle="modal" href="#mySignUpModal" data-dismiss="modal"><input type="button" value="Register"></a> With Us');
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
	
	
 $rahul_seller = getseller($_POST['package']);
 $rahul_amount = getserviceamount($_POST['package']);
 $rahul_firstname = getfirstname($username);
 $rahul_phone = getphone($username);
 $rahul_servicename = getservicename($_POST['package']);
 $surl = "http://radixbeauty.com/success.php";
 $furl = "http://radixbeauty.com/failure.php";
 
 $rahul_sellername = getsellername($rahul_seller);
 $rahul_sellerperson = getsellerperson($rahul_seller);
 $rahul_sellerphone = getsellerphone($rahul_seller);
 
	// Merchant key here as provided by Payu
//$MERCHANT_KEY = "76QCY7kR"; //for test version
$MERCHANT_KEY = "RqDmwpxM"; 
// Merchant Salt as provided by Payu
//$SALT = "QLQ1fupeBP"; // for test version
$SALT = "PCc0xXff8o";

// End point - change to https://secure.payu.in for LIVE mode
// End point - change to https://test.payu.in for LIVE mode

$PAYU_BASE_URL = "https://secure.payu.in";








  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);


// Hash Sequence
//$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
$hashSequence = $MERCHANT_KEY.'|'.$txnid.'|'.$rahul_amount.'|'.$rahul_servicename.'|'.$rahul_firstname.'|'.$username.'|'.$rahul_seller.'||||||||||'.$SALT;

  
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	
	
	/*$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;*/


    $hash = strtolower(hash('sha512', $hashSequence));
    $action = $PAYU_BASE_URL . '/_payment';
  
?>
<html>
  <head>
  
  </head>
  <body>
    
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY; ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid; ?>" />
      
     <input type="hidden" name="amount" value="<?php echo $rahul_amount; ?>" />
     <input type="hidden" name="firstname" id="firstname" value="<?php echo $rahul_firstname; ?>" />
     <input type="hidden" name="email" id="email" value="<?php echo $username; ?>" />
     <input type="hidden" name="phone" value="<?php echo $rahul_phone; ?>" />
     <textarea name="productinfo" style="display:none;"><?php echo $rahul_servicename; ?></textarea>
     <input type="hidden" name="surl" value="<?php echo $surl; ?>" size="64" />
     <input type="hidden" name="furl" value="<?php echo $furl; ?>" size="64" />
      <input type="hidden" name="udf1" value="<?php echo $rahul_seller; ?>" />
     <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
     <input type="submit" value="Click Here" />&nbsp;To Confirm Your Booking!
    </form>
  </body>
</html>
<?php
	
	
	$qry="insert into book_service(emailid,package,packagebooking_date,package_bookingtime,userbooking_date,userbooking_time,firstname,phone,packagename,packageamount,selleremail,sellername,sellerperson,sellerphone,txnid) values('".$username."','".trim($_POST['package'])."','".$date_format."','".trim($_POST['packagebooking_time'])."','".$date."','".$time."','".$rahul_firstname."','".$rahul_phone."','".$rahul_servicename."','".$rahul_amount."','".$rahul_seller."','".$rahul_sellername."','".$rahul_sellerperson."','".$rahul_sellerphone."','".$txnid."')";
	mysql_query($qry);
	
	/*$email_to = $username;
    $email_subject = "Radix Beauty Service Confirmation";
     
     
   
     
    $error_message = "";

    $email_message = "You received this message because someone requested an Appointmnet of Service booking for '".$username."' to Radix Beauty.  If you did not make this request, please ignore the rest of this message.

Hello there,

You recently requested an Appointment of Service booking to Radix Beauty. Our customer care executive will contact you soon.

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
@mail($email_to, $email_subject, $email_message, $headers);*/

	}
	}
}

	
	
	
	
	



 
   

  
   



?>