<?php include("config.php");?>
<!doctype html>

<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Get 100% cashback book online beauty service with www.radixbeauty.com,Best Beauty &amp; Salon Offers with 100% cashback in Ahmedabad| search beauty salon & fitness Gym near by you" book your package and get 100% cashback />
<meta name="Get 100% cashback book online beauty service with www.radixbeauty.com,Single platform to search beauty parlour, Salon, Gym & fitness center" content="Single platform to search beauty parlour, Saloon, Gym & fitness center Best unisex saloon, women beauty parlour,beauty & fitness gym & hair shop,beauty salon, on radixbeauty.com" />
<meta name="author" content="Single platform to search beauty parlour, Saloon, Gym & fitness center | search beauty saloon near by you-book your package and get 100% cashback " />
<title> Get 100% cashback book online beauty service with www.radixbeauty.com, Find Best Beauty Salon, GYM center Offers in Ahmedabad, indore, Delhi, Agra book your service online|| search beauty saloon near by you-book your services and get 100% cashback </title>



<link rel="stylesheet" type="text/css" href="css/master.css">

<link rel="shortcut icon" href="images/heading-icon.png">
<script src="js/jquery-2.1.4.js"></script>
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







<!-- Page Title -->

<section id="page-heading">

  <div class="container">

    <div class="row">

      <div class="col-md-6">

        <h4>Our Categories</h4>

      </div>

      <div class="col-md-6 text-right"> 

        <a href="index.php">Home <i class="fa fa-angle-double-right"></i></a> <span>Our Categories</span> 

      </div>

    </div>

  </div>

</section>

<!-- section --> 







<!-- Services -->

<section id="our_services" class="section_space">

  <div class="container">

    <div class="row">

      <div class="col-md-12 text-center">

       <img src="images/heading-icon.png" alt="section heading">

        <h2>Our Categories</h2>

        <p class="padding">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia

          deserunt mollit anim id est laborum.</p>

      </div>

    </div>

    <div class="row">
    
 <?php
				$q="select * from Category order by Name asc ";

  $q1=mysql_query($q);

  $q2=mysql_num_rows($q1);

  if($q2 > 0)

  {

  $count = 0;

  while($q3=mysql_fetch_array($q1))

  {

  $count = $count+1;

 

				?>
      <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1900ms">

        <div class="effect"> 

          <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($q3['image']). ' " width="200px" height="150px"/>'; ?>

          <span class="overlay-effect"> <?php echo $q3['Name'];?> </span> 

          <span class="button-effect"> <a href="listing.php?id=<?php echo base64_encode($q3['id']);?>" class="red-button  btn-4 btn-4c"> <span>Show List </span> </a> </span> 

       </div>

      </div>
        <?php
				  }
				  }
				?>
      

    </div>

  </div>

</section>







<!-- Footer top -->

<?php include("footertop.php"); ?>

<!-- section -->





<?php include("footerbottom.php"); ?>











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

