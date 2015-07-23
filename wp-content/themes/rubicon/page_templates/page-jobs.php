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
					<img src="<?php bloginfo('template_url') ?>/images/jobs/jobs-evan.png" alt="Evan-Corsiglia" width="76" height="76" /><span>Evan Corsiglia</span>
				</div><!-- .signature -->
 				<div class="apply">
					<a class="trigger-overlay contact" href="#"><img src="<?php bloginfo('template_url') ?>/images/jobs/jobs-button-apply.png" alt="jobs-button-apply" width="108" height="31" /></a>
				</div><!-- .apply -->
			</div><!-- .content -->
		</div><!-- .inner -->
	</div><!-- .jobs -->

<?php get_footer(); ?>
