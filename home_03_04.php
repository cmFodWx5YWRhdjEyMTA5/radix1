<?php
include_once("config.php");
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
<script src="js/jquery-2.1.4.js"></script> 
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript">



$(document).ready(function()

{

    $('#usercustomForm').on('submit', function(e)

    {

        e.preventDefault();

        

        //show uploading message

        $("#useroutput").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Saving...Please Wait</span>');

        $(this).ajaxSubmit({

        target: '#useroutput',

        success:  afterSuccess //call function after success

        });

    });

});

 

 function afterSuccess(value)



{

if(value == "Saved!")

{
$('#usercustomForm').resetForm();
window.location.reload();

}



}

</script>
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

        <h4>My Account</h4>

      </div>

      <div class="col-md-6 text-right"> <a href="index.php">Home <i class="fa fa-angle-double-right"></i></a> <span>My Account</span> </div> 

    </div>

  </div>

</section>

<!-- section -->







<!-- Login Form -->

<section id="form" class="section_space" style="padding: 10px 0;">

  <div class="container">

    <div class="row">

      <div class="col-sm-4 col-sm-offset-1">

         <div class="signup-form">

          <h2>My Account</h2>
<?php
$q="select * from members where emailid='".$username."'";

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
          <form method="post" action="save_userdata.php" id="usercustomForm" name="usercustomForm">

            <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $q3['name'];?>"/>

            <input type="email" name="emailid" id="emailid" placeholder="Email Address" value="<?php echo $q3['emailid'];?>" readonly="readonly"/>
            <input type="text" name="contactno" id="contactno" placeholder="Mobile Number" value="<?php echo $q3['contactno'];?>"/>
			<select name="gender" id="gender" class="gender">
            
            <option value="Male" <?php if($q3['gender']=='Male') { echo 'selected="selected"';}?>>Male</option>
             <option value="Female" <?php if($q3['gender']=='Female') { echo 'selected="selected"';}?>>Female</option>
            </select>
              <input type="text" name="pincode" id="pincode" placeholder="Pincode" value="<?php echo $q3['pincode'];?>"/>
			<select name="city" id="city" class="gender">
            <?php 
			$qry = "select * from location order by name asc";
			$qry1 = mysql_query($qry);
			while($qry2=mysql_fetch_array($qry1))
			{
			?>
             <option value="<?php echo $qry2['name'];?>" <?php if($q3['city'] == $qry2['name']) { echo 'selected="selected"';}?> ><?php echo $qry2['name'];?></option>
             <?php
			 }
			 ?>
            
            </select>
            <input type="password" name="password" id="password" placeholder="Password" value="<?php echo $q3['password'];?>"/>

            <button type="submit" id="submitform" class="btn btn-default">Save</button><span id="useroutput" class="output"></span>

          </form>
<?php
}
}
?>
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

