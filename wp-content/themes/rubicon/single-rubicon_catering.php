<div class="single_menu_item">
	<h1 class="menu_header"><?php the_title(); ?></h1>
	<h2 class="menu_price"><?php the_field('price'); ?></h2>
<?php the_field('description'); ?>
	<a href="https://therubicondeli.brinkpos.net/order/default.aspx" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/pickup.png"/></a>
	<a href="https://postmates.com/sd/rubicon-deli-san-diego" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/delivery.png"/></a>
	<div class="picture_border">
		<img class="menu_image" src="<?php the_field('menu_item_image'); ?>"/>
		<img class="well_bread_menu_icon" src="<?php bloginfo('template_directory');?>/images/well-bread-icon.png"/>
	</div><!-- picture_border -->
	
<div class="menu_info">
	<p>858.488.3354</p>
	<p>3819 Mission Blvd.San Diego CA 92109</p>
	<p>Mon-Sun 1030am-700pm</p>
</div><!-- menu_info1 -->
<div class="menu_info">
	<p>Leave a Review</p>
	<p>Eclub Sign Up</p>
</div><!-- menu_info1 -->
<div style="clear:both;"></div>
<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
</div><!-- single menu item -->


