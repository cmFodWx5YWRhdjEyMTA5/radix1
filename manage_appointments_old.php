<?php
include_once("config.php");
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

</head>



<body>

<!--Loader-->

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

<div class="topbar">

    <div class="container">

      <div class="row">

        <div class="col-sm-4">

            <ul class="contactinfo">

              <li><a href="#"><i class="fa fa-phone-square"></i> +92 95 01 88 821</a></li>

              <li><a href="#"><i class="fa fa-envelope"></i> info@beautyspa.com</a></li>

            </ul>

        </div>

        <div class="col-sm-8">

            <ul class="shop-menu pull-right">

              <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>

              <li><a href="home.php"><i class="fa fa-lock"></i> My Account</a></li>
              <li><a href="manage_appoinments.php"><i class="fa fa-lock"></i> Manage Appointments</a></li>
              <li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>

            </ul>

        </div>

      </div>

    </div>

  </div>

<div class="col-md-6">
  <h4>Spa Products</h4>
</div>
<?php include("header.php"); ?>

<!-- Header Ends --> 







<!-- Page Heading -->

<section id="page-heading">

  <div class="container">

    <div class="row">
      <div class="col-md-6 text-right"> <a href="index.php">Home <i class="fa fa-angle-double-right"></i></a> <span>Spa Products</span> </div> 

    </div>

  </div>

</section>

<!-- section -->







<!-- Login Form -->

<section id="form" class="section_space">

  <div class="container">

    <div class="row">

      <div class="col-sm-4 col-sm-offset-1">

         <div class="signup-form">

          <h2>My Appointments</h2>
<table width="100%" border="1">
  <tr>
    <th scope="col">S. No.</th>
     <th scope="col">Date</th>
    <th scope="col">Category</th>
    <th scope="col">Service</th>
    <th scope="col">Amount</th>
    </tr>
   <?php

  $q="select * from appointments where emailid='".$username."' order by id desc";

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
  <tr>
      <td><?php echo $count; ?></td>
  <td><?php echo $q3['appointment_date']; ?></td>
 <td><?php echo $q3['category']; ?></td>
  <td><?php echo $q3['service']; ?></td>
  <td><?php echo $q3['amount']; ?></td>
  </tr>
  <?php
  }
  }
  else
  {
  ?>
  <tr>

    <td colspan="5">No Appointments Found.</td>

  </tr>
  <?php
  }
  ?>
</table>

        </div>

      </div>

      

      <div class="col-sm-4">

       

      </div>

    </div>

  </div>

</section>

<!-- Login Form --> 











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







<script src="js/bootstrap.min.js"></script> 

<script src="js/owl.carousel.min.js"></script>

<script src="js/wow.min.js"></script> 

<script src="js/jquery.mixitup.min.js"></script> 

<script src="js/jquery-countTo.js"></script> 

<script src="js/jquery.appear.js"></script> 

<script src="js/jquery.fancybox.js"></script>

<!-- /logicsforest custom js --> 

<script src="js/custom-js.js"></script> 



</body>

</html>

