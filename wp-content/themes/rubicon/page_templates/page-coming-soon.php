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
				
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<?php the_content() ?>
				<?php endwhile; ?>
				
			</div><!-- .content -->
		</div><!-- .inner -->
	</div><!-- .jobs -->

<?php get_footer(); ?>
