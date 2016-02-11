
<?php
   $menu_page_id = $_GET['pid'];
?>
		<div class="archive_menu">
			<div id="content" role="main">
					
					<?php if ($_GET['control_type'] === "single-item" ) { ?>
						<?php if( have_rows('catering_v2_single_items', $menu_page_id) ): ?>
							<ul>
						  	<?php while ( have_rows('catering_v2_single_items' , $menu_page_id) ) : the_row(); ?>   
									<li class="rubicon_menu">
										<?php $post_object = get_sub_field('catering_v2_single_item', $menu_page_id); ?>
											<?php if( $post_object ): ?>
												<?php $post = $post_object; setup_postdata( $post ); ?>
												<a class="post-link" href="<?php the_permalink(); ?>" rel="<?php the_ID(); ?>">
													<h1 class="menu_header"><?php the_field("menu_item_name") ?></h1>
													<img class="menu_image" src="<?php the_field('menu_item_image'); ?>"/> 
												</a>
												<?php wp_reset_postdata(); ?>
											<?php endif; ?>
									</li>
								<?php endwhile; ?>
						  </ul>
						<?php endif; ?>
					<?php } ?>
					
					<?php if ($_GET['control_type'] === "sandwiches" ) { ?>
						<?php if( have_rows('catering_v2_sandwiches', $menu_page_id) ): ?>
							<ul>
						  	<?php while ( have_rows('catering_v2_sandwiches' , $menu_page_id) ) : the_row(); ?>   
									<li class="rubicon_menu">
										<?php $post_object = get_sub_field('catering_v2_sandwiches_item', $menu_page_id); ?>
											<?php if( $post_object ): ?>
												<?php $post = $post_object; setup_postdata( $post ); ?>
												<a class="post-link" href="<?php the_permalink(); ?>" rel="<?php the_ID(); ?>">
													<h1 class="menu_header"><?php the_field("menu_item_name") ?></h1>
													<img class="menu_image" src="<?php the_field('menu_item_image'); ?>"/> 
												</a>
												<?php wp_reset_postdata(); ?>
											<?php endif; ?>
									</li>
								<?php endwhile; ?>
						  </ul>
						<?php endif; ?>
					<?php } ?>
					
					<?php if ($_GET['control_type'] === "salads" ) { ?>
						<?php if( have_rows('catering_v2_salads', $menu_page_id) ): ?>
							<ul>
						  	<?php while ( have_rows('catering_v2_salads' , $menu_page_id) ) : the_row(); ?>   
									<li class="rubicon_menu">
										<?php $post_object = get_sub_field('catering_v2_salads_item', $menu_page_id); ?>
											<?php if( $post_object ): ?>
												<?php $post = $post_object; setup_postdata( $post ); ?>
												<a class="post-link" href="<?php the_permalink(); ?>" rel="<?php the_ID(); ?>">
													<h1 class="menu_header"><?php the_field("menu_item_name") ?></h1>
													<img class="menu_image" src="<?php the_field('menu_item_image'); ?>"/> 
												</a>
												<?php wp_reset_postdata(); ?>
											<?php endif; ?>
									</li>
								<?php endwhile; ?>
						  </ul>
						<?php endif; ?>
					<?php } ?>
					
					<?php if ($_GET['control_type'] === "sidesalad" ) { ?>
						<?php if( have_rows('catering_v2_side_salads', $menu_page_id) ): ?>
							<ul>
						  	<?php while ( have_rows('catering_v2_side_salads' , $menu_page_id) ) : the_row(); ?>   
									<li class="rubicon_menu">
										<?php $post_object = get_sub_field('catering_v2_side_salads_item', $menu_page_id); ?>
											<?php if( $post_object ): ?>
												<?php $post = $post_object; setup_postdata( $post ); ?>
												<a class="post-link" href="<?php the_permalink(); ?>" rel="<?php the_ID(); ?>">
													<h1 class="menu_header"><?php the_field("menu_item_name") ?></h1>
													<img class="menu_image" src="<?php the_field('menu_item_image'); ?>"/> 
												</a>
												<?php wp_reset_postdata(); ?>
											<?php endif; ?>
									</li>
								<?php endwhile; ?>
						  </ul>
						<?php endif; ?>
					<?php } ?>
					
					<?php if ($_GET['control_type'] === "soups" ) { ?>
						<?php if( have_rows('catering_v2_soups', $menu_page_id) ): ?>
							<ul>
						  	<?php while ( have_rows('catering_v2_soups' , $menu_page_id) ) : the_row(); ?>   
									<li class="rubicon_menu">
										<?php $post_object = get_sub_field('catering_v2_soups_item', $menu_page_id); ?>
											<?php if( $post_object ): ?>
												<?php $post = $post_object; setup_postdata( $post ); ?>
												<a class="post-link" href="<?php the_permalink(); ?>" rel="<?php the_ID(); ?>">
													<h1 class="menu_header"><?php the_field("menu_item_name") ?></h1>
													<img class="menu_image" src="<?php the_field('menu_item_image'); ?>"/> 
												</a>
												<?php wp_reset_postdata(); ?>
											<?php endif; ?>
									</li>
								<?php endwhile; ?>
						  </ul>
						<?php endif; ?>
					<?php } ?>
					
					<?php if ($_GET['control_type'] === "sweets" ) { ?>
						<?php if( have_rows('catering_v2_sweets', $menu_page_id) ): ?>
							<ul>
						  	<?php while ( have_rows('catering_v2_sweets' , $menu_page_id) ) : the_row(); ?>   
									<li class="rubicon_menu">
										<?php $post_object = get_sub_field('catering_v2_sweets_item', $menu_page_id); ?>
											<?php if( $post_object ): ?>
												<?php $post = $post_object; setup_postdata( $post ); ?>
												<a class="post-link" href="<?php the_permalink(); ?>" rel="<?php the_ID(); ?>">
													<h1 class="menu_header"><?php the_field("menu_item_name") ?></h1>
													<img class="menu_image" src="<?php the_field('menu_item_image'); ?>"/> 
												</a>
												<?php wp_reset_postdata(); ?>
											<?php endif; ?>
									</li>
								<?php endwhile; ?>
						  </ul>
						<?php endif; ?>
					<?php } ?>

			</div><!-- #content -->
		</div><!-- #container -->
