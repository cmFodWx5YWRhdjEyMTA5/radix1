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
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Product | Beauty Spa</title>
<link rel="stylesheet" type="text/css" href="css/master.css">
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link rel="shortcut icon" href="images/heading-icon.png">
</head>

<body>
<!--Loader  -->
<div class="loader">
  <div class="loading">
    <span>L</span><span>o</span><span>a</span><span>d</span><span>i</span><span>n</span><span>g</span>
  </div>
</div>
<!-- Back-To-Top -->
<div class="container"> 
  <a href="#" class="back-to-top text-center" style="display: inline;"> <i class="fa fa-angle-up"></i> </a> 
</div>


<!-- Header Starts -->
<?php include("topbar.php"); ?>

<!-- Header Ends --> 

<?php include("header.php"); ?>

<!-- Page Heading -->
<section id="page-heading">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h4>Spa Products listing</h4>
      </div>
      <div class="col-md-6 text-right"> 
      	<a href="index.html">Home <i class="fa fa-angle-double-right"></i></a> <span>Spa Products listing</span> 
      </div>
    </div>
  </div>
</section>



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
						<h2 class="title text-center">Listing page</h2>
						
						
						<div class="listingsection">
						
						
                        <?php
				$q="select * from listings where FIND_IN_SET($id, services_mode) order by id asc";

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
                        <div class="saloontiming"><i class="fa fa-clock-o"></i> <?php echo $q3['emailid']; ?></div>
                        <div class="saloontiming"><i class="fa fa-clock-o"></i> <?php echo $q3['contactno']; ?></div>
                         
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
                        
                       <form name="customForm" id="customForm" method="post" action="book_package.php">
                        <div class="step01">
                        
                        <select>
                        <option>Select a package</option>
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
                       <button type="submit" id="submitform" class="btn-booking hvr-ripple-out">Book Now</button><span id="output" class="output"></span> 
                       <!-- <a class="btn-booking hvr-ripple-out" href="#" >
       Book Now
      </a>-->
      </form>              </div>
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

<div class='modal fade' id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
        <div class="large-heading">
        <h2>Make an <small>Apppointment</small></h2>
        </div>
      </div>
      <form  method="post" action="include/form/sendemail.php" class="form floating-labels" id="modal-mail-form" data-toggle="validator" novalidate>
        <div class="modal-notice">
          <div id="contact-form-result"></div>
        </div>
        <div id="template-contactform" class="modal-body">
          <div class="row bottom-10">
            <div class="col-md-6 form-group">
              <div class="icon">
                <label for="modalname" class="cd-label">Name</label>
                <input type="text" value="" required id="modalname" name="modalname" class="user form-control">
              </div>
            </div>
            <div class="col-md-6 form-group">
              <div class="icon">
                <label for="modalemail" class="cd-label">Email</label>
                <input type="text" required id="modalemail" name="modalemail" class="user form-control">
              </div>
            </div>
          </div>
          <div class="row bottom-10">
            <div class="col-md-6 form-group">
              <div class="icon">
                <label for="modalphone" class="cd-label">Phone</label>
                <input type="text" id="modalphone" name="modalphone" class="user form-control">
              </div>
            </div>
            <div class="col-md-6 form-group">
              <div class="icon">
                <label for="modaltime" class="cd-label">Date Time</label>
                <input type="text" required  class="user form-control">
              </div>
            </div>
          </div>
          <div class="row bottom-20">
            <div class="col-md-12">
              <div class="icon">
                <label class="cd-labe2">Service</label>
                <ul class="cd-form-list inline">
                <li>
                <input type="checkbox" id="cd-checkbox-1" class="form-control">
                <label for="cd-checkbox-1">Option 1</label>
                </li>
                <li>
                <input type="checkbox" id="cd-checkbox-2" class="form-control">
                <label for="cd-checkbox-2">Option 2</label>
                </li>
                <li>
                <input type="checkbox" id="cd-checkbox-3" class="form-control">
                <label for="cd-checkbox-3">Option 3</label>
                </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="bottom-20 form-group">
            <label for="modal-content" class="cd-label">Note</label>
            <textarea id="modal-content" name="content" class="small"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <input type="text" class="hidden form-control" value="" name="template-contactform-botcheck" id="template-contactform-botcheck">
          <button type="submit" style="pointer-events: all; cursor: pointer;">Book an Apppointment</button>
        </div>
      </form>
    </div>
  </div> 
</div>


<script src="js/jquery-2.1.4.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> <!-- /owl slider all--> 
<script src="js/wow.min.js"></script>  
<script src="js/jquery.mixitup.min.js"></script>  
<script src="js/jquery-countTo.js"></script> 
<script src="js/jquery.appear.js"></script> 
<script src="js/jquery.fancybox.js"></script>
<!-- /logicsforest custom js --> 
<script src="js/custom-js.js"></script> 
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
 $( function() {
		$( "#slider-range" ).slider({
			range: true,
			min: 1,
			max: 12,
			values: [ 1, 10 ],
			slide: function( event, ui ) {
				$( "#amount" ).val( "AM" + ui.values[ 0 ] + " - PM " + ui.values[ 1 ] );
			}
		});
		$( "#amount" ).val( "AM" + $( " #slider-range" ).slider( "values", 0 ) +
			" - PM " + $( "#slider-range" ).slider( "values", 1 ) );
	} );
	
	
	$( function() {
		$( "#slider-range02" ).slider({
			range: true,
			min: 0,
			max: 5000,
			values: [ 0, 3000 ],
			slide: function( event, ui ) {
				$( "#amount02" ).val( "rs" + ui.values[ 0 ] + " - rs" + ui.values[ 1 ] );
			}
		});
		$( "#amount02" ).val( "rs" + $( "#slider-range" ).slider( "values", 0 ) +
			" - rs" + $( "#slider-range" ).slider( "values", 1 ) );
	} );
  </script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>

</body>




</html>
