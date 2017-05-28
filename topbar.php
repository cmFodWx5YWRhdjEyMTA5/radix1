<div class="topbar">
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
            <ul class="contactinfo">
              <li><a href="#"><i class="fa fa-phone-square"></i> +91-7043760666</a><br /></li>
              <li><a href="#"><i class="fa fa-envelope"></i> info@radixbeauty.com</a></li>
            </ul>
        </div>
        <div class="col-sm-8">
            <ul class="shop-menu pull-right">
              <!--<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>-->
              <?php
session_set_cookie_params(3600);
session_start();
$username = $_SESSION['username'];
$usertype = $_SESSION['usertype'];
if(!isset($_SESSION['username']))
{
	?>
   <li><a data-toggle="modal" href="#mySignUpModal"><i class="fa fa-lock"></i> Register</a></li>
              <li><a data-toggle="modal" href="#myLoginModal"><i class="fa fa-lock"></i> Login</a></li>
               <?php
}
else
{
if(isset($usertype) and $usertype == 'user')
{
?>

<li><a href="home.php"><i class="fa fa-lock"></i> My Account</a></li>
<li><a href="mypackages.php"><i class="fa fa-lock"></i> My Packages</a></li>
<li><a href="myservices.php"><i class="fa fa-lock"></i> My Services</a></li>
<li><a href="myreferral.php"><i class="fa fa-lock"></i> My Referral</a></li>
<li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>
<?php
}
else if(isset($usertype) and $usertype == 'seller')
{
?>
<li><a href="Sellerhome.php"><i class="fa fa-lock"></i> My Account</a></li>
<li><a href="Sellermypackages.php"><i class="fa fa-lock"></i> My Packages</a></li>
<li><a href="Sellermyservices.php"><i class="fa fa-lock"></i> My Services</a></li>
<li><a href="Sellermyreviews.php"><i class="fa fa-lock"></i> My Reviews</a></li>
<li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>
<?php
}
else
{
//echo "";
}
}
?>            </ul>
        </div>
      </div>
    </div>
  </div> 
 <div class='modal fade' id="myLoginModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">&#10006</span></button>
        <div class="large-heading">
        <h2><small>Login!</small></h2>
        </div>
      </div>
      <form  method="post" action="doLogin.php" class="form floating-labels" id="slick-login" name="slick-login" role="form" data-toggle="validator" novalidate>
     
        <div class="modal-notice">
          <div id="contact-form-result"></div>
        </div>
        <div id="template-contactform" class="modal-body">
          <div class="row bottom-10">
            <div class="col-md-6 form-group">
              <div class="icon">
                <label for="Username" class="cd-label">Username</label>
                <input placeholder="E-mail" name="username" id="username" type="email" required class="user form-control"/>
              </div>
            </div>
            
          </div>
          <div class="row bottom-10">
            <div class="col-md-6 form-group">
              <div class="icon">
                <label for="Password" class="cd-label">Password</label>
                <input placeholder="Password" name="password" id="password" type="password" required class="user form-control"/>
                <input value="user" name="usertype" id="usertype" type="hidden" required class="user form-control"/>
                <input value="<?php echo $_SERVER['REQUEST_URI'];?>" name="returnpage" id="returnpage" type="hidden" required class="user form-control"/>
              </div>
            </div>
          </div>
          </div>
        <div class="modal-footer">
         <button type="submit" style="pointer-events: all; cursor: pointer;" id="send" name="send">Login</button><span id="loginmessage" class="message" style="padding-left:20px;"></span>
        </div>
      </form>
    </div>
  </div> 
</div>
<div class='modal fade' id="mySignUpModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">&#10006</span></button>
        <div class="large-heading">
        <h2><small>New User Signup!</small></h2>
        </div>
      </div>
      <form  method="post" action="save_user.php" id="customForm" name="customForm" class="form floating-labels" role="form" data-toggle="validator" novalidate>
     
        <div class="modal-notice">
          <div id="contact-form-result"></div>
        </div>
        <div id="template-contactform" class="modal-body">
          <div class="row bottom-10">
            <div class="col-md-6 form-group">
              <div class="icon">
                <label for="Name" class="cd-label">Name</label>
                <input placeholder="Name" name="name" id="name" type="text" required class="user form-control"/>
              </div>
            </div>
            <div class="col-md-6 form-group">
              <div class="icon">
                <label for="Email Address" class="cd-label">Email Address</label>
                <input type="email" name="emailid" id="emailid" placeholder="Email Address" required class="user form-control"/>
               </div>
            </div>
          </div>
          <div class="row bottom-10">
            <div class="col-md-6 form-group">
              <div class="icon">
                <label for="Mobile Number" class="cd-label">Mobile Number</label>
                <input name="contactno" id="contactno" placeholder="Mobile Number" type="text" required class="user form-control"/>
                </div>
            </div>
            <div class="col-md-6 form-group">
              <div class="icon">
                <label for="Gender" class="cd-label">Gender</label>
               
                <select name="gender" id="gender" required class="user form-control">
             <option value="">Select</option>
            <option value="Male">Male</option>
             <option value="Female">Female</option>
            </select>
               </div>
            </div>
          </div>
          <div class="row bottom-10">
            <div class="col-md-6 form-group">
              <div class="icon">
                <label for="Password" class="cd-label">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" required class="user form-control"/>
                </div>
            </div>
            <div class="col-md-6 form-group">
              <div class="icon">
                <label for="City" class="cd-label">City</label>
               <select name="city" id="city" required class="user form-control">
               <option value="">Select</option>
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
               </div>
            </div>
          </div>
          </div>
        <div class="modal-footer">
         <button type="submit" style="pointer-events: all; cursor: pointer;" id="send" name="send">Signup</button><span id="signupmessage" class="message" style="padding-left:20px;"></span>
        </div>
      </form>
    </div>
  </div> 
</div>