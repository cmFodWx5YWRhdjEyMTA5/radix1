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
$msg = $_GET['msg'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="India's No.1  Beauty Saloon Search engine| search beauty saloon & fitness Gym near by you" book your package and get 100% cashback />
<meta name="Single platform to search beauty parlour, Saloon, Gym & fitness center" content="Single platform to search beauty parlour, Saloon, Gym & fitness center Best unisex saloon, women beauty parlour,beauty & fitness gym & hair shop,beauty salon, on radixbeauty.com" />
<meta name="author" content="Single platform to search beauty parlour, Saloon, Gym & fitness center | search beauty saloon near by you-book your package and get 100% cashback " />

<title>Single platform to search beauty parlour, Saloon, Gym & fitness center near by you| search beauty saloon, Fitness Gym near by you-book your package and get 100% cashback </title>
<link rel="stylesheet" type="text/css" href="css/master.css">
<link rel="shortcut icon" href="images/heading-icon.png">
<script src="js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/radix.js"></script>
<?php include("analyticstracking.php") ?>
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

 

<!-- About us Main -->
<section id="page-heading">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h4>&nbsp;</h4>
      </div>
      <div class="col-md-6 text-right"> 
        <a href="#">&nbsp; <i class="fa fa-angle-double-right"></i></a> <span>&nbsp;</span> 
      </div>
    </div>
  </div>
</section>



<section id="about-main" class="padding_top">
  <div class="container">
    <div class="row">
      
      <div class="top-40 bottom-40">
                          <p><?php echo $msg; ?></p>
                          </div>
    </div>
  </div>
</section>
<!-- About us Main --> 
<?php include("footertop.php"); ?>
<?php include("footerbottom.php"); ?>
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script>
<script src="js/wow.min.js"></script> 
 <script src="js/jquery.fancybox.js"></script>
<script src="js/jquery.mixitup.min.js"></script> 
<script src="js/jquery.appear.js"></script>  
<script src="js/jquery-countTo.js"></script> 

<!-- /logicsforest custom js --> 
<script src="js/custom-js.js"></script> 
</body>
</html>
