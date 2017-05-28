<?php
include_once("config.php");
//include_once("check.php");
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
<title>Radix Beauty - Agent Panel</title>

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
<!--<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>-->
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
	
	    $('#customForm_pass').on('submit', function(e)
		{
		e.preventDefault();
		//show uploading message
		$("#output_pass").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Saving...Please Wait</span>');
		$(this).ajaxSubmit({
		target: '#output_pass',
		success:  afterSuccess_pass //call function after success
		});
        });
		
		$('#customForm_bank').on('submit', function(e)
		{
		e.preventDefault();
		//show uploading message
		$("#output_bank").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Saving...Please Wait</span>');
		$(this).ajaxSubmit({
		target: '#output_bank',
		success:  afterSuccess_bank //call function after success
		});
        });
		
		$('#customForm_social').on('submit', function(e)
		{
		e.preventDefault();
		//show uploading message
		$("#output_social").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Saving...Please Wait</span>');
		$(this).ajaxSubmit({
		target: '#output_social',
		success:  afterSuccess_social //call function after success
		});
        });
		$('#customForm_prfpic').on('submit', function(e)
		{
		e.preventDefault();
		//show uploading message
		$("#output_prfpic").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Saving...Please Wait</span>');
		$(this).ajaxSubmit({
		target: '#output_prfpic',
		success:  afterSuccess_prfpic //call function after success
		});
        });
		

});
function afterSuccess(value)
{
if(value == "Saved!")
{
//$('#customForm').resetForm();
}
}
function afterSuccess_pass(value)
{
if(value == "Saved!")
{
//$('#customForm_pass').resetForm();
document.getElementById("customForm_pass").reset();
}
}
function afterSuccess_bank(value)
{
if(value == "Saved!")
{
//$('#customForm_bank').resetForm();
}
}
function afterSuccess_social(value)
{
if(value == "Saved!")
{
//$('#customForm_social').resetForm();
}
}
function afterSuccess_prfpic(value)
{
if(value == "Saved!")
{
//$('#customForm_pass').resetForm();
document.getElementById("customForm_prfpic").reset();
}
}

</script>

	
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
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Settings</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					
					<div class="panel-body tabs">
					
						<ul class="nav nav-pills">
							<li class="active"><a href="#pilltab1" data-toggle="tab">Personal</a></li>
							<li><a href="#pilltab2" data-toggle="tab">Password</a></li>
							<li><a href="#pilltab3" data-toggle="tab">Bank Info</a></li>
                            <li><a href="#pilltab4" data-toggle="tab">Social</a></li>
                            <li><a href="#pilltab5" data-toggle="tab">Profile Pic</a></li>
						</ul>
		
						<div class="tab-content">
							<div class="tab-pane fade active in" id="pilltab1"><div class="panel-heading">Personal Information</div>
								<div class="panel-body">
                                <?php
								$q="select * from agent where email='".$username."'";
								$q1=mysql_query($q);
								while($q2=mysql_fetch_array($q1))
								{
								$id = base64_encode($q2['id']);
								?>
						<form class="form-horizontal" name="customForm" id="customForm" method="post" action="update_profile.php" enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id" value="<?php echo $id;?>" />
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">First Name</label>
									<div class="col-md-9">
									<input id="companyname" name="companyname" placeholder="First Name" type="text" class="form-control" autofocus="" value="<?php echo $q2['firstname']; ?>">
									</div>
								</div>
							
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Last Name</label>
									<div class="col-md-9">
										<input type="text" id="contactperson" name="contactperson" placeholder="Last Name" class="form-control" value="<?php echo $q2['lastname']; ?>"/>
									</div>
								</div>
								
								<!-- Message body -->
								<div class="form-group">
									<label class="col-md-3 control-label" for="message">Mobile</label>
									<div class="col-md-9">
										<input type="text" id="contactno" name="contactno" placeholder="Mobile" value="<?php echo $q2['mobile']; ?>" class="form-control">
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message">Email ID</label>
									<div class="col-md-9">
										<input type="text" id="emailid" name="emailid" value="<?php echo $q2['email']; ?>" placeholder="Email ID" class="form-control" readonly>
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message">Building</label>
									<div class="col-md-9">
										<input type="text" id="building" name="building" placeholder="Building" class="form-control" value="<?php echo $q2['building']; ?>">
									</div>
								</div>
                                
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message">Street</label>
									<div class="col-md-9">
										<input type="text" id="street" name="street" placeholder="Street" class="form-control" value="<?php echo $q2['street']; ?>">
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message">Landmark</label>
									<div class="col-md-9">
										<input type="text" id="landmark" name="landmark" placeholder="Landmark" class="form-control" value="<?php echo $q2['landmark']; ?>">
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message">Area</label>
									<div class="col-md-9">
										<input type="text" id="area" name="area" placeholder="Area" class="form-control" value="<?php echo $q2['area']; ?>">
									</div>
								</div>
                                
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message">Pin Code</label>
									<div class="col-md-9">
										<input type="text" id="pincode" name="pincode" placeholder="Pin Code" value="<?php echo $q2['pincode']; ?>" class="form-control">
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message">City</label>
									<div class="col-md-9">
										<select id="city" name="city" class="form-control"><?php
$r="select * from location where id='".$q2['city']."' order by name";
$r1=mysql_query($r);
while($r2=mysql_fetch_array($r1))
{
?>
<option value="<?php echo $r2['id'];?>"><?php echo $r2['name'];?></option>
<?php
 }
$r="select * from location where id!='".$q2['city']."' order by name";
$r1=mysql_query($r);
while($r2=mysql_fetch_array($r1))
{
?>
<option value="<?php echo $r2['id'];?>"><?php echo $r2['name'];?></option>
<?php
}
?>
</select>
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="name">Aadhar Card Number</label>
									<div class="col-md-9">
									<input id="aadharnumber" name="aadharnumber" placeholder="Aadhar Number" type="text" class="form-control" autofocus="" value="<?php echo $q2['aadharnumber']; ?>">
									</div>
								</div>
							
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Attach Aadhar Number</label>
									<div class="col-md-9">
										<input accept="image/jpeg" type="file" id="aadharattachment" name="aadharattachment"/><?php if($q2['aadharattachment'] != '') {  echo '<img src="data:image/jpeg;base64,'.base64_encode($q2['aadharattachment']). ' " width="200px" height="200px"/>'; } ?>
									</div>
								</div>
								
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" id="submitform" class="btn btn-default btn-md pull-right">Save</button><span id="output" class="output"></span>
									</div>
								</div>
							</fieldset>
						</form>
                        <?php
                        }
						?>
					</div>
							</div>
							<div class="tab-pane fade" id="pilltab2"><div class="panel-heading">Password Information</div>
								<div class="panel-body">
						<form class="form-horizontal" name="customForm_pass" id="customForm_pass" method="post" action="save_changepassword.php">
                        <input type="hidden" name="id_pass" id="id_pass" value="<?php echo $username;?>" />
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">New Password</label>
									<div class="col-md-9">
									<input type="password" id="city_pass" name="city_pass" placeholder="Enter New Password" class="form-control">
									</div>
								</div>
							
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Password Again</label>
									<div class="col-md-9">
										<input type="password" id="city1_pass" name="city1_pass" placeholder="Enter Again New Password" class="form-control">
									</div>
								</div>
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" id="submitform_pass" class="btn btn-default btn-md pull-right">Save</button><span id="output_pass" class="output"></span>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
							</div>
							<div class="tab-pane fade" id="pilltab3"><div class="panel-heading">Bank Information</div>
								<div class="panel-body">
                                <?php
								$qkl="select * from agent where email='".$username."'";
								$qkl1=mysql_query($qkl);
								while($qkl2=mysql_fetch_array($qkl1))
								{
								$klid = base64_encode($qkl2['id']);
								?>
						<form class="form-horizontal" name="customForm_bank" id="customForm_bank" method="post" action="update_bank.php" enctype="multipart/form-data">
                         <input type="hidden" name="id_bank" id="id_bank" value="<?php echo $klid;?>" />
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Name Of Account Holder</label>
									<div class="col-md-9">
									<input id="bankacname" name="bankacname" placeholder="Name Of Account Holder" type="text" class="form-control" autofocus="" value="<?php echo $qkl2['bankacname']; ?>">
									</div>
								</div>
							
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Account Number</label>
									<div class="col-md-9">
										<input type="text" id="bankacnumber" name="bankacnumber" placeholder="Account Number" class="form-control" value="<?php echo $qkl2['bankacnumber']; ?>"/>
									</div>
								</div>
								
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Name Of Bank</label>
									<div class="col-md-9">
									<input id="bankname" name="bankname" placeholder="Name Of Bank" type="text" class="form-control" autofocus="" value="<?php echo $qkl2['bankname']; ?>">
									</div>
								</div>
							
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Branch</label>
									<div class="col-md-9">
										<input type="text" id="bankbranch" name="bankbranch" placeholder="Branch" class="form-control" value="<?php echo $qkl2['bankbranch']; ?>"/>
									</div>
								</div>
                                
                                <!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">City</label>
									<div class="col-md-9">
									<input id="bankcity" name="bankcity" placeholder="City" type="text" class="form-control" autofocus="" value="<?php echo $qkl2['bankcity']; ?>">
									</div>
								</div>
							
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">IFSC</label>
									<div class="col-md-9">
										<input type="text" id="bankifsc" name="bankifsc" placeholder="IFSC" class="form-control" value="<?php echo $qkl2['bankifsc']; ?>"/>
									</div>
								</div>
                                
                                 <!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Pan Card Number</label>
									<div class="col-md-9">
									<input id="bankpannumber" name="bankpannumber" placeholder="Pan Card Number" type="text" class="form-control" autofocus="" value="<?php echo $qkl2['bankpannumber']; ?>">
									</div>
								</div>
							
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Attach Pan Card</label>
									<div class="col-md-9">
										<input accept="image/jpeg" type="file" id="bankpanattachment" name="bankpanattachment"/><?php if($qkl2['bankpanattachment'] != '') {  echo '<img src="data:image/jpeg;base64,'.base64_encode($qkl2['bankpanattachment']). ' " width="200px" height="200px"/>'; } ?>
									</div>
								</div>
								
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" id="submitform_bank" class="btn btn-default btn-md pull-right">Submit</button><span id="output_bank" class="output"></span>
									</div>
								</div>
							</fieldset>
						</form>
                          <?php
                        }
						?>
					</div>
							</div>
                            <div class="tab-pane fade" id="pilltab4"><div class="panel-heading">Social Information</div>
								<div class="panel-body">
                                 <?php
								$yy="select * from agent where email='".$username."'";
								$yy1=mysql_query($yy);
								while($yy2=mysql_fetch_array($yy1))
								{
								$yyid = base64_encode($yy2['id']);
								?>
						<form class="form-horizontal" name="customForm_social" id="customForm_social" method="post" action="save_sociallinks.php">
                        <input type="hidden" name="id_social" id="id_social" value="<?php echo $yyid;?>" />
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Facebook</label>
									<div class="col-md-9">
									<input type="text" id="facebooklink" name="facebooklink" placeholder="Enter Your Facebook Link" class="form-control" value="<?php echo $yy2['facebooklink'];?>">
									</div>
								</div>
							
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Twitter</label>
									<div class="col-md-9">
										<input type="text" id="twitterlink" name="twitterlink" placeholder="Enter Your Twitter Link" class="form-control" value="<?php echo $yy2['twitterlink'];?>">
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="name">Pinterest</label>
									<div class="col-md-9">
									<input type="text" id="pinterestlink" name="pinterestlink" placeholder="Enter Your Pinterest Link" class="form-control" value="<?php echo $yy2['pinterestlink'];?>">
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="name">Instagram</label>
									<div class="col-md-9">
									<input type="text" id="instagramlink" name="instagramlink" placeholder="Enter Your Instagram Link" class="form-control" value="<?php echo $yy2['instagramlink'];?>">
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="name">Flickr</label>
									<div class="col-md-9">
									<input type="text" id="flickrlink" name="flickrlink" placeholder="Enter Your Flickr Link" class="form-control" value="<?php echo $yy2['flickrlink'];?>">
									</div>
								</div>
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" id="submitform_social" class="btn btn-default btn-md pull-right">Save</button><span id="output_social" class="output"></span>
									</div>
								</div>
							</fieldset>
						</form>
                        <?php
						}
						?>
					</div>
							</div>
                            <div class="tab-pane fade" id="pilltab5"><div class="panel-heading">Profile Picture</div>
								<div class="panel-body">
                                <?php
								$zz="select * from agent where email='".$username."'";
								$zz1=mysql_query($zz);
								while($zz2=mysql_fetch_array($zz1))
								{
								$zzid = base64_encode($zz2['id']);
								?>
						<form class="form-horizontal" name="customForm_prfpic" id="customForm_prfpic" method="post" action="save_profilepic.php" enctype="multipart/form-data">
                        <input type="hidden" name="id_prfpic" id="id_prfpic" value="<?php echo $zzid;?>" />
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Picture</label>
									<div class="col-md-9">
									<input accept="image/jpeg" type="file" id="prfpic" name="prfpic"/><?php if($zz2['profilepic'] != '') {  echo '<img src="data:image/jpeg;base64,'.base64_encode($zz2['profilepic']). ' " width="200px" height="200px"/>'; } ?>
									</div>
								</div>
							
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" id="submitform_prfpic" class="btn btn-default btn-md pull-right">Save</button><span id="output_prfpic" class="output"></span>
									</div>
								</div>
							</fieldset>
						</form>
                        <?php
						}
						?>
					</div>
							</div>
                            
						</div>
					</div>
				</div><!--/.panel-->
			
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
