<?php
include_once("config.php");
include_once("check.php");
session_set_cookie_params(3600);
//ini_set('session.gc_maxlifetime',60*60);
//ini_set('session.gc_probability',1);
//ini_set('session.gc_divisor',1);
session_start();


$username=$_SESSION['username'];
$usertype = $_SESSION['usertype'];
if(!isset($_SESSION['username']))
{
	echo "<script>alert('You are not authorised to view this page, please login for authentication.');</script>";
	echo "<script>window.location.href='index.php'</script>";
}

$id=$_GET['id'];
$id=base64_decode($id);
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

<script src="js/jquery-2.1.4.js"></script> 
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript">



$(document).ready(function()

{

    $('#addpackagecustomForm').on('submit', function(e)

    {

        e.preventDefault();

        

        //show uploading message

        $("#addpackageoutput").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Saving...Please Wait</span>');

        $(this).ajaxSubmit({

        target: '#addpackageoutput',

        success:  afterSuccess //call function after success

        });

    });

});

 

 function afterSuccess(value)



{

if(value == "Saved!")

{

$('#addpackagecustomForm').resetForm();

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

<section id="page-heading">

  <div class="container">

    <div class="row">

      <div class="col-md-6">

        <h4>Edit Service</h4>

      </div>

      <div class="col-md-6 text-right"> <a href="index.php">Home <i class="fa fa-angle-double-right"></i></a> <span>Edit Service</span> </div> 

    </div>

  </div>

</section>

<section id="form" class="section_space" style="padding: 10px 0;">

  <div class="container">

     <div class="row">

     <h2>Edit Service</h2>
     <?php
  $q="select * from Services where id='".$id."'";
  $q1=mysql_query($q);
  $q2=mysql_num_rows($q1);
 
  while($q3=mysql_fetch_array($q1))
  {
  
  $id = base64_encode($q3['id']);
  ?>

				<form name="addpackagecustomForm" id="addpackagecustomForm" method="post" action="save_editservices.php" enctype="multipart/form-data">

<input type="text" id="category" name="category" placeholder="Service" class="form-control" value="<?php echo $q3['Name'];?>">
<input type="hidden" id="id" name="id" class="form-control" value="<?php echo $id; ?>">
<br>
<input type="text" id="price" name="price" class="form-control" placeholder="Price" value="<?php echo $q3['price'];?>">
<br>
<textarea name="desc" id="desc" placeholder="Description" class="form-control" rows="5"><?php echo $q3['description'];?></textarea>
<br>

<button type="submit" id="submitform" class="btn btn-primary">Save</button><span id="addpackageoutput" class="output"></span>

</form>
 <?php
}
?>

  </div>
  </div>

</section>


<?php include("footertop.php"); ?>

<?php include("footerbottom.php"); ?> 

<script src="js/bootstrap.min.js"></script> 

<script src="js/owl.carousel.min.js"></script>

<script src="js/wow.min.js"></script> 

<script src="js/jquery.mixitup.min.js"></script> 

<script src="js/jquery-countTo.js"></script> 

<script src="js/jquery.appear.js"></script> 

<script src="js/jquery.fancybox.js"></script>

<script src="js/custom-js.js"></script> 

</body>

</html>

