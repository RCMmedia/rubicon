<?php
/*
	Template Name: Catering
*/

get_header(); ?>

		<div class="catering">
			
			<div class="inner">
				<h1>Catering</h1>
				<div class="border">
					<img src="<?php bloginfo('template_url') ?>/images/homepage/border-bottom.png" alt="border" />
				</div><!-- .border -->
				
				<div class="content clearfix">
					<div class="text-box">
						
						<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
							<?php the_content() ?>
						<?php endwhile; ?>

					</div>
					<div class="gform">
					<?php echo do_shortcode('[gravityform id="4" title="false" description="false" ajax="true"]'); ?>
				</div>
				</div>
				
								
			</div><!-- .innder -->
		</div><!-- .catering -->



<?php get_footer(); ?>
