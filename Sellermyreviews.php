<?php
include_once("config.php");
include_once("check.php");
session_set_cookie_params(3600);
session_start();
$username=$_SESSION['username'];
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
<script src="js/jquery-1.11.1.min.js"></script>
<!--<script src="js/jquery-1.8.0.min.js"></script>-->
<script type="text/javascript" src="js/jquery.form.js"></script>

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
							<li class="active"><a href="#pilltab1" data-toggle="tab">Pending</a></li>
                            <li class=""><a href="#pilltab2" data-toggle="tab">Approved</a></li>
							<li class=""><a href="#pilltab3" data-toggle="tab">Total</a></li>
							
                        </ul>
		
						<div class="tab-content">
							<div class="tab-pane fade active in" id="pilltab1">
							  <div class="panel-heading" style="font-size: 18px; font-weight: 600; letter-spacing: 0.025em; height: 66px; line-height: 45px; color:#eb268f; text-align:center;">Pending Customer Reviews</div>
                              <div class="panel-body">
						<table data-toggle="table">
						    <thead>
						    <tr>
						       <th data-field="sno" data-sortable="true">S.No.</th>
						        <th data-field="businessname" data-sortable="true">Name</th>
						        <th data-field="contactperson"  data-sortable="true">Email ID</th>
						        <th data-field="emailid" data-sortable="true">Comment</th>
                                <th data-field="contactno" data-sortable="true">Approval</th>
						        <th data-field="category" data-sortable="true">Delete</th>
						        
						    </tr>
						    </thead>
                            <tbody id="loadservicedata">
                              <?php
	 $q= "select * from reviews where reviewseller='".$username."' and reviewapproval='No' order by id asc";
			  $q1 = mysql_query($q);
			  $q2 = mysql_num_rows($q1);
	

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
	   		 <td style=""><?php echo $q3['reviewname']; ?></td>
              <td style=""><?php echo $q3['reviewemail']; ?></td>
		     <td style=""><?php echo $q3['reviewcomment']; ?></td>
	         <td style=""><a href="approveSellermyreviews.php?id=<?php echo base64_encode($q3['id']);?>">Approve</a></td>
             <td style=""><a href="deleteSellermyreviews.php?id=<?php echo base64_encode($q3['id']);?>">Delete</a></td>  
                            </tr>
                             <?php
  }
  }
  else
  {
  ?>
                        <tr class="no-records-found">
                        <td colspan="6">No Customer Review Found!</td></tr>
                        <?php
  }
  ?>
                    </tbody>
						</table>
					</div>
								
							</div>
							<div class="tab-pane fade" id="pilltab2"><div class="panel-heading" style="font-size: 18px; font-weight: 600; letter-spacing: 0.025em; height: 66px; line-height: 45px; color:#eb268f; text-align:center;">Approved Customer Reviews</div>
                            <div class="panel-body">
						<table data-toggle="table">
						    <thead>
						    <tr>
						       <th data-field="sno" data-sortable="true">S.No.</th>
						        <th data-field="businessname" data-sortable="true">Name</th>
						        <th data-field="contactperson"  data-sortable="true">Email ID</th>
						        <th data-field="emailid" data-sortable="true">Comment</th>
                                <th data-field="contactno" data-sortable="true">Pending</th>
						        <th data-field="category" data-sortable="true">Delete</th>
						        
						    </tr>
						    </thead>
                            <tbody id="loadservicedata">
                              <?php
	 $q= "select * from reviews where reviewseller='".$username."' and reviewapproval='Yes' order by id desc";
			  $q1 = mysql_query($q);
			  $q2 = mysql_num_rows($q1);
	

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
	   		 <td style=""><?php echo $q3['reviewname']; ?></td>
              <td style=""><?php echo $q3['reviewemail']; ?></td>
		     <td style=""><?php echo $q3['reviewcomment']; ?></td>
	         <td style=""><a href="pendingSellermyreviews.php?id=<?php echo base64_encode($q3['id']);?>">Pending</a></td>
             <td style=""><a href="deleteSellermyreviews.php?id=<?php echo base64_encode($q3['id']);?>">Delete</a></td>  
                            </tr>
                             <?php
  }
  }
  else
  {
  ?>
                        <tr class="no-records-found">
                        <td colspan="6">No Customer Review Found!</td></tr>
                        <?php
  }
  ?>
                    </tbody>
						</table>
					</div>
								
							</div>
                            <div class="tab-pane fade" id="pilltab3"><div class="panel-heading" style="font-size: 18px; font-weight: 600; letter-spacing: 0.025em; height: 66px; line-height: 45px; color:#eb268f; text-align:center;">Total Customer Reviews</div>
                            <div class="panel-body">
						<table data-toggle="table">
						    <thead>
						    <tr>
						       <th data-field="sno" data-sortable="true">S.No.</th>
						        <th data-field="businessname" data-sortable="true">Name</th>
						        <th data-field="contactperson"  data-sortable="true">Email ID</th>
						        <th data-field="emailid" data-sortable="true">Comment</th>
                                <th data-field="contactno" data-sortable="true" >Approval</th>
                                <th data-field="contactno2" data-sortable="true" >Pending</th>
						        <th data-field="category" data-sortable="true">Delete</th>
						        
						    </tr>
						    </thead>
                            <tbody id="loadservicedata">
                              <?php
	 $q= "select * from reviews where reviewseller='".$username."' order by id desc";
			  $q1 = mysql_query($q);
			  $q2 = mysql_num_rows($q1);
	

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
	   		 <td style=""><?php echo $q3['reviewname']; ?></td>
              <td style=""><?php echo $q3['reviewemail']; ?></td>
		     <td style=""><?php echo $q3['reviewcomment']; ?></td>
	         <td style=""><a href="approveSellermyreviews.php?id=<?php echo base64_encode($q3['id']);?>">Approve</a></td>
              <td style=""><a href="pendingSellermyreviews.php?id=<?php echo base64_encode($q3['id']);?>">Pending</a></td>
             <td style=""><a href="deleteSellermyreviews.php?id=<?php echo base64_encode($q3['id']);?>">Delete</a></td>  
                            </tr>
                             <?php
  }
  }
  else
  {
  ?>
                        <tr class="no-records-found">
                        <td colspan="7">No Customer Review Found!</td></tr>
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

