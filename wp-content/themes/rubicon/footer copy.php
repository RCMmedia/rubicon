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

	<div id="footer" role="contentinfo">
		<a href=""><img src="<?php bloginfo('template_url') ?>/images/social-fb.jpg" /></a>
		<a href=""><img src="<?php bloginfo('template_url') ?>/images/social-instagram.jpg" /></a>
		<a href=""><img src="<?php bloginfo('template_url') ?>/images/social-twitter.jpg" /></a>
		<a href="javascript:void(0)" class="trigger-overlay contact">CONTACT US</a>
	</div><!-- #footer -->
	
</div><!-- #wrapper -->

<div class="switch-general">
	<div class="overlay-inner clearfix">
		<div class="left_col">
			<a href="https://therubicondeli.brinkpos.net/order/default.aspx"><img src="<?php bloginfo('template_url') ?>/images/free-cookies.jpg"/></a>
			<img src="<?php bloginfo('template_url') ?>/images/overlay_reviews.jpg"/>
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
							<div class="form-wrap-jobs" style="display: none">
								<h2>Donations Form</h2>
								<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); // donations form ?>
							</div>
						<?php } ?>
						
						<?php if ( is_page_template( 'page_templates/page-location.php' ) ) { ?>
							<div class="form-wrap-jobs" style="display: none">
								<h2>Donations Form</h2>
								<?php echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true"]'); // location form ?>
							</div>
						<?php } ?>

					<div class="form-wrap-contactus" style="display: none">
						<h2>Contact Us</h2>
						<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); //general contact form ?>
					</div>
					
					<div class="review-module" style="display: none">
						
						<div class="stars_wrap">
							<div class="cta">
								How are we doing? <br> 
								Your <span class="blue">feedback</span> is important to us!
							</div><!-- .my_title -->
							<div class="stars">
								<input type="radio"  id="choice_1star" value="1star" class="star-1 star">
								<label id="label_1star" class="star-1"></label>
								
								<input type="radio"  id="choice_2star" value="2star" class="star-2 star">
								<label id="label_2star" class="star-2"></label>
								
								<input type="radio"  id="choice_3star" value="3star" class="star-3 star">
								<label id="label_3star" class="star-3"></label>
								
								<input type="radio"  id="choice_4star" value="4star" class="star-4 star">
								<label id="label_4star" class="star-4"></label>
								
								<input type="radio"  id="choice_5star" value="5star" class="star-5 star">
								<label id="label_5star" class="star-5"></label>
								<span></span>
							</div> <!-- .stars -->
						</div><!-- .stars_wrap -->
						
						<div class="review-form" style="display: none">
							<p>I'm sorry to hear that you did not have a pleasant dining experience at Rubicon Deli. Our goal is to provide you with the finest customer service and leave you with a memorable experience. We would love to hear your feedback, and we will do everything that we can to resolve any issues. We value your comments and feedback.<br>
- Rubicon Deli Management </p>
							<?php echo do_shortcode('[gravityform id="5" title="false" description="false" ajax="true"]'); //review contact form ?>
						</div>
						
						<div class="review-sites" style="display: none">
							<div class="cta">Please pick your review site of choice and take a quick moment to write us a review. Tell us about your experience or about your favorite roll, drink, or waiter/waitress/bartender! We appreciate and value your feedback.</div>
							<a href="<?php the_field('facebook_link') ?>" class="social-icon facebook"></a>
							<a href="<?php the_field('google_link') ?>" class="social-icon google"></a>
							<a href="<?php the_field('yelp_link') ?>" class="social-icon yelp"></a>
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
				<?php// wp_nav_menu( array( 'menu_class' => 'sub_menu order-online', 'theme_location' => 'orderonline') ); ?>
				<ul class="sub_menu menu" >
		  	 	<li><a href="#">MISSION BEACH - San Diego<span></span></a></li>
		  	 	<li><a href="#">Mission Hills - San Diego<span></span></a></li>
		  	 	<li><a href="#">RENO - NEVADA<span></span></a></li>
		 		</ul><!-- .sub_menu -->
			</li>
			<li>
				<a class="mobile toggle_secondary_menu order-online">ORDER ONLINE</a>
				<ul class="sub_menu order-online" >
			 		<span>Get free cookies with each delivery order!</span>   
		  	 	<li><a href="https://therubicondeli.brinkpos.net/order/default.aspx" target="_blank">Pickup<span></span></a></li>
		  	 	<li><a href="https://postmates.com/sd/rubicon-deli-san-diego" target="_blank">Delivery<span></span></a></li>
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

<script>
	
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
				//show desired form
				jQuery(".form-wrap-contactus").show();
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
				jQuery(".review-module").hide();
				//show desired form
				jQuery(".form-wrap-jobs").show();
			});
			
			// open donations form dialog 
/*
			jQuery(document).on("click", ".donation-button .trigger-overlay", function () {
				jQuery(".switch-general").addClass("overlay general").removeClass("switch-general").show();
				jQuery(".overlay.general").toggleClass("open");
				jQuery(".gform-wrap .trigger-overlay.close").show()
				jQuery(".form-wrap-contactus").hide();
				jQuery(".form-wrap-jobs").hide();
				jQuery(".form-wrap-jobs").show();
			});
*/
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
				jQuery(this).parent().siblings().children().next().removeClass("slideToggle");
			      return false;
			});
			
			/*
			//toggle secondary mobile menu
			jQuery(document).on("click", ".toggle_secondary_menu", function () {
				jQuery("toggle_secondary_menu ").children(".secondary_menu").toggleClass("active");
				//jQuery(".secondary_menu").addClass("active");
				//jQuery(".sub_menu").removeClass("active");
				//jQuery(".sub_menu.menu").toggleClass("active");
			});
*/
			
			jQuery(document).on("click", ".toggle_secondary_menu.menu", function () {
				jQuery(".secondary_menu").addClass("active");
				jQuery(".sub_menu").removeClass("active");
				jQuery(".sub_menu.menu").toggleClass("active");
			});
			
			jQuery(document).on("click", ".toggle_secondary_menu.order-online", function () {
				jQuery(".secondary_menu").addClass("active");
				jQuery(".sub_menu").removeClass("active");
				jQuery(".sub_menu.order-online").addClass("active");
			});
			jQuery(document).on("click", ".toggle_secondary_menu.locations", function () {
				jQuery(".secondary_menu").addClass("active");
				jQuery(".sub_menu").removeClass("active");
				jQuery(".sub_menu.locations").addClass("active");
			});
			jQuery(document).on("click", ".toggle_secondary_menu.culture", function () {
				jQuery(".secondary_menu").addClass("active");
				jQuery(".sub_menu").removeClass("active");
				jQuery(".sub_menu.culture").addClass("active");
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
  		
  		//crubcatcher logic
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
<?php wp_footer(); ?>
</body>
</html>
