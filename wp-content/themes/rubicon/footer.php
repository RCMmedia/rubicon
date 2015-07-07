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

<div class="switch">
	<div class="overlay-inner">
		
		
		
		<div class="left_col">
			<a href=""><img src="<?php bloginfo('template_url') ?>/images/overlay_order_online.jpg"/></a>
			<a href=""><img src="<?php bloginfo('template_url') ?>/images/overlay_reviews.jpg"/></a>
			
		</div>
		<div class="right_col">
			<div class="gform-wrap">
				<a class="trigger-overlay close" style="display: none;float: right;"><img src="<?php bloginfo('template_url') ?>/images/overlay-close.png"/></a>
				<h2>Contact Us</h2>
				<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
			</div><!-- .gform-wrap -->
		</div>
	</div>
</div><!-- .overlay -->
<script>
	// open coupon form in modal dialog
			jQuery(document).on("click", ".trigger-overlay.contact", function () {
				jQuery(".switch").addClass("overlay").removeClass("switch").show();
				jQuery(".overlay").toggleClass("open");
				jQuery(".trigger-overlay.close").show()
			});
			
			//increase padding for overlay when secondary menu is active
			jQuery(document).on("click", ".toggle_secondary_menu", function () {
				jQuery(".switch, .overlay.open").toggleClass("submenu_active");
			});
			
			jQuery(document).on("click", ".trigger-overlay.close", function () {
				jQuery(".overlay").toggleClass("open");
			});
			
			jQuery(document).on("click", ".toggle_secondary_menu.menu", function () {
				jQuery(".secondary_menu").addClass("active");
				jQuery(".sub_menu").removeClass("active");
				jQuery(".sub_menu.menu").addClass("active");
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
			jQuery("body").delay(1000).queue(function(){
				jQuery(this).addClass("fadein loaded").clearQueue();
				jQuery(".vertically_aligned").delay(1000).fadeIn("slow")
			});
			jQuery(document).on("click", ".toggle-order-online", function () {
				jQuery(".order-online-links").slideToggle();
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
