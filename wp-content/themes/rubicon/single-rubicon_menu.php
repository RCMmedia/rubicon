<div class="single_menu_item">
	<div class="menu_info_top clearfix">
	<h1 class="menu_header"><?php the_field("menu_item_name") ?></h1>
	<?php
			if(get_field('menu_item_serving_size'))
		{
			echo '<h3>' . get_field('menu_item_serving_size') . '</h3>';
		}
	?>
	<h2 class="menu_price"><?php the_field('price'); ?></h2>
	<?php the_field('description'); ?>
<!--
	<div class="order_button_wrap">
		<a href="https://therubicondeli.brinkpos.net/order/default.aspx" target="_blank"><img src="<?php bloginfo('template_url');?>/images/menu/pickup.png"/></a>
		<a href="https://www.bringittome.com/order/restaurant/rubicon-deli-menu/141" target="_blank"><img src="<?php bloginfo('template_url');?>/images/menu/delivery.png"/></a>
	</div>
-->
	<?php if(get_field('menu_item_image')):?>
	<div class="picture_border">
		<img class="menu_image" src="<?php the_field('menu_item_image'); ?>"/>
		<img class="well_bread_menu_icon" src="<?php bloginfo('template_directory');?>/images/menu/well-bread-icon.png"/>
	</div><!-- picture_border -->
	<?php endif;?>
	</div>
	
	
	
	<div style="clear:both;"></div>
	<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
</div><!-- single menu item -->

