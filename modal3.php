<?php include("config.php");
$id=$_GET['id'];
$id=base64_decode($id);
function catname($a)
{
$q="select Name from Category where id='".$a."'";
$q1=mysql_query($q);
while($q2=mysql_fetch_array($q1))
{
$catname = $q2['Name'];
}
return $catname;
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap-3.3.7.min.css">
<script src="js/bootstrap-3.3.7.min.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>
  
 <script type="text/javascript" src="js/jquery.form.js"></script>
  
  
</head>
<body>
<li><a data-toggle="modal" href="#output1"><i class="fa fa-lock"></i> Login</a></li>
<div class="container">
  <h2>Modal Example</h2>
  <button type="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
  <!-- Trigger the modal with a button -->
 <div class="listingsection">
						
						
                        <?php
				$q="select * from listings where FIND_IN_SET($id, packages_mode) order by id asc";

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
                        	
                        
                        	<div class="listingbody">
						<div class="row">
						<div class="col-xs-12 col-sm-7 col-md-8">
						<div class="leftdiv">
						<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($q3['image']). ' " width="268px" height="250px"/>'; ?>
                        
                        <div class="ratings">
                         <i class="fa fa-star"></i>
                         <i class="fa fa-star"></i>
                         <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <span class="count">(11)</span>
                        </div>
						</div>
                        
                        <div class="rightdiv">
                        <h4 class="saloonname"><?php echo $q3['companyname']; ?></h4>
                        
                        <div class="saloontype"><i class="fa fa-users"></i><?php echo catname($q3['cat_id']); ?></div>
                        <div class="saloonaddress"><i class="fa fa-map-marker"></i> <?php echo $q3['building'];?>&nbsp;<?php echo $q3['street'];?>&nbsp;<?php echo $q3['landmark'];?>&nbsp;<?php echo $q3['area'];?>&nbsp;<?php echo $q3['city'];?>&nbsp;<?php echo $q3['pincode'];?></div>
                        <div class="saloondistance"><i class="fa fa-location-arrow"></i> <?php echo $q3['contactperson']; ?></div>
                        <?php 
						if($q3['listing_type'] != 'Free')
						{
						?>
                        <div class="saloontiming"><i class="fa fa-clock-o"></i> <?php echo $q3['emailid']; ?></div>
                        <div class="saloontiming"><i class="fa fa-clock-o"></i> <?php echo $q3['contactno']; ?></div>
                        <?php
						}
						?>
                         
                        <div class="saloonfacility">
                        <ul>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Air-Conditioned">AC</a></li>
                         <li><a href="#" data-toggle="tooltip" data-placement="top" title="Salon accepts Credit Cards"><i class="fa fa-credit-card"></i></a></li>
                          <li><a href="#" data-toggle="tooltip" data-placement="top" title="Salon has Wi-Fi for its customers">
                          <i class="fa fa-wifi"></i></a></li>
                         
                         
                        </ul>
                        </div>
                        </div>
						</div>
						<div class="col-xs-12 col-sm-5 col-md-4">
                        <div class="appointment">
                        <h4>Book Appointment</h4>
                        
                        <form name="customForm<?php echo $count; ?>" id="customForm<?php echo $count; ?>" method="post" action="book_package.php" data-rank="<?php echo $count; ?>">
                        <div class="step01">
                        
                        <select name="package" id="package">
                        <option value="">Select a package</option>
                       <?php
					   $packages_mode = explode(',', $q3['packages_mode']);
    foreach($packages_mode as $name) { ?>
      <option value="<?php echo $name['packages_mode']; ?>"><?php echo packagesname($name['packages_mode']); ?></option>
  <?php
    } ?>
                        </select>
                        
                        </div>
                        <!--<div class="step02">
                        <select class="date">
                        <option>Date</option>
                        <option>DD/MM/YY</option>
                       
                        </select>
                        
                        
                        <select class="time">
                        <option>Time</option>
                        <option>10:30 AM</option>
                        </select>
                        </div>-->
                       <button type="submit" id="submitform" class="btn-booking hvr-ripple-out">Book Now</button>
                       
                       <!-- Modal -->
  


                      
                       <!--<div id="output<?php echo $count; ?>" title="Basic dialog" style="display:none" class="output"></div>-->
                       <!--<div id="output<?php //echo $count; ?>" class="output hide" role="dialog"></div> -->
                       <!-- <a class="btn-booking hvr-ripple-out" href="#" >
       Book Now
      </a>-->
      </form>
      <script type="text/javascript">



$(document).ready(function()

{


	  
	  

    $('#customForm<?php echo $count; ?>').on('submit', function(e)

    {

        e.preventDefault();

           

        //show uploading message

        
		

        $(this).ajaxSubmit({

        <!--target: '#output<?php echo $count; ?>',-->

        success:  afterSuccess //call function after success

        });
		
		

    });

});

 

 function afterSuccess(value)



{

if(value == "Thanks for booking with us. Please check your email inbox or spambox. Our customer care executive will contact you soon!")

{

 //$("#output<?php //echo $count; ?>").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Saving...Please Wait</span>');
 //$("#output<?php //echo $count; ?>").html(value);
    //$("#output<?php //echo $count; ?>").dialog();
	 $('#modal-body').html(value);
 $('#myModal').modal('show');

		$('#customForm<?php echo $count; ?>').resetForm();




}
if(value == "Please Login To Book Package!")
{
	 $('#modal-body').html(value);
 $('#myModal').modal('show');
		$('#customForm<?php echo $count; ?>').resetForm();
}
if(value == "Please Select Package!")
{
	 $('#modal-body').html(value);
 $('#myModal').modal('show');
		$('#customForm<?php echo $count; ?>').resetForm();
}
if(value == "You have already booked this Package. Please contact to our customer care to make payment and activate your package!")
{
	 $('#modal-body').html(value);
 $('#myModal').modal('show');
		$('#customForm<?php echo $count; ?>').resetForm();
}


}

</script>
                        </div>
                        </div>
						</div>
						</div>
                        <?php
						}
						}
						?>
                        	
						</div>
</div>
<div class="modal fade" id="myModal" role="dialog" style="display:none">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Book Appointment</h4>
        </div>
        <div class="modal-body" id="modal-body">
          Please Book Your Appointment.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</body>
</html>
