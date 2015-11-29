<?php
/*
	Template Name: Jobs
*/


get_header(); ?>

	<div class="jobs">
		<div class="inner">
			<h1>Employment</h1>
			<div class="content clearfix">
				
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<?php the_content() ?>
				<?php endwhile; ?>
				
				<div class="signature">
					- Rubicon Deli Management Team
				</div><!-- .signature -->
 				<div class="apply">
					<a class="trigger-overlay jobs" href="javascript:void(0)">APPLY NOW</a>
				</div><!-- .apply -->
			</div><!-- .content -->
		</div><!-- .inner -->
	</div><!-- .jobs -->

<?php get_footer(); ?>
