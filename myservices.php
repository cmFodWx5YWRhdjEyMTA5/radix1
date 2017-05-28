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
<link href="css/bootstrap-table.css" rel="stylesheet">

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

      <div class="tab-content">
							<div class="tab-pane fade active in">
                            <h3>My Services</h3>
                            								
				<div class="panel panel-default">
					<div class="panel-body">
						<table data-toggle="table">
						    <thead>
						    <tr>
						       <th data-field="sno" data-sortable="true">S.No.</th>
						        <th data-field="businessname" data-sortable="true">Appointment Date</th>
						        <th data-field="contactperson"  data-sortable="true">Appointment Time</th>
						        <th data-field="emailid" data-sortable="true">Service Name</th>
                                <th data-field="contactno" data-sortable="true" >Amount</th>
						        <th data-field="category" data-sortable="true">Booked At</th>
						        <th data-field="registrationdate"  data-sortable="true">View Downline</th>
						    </tr>
						    </thead>
                            <tbody>
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
						
                        <tr data-index="<?php echo $count;?>">
                       <td style=""><?php echo $count; ?></td>
	   		 <td style=""><?php echo $q3['packagebooking_date']; ?></td>
              <td style=""><?php echo $q3['package_bookingtime']; ?></td>
		     <td style=""><?php echo $q3['packagename']; ?></td>
	         <td style=""><?php echo $q3['packageamount']; ?></td> 
             <td style=""><?php echo $q3['sellername'];  ?></td>
   
	      
             <td style=""><a href="mydownline.php?id=<?php echo base64_encode($q3['binaryid']);?>">View Downline</a></td>
		    
                            </tr>
                             <?php
  }
  }
  else
  {
  ?>
                        <tr class="no-records-found">
                        <td colspan="7">No records found</td></tr>
                        <?php
  }
  ?>
                    </tbody>
						</table>
					</div>
				</div>
			
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
<script src="js/bootstrap-table.js"></script>
<script src="js/custom-js.js"></script> 



</body>

</html>

