<?php
/*
	Template Name: Press
*/

get_header(); ?>

		<div class="single-press-post">
			
			<div class="inner">
				<h1>Press & events</h1>
				<div class="border">
					<img src="<?php bloginfo('template_url') ?>/images/homepage/border-bottom.png" alt="border" />
				</div><!-- .border -->
				
				<div class="grid">
					
					<div class="press-sizer"></div>
					
					<?php
 
					// check if the flexible content field has rows of data
					if( have_rows('press_and_events_flex') ):?>
					 
					 	<?php // loop through the rows of data
					    while ( have_rows('press_and_events_flex') ) : the_row(); ?>
							
							<?php if( get_row_layout() == 'circle_image_left' ): ?>
					
					  		<div class="press-item round-image-left">
									<h3><?php the_sub_field('press_title'); ?></h3>
									<img src="<?php the_sub_field('press_item_image'); ?>" alt="press-image" width="87" height="88" />
									<p><?php the_sub_field('press_content'); ?></p>
									<a class="press-read-more" href="<?php the_field('press_link'); ?>">read more <img src="<?php bloginfo('template_url') ?>/images/press/readmore-arrow.png" alt="readmore-arrow" width="9" height="12" /></a>
								</div><!-- .press-item -->
					
							<?php elseif( get_row_layout() == 'circle_image_right' ): ?>
					  		
					  		<div class="press-item round-image-right">
									<h3><?php the_sub_field('press_title'); ?></h3>
									<img src="<?php the_sub_field('press_item_image'); ?>" alt="press-image" width="87" height="88" />
									<p><?php the_sub_field('press_content'); ?></p>
									<a class="press-read-more" href="<?php the_field('press_link'); ?>">read more <img src="<?php bloginfo('template_url') ?>/images/press/readmore-arrow.png" alt="readmore-arrow" width="9" height="12" /></a>
								</div><!-- .press-item -->
								
								<?php elseif( get_row_layout() == 'rectangle_image' ): ?>
								
								<div class="press-item rectangle">
									<h3><?php the_sub_field('press_title'); ?></h3>
									<img src="<?php the_sub_field('press_item_image'); ?>" alt="press-image"  />
									<p><?php the_sub_field('press_content'); ?></p>
									<a class="press-read-more" href="<?php the_field('press_link'); ?>">read more <img src="<?php bloginfo('template_url') ?>/images/press/readmore-arrow.png" alt="readmore-arrow" width="9" height="12" /></a>
								</div><!-- .press-item -->
													
							<?php endif; ?>
							
							
								<!-- BEGIN 2col List Layout -->
							  <?php // check current row layout
					        if( get_row_layout() == 'mosaic_image' ):
					        	// check if the nested repeater field has rows of data
					        	if( have_rows('press_item_mosiac') ): ?>
					        		<div class="press-item round-image-square-mosaic">
					        			<h3><?php the_sub_field('press_title'); ?></h3>
					        			<div class="square-mosaic-wrap">
												<?php	// loop through the rows of data
											    while ( have_rows('press_item_mosiac') ) : the_row(); ?>
											    <?php if(get_sub_field('press_item_mosiac_image')) { ?>
														
															<img src="<?php the_sub_field('press_item_mosiac_image'); ?>" alt="mosaic-image" width="93" height="85" />
													<?php } ?> 
												<?php endwhile;?>
					        			</div><!-- .square-mosaic-wrap -->

												<p><?php the_sub_field('press_content'); ?></p>
												<a class="press-read-more" href="<?php the_field('press_link'); ?>">read more <img src="<?php bloginfo('template_url') ?>/images/press/readmore-arrow.png" alt="readmore-arrow" width="9" height="12" /></a>
											</div><!-- .press-item -->
										<?php endif; ?>
					 
								<?php endif;?>
								<!-- END 2col List Layout -->
								
							<?php endwhile;?>
					 
						<?php else : ?>
					 
					    // no layouts found
					 
					<?php endif; ?>
					
				</div><!-- .grid -->
				
			</div><!-- .innder -->
		</div><!-- .single-press-post -->

<script>
	$('.grid').isotope({
  	itemSelector: '.press-item',
  	percentPosition: true,
  	masonry: {
  	  // use outer width of grid-sizer for columnWidth
  	  columnWidth: '.press-sizer'
  	}
	})
</script>


<?php get_footer(); ?>
