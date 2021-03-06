<?php
if( $layout->has_partial('header_ajax') ){
	echo $layout->partial('header_ajax');
}
/* CONTENT */
if( $layout->has_partial('sidebar') ){
	$content = HC_Html_Factory::widget( 'grid' )
		->add_item( array($layout->partial('flashdata_ajax'), $layout->partial('content')), 9 )
//		->add_item( $layout->partial('content'), 9 )
		->add_item( $layout->partial('sidebar'), 3 )
		;
	echo $content->render();
}
else {
	echo $layout->partial('flashdata_ajax');
	echo $layout->partial('content');
}