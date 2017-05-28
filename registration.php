<?php include("config.php");?>
<!doctype html>

<html>

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="increase your business register your business with www.radixbeauty.com" />
<meta name="keywords" content="Best unisex saloon, women beauty parlour,beauty & spa,barbar & hair shop,beauty salon, on radixbeauty.com" />
<meta name="author" content="increase your business register your business with www.radixbeauty.com" />

<title>increase your business,Beauty saloon, GYM, Fitness center,unisex beauty parlour, SPA, register with www.radixbeauty.com"</title>

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
<script src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript">



$(document).ready(function()

{

    $('#customForm').on('submit', function(e)

    {

        e.preventDefault();

        

        //show uploading message

        $("#output").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Saving...Please Wait</span>');

        $(this).ajaxSubmit({

        target: '#output',

        success:  afterSuccess //call function after success

        });

    });

});

 

 function afterSuccess(value)



{

if(value == "Thanks for registering with us. Please check your email inbox or spambox to activate your account with us!")

{

$('#customForm').resetForm();

}



}

</script>
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

<?php include("topbar.php"); ?>

<?php include("header.php"); ?>

<!-- Header Ends --> 







<!-- Page Heading -->

<section id="page-heading">

  <div class="container">

    <div class="row">

      <div class="col-md-6">

        <h4>Spa Products</h4>

      </div>

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

          <h2>New Beauty Salon Signup!</h2>

          <form method="post" action="save_salon.php" id="customForm" name="customForm">
 			<input type="text" name="cname" id="cname" placeholder="Salon Name"/>
            <input type="text" name="name" id="name" placeholder="Contact Person"/>

            <input type="email" name="emailid" id="emailid" placeholder="Email Address"/>
            <input type="text" name="contactno" id="contactno" placeholder="Mobile Number"/>
			<select name="city" id="city" class="gender">
             <option value="">Select</option>
            <?php



$r="select * from location order by name";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['id'];?>"><?php echo $r2['name'];?></option>



 <?php



 }



 ?>
            </select>
            <input type="password" name="password" id="password" placeholder="Password"/>

            <button type="submit" id="submitform" class="btn btn-default">Signup</button><span id="output" class="output"></span>

          </form>

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

