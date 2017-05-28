<?php
include_once("config.php");
session_set_cookie_params(3600);
//ini_set('session.gc_maxlifetime',60*60);
//ini_set('session.gc_probability',1);
//ini_set('session.gc_divisor',1);
session_start();


$username=$_SESSION['username'];
if(!isset($_SESSION['username']))
{
	echo "<script>alert('You are not authorised to view this page, please login for authentication.');</script>";
	echo "<script>window.location.href='index.php'</script>";
}


function servicesamount($a)
{
$q="select price from Services where id='".$a."'";
$q1=mysql_query($q);
while($q2=mysql_fetch_array($q1))
{
$packagesname = $q2['price'];
}
return $packagesname;
}
function servicesname($a)
{
$q="select Name from Services where id='".$a."'";
$q1=mysql_query($q);
while($q2=mysql_fetch_array($q1))
{
$packagesname = $q2['Name'];
}
return $packagesname;
}
function bookedat_companyname($a)
{
$q="select companyname from listings where emailid='".$a."'";
$q1=mysql_query($q);
while($q2=mysql_fetch_array($q1))
{
$packagesname = $q2['companyname'];
}
return $packagesname;
}
function bookedat($a)
{
$q="select sellerid from Services where id='".$a."'";
$q1=mysql_query($q);
while($q2=mysql_fetch_array($q1))
{
$sellerid = $q2['sellerid'];
$companyname = bookedat_companyname($sellerid);
}
return $companyname;
}
?>
<!doctype html>

<html>

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="India's No.1  Beauty Saloon Search engine| search beauty saloon near by you" />
<meta name="keywords" content="Best unisex saloon, women beauty parlour,beauty & spa,barbar & hair shop,beauty salon, on radixbeauty.com" />
<meta name="author" content="India's No.1  Beauty Saloon Search engine| search beauty saloon near by you" />

<title>India's No.1  Beauty Saloon Search engine| search beauty saloon near by you in Ahmedabad</title>

<link rel="stylesheet" type="text/css" href="css/master.css">

<link rel="shortcut icon" href="images/heading-icon.png">

<script src="js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
</head>



<body>

<!--Loader-->

<!-- Back-To-Top -->

<div class="container"> 

  <a href="#" class="back-to-top text-center" style="display: inline;"> <i class="fa fa-angle-up"></i> </a> 

</div>





<!-- Header Starts -->

<?php include("topbar.php"); ?>

<?php include("header.php"); ?>

<!-- Header Ends --> 







<!-- Page Heading -->

<section id="page-heading">

  <div class="container">

    <div class="row">

      <div class="col-md-6">

        <h4>&nbsp;</h4>

      </div>

      <div class="col-md-6 text-right"> <a href="#">&nbsp; <i class="fa fa-angle-double-right"></i></a> <span>&nbsp;</span> </div> 

    </div>

  </div>

</section>

<!-- section -->







<!-- Login Form -->

<section id="form" class="section_space" style="padding: 30px 0;">

  <div class="container">

    <div class="row">

      <div>

         <div class="signup-form" style="width:100%">

          
 <h2>My Service Appointments</h2>
<table width="100%" border="1" bordercolor="#eb268f">
  <tr style="background-color:#eb268f; color:#fff;">
    <th scope="col">S. No.</th>
    <th scope="col">Appointment Date</th>
     <th scope="col">Appointment Time</th>
    <th scope="col">Service Name</th>
    <th scope="col">Amount</th>
    <th scope="col">Booked At</th>
    
  <th scope="col">View Downline</th>
      
    </tr>
   <?php

  $q="select * from confirmbook_package where emailid='".$username."' and service_type='Service' order by id asc";

  $q1=mysql_query($q);

  $q2=mysql_num_rows($q1);

  if($q2 > 0)

  {

  $count = 0;

  while($q3=mysql_fetch_array($q1))

  {

  $count = $count+1;

  $id = base64_encode($q3['id']);

  ?>
  <tr>
      <td><?php echo $count; ?></td>
   <td><?php echo $q3['packagebooking_date']; ?></td>
  <td><?php echo $q3['package_bookingtime']; ?></td>
 <td><?php echo servicesname($q3['package']); ?></td>
 <td><?php echo servicesamount($q3['package']); ?></td>
  <td><?php echo bookedat($q3['package']); ?></td>
  <td><a href="mydownline.php?id=<?php echo base64_encode($q3['binaryid']);?>">View Downline</a></td>
   
  
  </tr>
  <?php
  }
  }
  else
  {
  ?>
  <tr>

    <td colspan="6">No Service Appointment Found.</td>

  </tr>
  <?php
  }
  ?>
</table>
        </div>

      </div>

      

      <div class="col-sm-4">

       

      </div>

    </div>

  </div>

</section>

<!-- Login Form --> 











<!-- Footer top -->

<?php include("footertop.php"); ?>

<!-- section -->







<?php include("footerbottom.php"); ?> 








<script src="js/bootstrap.min.js"></script> 

<script src="js/owl.carousel.min.js"></script>

<script src="js/wow.min.js"></script> 

<script src="js/jquery.mixitup.min.js"></script> 

<script src="js/jquery-countTo.js"></script> 

<script src="js/jquery.appear.js"></script> 

<script src="js/jquery.fancybox.js"></script>

<!-- /logicsforest custom js --> 

<script src="js/custom-js.js"></script> 



</body>

</html>

