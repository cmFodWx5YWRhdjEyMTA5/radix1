<?php include("config.php");?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="India's No.1  Beauty Saloon Search engine| search beauty saloon & fitness Gym near by you" book your package and get 100% cashback />
<meta name="Single platform to search beauty parlour, Saloon, Gym & fitness center" content="Single platform to search beauty parlour, Saloon, Gym & fitness center Best unisex saloon, women beauty parlour,beauty & fitness gym & hair shop,beauty salon, on radixbeauty.com" />
<meta name="author" content="Single platform to search beauty parlour, Saloon, Gym & fitness center | search beauty saloon near by you-book your package and get 100% cashback " />

<title>Single platform to search beauty parlour, Saloon, Gym & fitness center near by you| search beauty saloon, Fitness Gym near by you-book your package and get 100% cashback </title>
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
<script src="js/jquery-2.1.4.js"></script> 
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/radix.js"></script>
<?php include("analyticstracking.php") ?>
<script type="text/javascript">



$(document).ready(function()

{

    $('#contactcustomForm').on('submit', function(e)

    {

        e.preventDefault();

        

        //show uploading message

        $("#contactoutput").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Saving...Please Wait</span>');

        $(this).ajaxSubmit({

        target: '#contactoutput',

        success:  contactafterSuccess //call function after success

        });

    });

});

 

 function contactafterSuccess(value)



{

if(value == "Thanks for Contacting with us. Our customer care executive will get in touch with you soon!")

{

$('#contactcustomForm').resetForm();

}



}

</script>
</head>

<body>
<!--Loader-->

<!-- Back-To-Top -->
<div class="container"> <a href="#" class="back-to-top text-center" style="display: inline;"> <i class="fa fa-angle-up"></i> </a> </div>

<!-- Header Starts -->

<?php include("topbar.php"); ?>

<?php include("header.php"); ?>
<!-- Header Ends --> 

<!-- Page Heading -->
<section id="page-heading">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h4>Contact Us</h4>
      </div>
      <div class="col-md-6 text-right"> <a href="index.php">Home <i class="fa fa-angle-double-right"></i></a> <span>Contact Us</span> </div>
    </div>
  </div>
</section>
<!-- section --> 

<!-- Contact us -->

<section class="get-in-touch">
  <div class=container>
    <div class="form-area-wrap padding_top">
      <div class="heading text-center">
        <h2>Get in <strong>Touch</strong><br><img src="images/static_qr_code_without_logo.jpg" width="100" height="100"></h2>
      </div>
      <div class="form-area">
        <form class="contact-form" method="post" action="contactuser.php" id="contactcustomForm" name="contactcustomForm">
          <div class="col-xs-12 col-sm-6">
            <div class="necessary-info">
              <input name="name" id="name" class="contact-name" type="text"  placeholder="Name*" required />
              <input name="email" id="email" class="contact-mail" type="email" placeholder="Email *" required />
              <input name="sub" id="sub" class="contact-subject" type="text" placeholder="Subject *" required />
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="message-send">
              <textarea placeholder="Message *" id="message" name="message" required></textarea>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="submit-btn"> <button type="submit" id="submitform" class="btn-slide animation animated-item-1 hvr-ripple-out">Submit</button><span id="contactoutput" class="output"></span></div>
          </div>
        </form>
        
      </div>
    </div>
    
  </div>
</section>

<section class="contact-us" id="contact-us">
  <div class="container">
    <div class="heading text-center">
      <h2>Contact Us</h2>
      <p> B 303, Oxford Avanue income tax ashram road Ahmedabad 380009 </p>
    </div>
    <div class="col-xs-12 col-sm-4">
      <div class="contact-info"> <a href="#" class="contact-icon"><i class="fa fa-phone"></i> </a> <a href="tel:+9107043760666" class="contact-text"> +91 7043760666</a> </div>
    </div>
    <div class="col-xs-12 col-sm-4">
      <div class="contact-info"> <span  class="contact-icon"><i class="fa fa-map-marker"></i> </span> <span class="contact-text"> B 303 Oxford Avenue income tax ashram road Ahmedabad 380009</span> </div>
    </div>
    <div class="col-xs-12 col-sm-4">
      <div class="contact-info"> <a href="#" class="contact-icon"><i class="fa fa-envelope"></i> </a> <a href="mailto:admin@trasuaemplate.com" class="contact-text"> admin@radixbeauty.com</a> </div>
    </div>
    
  </div>
</section>
<div class="maps padding_none">
      <div style="width:100%;height:300px;" id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1835.7496880234855!2d72.56354205796545!3d23.04214669623579!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848badaed0ed%3A0x69775d63f33d4e3b!2sRadix+Beauty+-The+Beauty+Parlour+Search+Engine!5e0!3m2!1sen!2sin!4v1484375467991" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
    </div>
<!-- Footer top -->

<?php include("footertop.php"); ?>
<?php include("footerbottom.php"); ?>


<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> <!-- /owl slider all--> 
<script src="js/wow.min.js"></script> 
<script type="text/javascript" src="js/js?sensor=true"></script> 
<script src="js/gmaps.js"></script> 
<script src="js/validate.min.js" type="text/javascript"></script> 
<script src="js/init.js" type="text/javascript"></script> 
<script src="js/jquery.mixitup.min.js"></script> 
<script src="js/jquery-countTo.js"></script> 
<script src="js/jquery.appear.js"></script> 
<script src="js/jquery.fancybox.js"></script> 
<!-- /logicsforest custom js --> 
<script src="js/custom-js.js"></script>
</body>
</html>
