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

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript">



$(document).ready(function()

{

    $('#customForm').on('submit', function(e)

    {

        e.preventDefault();

        

        //show uploading message

        $("#output").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Saving...Please Wait</span>');

        $(this).ajaxSubmit({

        target: '#output',

        success:  afterSuccess //call function after success

        });

    });

});

 

 function afterSuccess(value)



{

if(value == "Saved!")

{

$('#customForm').resetForm();

}



}

</script>

	<style>
	.output { color:#eb268f;}
	.checkbox { display:inline; min-height:0px; }
	</style>
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
				<li class="active">Add Listing</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add Listing</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			
			
			
			<div>
				 <form name="customForm" id="customForm" method="post" action="save_listing.php" enctype="multipart/form-data">
<table width="100%" border="0">
  <tr bgcolor="#fff">
    <th scope="col"><input type="text" id="companyname" name="companyname" placeholder="Company Name" class="form-control" autofocus=""></th>
    <th scope="col"><input type="text" id="contactperson" name="contactperson" placeholder="Contact Person" class="form-control" /></th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col"><input type="text" id="contactno" name="contactno" placeholder="Contact No." class="form-control"></th>
    <th scope="col"><input type="text" id="emailid" name="emailid" placeholder="Email ID" class="form-control"></th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col"><input type="password" id="password" name="password" placeholder="Password" class="form-control"></th>
    <th scope="col"><input type="text" id="website" name="website" placeholder="Website" class="form-control"></th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col"><input type="text" id="building" name="building" placeholder="Building" class="form-control"></th>
    <th scope="col"><input type="text" id="street" name="street" placeholder="Street" class="form-control"></th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col"><input type="text" id="landmark" name="landmark" placeholder="Landmark" class="form-control"></th>
    <th scope="col"><input type="text" id="area" name="area" placeholder="Area" class="form-control"></th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col"><input type="text" id="pincode" name="pincode" placeholder="Pin Code" class="form-control"></th>
    <th scope="col"><select id="city" name="city" class="form-control">



<option value="">City</option>



<?php



$r="select * from location order by name";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['id'];?>"><?php echo $r2['name'];?></option>



 <?php



 }



 ?>
</select></th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col"><select id="cat" name="cat" class="form-control">



<option value="">Category</option>



<?php



$r="select * from Category order by name";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['id'];?>"><?php echo $r2['Name'];?></option>



 <?php



 }



 ?>
</select></th>
    <th scope="col"><select id="listing_type" name="listing_type" class="form-control">



<option value="">Listing Type</option>
<option value="Premium">Premium</option>
<option value="Free">Free</option>
</select></th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col" colspan="2"><textarea name="desc" id="desc" placeholder="Description" class="form-control" rows="5"></textarea></th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col" colspan="2"><span style="color: rgb(141, 141, 133); font-family: Segoe UI Light; font-size:14px;">Hours Of Operation:</span></th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col"><span style="color: rgb(141, 141, 133); font-family: Segoe UI Light; font-size:14px;">Monday:</span>



<select id="mondayfrom" name="mondayfrom" class="form-control">







<option value="">From</option>



<?php



$r="select * from timing order by id asc";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>

</select></th>
    <th scope="col"><span style="color: rgb(141, 141, 133); font-family: Segoe UI Light; font-size:14px;">Monday:</span>



<select id="mondayto" name="mondayto" class="form-control">



<option value="">To</option><?php



$r="select * from timing order by id asc";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>
</select></th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col"><span style="color: rgb(141, 141, 133); font-family: Segoe UI Light; font-size:14px;">Tuesday:</span>



<select id="tuesdayfrom" name="tuesdayfrom" class="form-control">







<option value="">From</option>



<?php



$r="select * from timing order by id asc";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>
</select></th>
    <th scope="col"><span style="color: rgb(141, 141, 133); font-family: Segoe UI Light; font-size:14px;">Tuesday:</span>



<select id="tuesdayto" name="tuesdayto" class="form-control">



<option value="">To</option><?php



$r="select * from timing order by id asc";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>
</select></th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col"><span style="color: rgb(141, 141, 133); font-family: Segoe UI Light; font-size:14px;">Wednesday:</span>



<select id="wednesdayfrom" name="wednesdayfrom" class="form-control">







<option value="">From</option>



<?php



$r="select * from timing order by id asc";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>
</select></th>
    <th scope="col"><span style="color: rgb(141, 141, 133); font-family: Segoe UI Light; font-size:14px;">Wednesday:</span>



<select id="wednesdayto" name="wednesdayto" class="form-control">



<option value="">To</option><?php



$r="select * from timing order by id asc";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>
</select></th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col"><span style="color: rgb(141, 141, 133); font-family: Segoe UI Light; font-size:14px;">Thursday:</span>



<select id="thursdayfrom" name="thursdayfrom" class="form-control">







<option value="">From</option>



<?php



$r="select * from timing order by id asc";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>
</select></th>
    <th scope="col"><span style="color: rgb(141, 141, 133); font-family: Segoe UI Light; font-size:14px;">Thursday:</span>



<select id="thursdayto" name="thursdayto" class="form-control">



<option value="">To</option><?php



$r="select * from timing order by id asc";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>
</select></th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col"><span style="color: rgb(141, 141, 133); font-family: Segoe UI Light; font-size:14px;">Friday:</span>



<select id="fridayfrom" name="fridayfrom" class="form-control">







<option value="">From</option>



<?php



$r="select * from timing order by id asc";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>
</select></th>
    <th scope="col"><span style="color: rgb(141, 141, 133); font-family: Segoe UI Light; font-size:14px;">Friday:</span>



<select id="fridayto" name="fridayto" class="form-control">



<option value="">To</option><?php



$r="select * from timing order by id asc";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>
</select></th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col"><span style="color: rgb(141, 141, 133); font-family: Segoe UI Light; font-size:14px;">Saturday:</span>



<select id="saturdayfrom" name="saturdayfrom" class="form-control">







<option value="">From</option>



<?php



$r="select * from timing order by id asc";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>
</select></th>
    <th scope="col"><span style="color: rgb(141, 141, 133); font-family: Segoe UI Light; font-size:14px;">Saturday:</span>



<select id="saturdayto" name="saturdayto" class="form-control">



<option value="">To</option><?php



$r="select * from timing order by id asc";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>
</select></th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col"><span style="color: rgb(141, 141, 133); font-family: Segoe UI Light; font-size:14px;">Sunday:</span>



<select id="sundayfrom" name="sundayfrom"class="form-control">







<option value="">From</option>



<?php



$r="select * from timing order by id asc";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>
</select></th>
    <th scope="col"><span style="color: rgb(141, 141, 133); font-family: Segoe UI Light; font-size:14px;">Sunday:</span>



<select id="sundayto" name="sundayto" class="form-control">



<option value="">To</option><?php



$r="select * from timing order by id asc";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>
</select></th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col" colspan="2"><span style="color: rgb(141, 141, 133); font-family: Segoe UI Light; font-size:14px;">Payment Modes Accepted By You:</span>



<ul style="list-style:none;">



			</th>
    
  </tr>
  <tr bgcolor="#fff">
    <th scope="col"><li style="list-style:none;">



				<input class="checkbox" type="checkbox" name="cb_modes[]" id="cb_modes[]" value="Cash">



				<span>Cash</span>			</li></th>
    <th scope="col"><li style="list-style:none;">



				<input class="checkbox" type="checkbox" name="cb_modes[]" id="cb_modes[]" value="Master Card">



				<span>Master Card</span>			</li>
</th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col"><li style="list-style:none;">



				<input class="checkbox" type="checkbox" name="cb_modes[]" id="cb_modes[]" value="Visa Card">



				<span>Visa Card</span>			</li></th>
    <th scope="col"><li style="list-style:none;">



				<input class="checkbox" type="checkbox" name="cb_modes[]" id="cb_modes[]" value="Debit Cards">



				<span>Debit Cards</span>			</li></th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col"><li style="list-style:none;">



				<input class="checkbox" type="checkbox" name="cb_modes[]" id="cb_modes[]" value="Money Orders">



				<span>Money Orders</span>			</li></th>
    <th scope="col"><li style="list-style:none;">



				<input class="checkbox" type="checkbox" name="cb_modes[]" id="cb_modes[]" value="Cheques">



				<span>Cheques</span>			</li></th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col"><li style="list-style:none;">



				<input class="checkbox" type="checkbox" name="cb_modes[]" id="cb_modes[]" value="Credit Card">



				<span>Credit Card</span>			</li></th>
    <th scope="col">	<li style="list-style:none;">



				<input class="checkbox" type="checkbox" name="cb_modes[]" id="cb_modes[]" value="Traveler Cheque">



				<span>Travelers Cheque</span>			</li></th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col">	<li style="list-style:none;">



				<input class="checkbox" type="checkbox" name="cb_modes[]" id="cb_modes[]" value="Financing Available">



				<span>Financing Available</span>			</li></th>
    <th scope="col"><li style="list-style:none;">



				<input class="checkbox" type="checkbox" name="cb_modes[]" id="cb_modes[]" value="American Express">



				<span>American Express</span>			</li></th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col">	<li style="list-style:none;">



				<input class="checkbox" type="checkbox" name="cb_modes[]" id="cb_modes[]" value="Diner Club Card">



				<span>Diners Club Card</span>			</li>
		</ul>
        </th>
    <th scope="col">&nbsp;</th>
  </tr>
  <tr bgcolor="#fff">
    <th scope="col"><input name="image" id="image" placeholder="Image" accept="image/jpeg" type="file" style="width:240px;padding:8px;border:1px solid #ccc;border-radius:4px; font-family: Segoe UI Light; font-size:14px;"></th>
    <th scope="col"><input type="hidden" id="doj" name="doj" placeholder="Date of joining" value="<?php echo $date; ?>" style="width:240px;padding:8px;border:1px solid #ccc;border-radius:4px; font-family: Segoe UI Light; font-size:14px;"></th>
  </tr>
 
                           
    <tr bgcolor="#fff">
    <th scope="col"><button type="submit" id="submitform" class="btn btn-primary">Add</button><span id="output" class="output"></span>
</th>
    <th scope="col">&nbsp;</th>
  </tr>
</table>
</form>
                          
			</div>
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
