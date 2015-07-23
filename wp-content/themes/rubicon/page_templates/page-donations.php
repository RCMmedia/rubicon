<?php
/*
	Template Name: Donations
*/


get_header(); ?>

	<div class="donations">
		<div class="inner">
			<h1>Donations</h1>
			<div class="content clearfix">
				<div class="left">
					<?php the_field('left_content'); ?>
				</div><!-- .left -->
				<div class="right">
					<?php the_field('right_content'); ?>
				</div><!-- .right -->
				<div class="donation-button clearfix">
					<a href="#" class="trigger-overlay contact"><img src="<?php bloginfo('template_url') ?>/images/donations/donations-button-apply.png" alt="donations-button-apply" width="233" height="65" /></a>
				</div>
			</div><!-- .content -->
		</div><!-- .inner -->
	</div><!-- .donations -->

<?php get_footer(); ?>
