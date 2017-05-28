<header id="navigation" class="navigation affix-top" data-offset-top="2" data-spy="affix">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <nav class="navbar navbar-default"> 
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a> </div>
          
          <div class="fixed-collapse-navbar" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="about.php">About</a></li>
             <!-- <li class="dropdown"> <a data-toggle="dropdown" href="#">Services <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu">
                <?php
				$q="select * from Services order by Name asc limit 6";

  $q1=mysql_query($q);

  $q2=mysql_num_rows($q1);

  if($q2 > 0)

  {

  $count = 0;

  while($q3=mysql_fetch_array($q1))

  {

  $count = $count+1;

 

				?>
                  <li><a href="serviceslisting.php?id=<?php //echo base64_encode($q3['id']); ?>"><?php //echo $q3['Name']; ?></a></li>
                  <?php
				  }
				  }
				?>
                <li><a href="allservices.php">See All</a></li>
                </ul>
              </li>-->
              
               <!--<li class="dropdown"> <a data-toggle="dropdown" href="#">Packages <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu">
                <?php
				//$q="select * from Packages order by id asc limit 6";

  //$q1=mysql_query($q);

 // $q2=mysql_num_rows($q1);

 // if($q2 > 0)

 // {

 // $count = 0;

 // while($q3=mysql_fetch_array($q1))

 // {

 // $count = $count+1;

 

				?>
                  <li><a href="packageslisting.php?id=<?php //echo base64_encode($q3['id']); ?>"><?php //echo $q3['Name']; ?></a></li>
                  <?php
				 // }
				 // }
				?>
                <li><a href="allpackages.php">See All</a></li>
                </ul>
              </li>-->
              <li class="dropdown"> <a data-toggle="dropdown" href="#">Category <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu">
                  <?php
				$q="select * from Category order by Name asc limit 6";

  $q1=mysql_query($q);

  $q2=mysql_num_rows($q1);

  if($q2 > 0)

  {

  $count = 0;

  while($q3=mysql_fetch_array($q1))

  {

  $count = $count+1;

 

				?>
                  <li><a href="listing.php?id=<?php echo base64_encode($q3['id']); ?>"><?php echo $q3['Name']; ?></a></li>
                 <?php
				  }
				  }
				?>
                   <li><a href="listing.php?id=<?php echo base64_encode('all'); ?>">See All</a></li>
                </ul>
              </li>
              <!--<li class="dropdown"> <a data-toggle="dropdown" href="#">Product / Shope <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu">
                  <li><a href="product-page-1.php">Products</a></li>
                  <li><a href="product-details.php">Products Details</a></li>
                  <li><a href="checkout.php">Checkout Products</a></li>
                  <li><a href="cart.php">Cart Products</a></li>
                  <li><a href="shop.php">Products Shop</a></li>
                  <li><a href="login.php">Login Form For Products</a></li>
                </ul>
              </li>-->
              <!--<li class="dropdown"> <a data-toggle="dropdown" href="#">Contact Us <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu">
                  <li><a href="contact.php">Contact Us</a></li>
                  <li><a href="contact-2.php">Contact Us V2</a></li>
                </ul>
              </li>-->
              <li><a href="contact.php">Contact Us</a></li>
            </ul>
          </div>
        </nav>
      </div>
      <div class="col-md-2 booking">
      <!--<a class="btn-booking text-center try sans hvr-ripple-out" href="register.php" data-toggle="modal" data-target="#myModal">-->
     
     <?php
	 if(!isset($_SESSION['username']))
	{
	?>
     <a class="btn-booking text-center try sans hvr-ripple-out" data-toggle="modal" href="#myBusinessModal">
      <i class="fa fa-calendar"></i> List Your Business
      </a>
      <?php
}?>
      </div>
    </div>
  </div>
  
</header>
<div class='modal fade' id="myBusinessModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">&#10006 </span></button>
        <div class="large-heading">
        <h2><small>New Business Signup!</small></h2>
        </div>
      </div>
      <form  method="post" action="save_salon.php" id="businesscustomForm" name="businesscustomForm" class="form floating-labels" role="form" data-toggle="validator" novalidate>
     
        <div class="modal-notice">
          <div id="contact-form-result"></div>
        </div>
        <div id="template-contactform" class="modal-body">
          <div class="row bottom-10">
            <div class="col-md-6 form-group">
              <div class="icon">
                <label for="Business Name" class="cd-label">Business Name</label>
                <input placeholder="Business Name" name="cname" id="cname" type="text" required class="user form-control"/>
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
                <label for="Contact Person" class="cd-label">Contact Person</label>
                <input placeholder="Contact Person" name="name" id="name" type="text" required class="user form-control"/>
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
             <option value="<?php echo $qry2['id'];?>" <?php if($q3['city'] == $qry2['name']) { echo 'selected="selected"';}?> ><?php echo $qry2['name'];?></option>
             <?php
			 }
			 ?>
            
            </select>
               </div>
            </div>
          </div>
          <div class="row bottom-10">
            <div class="col-md-6 form-group">
              <div class="icon">
                <label for="Pincode" class="cd-label">Pincode</label>
                <input type="text" name="pincode" id="pincode" placeholder="Pincode" required class="user form-control"/>
                </div>
            </div>
            <div class="col-md-6 form-group">
              <div class="icon">
                <label for="Category" class="cd-label">Category</label>
               <select name="cat" id="cat" required class="user form-control">
               <option value="">Select</option>
           <?php



$r="select * from Category order by name";



$r1=mysql_query($r);



while($r2=mysql_fetch_array($r1))



{



?>



<option value="<?php echo $r2['id'];?>"><?php echo $r2['Name'];?></option>



 <?php



 }



 ?>
            
            </select>
               </div>
            </div>
          </div>
          </div>
        <div class="modal-footer">
         <button type="submit" style="pointer-events: all; cursor: pointer;" id="send" name="send">Signup</button><span id="businessmessage" class="message" style="padding-left:20px;"></span>
        </div>
      </form>
    </div>
  </div> 
</div>