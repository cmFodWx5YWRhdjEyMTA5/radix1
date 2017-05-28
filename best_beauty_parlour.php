<section class="our_staff bg-grey padding_top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center wow fadeInDown"> <img src="images/heading-icon.png" alt="section heading">
        <h2>Best Beauty Parlour</h2>
      
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center wow fadeInDown">
        <div id="staff-slider">
         <?php
		 $q="select * from listings where confirmation='Yes' and active='Yes' ORDER BY RAND()";
		 $q1=mysql_query($q);
		 while($q2=mysql_fetch_array($q1))
		 {
		 ?>
          
          <div class="item">
            <div class="view view-fifth"> <?php 
						if($q2['image'] != '')
						{
						echo '<img src="data:image/jpeg;base64,'.base64_encode($q2['image']). ' " />' ;
						}
						else
						{
						
                   echo '<img src="../images/noimage.png" alt="No Image">';
                       
						}?>
              <div class="mask">
                <h2><?php echo ucwords($q2['companyname']);?></h2>
                <p><?php echo ucwords($q2['contactperson']);?></p>
                <ul class="staf_social">
                  <li><a href="<?php echo $q2['facebooklink'];?>"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="<?php echo $q2['twitterlink'];?>"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="<?php echo $q2['pinterestlink'];?>"><i class="fa fa-pinterest"></i></a></li>
                  <li><a href="<?php echo $q2['instagramlink'];?>"><i class="fa fa-instagram"></i></a></li>
                  <li><a href="<?php echo $q2['flickrlink'];?>"><i class="fa fa-flickr"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
         <?php
		 }
		 ?>
         
        </div>
      </div>
    </div>
  </div>
</section>