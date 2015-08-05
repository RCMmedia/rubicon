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
			
			<h1><?php the_field('location_name'); ?></h1>
			
			<div class="border">
				<img src="<?php bloginfo('template_url') ?>/images/homepage/border-bottom.png" alt="border" />
			</div><!-- .border -->
			
			<div class="content clearfix">
				<div class="left">
					<div class="button-wrap">
						<a class="menu" href="<?php the_field('location_menu_link'); ?>"><img src="<?php bloginfo('template_url') ?>/images/location/location-button-menu.png" alt="location-button-menu" width="103" height="30" /></a>
						<a class="catering" href="<?php the_field('location_catering_link'); ?>"><img src="<?php bloginfo('template_url') ?>/images/location/location-button-catering.png" alt="location-button-catering" width="162" height="30" /></a>
					</div><!-- .button-wrap -->
					
					<div class="location-address">
						<span><?php the_field('location_address'); ?></span>
					</div><!-- .location-address -->
					
					<div class="location-phone">
						<span><a href="tel:<?php the_field('location_phone'); ?>"><?php the_field('location_phone'); ?></a></span>
					</div><!-- .location-phone -->

					<div class="location-hours">
						<span><?php the_field('location_hours'); ?></span>
					</div>
					
					<div class="location-social gray-border">
						<?php if(get_field('location_facebook_link')) { ?>
							<a class="facebook" href="<?php the_field('location_facebook_link'); ?>" target="_blank"></a>
						<?php } ?>
						<?php if(get_field('location_instagram_link')) { ?>
							<a class="instagram" href="<?php the_field('location_instagram_link'); ?>" target="_blank"></a>
						<?php } ?>
						<?php if(get_field('location_twitter_link')) { ?>
							<a class="twitter" href="<?php the_field('location_twitter_link'); ?>" target="_blank"></a>
						<?php } ?>
						<?php if(get_field('location_yelp_link')) { ?>
							<a class="yelp" href="<?php the_field('location_yelp_link'); ?>" target="_blank" ></a>
						<?php } ?>
					</div><!-- .location-social -->
					
					<div class="email-signup gray-border">
						<h3>Rubi Rewards</h3>
						<?php echo do_shortcode('[gravityform id="6" title="false" description="false" ajax="true"]'); ?>
					</div><!-- .email-signup -->
					
					<div class="leave-review gray-border">
						<a href="#" class="trigger-overlay reviewus"><h3>Leave a review <img src="<?php bloginfo('template_url') ?>/images/press/readmore-arrow.png" alt="readmore-arrow" width="14"  /></h3></a>
					</div><!-- .review -->
					
					<div class="review-slider-wrap">
						<div class="review-slider">
							<div class="review-slide">
								<div class="left">
									<img src="<?php the_field('location_review_image'); ?>" alt="location-placeholder-review-image" width="91" height="91" />
									<div class="reviewer-name"><?php the_field('location_review_name'); ?></div>
								</div>
								<div class="right">
									<div class="review-site">
										<span class="facebook"></span><img src="<?php bloginfo('template_url') ?>/images/location/location-icon-reviewstars.png" alt="location-icon-reviewstars" width="103" height="16" />
										<p><?php the_field('location_review_text'); ?></p>
										<a href="<?php the_field('location_review_link'); ?>" class="readmore">Read More <img src="<?php bloginfo('template_url') ?>/images/location/readmore-arrow.png" alt="readmore-arrow" width="9" height="12" /></a>
									</div><!-- .review-site make that custom field with different classes for each review site -->
								</div><!-- .right -->
							</div>
						</div>
					</div>
					
				</div><!-- .left -->
				
				<div class="right">
									
					<div class="location-slider">
						<img src="<?php the_field('location_main_image'); ?>" alt="location-slide" width="669" height="314" />
<!--
						<img src="<?php bloginfo('template_url') ?>/images/location/location-placeholder-slide1.jpg" alt="location-placeholder-slide1" width="669" height="314" />
						<img src="<?php bloginfo('template_url') ?>/images/location/location-placeholder-slide1.jpg" alt="location-placeholder-slide1" width="669" height="314" />
-->
					</div><!-- .location-slider -->
					
					<div class="location-map">
						<a href="<?php the_field('locations_direction_link'); ?>" target="_blank"><img src="<?php the_field('location_map_image'); ?>"/>
							<div class="get_directions">Click to Get Directions</div>
						</a>
						
					</div><!-- .location-map -->
					
					<div class="specials-wrap">
						<div class="coupon"><a href="https://postmates.com/sd/rubicon-deli-san-diego" target="_blank"><img src="<?php bloginfo('template_url') ?>/images/postmates-cookies.jpg" alt="location-placeholder-coupon" /></a></div>
<!-- 						<div class="giftcards"><img src="<?php bloginfo('template_url') ?>/images/location/location-placeholder-giftcards.png" alt="location-placeholder-giftcards" width="324" height="125" /></div> -->
					</div><!-- .specials-wrap -->
					
				</div><!-- .right -->
				
			</div><!-- .content -->
			
			
		</div><!-- .inner -->
		<div class="veggies">
				<img src="<?php bloginfo('template_url') ?>/images/location/location-veggies.png" alt="location-veggies" width="147" height="197" />
			</div>
	</div><!-- .location-wrap -->


<?php get_footer(); ?>
