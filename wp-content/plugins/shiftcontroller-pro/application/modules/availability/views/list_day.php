<?php
$t = HC_Lib::time();

$out = HC_Html_Factory::widget('list')
	->add_attr('class', 'list-unstyled')
	->add_attr('class', 'list-separated')
	;

foreach( $entries as $e ){
	$view = HC_Html_Factory::widget('availability_view');
	$view->set_model( $e );
	if( isset($state['wide']) ){
		$view->set_wide( $state['wide'] );
	}
	$view->set_start_link('availability');

	$out->add_item( $view );

/*
	$out->add_item(
		HC_Html_Factory::widget('titled', 'span')
			->add_child( $e->present_title() )
			->add_attr('class', 'text-success')
			->add_attr('class', 'text-smaller')
		);
*/
}

echo $out->render();
?>