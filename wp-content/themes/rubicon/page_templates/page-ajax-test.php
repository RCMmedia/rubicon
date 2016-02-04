<?php
/*
	Template Name: Ajax Test App
*/
?> 
<!DOCTYPE html>
<html>
<head>
<meta property="fb:app_id" content="<?php $appid = get_post_meta($post->ID, 'appid', TRUE); ?><?php if($appid) { ?><?php echo $appid; ?><?php } ?>"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php wp_title(''); ?></title>



<style type="text/css">
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td {
	background: transparent;
	border: 0;
	margin: 0;
	padding: 0;
	vertical-align: baseline;
}
body {
	line-height: 1; overflow:hidden;background: url("") no-repeat;font-family: verdana,sans-serif;;
}
body.logged-in {overflow: auto;}
h1,h2,h3,h4,h5,h6{clear:both;font-weight:400}
blockquote{quotes:none}
blockquote:before,blockquote:after{content:none}
del{text-decoration:line-through}
table{border-collapse:collapse;border-spacing:0}
a img{border:none}
img{border:0}
a{text-decoration:none;outline:none;cursor:pointer}



</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
<script>
   $(document).ready(function(){
 
        $.ajaxSetup({cache:false});
        $(".post-link").click(function(){
            var post_link = $(this).attr("href");
 
            $("#single-post-container").html("content loading");
            $("#single-post-container").load(post_link);
        return false;
        });
 
    });
</script>
<?php wp_head(); ?>

<body <?php body_class(); ?>>

<div id="wrapper">
	
		<div class="left" style="position:relative">
			<ul>
				<?php $myfirst_query = new WP_Query( array( 'post_type' => 'rubicon_menu', 'order' => 'DSC','posts_per_page' => 150  ) ); while($myfirst_query->have_posts()) : $myfirst_query->the_post(); ?>
			
				<li <?php post_class(); ?> id="post-<?php the_ID(); ?>" >
					
					<a class="post-link" rel="<?php the_ID(); ?>" href="<?php the_permalink(); ?>">
 			
						<?php the_title(); ?> 
 			
    			</a>
				</li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); // reset the query ?>
			</ul>
		</div>
    
    
    <div class="right">
	    <div id="single-post-container"></div>
    </div>


</div><!-- #wrapper -->
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
<?php wp_footer(); ?>
</body>
</html>