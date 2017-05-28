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
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];

$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
//$salt="QLQ1fupeBP";    // for test version
$salt="PCc0xXff8o";

$seller=$_POST["udf1"];

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'||||||||||'.$seller.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'||||||||||'.$seller.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
  
       if ($hash != $posted_hash) {
	       $message = "Invalid Transaction. Please try again";
		   }
	   else {

         $message = "<h4>Your order status is ". $status .".</h4>";
         $message .= "<h4>Your transaction id for this transaction is ".$txnid.". Your service has not been booked. Please try again!</h4>";
          
		 } 
		 
		 header('Location: payment_failure.php?msg='.$message);  
?>


