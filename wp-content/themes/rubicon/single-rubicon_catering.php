<?php $post = get_post($_POST['id']); ?>

<?php
   $menu_page_id = $_GET['link-type'];
?>

<div id="post-<?php the_ID(); ?>" class="single_menu_item">
	<div class="menu_info_top clearfix">
		<?php if ($_GET['link-type'] === "informational" ) { ?>
			<h1 class="menu_header"><?php the_field("menu_item_name") ?></h1>
			<?php the_field('description'); ?>
		<?php } ?>
		<?php if (!$_GET['link-type'] === "informational" ) { ?>
		<div class="menu_description">
			
			
			<?php
					if(get_field('menu_item_serving_size'))
				{
					echo '<h3>' . get_field('menu_item_serving_size') . '</h3>';
				}
			?>
			<?php if(get_field('description')) { ?>
				<?php the_field('description'); ?>
			<?php } ?>
			
			<?php if(get_field('price')) { ?>
				<h2 class="menu_price"><?php the_field('price'); ?></h2>
			<?php } ?>
			
			<img class="well_bread_menu_icon" src="<?php bloginfo('template_directory');?>/images/menu/well-bread-icon.png"/>
		</div>
		
		<?php if(get_field('menu_item_image')) { ?>
			<img class="menu_image" src="<?php the_field('menu_item_image'); ?>"/>
		<?php } ?>
		<?php } ?>

	


	</div>
	
	
	<div style="clear:both;"></div>
	<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
</div><!-- single menu item -->