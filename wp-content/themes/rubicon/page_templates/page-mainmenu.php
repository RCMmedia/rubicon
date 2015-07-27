<?php
/*
    Template Name: Main Menu
*/


get_header(); ?>



<script type="text/javascript">
	jQuery(document).ready(function(){
		
		
		
		if (location.href.indexOf("#menu") != -1) {
        jQuery('.panel_container_catering').addClass('fade_away');
        jQuery('html,body').animate({scrollTop: 0}, 0);
     }
     
     
     if (location.href.indexOf("#catering") != -1) {
        jQuery('.panel_container_menu').addClass('fade_away');
        jQuery('html,body').animate({scrollTop: 0}, 0);
     }
		
		
		jQuery('#tab-container').easytabs({defaultTab: ".menu_tab"});
					
		jQuery(".menu_tab").click(function(){
			jQuery('.panel_container_catering').addClass('fade_away');
			jQuery('.panel_container_menu').removeClass('fade_away');
		});
		
		jQuery(".catering_tab").click(function(){
						jQuery('.panel_container_catering').removeClass('fade_away');
						jQuery('.panel_container_menu').addClass('fade_away');
					});

	});
	
	
	
	
	
</script>
  
  <?php if( get_field('menu_section') ): ?>
		
		<?php $main_menu_section_tab=1; ?>
				
			<script type="text/javascript">
				
				jQuery(document).ready(function(){
					
					jQuery('#ajax_tab_container_menu').easytabs({
						panelContext: jQuery(".panel_container_menu")	  	
  				});

			<?php while(has_sub_field('menu_section') ): ?>
						
				jQuery('.main_menu_section_<?php echo $main_menu_section_tab;?>').first().addClass('menu_first_<?php echo $main_menu_section_tab;?>');
						
				jQuery( ".menu_first_<?php echo $main_menu_section_tab;?>").before( "<li class='menu_section_title menu_section_title_<?php echo $main_menu_section_tab;?>'><?php the_sub_field('main_menu_section');?></li>" );
						
				jQuery('.main_menu_section_<?php echo $main_menu_section_tab;?>').wrapAll('<ul style="display:none;" class="menu_section_wrapper menu_section_wrapper_<?php echo $main_menu_section_tab;?>"> </ul>');
						
				jQuery('.menu_section_title_<?php echo $main_menu_section_tab;?>').click(function(){
					jQuery('.menu_section_wrapper_<?php echo $main_menu_section_tab;?>').slideToggle(200);
					jQuery('.menu_section_title_<?php echo $main_menu_section_tab;?>').toggleClass('active');
				});
				

						
				<?php if(get_sub_field('menu_items_list') ): ?>
					<?php $sub_category_tab=1; ?>
							
						<?php while(has_sub_field('menu_items_list') ): ?>
								
							<?php if(get_sub_field('sub_category2') == "Yes"):?>
								
								jQuery('.menu_sub_category_tabs_<?php echo $sub_category_tab;?>').first().addClass('menu_sub_cat_first_<?php echo $sub_category_tab;?>');
								
								jQuery( '.menu_sub_cat_first_<?php echo $sub_category_tab;?>' ).before( '<li class="menu_sub_cat_title menu_sub_cat_title_<?php echo $sub_category_tab;?> active"><?php the_sub_field('sub_category_name');?></li>' );
									
								jQuery('.main_menu_section_<?php echo $main_menu_section_tab;?>.menu_sub_category_tabs_<?php echo $sub_category_tab;?>').wrapAll('<ul class="menu_sub_cat_wrapper menu_sub_cat_wrapper_<?php echo $sub_category_tab;?>"> </ul>');

								jQuery('.menu_sub_cat_title_<?php echo $sub_category_tab;?>').click(function(){
			jQuery('.menu_sub_cat_wrapper_<?php echo $sub_category_tab;?>').slideToggle(200);
			jQuery('.menu_sub_cat_title_<?php echo $sub_category_tab;?>').toggleClass('active');
    });
    
    
    
							<?php endif; ?>
								
							<?php if(get_sub_field('menu_items') ): ?>
								<?php $single_tab=1; ?>
								
								<?php while(has_sub_field('menu_items') ): ?>
									
								<?php $single_tab++; ?>
								<?php endwhile; ?>
							<?php endif; ?>
						<?php $sub_category_tab++; ?>
					<?php endwhile; ?>
				<?php endif; ?>
			<?php $main_menu_section_tab++; ?>
		<?php endwhile; ?>
		
			});
    	
    </script>
   
   <?php endif;?>
   
   
     <?php if( get_field('catering_section') ): ?>
		
		<?php $main_catering_section_tab=1; ?>
				
			<script type="text/javascript">
				
				jQuery(document).ready(function(){
					
					jQuery('#ajax_tab_container_catering').easytabs({
						panelContext: jQuery(".panel_container_catering")	  	
  				});
  				
  				


  				

			<?php while(has_sub_field('catering_section') ): ?>
						
						
										
				<?php if(get_sub_field('catering_items_list') ): ?>
					<?php $sub_category_tab=1; ?>
							
						<?php while(has_sub_field('catering_items_list') ): ?>
								
							<?php if(get_sub_field('catering_sub_category') == "Yes"):?>
								
								jQuery('.catering_sub_category_tabs_<?php echo $sub_category_tab;?>').first().addClass('catering_sub_cat_first_<?php echo $sub_category_tab;?>');
								
								jQuery( '.catering_sub_cat_first_<?php echo $sub_category_tab;?>' ).before( '<li class="catering_sub_cat_title catering_sub_cat_title_<?php echo $sub_category_tab;?>"><?php the_sub_field('catering_sub_name');?></li>' );
									
								jQuery('.catering_sub_category_tabs_<?php echo $sub_category_tab;?>').wrapAll('<ul style="display:none;" class="catering_sub_cat_wrapper catering_sub_cat_wrapper_<?php echo $sub_category_tab;?>"> </ul>');

								jQuery('.catering_sub_cat_title_<?php echo $sub_category_tab;?>').click(function(){
			jQuery('.catering_sub_cat_wrapper_<?php echo $sub_category_tab;?>').slideToggle(200);
			jQuery('.catering_sub_cat_title_<?php echo $sub_category_tab;?>').toggleClass('active');
    });
							<?php endif; ?>
								
							<?php if(get_sub_field('menu_items') ): ?>
								<?php $single_tab=1; ?>
								
								<?php while(has_sub_field('menu_items') ): ?>
									
								<?php $single_tab++; ?>
								<?php endwhile; ?>
							<?php endif; ?>
						<?php $sub_category_tab++; ?>
					<?php endwhile; ?>
				<?php endif; ?>
			
		<?php endwhile; ?>
		
			});
    	
    </script>
   
   <?php endif;?>
    
   
   



<?php function friendlyUrl ($str = '') {
	$friendlyURL = htmlentities($str, ENT_COMPAT, "UTF-8", false); 
  $friendlyURL = preg_replace('/&([a-z]{1,2})(?:acute|lig|grave|ring|tilde|uml|cedil|caron);/i','\1',$friendlyURL);
  $friendlyURL = html_entity_decode($friendlyURL,ENT_COMPAT, "UTF-8"); 
  $friendlyURL = preg_replace('/[^a-z0-9-]+/i', '-', $friendlyURL);
  $friendlyURL = preg_replace('/-+/', '-', $friendlyURL);
  $friendlyURL = trim($friendlyURL, '-');
  $friendlyURL = strtolower($friendlyURL);
  return $friendlyURL;

} ?>		

<?php function friendlyUrlcat ($strcatering = '') {
	$friendlyUrlcat = htmlentities($strcatering, ENT_COMPAT, "UTF-8", false); 
  $friendlyUrlcat = preg_replace('/&([a-z]{1,2})(?:acute|lig|grave|ring|tilde|uml|cedil|caron);/i','\1',$friendlyUrlcat);
  $friendlyUrlcat = html_entity_decode($friendlyUrlcat,ENT_COMPAT, "UTF-8"); 
  $friendlyUrlcat = preg_replace('/[^a-z0-9-]+/i', '-', $friendlyUrlcat);
  $friendlyUrlcat = preg_replace('/-+/', '-', $friendlyUrlcat);
  $friendlyUrlcat = trim($friendlyUrlcat, '-');
  $friendlyUrlcat = strtolower($friendlyUrlcat);
  return $friendlyUrlcat;

} ?>		
			
	
	<div id="menu_wrapper">
		
		<div class="menu_page_title">
			<?php the_field('menu_page_title'); ?>
		</div><!-- .menu_page_title -->
		<div class="menu_steps clearfix">
			<div>
				<img src="<?php bloginfo('template_url') ?>/images/menu/menu-step1.png" alt="menu-step1" width="284" height="58" />
			</div>
			<div>
				<img src="<?php bloginfo('template_url') ?>/images/menu/menu-step2.png" alt="menu-step2" width="284" height="62" />
			</div>
			<div>
				<img src="<?php bloginfo('template_url') ?>/images/menu/menu-step3.png" alt="menu-step3" width="263" height="57" />
			</div>
		</div>
		<div class="border">
			<img src="<?php bloginfo('template_url') ?>/images/homepage/border-bottom.png" alt="border" />
		</div><!-- .border -->
		
		
		<div class="menu_items_wrapper">
			<div id="tab-container" class="tab-container">
				<ul class='etabs'>
					<li class='tab etab menu_tab'><a href="#menu">Menu</a></li>
					<li class='tab etab catering_tab'><a href="#catering">Catering</a></li>
   			</ul>
	 			<div id="menu">
	 				<div id="ajax_tab_container_menu" class='tab-container'>
	 					<ul class='tabs'>
		 		
	 						<?php if( get_field('menu_section') ): ?>
	 							<?php $main_menu_section_tab=1; ?>
	 							
	 							<?php while(has_sub_field('menu_section') ): ?>
					
									<?php if(get_sub_field('menu_items_list') ): ?>
										<?php $sub_category_tab=1; ?>
							
										<?php while(has_sub_field('menu_items_list') ): ?>
								
											<?php if(get_sub_field('menu_items') ): ?>
												<?php $single_tab=1; ?>
									
												<?php while(has_sub_field('menu_items') ): ?>
										
													<?php $str = get_sub_field('menu_item_title'); ?>

													<li class='tab main_menu_section_<?php echo $main_menu_section_tab;?> menu_sub_category_tabs_<?php echo $sub_category_tab;?> menu_single_tab menu_single_tab_<?php echo $single_tab;?>' style="display:block"><a href="<?php the_sub_field('menu_item');?>" data-target="#menu-<?php echo friendlyUrl($str); ?>"><?php the_sub_field('menu_item_title');?></a></li>

													<?php $single_tab++; ?>
									
												<?php endwhile; ?>
											
											<?php endif; ?>
										
										<?php $sub_category_tab++; ?>
							
										<?php endwhile; ?>
									
									<?php endif; ?>
								
								<?php $main_menu_section_tab++; ?>
							
							<?php endwhile; ?>
						
							<?php endif;?>
			
						</ul>
 				</div><!-- ajax-tab-container -->
  		</div><!-- menu -->
  		
  		<div id="catering">
	 				<div id="ajax_tab_container_catering" class='tab-container'>
	 					<ul class='tabs'>
		 		
	 						<?php if( get_field('catering_section') ): ?>
	 							<?php $main_catering_section_tab=1; ?>
	 							
	 							<?php while(has_sub_field('catering_section') ): ?>
					
									<?php if(get_sub_field('catering_items_list') ): ?>
										<?php $sub_category_tab=1; ?>
							
										<?php while(has_sub_field('catering_items_list') ): ?>
								
											<?php if(get_sub_field('my_catering_items') ): ?>
												<?php $single_tab=1; ?>
									
												<?php while(has_sub_field('my_catering_items') ): ?>
										
													<?php $strcatering = get_sub_field('catering_item_title'); ?>

													<li class='tab catering_sub_category_tabs catering_sub_category_tabs_<?php echo $sub_category_tab;?> catering_single_tab_<?php echo $single_tab;?>' style="display:block"><a href="<?php the_sub_field('catering_item');?>" data-target="#catering-<?php echo friendlyUrlcat($strcatering); ?>"><?php the_sub_field('catering_item_title');?></a></li>

													<?php $single_tab++; ?>
									
												<?php endwhile; ?>
											
											<?php endif; ?>
										
										<?php $sub_category_tab++; ?>
							
										<?php endwhile; ?>
									
									<?php endif; ?>
								
								<?php $main_catering_section_tab++; ?>
							
							<?php endwhile; ?>
						
							<?php endif;?>
			
						</ul>
 				</div><!-- ajax-tab-container -->
  		</div><!-- catering -->
  		
  		
  				
  		
  		
  	</div><!-- tabs-container -->
  </div><!-- menus items wrapper -->
	
	<div class="menu_assets_wrapper">
		
		<?php if( get_field('menu_section') ): ?>
				
				<div class="panel_container_menu">
				<?php $main_menu_section_tab=1; ?>
					
					<?php while(has_sub_field('menu_section') ): ?>
					
						<?php if(get_sub_field('menu_items_list') ): ?>
							<?php $sub_category_tab=1; ?>
							
							<?php while(has_sub_field('menu_items_list') ): ?>
								
								<?php if(get_sub_field('menu_items') ): ?>
									<?php $single_tab=1; ?>
									
									<?php while(has_sub_field('menu_items') ): ?>
										
										<?php $str = get_sub_field('menu_item_title'); ?>
										
										<div id="menu-<?php echo friendlyUrl($str); ?>"></div>						
									
										<?php $single_tab++; ?>
									
									<?php endwhile; ?>
								<?php endif; ?>
								
							<?php $sub_category_tab++; ?>
							
							<?php endwhile; ?>
						
						<?php endif; ?>
					<?php $main_menu_section_tab++; ?>
					
					<?php endwhile; ?>
				</div>
		
		<?php endif;?>
		
		
		
		<?php if( get_field('catering_section') ): ?>
				
				<div class="panel_container_catering">
				<?php $main_catering_section_tab=1; ?>
					
					<?php while(has_sub_field('catering_section') ): ?>
					
						<?php if(get_sub_field('catering_items_list') ): ?>
							<?php $sub_category_tab=1; ?>
							
							<?php while(has_sub_field('catering_items_list') ): ?>
								
								<?php if(get_sub_field('my_catering_items') ): ?>
									<?php $single_tab=1; ?>
									
									<?php while(has_sub_field('my_catering_items') ): ?>
										
										<?php $strcatering = get_sub_field('catering_item_title'); ?>
										
										<div id="catering-<?php echo friendlyUrlcat($strcatering); ?>"></div>						
									
										<?php $single_tab++; ?>
									
									<?php endwhile; ?>
								<?php endif; ?>
								
							<?php $sub_category_tab++; ?>
							
							<?php endwhile; ?>
						
						<?php endif; ?>
					<?php $main_menu_section_tab++; ?>
					
					<?php endwhile; ?>
				</div>
		
		<?php endif;?>

	</div><!-- menu_assets_wrapper -->
	
</div><!-- wrapper -->
<div class="veggies">
	<img src="<?php bloginfo('template_url') ?>/images/menu/menu_veggies.png" alt="menu_veggies" width="344" height="321" />
</div>
<script>
	if (location.hash) {
  setTimeout(function() {

    window.scrollTo(0, 0);
  }, 1);
}
</script>
<?php get_footer(); ?>


