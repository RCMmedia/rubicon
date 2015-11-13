<?php
$list = HC_Html_Factory::widget('list')
	->add_attr('class', array('list-unstyled'))
	;

if( $shift->release_request ){
	$list->add_item(
		HC_Html_Factory::widget('titled', 'a')
			->add_attr('href', HC_Lib::link('shifts/zoom/index/id/' . $shift->id . '/tab/release'))
			->add_attr('class', array('hc-flatmodal-loader'))
			->add_attr('class', array('btn'))
			->add_attr('class', array('btn-xs'))
			->add_attr('class', array('btn-warning'))
			->add_child( HC_Html::icon('sign-out') )
			->add_child( HCM::__('Shift Release Pending') )
		);
}

if( $list->items() ){
	echo $list->render();
}
?>