<?php
/*
	Template Name: About Us
*/


get_header(); ?>

<div class="aboutus">
	<div class="banner">
		<img class="dimmer" src="<?php bloginfo('template_url') ?>/images/banner-overlay.png" alt="bg-overlay" width="1118" height="726" />
		<div class="inner">
	 	   
			<div class="vertical-align clearfix wow fadeIn" data-wow-delay="1s">
	 	 	  <?php if(get_field('masthead')) { ?>
					<h1><?php the_field('banner_title'); ?></h1>
				<?php	} ?>
	 	 	  
				<div class="quote">
					<div class="quote-left">
						<img  src="<?php bloginfo('template_url') ?>/images/aboutus/quote-left.png" alt="quote-left" width="33" height="28" />
					</div><!-- .quote-left -->
					<h2><?php the_field('banner_quote'); ?></h2>
					<div class="quote-right">
		 				<img src="<?php bloginfo('template_url') ?>/images/aboutus/quote-right.png" alt="quote-right" width="32" height="28" />
		 			</div>	<!-- .quote-right -->
		 		</div><!-- .quote -->
		 		
		 		<h3 class="author">- <?php the_field('banner_quote_author'); ?></h3>
		 		
				</div><!-- .vertical-align -->
				
			</div><!-- .inner -->
		</div><!-- .banner -->
		
		<div class="content">
  	<div class="inner clearfix">
 			<h2>A Little About Us</h2>
 			<div class="icon-wrap">
 				<div class="icon wow bounceInDown" data-wow-delay=".2s">
 				  <img src="<?php bloginfo('template_url') ?>/images/aboutus/cali.png" alt="cali" width="175" height="206" />
 		 		</div><!-- .icon -->
 		 		<div class="icon last wow bounceInDown" data-wow-delay="1.2s">
 				  <img src="<?php bloginfo('template_url') ?>/images/aboutus/chicken.png" alt="chicken" width="252" height="199" />
 		 		</div><!-- .icon -->
 		 		<div class="icon wow bounceInDown" data-wow-delay=".7s">
 				  <img src="<?php bloginfo('template_url') ?>/images/aboutus/harris-ranch.png" alt="harris-ranch" width="296" height="201" />
 		 		</div><!-- .icon -->
 		 		<div class="border wow fadeIn">
 		 			<img src="<?php bloginfo('template_url') ?>/images/homepage/border.png" alt="border" />
 		 			<img class="tagline" src="<?php bloginfo('template_url') ?>/images/aboutus/about-us-content-title.png" alt="about-us-content-title" width="352" height="35" />
 		 		</div><!-- .border -->
 			</div>
 		 	<div class="left-content">
	 		 <?php the_field('aboutus_left_content'); ?>
		
<!--
 		 		<p class="wow fadeIn">How is it possible that our sandwiches are so much bigger AND so much better than the other guys?  Well, it didn’t happen overnight. In an industry long plagued with low quality, over processed foods and “freaky fast” ideals, the Rubicon Deli has spent the last 20 years cultivating “the well bread sandwich”</p>
 		 		<p class="wow fadeIn">Our giant loaves of freshly baked, flavorful breads have been a defining image of our sandwiches since ’94, but its between the bread is where we hang our hat. We roast our own Turkey and Tri-Tip, and grill our chicken over an open flame every single day. We source from farms rather than factories whenever possible, meaning we spend a lot more on our ingredients than many other restaurants do. We visit the farms where we buy our produce to learn about how their harvesting, crop rotation, and traceability programs work.  We believe in something bigger than the bottom line and that’s why put an incredible amount of time into what we put into you.</p> 
-->		 		
 		 	</div><!-- .left-content -->
 		 	<div class="right-content">
	 		 	<?php the_field('aboutus_right_content'); ?>
<!--
 		 		<p class="wow fadeIn">We carry on these ideals and positive environmental practices throughout the rest of our menu with our truly healthy “best dressed salads,” comforting side dishes, soups, organic  iced teas, lemonades, craft sodas and local beer selections.</p>
 		 		<p class="wow fadeIn">Locations boast trendy and definitively dapper industrial settings with outdoor seating, great music, and upbeat friendly service. </p>
-->
<!--  		 		<img class="border wow fadeIn" src="<?php bloginfo('template_url') ?>/images/aboutus/aboutus-sando.png" alt="aboutus-sando" width="394" height="240" /> -->
 		 	</div><!-- .right-content -->
			
 		 	<div class="border wow fadeIn">
 		 		<img src="<?php bloginfo('template_url') ?>/images/homepage/border-bottom.png" alt="border" />
 		 	</div><!-- .border -->
			
		</div><!-- .inner -->
  	 
	
   </div><!-- .content -->
   <div class="mascot-footer">
				
				<div class="salad-box left wow slideInLeft">
					<img src="<?php bloginfo('template_url') ?>/images/aboutus/aboutus-footer-left.png" alt="aboutus-footer-left" width="142" height="273" />
				</div><!-- .salad-box -->
				<div class="salad-box right wow slideInRight">
					<img src="<?php bloginfo('template_url') ?>/images/aboutus/aboutus-footer-right.png" alt="aboutus-footer-right" width="147" height="279" />
				</div><!-- .salad-box -->
				
				<div class="inner">
					<div class="mascot-wrap">
						<img class="tooltip" src="<?php bloginfo('template_url') ?>/images/tooltip-clickme.png" alt="tooltip-clickme" width="65" />
						<img class="mascot" src="<?php bloginfo('template_url') ?>/images/wtc/mascot-head.png" alt="mascot" title="click me to get to know me ;-)" width="96" height="142" />
						<img class="mascot-bowtie" src="<?php bloginfo('template_url') ?>/images/wtc/mascot-bowtie.png"/>
					</div>
					<div class="mascot-description" style="display: none;">
						Mr. Crumbcatcher,  aptly named after his functional upper lip., is not only well bred but extremely well fed. Our dapper mascot thrives on a diet composed entirely of Rubicon Deli sandwiches, to which he attributes his good looks, keen left eye sight, and uncanny wisdom.  His message as simple as is it true "what ever you do, do it well."
					</div>
					<h1>&mdash; Well Bread Sandwiches &mdash;</h1>
					<div>
						<a class="toggle-order-online"><img src="<?php bloginfo('template_url') ?>/images/homepage/order-online.png" alt="order-online" /></a>
					</div>
					<div class="order-online-links">
						<a class="pickup" href="https://therubicondeli.brinkpos.net/order/default.aspx" target="_blank">Pickup</a>
						<a class="delivery" href="https://postmates.com/sd/rubicon-deli-san-diego" target="_blank">Delivery</a>
					</div>
				</div><!-- .inner -->
				
				<div class="salad-box bottom-left wow slideInUp">
					<img src="<?php bloginfo('template_url') ?>/images/aboutus/aboutus-footer-bottom-left.png" alt="aboutus-footer-bottom-left" width="307" height="121" />
				</div><!-- .salad-box -->
				<div class="salad-box bottom-right wow slideInUp">
					<img src="<?php bloginfo('template_url') ?>/images/aboutus/aboutus-footer-bottom-right.png" alt="aboutus-footer-bottom-right" width="309" height="126" />
				</div><!-- .salad-box -->
				
			</div><!-- .order-online -->

	
</div><!-- .aboutus -->

<?php// get_sidebar(); ?>
<?php get_footer(); ?>
