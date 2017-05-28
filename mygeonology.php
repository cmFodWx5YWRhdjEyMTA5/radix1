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

$id = $_GET['id'];
$id = base64_decode($id);
function packagesname($a)
{
$q="select Name from Packages where id='".$a."'";
$q1=mysql_query($q);
while($q2=mysql_fetch_array($q1))
{
$packagesname = $q2['Name'];
}
return $packagesname;
}
function prsnname($a)
{
$q="select name from members where emailid='".$a."'";
$q1=mysql_query($q);
while($q2=mysql_fetch_array($q1))
{
$prsnname = $q2['name'];
}
return $prsnname;
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
<style>
*Now the CSS*/
* {margin: 0; padding: 0;}

.tree ul {
	padding-top: 20px; position: relative;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

.tree li {
	float: left; text-align: center;
	list-style-type: none;
	position: relative;
	padding: 20px 5px 0 5px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}



.tree li::before, .tree li::after{
	content: '';
	position: absolute; top: 0; right: 50%;
	border-top: 1px solid #ccc;
	width: 50%; height: 20px;
}
.tree li::after{
	right: auto; left: 50%;
	border-left: 1px solid #ccc;
}


.tree li:only-child::after, .tree li:only-child::before {
	display: none;
}


.tree li:only-child{ padding-top: 0;}


.tree li:first-child::before, .tree li:last-child::after{
	border: 0 none;
}

.tree li:last-child::before{
	border-right: 1px solid #ccc;
	border-radius: 0 5px 0 0;
	-webkit-border-radius: 0 5px 0 0;
	-moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
	border-radius: 5px 0 0 0;
	-webkit-border-radius: 5px 0 0 0;
	-moz-border-radius: 5px 0 0 0;
}


.tree ul ul::before{
	content: '';
	position: absolute; top: 0; left: 50%;
	border-left: 1px solid #ccc;
	width: 0; height: 20px;
}

.tree li a{
	border: 1px solid #ccc;
	padding: 5px 10px;
	text-decoration: none;
	color: #666;
	font-family: arial, verdana, tahoma;
	font-size: 11px;
	display: inline-block;
	
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}


.tree li a:hover {
	background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}

.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before{
	border-color:  #94a0b4;
}


</style>

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

        <h4>My Geonology</h4>

      </div>

      <div class="col-md-6 text-right"> <a href="index.php">Home <i class="fa fa-angle-double-right"></i></a> <span>My Geonology</span> </div> 

    </div>

  </div>

</section>

<!-- section -->







<!-- Login Form -->

<section id="form" class="section_space" style="padding: 30px 0;">

  <div class="container">

    <div class="row">

      <div>

         

          
 <h2>My Geonology</h2>
 <?php
 $q="select * from confirmbook_package where binaryid like '".$id."-%' order by id asc limit 6";

  $q1=mysql_query($q);

  $q2=mysql_num_rows($q1);
 ?>
<div class="tree" align="center" style="width:100%">
	<ul>
		<li>
			<a href="#"><?php echo $id; ?></a>
			<ul>
				<li>
					<a href="#">Child1</a>
					
				</li>
                <li>
					<a href="#">Child2</a>
					
				</li>
                <li>
					<a href="#">Child3</a>
					
				</li>
                <li>
					<a href="#">Child4</a>
					
				</li>
                <li>
					<a href="#">Child5</a>
					
				</li>
                <li>
					<a href="#">Child6</a>
					
				</li>
				
			</ul>
		</li>
	</ul>
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

