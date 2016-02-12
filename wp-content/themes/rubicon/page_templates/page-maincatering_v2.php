<?php
/*
	Template Name: Main Catering V2
*/
get_header();
global $post; ?> 
<?php $custom_page_id = $post->ID; ?>
<!-- keep everything below this comment -->
<script>
	jQuery(document).ready(function($) {
	 	$.ajaxSetup({cache:true});
	 	//initial load of sandwiches
	 	$("#single-item-container").load("<?php bloginfo('url') ?>/rubicon_catering/picnic-box-san-diego/?pid=<?php echo $custom_page_id ?>");
	 	$("#menu_category_list").load("<?php bloginfo('url') ?>/rubicon_catering/?control_type=single-item&pid=<?php echo $custom_page_id ?>");
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
			$('body').on('click','.single_catering_items_wrap .post-link',function(){
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
		
		<div class="single_catering_items_wrap">
		<?php if( have_rows('catering_v2_single_items') ): ?>
			<ul>
		  	<?php while ( have_rows('catering_v2_single_items') ) : the_row(); ?>   
					<li>
						<?php $post_object = get_sub_field('catering_v2_single_item'); ?>
							<?php if( $post_object ): ?>
								<?php $post = $post_object; setup_postdata( $post ); ?>
								<a class="post-link" href="<?php the_permalink(); ?>?pid=<?php echo $custom_page_id ?>" rel="<?php the_ID(); ?>">
									<h3><?php the_field('menu_item_name'); ?></h3>
								</a>
								<?php wp_reset_postdata(); ?>
							<?php endif; ?>
					</li>
				<?php endwhile; ?>
		  </ul>
		<?php endif; ?>
	</div>
		
	<div class="accordion" data-accordion>
  	<div class="accordion_section"  data-control href="<?php bloginfo('url') ?>/rubicon_catering/?control_type=sandwiches&pid=<?php echo $custom_page_id ?>">Well Bread Sandwiches</div>
		<div class="acc_breakfast" data-content>
			<?php if( have_rows('catering_v2_sandwiches') ): ?>
				<ul>
			  	<?php while ( have_rows('catering_v2_sandwiches') ) : the_row(); ?>   
						<li>
							<?php $post_object = get_sub_field('catering_v2_sandwiches_item'); ?>
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
  	<div class="accordion_section"  data-control href="<?php bloginfo('url') ?>/rubicon_catering/?control_type=salads&pid=<?php echo $custom_page_id ?>">Salads</div>
		<div class="acc_breakfast" data-content>
			<?php if( have_rows('catering_v2_salads') ): ?>
				<ul>
			  	<?php while ( have_rows('catering_v2_salads') ) : the_row(); ?>   
						<li>
							<?php $post_object = get_sub_field('catering_v2_salads_item'); ?>
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

	
	
	
	</div><!-- .accordion_group -->
	<div id="ajax-container">
		<div class="page_info">
			<h1><?php the_title(); ?> | <a href="<?php the_field('download_menu_pdf'); ?>">DOWNLOAD MENU PDF <img src="<?php bloginfo('template_url') ?>/images/menu/pdf.png" alt="pdf" width="25" height="25" /></a></h1>
		</div>
		<div id="single-item-container">
			
		</div>
		<div id="menu_category_list"></div>
	</div><!-- .ajax-container -->




</div><!-- #menu_wrapper -->
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
<?php get_footer(); ?>