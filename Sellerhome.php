<?php
include_once("config.php");
session_set_cookie_params(3600);
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
<link href="css/bootstrap-table.css" rel="stylesheet">
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
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript">
  $(document).ready(function()
  {
  
  $('#sellercustomForm').on('submit', function(e)
    {
	e.preventDefault();
    $("#selleroutput").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Saving...Please Wait</span>');
		$(this).ajaxSubmit({
		target: '#selleroutput',
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
$('#sellercustomForm').resetForm();
//window.location.href = 'Sellerhome.php'; 
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
$('#customForm_prfpic').resetForm();
$("#output_prfpic").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Updating Gallery...Please Wait</span>');
var name = document.getElementById("id_prfpic").value;
	//alert(name);
  if(name)
 {
  $.ajax({
  type: 'post',
  url: 'loadimagelist.php',
  data: {
   user_name:name,
  },
  success: function (response) {
   // We get the element having id of display_info and put the response inside it
   //$( '#loadservicedata' ).html(name);
   document.getElementById("loadimagedata").innerHTML = response;
   $("#output_prfpic").html('');
	
  }
  });
 }
<!--document.getElementById("customForm_prfpic").reset();-->
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
							 <li class=""><a href="#pilltab5" data-toggle="tab">Gallery</a></li>
                        </ul>
		
						<div class="tab-content">
							<div class="tab-pane fade active in" id="pilltab1"><div class="panel-heading" style="font-size: 18px; font-weight: 600; letter-spacing: 0.025em; height: 66px; line-height: 45px; color:#eb268f; text-align:center;">Personal Information</div>
								<div class="panel-body">
                               <?php
$q="select * from listings where emailid='".$username."'";

  $q1=mysql_query($q);

  $q4=mysql_num_rows($q1);

  if($q4 > 0)

  {

  $count = 0;

  while($q2=mysql_fetch_array($q1))

  {

  $count = $count+1;

  $id = base64_encode($q2['id']);

?>
                                						<form class="form-horizontal" name="sellercustomForm" id="sellercustomForm" method="post" action="update_listing.php" enctype="multipart/form-data"><input type="hidden" id="id" name="id" placeholder="id" value="<?php echo $id;?>" />
                       							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name" style="color:#eb268f;">Business Name</label>
									<div class="col-md-9">
									<input type="text" id="companyname" name="companyname" placeholder="Company Name" class="form-control" autofocus="" value="<?php echo $q2['companyname']; ?>">
                                    
									</div>
								</div>
							
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email" style="color:#eb268f;">Contact Person</label>
									<div class="col-md-9">
										<input type="text" id="contactperson" name="contactperson" placeholder="Contact Person" class="form-control" value="<?php echo $q2['contactperson']; ?>"/>
                                         
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="email" style="color:#eb268f;">Email Address</label>
									<div class="col-md-9">
										<input type="text" id="emailid" name="emailid" value="<?php echo $q2['emailid']; ?>" placeholder="Email ID" class="form-control" readonly>
                                         
									</div>
								</div>
								
								<!-- Message body -->
								<div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Mobile Number</label>
									<div class="col-md-9">
										<input type="text" id="contactno" name="contactno" placeholder="Contact No." value="<?php echo $q2['contactno']; ?>" class="form-control" >
                                        
                                        </div>
								</div>
                                
                            <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Website</label>
									<div class="col-md-9">
										<input type="text" id="website" name="website" value="<?php echo $q2['website']; ?>" placeholder="Website" class="form-control">
									</div>
								</div>
                                
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Building</label>
									<div class="col-md-9">
										<input type="text" id="building" name="building" placeholder="Building" class="form-control" value="<?php echo $q2['building']; ?>">
									</div>
								</div>
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Street</label>
									<div class="col-md-9">
										<input type="text" id="street" name="street" placeholder="Street" class="form-control" value="<?php echo $q2['street']; ?>">
									</div>
								</div>
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Landmark</label>
									<div class="col-md-9">
										<input type="text" id="landmark" name="landmark" placeholder="Landmark" class="form-control" value="<?php echo $q2['landmark']; ?>">
									</div>
								</div>
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Area</label>
									<div class="col-md-9">
										<input type="text" id="area" name="area" placeholder="Area" class="form-control" value="<?php echo $q2['area']; ?>">
									</div>
								</div>
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Pincode</label>
									<div class="col-md-9">
										<input type="text" id="pincode" name="pincode" placeholder="Pin Code" value="<?php echo $q2['pincode']; ?>" class="form-control">
									</div>
								</div>
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">City</label>
									<div class="col-md-9">
										<select id="city" name="city" class="form-control">
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
</select>
									</div>
								</div>
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Category</label>
									<div class="col-md-9">
										<select id="cat" name="cat" class="form-control">
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
</select>
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Description</label>
									<div class="col-md-9">
										<textarea name="desc" id="desc" placeholder="Description" class="form-control" rows="5"><?php echo $q2['description']; ?></textarea>
									</div>
								</div>
                                <div style="font-size: 14px;font-weight: 600;letter-spacing: 0.025em; color:#eb268f;text-align:center; height:33px;">Timing</div>
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Monday From</label>
									<div class="col-md-9">
										<select id="mondayfrom" name="mondayfrom" class="form-control">
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
</select>
									</div>
								</div>
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Monday To</label>
									<div class="col-md-9">
										<select id="mondayto" name="mondayto" class="form-control">
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
</select>
									</div>
								</div>
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Tuesday From</label>
									<div class="col-md-9">
										<select id="tuesdayfrom" name="tuesdayfrom" class="form-control">
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
</select>
									</div>
								</div>
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Tuesday To</label>
									<div class="col-md-9">
										<select id="tuesdayto" name="tuesdayto" class="form-control">
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
</select>
									</div>
								</div>
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Wednesday From</label>
									<div class="col-md-9">
										<select id="wednesdayfrom" name="wednesdayfrom" class="form-control">
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
</select>
									</div>
								</div>
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Wednesday To</label>
									<div class="col-md-9">
										<select id="wednesdayto" name="wednesdayto" class="form-control">
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
</select>
									</div>
								</div>
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Thursday From</label>
									<div class="col-md-9">
										<select id="thursdayfrom" name="thursdayfrom" class="form-control">
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
</select>
									</div>
								</div>
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Thursday To</label>
									<div class="col-md-9">
										<select id="thursdayto" name="thursdayto" class="form-control">
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
</select>
									</div>
								</div>
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Friday From</label>
									<div class="col-md-9">
										<select id="fridayfrom" name="fridayfrom" class="form-control">
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
</select>
									</div>
								</div>
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Friday To</label>
									<div class="col-md-9">
										<select id="fridayto" name="fridayto" class="form-control">
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
</select>
									</div>
								</div>
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Saturday From</label>
									<div class="col-md-9">
										<select id="saturdayfrom" name="saturdayfrom" class="form-control">
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
</select>
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Saturday To</label>
									<div class="col-md-9">
										<select id="saturdayto" name="saturdayto" class="form-control">
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
</select>
									</div>
								</div>
                                
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Sunday From</label>
									<div class="col-md-9">
										<select id="sundayfrom" name="sundayfrom"class="form-control">
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
</select>
									</div>
								</div>
                                 
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Sunday To</label>
									<div class="col-md-9">
										<select id="sundayto" name="sundayto" class="form-control">
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
</select>
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Profile Image</label>
									<div class="col-md-9">
										<input name="image" id="image" placeholder="Image" accept="image/jpeg" type="file" style="width:240px;padding:8px;border:1px solid #ccc;border-radius:4px; font-family: Segoe UI Light; font-size:14px;">
                                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($q2['image']). ' " width="200px" height="200px"/>'; ?>
									</div>
								</div>
                     							
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" id="submitform" class="btn-booking hvr-ripple-out" style="float:right;">Save</button><span id="selleroutput" class="output" style="float:right; padding-top:8px; padding-right:15px;"></span>
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
						<form class="form-horizontal" name="customForm_pass" id="customForm_pass" method="post" action="save_sellerchangepassword.php">
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
						       
                               <div class="tab-pane fade" id="pilltab5"><div class="panel-heading" style="font-size: 18px; font-weight: 600; letter-spacing: 0.025em; height: 66px; line-height: 45px; color:#eb268f; text-align:center;">Gallery</div>
								<div class="panel-body"> <?php
								$zzid = base64_encode($username);
								?>
                                						<form class="form-horizontal" name="customForm_prfpic" id="customForm_prfpic" method="post" action="save_sellerprofilepic.php" enctype="multipart/form-data">
                         <input type="hidden" name="id_prfpic" id="id_prfpic" value="<?php echo $zzid;?>" />
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Add Image</label>
									<div class="col-md-9">
									<input accept="image/jpeg" type="file" id="prfpic" name="prfpic"/>			</div>
								</div>
                                <div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" id="submitform_prfpic" class="btn-booking hvr-ripple-out" style="float:right;">Save</button><span id="output_prfpic" class="output" style="float:right; padding-top:8px; padding-right:15px;"></span>
									</div>
								</div>
							</fieldset>
						</form>
                                
                                <table data-toggle="table">
						    <thead>
						    <tr>
						       <th data-field="sno" data-sortable="true">S.No.</th>
						        <th data-field="businessname" data-sortable="true">Date</th>
						        <th data-field="contactperson"  data-sortable="true">Time</th>
                                 <th data-field="contactimage"  data-sortable="true">Image</th>
						        <th data-field="category" data-sortable="true">Delete</th>
						        
						    </tr>
						    </thead>
                            <tbody id="loadimagedata">
                             <?php

  $q="select * from gallery where sellerid='".$username."' order by id desc";

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
	   		 <td style=""><?php echo $q3['imagedate']; ?></td>
              <td style=""><?php echo $q3['imagetime']; ?></td>
		     <td style=""><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($q3['image']). ' " width="120px" height="120px"/>'; ?></td>
	       
             <td style=""><a href="deleteSellermyimage.php?id=<?php echo base64_encode($q3['id']);?>">Delete</a></td>  
                            </tr>
                             <?php
  }
  }
  else
  {
  ?>
                        <tr class="no-records-found">
                        <td colspan="5">You have not added any image Yet!</td></tr>
                        <?php
  }
  ?>
                    </tbody>
						</table>
							
								<!-- Form actions -->
								
                        			</div>
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
<script src="js/bootstrap-table.js"></script>
<script src="js/custom-js.js"></script> 



</body>

</html>

