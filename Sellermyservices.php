<?php
include_once("config.php");
include_once("check.php");
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
$viewsql="SELECT * FROM Services WHERE viewstatus=0 and sellerid='".$username."'";
$viewsql1=mysql_query($viewsql);
$viewsqlcount=mysql_num_rows($viewsql1);
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
<script src="js/jquery-1.11.1.min.js"></script>
<!--<script src="js/jquery-1.8.0.min.js"></script>-->
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript">



$(document).ready(function()

{
$('#addpackagecustomForm').on('submit', function(e)
    {
        e.preventDefault();
        $("#addpackageoutput").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Saving...Please Wait</span>');
		$(this).ajaxSubmit({
		target: '#addpackageoutput',
        success: afterSuccessaddservice //call function after success
        });
	    });
		
		$('#confirmserviceForm').on('submit', function(e)
    {
        e.preventDefault();
        $("#confirmcodemessage").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Checking...Please Wait</span>');
		$(this).ajaxSubmit({
		target: '#confirmcodemessage',
        success: afterconfirmcodemessage //call function after success
        });
	    });
		
		function afterSuccessaddservice(value)
	{
	if(value == "Saved")
	{
	//$viewsqlcount = $viewsqlcount+1;
	var viewsqlcount = Number(document.getElementById("notification-count").innerHTML);
	viewsqlcount = viewsqlcount +1;
	document.getElementById("notification-count").innerHTML = viewsqlcount;
	document.getElementById("addpackagecustomForm").reset();
	}
	}
	
	function afterconfirmcodemessage(value)
	{
	if(value == "Confirmed Service!")
	{
	window.location.reload();
	}
	else
	{
	document.getElementById("confirmserviceForm").reset();
	}
	}

	

});

function loaddata()
{

var name = document.getElementById("sellerid").value;
	//alert(name);
  if(name)
 {
  $.ajax({
  type: 'post',
  url: 'loadservicelist.php',
  data: {
   user_name:name,
  },
  success: function (response) {
   // We get the element having id of display_info and put the response inside it
   //$( '#loadservicedata' ).html(name);
   document.getElementById("loadservicedata").innerHTML = response;
   var viewsqlcount = Number(document.getElementById("notification-count").innerHTML);
	viewsqlcount = '';
	document.getElementById("notification-count").innerHTML = viewsqlcount;
	
  }
  });
 }
	
/* else
 {
  $( '#display_info' ).html("Please Enter Some Words");
 }*/
}
	
</script>
<style>
#notification-count {
    position: absolute;
    left: 40px;
    top: 0px;
    font-size: 1em;
    color: red;
    font-weight: bold;
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
                            <li class=""><a href="#pilltab2" data-toggle="tab" onClick="loaddata();">List</a><span id="notification-count"><?php if($viewsqlcount>0) { echo $viewsqlcount; } ?></span></li>
							<li class=""><a href="#pilltab3" data-toggle="tab">Booked</a></li>
							
                        </ul>
		
						<div class="tab-content">
							<div class="tab-pane fade active in" id="pilltab1">
							  <div class="panel-heading" style="font-size: 18px; font-weight: 600; letter-spacing: 0.025em; height: 66px; line-height: 45px; color:#eb268f; text-align:center;">Add Service</div>
								<div class="panel-body">
                                 		<form class="form-horizontal" name="addpackagecustomForm" id="addpackagecustomForm" method="post" action="save_services.php" enctype="multipart/form-data">
                                        
                                        <input type="hidden" id="sellerid" name="sellerid" class="form-control" value="<?php echo base64_encode($username); ?>">
                       							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name" style="color:#eb268f;">Service Name</label>
									<div class="col-md-9">
									<input type="text" id="category" name="category" placeholder="Service" class="form-control">
                                    
									</div>
								</div>
							
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email" style="color:#eb268f;">Price</label>
									<div class="col-md-9">
										<input type="text" id="price" name="price" class="form-control" placeholder="Price">
                                         
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="email" style="color:#eb268f;">Description</label>
									<div class="col-md-9">
										<textarea name="desc" id="desc" placeholder="Description" class="form-control" rows="5"></textarea>
                                         
									</div>
								</div>
							
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" id="submitform" class="btn-booking hvr-ripple-out" style="float:right;">Save</button><span id="addpackageoutput" class="output" style="float:right; padding-top:8px; padding-right:15px;"></span>
                                        </div>
								</div>
							</fieldset>
						</form>
                        
                        					</div>
							</div>
							<div class="tab-pane fade" id="pilltab2"><div class="panel-heading" style="font-size: 18px; font-weight: 600; letter-spacing: 0.025em; height: 66px; line-height: 45px; color:#eb268f; text-align:center;">Service List</div>
                            <div class="panel-body">
						<table data-toggle="table">
						    <thead>
						    <tr>
						       <th data-field="sno" data-sortable="true">S.No.</th>
						        <th data-field="businessname" data-sortable="true">Date</th>
						        <th data-field="contactperson"  data-sortable="true">Time</th>
						        <th data-field="emailid" data-sortable="true">Name</th>
                                <th data-field="contactno" data-sortable="true" >View/Edit</th>
						        <th data-field="category" data-sortable="true">Delete</th>
						        
						    </tr>
						    </thead>
                            <tbody id="loadservicedata">
                             <?php

  $q="select * from Services where sellerid='".$username."' order by id desc";

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
	   		 <td style=""><?php echo $q3['creationdate']; ?></td>
              <td style=""><?php echo $q3['creationtime']; ?></td>
		     <td style=""><?php echo $q3['Name']; ?></td>
	         <td style=""><a href="editSellermyservices.php?id=<?php echo base64_encode($q3['id']);?>">View/Edit</a></td>
             <td style=""><a href="deleteSellermyservices.php?id=<?php echo base64_encode($q3['id']);?>">Delete</a></td>  
                            </tr>
                             <?php
  }
  }
  else
  {
  ?>
                        <tr class="no-records-found">
                        <td colspan="6">You have not added any Service Yet!</td></tr>
                        <?php
  }
  ?>
                    </tbody>
						</table>
					</div>
								
							</div>
                            <div class="tab-pane fade" id="pilltab3"><div class="panel-heading" style="font-size: 18px; font-weight: 600; letter-spacing: 0.025em; height: 66px; line-height: 45px; color:#eb268f; text-align:center;">Booked Services</div>
                            <div class="panel-body">
						<table data-toggle="table">
						    <thead>
						    <tr>
						      <th data-field="sno" data-sortable="true">S.No.</th>
						      <th data-field="businessname" data-sortable="true">Date</th>
                              <th data-field="businessname" data-sortable="true">Time</th>
						      <th data-field="emailid" data-sortable="true">Name</th>
                              <th data-field="contactno" data-sortable="true" >Amount</th>
						      <th data-field="category" data-sortable="true">Customer Name</th>
                              <th data-field="service" data-sortable="true">Confirm Service</th>
						        
						    </tr>
						    </thead>
                            <tbody>
                             <?php

  $q="select * from confirmbook_package where service_type='Service' and selleremail='".$username."' order by id asc";

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
	         <td style=""><?php echo $q3['firstname']; ?></td> 
              <td style=""><?php if($q3['usedstatus'] == 'Yes') { echo "Confirmed";} else { ?><a data-toggle="modal" href="#ServiceConfirmModal">Confirm</a><?php } ?></td> 
                
                            </tr>
                             <?php
  }
  }
  else
  {
  ?>
                        <tr class="no-records-found">
                        <td colspan="7">No Service Booking Found!</td></tr>
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
<?php include("footertop.php"); ?>
<?php include("footerbottom.php"); ?> 
<div class='modal fade' id="ServiceConfirmModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">&#10006 </span></button>
        <div class="large-heading">
        <h2><small>Confirm Service!</small></h2>
        </div>
      </div>
      <form method="post" action="confirmservice.php" class="form floating-labels" id="confirmserviceForm" name="confirmserviceForm" role="form" data-toggle="validator" novalidate>
     
        <div class="modal-notice">
          <div id="contact-form-result"></div>
        </div>
        <div id="template-contactform" class="modal-body">
          <div class="row bottom-10">
            <div class="col-md-6 form-group">
              <div class="icon">
                <label for="Username" class="cd-label">Service Code</label>
                <input placeholder="Service Code" name="servicecode" id="servicecode" type="text" required class="user form-control"/>
              </div>
            </div>
            
          </div>
          
          </div>
        <div class="modal-footer">
         <button type="submit" style="pointer-events: all; cursor: pointer;" id="confirmcode" name="confirmcode">Confirm</button><span id="confirmcodemessage" class="message" style="padding-left:20px;"></span>
        </div>
      </form>
    </div>
  </div> 
</div>


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

