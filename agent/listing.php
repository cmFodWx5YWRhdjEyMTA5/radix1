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
<link href="css/bootstrap-table.css" rel="stylesheet">

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
	
	    
});
function afterSuccess(value)
{
if(value == "Saved!")
{
$('#customForm').resetForm();
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
				<li class="active">Business Listings</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					
					<div class="panel-body tabs">
					
						<ul class="nav nav-pills">
							<li class="active"><a href="#pilltab1" data-toggle="tab">Add</a></li>
							<li><a href="#pilltab2" data-toggle="tab">Not Confirmed</a></li>
							<li><a href="#pilltab3" data-toggle="tab">Confirmed/Non Active</a></li>
                            <li><a href="#pilltab4" data-toggle="tab">Active</a></li>
                            <li><a href="#pilltab5" data-toggle="tab">Total</a></li>
						</ul>
		
						<div class="tab-content">
							<div class="tab-pane fade active in" id="pilltab1">
                            <div class="alert bg-warning" role="alert">
					<svg class="glyph stroked flag"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-flag"></use></svg> You can add a new Salon, Spa and Gym business account from this panel. If you need any help you can Call/Whatsapp to Radix Beauty Group between 8 am to 12 pm. </div>
                            								<div class="panel-body">
                               	<form class="form-horizontal" name="customForm" id="customForm" method="post" action="save_listing.php" enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id" placeholder="id" value="<?php echo $id;?>" />
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Company Name</label>
									<div class="col-md-9">
									<input type="text" id="companyname" name="companyname" placeholder="Company Name" class="form-control" autofocus="">
									</div>
								</div>
							
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Contact Person</label>
									<div class="col-md-9">
										<input type="text" id="contactperson" name="contactperson" placeholder="Contact Person" class="form-control" />
									</div>
								</div>
								
								<!-- Message body -->
								<div class="form-group">
									<label class="col-md-3 control-label" for="message">Mobile</label>
									<div class="col-md-9">
										<input type="text" id="contactno" name="contactno" placeholder="Mobile" class="form-control">
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message">Email ID</label>
									<div class="col-md-9">
										<input type="text" id="emailid" name="emailid" placeholder="Email ID" class="form-control">
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message">Password</label>
									<div class="col-md-9">
										<input type="password" id="password" name="password" placeholder="Password" class="form-control">
									</div>
								</div>
                                
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message">Website</label>
									<div class="col-md-9">
										<input type="text" id="website" name="website" placeholder="Website" class="form-control">
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message">Building</label>
									<div class="col-md-9">
										<input type="text" id="building" name="building" placeholder="Building" class="form-control">
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message">Street</label>
									<div class="col-md-9">
										<input type="text" id="street" name="street" placeholder="Street" class="form-control">
									</div>
								</div>
                                
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message">Landmark</label>
									<div class="col-md-9">
										<input type="text" id="landmark" name="landmark" placeholder="Landmark" class="form-control">
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="message">Area</label>
									<div class="col-md-9">
										<input type="text" id="area" name="area" placeholder="Area" class="form-control">
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="col-md-3 control-label" for="name">Pin Code </label>
									<div class="col-md-9">
									<input type="text" id="pincode" name="pincode" placeholder="Pin Code" class="form-control">
									</div>
								</div>
							
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">City</label>
									<div class="col-md-9">
										<select id="city" name="city" class="form-control">



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
</select>
									</div>
								</div>
								
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message">Category</label>
									<div class="col-md-9">
										<select id="cat" name="cat" class="form-control">



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
</select>
									</div>
								</div>
                                
                                 <div class="form-group">
									<label class="col-md-3 control-label" for="message">Description</label>
									<div class="col-md-9">
										<textarea name="desc" id="desc" placeholder="Description" class="form-control" rows="5"></textarea>
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
                       
					</div>
							</div>
							<div class="tab-pane fade" id="pilltab2"><div class="alert bg-warning" role="alert">
					<svg class="glyph stroked flag"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-flag"></use></svg>List of business accounts not confirmed by business itself. Please contact and ask them to confirm their accounts by clicking on the link given in the Radix Beauty Registration Email. </div>
                    
                    <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table data-toggle="table">
						    <thead>
						    <tr>
						       <th data-field="sno" data-sortable="true">S.No.</th>
						        <th data-field="businessname" data-sortable="true">Business Name</th>
						        <th data-field="contactperson"  data-sortable="true">Contact Person</th>
						        <th data-field="emailid" data-sortable="true">Email Id</th>
                                <th data-field="contactno" data-sortable="true" >Contact No</th>
						        <th data-field="category" data-sortable="true">Category</th>
						        <th data-field="registrationdate"  data-sortable="true">Registration Date</th>
						    </tr>
						    </thead>
                            <tbody>
                            <?php

  $q="select * from listings where createdby='".$username."' and  confirmation='No' order by id desc";

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
	   		 <td style=""><?php echo $q3['companyname']; ?></td>
              <td style=""><?php echo $q3['contactperson']; ?></td>
		     <td style=""><?php echo $q3['emailid']; ?></td>
	         <td style=""><?php echo $q3['contactno']; ?></td> 
             <td style=""><?php $r=mysql_query("select Name from Category where id='".$q3['cat_id']."'");

	while($r1=mysql_fetch_array($r))

	{

	echo $r1['Name'];

	}  ?></td>
   
	      
             <td style=""><?php echo $q3['creationdate']; ?></td>
		    
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
								
							</div>
							<div class="tab-pane fade" id="pilltab3"><div class="alert bg-warning" role="alert">
					<svg class="glyph stroked flag"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-flag"></use></svg>List of business accounts confirmed by business but not active by Radix Beauty Administrator. Please contact Radix Beauty Administrator through Call/Whatsapp group to activate business accounts. </div>
                    
                    <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table data-toggle="table">
						    <thead>
						    <tr>
						       <th data-field="sno" data-sortable="true">S.No.</th>
						        <th data-field="businessname" data-sortable="true">Business Name</th>
						        <th data-field="contactperson"  data-sortable="true">Contact Person</th>
						        <th data-field="emailid" data-sortable="true">Email Id</th>
                                <th data-field="contactno" data-sortable="true" >Contact No</th>
						        <th data-field="category" data-sortable="true">Category</th>
						        <th data-field="registrationdate"  data-sortable="true">Registration Date</th>
						    </tr>
						    </thead>
                            <tbody>
                            <?php

  $q="select * from listings where createdby='".$username."' and confirmation='Yes' and active='No' order by id desc";

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
	   		 <td style=""><?php echo $q3['companyname']; ?></td>
              <td style=""><?php echo $q3['contactperson']; ?></td>
		     <td style=""><?php echo $q3['emailid']; ?></td>
	         <td style=""><?php echo $q3['contactno']; ?></td> 
             <td style=""><?php $r=mysql_query("select Name from Category where id='".$q3['cat_id']."'");

	while($r1=mysql_fetch_array($r))

	{

	echo $r1['Name'];

	}  ?></td>
   
	      
             <td style=""><?php echo $q3['creationdate']; ?></td>
		    
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
								
							</div>
                            <div class="tab-pane fade" id="pilltab4"><div class="alert bg-warning" role="alert">
					<svg class="glyph stroked flag"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-flag"></use></svg>List of business accounts activated by Radix Beauty Administrator. Your earnings will be calculated on the basis of activated business accounts every month and will be paid to you.</div>
                    
                    <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table data-toggle="table">
						    <thead>
						    <tr>
						       <th data-field="sno" data-sortable="true">S.No.</th>
						        <th data-field="businessname" data-sortable="true">Business Name</th>
						        <th data-field="contactperson"  data-sortable="true">Contact Person</th>
						        <th data-field="emailid" data-sortable="true">Email Id</th>
                                <th data-field="contactno" data-sortable="true" >Contact No</th>
						        <th data-field="category" data-sortable="true">Category</th>
						        <th data-field="registrationdate"  data-sortable="true">Registration Date</th>
						    </tr>
						    </thead>
                            <tbody>
                            <?php

  $q="select * from listings where createdby='".$username."' and confirmation='Yes' and active='Yes' order by id desc";

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
	   		 <td style=""><?php echo $q3['companyname']; ?></td>
              <td style=""><?php echo $q3['contactperson']; ?></td>
		     <td style=""><?php echo $q3['emailid']; ?></td>
	         <td style=""><?php echo $q3['contactno']; ?></td> 
             <td style=""><?php $r=mysql_query("select Name from Category where id='".$q3['cat_id']."'");

	while($r1=mysql_fetch_array($r))

	{

	echo $r1['Name'];

	}  ?></td>
   
	      
             <td style=""><?php echo $q3['creationdate']; ?></td>
		    
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
								
							</div>
                            <div class="tab-pane fade" id="pilltab5"><div class="alert bg-warning" role="alert">
					<svg class="glyph stroked flag"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-flag"></use></svg>List of total business accounts added by you on Radix Beauty Search Engine.</div>
                    
                    <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table data-toggle="table">
						    <thead>
						    <tr>
						       <th data-field="sno" data-sortable="true">S.No.</th>
						        <th data-field="businessname" data-sortable="true">Business Name</th>
						        <th data-field="contactperson"  data-sortable="true">Contact Person</th>
						        <th data-field="emailid" data-sortable="true">Email Id</th>
                                <th data-field="contactno" data-sortable="true" >Contact No</th>
						        <th data-field="category" data-sortable="true">Category</th>
						        <th data-field="registrationdate"  data-sortable="true">Registration Date</th>
						    </tr>
						    </thead>
                            <tbody>
                            <?php

  $q="select * from listings where createdby='".$username."' and confirmation='Yes' and active='Yes' order by id desc";

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
	   		 <td style=""><?php echo $q3['companyname']; ?></td>
              <td style=""><?php echo $q3['contactperson']; ?></td>
		     <td style=""><?php echo $q3['emailid']; ?></td>
	         <td style=""><?php echo $q3['contactno']; ?></td> 
             <td style=""><?php $r=mysql_query("select Name from Category where id='".$q3['cat_id']."'");

	while($r1=mysql_fetch_array($r))

	{

	echo $r1['Name'];

	}  ?></td>
   
	      
             <td style=""><?php echo $q3['creationdate']; ?></td>
		    
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
    <script src="js/bootstrap-table.js"></script>
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
