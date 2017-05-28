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



$id=$_GET['id'];



$id=base64_decode($id);
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
window.location.href = 'list_listing.php'; 

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
				<h1 class="page-header">Edit Listing</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			
			
			
			<div>
            <?php



  $q="select * from listings where id=$id";



  $q1=mysql_query($q);



  while($q2=mysql_fetch_array($q1))



  {

 $id = base64_encode($q2['id']);

  ?>

				<form name="customForm" id="customForm" method="post" action="update_listing.php" enctype="multipart/form-data">

<input type="hidden" id="id" name="id" placeholder="id" value="<?php echo $id;?>" />
<table width="100%" border="0">
  <tr>
    <th scope="col"><input type="text" id="companyname" name="companyname" placeholder="Company Name" class="form-control" autofocus="" value="<?php echo $q2['companyname']; ?>"></th>
    <th scope="col"><input type="text" id="contactperson" name="contactperson" placeholder="Contact Person" class="form-control" value="<?php echo $q2['contactperson']; ?>"/></th>
  </tr>
  <tr>
    <th scope="col"><input type="text" id="contactno" name="contactno" placeholder="Contact No." value="<?php echo $q2['contactno']; ?>" class="form-control"></th>
    <th scope="col"><input type="text" id="emailid" name="emailid" value="<?php echo $q2['emailid']; ?>" placeholder="Email ID" class="form-control"></th>
  </tr>
  <tr>
    <th scope="col"><input type="text" id="website" name="website" value="<?php echo $q2['website']; ?>" placeholder="Website" class="form-control"></th>
    <th scope="col"><input type="text" id="building" name="building" placeholder="Building" class="form-control" value="<?php echo $q2['building']; ?>"></th>
  </tr>
  <tr>
    <th scope="col"><input type="text" id="street" name="street" placeholder="Street" class="form-control" value="<?php echo $q2['street']; ?>"></th>
    <th scope="col"><input type="text" id="landmark" name="landmark" placeholder="Landmark" class="form-control" value="<?php echo $q2['landmark']; ?>"></th>
  </tr>
  <tr>
    <th scope="col"><input type="text" id="area" name="area" placeholder="Area" class="form-control" value="<?php echo $q2['area']; ?>"></th>
    <th scope="col"><input type="text" id="pincode" name="pincode" placeholder="Pin Code" value="<?php echo $q2['pincode']; ?>" class="form-control"></th>
  </tr>
  <tr>
    <th scope="col"><select id="city" name="city" class="form-control">







<?php



$r="select * from location where id='".$q2['city']."' order by name";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['id'];?>"><?php echo $r2['name'];?></option>



 <?php



 }



 ?>



<?php



$r="select * from location where id!='".$q2['city']."' order by name";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['id'];?>"><?php echo $r2['name'];?></option>



 <?php



 }



 ?>

</select></th>
    <th scope="col"><select id="cat" name="cat" class="form-control">



<?php



$r="select * from Category where id='".$q2['cat_id']."' order by Name";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{


$catid = $r2['id'];
?>



<option value="<?php echo $r2['id'];?>"><?php echo $r2['Name'];?></option>



 <?php



 }



 ?>



 <?php



$r="select * from Category where id!='".$q2['cat_id']."' order by Name";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['id'];?>"><?php echo $r2['Name'];?></option>



 <?php



 }



 ?> 
</select></th>
  </tr>
  <tr>
    <th scope="col" colspan="2"><textarea name="desc" id="desc" placeholder="Description" class="form-control" rows="5"><?php echo $q2['description']; ?></textarea></th>
  </tr>
  <tr>
    <th scope="col"><select id="mondayfrom" name="mondayfrom" class="form-control">







<?php



$r="select * from timing where timing='".$q2['mondayfrom']."'";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>



<?php



$r="select * from timing where timing!='".$q2['mondayfrom']."' order by id";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>
</select></th>
    <th scope="col"><select id="mondayto" name="mondayto" class="form-control">



<?php



$r="select * from timing where timing='".$q2['mondayto']."'";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>



<?php



$r="select * from timing where timing!='".$q2['mondayto']."' order by id";



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
  <tr>
    <th scope="col"><select id="tuesdayfrom" name="tuesdayfrom" class="form-control">







<?php



$r="select * from timing where timing='".$q2['tuesdayfrom']."' order by id";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>



<?php



$r="select * from timing where timing!='".$q2['tuesdayfrom']."'";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>

</select></th>
    <th scope="col"><select id="tuesdayto" name="tuesdayto" class="form-control">



<?php



$r="select * from timing where timing='".$q2['tuesdayto']."'";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>



<?php



$r="select * from timing where timing!='".$q2['tuesdayto']."' order by id";



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
  <tr>
    <th scope="col"><select id="wednesdayfrom" name="wednesdayfrom" class="form-control">







<?php



$r="select * from timing where timing='".$q2['wednesdayfrom']."'";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>



<?php



$r="select * from timing where timing!='".$q2['wednesdayfrom']."' order by id";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>


</select></th>
    <th scope="col"><select id="wednesdayto" name="wednesdayto" class="form-control">



<?php



$r="select * from timing where timing='".$q2['wednesdayto']."'";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>



<?php



$r="select * from timing where timing!='".$q2['wednesdayto']."' order by id";



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
  <tr>
    <th scope="col"><select id="thursdayfrom" name="thursdayfrom" class="form-control">







<?php



$r="select * from timing where timing='".$q2['thursdayfrom']."'";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>



<?php



$r="select * from timing where timing!='".$q2['thursdayfrom']."' order by id";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>

</select></th>
    <th scope="col"><select id="thursdayto" name="thursdayto" class="form-control">



<?php



$r="select * from timing where timing='".$q2['thursdayto']."'";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>



<?php



$r="select * from timing where timing!='".$q2['thursdayto']."' order by id";



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
  <tr>
    <th scope="col"><select id="fridayfrom" name="fridayfrom" class="form-control">







<?php



$r="select * from timing where timing='".$q2['fridayfrom']."'";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>



<?php



$r="select * from timing where timing!='".$q2['fridayfrom']."' order by id";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>
</select></th>
    <th scope="col"><select id="fridayto" name="fridayto" class="form-control">



<?php



$r="select * from timing where timing='".$q2['fridayto']."' ";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>



<?php



$r="select * from timing where timing!='".$q2['fridayto']."' order by id";



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
  <tr>
    <th scope="col"><select id="saturdayfrom" name="saturdayfrom" class="form-control">







<?php



$r="select * from timing where timing='".$q2['saturdayfrom']."'";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>



<?php



$r="select * from timing where timing!='".$q2['saturdayfrom']."' order by id";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>

</select></th>
    <th scope="col"><select id="saturdayto" name="saturdayto" class="form-control">



<?php



$r="select * from timing where timing='".$q2['saturdayto']."'";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>



<?php



$r="select * from timing where timing!='".$q2['saturdayto']."' order by id";



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
  <tr>
    <th scope="col"><select id="sundayfrom" name="sundayfrom"class="form-control">







<?php



$r="select * from timing where timing='".$q2['sundayfrom']."' order by id";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>



<?php



$r="select * from timing where timing!='".$q2['sundayfrom']."' order by id";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>
</select></th>
    <th scope="col"><select id="sundayto" name="sundayto" class="form-control">



<?php



$r="select * from timing where timing='".$q2['sundayto']."'";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['timing'];?>"><?php echo $r2['timing'];?></option>



 <?php



 }



 ?>



<?php



$r="select * from timing where timing!='".$q2['sundayto']."'";



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
  <tr>
  <th scope="col" colspan="2" style="background:#fff;"><span style="color: rgb(141, 141, 133); font-family: Segoe UI Light; font-size:14px;">Payment Modes Accepted By You:</span>



<ul style="list-style:none;">



			<?php



			$payment_mode = explode(',', $q2['payment_mode']);



			?></th>
  </tr>
  <tr>
    <th scope="col" style="background:#fff;">



			<li style="list-style:none;">
<input class="checkbox" type="checkbox" name="cb_modes[]" id="cb_modes[]" value="Cash" <?php if($payment_mode== in_array('Cash', $payment_mode)) echo 'checked="checked"'?>>



				<span>Cash</span>			</li></th>
    <th scope="col" style="background:#fff;">
			<li style="list-style:none;">



				<input class="checkbox" type="checkbox" name="cb_modes[]" id="cb_modes[]" value="Master Card" <?php if($payment_mode== in_array('Master Card', $payment_mode)) echo 'checked="checked"'?>>



				<span>Master Card</span>			</li></th>
  </tr>
  <tr>
    <th scope="col" style="background:#fff;"><li style="list-style:none;">



				<input class="checkbox" type="checkbox" name="cb_modes[]" id="cb_modes[]" value="Visa Card" <?php if($payment_mode== in_array('Visa Card', $payment_mode)) echo 'checked="checked"'?>>



				<span>Visa Card</span>			</li></th>
    <th scope="col" style="background:#fff;"><li style="list-style:none;">



				<input class="checkbox" type="checkbox" name="cb_modes[]" id="cb_modes[]" value="Debit Cards" <?php if($payment_mode== in_array('Debit Cards', $payment_mode)) echo 'checked="checked"'?>>



				<span>Debit Cards</span>			</li></th>
  </tr>
  <tr>
    <th scope="col" style="background:#fff;"><li style="list-style:none;">
      <input class="checkbox" type="checkbox" name="cb_modes[]2" id="cb_modes[]2" value="Money Orders" <?php if($payment_mode== in_array('Money Orders', $payment_mode)) echo 'checked="checked"'?>>
      <span>Money Orders</span>			</li></th>
    <th scope="col" style="background:#fff;"><li style="list-style:none;">



				<input class="checkbox" type="checkbox" name="cb_modes[]" id="cb_modes[]" value="Cheques" <?php if($payment_mode== in_array('Cheques', $payment_mode)) echo 'checked="checked"'?>>



				<span>Cheques</span>			</li></th>
  </tr>
  <tr>
    <th scope="col" style="background:#fff;"><li style="list-style:none;">



				<input class="checkbox" type="checkbox" name="cb_modes[]" id="cb_modes[]" value="Credit Card" <?php if($payment_mode== in_array('Credit Card', $payment_mode)) echo 'checked="checked"'?>>



				<span>Credit Card</span>			</li></th>
    <th scope="col" style="background:#fff;"><li style="list-style:none;">



				<input class="checkbox" type="checkbox" name="cb_modes[]" id="cb_modes[]" value="Traveler Cheque" <?php if($payment_mode== in_array('Traveler Cheque', $payment_mode)) echo 'checked="checked"'?>>



				<span>Travelers Cheque</span>			</li></th>
  </tr>
  <tr>
    <th scope="col" style="background:#fff;"><li style="list-style:none;">



				<input class="checkbox" type="checkbox" name="cb_modes[]" id="cb_modes[]" value="Financing Available" <?php if($payment_mode== in_array('Financing Available', $payment_mode)) echo 'checked="checked"'?>>



				<span>Financing Available</span>			</li></th>
    <th scope="col" style="background:#fff;"><li style="list-style:none;">



				<input class="checkbox" type="checkbox" name="cb_modes[]" id="cb_modes[]" value="American Express" <?php if($payment_mode== in_array('American Express', $payment_mode)) echo 'checked="checked"'?>>



				<span>American Express</span>			</li></th>
  </tr>
  <tr>
    <th scope="col" style="background:#fff;"><li style="list-style:none;">



				<input class="checkbox" type="checkbox" name="cb_modes[]" id="cb_modes[]" value="Diner Club Card" <?php if($payment_mode== in_array('Diner Club Card', $payment_mode)) echo 'checked="checked"'?>>



				<span>Diners Club Card</span>			</li></ul></th>
    <th scope="col" style="background:#fff;">&nbsp;</th>
  </tr>
  <tr>
    <th scope="col" style="background:#fff;"><select id="active" name="active" style="width:192px;padding:8px;border:1px solid #ccc;border-radius:4px; font-family: Segoe UI Light; font-size:14px;">







<option value="Yes" <?php if($q2['active']== 'Yes') echo 'selected="selected"'?>>Yes</option>



<option value="No" <?php if($q2['active']== 'No') echo 'selected="selected"'?>>No</option>



  



</select></th>
    <th scope="col"><select id="listing_type" name="listing_type" class="form-control">



<option value="Premium" <?php if($q2['listing_type']== 'Premium') echo 'selected="selected"'?>>Premium</option>

<option value="Free" <?php if($q2['listing_type']== 'Free') echo 'selected="selected"'?>>Free</option>
</select></th>
  </tr>
  <tr>
    <th scope="col" style="background:#fff;"><input name="image" id="image" placeholder="Image" accept="image/jpeg" type="file" style="width:240px;padding:8px;border:1px solid #ccc;border-radius:4px; font-family: Segoe UI Light; font-size:14px;"></th>
    <th scope="col" style="background:#fff;"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($q2['image']). ' " width="200px" height="200px"/>'; ?></th>
  </tr>
 
                           
</table>
<button type="submit" id="submitform" class="btn btn-primary">Save</button><span id="output" class="output"></span>
</form>
<?php



}



?>
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
