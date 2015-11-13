<?php
if( ! $count ){
	return;
}

$temp_shift = HC_App::model('shift');
$linkto = HC_Lib::link('list/index', 
	array(
		'filter'	=> 'release',
		)
	);

$title = HC_Html_Factory::widget('list')
	->add_attr('class', 'list-inline')
	->add_attr('class', 'list-separated')
	->add_item('title',
		HC_Html_Factory::widget('titled', 'a')
			->add_attr('href', $linkto)
			->add_child( HCM::__('Shift Release Pending') )
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
	->add_attr('class', 'alert-warning-o')
	->add_child( $title )
	;

echo $out->render();