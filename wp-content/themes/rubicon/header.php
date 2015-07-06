<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title(''); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<!-- <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" /> -->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ) ?>/style-global.css" />
<link href="<?php bloginfo( 'template_url' ) ?>/inc/globals/css/hover.css" rel="stylesheet">
<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/inc/globals/css/animate.css">   
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php bloginfo('template_url') ?>/inc/globals/js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
	<div id="header">
		<div class="inner clearfix">
			<div class="logo">
				<a href="<?php bloginfo('url') ?>"><img src="<?php bloginfo('template_url') ?>/images/logo.jpg" alt="logo" width="130" height="48"></a>
			</div>
			<div class="menu_wrap">
				<a style="display: none;" href="">Menu</a>
				<ul class="menu">
					<li><a href="/">MENU</a></li>
					<li><a href="/about/">ORDER ONLINE</a>
							<ul style="display:none">
								<li>Pickup</li>
								<li>Delivery</li>
							</ul>
					</li>
					<li><a href="/contact/">LOCATIONS</a></li>
					<li><a href="/culture/">CULTURE</a></li>
   			</ul>
   			<ul class="secondary_menu">
	   			<li></li>
	   			<li></li>
	   			<li></li>
   			</ul>
			</div>
		</div>
	</div><!-- #header -->
	

	<div id="main">
