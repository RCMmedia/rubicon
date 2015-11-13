<?php
if( ! $count ){
	return;
}

$temp_shift = HC_App::model('shift');
$linkto = HC_Lib::link('list/index', 
	array(
		'staff'	=> 0,
		)
	);

$title = HC_Html_Factory::widget('list')
	->add_attr('class', 'list-inline')
	->add_attr('class', 'list-separated')
	->add_item('title',
		HC_Html_Factory::widget('titled', 'a')
			->add_attr('href', $linkto)
			->add_child( HCM::__('Open Shifts') )
		)
	->add_item('count', 
		HC_Html_Factory::element('span')
			->add_attr('class', 'badge')
			// ->add_attr('class', 'label-default')
			->add_child( $count )
		)
	;

$out = HC_Html_Factory::element('div')
	->add_attr('class', 'alert')
	->add_attr('class', 'alert-danger-o')
	->add_attr('class', 'hc-red-triangled')
	->add_child( $title )
	;

echo $out->render();