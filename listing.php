<?php include("config.php");
$id=$_GET['id'];
$id=base64_decode($id);
$date = date("Y-m-d");
$day = date("l");
date_default_timezone_set("Asia/Kolkata");

function catcount($a)
{
if($a=='all')
{
$q="select * from listings where active='Yes' and confirmation='Yes'";
}
else
{
$q="select * from listings where cat_id='".$a."' and active='Yes' and confirmation='Yes'";
}

$q1=mysql_query($q);
$countcat = mysql_num_rows($q1);
return $countcat;
}
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
function cityname($a)
{
$q="select name from location where id='".$a."'";
$q1=mysql_query($q);
while($q2=mysql_fetch_array($q1))
{
$cityname = $q2['name'];
}
return $cityname;
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

function get_minutes ( $start, $end ) {  

   while ( strtotime($start) <= strtotime($end) ) {  
       $minutes[] = date("H:i:s", strtotime( "$start" ) );  
       $start = date("H:i:s", strtotime( "$start + 15 mins")) ;      
   }  
   return $minutes;  
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
<script src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/radix.js"></script>
<?php include("analyticstracking.php") ?>

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
                    <div class="brands_products"><!--brands_products-->
							<h2>Search</h2>
							<div class="brands-name"><form name="form1" method="get" action="../search_listing.php">
                     <div class="input-group">
                        <input type="text" name="search" id="search" placeholder="Search Anything...." class="form-control" style="border-radius: 0;background: #fff;border: none;height: 40px;border: 1px solid #eb268f;">
 <span class="input-group-btn">
                        <input type="submit" name="submit" value="Search" class="btn searchbtn" style="border: none;background: #eb268f;color: #fff;height: 40px;padding: 0 25px;/* width: 100px; */">
                        </span>
                     </div>
                  </form>
								
							</div>
						</div>
          <h2>Category</h2>
          <div class="panel-group category-products" id="accordian"><!--category-productsr-->
          <?php
		  $vv = "select * from Category";
		  $vv1 = mysql_query($vv);
		  while($vv2=mysql_fetch_array($vv1))
		  {
		  ?>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"><a href="listing.php?id=<?php echo base64_encode($vv2['id']);?>"><?php echo $vv2['Name'];?>&nbsp;(<?php echo catcount($vv2['id']); ?>)</a></h4>
              </div>
            </div>
            <?php
			}
			?>
             <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"><a href="listing.php?id=<?php echo base64_encode('all'); ?>">See All&nbsp;(<?php echo catcount('all'); ?>)</a></h4>
              </div>
            </div>
            
          </div>
          
        </div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                    <?php
					if($id=='all')
						{
						$q="select * from listings where confirmation='Yes' and active='Yes' ORDER BY RAND()";
						}
						else
						{
						$q="select * from listings where cat_id='".$id."' and active='Yes' and confirmation='Yes' ORDER BY RAND()";
						}
				

  $q1=mysql_query($q);

  $q2=mysql_num_rows($q1);
					?>
						<h2 class="title text-center">Found <?php echo $q2; ?> results for <?php if($id=='all') { echo "All Listings"; } else { echo catname($id); } ?> </h2>
						
						
						<div class="listingsection">
						
						
                        <?php
						

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
						<?php 
						if($q3['image'] != '')
						{
						echo '<img src="data:image/jpeg;base64,'.base64_encode($q3['image']). ' " width="268px" height="250px"/>'; 
						}
						else
						{
						?>
                        <img src="images/noimage.png" width="268px" height="250px">
						<?php
						}
						?>
                        
                        
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
                         <h4 class="saloonname"><a href="listingdetails.php?id=<?php echo base64_encode($q3['id']); ?>"><?php echo ucwords($q3['companyname']); ?></a></h4>
                        
                        <div class="saloontype"><i class="fa fa-list"></i><?php echo catname($q3['cat_id']); ?></div>
                        <div class="saloonaddress"><i class="fa fa-map-marker"></i> <?php echo $q3['building'];?>&nbsp;<?php echo $q3['street'];?>&nbsp;<?php echo $q3['landmark'];?>&nbsp;<?php echo $q3['area'];?>&nbsp;<?php echo cityname($q3['city']);?>&nbsp;<?php echo $q3['pincode'];?></div>
                        <div class="saloondistance"><i class="fa fa-location-arrow"></i> <?php echo $q3['contactperson']; ?></div>
                        <?php 
						if($q3['listing_type'] != 'Free')
						{
						?>
                        <!--<div class="saloontiming"><i class="fa fa-clock-o"></i> <?php //echo $q3['emailid']; ?></div>
                        <div class="saloontiming"><i class="fa fa-clock-o"></i> <?php //echo $q3['contactno']; ?></div>-->
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
                         <?php
session_set_cookie_params(3600);

session_start();


$username = $_SESSION['username'];
$usertype = $_SESSION['usertype'];
if(isset($usertype) and ($usertype == 'seller' or $usertype == 'agent' or $usertype == 'admin') )
{
}
else
{
	?>
                        <div class="appointment">
                        <h4>Book Service</h4>
                        
                        <form name="customForm<?php echo $count; ?>" id="customForm<?php echo $count; ?>" method="post" action="book_service.php" data-rank="<?php echo $count; ?>">
                        <div class="step01">
                        
                        <select name="package" id="package">
                        <option value="">Select a Service</option>
                       <?php
					   $query="select * from Services where sellerid='".$q3['emailid']."'";
					   $query1=mysql_query($query);
					   $query2=mysql_num_rows($query1);
					   if($query2 > 0)
					   {
					   while($query3=mysql_fetch_array($query1))
					   {
					    ?>
      <option value="<?php echo $query3['id']; ?>"><?php echo $query3['Name']; ?> ( <?php echo $query3['price']; ?> )</option>
  <?php
    }
	} ?>
                        </select>
                        </div>
                        <div class="step02">
                        <select class="date" name="packagebooking_date" id="packagebooking_date">
                        <option value="">Date</option>
                        <?php
						$date_format = strtotime($date);
$date_format = date('d-m-Y', $date_format); 
						for($i=0; $i<=7; $i++)
						{
						
$newDate = date("d-m-Y",strtotime($date_format."$i day"));

						?>
                        <option value="<?php echo $newDate; ?>"><?php 
echo $newDate; ?></option>
                       <?php
					   }
					   ?>
                        </select>
                        
                        
                        <select class="time" name="packagebooking_time" id="packagebooking_time">
                        <option value="">Time</option>
                        <?php
						if($day=='Monday')
{
$mondayfrom=$q3['mondayfrom'];
$mondayto=$q3['mondayto'];
if($mondayfrom == '00:00:00' || $mondayto == '00:00:00')
{
$minute = 'Close';
}
else
{
$minutes = get_minutes($mondayfrom, $mondayto);  
}

}

else if($day=='Tuesday')
{
$tuesdayfrom=$q3['tuesdayfrom'];
$tuesdayto=$q3['tuesdayto'];
if($tuesdayfrom == '00:00:00' || $tuesdayto == '00:00:00')
{
$minute = 'Close';
}
else
{
$minutes = get_minutes($tuesdayfrom, $tuesdayto);  
}

}
else if($day=='Wednesday')
{
$wednesdayfrom=$q3['wednesdayfrom'];
$wednesdayto=$q3['wednesdayto'];
if($wednesdayfrom == '00:00:00' || $wednesdayto == '00:00:00')
{
$minute = 'Close';
}
else
{
$minutes = get_minutes($wednesdayfrom, $wednesdayto);  
}

}
else if($day=='Thursday')
{
$thursdayfrom=$q3['thursdayfrom'];
$thursdayto=$q3['thursdayto'];
if($thursdayfrom == '00:00:00' || $thursdayto == '00:00:00')
{
$minute = 'Close';
}
else
{
$minutes = get_minutes($thursdayfrom, $thursdayto);  
}

}
else if($day=='Friday')
{
$fridayfrom=$q3['fridayfrom'];
$fridayto=$q3['fridayto'];
if($fridayfrom == '00:00:00' || $fridayto == '00:00:00')
{
$minute = 'Close';
}
else
{
$minutes = get_minutes($fridayfrom, $fridayto);  
}

}
else if($day=='Saturday')
{
$saturdayfrom=$q3['saturdayfrom'];
$saturdayto=$q3['saturdayto'];
if($saturdayfrom == '00:00:00' || $saturdayto == '00:00:00')
{
$minute = 'Close';
}
else
{
$minutes = get_minutes($saturdayfrom, $saturdayto);  
}

}
else if($day=='Sunday')
{
$sundayfrom=$q3['sundayfrom'];
$sundayto=$q3['sundayto'];
if($sundayfrom == '00:00:00' || $sundayto == '00:00:00')
{
$minute = 'Close';
}
else
{
$minutes = get_minutes($sundayfrom, $sundayto);  
}

}
foreach($minutes as $minute) {  
   // echo $minute .'<br />';  
    
						?>
                        <option value="<?php echo $minute; ?>"><?php echo $minute; ?></option>
                        <?php
						}
						?>
                        
                        </select>
                        
                        </div>
                        
                       <button type="submit" id="submitform" class="btn-booking hvr-ripple-out" data-toggle="modal" data-target="#myModal">Book Now</button>
                       
                      
      </form>
      <script type="text/javascript">



$(document).ready(function()

{


	  
	  

    $('#customForm<?php echo $count; ?>').on('submit', function(e)

    {

        e.preventDefault();

           

        //show uploading message

        $("#modal-body").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> Processing...Please Wait');
		

         $(this).ajaxSubmit({

        target: '#modal-body',

        success:  afterSuccess //call function after success

        });

    });
	//signup code end
	
	
	
});
 

 function afterSuccess(value)



{

if(value == "Thanks for booking with us. Please check your email inbox or spambox. Our customer care executive will contact you soon!")

{

$('#customForm<?php echo $count; ?>').resetForm();

}


}

</script>
                        </div>
                        <?php
						}
						?>
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
        <h2><small>Book Appointment</small></h2>
        </div>
      </div>
        <div class="modal-body" id="modal-body">
          Please Book Your Appointment!
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
<!--<script src="js/jquery-2.1.4.js"></script>-->
 </body>
</html>
