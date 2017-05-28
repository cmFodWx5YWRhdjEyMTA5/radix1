<?php include("config.php");
$id=$_GET['id'];
$id=base64_decode($id);
$date = date("Y-m-d");
$day = date("l");
date_default_timezone_set("Asia/Kolkata");

function get_minutes ( $start, $end ) {  

   while ( strtotime($start) <= strtotime($end) ) {  
       $minutes[] = date("H:i:s", strtotime( "$start" ) );  
       $start = date("H:i:s", strtotime( "$start + 15 mins")) ;      
   }  
   return $minutes;  
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
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Beauty & Spa Radix Beauty" />
<meta name="keywords" content="spa,hotels,resturent,cleaning,beauty & spa,barbar & hair" />
<meta name="author" content="Radix Beauty" />

<title>Product | Beauty Spa</title>


<link rel="stylesheet" type="text/css" href="css/master.css">
<link rel="shortcut icon" href="images/heading-icon.png">
<script src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/radix.js"></script>
<?php include("analyticstracking.php") ?>
<script type="text/javascript">

$(document).ready(function()
{
	$('#reviewform').on('submit', function(e)
	{
    e.preventDefault();
    $("#reviewoutput").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Saving...Please Wait</span>');
	$(this).ajaxSubmit({
    target: '#reviewoutput',
    success:  afterSuccessreviewoutput //call function after success
    });
	});
	
	
});

 

function afterSuccessreviewoutput(value)
{
if(value == "Thanks for submitting your review. It will show after approval!")
{
document.getElementById("reviewform").reset();

}
}

</script>
</head>

<body>

<div class="container"> 
  <a href="#" class="back-to-top text-center" style="display: inline;"> <i class="fa fa-angle-up"></i> </a> 
</div>


<?php include("topbar.php"); ?>



<?php include("header.php"); ?>


 <?php
	$q="select * from listings where id='".$id."' and active='Yes' and confirmation='Yes'";
	$q1=mysql_query($q);
    $q2=mysql_num_rows($q1);
	if($q2 > 0)

  {

  $count = 0;

  while($q3=mysql_fetch_array($q1))

  {

  $count = $count+1;

  
					?>
<section id="work-details" class="padding_top">
  <div class="container">
    <div class="work-detail">
      <div class="row">
        <div class="col-md-5 col-sm-5 col-xs-12">
          <div class="dark-grey jw-animate-gen noOpacity" data-gen="fadeInLeft" data-gen-offset="70%"> 
              <span><i class="fa fa-calendar"></i><strong>Name:</strong> <?php echo ucwords($q3['companyname']); ?></span> 
              <span><i class="fa fa-map-marker"></i><strong>Location:</strong> <?php echo $q3['building'];?>&nbsp;<?php echo $q3['street'];?>&nbsp;<?php echo $q3['landmark'];?>&nbsp;<?php echo $q3['area'];?>&nbsp;<?php echo $q3['pincode'];?></span> 
              <span><i class="fa fa-map-marker"></i><strong>City:</strong> <?php echo cityname($q3['city']);?></span> 
              
              <span><i class="fa fa-users"></i><strong>Contact Person:</strong> <?php echo $q3['contactperson']; ?></span> 
              
              <span><i class="fa fa-list"></i><strong>Category:</strong> <?php echo catname($q3['cat_id']); ?></span> 
          </div>
        </div>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <div id="about-slider" class="owl-carousel">
           
            <div class="item"><?php 
						if($q3['image'] != '')
						{
						echo '<img src="data:image/jpeg;base64,'.base64_encode($q3['image']). ' "/>'; 
						}
						else
						{
						?>
                        <img src="images/noimage.png">
						<?php
						}
						?></div>
                        <?php
				 $sqlgal="select * from gallery where sellerid='".$q3['emailid']."'";
				 $sqlgal1=mysql_query($sqlgal);
				 $sqlgal2=mysql_num_rows($sqlgal1);
				 if($sqlgal2 > 0)
				 {
				 while($sqlgal3=mysql_fetch_array($sqlgal1))
				 {
				 ?>
                  <div class="item"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($sqlgal3['image']). ' "/>'; ?></div>
                    <?php
					}
					}
					?>   
                        
          </div>
        </div>
      </div>
      
    </div>
    <?php
	 $reviewsql= "select * from reviews where reviewseller='".$q3['emailid']."' and reviewapproval='Yes' order by id desc";
			  $reviewsql1 = mysql_query($reviewsql);
			  $reviewsql2 = mysql_num_rows($reviewsql1);
	?>
    <div class="category-tab shop-details-tab">
          <div class="col-sm-12">
            <ul class="nav nav-tabs_2">
              <li class="active"><a href="#details" data-toggle="tab" aria-expanded="true">Details</a></li>
            
              <li class=""><a href="#reviews" data-toggle="tab" aria-expanded="false">Reviews <?php if($reviewsql2 > 0) { echo "(".$reviewsql2.")"; }?></a></li>
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane fade active in" id="details" style="padding-left:25px; padding-right:25px;">
              <div class="col-sm-12"><?php echo $q3['description']; ?> </div>
            </div>
          
            <div class="tab-pane fade" id="reviews">
              <div class="col-sm-12">
              <?php
			   if($reviewsql2 > 0)
			  {
			  while($reviewsql3 = mysql_fetch_array($reviewsql1))
				{
				?>
                 <ul>
                  <li><a href=""><i class="fa fa-user"></i><?php echo $reviewsql3['reviewname'];?></a></li>
                  <li><a href=""><i class="fa fa-clock-o"></i><?php echo $reviewsql3['reviewdate'];?></a></li>
                  <li><a href=""><i class="fa fa-calendar-o"></i><?php echo $reviewsql3['reviewtime'];?></a></li>
                </ul>
                <p><?php echo $reviewsql3['reviewcomment'];?></p>
                
                <?php
				}
			  }
			  ?>
              <p><b style="color:#eb268f; font-size:larger;">Write Your Review</b></p>
               
                <form class="form-horizontal" method="post" action="submit_review.php" name="reviewform" id="reviewform">
                <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Your Name</label>
									<div class="col-md-9">
										<input type="text" placeholder="Your Name" name="reviewname" id="reviewname" class="form-control" style="background: #F0F0E9;">
									</div>
								</div> <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Your Email</label>
									<div class="col-md-9">
										<input type="email" placeholder="Email Address" name="reviewemail" id="reviewemail" class="form-control" style="background: #F0F0E9;">
									</div>
								</div> <div class="form-group">
									<label class="col-md-3 control-label" for="message" style="color:#eb268f;">Feedback</label>
									<div class="col-md-9">
										<textarea name="reviewcomment" id="reviewcomment" class="form-control" style="background: #F0F0E9;"></textarea> 
									</div>
								</div>
                 
                  
                        <input type="hidden" name="reviewseller" id="reviewseller" value="<?php echo base64_encode($q3['emailid']); ?>">
                 
                 
                  <button type="submit" class="btn btn-default pull-right"> Submit </button><span id="reviewoutput" class="output" style="float:right; padding-top:8px; padding-right:15px;"></span>
                </form>
              </div>
            </div>
          </div>
        </div>
    
  </div>
</section>

<?php
}
}
?>


<?php include("footertop.php"); ?>

<?php include("footerbottom.php"); ?>

<div class="modal fade" id="myModal" role="dialog" style="display:none">
    <div class="modal-dialog">
    
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
<script src="js/owl.carousel.min.js"></script> 
<script src="js/wow.min.js"></script>  
<script src="js/jquery.mixitup.min.js"></script>  
<script src="js/jquery-countTo.js"></script> 
<script src="js/jquery.appear.js"></script> 
<script src="js/jquery.fancybox.js"></script>
<!--<script src="js/jquery-2.1.4.js"></script>-->
<script src="js/custom-js.js"></script> 
 </body>
</html>