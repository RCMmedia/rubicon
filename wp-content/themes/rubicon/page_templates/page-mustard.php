<?php
/*
    Template Name: Mustard Template
*/

get_header(); ?>



<div id="menu_wrapper" class=" clearfix">
	
	
	<div class="mustard_cta_wrap">
		<img src="<?php bloginfo('template_url') ?>/images/mustard-top.png"/>
		<div class="mustard_border"></div><!-- mustard border -->
		<span class="mustard_cta">Do you love our mustards?</span>
		<div class="mustard_border_bottom"></div><!-- mustard border bottom -->
	</div><!-- mustard_cta_wrap -->
	<div class="ribbon_wrapper">
		<div class="mustard_ribbon">
			<span class="ribbon_cta">Take them home with you!</span>
		</div><!-- mustard_ribbon -->
	</div><!-- ribbon_wrapper -->
	
	<div class="mustard_title">
		<span>Retail jars now available at all&nbsp;locations</span>
	</div>
	<div class="mustard_wrap">
		
		<div class="mustard_single_wrap">
			
			<div class="mustard_img_wrap">
				
				<img class="mustard_image" src="<?php bloginfo('template_url') ?>/images/mustard-hotnsweet.png"/>
				
				<div class="mustard_overlay">
				
				<span style="font-size:16px;margin-top:17px">Sugar, mustard seed, water, honey, white wine and white distilled vinegars, white wine, wheat flour, salt, garlic, olive and soybean oils, xanthan gum, citric acid, ginger, spices, artificial and natural flavors, tumeric, paprika, calcium disodium edta, annatto.</span>
				</div><!-- mustard_overlay -->
			
			</div><!-- mustard_img_wrap -->
			
			<div class="mustard_title_wrap">
				<h2>Hot & Sweet</h2>
				<span class="ingredients">See Ingredients<span class="arrow-right"></span></span>
			</div><!-- mustard_title_wrap -->
		
		</div><!-- mustard_single_wrap -->
		
		
		<div class="mustard_single_wrap">
			
			<div class="mustard_img_wrap">
				
				<img class="mustard_image" src="<?php bloginfo('template_url') ?>/images/mustard-cranberry.png"/>
				
				<div class="mustard_overlay">
				
				<span style="margin-top:10px">Water, sugar, mustard seed, vinegars, honey, cranberries, fruit juice concentrates ( cherry, plumb and cranberry) white wine, salt, wheat flour, high fructose corn syrup, lemon juice, corn syrup, modified corn starch, citric acid, xanthan gum, onions, ginger, FD&C red no.40 and 3, FD&C blue no. 1 and 2, soybean and sunflour oil, spices, sodium benzoate and potassium sorbate, tumeric, garlic, annatta, calcium disodium edta.</span>
				</div><!-- mustard_overlay -->
			
			</div><!-- mustard_img_wrap -->
			
			<div class="mustard_title_wrap">
				<h2>Cranberry</h2>
				<span class="ingredients">See Ingredients<span class="arrow-right"></span></span>
			</div><!-- mustard_title_wrap -->
		
		</div><!-- mustard_single_wrap -->
		
		
		<div class="mustard_single_wrap">
			
			<div class="mustard_img_wrap">
				
				<img class="mustard_image" src="<?php bloginfo('template_url') ?>/images/mustard-habanero.png"/>
				
				<div class="mustard_overlay">
				
				<span style="font-size:16px;margin-top:17px">Water, red chili and habanero peppers, sugar, mustard seed, white distilled vinegar, honey, wheat flour, salt, garlic, xanthan gum, lemon juice, soybean oil, onions, citric acid, tumeric, paprika, calcium disodium edta, spices, annatto, natural flavor, ginger.</span>
				</div><!-- mustard_overlay -->
			
			</div><!-- mustard_img_wrap -->
			
			<div class="mustard_title_wrap">
				<h2>Habanero</h2>
				<span class="ingredients">See Ingredients<span class="arrow-right"></span></span>
			</div><!-- mustard_title_wrap -->
		
		</div><!-- mustard_single_wrap -->
		
		
		
	</div><!-- mustard_wrap -->
	
	
</div><!-- wrapper -->
	
	<script type="text/javascript">
		
		jQuery(document).ready(function(){
			
			 jQuery('.mustard_single_wrap').hover(
				
               function () {
                  jQuery('.mustard_overlay',this).addClass('mustard_hover');
               }, 
				
               function () {
                  jQuery('.mustard_overlay',this).removeClass('mustard_hover');
               }
            );			
			});
		
	</script>
	
	<?php get_footer(); ?>