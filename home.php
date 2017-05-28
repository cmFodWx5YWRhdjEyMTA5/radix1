<?php
include_once("config.php");
session_set_cookie_params(3600);
//ini_set('session.gc_maxlifetime',60*60);
//ini_set('session.gc_probability',1);
//ini_set('session.gc_divisor',1);
session_start();


$username=$_SESSION['username'];
$usertype = $_SESSION['usertype'];
if(!isset($_SESSION['username']))
{
	echo "<script>alert('You are not authorised to view this page, please login for authentication.');</script>";
	echo "<script>window.location.href='index.php'</script>";
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
<style>
.gender {
    background: #F0F0E9;
    border: medium none;
    color: #696763;
    display: block;
    font-size: 14px;
    font-weight: 300;
    height: 40px;
    margin-bottom: 10px;
    outline: medium none;
    padding-left: 10px;
    width: 100%;
}
.output { color:#eb268f;}
</style>
<script src="js/jquery-1.11.1.min.js"></script>
<!--<script src="js/jquery-1.8.0.min.js"></script>-->
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript">



$(document).ready(function()

{

    $('#usercustomForm').on('submit', function(e)
	{
    e.preventDefault();
    $("#useroutput").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Saving...Please Wait</span>');
	$(this).ajaxSubmit({
    target: '#useroutput',
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
//$('#usercustomForm').resetForm();
//window.location.reload();
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
function afterSuccess_prfpic(value)
{
if(value == "Saved!")
{
//$('#customForm_pass').resetForm();
document.getElementById("customForm_prfpic").reset();
}
}
</script>
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

<section id="form" class="section_space" style="padding: 10px 0;">

  <div class="container">

    <div class="row">

     <div class="panel panel-default">
					
					<div class="panel-body tabs">
					
						<ul class="nav nav-pills">
							<li class="active"><a href="#pilltab1" data-toggle="tab">Personal</a></li>
							<li class=""><a href="#pilltab2" data-toggle="tab">Password</a></li>
							
                            <li class=""><a href="#pilltab5" data-toggle="tab">Profile Pic</a></li>
						</ul>
		
						<div class="tab-content">
							<div class="tab-pane fade active in" id="pilltab1"><div class="panel-heading" style="font-size: 18px; font-weight: 600; letter-spacing: 0.025em; height: 66px; line-height: 45px; color:#eb268f; text-align:center;">Personal Information</div>
								<div class="panel-body">
                                <?php
$q="select * from members where emailid='".$username."'";

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
                                						<form class="form-horizontal" method="post" action="save_userdata.php" id="usercustomForm" name="usercustomForm" enctype="multipart/form-data">
                       							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name" style="color:#eb268f;">Name</label>
									<div class="col-md-9">
									<input name="name" id="name" placeholder="Name" class="form-control" autofocus="" value="<?php echo $q3['name'];?>" type="text">
                                    
									</div>
								</div>
							
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email" style="color:#eb268f;">Email Address</label>
									<div class="col-md-9">
										<input type="email" name="emailid" id="emailid" placeholder="Email Address" value="<?php echo $q3['emailid'];?>" readonly="readonly" class="form-control">
                                         
									</div>
								</div>
								
								<!-- Message body -->
								<div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Mobile Number</label>
									<div class="col-md-9">
										<input type="text" name="contactno" id="contactno" placeholder="Mobile Number" value="<?php echo $q3['contactno'];?>" class="form-control">
                                        
                                        </div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Gender</label>
									<div class="col-md-9">
										<select name="gender" id="gender" class="form-control">
            
            <option value="Male" <?php if($q3['gender']=='Male') { echo 'selected="selected"';}?>>Male</option>
             <option value="Female" <?php if($q3['gender']=='Female') { echo 'selected="selected"';}?>>Female</option>
            </select>
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Pincode</label>
									<div class="col-md-9">
										<input type="text" name="pincode" id="pincode" placeholder="Pincode" value="<?php echo $q3['pincode'];?>" class="form-control"/>
									</div>
								</div>
                                
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">City</label>
									<div class="col-md-9">
										<select name="city" id="city" class="form-control">
            <?php 
			$qry = "select * from location order by name asc";
			$qry1 = mysql_query($qry);
			while($qry2=mysql_fetch_array($qry1))
			{
			?>
             <option value="<?php echo $qry2['name'];?>" <?php if($q3['city'] == $qry2['name']) { echo 'selected="selected"';}?> ><?php echo $qry2['name'];?></option>
             <?php
			 }
			 ?>
            
            </select>
									</div>
								</div>
                     							
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" id="submitform" class="btn-booking hvr-ripple-out" style="float:right;">Save</button><span id="useroutput" class="output" style="float:right; padding-top:8px; padding-right:15px;"></span>
									</div>
								</div>
							</fieldset>
						</form>
                        <?php
}
}
?>
                        					</div>
							</div>
							<div class="tab-pane fade" id="pilltab2"><div class="panel-heading" style="font-size: 18px; font-weight: 600; letter-spacing: 0.025em; height: 66px; line-height: 45px; color:#eb268f; text-align:center;">Password Information</div>
								<div class="panel-body">
						<form class="form-horizontal" name="customForm_pass" id="customForm_pass" method="post" action="save_changepassword.php">
                        <input name="id_pass" id="id_pass" value="<?php echo $username;?>" type="hidden">
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">New Password</label>
									<div class="col-md-9">
									<input id="city_pass" name="city_pass" placeholder="Enter New Password" class="form-control" type="password">
									</div>
								</div>
							
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Password Again</label>
									<div class="col-md-9">
										<input id="city1_pass" name="city1_pass" placeholder="Enter Again New Password" class="form-control" type="password">
									</div>
								</div>
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" id="submitform_pass" class="btn-booking hvr-ripple-out" style="float:right;">Save</button><span id="output_pass" class="output" style="float:right; padding-top:8px; padding-right:15px;"></span>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
							</div>
							
                            
                            <div class="tab-pane fade" id="pilltab5"><div class="panel-heading" style="font-size: 18px; font-weight: 600; letter-spacing: 0.025em; height: 66px; line-height: 45px; color:#eb268f; text-align:center;">Profile Picture</div>
								<div class="panel-body"> <?php
								$zz="select * from members where emailid='".$username."'";
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
									<input accept="image/jpeg" type="file" id="prfpic" name="prfpic"/><?php if($zz2['profilepic'] != '') {  echo '<img src="data:image/jpeg;base64,'.base64_encode($zz2['profilepic']). ' " width="200px" height="200px"/>'; } ?>			</div>
								</div>
							
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" id="submitform_prfpic" class="btn-booking hvr-ripple-out" style="float:right;">Save</button><span id="output_prfpic" class="output" style="float:right; padding-top:8px; padding-right:15px;"></span>
									</div>
								</div>
							</fieldset>
						</form>
                        	 <?php
						}
						?>				</div>
							</div>
                            
						</div>
					</div>
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
<!--<script src="js/jquery-2.1.4.js"></script> -->


</body>

</html>

