<?php
/*
	Template Name: Homepage
*/


get_header(); ?>

	<div class="video_banner_wrap">
		<img src="<?php bloginfo('template_url') ?>/images/homepage/placeholder_video_poster.jpg" />
		<div class="vertically_aligned">
			<div><img src="<?php bloginfo('template_url') ?>/images/homepage/po-boy.png" alt="po-boy" width="88" height="88"></div>
			<h2>IPSUM DOLOR</h2>
			<h1>&mdash; Lorem ipsum dolor &mdash;</h1>
			<div><img src="<?php bloginfo('template_url') ?>/images/homepage/order-online.png" alt="order-online" /></div>
		</div>
	</div><!-- .video_banner_wrap -->
	
	<div class="border">
		<img src="<?php bloginfo('template_url') ?>/images/homepage/border.png" alt="border" />
		<img class="tagline" src="<?php bloginfo('template_url') ?>/images/homepage/tagline.png" alt="tagline" width="249" height="37" />
	</div><!-- .border -->
	
	<div class="featured">
		<div class="inner">
			
			<div class="box">
				<a href=""><img src="<?php bloginfo('template_url') ?>/images/homepage/box-catering2.png" alt="catering" /></a>
				<img class="catering-button" src="<?php bloginfo('template_url') ?>/images/homepage/box-catering-button.png"/>
			</div><!-- .box -->
			
			<div class="box loyalty">
				<a href=""><img src="<?php bloginfo('template_url') ?>/images/homepage/box-loyalty.jpg" alt="loyalty" /></a>
				<img class="loyalty-text" src="<?php bloginfo('template_url') ?>/images/homepage/box-loyalty-text.png"/>
				<img class="loyalty-mascot" src="<?php bloginfo('template_url') ?>/images/homepage/box-loyalty-mascot2.png"/>
				<img class="loyalty-stash" src="<?php bloginfo('template_url') ?>/images/homepage/box-loyalty-mustach.jpg"/>
			</div><!-- .box -->
			
			<div class="box review">
				<a href=""><img src="<?php bloginfo('template_url') ?>/images/homepage/box-review.png" alt="reviews" /></a>
				<img class="review-bowl" src="<?php bloginfo('template_url') ?>/images/homepage/box-review-bowl.png"/>
				<img class="review-social" src="<?php bloginfo('template_url') ?>/images/homepage/box-review-social.png"/>
			</div><!-- .box -->
			
			<div class="box">
				<a href=""><img src="<?php bloginfo('template_url') ?>/images/homepage/box-sandwhich.jpg" alt="Featured Sandwhich" /></a>
				<img class="sandwhich-text" src="<?php bloginfo('template_url') ?>/images/homepage/box-sandwhich-text.jpg"/>
			</div><!-- .box -->
			
		</div><!-- .inner_wrap -->
	</div><!-- .featured_boxs -->
	
	<div class="border">
		<img src="<?php bloginfo('template_url') ?>/images/homepage/border-bottom.png" alt="border" />
	</div><!-- .border -->

<?php// get_sidebar(); ?>
<?php get_footer(); ?>
