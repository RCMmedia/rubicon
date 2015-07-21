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
					
					<div class="press-item round-image-right">
						
						<h3>San Diego's 9 Best Sandwiches</h3>
						<img src="<?php bloginfo('template_url') ?>/images/press/press-placeholder-circle.png" alt="press-placeholder-circle" width="87" height="88" />
						<p>In a town that seems to run on fish tacos and burritos, the all-American sandwich still holds an important place in many a San Diegan's heart. </p>
						<a class="press-read-more">read more <img src="<?php bloginfo('template_url') ?>/images/press/readmore-arrow.png" alt="readmore-arrow" width="9" height="12" /></a>
					</div><!-- .press-item -->
					
					<div class="press-item round-image-left">
						
						<h3>San Diego's 9 Best Sandwiches</h3>
						<img src="<?php bloginfo('template_url') ?>/images/press/press-placeholder-circle.png" alt="press-placeholder-circle" width="87" height="88" />
						<p>In a town that seems to run on fish tacos and burritos, the all-American sandwich still holds an important place in many a San Diegan's heart. </p>
						<a class="press-read-more">read more <img src="<?php bloginfo('template_url') ?>/images/press/readmore-arrow.png" alt="readmore-arrow" width="9" height="12" /></a>
					</div><!-- .press-item -->
					
					<div class="press-item round-image-rectangle">
						
						<h3>San Diego's 9 Best Sandwiches</h3>
						<img src="<?php bloginfo('template_url') ?>/images/press/press-placeholder-rectangle.jpg" alt="press-placeholder-rectangle" width="296" height="154" />
						<p>In a town that seems to run on fish tacos and burritos, the all-American sandwich still holds an important place in many a San Diegan's heart. </p>
						<a class="press-read-more">read more <img src="<?php bloginfo('template_url') ?>/images/press/readmore-arrow.png" alt="readmore-arrow" width="9" height="12" /></a>
					</div><!-- .press-item -->
					
					<div class="press-item round-image-square-mosaic">
						
						<h3>San Diego's 9 Best Sandwiches</h3>
						<div class="square-mosaic-wrap">
							<img src="<?php bloginfo('template_url') ?>/images/press/press-placeholder-square3.jpg" alt="press-placeholder-square3" width="93" height="85" />
							<img src="<?php bloginfo('template_url') ?>/images/press/press-placeholder-square1.jpg" alt="press-placeholder-square1" width="93" height="85" />
							<img src="<?php bloginfo('template_url') ?>/images/press/press-placeholder-square2.jpg" alt="press-placeholder-square2" width="94" height="85" />
						</div><!-- .square-mosaic-wrap -->
						<p>In a town that seems to run on fish tacos and burritos, the all-American sandwich still holds an important place in many a San Diegan's heart. </p>
						<a class="press-read-more">read more <img src="<?php bloginfo('template_url') ?>/images/press/readmore-arrow.png" alt="readmore-arrow" width="9" height="12" /></a>
						
					</div><!-- .press-item -->
					
					<div class="press-item round-image-right">
						
						<h3>San Diego's 9 Best Sandwiches</h3>
						<img src="<?php bloginfo('template_url') ?>/images/press/press-placeholder-circle.png" alt="press-placeholder-circle" width="87" height="88" />
						<p>In a town that seems to run on fish tacos and burritos, the all-American sandwich still holds an important place in many a San Diegan's heart. </p>
						<a class="press-read-more">read more <img src="<?php bloginfo('template_url') ?>/images/press/readmore-arrow.png" alt="readmore-arrow" width="9" height="12" /></a>
					</div><!-- .press-item -->
					
					<div class="press-item round-image-right">
						
						<h3>San Diego's 9 Best Sandwiches</h3>
						<img src="<?php bloginfo('template_url') ?>/images/press/press-placeholder-circle.png" alt="press-placeholder-circle" width="87" height="88" />
						<p>In a town that seems to run on fish tacos and burritos, the all-American sandwich still holds an important place in many a San Diegan's heart. </p>
						<a class="press-read-more">read more <img src="<?php bloginfo('template_url') ?>/images/press/readmore-arrow.png" alt="readmore-arrow" width="9" height="12" /></a>
					</div><!-- .press-item -->
					
					
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
