<?php
$list = HC_Html_Factory::widget('list')
	->add_attr('class', array('list-unstyled'))
	;

$list->add_item(
	HC_Html_Factory::widget('titled', 'a')
		->add_attr('href', HC_Lib::link('shifts/zoom/index/id/' . $shift->id . '/tab/pickup'))
		->add_attr('class', array('hc-flatmodal-loader'))
		->add_attr('class', array('btn'))
		// ->add_attr('class', array('btn-default'))
		->add_attr('class', array('btn-success-o'))
		->add_attr('class', array('btn-xs'))
		// ->add_child( HC_Html::icon('check') )
		->add_child( HCM::__('Pick Up Shift') )
	);

echo $list->render();
?>