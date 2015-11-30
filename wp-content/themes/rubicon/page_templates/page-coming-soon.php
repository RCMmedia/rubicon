<?php
/*
	Template Name: Coming Soon
*/


get_header(); ?>

	<div class="general-content">
		<div class="inner">
			<h1><?php the_title(''); ?></h1>
			<div class="border">
				<img src="<?php bloginfo('template_url') ?>/images/homepage/border-bottom.png" alt="border" />
			</div><!-- .border -->
			<div class="content clearfix">
				<div class="location-render">
					<img class="responsive" src="<?php bloginfo('template_url') ?>/images/location/la-jolla-rendering.jpg" alt="la-jolla-rendering" width="1156" height="473" />
				</div><!-- .left-location -->
				<div class="location-info">
					<img class="responsive" src="http://maps.google.com/maps/api/staticmap?center=32.871598,-117.217494&zoom=15&markers=32.872203,-117.217580|32.872203,-117.217580&path=color:0x0000FF80|weight:5|32.87229,-117.21708&size=1020x300&sensor=true"/>
				</div><!-- .right-map -->
				
				
			</div><!-- .content -->
		</div><!-- .inner -->
	</div><!-- .jobs -->

<?php get_footer(); ?>
