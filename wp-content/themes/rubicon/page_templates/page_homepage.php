<?php
/*
	Template Name: Homepage
*/


get_header(); ?>

	<div class="video_banner_wrap">
		
		<img src="<?php bloginfo('template_url') ?>/images/homepage/placeholder_video_poster.jpg" />
		
		<div class="vertically_aligned" style="display: none;">
			<div><img src="<?php bloginfo('template_url') ?>/images/homepage/po-boy.png" alt="po-boy" width="88" height="88"></div>
			<h2>IPSUM DOLOR</h2>
			<h1>&mdash; Lorem ipsum dolor &mdash;</h1>
			<div><a class="toggle-order-online"><img src="<?php bloginfo('template_url') ?>/images/homepage/order-online.png" alt="order-online" /></a></div>
			<div class="order-online-links">
				<a class="pickup">Pickup</a>
				<a class="delivery">Delivery</a>
			</div>
		</div><!-- .vertically_aligned -->
	
	</div><!-- .video_banner_wrap -->
	
	<div class="border">
		<img src="<?php bloginfo('template_url') ?>/images/homepage/border.png" alt="border" />
		<img class="tagline" src="<?php bloginfo('template_url') ?>/images/homepage/tagline.png" alt="tagline" width="249" height="37" />
	</div><!-- .border -->
	
	<div class="featured clearfix">
		<div class="inner">
			
			<a href="">
				<div class="box">
					<img class="box-bg" src="<?php bloginfo('template_url') ?>/images/homepage/box-catering2.png" alt="catering" />
					<img class="catering-button" src="<?php bloginfo('template_url') ?>/images/homepage/box-catering-button.png"/>
				</div><!-- .box -->
			</a>
			
			<a href="">
				<div class="box loyalty">
					<img class="box-bg" src="<?php bloginfo('template_url') ?>/images/homepage/box-loyalty.jpg" alt="loyalty" />
					<img class="loyalty-text" src="<?php bloginfo('template_url') ?>/images/homepage/box-loyalty-text.png"/>
					<img class="loyalty-mascot" src="<?php bloginfo('template_url') ?>/images/homepage/box-loyalty-mascot2.png"/>
					<img class="loyalty-stash" src="<?php bloginfo('template_url') ?>/images/homepage/box-loyalty-mustach.jpg"/>
				</div><!-- .box -->
			</a>
			
			<a href="">
				<div class="box review">
					<img class="box-bg" src="<?php bloginfo('template_url') ?>/images/homepage/box-review.png" alt="reviews" />
					<img class="review-bowl" src="<?php bloginfo('template_url') ?>/images/homepage/box-review-bowl.png"/>
					<img class="review-social" src="<?php bloginfo('template_url') ?>/images/homepage/box-review-social.png"/>
				</div><!-- .box -->
			</a>
			
			<a href="">
				<div class="box">
					<img class="box-bg" src="<?php bloginfo('template_url') ?>/images/homepage/box-sandwhich.jpg" alt="Featured Sandwhich" />
					<img class="sandwhich-text" src="<?php bloginfo('template_url') ?>/images/homepage/box-sandwhich-text.jpg"/>
				</div><!-- .box -->
			</a>
			
		</div><!-- .inner_wrap -->
	</div><!-- .featured_boxs -->
	
	<div class="border">
		<img src="<?php bloginfo('template_url') ?>/images/homepage/border-bottom.png" alt="border" />
	</div><!-- .border -->

<?php// get_sidebar(); ?>
<?php get_footer(); ?>
