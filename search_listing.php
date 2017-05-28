<?php 
define('DB_HOST',			'localhost');
define('DB_USER',			'radixbea_rahul');
define('DB_PASS',			'Rahul@4321%%');
define('DB_NAME',			'radixbea_beauty');
$limit = 10; #item per page
# db connect
$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Could not connect to MySQL DB ') . mysql_error();
$db = mysql_select_db(DB_NAME, $link); 
$page = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];

$search = $_GET['search'];
# sql query
$sql = "select l.companyname,l.contactperson,l.id,l.contactno,l.emailid,l.building,l.street,l.landmark,l.area,l.pincode,l.country,l.description,l.website,l.image,l.cat_id,l.mondayfrom,l.mondayto,l.tuesdayfrom,l.tuesdayto,l.wednesdayfrom,l.wednesdayto,l.thursdayfrom,l.thursdayto,l.fridayfrom,l.fridayto,l.saturdayfrom,l.saturdayto,l.sundayfrom,l.sundayto from listings l,Category c, location h, Services s where l.cat_id=c.id and l.city = h.id and l.emailid = s.sellerid and l.confirmation='Yes' and l.active='Yes' and (c.Name like '%$search%' or l.companyname like '%$search%' or l.contactperson like '%$search%' or h.name like '%$search%' or l.contactno like '%$search%' or l.emailid like '%$search%' or l.building like '%$search%' or l.street like '%$search%' or l.landmark like '%$search%' or l.area like '%$search%' or l.pincode like '%$search%' or l.country like '%$search%' or l.description like '%$search%' or l.website like '%$search%' or s.Name like '%$search%' or s.description like '%$search%' or s.price like '%$search%') GROUP BY l.companyname ORDER BY RAND()";
# find out query stat point
$start = ($page * $limit) - $limit;
# query for page navigation
if( mysql_num_rows(mysql_query($sql)) > ($page * $limit) ){
	$next = ++$page;
}
$query = mysql_query( $sql . " LIMIT {$start}, {$limit}");
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d");
$day = date("l");

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
<script type="text/javascript" src="js/jquery-ias.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        	// Infinite Ajax Scroll configuration
            jQuery.ias({
                container : '.section_space', // main container where data goes to append
                item: '.listingbody', // single items
                pagination: '.nav1', // page navigation
                next: '.nav1 a', // next page selector
                loader: '<img src="css/ajax-loader.gif"/>', // loading gif
                triggerPageThreshold: 3 // show load more if scroll more than this
            });
        });
    </script>

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
						<h2 class="title text-center">Found <?php echo mysql_num_rows($query); ?> results for <?php echo $search; ?> </h2>
						
						
						<div class="listingsection">
						
						
                        <?php
			if (mysql_num_rows($query) < 1) {
	
	echo 'Result not found!';
	
} else {
$count = 0;
			 while ($row1 = mysql_fetch_array($query)): 
			  $count = $count+1;
			 ?>
                        	
                        
                        	<div class="listingbody" id="listingbody-<?php echo $row1['id'];?>">
						<div class="row">
						<div class="col-xs-12 col-sm-7 col-md-8">
						<div class="leftdiv">
						<?php 
						if($row1['image'] != '')
						{
						echo '<img src="data:image/jpeg;base64,'.base64_encode($row1['image']). ' " />' ;
						}
						else
						{
						
                   echo '<img src="../images/noimage.png" alt="No Image">';
                       
						}?>
                        
                        
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
                          <h4 class="saloonname"><a href="listingdetails.php?id=<?php echo base64_encode($row1['id']); ?>"><?php echo ucwords($row1['companyname']); ?></a></h4>
                        
                        <div class="saloontype"><i class="fa fa-list"></i><?php echo catname($row1['cat_id']); ?></div>
                        <div class="saloonaddress"><i class="fa fa-map-marker"></i> <?php echo $row1['building'];?>&nbsp;<?php echo $row1['street'];?>&nbsp;<?php echo $row1['landmark'];?>&nbsp;<?php echo $row1['area'];?>&nbsp;<?php echo cityname($row1['city']);?>&nbsp;<?php echo $row1['pincode'];?></div>
                        <div class="saloondistance"><i class="fa fa-location-arrow"></i> <?php echo $row1['contactperson']; ?></div>
                        <?php 
						if($row1['listing_type'] != 'Free')
						{
						?>
                       <!-- <div class="saloontiming"><i class="fa fa-clock-o"></i> <?php //echo $row1['emailid']; ?></div>
                        <div class="saloontiming"><i class="fa fa-clock-o"></i> <?php //echo $row1['contactno']; ?></div>-->
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
                        <h4>Book Service</h4>
                        
                        <form name="customForm<?php echo $count; ?>" id="customForm<?php echo $count; ?>" method="post" action="book_service.php" data-rank="<?php echo $count; ?>">
                        <div class="step01">
                        
                        <select name="package" id="package">
                        <option value="">Select a Service</option>
                       <?php
					   $query525="select * from Services where sellerid='".$row1['emailid']."'";
					   $query1525=mysql_query($query525);
					   $query2525=mysql_num_rows($query1525);
					   if($query2525 > 0)
					   {
					   while($query3525=mysql_fetch_array($query1525))
					   {
					    ?>
      <option value="<?php echo $query3525['id']; ?>"><?php echo $query3525['Name']; ?> ( <?php echo $query3525['price']; ?> )</option>
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
$mondayfrom=$row1['mondayfrom'];
$mondayto=$row1['mondayto'];
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
$tuesdayfrom=$row1['tuesdayfrom'];
$tuesdayto=$row1['tuesdayto'];
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
$wednesdayfrom=$row1['wednesdayfrom'];
$wednesdayto=$row1['wednesdayto'];
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
$thursdayfrom=$row1['thursdayfrom'];
$thursdayto=$row1['thursdayto'];
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
$fridayfrom=$row1['fridayfrom'];
$fridayto=$row1['fridayto'];
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
$saturdayfrom=$row1['saturdayfrom'];
$saturdayto=$row1['saturdayto'];
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
$sundayfrom=$row1['sundayfrom'];
$sundayto=$row1['sundayto'];
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
                        </div>
						</div>
						</div>
                       <?php endwhile ?>

	<!--page navigation-->
	<?php if (isset($next)): ?>
	<div class="nav1">
		<a href='search_listing.php?p=<?php echo $next;?>'>Next</a>
	</div>
	<?php endif?>
                           
<?php
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
