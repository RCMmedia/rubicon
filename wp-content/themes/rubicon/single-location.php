<?php
/**
 * Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

	<div class="location-wrap">
		<div class="inner clearfix">
			
			<h1>Mission Hills- San Diego</h1>
			<div class="border">
				<img src="<?php bloginfo('template_url') ?>/images/homepage/border-bottom.png" alt="border" />
			</div><!-- .border -->
			<div class="content clearfix">
				<div class="left">
					<div class="button-wrap">
						<a class="menu" href=""><img src="<?php bloginfo('template_url') ?>/images/location/location-button-menu.png" alt="location-button-menu" width="103" height="30" /></a>
						<a class="catering" href=""><img src="<?php bloginfo('template_url') ?>/images/location/location-button-catering.png" alt="location-button-catering" width="162" height="30" /></a>
					</div><!-- .button-wrap -->
					
					<div class="location-address">
						<span>3715 India St<br> San Diego, CA 92103</span>
					</div><!-- .location-address -->
					
					<div class="location-phone">
						<span>(858) 488-3354</span>
					</div><!-- .location-phone -->

					<div class="location-hours">
						<span>Mon - Fri    10:00 am to 7:00 pm ??</span>
						<span>Mon - Fri    10:00 am to 7:00 pm ??</span>
					</div>
					
					<div class="location-social gray-border">
						<a class="facebook" href=""></a>
						<a class="instagram" href=""></a>
						<a class="twitter" href=""></a>
						<a class="yelp" href=""></a>
					</div><!-- .location-social -->
					
					<div class="email-signup gray-border">
						<h3>e-club Sign Up</h3>
						<form class="clearfix">
							<input type="text"/>
							<input class="newslette-button" value="" type="submit"/>
						</form>
					</div><!-- .email-signup -->
					
					<div class="leave-review gray-border">
						<a href="" class="trigger-overlay reviewus"><h3>Leave a review <img src="<?php bloginfo('template_url') ?>/images/press/readmore-arrow.png" alt="readmore-arrow" width="14"  /></h3></a>
					</div><!-- .review -->
					
					<div class="review-slider-wrap">
						<div class="review-slider">
							<div class="review-slide">
								<div class="left">
									<img src="<?php bloginfo('template_url') ?>/images/location/location-placeholder-review-image.png" alt="location-placeholder-review-image" width="91" height="91" />
									<div class="reviewer-name">Olin T.<br>San Diego, CA</div>
								</div>
								<div class="right">
									<div class="review-site">
										<span class="facebook"></span><img src="<?php bloginfo('template_url') ?>/images/location/location-icon-reviewstars.png" alt="location-icon-reviewstars" width="103" height="16" />
										<p>I was in Mission Beach last week at lunch time and I have been wanting to check out Rubicon for a while. Being parking... wasn't a challenge...was nice.</p>
										<a href="" class="readmore">Read More <img src="<?php bloginfo('template_url') ?>/images/location/readmore-arrow.png" alt="readmore-arrow" width="9" height="12" /></a>
									</div><!-- .review-site make that custom field with different classes for each review site -->
								</div><!-- .right -->
							</div>
						</div>
					</div>
					
				</div><!-- .left -->
				
				<div class="right">
									
					<div class="location-slider">
						<img src="<?php bloginfo('template_url') ?>/images/location/location-placeholder-slide1.jpg" alt="location-placeholder-slide1" width="669" height="314" />
<!--
						<img src="<?php bloginfo('template_url') ?>/images/location/location-placeholder-slide1.jpg" alt="location-placeholder-slide1" width="669" height="314" />
						<img src="<?php bloginfo('template_url') ?>/images/location/location-placeholder-slide1.jpg" alt="location-placeholder-slide1" width="669" height="314" />
-->
					</div><!-- .location-slider -->
					
					<div class="location-map">
						<img src="http://maps.google.com/maps/api/staticmap?center=32.742797,-117.112153&zoom=11&markers=32.742797,-117.180646&size=320x250&sensor=TRUE"/>
					</div><!-- .location-map -->
					
					<div class="specials-wrap">
						<div class="coupon"><img src="<?php bloginfo('template_url') ?>/images/location/location-placeholder-coupon.png" alt="location-placeholder-coupon" width="324" height="125" /></div>
						<div class="giftcards"><img src="<?php bloginfo('template_url') ?>/images/location/location-placeholder-giftcards.png" alt="location-placeholder-giftcards" width="324" height="125" /></div>
					</div><!-- .specials-wrap -->
					
				</div><!-- .right -->
				
			</div><!-- .content -->
			
		</div><!-- .inner -->
		
	</div><!-- .location-wrap -->


<?php get_footer(); ?>
