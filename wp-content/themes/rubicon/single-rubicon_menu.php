<?php $post = get_post($_POST['id']); ?>

<?php
   $menu_page_id = $_GET['pid'];
?>


<div id="single-post post-<?php the_ID(); ?>" class="single_menu_item">
	<div class="menu_info_top clearfix">
		<div class="menu_description">
			<h1 class="menu_header"><?php the_field("menu_item_name") ?></h1>
			<?php
					if(get_field('menu_item_serving_size'))
				{
					echo '<h3>' . get_field('menu_item_serving_size') . '</h3>';
				}
			?>
			<?php the_field('description'); ?>
			<h2 class="menu_price"><?php the_field('price'); ?></h2>
			<img class="well_bread_menu_icon" src="<?php bloginfo('template_directory');?>/images/menu/well-bread-icon.png"/>
		</div>

	<img class="menu_image" src="<?php the_field('menu_item_image'); ?>"/>
	


	</div>
	
	
	<div style="clear:both;"></div>
	<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
</div><!-- single menu item -->

