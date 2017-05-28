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
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Product | Beauty Spa</title>
<link rel="stylesheet" type="text/css" href="css/master.css">
<link rel="shortcut icon" href="images/heading-icon.png">


  
  
<!--<script src="js/jquery-2.1.1.min.js"></script>-->
<script src="js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

</head>

<body>
<!--Loader  -->

<!-- Back-To-Top -->
<div class="container"> 
  <a href="#" class="back-to-top text-center" style="display: inline;"> <i class="fa fa-angle-up"></i> </a> 
</div>


<!-- Header Starts -->
<?php include("topbar.php"); ?>

<!-- Header Ends --> 

<?php include("header.php"); ?>

<!-- Page Heading -->




<!-- Products -->
<section class="section_space">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>filters</h2>
						
						<div class="filterbody">
						<h6>Day & time</h6>
						<div class="day">
						<ul>
						<li><a href="#">M</a></li>
						<li><a href="#">T</a></li>
						<li><a href="#">W</a></li>
						<li><a href="#">T</a></li>
						<li><a href="#">F</a></li>
						<li><a href="#">S</a></li>
						<li><a href="#">S</a></li>
						</ul>
						</div>
						
						<div class="time">
						
 
        <input type="text" id="amount" readonly >
        <div id="slider-range"></div>
 
                        </div>
						</div>
						
						<div class="filterbody">
						<h6>Price</h6>
						  <input type="text" id="amount02" readonly>
        <div id="slider-range02"></div>
						
						<div class="time">
						</div>
						</div>
						
						
						<div class="filterbody">
						<h6>Ratings</h6>
						
						<select>
						<option>Any</option>
						<option>1+</option>
						<option>2+</option>
						<option>3+</option>
						<option>4+</option>
						</select>
						
						</div>
						
						<div class="filterbody">
						<h6>Gender</h6>
						
						<a href="#" class="gender male">M</a>
						<a href="#" class="gender female">F</a>
						
						</div>
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Packages Listing </h2>
						
						
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
                        <h4>Book Package</h4>
                        
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
                        
                       <button type="submit" id="submitform" class="btn-booking hvr-ripple-out">Book Now</button>
                       
                      
      </form>
      <script type="text/javascript">



$(document).ready(function()

{


	  
	  

    $('#customForm<?php echo $count; ?>').on('submit', function(e)

    {

        e.preventDefault();

           

        //show uploading message

        
		

        $(this).ajaxSubmit({

       

        success:  afterSuccess //call function after success

        });
		
		

    });

});

 

 function afterSuccess(value)



{

if(value == "Thanks for booking with us. Please check your email inbox or spambox. Our customer care executive will contact you soon!")

{

 
	 $('#modal-body').html(value);
 $('#myModal').modal('show');

		$('#customForm<?php echo $count; ?>').resetForm();




}
else if(value == "Please Login To Book Package!")
{

	 $('#modal-body').html(value);
 $('#myModal').modal('show');
		$('#customForm<?php echo $count; ?>').resetForm();
}
else if(value == "Please Select Package!")
{
	  $('#modal-body').html(value);
 $('#myModal').modal('show');
		$('#customForm<?php echo $count; ?>').resetForm();
}
else if(value == "You have already booked this Package. Please contact to our customer care to make payment and activate your package!")
{
	  $('#modal-body').html(value);
 $('#myModal').modal('show');
		$('#customForm<?php echo $count; ?>').resetForm();
}
else
{
$("#modal-body").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Saving...Please Wait</span>');
 
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
						
						
					</div><!--features_items-->
					
					
				</div>
			</div>
		</div>
	</section>
<!-- /#Products -->



<!-- Footer top -->
<?php include("footertop.php"); ?>
<!-- section -->


<?php include("footerbottom.php"); ?>


      
    </div>
  </div> 
</div>

<div class="modal fade" id="myModal" role="dialog" style="display:none">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
        <div class="large-heading">
        <h2><small>Book Package</small></h2>
        </div>
      </div>
        <div class="modal-body" id="modal-body">
          Please Book Your Package!
        </div>
        <div class="modal-footer">
          <button type="button" style="pointer-events: all; cursor: pointer;" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script> <!-- /owl slider all--> 
<script src="js/wow.min.js"></script>  
<script src="js/jquery.mixitup.min.js"></script>  
<script src="js/jquery-countTo.js"></script> 
<script src="js/jquery.appear.js"></script> 
<script src="js/jquery.fancybox.js"></script>
<!-- /logicsforest custom js --> 
<script src="js/custom-js.js"></script> 
 

</body>




</html>
