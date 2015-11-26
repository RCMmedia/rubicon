<?php
/*
    Template Name: Main Catering
*/

get_header(); ?>

<script type="text/javascript">
	jQuery("html, body").animate({
	        scrollTop: 0
	    }, 1500); 
	     
	jQuery(document).ready(function(){
		//load easytabs
		
		
		
		
		
		


//show only the menu tab when loading with #catering in address bar 
		if (location.href.indexOf("#catering") != -1) {
			jQuery('.panel_container_menu').addClass('fade_away');
			jQuery('.panel_container_catering').removeClass('fade_away');
			
			//have the right menu opened 
			jQuery(".menu_tab").removeClass("active");	
			jQuery(".catering_tab").addClass("active");	
			jQuery("#menu").removeClass("active");	
			jQuery("#catering").addClass("active");
		}
		//show menu tab on click			
		jQuery(".menu_tab").click(function(){
			jQuery('.panel_container_catering').addClass('fade_away');
			jQuery('.panel_container_menu').removeClass('fade_away');
		});
		
		//show catering tab on click
		jQuery(".catering_tab").click(function(){
			jQuery('.panel_container_catering').removeClass('fade_away');
			jQuery('.panel_container_menu').addClass('fade_away');
		});
		
		jQuery(".tab.catering_sub_category_tabs a").click(function(){
			
			jQuery(".panel_container_catering .active").delay(500).css("visibility", "visible")
			
			//have the right menu opened 
			jQuery(".menu_tab").removeClass("active");	
			jQuery(".catering_tab").addClass("active");	
			jQuery("#menu").removeClass("active");	
			jQuery("#catering").addClass("active");
		});
		
		
		
		jQuery(".menu_single_tab a").click(function(){
			jQuery("html, body").animate({scrollTop: 195});
		});
			
		jQuery(".tab.catering_sub_category_tabs a").click(function(){
			jQuery("html, body").animate({scrollTop: 195});
		});
		
		//begin moderizer
		var mod = function(){
		  
		  if (Modernizr.mq('(max-width: 750px)')) {
			  
			  jQuery('.panel_container_catering').addClass('fade_away');
			  
			  //default mobile menu behaviour that happens on load
				jQuery("div#tab-container.tab-container").toggleClass("hide-options");
				//jQuery(".panel_container_catering,.panel_container_menu").toggleClass("mobile-active");
				jQuery("#menu_wrapper").addClass("overflow-hidden");	
				jQuery(".close-food-panel").show();
		
				//logic that controls the mobile menu displaying a menu/catering item
				jQuery(".panel_container_catering .close-food-panel a,.tab.catering_sub_category_tabs a").click(function(){
					//jQuery("div#tab-container.tab-container,.menu_page_title,.border").fadeToggle();
					jQuery("html, body").animate({scrollTop: 0});
					jQuery(".panel_container_catering").toggleClass("mobile-active");
					jQuery(".panel_container_catering").toggleClass("clearfix");
					jQuery("#menu_wrapper").toggleClass("overflow-hidden");	
					jQuery('.panel_container_menu').addClass('fade_away');
				  jQuery('.panel_container_catering').removeClass('fade_away');
				  
				  //have the right menu opened 
				  jQuery(".menu_tab").toggleClass("active");	
					jQuery(".catering_tab").toggleClass("active");	
					jQuery("#menu").toggleClass("active");	
					jQuery("#catering").toggleClass("active");
												
				});
				
				jQuery(".panel_container_menu .close-food-panel a,.menu_single_tab a").click(function(){
					//jQuery("div#tab-container.tab-container,.menu_page_title,.border").fadeToggle();
					jQuery("html, body").animate({scrollTop: 0});
					jQuery(".panel_container_menu").toggleClass("mobile-active");
					jQuery(".panel_container_menu").toggleClass("clearfix");
					jQuery("#menu_wrapper").toggleClass("overflow-hidden");	
					jQuery('.panel_container_catering').addClass('fade_away');
					jQuery('.panel_container_menu').removeClass('fade_away');	
					
					//have the right menu opened 
					jQuery(".menu_tab").toggleClass("active");	
					jQuery(".catering_tab").toggleClass("active");	
					jQuery("#menu").toggleClass("active");	
					jQuery("#catering").toggleClass("active");	
										
				});


				//only show a specific catering item if it is in the url
				if (location.href.indexOf("#catering-") != -1) {
				  	//jQuery("div#tab-container.tab-container,.menu_page_title,.border").fadeToggle();
						jQuery(".panel_container_catering").addClass("mobile-active clearfix");
						jQuery(".panel_container_menu").removeClass("mobile-active clearfix");
						jQuery("#menu_wrapper").toggleClass("overflow-hidden");	
						jQuery('.panel_container_menu').addClass('fade_away');
				  	jQuery('.panel_container_catering').removeClass('fade_away');
				  	
				  	}
				
				//only show a specific menu item if it is in the url
				if (location.href.indexOf("#menu-") != -1) {
				  	//jQuery("div#tab-container.tab-container,.menu_page_title,.border").fadeToggle();
						jQuery(".panel_container_menu").addClass("mobile-active clearfix");
						jQuery(".panel_container_catering").removeClass("mobile-active clearfix");
						jQuery("#menu_wrapper").toggleClass("overflow-hidden");	
						jQuery('.panel_container_catering').addClass('fade_away');
				  	
				  	}
				  	

				  	
		  }
		  
		}
		//end modernizer 
			
			
			
			// Shortcut for $(document).ready()
			jQuery(function() {
			   
			    mod();
			});
			


			
		
	});
	
	
</script>

<?php if( get_field('catering_section') ): ?>
		
		<?php $main_catering_section_tab=1; ?>
				
			<script type="text/javascript">
				
				jQuery(document).ready(function(){
					
					jQuery('#ajax_tab_container_catering').easytabs({
						panelContext: jQuery(".panel_container_catering")  	
  				});
  				//jQuery('.panel_container_catering').addClass('mobile-active');
  				

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


<div id="menu_wrapper" class=" clearfix">
	<div class="menu_page_title">
			<?php the_field('menu_page_title'); ?>
	</div><!-- .menu_page_title -->
	<div class="border">
		<img src="<?php bloginfo('template_url') ?>/images/homepage/border-bottom.png" alt="border" />
	</div><!-- .border -->
	
	
	<div class="menu_items_wrapper">
	
	
	<div id="tab-container" class="tab-container">
		
		<ul class='etabs'>
			<li class='tab etab menu_tab'><a href="#Catering">Catering</a></li>
		</ul>
		
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
	
	</div><!-- tab-container -->
	
	
	</div><!-- menu_items_wrapper -->
	
	<div class="menu_assets_wrapper">
		
		<?php if( get_field('catering_section') ): ?>
				
				<div class="panel_container_catering" >
					<div class="close-food-panel"><a href="javascript:void(0)">CLOSE ITEM</a></div>
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
					
					<div class="menu_info">
						<p><a href="tel:<?php the_field('catering_location_phone'); ?>"><?php the_field('catering_location_phone'); ?></a></p>
						<p><?php the_field('menu_location_address'); ?></p>
						
					</div><!-- menu_info1 -->
					
					<div class="menu_info">
						<p><?php the_field('menu_location_hours'); ?></p>
						<div class="email-signup gray-border">
							<p>Join Our Newsletter</p>
							<?php echo do_shortcode('[gravityform id="6" title="false" description="false" ajax="true"]'); ?>
						</div>
					</div><!-- menu_info1 -->
					
				</div><!-- .panel_container_catering -->
		
		



	
	
	
	
	</div><!-- menu_assets_wrapper -->


<?php endif;?>


</div><!-- menu_wrapper -->


<div class="veggies">
	<img src="<?php bloginfo('template_url') ?>/images/menu/menu_veggies.png" alt="menu_veggies" width="344" height="321" />
</div>



<?php get_footer(); ?>