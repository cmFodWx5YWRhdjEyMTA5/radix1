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

function encrypt_decrypt($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'sol@6262#%';
    $secret_iv = 'rah@7212%#';

    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

$plain_txt = $username;
//echo "Plain Text = $plain_txt\n";

$encrypted_txt = encrypt_decrypt('encrypt', $plain_txt);
//echo "Encrypted Text = $encrypted_txt\n";

$decrypted_txt = encrypt_decrypt('decrypt', $encrypted_txt);
//echo "Decrypted Text = $decrypted_txt\n";

/*if( $plain_txt === $decrypted_txt ) 
{
echo "SUCCESS";
}
else
{ 
echo "FAILED";
}*/

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
	
	
});

 

 function afterSuccess(value)
{
if(value == "Saved!")
{
document.getElementById("usercustomForm").reset();
//$('#usercustomForm').resetForm();
//window.location.reload();
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
							<li class="active"><a href="#pilltab1" data-toggle="tab">Add</a></li>
							<li class=""><a href="#pilltab2" data-toggle="tab">Confirmed</a></li>
							
                            <li class=""><a href="#pilltab5" data-toggle="tab">Not Confirmed</a></li>
                            <li class=""><a href="#pilltab3" data-toggle="tab">Total</a></li>
						</ul>
		
						<div class="tab-content">
							<div class="tab-pane fade active in" id="pilltab1"><div class="panel-heading" style="font-size: 18px; font-weight: 600; letter-spacing: 0.025em; height: 66px; line-height: 45px; color:#eb268f; text-align:center;">Add Member</div>
								<div class="panel-body">
                                
                                						<form class="form-horizontal" method="post" action="save_referraluserdata.php" id="usercustomForm" name="usercustomForm" enctype="multipart/form-data">
                                                        <input name="referid" id="referid" class="form-control" value="<?php echo base64_encode($username);?>" type="hidden">
                       							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name" style="color:#eb268f;">Name</label>
									<div class="col-md-9">
									<input name="name" id="name" placeholder="Name" class="form-control" autofocus="" type="text">
                                    
									</div>
								</div>
							
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email" style="color:#eb268f;">Email Address</label>
									<div class="col-md-9">
										<input type="email" name="emailid" id="emailid" placeholder="Email Address" class="form-control">
                                         
									</div>
								</div>
								
								<!-- Message body -->
								<div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Mobile Number</label>
									<div class="col-md-9">
										<input type="text" name="contactno" id="contactno" placeholder="Mobile Number" class="form-control">
                                        
                                        </div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Gender</label>
									<div class="col-md-9">
										<select name="gender" id="gender" class="form-control">
             <option value="">Select</option>
            <option value="Male">Male</option>
             <option value="Female">Female</option>
            </select>
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Pincode</label>
									<div class="col-md-9">
										<input type="text" name="pincode" id="pincode" placeholder="Pincode" class="form-control"/>
									</div>
								</div>
                                
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">City</label>
									<div class="col-md-9">
										<select name="city" id="city" class="form-control">
                                        <option value="">Select</option>
            <?php 
			$qry = "select * from location order by name asc";
			$qry1 = mysql_query($qry);
			while($qry2=mysql_fetch_array($qry1))
			{
			?>
             <option value="<?php echo $qry2['name'];?>"><?php echo $qry2['name'];?></option>
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
                       
                        					</div>
							</div>
							<div class="tab-pane fade" id="pilltab2"><div class="panel-heading" style="font-size: 18px; font-weight: 600; letter-spacing: 0.025em; height: 66px; line-height: 45px; color:#eb268f; text-align:center;">Confirmed Members</div>
								<div class="panel-body">
						<table data-toggle="table">
						    <thead>
						    <tr>
						      <th data-field="sno" data-sortable="true">S.No.</th>
						      <th data-field="businessname" data-sortable="true">Name</th>
                              <th data-field="businessname" data-sortable="true">Email ID</th>
						      <th data-field="emailid" data-sortable="true">Mobile</th>
                              <th data-field="contactno" data-sortable="true" >City</th>
						      <th data-field="category" data-sortable="true">Registration Date</th>
                              <th data-field="service" data-sortable="true">Confirmation Date</th>
						    </tr>
						    </thead>
                            <tbody>
                             <?php
$q="select * from members where referalid='".$username."' and confirmation='Yes' order by id desc";
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
	   		 <td style=""><?php echo $q3['name']; ?></td>
             <td style=""><?php echo $q3['emailid']; ?></td>
              <td style=""><?php echo $q3['contactno']; ?></td>
		     <td style=""><?php echo $q3['city']; ?></td>
	         <td style=""><?php echo $q3['registration_date']; ?></td> 
              <td style=""><?php echo $q3['confirmation_date']; ?></td> 
                
                            </tr>
                             <?php
  }
  }
  else
  {
  ?>
                        <tr class="no-records-found">
                        <td colspan="7">No Referral Member Found!</td></tr>
                        <?php
  }
  ?>
                    </tbody>
						</table>
					</div>
							</div>
							
                            
                            <div class="tab-pane fade" id="pilltab5"><div class="panel-heading" style="font-size: 18px; font-weight: 600; letter-spacing: 0.025em; height: 66px; line-height: 45px; color:#eb268f; text-align:center;">Not Confirmed Members</div>
								<div class="panel-body">
						<table data-toggle="table">
						    <thead>
						    <tr>
						      <th data-field="sno" data-sortable="true">S.No.</th>
						      <th data-field="businessname" data-sortable="true">Name</th>
                              <th data-field="businessname" data-sortable="true">Email ID</th>
						      <th data-field="emailid" data-sortable="true">Mobile</th>
                              <th data-field="contactno" data-sortable="true" >City</th>
						      <th data-field="category" data-sortable="true">Registration Date</th>
                              
						    </tr>
						    </thead>
                            <tbody>
                             <?php
$q="select * from members where referalid='".$username."' and confirmation='No' order by id desc";
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
	   		 <td style=""><?php echo $q3['name']; ?></td>
             <td style=""><?php echo $q3['emailid']; ?></td>
              <td style=""><?php echo $q3['contactno']; ?></td>
		     <td style=""><?php echo $q3['city']; ?></td>
	         <td style=""><?php echo $q3['registration_date']; ?></td> 
             
                            </tr>
                             <?php
  }
  }
  else
  {
  ?>
                        <tr class="no-records-found">
                        <td colspan="6">No Referral Member Found!</td></tr>
                        <?php
  }
  ?>
                    </tbody>
						</table>
					</div>
							</div>
                            
                            <div class="tab-pane fade" id="pilltab3"><div class="panel-heading" style="font-size: 18px; font-weight: 600; letter-spacing: 0.025em; height: 66px; line-height: 45px; color:#eb268f; text-align:center;">Total Members</div>
								<div class="panel-body">
						<table data-toggle="table">
						    <thead>
						    <tr>
						      <th data-field="sno" data-sortable="true">S.No.</th>
						      <th data-field="businessname" data-sortable="true">Name</th>
                              <th data-field="businessname" data-sortable="true">Email ID</th>
						      <th data-field="emailid" data-sortable="true">Mobile</th>
                              <th data-field="contactno" data-sortable="true" >City</th>
						      <th data-field="category" data-sortable="true">Registration Date</th>
                              
						    </tr>
						    </thead>
                            <tbody>
                             <?php
$q="select * from members where referalid='".$username."' order by id desc";
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
	   		 <td style=""><?php echo $q3['name']; ?></td>
             <td style=""><?php echo $q3['emailid']; ?></td>
              <td style=""><?php echo $q3['contactno']; ?></td>
		     <td style=""><?php echo $q3['city']; ?></td>
	         <td style=""><?php echo $q3['registration_date']; ?></td> 
             
                            </tr>
                             <?php
  }
  }
  else
  {
  ?>
                        <tr class="no-records-found">
                        <td colspan="6">No Referral Member Found!</td></tr>
                        <?php
  }
  ?>
                    </tbody>
						</table>
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
<!--<script src="js/jquery-2.1.4.js"></script> -->


</body>

</html>

