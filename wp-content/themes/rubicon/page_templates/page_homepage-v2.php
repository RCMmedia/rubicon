<?php
/*
	Template Name: Homepage V2 - Full Screen Video
*/

	get_header('v2'); ?>
	
	<div class="border">
		<img src="<?php bloginfo('template_url') ?>/images/homepage/border.png" alt="border" />
<!-- 		<img class="tagline" src="<?php bloginfo('template_url') ?>/images/homepage/tagline.png" alt="tagline" width="249" height="37" /> -->
		<h3 class="tagline">Well Bread Sandwiches</h3>
	</div><!-- .border -->
	
	<div class="featured clearfix">
		<div class="inner">
			
			<a href="<?php bloginfo('url') ?>/catering/">
				<div class="box">
					<img class="box-bg" src="<?php bloginfo('template_url') ?>/images/homepage/box-catering2.png" alt="catering" />
					<img class="catering-button" src="<?php bloginfo('template_url') ?>/images/homepage/box-catering-button.png"/>
				</div><!-- .box -->
			</a>
			
			<a href="https://therubicondeli.brinkpos.net/CreateAccount.aspx">
				<div class="box loyalty">
					<img class="box-bg" src="<?php bloginfo('template_url') ?>/images/homepage/box-loyalty.jpg" alt="loyalty" />
					<img class="loyalty-text" src="<?php bloginfo('template_url') ?>/images/homepage/box-loyalty-text2.png"/>
					<img class="loyalty-mascot" src="<?php bloginfo('template_url') ?>/images/homepage/box-loyalty-mascot2.png"/>
					<img class="loyalty-stash" src="<?php bloginfo('template_url') ?>/images/homepage/box-loyalty-mustach.jpg"/>
				</div><!-- .box -->
			</a>
			
			<a class="trigger-overlay reviewus" >
				<div class="box review">
					<img class="box-bg" src="<?php bloginfo('template_url') ?>/images/homepage/box-review.png" alt="reviews" />
					<img class="review-bowl" src="<?php bloginfo('template_url') ?>/images/homepage/box-review-bowl.png"/>
					<img class="review-social" src="<?php bloginfo('template_url') ?>/images/homepage/box-review-social2.png"/>
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
