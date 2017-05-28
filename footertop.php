<section id="footer-top">
  <div class="container">
    <div class="row white_bg">
      <div class="col-md-6 footer-about">
        <h4>About Us</h4>
        <p style="text-align:justify;">Radix beauty is providing a good platform to increase the business on your beauty parlour, Have you just kick started your Beauty Salon business or already own a Beauty Parlour but not getting enough customers to know about you? Yes radixbeauty.com is right place can help to increase numbers of customer visit your beauty parlour/ saloon guaranteed...</p>
        <img alt="logo" src="images/logo.png"> </div>
      <!-- /col-md-3 -->
      <div class="col-md-3">
        <h4>Links</h4>
        <ul class="footer-links">
          <li><a href="about.php">About us</a></li>
          <!--<li><a href="allservices.php">Services</a></li>-->
           <?php
	 if(!isset($_SESSION['username']))
	{
	?>
          <li><a data-toggle="modal" href="#myBusinessModal">List Your Business</a></li>
          <li><a data-toggle="modal" href="#mySignUpModal">Regiter With Us</a></li>
          <li><a data-toggle="modal" href="#myLoginModal">Login</a></li>
          <li><a data-toggle="modal" href="#mySellerLoginModal">Seller Login</a></li>
          <?php
}
?>
          <li><a href="contact.php">Contact us</a></li>
        </ul>
      </div>
      <!-- /col-md-3 -->
     <!-- <div class="col-md-3">
        <h4>News</h4>
        <ul class="news">
          <li><a href="#">Coming Soon.</a></li>
          <li><a href="#">Coming Soon.</a></li>
          <li><a href="#">Coming Soon.</a></li>
          <li><a href="#">Coming Soon..</a></li>
        </ul>
      </div>-->
      <!-- /col-md-3 -->
      <div class="col-md-3 footer-contact">
        <h4>Contact</h4>
        <p><span>Adress</span><br>
          B-303 Oxfrod Avenue income tax Ashram Road Ahmedabad-380009</p>
        <p><span>Phone Number</span> <br>
          7043760666</p>
        <p><span>Email</span><br>
          <a href="#">info@radixbeauty.com</a></p>
              </div>
              
    </div>
     <?php //include("googlead.php"); ?>
  </div>
</section>
<div class='modal fade' id="mySellerLoginModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">&#10006</span></button>
        <div class="large-heading">
        <h2><small>Seller Login!</small></h2>
        </div>
      </div>
      <form  method="post" action="doSellerLogin.php" class="form floating-labels" id="Sellerslick-login" name="Sellerslick-login" role="form" data-toggle="validator" novalidate>
     
        <div class="modal-notice">
          <div id="contact-form-result"></div>
        </div>
        <div id="template-contactform" class="modal-body">
          <div class="row bottom-10">
            <div class="col-md-6 form-group">
              <div class="icon">
                <label for="Username" class="cd-label">Username</label>
                <input placeholder="E-mail" name="Sellerusername" id="Sellerusername" type="email" required class="user form-control"/>
              </div>
            </div>
            
          </div>
          <div class="row bottom-10">
            <div class="col-md-6 form-group">
              <div class="icon">
                <label for="Password" class="cd-label">Password</label>
                <input placeholder="Password" name="Sellerpassword" id="Sellerpassword" type="password" required class="user form-control"/>
                 <input value="seller" name="Sellerusertype" id="Sellerusertype" type="hidden" required class="user form-control"/>
              </div>
            </div>
          </div>
          </div>
        <div class="modal-footer">
         <button type="submit" style="pointer-events: all; cursor: pointer;" id="Sellersend" name="Sellersend">Login</button><span id="Sellerloginmessage" class="message" style="padding-left:20px;"></span>
        </div>
      </form>
    </div>
  </div> 
</div>