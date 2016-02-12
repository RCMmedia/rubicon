<?php
/*
	Template Name: Main Menu V2
*/
get_header();
global $post; ?> 
	<?php $custom_page_id = $post->ID; ?>

<!-- keep everything below this comment -->
<script>
	jQuery(document).ready(function($) {
	 	$.ajaxSetup({cache:true});
	 	//initial load of sandwiches
	 	$("#single-item-container").load("<?php bloginfo('url') ?>/rubicon_menu/bec-san-diego/?pid=<?php echo $custom_page_id ?>");
	 	$("#menu_category_list").load("<?php bloginfo('url') ?>/rubicon_menu/?control_type=breakfast&pid=<?php echo $custom_page_id ?>");
	 	$("#single-item-container").addClass('toggle_open');
	 	
	 	//ajax in entire list of posts
	 	 $('body').on('click','.accordion_section:not(.active)',function(){
	 	    var post_link = $(this).attr("href");
	 	    $(this).toggleClass("active");
	 			$("#single-item-container").html(" ");
	 	    $("#menu_category_list").html("content loading");
	 	    $("#menu_category_list").load(post_link);
	 	    
	 	    $('html, body').delay(500).animate({
				scrollTop: jQuery('#menu_wrapper').offset().top-135
	  	}, 500);
	  	
			return false;
	 	});
	 	//remove
	 	$('body').on('click','.accordion_section',function(){
		 	$(".accordion_section").removeClass("active");
		 	
		 	return false;
		});
		$('body').on('click','.post-link.no_category_list',function(){
		 	$("#menu_category_list").html(" ");
		 	
		 	return false;
		});
		
	 	//ajax in single post
	 	$('body').on('click','.post-link',function(){
	 		var post_link = $(this).attr("href");
	 		$("#single-item-container").removeClass('toggle_open',function(){
		 		$("#single-item-container").delay(500).html("loading...");
	 		});
	 		
	 		
	 		$("#single-item-container").load(post_link, function(){
		 		//$("#single-item-container").slideDown("slow")
		 		$("#single-item-container").delay(500).addClass( 'toggle_open');
	 		});
	 		
	 		$('html, body').delay(500).animate({
			scrollTop: jQuery('#menu_wrapper').offset().top-135 
	  	}, 500);
	  	
			return false;
	 	});
	 	
	 	
	 	$('.accordion').accordion({
	 		"transitionSpeed": 400
	 	});
	 	
	 	//scrollTo fucntion that isn't working
	 	
		
		//lazy load
		$(function() {
    	$('.lazy').Lazy();
    });
	 	
	 });

		
</script>
<?php if (is_mobile()) { ?>
<script>
	jQuery(document).ready(function($) {
		$(".post-link").removeAttr("href");
	});
</script>
<?php } ?>

<div id="menu_wrapper" class="clearfix">
	<div id="accordion_group" class="accordion_group" data-accordion-group>
		
	<div class="accordion open" data-accordion>
		<div class="accordion_section" data-control href="<?php bloginfo('url') ?>/rubicon_menu/?control_type=breakfast&pid=<?php echo $custom_page_id ?>">Breakfast</div>
		<div class="acc_breakfast" data-content>
			<?php if( have_rows('menu_v2_breakfast') ): ?>
				<ul>
			  	<?php while ( have_rows('menu_v2_breakfast') ) : the_row(); ?>   
						<li>
							<?php $post_object = get_sub_field('menu_v2_breakfast_item'); ?>
								<?php if( $post_object ): ?>
									<?php $post = $post_object; setup_postdata( $post ); ?>
									<a class="post-link" href="<?php the_permalink(); ?>?pid=<?php echo $custom_page_id ?>" rel="<?php the_ID(); ?>">
										<h3><?php the_field('menu_item_name'); ?></h3>
										<img class="menu_image mobile lazy" data-src="<?php the_field('menu_item_image'); ?>" src=""/>
										<?php the_field('description'); ?>
										<span class="menu_price"><?php the_field('price'); ?></span>
										
									</a>
									<?php wp_reset_postdata(); ?>
								<?php endif; ?>
						</li>
					<?php endwhile; ?>
			  </ul>
			<?php endif; ?>
  	</div><!-- .acc_breakfast --> 
	</div><!-- .accordion -->
	
	<div class="accordion" data-accordion>
  	<div class="accordion_section"  data-control href="<?php bloginfo('url') ?>/rubicon_menu/?control_type=sandwiches&pid=<?php echo $custom_page_id ?>">Sandwiches</div>
		<div class="acc_breakfast" data-content>
			<?php if( have_rows('menu_v2_sandwiches') ): ?>
				<ul>
			  	<?php while ( have_rows('menu_v2_sandwiches') ) : the_row(); ?>   
						<li>
							<?php $post_object = get_sub_field('menu_v2_sandwiches_item'); ?>
								<?php if( $post_object ): ?>
									<?php $post = $post_object; setup_postdata( $post ); ?>
									<a class="post-link" href="<?php the_permalink(); ?>?pid=<?php echo $custom_page_id ?>" rel="<?php the_ID(); ?>">
										<h3><?php the_field('menu_item_name'); ?></h3>
										<img class="menu_image mobile lazy" data-src="<?php the_field('menu_item_image'); ?>" src=""/>
										<?php the_field('description'); ?>
										<span class="menu_price"><?php the_field('price'); ?></span>
									</a>
									<?php wp_reset_postdata(); ?>
								<?php endif; ?>
						</li>
					<?php endwhile; ?>
			  </ul>
			<?php endif; ?>
  	</div><!-- .acc_breakfast --> 
	</div><!-- .accordion -->
	
	<div class="accordion" data-accordion>
  	<div class="accordion_section"  data-control href="<?php bloginfo('url') ?>/rubicon_menu/?control_type=salads&pid=<?php echo $custom_page_id ?>">Salads</div>
		<div class="acc_breakfast" data-content>
			<?php if( have_rows('menu_v2_salads') ): ?>
				<ul>
			  	<?php while ( have_rows('menu_v2_salads') ) : the_row(); ?>   
						<li>
							<?php $post_object = get_sub_field('menu_v2_salads_item'); ?>
								<?php if( $post_object ): ?>
									<?php $post = $post_object; setup_postdata( $post ); ?>
									<a class="post-link" href="<?php the_permalink(); ?>?pid=<?php echo $custom_page_id ?>" rel="<?php the_ID(); ?>">
										<h3><?php the_field('menu_item_name'); ?></h3>
										<img class="menu_image mobile lazy" data-src="<?php the_field('menu_item_image'); ?>" src=""/>
										<?php the_field('description'); ?>
										<span class="menu_price"><?php the_field('price'); ?></span>
									</a>
									<?php wp_reset_postdata(); ?>
								<?php endif; ?>
						</li>
					<?php endwhile; ?>
			  </ul>
			<?php endif; ?>
  	</div><!-- .acc_breakfast --> 
	</div><!-- .accordion -->
	
	<div class="accordion" data-accordion>
  	<div class="accordion_section"  data-control href="<?php bloginfo('url') ?>/rubicon_menu/?control_type=sidesalad&pid=<?php echo $custom_page_id ?>">Side Salads</div>
		<div class="acc_breakfast" data-content>
			<?php if( have_rows('menu_v2_side_salads') ): ?>
				<ul>
			  	<?php while ( have_rows('menu_v2_side_salads') ) : the_row(); ?>   
						<li>
							<?php $post_object = get_sub_field('menu_v2_side_salads_item'); ?>
								<?php if( $post_object ): ?>
									<?php $post = $post_object; setup_postdata( $post ); ?>
									<a class="post-link" href="<?php the_permalink(); ?>?pid=<?php echo $custom_page_id ?>" rel="<?php the_ID(); ?>">
										<h3><?php the_field('menu_item_name'); ?></h3>
										<img class="menu_image mobile lazy" data-src="<?php the_field('menu_item_image'); ?>" src=""/>
										<?php the_field('description'); ?>
										<span class="menu_price"><?php the_field('price'); ?></span>
									</a>
									<?php wp_reset_postdata(); ?>
								<?php endif; ?>
						</li>
					<?php endwhile; ?>
			  </ul>
			<?php endif; ?>
  	</div><!-- .acc_breakfast --> 
	</div><!-- .accordion -->
	
	<div class="accordion" data-accordion>
  	<div class="accordion_section"  data-control href="<?php bloginfo('url') ?>/rubicon_menu/?control_type=soups&pid=<?php echo $custom_page_id ?>">Soups</div>
		<div class="acc_breakfast" data-content>
			<?php if( have_rows('menu_v2_soups') ): ?>
				<ul>
			  	<?php while ( have_rows('menu_v2_soups') ) : the_row(); ?>   
						<li>
							<?php $post_object = get_sub_field('menu_v2_soups_item'); ?>
								<?php if( $post_object ): ?>
									<?php $post = $post_object; setup_postdata( $post ); ?>
									<a class="post-link" href="<?php the_permalink(); ?>?pid=<?php echo $custom_page_id ?>" rel="<?php the_ID(); ?>">
										<h3><?php the_field('menu_item_name'); ?></h3>
										<img class="menu_image mobile lazy" data-src="<?php the_field('menu_item_image'); ?>" src=""/>
										<?php the_field('description'); ?>
										<span class="menu_price"><?php the_field('price'); ?></span>
									</a>
									<?php wp_reset_postdata(); ?>
								<?php endif; ?>
						</li>
					<?php endwhile; ?>
			  </ul>
			<?php endif; ?>
  	</div><!-- .acc_breakfast --> 
	</div><!-- .accordion -->
	
	<div class="accordion" data-accordion>
  	<div class="accordion_section"  data-control href="<?php bloginfo('url') ?>/rubicon_menu/?control_type=acaibowls&pid=<?php echo $custom_page_id ?>">Acai Bowls</div>
		<div class="acc_breakfast" data-content>
			<?php if( have_rows('menu_v2_acai_bowls') ): ?>
				<ul>
			  	<?php while ( have_rows('menu_v2_acai_bowls') ) : the_row(); ?>   
						<li>
							<?php $post_object = get_sub_field('menu_v2_acai_bowl'); ?>
								<?php if( $post_object ): ?>
									<?php $post = $post_object; setup_postdata( $post ); ?>
									<a class="post-link" href="<?php the_permalink(); ?>?pid=<?php echo $custom_page_id ?>" rel="<?php the_ID(); ?>">
										<h3><?php the_field('menu_item_name'); ?></h3>
										<img class="menu_image mobile lazy" data-src="<?php the_field('menu_item_image'); ?>" src=""/>
										<?php the_field('description'); ?>
										<span class="menu_price"><?php the_field('price'); ?></span>
									</a>
									<?php wp_reset_postdata(); ?>
								<?php endif; ?>
						</li>
					<?php endwhile; ?>
			  </ul>
			<?php endif; ?>
  	</div><!-- .acc_breakfast --> 
	</div><!-- .accordion -->


	<div class="accordion" data-accordion>
  	<div class="accordion_section"  data-control href="<?php bloginfo('url') ?>/rubicon_menu/chips-pickle-san-diego/?pid=<?php echo $custom_page_id ?>">Chips + Pickel</div>
		<div class="acc_breakfast" data-content>
			
  	</div><!-- .acc_breakfast --> 
	</div><!-- .accordion -->	
	
	<div class="accordion" data-accordion>
  	<div class="accordion_section"  data-control href="<?php bloginfo('url') ?>/rubicon_menu/craft-beers-san-diego/?pid=<?php echo $custom_page_id ?>">Craft Beers</div>
		<div class="acc_breakfast" data-content>
			
  	</div><!-- .acc_breakfast --> 
	</div><!-- .accordion -->	

	
	<div class="accordion" data-accordion>
  	<div class="accordion_section" data-control href="<?php bloginfo('url') ?>/rubicon_menu/?control_type=sweets&pid=<?php echo $custom_page_id ?>">Sweets</div>
		<div class="acc_breakfast" data-content>
			<?php if( have_rows('menu_v2_sweets') ): ?>
				<ul>
			  	<?php while ( have_rows('menu_v2_sweets') ) : the_row(); ?>   
						<li>
							<?php $post_object = get_sub_field('menu_v2_sweets_item'); ?>
								<?php if( $post_object ): ?>
									<?php $post = $post_object; setup_postdata( $post ); ?>
									<a class="post-link" href="<?php the_permalink(); ?>?pid=<?php echo $custom_page_id ?>" rel="<?php the_ID(); ?>">
										<h3><?php the_field('menu_item_name'); ?></h3>
										<img class="menu_image mobile lazy" data-src="<?php the_field('menu_item_image'); ?>" src=""/>
										<?php the_field('description'); ?>
										<span class="menu_price"><?php the_field('price'); ?></span>
									</a>
									<?php wp_reset_postdata(); ?>
								<?php endif; ?>
						</li>
					<?php endwhile; ?>
			  </ul>
			<?php endif; ?>
  	</div><!-- .acc_breakfast --> 
	</div><!-- .accordion -->
	
	<div class="accordion" data-accordion>
  	<a href="<?php the_field('build_your_own_pdf'); ?>" target="_blank">Build your own</a>
 	</div><!-- .accordion -->	
	
	
	</div><!-- .accordion_group -->
	<div id="ajax-container">
		<div class="page_info">
			<h1><?php the_title(); ?> | <a target="_blank" href="<?php the_field('download_menu_pdf'); ?>">DOWNLOAD MENU PDF <img src="<?php bloginfo('template_url') ?>/images/menu/pdf.png" alt="pdf" width="25" height="25" /></a></h1>
		</div>
		<div id="single-item-container">
			
		</div>
		<div id="menu_category_list"></div>
	</div><!-- .ajax-container -->




</div><!-- #menu_wrapper -->

<?php get_footer(); ?>