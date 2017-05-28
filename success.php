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

$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$seller=$_POST["udf1"];
//$salt="QLQ1fupeBP";   //for test version

$salt="PCc0xXff8o";

if(isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'||||||||||'.$seller.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'||||||||||'.$seller.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
		 
       if ($hash != $posted_hash) {
	       $message = "Invalid Transaction. Please try again!";
		   }
	   else {
	   $random = rand();
	   $q="select * from book_service where emailid='".$email."' and selleremail='".$seller."' and txnid='".$txnid."' order by id desc limit 1";
$q1=mysql_query($q);
$q3=mysql_num_rows($q1);
$binaryid = '1';
while($q2=mysql_fetch_array($q1))
{
$pay_id = $q2['id'];
$pay_emailid = $q2['emailid'];
$pay_package = $q2['package'];
$pay_packagebookingdate = $q2['packagebooking_date'];
$pay_packagebookingtime = $q2['package_bookingtime'];
$pay_firstname = $q2['firstname'];
$pay_phone = $q2['phone'];
$pay_packagename = $q2['packagename'];
$pay_packageamount = $q2['packageamount'];
$pay_selleremail = $q2['selleremail'];
$pay_sellername = $q2['sellername'];
$pay_sellerperson = $q2['sellerperson'];
$pay_sellerphone = $q2['sellerphone'];
$pay_txnid = $q2['txnid'];

$qry="insert into confirmbook_package(emailid,package,packagebooking_date,package_bookingtime,confirm_date,binaryid,service_type,txnid,sellerphone,sellerperson,sellername,selleremail,packageamount,packagename,phone,firstname,vouchercode,usedstatus) values('".$pay_emailid."','".$pay_package."','".$pay_packagebookingdate."','".$pay_packagebookingtime."','".$date."','".$binaryid."','Service','".$pay_txnid."','".$pay_sellerphone."','".$pay_sellerperson."','".$pay_sellername."','".$pay_selleremail."','".$pay_packageamount."','".$pay_packagename."','".$pay_phone."','".$pay_firstname."','".$random."','No')";
mysql_query($qry);
}

$pquery="delete from book_service where emailid='".$email."' and selleremail='".$seller."' and txnid='".$txnid."' and id='".$pay_id."'";
mysql_query($pquery);

           	   
          $message = "<h4>Thank You. Your order status is ". $status .".</h4>";
          $message .=  "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
          $message .=  "<h4>We have received a payment of Rs. " . $amount . ". Voucher code has been sent email id. Go to the shop and use the voucher code for your service.</h4>";
           
		   
		   $email_to = $email;
    $email_subject = "Radix Beauty Service Booking Confirmation";
     
     
   
     
    $error_message = "";

    $email_message = "You received this message because someone requested an Appointment of Service Booking for '".$email."' to Radix Beauty.  If you did not make this request, please ignore the rest of this message.

Hello there,

You recently requested an Appointment of Service Booking to Radix Beauty.
We have received a payment of Rs. " . $amount . "
Your Transaction ID for this transaction is ".$txnid." 
Your Voucher Code for this service is ".$random." 
Go to the shop and use the voucher code for your service.



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
$headers .= 'Cc: connectcityindia@gmail.com ' . "\r\n";
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
		   
		   }    
		     header('Location: payment_successfull.php?msg='.$message);     
?>	