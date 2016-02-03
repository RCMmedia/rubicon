<?php
/**
 * Template for displaying the footer
 *
 * Contains the closing of the id=main div and all content
 * after. Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	</div><!-- #main -->
	
<!--
	<?php if (is_page_template( "page_templates/page-mainmenu.php" ) ){ ?>	
	<div class="veggies">
		<img src="<?php bloginfo('template_url') ?>/images/menu/menu_veggies.png" alt="menu_veggies" width="344" height="321" />
	</div>
	<?php } ?>
-->
	<?php if ( !is_singular( 'location' ) && !is_page_template( 'page_templates/page-mainmenu.php' ) && !is_page_template( 'page_templates/page-maincatering.php' ) ) { ?>
	<div id="footer" role="contentinfo">
		<a href="https://www.facebook.com/RubiconDeli"><img src="<?php bloginfo('template_url') ?>/images/social-fb.jpg" /></a>
		<a href="http://instagram.com/rubicondeli"><img src="<?php bloginfo('template_url') ?>/images/social-instagram.jpg" /></a>
		<a href="https://twitter.com/therubicondeli"><img src="<?php bloginfo('template_url') ?>/images/social-twitter.jpg" /></a>
		<a href="javascript:void(0)" class="trigger-overlay reviewus">REVIEW US</a>
		<a href="javascript:void(0)" class="trigger-overlay contact">CONTACT US</a>
		<a href="javascript:void(0)" class="trigger-overlay newsletter">NEWSLETTER</a>
		<a href="<?php bloginfo('url') ?>/mustards" class="mustard_footer" >NOW SELLING MUSTARD</a>
	</div><!-- #footer -->
	<?php } ?>
	
</div><!-- #wrapper -->

<div class="switch-general">
	<div class="overlay-inner clearfix">
		<div class="left_col">
			<a href="https://www.bringittome.com/order/restaurant/rubicon-deli-menu/141" target="_blank"><img src="<?php bloginfo('template_url') ?>/images/bring-it-to-me.jpg"/></a>
			<a href="<?php bloginfo('url') ?>/mustards"><img src="<?php the_field('off_the_wall_overlay_image', 'option'); ?>"/></a>
		</div><!-- .overlay-inner -->
		<div class="right_col">
			<div class="gform-wrap">
				<a class="trigger-overlay close" style="display: none;"><img src="<?php bloginfo('template_url') ?>/images/overlay-close.png"/></a>
						
						<?php if ( is_page_template( 'page_templates/page-jobs.php' ) ) { ?>
							<div class="form-wrap-jobs" style="display: none">
								<h2>Application Form</h2>
								<?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]'); // jobs form ?>
							</div>							
						<?php } ?>
						
						<?php if ( is_page_template( 'page_templates/page-donations.php' ) ) { ?>
							<div class="form-wrap-donations" style="display: none">
								<h2>Donations Form</h2>
								<?php echo do_shortcode('[gravityform id="7" title="false" description="false" ajax="true"]'); // donations form ?>
							</div>
						<?php } ?>
						
<!--
						<?php if ( is_page_template( 'page_templates/page-donation.php' ) ) { ?>
							<div class="form-wrap-location" style="display: none">
								<h2>Donations Form</h2>
								<?php echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true"]'); // location form ?>
							</div>
						<?php } ?>
-->

					<div class="form-wrap-contactus" style="display: none">
						<h2>Contact Us</h2>
						<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); //general contact form ?>
					</div>
					
					<div class="form-wrap-newsletter">
						<h2>Join Our Newsletter</h2>
						<?php echo do_shortcode('[gravityform id="6" title="false" description="false" ajax="true"]'); ?>
					</div>
					
					<div class="review-module" style="display: none">
						
						<div class="stars_wrap">
							<div class="cta">
								How are we doing? <br> 
								Your <span class="blue">feedback</span> is important to us!
							</div><!-- .my_title -->
							<div class="stars">
								<input type="radio"  id="choice_1star" value="1star" class="star-1 star">
								<label onclick="ga('send', 'event', 'Review Module', 'Click', '1 Star');" id="label_1star" class="star-1"></label>
								
								<input type="radio"  id="choice_2star" value="2star" class="star-2 star">
								<label onclick="ga('send', 'event', 'Review Module', 'Click', '2 Star');"  id="label_2star" class="star-2"></label>
								
								<input type="radio"  id="choice_3star" value="3star" class="star-3 star">
								<label onclick="ga('send', 'event', 'Review Module', 'Click', '3 Star');"  id="label_3star" class="star-3"></label>
								
								<input type="radio"  id="choice_4star" value="4star" class="star-4 star">
								<label onclick="ga('send', 'event', 'Review Module', 'Click', '4 Star');"  id="label_4star" class="star-4"></label>
								
								<input type="radio"  id="choice_5star" value="5star" class="star-5 star">
								<label onclick="ga('send', 'event', 'Review Module', 'Click', '5 Star');"  id="label_5star" class="star-5"></label>
								<span></span>
							</div> <!-- .stars -->
						</div><!-- .stars_wrap -->
						
						<div class="review-form" style="display: none">
							<p>I'm sorry to hear that you did not have a pleasant dining experience at Rubicon Deli. Our goal is to provide you with the finest customer service and leave you with a memorable experience. We would love to hear your feedback, and we will do everything that we can to resolve any issues. We value your comments and feedback.<br>
- Rubicon Deli Management </p>
							<?php echo do_shortcode('[gravityform id="5" title="false" description="false" ajax="true"]'); //review contact form ?>
						</div>
						
						<div class="review-sites" style="display: none">
							<div class="cta">Please pick your review site of choice and take a quick moment to write us a review. Tell us about your experience or about your favorite roll, drink, or waiter/waitress! We appreciate and value your feedback.</div>
							<?php
								if ( get_field('location_facebook_link')){
									 	echo ('<a href="'.get_field('location_facebook_link').'" class="social-icon facebook"></a>'); 
								} else {
										echo('<a href="https://www.facebook.com/RubiconDeli" class="social-icon facebook"></a>');
								}
								?>
								
							<?php
								if ( get_field('location_google_plus_link')){
									 	echo ('<a href="'.get_field('location_google_plus_link').'" class="social-icon google"></a>'); 
								} else {
										echo('<a href="https://plus.google.com/117426444200055406259/about" class="social-icon google"></a>');
								}
								?>
								
							<?php
								if ( get_field('location_yelp_link')){
									 	echo ('<a href="'.get_field('location_yelp_link').'" class="social-icon yelp"></a>'); 
								} else {
										echo('<a href="http://www.yelp.com/biz/rubicon-deli-san-diego" class="social-icon yelp"></a>');
								}
								?>
						</div><!-- .review-sites -->
						
					</div><!-- .review-module -->
					
					
			</div><!-- .gform-wrap -->
		</div>
	</div>
</div><!-- .overlay -->


<?php// if (is_mobile()) { ?>
<div class="switch-mobile">
	<div class="overlay-inner">
		<ul class="nav">
			<li><a class="mobile toggle_secondary_menu menu">MENU</a>
				<?php wp_nav_menu( array( 'menu_class' => 'sub_menu menu', 'theme_location' => 'menu','container' => '') ); ?>
<!--
				<ul class="sub_menu menu" >
		  	 	<li><a href="#">MISSION BEACH - San Diego<span></span></a></li>
		  	 	<li><a href="#">Mission Hills - San Diego<span></span></a></li>
		  	 	<li><a href="#">RENO - NEVADA<span></span></a></li>
		 		</ul>
--><!-- .sub_menu -->
			</li>
			<li><a class="mobile toggle_secondary_menu catering">CATERING</a>
				<?php wp_nav_menu( array( 'menu_class' => 'sub_menu catering', 'theme_location' => 'catering','container' => '') ); ?>
			</li>
			<li>
				<a class="mobile toggle_secondary_menu order-online">ORDER ONLINE</a>
				<ul class="sub_menu order-online" >
			 		<li><a href="https://www.bringittome.com/order/restaurant/rubicon-deli-menu/141" target="_blank">Delivery by: BringItToMe.com</a></li>
		  	 	<li><a class="order-link" href="https://therubicondeli.brinkpos.net/order/default.aspx" target="_blank">Pickup<span></span></a></li>
				</ul><!-- .sub_menu -->
			</li>
			<li>
				<a class="mobile toggle_secondary_menu locations">LOCATIONS</a>
				<?php wp_nav_menu( array( 'menu_class' => 'sub_menu locations', 'theme_location' => 'locations','container' => '') ); ?>
			</li>
			<li>
				<a class="mobile toggle_secondary_menu culture">CULTURE</a>
				<?php wp_nav_menu( array( 'menu_class' => 'sub_menu culture', 'theme_location' => 'culturemenu','container' => '') ); ?>
			</li>
		</ul><!-- .nav -->
	</div>
</div><!-- .overlay -->
<?php// } ?>
<script src="<?php bloginfo('template_url') ?>/inc/globals/js/wow.js"></script>
<script src="<?php bloginfo('template_url') ?>/inc/globals/js/isotope.js"></script>
<script>
	
	//conditional logic to show secondary menu on the right pages
	<?php if (is_page_template("page_templates/page-jobs.php" ) || 
						is_page_template("page_templates/page-donations.php" ) || 
						is_page_template("page_templates/page-press.php" ) || 
						is_page_template("page_templates/page-who-the-chef.php")||
						is_page_template("page.php")|| 
						is_page_template("page_templates/page-aboutus.php") ) { ?>
		jQuery(".secondary_menu").addClass("active");
		jQuery(".sub_menu").removeClass("active slideToggle");
		jQuery(".sub_menu.culture").toggleClass("active slideToggle");
		jQuery(".sub_menu.catering").removeClass("active slideToggle");
	<?php } ?>
	
	<?php if (is_singular( "location" ) || is_page( 'la-jolla-coming-soon' )  ){ ?>
		jQuery(".secondary_menu").addClass("active");
		jQuery(".sub_menu").removeClass("active slideToggle");
		jQuery(".sub_menu.locations").toggleClass("active slideToggle");
		jQuery(".sub_menu.catering").removeClass("active slideToggle");
	<?php } ?>
	
	<?php if (is_page_template( "page_templates/page-mainmenu.php" ) ){ ?>						
		jQuery(".secondary_menu").addClass("active");
		jQuery(".sub_menu").removeClass("active slideToggle");
		jQuery(".sub_menu.catering").removeClass("active slideToggle");
		jQuery(".sub_menu.menu").toggleClass("active slideToggle");
	<?php } ?>
	
	<?php if (is_page_template( "page_templates/page-delivery.php" ) ){ ?>						
		jQuery(".secondary_menu").addClass("active");
		jQuery("#main").addClass("submenu_active_big");
		jQuery(".sub_menu").removeClass("active slideToggle");
		jQuery(".sub_menu.order-online").toggleClass("active slideToggle");
	<?php } ?>
	
	<?php if (is_page_template( "page_templates/page-maincatering.php" ) ){ ?>						
		jQuery(".secondary_menu").addClass("active");
		jQuery(".sub_menu").removeClass("active slideToggle");
		jQuery(".sub_menu.order-online").removeClass("active slideToggle");
		jQuery(".sub_menu.catering").toggleClass("active slideToggle");
	<?php } ?>
	
	
	
	
			// open general overlay in modal dialog
			 new WOW().init();
			 
			// open contact us dialog 
			jQuery(document).on("click", ".trigger-overlay.contact", function () {
				jQuery(".switch-general").addClass("overlay general").removeClass("switch-general").show();
				jQuery(".overlay.general").toggleClass("open");
				jQuery(".gform-wrap .trigger-overlay.close").show()
				//hide other forms
				jQuery(".form-wrap-jobs").hide();
				jQuery(".form-wrap-donations").hide();
				jQuery(".review-module").hide();
				jQuery("form-wrap-newsletter").hide();
				//show desired form
				jQuery(".form-wrap-contactus").show();
				jQuery(".form-wrap-newsletter").hide();
			});
			
			// open newsletter us dialog 
			jQuery(document).on("click", ".trigger-overlay.newsletter", function () {
				jQuery(".switch-general").addClass("overlay general").removeClass("switch-general").show();
				jQuery(".overlay.general").toggleClass("open");
				jQuery(".gform-wrap .trigger-overlay.close").show()
				//hide other forms
				jQuery(".form-wrap-jobs").hide();
				jQuery(".form-wrap-donations").hide();
				jQuery(".review-module").hide();
				jQuery(".form-wrap-contactus").hide();
				//show desired form
				jQuery(".form-wrap-newsletter").show();
			});
			
			
			// open review us dialog 
			jQuery(document).on("click", ".trigger-overlay.reviewus", function () {
				jQuery(".switch-general").addClass("overlay general").removeClass("switch-general").show();
				jQuery(".overlay.general").toggleClass("open");
				jQuery(".gform-wrap .trigger-overlay.close").show()
				//hide other forms
				jQuery(".form-wrap-jobs").hide();
				jQuery(".form-wrap-donations").hide();
				jQuery(".form-wrap-contactus").hide();
				jQuery(".form-wrap-newsletter").hide();
				//show desired form
				jQuery(".review-module").show();
			});
			
			// open Jobs us dialog 
			jQuery(document).on("click", ".trigger-overlay.jobs", function () {
				jQuery(".switch-general").addClass("overlay general").removeClass("switch-general").show();
				jQuery(".overlay.general").toggleClass("open");
				jQuery(".gform-wrap .trigger-overlay.close").show()
				//hide other forms
				jQuery(".form-wrap-contactus").hide();
				jQuery(".form-wrap-donations").hide();
				jQuery(".form-wrap-newsletter").hide();
				jQuery(".review-module").hide();
				//show desired form
				jQuery(".form-wrap-jobs").show();
			});
			
			// open donations form dialog 
			jQuery(document).on("click", ".trigger-overlay.donations", function () {
				jQuery(".switch-general").addClass("overlay general").removeClass("switch-general").show();
				jQuery(".overlay.general").toggleClass("open");
				jQuery(".gform-wrap .trigger-overlay.close").show()
				//hide other forms
				jQuery(".form-wrap-contactus").hide();
				jQuery(".form-wrap-jobs").hide();
				jQuery(".review-module").hide();
				jQuery(".form-wrap-newsletter").hide();
				//show desired form
				jQuery(".form-wrap-donations").show();
			});
			
			//Close Overlay
			jQuery(document).on("click", ".trigger-overlay.close", function () {
				jQuery(".overlay").toggleClass("open");
			});
			

			//increase padding for overlay when secondary menu is active
			jQuery(document).on("click", ".toggle_secondary_menu", function () {
				jQuery(".switch-general, .overlay.open").removeClass("submenu_active_big");
				jQuery(".switch-general, .overlay.open").addClass("submenu_active");
			});
			//increase padding for overlay when BIG secondary menu is active
			jQuery(document).on("click", ".toggle_secondary_menu.order-online", function () {
				jQuery(".switch-general, .overlay.open").removeClass("submenu_active");
				jQuery(".switch-general, .overlay.open").addClass("submenu_active_big");
			});
			
			
			//increase padding for #main div when submenu is active
			jQuery(document).on("click", ".toggle_secondary_menu", function () {
				jQuery("#main").removeClass("submenu_active_big");
				jQuery("#main").addClass("submenu_active");
			});		
			//increase padding for #main div when BIG submenu is active
			jQuery(document).on("click", ".toggle_secondary_menu.order-online", function () {
				jQuery("#main").removeClass("submenu_active");
				jQuery("#main").addClass("submenu_active_big");
			});
			

			// open mobile overlay in modal dialog
			jQuery(document).on("click", "#nav-toggle", function () {
				jQuery(".switch-mobile").addClass("overlay mobile").removeClass("switch-mobile").show();
				jQuery(".overlay.mobile").toggleClass("open");
			});
			
			
			//Mobile Menu
			jQuery('.mobile.toggle_secondary_menu').click(function () {
				jQuery(this).next('.sub_menu').addClass("slideToggle");
				jQuery(this).parent().siblings().children().next().removeClass("active slideToggle");
			      return false;
			});
			jQuery(document).on("click", ".toggle_secondary_menu.menu", function () {
				jQuery(".secondary_menu").addClass("active");
				jQuery(".sub_menu").removeClass("active slideToggle");
				jQuery(".sub_menu.menu").toggleClass("active slideToggle");
			});	
			jQuery(document).on("click", ".toggle_secondary_menu.catering", function () {
				jQuery(".secondary_menu").addClass("active");
				jQuery(".sub_menu").removeClass("active slideToggle");
				jQuery(".sub_menu.catering").toggleClass("active slideToggle");
			});			
			jQuery(document).on("click", ".toggle_secondary_menu.order-online", function () {
				jQuery(".secondary_menu").addClass("active");
				jQuery(".sub_menu").removeClass("active slideToggle");
				jQuery(".sub_menu.order-online").addClass("active slideToggle");
			});
			jQuery(document).on("click", ".toggle_secondary_menu.locations", function () {
				jQuery(".secondary_menu").addClass("active");
				jQuery(".sub_menu").removeClass("active slideToggle");
				jQuery(".sub_menu.locations").addClass("active slideToggle");
			});
			jQuery(document).on("click", ".toggle_secondary_menu.culture", function () {
				jQuery(".secondary_menu").addClass("active");
				jQuery(".sub_menu").removeClass("active slideToggle");
				jQuery(".sub_menu.culture").addClass("active slideToggle");
			});			
			
			
			//fadin body
			jQuery("body").delay(1000).queue(function(){
				jQuery(this).addClass("fadein loaded").clearQueue();
			});
			//content order line module
			jQuery(document).on("click", ".toggle-order-online", function () {
				jQuery(".order-online-links").slideToggle();
			});
			//mobile menu button class toggle
			jQuery(document).on("click", "#nav-toggle", function () {
				jQuery("#nav-toggle").toggleClass("active");
			});
			//scroll to top of page after clicking on footer contact.
			jQuery('.trigger-overlay.contact').click(function() {
				jQuery('html, body').animate({
    	    scrollTop: jQuery("body").offset().top
    		}, 1000);
			});
			
			//review star logic
			jQuery("label.star-1").click(function() {
  		  jQuery(".stars_wrap").fadeOut(function() {
					jQuery(".review-form").fadeIn();
				});
  		});			
	  	jQuery("label.star-2").click(function() {
  		  jQuery(".stars_wrap").fadeOut(function() {
					jQuery(".review-form").fadeIn();
				});
 			});			
	  	jQuery("label.star-3").click(function() {
  		  jQuery(".stars_wrap").fadeOut(function() {
					jQuery(".review-form").fadeIn();
				});
  		}); 		
	  	jQuery("label.star-4").click(function() {
  		  jQuery(".stars_wrap").fadeOut(function() {
					jQuery('.review-sites').fadeIn();
				});
  		});			
	  	jQuery("label.star-5").click(function() {
  		  jQuery(".stars_wrap").fadeOut(function() {
					jQuery('.review-sites').fadeIn();
				});
  		});
  		
  		//crubcatcher description logic
  		jQuery("img.mascot").click(function() {
				jQuery(".mascot-description").slideToggle();				
			});
			
			//see more smooth anchor
			jQuery(document).on('touchstart click', '.see-more-container', function () {
				jQuery('html, body').delay(500).animate({
					scrollTop: jQuery('#main').offset().top
	   		}, 1000);
			});


				
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-59242041-5', 'auto');
  ga('send', 'pageview');

</script>
<?php wp_footer(); ?>
</body>
</html>
