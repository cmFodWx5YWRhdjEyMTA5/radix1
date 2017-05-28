<?php include("config.php");?>
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

        <h4>Contact Us-2</h4>

      </div>

      <div class="col-md-6 text-right"> 

      	<a href="index.php">Home <i class="fa fa-angle-double-right"></i></a> <span>Contact Us</span> 

      </div>

    </div>

  </div>

</section>

<!-- section -->







<!-- Contact us -->

<section class="get-in-touch-2 padding_top">

    <div class="container">

        <div class="row">

            <div class="form-area-wrap">

                <div class="col-md-8 col-sm-8 col-xs-12">

                	<div class="form-area">

                    <form name="contactForm" method="post"  novalidate id="contact" class="contact-form" data-ng-controller='themeonCtrl'>

                        <div class="contact-heading">

                          <h4><strong>Get in touch</strong></h4>

                          </div>

                          <p class="subheading">Fill this form and let go !</p>

                          <div class="top-40 bottom-40">

                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error commodi ratione voluptas eveniet laudantium</p>

                          </div>

                            <div class="necessary-info">

                                <input id="name" class="contact-name" type="text" name="name" placeholder="John Doe *" required data-ng-model="contactformData.name"  data-ng-class="{'error' : contactForm.name.$error.pattern || submit && contactForm.name.$invalid}"/>

                                <input id="email" class="contact-mail" type="email" name="email" placeholder="Email *" required data-ng-model="contactformData.email"   data-ng-class="{'error' : contactForm.email.$error.pattern || submit && contactForm.email.$invalid}"/>

                                <input id="sub" class="contact-subject" type="text" name="subject" placeholder="Subject *" required data-ng-model="contactformData.subject" data-ng-class="{'error' : contactForm.subject.$error.required && contactForm.subject.$blured || submit && contactForm.subject.$invalid}"/>

                            </div>

                            <div class="message-send">

                                <textarea placeholder="Message *" id="message" name="message" data-ng-model="contactformData.message" required data-ng-class="{'error' : contactForm.message.$error.required && contactForm.message.$blured || submit && contactForm.message.$invalid}"></textarea>

                            </div>

                        <div class="col-xs-12">

                            <div class="submit-btn">

                                <a href="#" class=" hvr-ripple-out btn-slide animation animated-item-1">Submit</a>

                            </div>

                        </div>

                    </form>

                    <div style="display: none" id="contactSuccess">

                        <span>Hey! Thanks for reaching out. I will get back to you soon</span>

                    </div>

                </div>

                </div>

                <div class="col-md-4 col-sm-4 col-xs-12">

                	<div class="address-group bottom-40">

                      <h3>Address Line 1</h3>

                      <ul>

                          <li><i class="fa fa-phone"></i>Phone: +123.456.7890</li>

                          <li><i class="fa fa-map-marker"></i>Address: 200 Broadway Av</li>

                          <li><i class="fa fa-globe"></i>Website: en.example.com</li>

                          <li><i class="fa fa-envelope"></i>Email: contact@exaple.com</li>

                          </ul>

                          </div>

                          <div class="address-group">

                          <h3>Address Line 2</h3>

                          <ul>

                          <li><i class="fa fa-phone"></i>Phone: +123.456.7890</li>

                          <li><i class="fa fa-map-marker"></i>Address: 200 Broadway Av</li>

                          <li><i class="fa fa-globe"></i>Website: en.example.com</li>

                          <li><i class="fa fa-envelope"></i>Email: contact@exaple.com</li>

                      </ul>

                      </div>

                </div>

            </div>

        </div>

        <div class="maps padding_none">



 		<div style="width:100%;height:300px;" id="map">

            <iframe style="border:0;width:100%;height:300px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317716.364741452!2d-0.10159865000000001!3d51.52864165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon!5e0!3m2!1sen!2s!4v1398352500211"></iframe>

          </div>

</div>

    </div>

</section>









<!-- Footer top -->




<?php include("footertop.php"); ?>



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







<script src="js/jquery-2.1.4.js"></script> 

<script src="js/bootstrap.min.js"></script> 

<script src="js/owl.carousel.min.js"></script> <!-- /owl slider all--> 

<script src="js/wow.min.js"></script> 

<script type="text/javascript" src="js/js"></script>

<script src="js/gmaps.js"></script>

<script src="js/validate.min.js" type="text/javascript"></script>

<script src="js/jquery.mixitup.min.js"></script> 

<script src="js/jquery.appear.js"></script> 

<script src="js/jquery-countTo.js"></script> 

<script src="js/jquery.fancybox.js"></script> 

<!-- /logicsforest custom js --> 

<script src="js/custom-js.js"></script> 

</body>

</html>

