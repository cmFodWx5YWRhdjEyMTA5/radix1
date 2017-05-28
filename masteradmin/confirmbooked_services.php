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
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d");
function membername($a)
{
$q="select name from members where emailid='".$a."'";
$q1=mysql_query($q);
while($q2=mysql_fetch_array($q1))
{
$membername = $q2['name'];
}
return $membername;
}
function membercontact($a)
{
$q="select contactno from members where emailid='".$a."'";
$q1=mysql_query($q);
while($q2=mysql_fetch_array($q1))
{
$membercontact = $q2['contactno'];
}
return $membercontact;
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
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lumino - Dashboard</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">

<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">

<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">

<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">

<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">

<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">

<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">

<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">

<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">

<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">

<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">

<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">

<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">

<link rel="manifest" href="favicon/manifest.json">

<meta name="msapplication-TileColor" content="#ffffff">

<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">

<meta name="theme-color" content="#ffffff">

</head>

<body>
	<?php include("admin_header.php"); ?>
    	<!--/.sidebar-->
		<?php include("admin_sidebar.php"); ?>
	<!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="home.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">List Confirmed Booked Services</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">List Confirmed Booked Services</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			
			
						<table border="1" style="width:100%; border-color:#eb268f;">
						    <thead style="background-color:#eb268f; color:#fff;">
						    <tr>
						        <th data-field="id" data-align="right">S.No.</th>
						        <th data-field="name">Name</th>
                                <th data-field="name">Email Id</th>
                                <th data-field="name">Contact No</th>
                                <th data-field="name">Package</th>
                                <th data-field="name">Booking Date</th>
                                <th data-field="name">Booking Time</th>
                                <th data-field="name">Confirm Date</th>
                                
                                
						        
						    </tr>
						    </thead>
                          <?php

  $q="select * from confirmbook_package where service_type='Service' order by id asc";

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
                            <tr style="color:#eb268f; background-color: #fff;">
                             <td><?php echo $count; ?></td>
	   		 <td><?php echo membername($q3['emailid']); ?></td>
		     <td><?php echo $q3['emailid']; ?></td>
	         <td><?php echo membercontact($q3['emailid']); ?></td> 
             <td><?php echo servicesname($q3['package']); ?></td>
		     <td><?php echo $q3['packagebooking_date']; ?></td>
             <td><?php echo $q3['package_bookingtime']; ?></td>
              <td><?php echo $q3['confirm_date']; ?></td>
             
	         
                            </tr>
                             <?php
  }
  }
  else
  {
  ?><tr style="color:#eb268f; background-color: #fff;">
    <td colspan="9">No Booking Found.</td>
  </tr>
  <?php
  }
  ?>
						</table>
					
			
			
		</div><!--/.row-->
		
		
								
		
	</div>	<!--/.main-->

	
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
