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
<div id="loader-wrapper">
	<div id="loader"></div>
	<div class="loader-section section-left"></div>
  <div class="loader-section section-right"></div>
</div><!-- .loader-wrapper -->
<div id="wrapper" class="hfeed">
	<div id="header_wrap">
		<div id="header">
			<div class="inner clearfix">
				<div class="logo">
					<a href="<?php bloginfo('url') ?>"><img src="<?php bloginfo('template_url') ?>/images/logo.jpg" alt="logo" ></a>
				</div><!-- .logo -->
				<?php if (!is_mobile()) { ?>
				<div class="nav_wrap">
					<a style="display: none;" href="">Menu</a>
					<ul class="nav">
						<li><a class="toggle_secondary_menu menu">MENU</a></li>
						<li><a class="toggle_secondary_menu order-online">ORDER ONLINE</a></li>
						<li><a class="toggle_secondary_menu locations">LOCATIONS</a></li>
						<li><a class="toggle_secondary_menu culture">CULTURE</a></li>
		 			</ul><!-- .nav -->
				</div><!-- .nav_wrap -->
				<?php } ?>
					<a id="nav-toggle" href="#"><span></span></a>
			</div><!-- .inner -->
		</div><!-- #header -->
		
		<?php if (!is_mobile()) { ?>
		<div class="secondary_menu">
			<div class="inner">
		 		<ul class="sub_menu menu">
		  	 	<li><a href="#">La Jolla - San Diego<span></span></a></li>
		  	 	<li><a href="#">MISSION BEACH - San Diego<span></span></a></li>
		  	 	<li><a href="#">Mission Hills - San Diego<span></span></a></li>
		  	 	<li><a href="#">RENO - NEVADA<span></span></a></li>
		 		</ul><!-- .sub_menu -->
			 	
			 	<ul class="sub_menu order-online" >
		  	 	<li><a href="#">Pickup<span></span></a></li>
		  	 	<li><a href="#">Delivery<span></span></a></li>
				</ul><!-- .sub_menu -->
			 		
			 	<ul class="sub_menu locations">
		  	 	<li><a href="#">La Jolla - San Diego<span></span></a></li>
		  	 	<li><a href="#">MISSION BEACH - San Diego<span></span></a></li>
		  	 	<li><a href="#">Mission Hills - San Diego<span></span></a></li>
		  	 	<li><a href="#">RENO - NEVADA<span></span></a></li>
		 		</ul><!-- .sub_menu -->
		 		<ul class="sub_menu culture">
		  	 	<li><a href="#">About Us<span></span></a></li>
		  	 	<li><a href="#">Who's the Chef<span></span></a></li>
		  	 	<li><a href="#">Press<span></span></a></li>
		  	 	<li><a href="#">Donate<span></span></a></li>
				 	<li><a href="#">Jobs<span></span></a></li>
		 		</ul><!-- .sub_menu -->
		 	</div><!-- .secondary_menu -->
		 	<?php } ?>
		 	
		</div><!-- .header -->
	</div><!-- .header_wrap -->
	

	<div id="main">
