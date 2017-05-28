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



<!-- section --> 







<!-- Services -->

<section id="pricing_table" class="section_space">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center"> <img src="images/heading-icon.png" alt="section heading">
        <h2>Our PACKAGES</h2>
        <p class="padding padding-top">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
          deserunt mollit anim id est laborum.</p>
      </div>
    </div>
    <div class="row">
    
    
       <?php
				$q="select * from Packages order by id asc ";

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
      <div class="col-md-3 col-sm-3 col-xs-12 wow fadeInDown animated animated" data-wow-duration="500ms" style="visibility: visible; animation-duration: 500ms; animation-name: fadeInDown;">
        <div class="pricetab">
          <div class="heading_pricing"> <img src="images/paricing-icon.png" alt="images1">
            <h2> <?php echo $q3['type'];?> </h2>
          </div>
          <div class="price">
            <h1> <?php echo $q3['Name'];?> </h1>
          </div>
          <div class="infos">
            <?php echo $q3['description'];?>
          </div>
          <div class="pricefooter">
            <div class="button_price"> <a href="packageslisting.php?id=<?php echo base64_encode($q3['id']);?>"> Show List </a> </div>
          </div>
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

