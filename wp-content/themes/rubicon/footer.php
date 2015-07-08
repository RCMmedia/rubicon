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
		<a href="#" class="trigger-overlay contact">CONTACT US</a>
	</div><!-- #footer -->
	
</div><!-- #wrapper -->

<div class="switch-general">
	<div class="overlay-inner">
		<div class="left_col">
			<a href=""><img src="<?php bloginfo('template_url') ?>/images/overlay_order_online.jpg"/></a>
			<a href=""><img src="<?php bloginfo('template_url') ?>/images/overlay_reviews.jpg"/></a>
		</div><!-- .overlay-inner -->
		<div class="right_col">
			<div class="gform-wrap">
				<a class="trigger-overlay close" style="display: none;float: right;"><img src="<?php bloginfo('template_url') ?>/images/overlay-close.png"/></a>
				<h2>Contact Us</h2>
				<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
			</div><!-- .gform-wrap -->
		</div>
	</div>
</div><!-- .overlay -->


<?php if (is_mobile()) { ?>
<div class="switch-mobile">
	<div class="overlay-inner">
		<ul class="nav">
			<li><a class="mobile toggle_secondary_menu menu">MENU</a>
				<ul class="sub_menu menu" style="display:none">
		  	 	<li><a href="#">La Jolla - San Diego<span></span></a></li>
		  	 	<li><a href="#">MISSION BEACH - San Diego<span></span></a></li>
		  	 	<li><a href="#">Mission Hills - San Diego<span></span></a></li>
		  	 	<li><a href="#">RENO - NEVADA<span></span></a></li>
		 		</ul><!-- .sub_menu -->
			</li>
			<li><a class="mobile toggle_secondary_menu order-online">ORDER ONLINE</a>
				<ul class="sub_menu order-online" style="display:none">
		  	 	<li><a href="#">Pickup<span></span></a></li>
		  	 	<li><a href="#">Delivery<span></span></a></li>
				</ul><!-- .sub_menu -->
			</li>
			<li><a class="mobile toggle_secondary_menu locations">LOCATIONS</a>
				<ul class="sub_menu locations" style="display:none">
		  	 	<li><a href="#">La Jolla - San Diego<span></span></a></li>
		  	 	<li><a href="#">MISSION BEACH - San Diego<span></span></a></li>
		  	 	<li><a href="#">Mission Hills - San Diego<span></span></a></li>
		  	 	<li><a href="#">RENO - NEVADA<span></span></a></li>
		 		</ul><!-- .sub_menu -->
			</li>
			<li><a class="toggle_secondary_menu culture">CULTURE</a></li>
		</ul><!-- .nav -->
	</div>
</div><!-- .overlay -->
<?php } ?>

<script>
			// open general overlay in modal dialog
			jQuery(document).on("click", ".trigger-overlay.contact", function () {
				jQuery(".switch-general").addClass("overlay general").removeClass("switch-general").show();
				jQuery(".overlay.general").toggleClass("open");
				jQuery(".gform-wrap .trigger-overlay.close").show()
			});
			
			// open mobile overlay in modal dialog
			jQuery(document).on("click", "#nav-toggle", function () {
				jQuery(".switch-mobile").addClass("overlay mobile").removeClass("switch-mobile").show();
				jQuery(".overlay.mobile").toggleClass("open");
			});
			
			//increase padding for overlay when secondary menu is active
			jQuery(document).on("click", ".toggle_secondary_menu", function () {
				jQuery(".switch-general, .overlay.open").addClass("submenu_active");
			});
			
			jQuery(document).on("click", ".trigger-overlay.close", function () {
				jQuery(".overlay").toggleClass("open");
			});
			
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
			
			//Mobile Menu

		
				jQuery('.mobile.toggle_secondary_menu').click(function () {
			  	jQuery(this).next('.sub_menu').slideToggle();
					jQuery(this).parent().siblings().children().next().slideUp();
			        return false;
			    });
		
			
			
			jQuery("body").delay(1000).queue(function(){
				jQuery(this).addClass("fadein loaded").clearQueue();
				jQuery(".vertically_aligned").delay(1000).fadeIn("slow")
			});
			jQuery(document).on("click", ".toggle-order-online", function () {
				jQuery(".order-online-links").slideToggle();
			});
			jQuery(document).on("click", ".toggle-order-online", function () {
				jQuery(".order-online-links").slideToggle();
			});
			jQuery(document).on("click", "#nav-toggle", function () {
				jQuery("#nav-toggle").toggleClass("active");
			});
			jQuery('.trigger-overlay.contact').click(function() {
				jQuery('html, body').animate({
    	    scrollTop: jQuery("body").offset().top
    		}, 1000);
			});	
</script>
<?php
	/*
	 * Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
