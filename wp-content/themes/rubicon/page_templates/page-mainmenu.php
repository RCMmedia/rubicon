<?php
/*
    Template Name: Main Menu
*/

get_header(); ?>

<script type="text/javascript">
	jQuery("html, body").animate({
	        scrollTop: 0
	    }, 1500); 
	     
	jQuery(document).ready(function(){

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
			jQuery("html, body").delay(300).animate({scrollTop: 0});
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
								
								jQuery('ul.menu_section_wrapper.menu_section_wrapper_<?php echo $main_menu_section_tab;?> .menu_sub_category_tabs_<?php echo $sub_category_tab;?>').first().addClass('menu_sub_cat_first_<?php echo $sub_category_tab;?>');
								
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
					<li class='tab etab menu_tab'><a href="#menu">Menu</a></li>
					
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
	 			
		</div><!-- tab container -->
		
	</div><!-- menu_items_wrapper -->
	
	
		<div class="menu_assets_wrapper">
		
		<?php if( get_field('menu_section') ): ?>
				
				<div class="panel_container_menu">
					<div class="close-food-panel"><a href="javascript:void(0)">CLOSE ITEM</a></div>
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
					
					
					
				</div><!-- .panel_container_menu -->
				
		</div><!-- menu_assets_wrapper -->
		
		<?php endif;?>
	
	
</div><!-- menu_wrapper -->

<div class="veggies">
	<img src="<?php bloginfo('template_url') ?>/images/menu/menu_veggies.png" alt="menu_veggies" width="344" height="321" />
</div>

<script>
	jQuery(document).ready(function($) {
    $("#telly").text($("#telly span").text().replace(",", " x"));
	});
</script>


<?php get_footer(); ?>