<?php
/*
	Template Name: Who's The Chef
*/


get_header(); ?>

		<div class="wtc">
			<div class="section1">
				<div class="inner clearfix">
					<div class="left wow slideInLeft" data-wow-delay="1s">
						<h2><span class="left">Evan Corsiglia <img src="<?php bloginfo('template_url') ?>/images/wtc/ampersand.png" alt="ampersand" /></span><span class="right"> Antonio Carasali</span></h2>
						<p><?php the_field('evan_antonio_description'); ?></p>
					</div> <!-- .left -->
					<div class="right wow slideInRight" data-wow-delay="1s">
						<img class="responsive wow fadeIn" data-wow-delay="1s" src="<?php the_field('evan_and_antonio_image'); ?>" alt="wtc-evan-antonio" width="448" height="314" />
					</div><!-- .right -->
				</div><!-- .inner -->
			</div><!-- .section1 -->
			
			<div class="section2">
				<div class="inner clearfix">
					<div class="left wow slideInLeft" data-wow-delay="1s">
						<img class="responsive wow fadeIn" data-wow-delay="1s" src="<?php the_field('cheri_image'); ?>" alt="wtc-cheri" width="448" height="314" />
					</div> 
					<div class="right wow slideInRight" data-wow-delay="1s">
						<h2>Cheri Corsiglia</h2>
						<p><?php the_field('cheri_description'); ?> </p>						
					</div>
				</div><!-- .inner -->
			</div><!-- .section2 -->
			<div class="mascot-footer">
				
				<div class="salad-box left wow slideInLeft">
					<img src="<?php bloginfo('template_url') ?>/images/wtc/salad-box-left.png" alt="salad-box-left" width="175" height="259" />
				</div><!-- .salad-box -->
				<div class="salad-box right wow slideInRight">
					<img src="<?php bloginfo('template_url') ?>/images/wtc/salad-box-right.png" alt="salad-box-right" width="186" height="268" />
				</div><!-- .salad-box -->
				
				<div class="inner">
					<div class="mascot-wrap">
						<img class="tooltip" src="<?php bloginfo('template_url') ?>/images/tooltip-clickme.png" alt="tooltip-clickme" width="65" />
						<img class="mascot" src="<?php bloginfo('template_url') ?>/images/wtc/mascot-head.png" alt="mascot" title="click me to get to know me ;-)" width="96" height="142" />
						<img class="mascot-bowtie" src="<?php bloginfo('template_url') ?>/images/wtc/mascot-bowtie.png"/>
					</div>
					<div class="mascot-description" style="display: none;">
						Mr. Crumbcatcher,  aptly named after his functional upper lip., is not only well bred but extremely well fed. Our dapper mascot thrives on a diet composed entirely of Rubicon Deli sandwiches, to which he attributes his good looks, keen left eye sight, and uncanny wisdom.  His message as simple as is it true "what ever you do, do it well."
					</div>
					<h1>&mdash; Well Bread Sandwiches &mdash;</h1>
					<div>
						<a class="toggle-order-online"><img src="<?php bloginfo('template_url') ?>/images/homepage/order-online.png" alt="order-online" /></a>
					</div>
					<div class="order-online-links">
						<a class="pickup" href="https://therubicondeli.brinkpos.net/order/default.aspx" target="_blank">Pickup</a>
						<a class="delivery" href="http://rubicondeli.com/delivery">Delivery</a>
					</div>
				</div><!-- .inner -->
				
				<div class="salad-box bottom-left wow slideInUp">
					<img src="<?php bloginfo('template_url') ?>/images/wtc/salad-box-bottom-left.png" alt="salad-box-bottom-left" width="364" height="124" />
				</div><!-- .salad-box -->
				<div class="salad-box bottom-right wow slideInUp">
					<img src="<?php bloginfo('template_url') ?>/images/wtc/salad-box-bottom-right.png" alt="salad-box-bottom-right" width="309" height="106" />
				</div><!-- .salad-box -->
				
			</div><!-- .order-online -->
			
		</div><!-- .wtc -->

<?php// get_sidebar(); ?>
<?php get_footer(); ?>
