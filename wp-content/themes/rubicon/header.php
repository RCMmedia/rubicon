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
 
 // bind a function to the window's scroll event, this will update
// the 'active' class every time the user scrolls the window
jQuery(window).scroll(function() {    
    // find the li with class 'active' and remove it
    jQuery("#header_wrap").removeClass("loaded");
    // get the amount the window has scrolled
    var scroll = jQuery(window).scrollTop();
    // add the 'active' class to the correct li based on the scroll amount
    if (scroll >= 50) {
        jQuery("#header_wrap").addClass("scrolling");
    }
    else {
        jQuery("#header_wrap").removeClass("scrolling");
        jQuery("#header_wrap").addClass("loaded");
    }

});
</script>
</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
	<div id="header_wrap">
		<div id="header">
			<div class="inner clearfix">
				<div class="logo">
					<a href="<?php bloginfo('url') ?>"><img src="<?php bloginfo('template_url') ?>/images/logo.jpg" alt="logo" ></a>
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
				</div>
				
			</div><!-- .inner -->
		</div><!-- #header -->
		<div class="secondary_menu">
			<div class="inner">
		 		<ul class="menu">
		  	 	<li><a href="#">La Jolla - San Diego</a></li>
		  	 	<li><a href="#">MISSION BEACH - San Diego</a></li>
		  	 	<li><a href="#">Mission Hills - San Diego</a></li>
		  	 	<li><a href="#">RENO - NEVADA</a></li>
		 		<ul>
			 	
			 	<ul class="order-online">
		  	 	<li><a href="#">La Jolla - San Diego</a></li>
		  	 	<li><a href="#">MISSION BEACH - San Diego</a></li>
		  	 	<li><a href="#">Mission Hills - San Diego</a></li>
		  	 	<li><a href="#">RENO - NEVADA</a></li>
		 		<ul>
			 		
			 	<ul class="locations">
		  	 	<li><a href="#">La Jolla - San Diego</a></li>
		  	 	<li><a href="#">MISSION BEACH - San Diego</a></li>
		  	 	<li><a href="#">Mission Hills - San Diego</a></li>
		  	 	<li><a href="#">RENO - NEVADA</a></li>
		 		<ul>
			 		
		 	</div><!-- .secondary_menu -->
		</div>
	</div><!-- .header_wrap -->
	

	<div id="main">
