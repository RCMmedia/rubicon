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
		<div class="clearfix">
			<div class="description">
				<?php the_field('description'); ?>
			</div>
			<div class="additional_options">
			<?php if( have_rows('catering_additional_options') ): ?>
			<h3>Additional Options:</h3>
				<ul>
			<?php while ( have_rows('catering_additional_options') ) : the_row();?>
					<li>
			        <?php the_sub_field('catering_additional_item'); ?>
					</li>
			   <?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
<!--
		<a href="https://therubicondeli.brinkpos.net/order/default.aspx" target="_blank"><img src="<?php bloginfo('template_url');?>/images/menu/pickup.png"/></a>
		<a href="https://postmates.com/sd/rubicon-deli-san-diego-2" target="_blank"><img src="<?php bloginfo('template_url');?>/images/menu/delivery.png"/></a>
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
