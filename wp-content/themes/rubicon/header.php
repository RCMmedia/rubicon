<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php if ( !is_singular( 'location' ) && !is_page_template( 'page_templates/page-mainmenu.php' ) ) { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php } else { ?>
	<meta name="viewport" content="initial-scale=1">
<?php } ?>
<title><?php wp_title(''); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<!-- <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" /> -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,300italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Ultra' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ) ?>/style-global.css" />
<!-- <link href="<?php bloginfo( 'template_url' ) ?>/inc/globals/css/hover.css" rel="stylesheet"> -->
<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/inc/globals/css/animate.css"> 
<!--[if IE 8]>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ) ?>/style-ie.css" />
<![endif]-->  
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
<script src="<?php bloginfo('template_url') ?>/inc/globals/js/wow.js"></script>

<?php if ( is_page_template( 'page_templates/page-mainmenu.php' ) || is_page_template( 'page_templates/page-maincatering.php' )|| is_page_template( 'page_templates/page-maincatering_v2.php' ) || is_page_template( 'page_templates/page-mainmenu_v2.php' )  ) { ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ) ?>/style-menu_v2.css" />
<script src="<?php bloginfo( 'template_directory' ); ?>/inc/globals/js/jquery.easytabs.min.js" type="text/javascript"></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/inc/globals/js/jquery.easytabs.hashchange.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url') ?>/inc/globals/js/modernizer.js"></script> 
<script src="<?php bloginfo('template_url') ?>/inc/globals/js/jquery.accordion.js"></script> 
<script src="<?php bloginfo('template_url') ?>/inc/globals/js/jquery.lazy.min.js"></script> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script> 


<?php } ?>
<script src="http://therubicondeli.brinkpos.net/resources/js/detectmobilebrowser.js"></script>
<script>
jQuery(document).ready(function () {
    if (jQuery.browser.mobile) {
        jQuery(".order-link").attr("href", "http://therubicondeli.brinkposmobile.net/");
    }
});
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
	<div class="loader-section section-left" ></div>
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

		 			<?php wp_nav_menu( array( 'menu_class' => 'nav', 'theme_location' => 'primary') ); ?>
				</div><!-- .nav_wrap -->
				<?php } ?>
					<a id="nav-toggle" href="javascript:void(0)"><span></span></a>
			</div><!-- .inner -->
		</div><!-- #header -->
		
		<?php if (!is_mobile()) { ?>
		<div class="secondary_menu">
			<div class="inner">
				
<!--
		 		<ul class="sub_menu menu">
		  	 	<li><a href="<?php bloginfo('url') ?>/location/mission-hills/">Mission Hills - San Diego<span></span></a></li>
		  	 	<li><a href="javascript:void(0)">MISSION BEACH - San Diego<span></span></a></li>
		  	 	<li><a href="javascript:void(0)">RENO - NEVADA<span></span></a></li>
		 		</ul>
--><!-- .sub_menu -->
		 		
		 		<?php wp_nav_menu( array( 'menu_class' => 'sub_menu menu', 'theme_location' => 'menu') ); ?>
		 		<?php wp_nav_menu( array( 'menu_class' => 'sub_menu catering', 'theme_location' => 'catering') ); ?>
		 		<ul class="sub_menu order-online" >
<!-- 			 		<span>$4.99 flat rate delivery fee + free cookies!</span>  -->  
			 		<li><a href="https://www.bringittome.com/order/restaurant/rubicon-deli-menu/141" target="_blank">Delivery by: BringItToMe.com</a></li>
		  	 	<li><a class="order-link" href="https://therubicondeli.brinkpos.net/order/default.aspx" target="_blank">Pickup<span></span></a></li>
				</ul><!-- .sub_menu -->
		 		<?php wp_nav_menu( array( 'menu_class' => 'sub_menu locations', 'theme_location' => 'locations') ); ?>
		 		<?php wp_nav_menu( array( 'menu_class' => 'sub_menu culture', 'theme_location' => 'culturemenu') ); ?>
			 	

		 	</div><!-- .secondary_menu -->
		 	<?php } ?>
		 	
		</div><!-- .header -->
	</div><!-- .header_wrap -->
	
	<?php if ( is_front_page() ) { ?>
		  <div class="video_banner_wrap">

<!--
				<div class="vertically_aligned wow fadeIn" >
					<div><img src="<?php bloginfo('template_url') ?>/images/homepage/po-boy.png" alt="po-boy" width="88" height="88"></div>
					<h2>The Dapper Deli</h2>
					<h1>&mdash; Well Bread Sandwiches &mdash;</h1>
					<div><a class="toggle-order-online"><img src="<?php bloginfo('template_url') ?>/images/homepage/order-online.png" alt="order-online" /></a></div>
					<div class="order-online-links">
						<a class="pickup" href="https://therubicondeli.brinkpos.net/order/default.aspx" target="_blank">Pickup</a>
						<a class="delivery" href="https://postmates.com/sd/rubicon-deli-san-diego" target="_blank">Delivery</a>
					</div>
				</div>
--><!-- .vertically_aligned -->
			
				
				
				<?php if (!is_mobile()) { ?>
				<video autoplay loop id="bgvid" preload="" poster="<?php bloginfo('template_url') ?>/images/video_poster.jpg">
					<source src="<?php bloginfo('url') ?>/assets/video/RubiSlider_1_hb720.mp4" type="video/mp4" >
				</video>
				<?php } ?>
				
				<?php if (is_mobile()) { ?>
				<video autoplay loop id="bgvid" preload="" poster="<?php bloginfo('template_url') ?>/images/video_poster_sm.jpg">
					<source src="<?php bloginfo('url') ?>/assets/video/RubiSlider_1_hb_mobile.mp4" type="video/mp4" >
				</video>
				<?php } ?>
				
<!--
				<div class="see-more-wrap ">
					<div class="see-more-container">
					<a class="wow fadeIn" data-wow-delay="1s"><img width="122" src="<?php bloginfo('template_directory');?>/images/homepage/discover-more.png"/></a>
					<a class="wow fadeIn seemore_discover" data-wow-delay="1s">Discover More</a>
					<div class="wow fadeIn arrow-down"></div>
					</div>
				</div>
-->
			</div><!-- .video_banner_wrap -->
			
			<?php	} ?>	
		


	<div id="main" class="wow fadeIn">
